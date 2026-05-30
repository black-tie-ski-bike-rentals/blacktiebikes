<?php
/**
 * WW-49: Locations popup — consolidated setup script
 *
 * 1. Updates the bt_booknow_description ACF option field (popup content).
 * 2. Sets bt_cate_parent_location_url term meta for all category_state_location
 *    terms so the location picker links to the correct page instead of the
 *    taxonomy archive URL.
 *
 * Supersedes:
 *   ww-49-booknow-popup-content.php
 *   ww-49-fix-location-urls.php
 *   ww-49-fix-big-sky-location-url.php
 *
 * Idempotent — safe to run multiple times.
 *
 * Usage (run from the WordPress root):
 *   wp eval-file wp-content/themes/blacktieskis/_dev-docs/scripts/ww-49-consolidated.php
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Run via WP-CLI: wp eval-file wp-content/themes/blacktieskis/_dev-docs/scripts/ww-49-consolidated.php' . PHP_EOL );
}

// ---------------------------------------------------------------------------
// 1. Book Now popup content
// ---------------------------------------------------------------------------

WP_CLI::log( '--- Book Now popup content ---' );

$content = '<p><em>Book today with Black Tie and let the adventures begin!</em></p>
<h3>Select Your Destination:</h3>
<p>
  <a href="https://booknow.blacktiebikes.com/reservations/step1" target="_blank">Banff</a><br>
  <a href="https://booknow.blacktiebikes.com/reservations/step1" target="_blank">Big Sky</a><br>
  <a href="https://booknow.blacktiebikes.com/reservations/step1" target="_blank">Breckenridge</a><br>
  <a href="https://booknow.blacktiebikes.com/reservations/step1" target="_blank">Mammoth</a><br>
  <a href="https://booknow.blacktiebikes.com/reservations/step1" target="_blank">Park City / Deer Valley</a><br>
  <a href="https://booknow.blacktiebikes.com/reservations/step1" target="_blank">Sun Valley</a><br>
  <a href="https://booknow.blacktiebikes.com/reservations/step1" target="_blank">Telluride</a><br>
  <a href="https://booknow.blacktiebikes.com/reservations/step1" target="_blank">Vail / Beaver Creek</a><br>
  <a href="https://black-diamond-bikes.checkfront.com/reserve/" target="_blank">Whistler</a><br>
  <a href="https://booknow.blacktiebikes.com/reservations/step1" target="_blank">Whitefish</a>
</p>';

$updated = update_field( 'bt_booknow_description', $content, 'option' );

if ( $updated ) {
	WP_CLI::success( 'bt_booknow_description updated.' );
} else {
	$current = get_field( 'bt_booknow_description', 'option' );
	if ( $current === $content ) {
		WP_CLI::success( 'bt_booknow_description already up to date — no change needed.' );
	} else {
		WP_CLI::error( 'Failed to update bt_booknow_description.' );
	}
}

// ---------------------------------------------------------------------------
// 2. Location picker URLs
// ---------------------------------------------------------------------------

WP_CLI::log( '' );
WP_CLI::log( '--- Location picker URLs ---' );

$taxonomy = 'category_state_location';
$meta_key = 'bt_cate_parent_location_url';

$terms = get_terms( [
	'taxonomy'   => $taxonomy,
	'hide_empty' => false,
] );

if ( is_wp_error( $terms ) || empty( $terms ) ) {
	WP_CLI::error( "No terms found in {$taxonomy}." );
}

WP_CLI::log( 'Found ' . count( $terms ) . " terms in {$taxonomy}.\n" );

foreach ( $terms as $term ) {
	$page = get_page_by_path( $term->slug, OBJECT, 'page' );

	if ( ! $page ) {
		WP_CLI::warning( "  {$term->name}: no page found at /{$term->slug}/ — skipping." );
		continue;
	}

	$target_url = get_permalink( $page->ID );

	wp_cache_delete( $term->term_id, $taxonomy );
	$current = get_term_meta( $term->term_id, $meta_key, true );

	if ( $current === $target_url ) {
		WP_CLI::log( "  {$term->name}: already correct ({$target_url})" );
		continue;
	}

	$result = update_term_meta( $term->term_id, $meta_key, $target_url );

	if ( $result === false ) {
		WP_CLI::warning( "  {$term->name}: update_term_meta returned false." );
		continue;
	}

	wp_cache_delete( $term->term_id, $taxonomy );
	wp_cache_delete( "term_meta_{$term->term_id}", 'term_meta' );
	$verified = get_term_meta( $term->term_id, $meta_key, true );

	if ( $verified === $target_url ) {
		WP_CLI::log( "  {$term->name} → {$target_url}" );
	} else {
		WP_CLI::warning( "  {$term->name}: write succeeded but read-back mismatch — run: wp cache flush" );
	}
}

WP_CLI::success( 'Done. If on WP Engine, run: wp cache flush' );
