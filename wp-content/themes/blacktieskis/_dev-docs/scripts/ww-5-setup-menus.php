<?php
/**
 * WW-5: Navigation Menu Setup
 *
 * Creates the global nav and location nav template menus.
 * Idempotent — existing items are cleared and rebuilt on each run.
 *
 * Usage (run from the WordPress root):
 *   wp eval-file wp-content/themes/blacktieskis/_dev-docs/scripts/ww-5-setup-menus.php
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Run via WP-CLI: wp eval-file wp-content/themes/blacktieskis/_dev-docs/scripts/ww-5-setup-menus.php' . PHP_EOL );
}

// ---------------------------------------------------------------------------
// Helpers
// ---------------------------------------------------------------------------

/**
 * Returns the term_id of a named menu, creating it if needed.
 * Clears all existing items so the menu is always rebuilt from a clean state.
 */
function btb_get_or_create_menu( string $name, string $slug ): int {
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

/**
 * Inserts a custom-link menu item and returns its post ID.
 * Pass $parent_id to nest it under another item.
 */
function btb_add_item( int $menu_id, string $label, string $url, int $parent_id = 0, int $position = 1 ): int {
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

// ---------------------------------------------------------------------------
// 1. Global Nav  (slug: btb-global-nav)
//
// Structure:
//   Locations  ← dropdown; children populated from category_state_location
//   Contact    → /contact/
//   About Us   → /#about  (homepage anchor)
//   Jobs       → #        (popup trigger — class popup-is-open-v2 set below)
// ---------------------------------------------------------------------------
WP_CLI::log( '' );
WP_CLI::log( '=== Building: BTB Global Nav ===' );

$global_id = btb_get_or_create_menu( 'BTB Global Nav', 'btb-global-nav' );

$locations_id = btb_add_item( $global_id, 'Locations', '#',         0, 1 );
               btb_add_item( $global_id, 'Contact',   '/contact/', 0, 2 );
               btb_add_item( $global_id, 'About Us',  '/#about',   0, 3 );
$jobs_id     = btb_add_item( $global_id, 'Jobs',       '#',         0, 4 );

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

// Populate Locations dropdown from the location taxonomy.
// The category_state_location taxonomy is hierarchical:
//   - parent = 0  →  state/region groupings  (e.g. "Colorado")
//   - parent != 0 →  individual resort/city locations  (e.g. "Telluride")
// The dropdown links to individual locations only.
$all_terms = get_terms( [
	'taxonomy'   => 'category_state_location',
	'hide_empty' => false,
] );

// Locations to hide from the global nav dropdown.
// Remove a slug here once that location is active again.
$hidden_locations = [ 'north-tahoe' ];

$location_terms = array_filter(
	is_wp_error( $all_terms ) ? [] : (array) $all_terms,
	static fn( $t ) => $t->parent !== 0 && ! in_array( $t->slug, $hidden_locations, true )
);

if ( $location_terms ) {
	usort( $location_terms, static fn( $a, $b ) => strcmp( $a->name, $b->name ) );
	$pos = 1;
	foreach ( $location_terms as $term ) {
		// Prefer the URL stored in the ACF meta field; fall back to taxonomy archive link.
		$url = get_term_meta( $term->term_id, 'bt_cate_parent_location_url', true );
		if ( ! $url ) {
			$link = get_term_link( $term );
			$url  = is_wp_error( $link ) ? '#' : $link;
		}
		btb_add_item( $global_id, $term->name, $url, $locations_id, $pos++ );
	}
	WP_CLI::log( '  Added ' . count( $location_terms ) . ' location(s) to Locations dropdown.' );
} else {
	WP_CLI::warning( '  No location taxonomy terms found. Add Locations dropdown children manually once location pages exist.' );
}

WP_CLI::success( 'Global nav ready.' );

// ---------------------------------------------------------------------------
// 2. Location Nav Template  (slug: btb-location-nav)
//
// Structure:
//   Home        → /
//   Rentals     ← dropdown
//     Bikes     → #
//     Paddle    → #
//     4x4       → #
//     Accessories → #
//   Local Picks → #  (placeholder — page per location created separately)
//   Contact Us  → /contact/
//
// This is a template. Per-location menus are wired in the theme using this
// slug as the base, or cloned per location once service pages exist.
// ---------------------------------------------------------------------------
WP_CLI::log( '' );
WP_CLI::log( '=== Building: BTB Location Nav Template ===' );

$loc_id = btb_get_or_create_menu( 'BTB Location Nav Template', 'btb-location-nav-template' );

btb_add_item( $loc_id, 'Home',       '/',         0, 1 );
$rentals_id = btb_add_item( $loc_id, 'Rentals',   '#',         0, 2 );
btb_add_item( $loc_id, 'Local Picks', '#',         0, 3 );
btb_add_item( $loc_id, 'Contact Us',  '/contact/', 0, 4 );

foreach ( [ 'Bikes', 'Paddle', '4x4', 'Accessories' ] as $i => $child ) {
	btb_add_item( $loc_id, $child, '#', $rentals_id, $i + 1 );
}

WP_CLI::success( 'Location nav template ready.' );

// ---------------------------------------------------------------------------
// 3. Assign menus to theme locations
//
// Merges into the existing nav_menu_locations theme mod so that main_menu
// and footer_menu assignments are preserved.
// ---------------------------------------------------------------------------
WP_CLI::log( '' );
WP_CLI::log( '=== Assigning menus to theme locations ===' );

$nav_locations = get_nav_menu_locations();
$nav_locations['global-nav']   = $global_id;
$nav_locations['location-nav'] = $loc_id;
set_theme_mod( 'nav_menu_locations', $nav_locations );

WP_CLI::success( 'Menus assigned: global-nav → BTB Global Nav, location-nav → BTB Location Nav Template.' );

// ---------------------------------------------------------------------------
// Post-run checklist
// ---------------------------------------------------------------------------
WP_CLI::log( '' );
WP_CLI::log( 'Next steps:' );
WP_CLI::log( '  1. In WP Admin, switch existing location pages to the "Location Page" template.' );
WP_CLI::log( '  2. Replace # placeholder URLs once service/location pages are created.' );
