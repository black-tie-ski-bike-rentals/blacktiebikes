<?php
/**
 * WW-5: Full nav setup — runs all three steps in order.
 *
 *   1. Create global nav + location nav template menus
 *   2. Assign page-location.php template to all location pages
 *   3. Build per-location menus from ACF service tabs
 *
 * Idempotent — safe to run multiple times on any environment.
 *
 * Usage:
 *   wp eval-file wp-content/themes/blacktieskis/_dev-docs/scripts/ww-5-consolidated.php
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Run via WP-CLI: wp eval-file ...' . PHP_EOL );
}

// ---------------------------------------------------------------------------
// Helpers
// ---------------------------------------------------------------------------

function btb5_get_or_create_menu( string $name, string $slug ): int {
	$menu = wp_get_nav_menu_object( $slug );

	if ( $menu ) {
		WP_CLI::log( "  '{$name}' already exists — clearing items." );
		$items = wp_get_nav_menu_items( $menu->term_id, [ 'update_post_term_cache' => false ] );
		if ( $items ) {
			foreach ( $items as $item ) {
				wp_delete_post( $item->ID, true );
			}
		}
		return (int) $menu->term_id;
	}

	$menu_id = wp_create_nav_menu( $name );
	if ( is_wp_error( $menu_id ) ) {
		WP_CLI::error( "Failed to create menu '{$name}': " . $menu_id->get_error_message() );
	}

	WP_CLI::log( "  Created '{$name}' (ID: {$menu_id})." );
	return (int) $menu_id;
}

function btb5_add_item( int $menu_id, string $label, string $url, int $parent_id = 0, int $position = 1 ): int {
	$args = [
		'menu-item-title'    => $label,
		'menu-item-url'      => $url,
		'menu-item-status'   => 'publish',
		'menu-item-type'     => 'custom',
		'menu-item-position' => $position,
	];

	if ( $parent_id ) {
		$args['menu-item-parent-id'] = $parent_id;
	}

	$item_id = wp_update_nav_menu_item( $menu_id, 0, $args );

	if ( is_wp_error( $item_id ) ) {
		WP_CLI::warning( "  Could not add '{$label}': " . $item_id->get_error_message() );
		return 0;
	}

	return (int) $item_id;
}

function btb5_get_location_tabs( int $post_id ): array {
	$tabs = [];

	if ( ! have_rows( 'bt_templates', $post_id ) ) {
		return $tabs;
	}

	while ( have_rows( 'bt_templates', $post_id ) ) {
		the_row();

		if ( get_row_layout() !== 'tabs_section' ) {
			continue;
		}

		if ( have_rows( 'tabs' ) ) {
			while ( have_rows( 'tabs' ) ) {
				the_row();
				$label = get_sub_field( 'tab_label' );
				if ( $label ) {
					$tabs[] = $label;
				}
			}
		}

		break;
	}

	return $tabs;
}

function btb5_find_service_page_url( string $tab_label, string $location_name ): string {
	global $wpdb;

	$overrides    = $GLOBALS['btb5_url_overrides'] ?? [];
	$override_key = sanitize_title( $location_name ) . '|' . sanitize_title( $tab_label );
	if ( isset( $overrides[ $override_key ] ) ) {
		return $overrides[ $override_key ];
	}

	$search_terms = array_unique( [ $tab_label, rtrim( $tab_label, 's' ) ] );

	foreach ( $search_terms as $term ) {
		$row = $wpdb->get_row(
			$wpdb->prepare(
				"SELECT ID FROM {$wpdb->posts}
				 WHERE post_type = 'page'
				   AND post_status = 'publish'
				   AND post_title LIKE %s
				   AND post_title LIKE %s
				   AND post_title LIKE %s
				 ORDER BY ID ASC
				 LIMIT 1",
				'%' . $wpdb->esc_like( $term ) . '%',
				'%' . $wpdb->esc_like( $location_name ) . '%',
				'%Rentals%'
			)
		);

		if ( $row ) {
			return (string) get_permalink( $row->ID );
		}

		$row = $wpdb->get_row(
			$wpdb->prepare(
				"SELECT ID FROM {$wpdb->posts}
				 WHERE post_type = 'page'
				   AND post_status = 'publish'
				   AND post_title LIKE %s
				   AND post_title LIKE %s
				 ORDER BY ID ASC
				 LIMIT 1",
				'%' . $wpdb->esc_like( $term ) . '%',
				'%' . $wpdb->esc_like( $location_name ) . '%'
			)
		);

		if ( $row ) {
			return (string) get_permalink( $row->ID );
		}
	}

	return '';
}

// ---------------------------------------------------------------------------
// PHASE 1: Global nav + location nav template
// ---------------------------------------------------------------------------

WP_CLI::log( '' );
WP_CLI::log( '=== PHASE 1: Building menus ===' );
WP_CLI::log( '' );

WP_CLI::log( '--- BTB Global Nav ---' );
$global_id = btb5_get_or_create_menu( 'BTB Global Nav', 'btb-global-nav' );

$locations_id = btb5_add_item( $global_id, 'Locations', '#',         0, 1 );
               btb5_add_item( $global_id, 'Contact',   '/contact/', 0, 2 );
               btb5_add_item( $global_id, 'About Us',  '/#about',   0, 3 );
$jobs_id      = btb5_add_item( $global_id, 'Jobs',      '#',         0, 4 );

if ( $jobs_id ) {
	wp_update_nav_menu_item( $global_id, $jobs_id, [
		'menu-item-title'    => 'Jobs',
		'menu-item-url'      => '#',
		'menu-item-status'   => 'publish',
		'menu-item-type'     => 'custom',
		'menu-item-position' => 4,
		'menu-item-classes'  => 'popup-is-open-v2',
	] );
}

$hidden_locations = [ 'north-tahoe' ];

// Hardcoded URL overrides for locations where bt_cate_parent_location_url is missing
// and slug lookup fails. Key = sanitize_title( term name ).
$location_url_overrides = [
	'whitefish' => '/whitefish/',
];

$all_terms = get_terms( [ 'taxonomy' => 'category_state_location', 'hide_empty' => false ] );
$location_terms = array_filter(
	is_wp_error( $all_terms ) ? [] : (array) $all_terms,
	static fn( $t ) => $t->parent !== 0 && ! in_array( $t->slug, $hidden_locations, true )
);

if ( $location_terms ) {
	usort( $location_terms, static fn( $a, $b ) => strcmp( $a->name, $b->name ) );
	$pos = 1;
	foreach ( $location_terms as $term ) {
		$url = get_term_meta( $term->term_id, 'bt_cate_parent_location_url', true );
		if ( ! $url ) {
			$slug  = sanitize_title( $term->name );
			$url   = $location_url_overrides[ $slug ] ?? '';
		}
		if ( ! $url ) {
			$pages = get_posts( [
				'name'        => sanitize_title( $term->name ),
				'post_type'   => 'page',
				'post_status' => 'publish',
				'numberposts' => 1,
			] );
			$url = $pages ? get_permalink( $pages[0]->ID ) : '#';
		}
		btb5_add_item( $global_id, $term->name, $url, $locations_id, $pos++ );
	}
	WP_CLI::log( '  Added ' . count( $location_terms ) . ' location(s) to Locations dropdown.' );
} else {
	WP_CLI::warning( '  No location taxonomy terms found.' );
}

WP_CLI::success( 'Global nav ready.' );
WP_CLI::log( '' );

WP_CLI::log( '--- BTB Location Nav Template ---' );
$loc_id = btb5_get_or_create_menu( 'BTB Location Nav Template', 'btb-location-nav-template' );

btb5_add_item( $loc_id, 'Home',        '/',         0, 1 );
$rentals_id = btb5_add_item( $loc_id, 'Rentals',   '#',         0, 2 );
btb5_add_item( $loc_id, 'Local Picks', '#',         0, 3 );
btb5_add_item( $loc_id, 'Contact Us',  '/contact/', 0, 4 );

foreach ( [ 'Bikes', 'Paddle', '4x4', 'Accessories' ] as $i => $child ) {
	btb5_add_item( $loc_id, $child, '#', $rentals_id, $i + 1 );
}

WP_CLI::success( 'Location nav template ready.' );
WP_CLI::log( '' );

WP_CLI::log( '--- Assigning menus to theme locations ---' );
$nav_locations                  = get_nav_menu_locations();
$nav_locations['global-nav']    = $global_id;
$nav_locations['location-nav']  = $loc_id;
set_theme_mod( 'nav_menu_locations', $nav_locations );
WP_CLI::success( 'Menus assigned.' );

// ---------------------------------------------------------------------------
// PHASE 2: Assign page-location.php template to location pages
// ---------------------------------------------------------------------------

WP_CLI::log( '' );
WP_CLI::log( '=== PHASE 2: Assigning page-location.php template ===' );
WP_CLI::log( '' );

$all_terms = get_terms( [ 'taxonomy' => 'category_state_location', 'hide_empty' => false ] );
$child_terms = array_filter(
	is_wp_error( $all_terms ) ? [] : (array) $all_terms,
	fn( $t ) => $t->parent !== 0
);

foreach ( $child_terms as $t ) {
	$page = null;

	// 1. Try via stored URL meta.
	$url = get_term_meta( $t->term_id, 'bt_cate_parent_location_url', true );
	if ( $url ) {
		$path = rtrim( parse_url( $url, PHP_URL_PATH ), '/' );
		$slug = ltrim( $path, '/' );
		$page = get_page_by_path( $slug );
	}

	// 2. Fallback: match post_name regardless of parent (handles Whitefish, Big Sky).
	if ( ! $page ) {
		$pages = get_posts( [
			'name'        => sanitize_title( $t->name ),
			'post_type'   => 'page',
			'post_status' => 'publish',
			'numberposts' => 1,
		] );
		$page = $pages ? $pages[0] : null;
	}

	if ( ! $page ) {
		WP_CLI::warning( "No page found for: {$t->name} — template not assigned." );
		continue;
	}

	update_post_meta( $page->ID, '_wp_page_template', 'page-location.php' );
	WP_CLI::log( "  Set template: {$page->post_title} (ID: {$page->ID})" );
}

WP_CLI::success( 'Templates assigned.' );

// ---------------------------------------------------------------------------
// PHASE 3: Build per-location menus
// ---------------------------------------------------------------------------

WP_CLI::log( '' );
WP_CLI::log( '=== PHASE 3: Building per-location menus ===' );
WP_CLI::log( '' );

$GLOBALS['btb5_url_overrides'] = [
	'whitefish|water'   => '/whitefish/paddle-board-rentals-in-whitefish/',
	'mammoth|bike-shop' => '/mammoth/service',
];

$rentals_labels = [
	'bikes',
	'paddle',
	'4x4',
	'accessories',
	'e-bikes',
	'water',
];

$location_pages = get_posts( [
	'post_type'      => 'page',
	'post_status'    => 'publish',
	'posts_per_page' => -1,
	'orderby'        => 'title',
	'order'          => 'ASC',
	'meta_query'     => [
		[
			'key'   => '_wp_page_template',
			'value' => 'page-location.php',
		],
	],
] );

if ( empty( $location_pages ) ) {
	WP_CLI::error( 'No pages found using page-location.php template after Phase 2 — something went wrong.' );
}

WP_CLI::log( sprintf( 'Found %d location page(s).', count( $location_pages ) ) );
WP_CLI::log( '' );

foreach ( $location_pages as $page ) {
	$location_name  = get_the_title( $page->ID );
	$location_slug  = sanitize_title( $location_name );
	$menu_name      = "BTB {$location_name} Nav";
	$menu_slug      = "btb-{$location_slug}-nav";

	$tabs           = btb5_get_location_tabs( $page->ID );
	$rental_items   = [];
	$toplevel_items = [];

	foreach ( $tabs as $label ) {
		if ( in_array( strtolower( $label ), $rentals_labels, true ) ) {
			$rental_items[] = $label;
		} else {
			$toplevel_items[] = $label;
		}
	}

	WP_CLI::log( "Building: {$menu_name}" );

	$menu_id = btb5_get_or_create_menu( $menu_name, $menu_slug );
	$pos     = 1;

	btb5_add_item( $menu_id, 'Home', '/', 0, $pos++ );

	if ( $rental_items ) {
		$rentals_id = btb5_add_item( $menu_id, 'Rentals', '#', 0, $pos++ );
		foreach ( $rental_items as $i => $label ) {
			$url = btb5_find_service_page_url( $label, $location_name );
			if ( ! $url ) {
				WP_CLI::warning( "  No page found for rental '{$label}' — using #." );
				$url = '#';
			}
			btb5_add_item( $menu_id, $label, $url, $rentals_id, $i + 1 );
		}
		WP_CLI::log( '  Rentals : ' . implode( ', ', $rental_items ) );
	}

	foreach ( $toplevel_items as $label ) {
		$url = btb5_find_service_page_url( $label, $location_name );
		if ( ! $url ) {
			WP_CLI::warning( "  No page found for '{$label}' — using #." );
			$url = '#';
		}
		btb5_add_item( $menu_id, $label, $url, 0, $pos++ );
	}

	if ( $toplevel_items ) {
		WP_CLI::log( '  Top-level: ' . implode( ', ', $toplevel_items ) );
	}

	btb5_add_item( $menu_id, 'Local Picks', '#',         0, $pos++ );
	btb5_add_item( $menu_id, 'Contact Us',  '/contact/', 0, $pos++ );

	if ( ! $tabs ) {
		WP_CLI::warning( "  No tabs found for {$location_name} — menu has no service items." );
	}

	WP_CLI::success( "  {$menu_name} ready." );
	WP_CLI::log( '' );
}

WP_CLI::success( 'All location menus built.' );
WP_CLI::log( 'Next: verify nav renders correctly on each location page.' );
