<?php
/**
 * WW-49: Fix bt_cate_parent_location_url for all category_state_location terms
 *
 * The btb_location_picker_li() function reads bt_cate_parent_location_url
 * term meta. If missing, it falls back to get_term_link() which returns the
 * taxonomy archive URL (/category_state_location/whitefish/) instead of the
 * location page (/whitefish/).
 *
 * This script matches each term to its location page by slug and sets/updates
 * the meta. Supersedes ww-49-fix-big-sky-location-url.php.
 *
 * Usage:
 *   wp eval-file wp-content/themes/blacktieskis/_dev-docs/scripts/ww-49-fix-location-urls.php
 *
 * Idempotent — safe to run multiple times.
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Run via WP-CLI.' . PHP_EOL );
}

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
	// Find a published page whose slug matches the term slug.
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
