<?php
/**
 * WW-5: Per-Location Nav Menu Builder
 *
 * Finds all pages using the Location Page template, reads their ACF service
 * tabs, and creates (or rebuilds) a unique nav menu per location.
 *
 * Usage:
 *   # Dry run (hardcode $dry_run = true below):
 *   wp eval-file wp-content/themes/blacktieskis/_dev-docs/scripts/ww-5-build-location-menus.php
 *
 *   # Build/rebuild all menus:
 *   wp eval-file wp-content/themes/blacktieskis/_dev-docs/scripts/ww-5-build-location-menus.php
 *
 * Idempotent — re-running clears and rebuilds each menu from scratch.
 * Does NOT assign menus to theme locations; template.php looks them up by slug.
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Run via WP-CLI: wp eval-file wp-content/themes/blacktieskis/_dev-docs/scripts/ww-5-build-location-menus.php' . PHP_EOL );
}

// Set to true to preview without writing anything to the DB.
$dry_run = false;

// ---------------------------------------------------------------------------
// Tab label routing
//
// Labels in this list go under the Rentals dropdown as sub-items.
// Everything else becomes a top-level nav item between Rentals and Local Picks.
// Comparison is case-insensitive.
// ---------------------------------------------------------------------------
$rentals_labels = [
	'bikes',
	'paddle',
	'4x4',
	'accessories',
	'e-bikes',
	'water',
];

// Explicit URL overrides for pages the title-search can't match automatically.
// Key format: "{sanitize_title(location_name)}|{sanitize_title(tab_label)}"
// Note: defined via $GLOBALS so nested functions can access it under wp eval-file.
$GLOBALS['url_overrides'] = [
	'whitefish|water'    => '/whitefish/paddle-board-rentals-in-whitefish/',
	'mammoth|bike-shop'  => '/mammoth/service',
];

if ( $dry_run ) {
	WP_CLI::log( '' );
	WP_CLI::log( '=== DRY RUN — no menus will be created or modified ===' );
	WP_CLI::log( '' );
}

// ---------------------------------------------------------------------------
// Helpers
// ---------------------------------------------------------------------------

/**
 * Reads service tab labels from a location page's ACF flexible content.
 */
function btb_get_location_tabs( int $post_id ): array {
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

		break; // Only process the first tabs_section per page
	}

	return $tabs;
}

/**
 * Looks up a dedicated service page by matching tab label and location name.
 * Strips a trailing 's' to handle plurals (e.g. "Bikes" → "Bike Rentals in Telluride").
 * Returns the permalink if found, empty string otherwise.
 */
function btb_find_service_page_url( string $tab_label, string $location_name ): string {
	global $wpdb;

	$overrides    = $GLOBALS['url_overrides'] ?? [];
	$override_key = sanitize_title( $location_name ) . '|' . sanitize_title( $tab_label );
	if ( isset( $overrides[ $override_key ] ) ) {
		return $overrides[ $override_key ];
	}

	$search_terms = array_unique( [ $tab_label, rtrim( $tab_label, 's' ) ] );

	foreach ( $search_terms as $term ) {
		// First pass: prefer pages with "Rentals" in the title to avoid
		// false matches like "Mammoth Lakes Bike Tours" for the "Bikes" tab.
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

		// Second pass: no "Rentals" requirement — catches Tours, Bike Shop etc.
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

/**
 * Returns the term_id of a named menu (by slug), creating it if it doesn't
 * exist. Always clears existing items so the menu is rebuilt clean.
 */
function btb_reset_menu( string $name, string $slug ): int {
	$menu = wp_get_nav_menu_object( $slug );

	if ( $menu ) {
		$items = wp_get_nav_menu_items( $menu->term_id, [ 'update_post_term_cache' => false ] );
		if ( $items ) {
			foreach ( $items as $item ) {
				wp_delete_post( $item->ID, true );
			}
		}
		WP_CLI::log( "  Cleared existing menu '{$name}'." );
		return (int) $menu->term_id;
	}

	$menu_id = wp_create_nav_menu( $name );
	if ( is_wp_error( $menu_id ) ) {
		WP_CLI::error( "Failed to create menu '{$name}': " . $menu_id->get_error_message() );
	}

	WP_CLI::log( "  Created menu '{$name}' (ID: {$menu_id})." );
	return (int) $menu_id;
}

/**
 * Inserts a custom-link menu item. Pass $parent_id to nest it.
 */
function btb_add_item( int $menu_id, string $label, string $url, int $parent_id = 0, int $position = 1 ): int {
	$item_args = [
		'menu-item-title'    => $label,
		'menu-item-url'      => $url,
		'menu-item-status'   => 'publish',
		'menu-item-type'     => 'custom',
		'menu-item-position' => $position,
	];

	if ( $parent_id ) {
		$item_args['menu-item-parent-id'] = $parent_id;
	}

	$item_id = wp_update_nav_menu_item( $menu_id, 0, $item_args );

	if ( is_wp_error( $item_id ) ) {
		WP_CLI::warning( "  Could not add '{$label}': " . $item_id->get_error_message() );
		return 0;
	}

	return (int) $item_id;
}

// ---------------------------------------------------------------------------
// 1. Find all location pages
// ---------------------------------------------------------------------------

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
	WP_CLI::error( 'No pages found using the page-location.php template. Aborting.' );
}

WP_CLI::log( sprintf( 'Found %d location page(s).', count( $location_pages ) ) );

$telluride_found = false;
foreach ( $location_pages as $p ) {
	if ( $p->ID === 29175 ) {
		$telluride_found = true;
		break;
	}
}
if ( ! $telluride_found ) {
	WP_CLI::warning( 'Telluride (ID 29175) not in results — double-check that the template query is working.' );
}

WP_CLI::log( '' );

// ---------------------------------------------------------------------------
// 2. Process each location
// ---------------------------------------------------------------------------

foreach ( $location_pages as $page ) {
	$location_name  = get_the_title( $page->ID );
	$location_slug  = sanitize_title( $location_name );
	$menu_name      = "BTB {$location_name} Nav";
	$menu_slug      = "btb-{$location_slug}-nav";

	$tabs           = btb_get_location_tabs( $page->ID );
	$rental_items   = [];
	$toplevel_items = [];

	foreach ( $tabs as $label ) {
		if ( in_array( strtolower( $label ), $rentals_labels, true ) ) {
			$rental_items[] = $label;
		} else {
			$toplevel_items[] = $label;
		}
	}

	// --- Dry run ---
	if ( $dry_run ) {
		WP_CLI::log( "Location : {$location_name} (ID: {$page->ID})" );
		WP_CLI::log( "  Menu   : {$menu_name}  (slug: {$menu_slug})" );

		foreach ( $rental_items as $label ) {
			$url = btb_find_service_page_url( $label, $location_name );
			WP_CLI::log( "  Rental : {$label} → " . ( $url ?: '# (no page found)' ) );
		}

		foreach ( $toplevel_items as $label ) {
			$url = btb_find_service_page_url( $label, $location_name );
			WP_CLI::log( "  Top    : {$label} → " . ( $url ?: '# (no page found)' ) );
		}

		WP_CLI::log( '  Top    : Local Picks → # (placeholder)' );
		WP_CLI::log( '  Top    : Contact Us → /contact/' );

		if ( ! $tabs ) {
			WP_CLI::warning( '  Tabs   : NONE FOUND — ACF data missing or tabs_section layout not present.' );
		}

		WP_CLI::log( '' );
		continue;
	}

	// --- Live run ---
	WP_CLI::log( "Building: {$menu_name}" );

	$menu_id = btb_reset_menu( $menu_name, $menu_slug );
	$pos     = 1;

	// Home
	btb_add_item( $menu_id, 'Home', '/', 0, $pos++ );

	// Rentals dropdown
	if ( $rental_items ) {
		$rentals_id = btb_add_item( $menu_id, 'Rentals', '#', 0, $pos++ );
		foreach ( $rental_items as $i => $label ) {
			$url = btb_find_service_page_url( $label, $location_name );
			if ( ! $url ) {
				WP_CLI::warning( "  No page found for rental '{$label}' — using #." );
				$url = '#';
			}
			btb_add_item( $menu_id, $label, $url, $rentals_id, $i + 1 );
		}
		WP_CLI::log( '  Rentals : ' . implode( ', ', $rental_items ) );
	}

	// Top-level service items
	foreach ( $toplevel_items as $label ) {
		$url = btb_find_service_page_url( $label, $location_name );
		if ( ! $url ) {
			WP_CLI::warning( "  No page found for '{$label}' — using #." );
			$url = '#';
		}
		btb_add_item( $menu_id, $label, $url, 0, $pos++ );
	}

	if ( $toplevel_items ) {
		WP_CLI::log( '  Top-level: ' . implode( ', ', $toplevel_items ) );
	}

	// Fixed items — placeholder until WW-53 creates the pages
	btb_add_item( $menu_id, 'Local Picks', '#', 0, $pos++ );
	btb_add_item( $menu_id, 'Contact Us',  '/contact/', 0, $pos++ );

	if ( ! $tabs ) {
		WP_CLI::warning( "  No tabs found for {$location_name} — menus will have no service items." );
	}

	WP_CLI::success( "  {$menu_name} ready." );
	WP_CLI::log( '' );
}

// ---------------------------------------------------------------------------
// Done
// ---------------------------------------------------------------------------

if ( $dry_run ) {
	WP_CLI::log( '=== Dry run complete. Review output above, then rerun with $dry_run = false to write menus. ===' );
} else {
	WP_CLI::success( 'All location menus built.' );
	WP_CLI::log( 'Next: verify nav renders correctly on each location page.' );
}