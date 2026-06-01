<?php
/**
 * WW-5: Location Menu Seeder
 *
 * Builds per-location nav menus from hardcoded tab data.
 * Use this on environments where ACF tabs_section data is missing
 * (e.g. staging/prod before a full DB sync).
 *
 * Tab data sourced from local explore_section ACF fields (post-WW-7 migration).
 * Routing: bikes/paddle/4x4/accessories/e-bikes/water → Rentals dropdown.
 *          Everything else → top-level between Rentals and Local Picks.
 *
 * Idempotent — safe to re-run.
 *
 * Usage:
 *   wp eval-file wp-content/themes/blacktieskis/_dev-docs/scripts/ww-5-seed-location-menus.php
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Run via WP-CLI.' . PHP_EOL );
}

// ---------------------------------------------------------------------------
// Tab data per location
// ---------------------------------------------------------------------------

$location_tabs = [
	'Banff'        => [ 'Bikes', 'Paddle', 'Accessories' ],
	'Big Sky'      => [ 'Bikes', 'Accessories' ],
	'Breckenridge' => [ 'Bikes', 'Accessories' ],
	'Mammoth'      => [ 'Bikes', 'Paddle', 'Tours', 'Bike Shop', 'Bike Shuttle Service' ],
	'Park City'    => [ 'Bikes', 'Tours' ],
	'Sun Valley'   => [ 'Bikes', 'Paddle', '4X4', 'Bike Shop' ],
	'Telluride'    => [ 'Bikes', 'Paddle', '4x4', 'Accessories' ],
	'Vail'         => [ 'Bikes', 'Accessories' ],
	'Whistler'     => [ 'Bikes', 'Services', 'FAQs' ],
	'Whitefish'    => [ 'Bikes', 'Water' ],
];

$rentals_labels = [ 'bikes', 'paddle', '4x4', 'accessories', 'e-bikes', 'water' ];

$url_overrides = [
	'whitefish|water'              => '/whitefish/paddle-board-rentals-in-whitefish/',
	'mammoth|bike-shop'            => '/mammoth/service',
	'mammoth|bike-shuttle-service' => '#',
	'whistler|services'            => '#',
	'whistler|faqs'                => '#',
	'park-city|tours'              => '#',
	'mammoth|tours'                => '#',
	'sun-valley|bike-shop'         => '#',
];

// ---------------------------------------------------------------------------
// Helpers
// ---------------------------------------------------------------------------

function btb_seed_find_url( string $tab_label, string $location_name, array $overrides ): string {
	global $wpdb;

	$key = sanitize_title( $location_name ) . '|' . sanitize_title( $tab_label );
	if ( isset( $overrides[ $key ] ) ) {
		return $overrides[ $key ];
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

	return '#';
}

function btb_seed_reset_menu( string $name, string $slug ): int {
	$menu = wp_get_nav_menu_object( $slug );

	if ( $menu ) {
		$items = wp_get_nav_menu_items( $menu->term_id, [ 'update_post_term_cache' => false ] );
		if ( $items ) {
			foreach ( $items as $item ) {
				wp_delete_post( $item->ID, true );
			}
		}
		WP_CLI::log( "  Cleared '{$name}'." );
		return (int) $menu->term_id;
	}

	$id = wp_create_nav_menu( $name );
	if ( is_wp_error( $id ) ) {
		WP_CLI::error( "Failed to create '{$name}': " . $id->get_error_message() );
	}
	WP_CLI::log( "  Created '{$name}'." );
	return (int) $id;
}

function btb_seed_add_item( int $menu_id, string $label, string $url, int $parent_id = 0, int $pos = 1 ): int {
	$args = [
		'menu-item-title'    => $label,
		'menu-item-url'      => $url,
		'menu-item-status'   => 'publish',
		'menu-item-type'     => 'custom',
		'menu-item-position' => $pos,
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

// ---------------------------------------------------------------------------
// Build menus
// ---------------------------------------------------------------------------

WP_CLI::log( '' );
WP_CLI::log( sprintf( 'Seeding %d location menus...', count( $location_tabs ) ) );
WP_CLI::log( '' );

foreach ( $location_tabs as $location_name => $tabs ) {
	$slug    = "btb-" . sanitize_title( $location_name ) . "-nav";
	$name    = "BTB {$location_name} Nav";
	$menu_id = btb_seed_reset_menu( $name, $slug );
	$pos     = 1;

	$rental_items   = [];
	$toplevel_items = [];

	foreach ( $tabs as $label ) {
		if ( in_array( strtolower( $label ), $rentals_labels, true ) ) {
			$rental_items[] = $label;
		} else {
			$toplevel_items[] = $label;
		}
	}

	btb_seed_add_item( $menu_id, 'Home', '/', 0, $pos++ );

	if ( $rental_items ) {
		$rentals_id = btb_seed_add_item( $menu_id, 'Rentals', '#', 0, $pos++ );
		foreach ( $rental_items as $i => $label ) {
			$url = btb_seed_find_url( $label, $location_name, $url_overrides );
			btb_seed_add_item( $menu_id, $label, $url, $rentals_id, $i + 1 );
		}
		WP_CLI::log( "  Rentals   : " . implode( ', ', $rental_items ) );
	}

	foreach ( $toplevel_items as $label ) {
		$url = btb_seed_find_url( $label, $location_name, $url_overrides );
		btb_seed_add_item( $menu_id, $label, $url, 0, $pos++ );
		WP_CLI::log( "  Top-level : {$label}" );
	}

	btb_seed_add_item( $menu_id, 'Local Picks', '#',         0, $pos++ );
	btb_seed_add_item( $menu_id, 'Contact Us',  '/contact/', 0, $pos++ );

	WP_CLI::success( "{$name} ready." );
	WP_CLI::log( '' );
}

WP_CLI::success( 'All location menus seeded.' );
WP_CLI::log( 'Next: verify nav on each location page on staging.' );
