<?php
/**
 * WW-49: Fix Big Sky location-picker URL
 *
 * The btb_location_picker_li() function reads bt_cate_parent_location_url
 * term meta for each category_state_location term. If that meta is missing,
 * it falls back to get_term_link() which returns the taxonomy archive URL
 * (/category_state_location/big-sky/) instead of the location page (/big-sky/).
 *
 * This script:
 *   1. Finds the Big Sky term (by slug, not hardcoded ID — safe across envs).
 *   2. Reports its current state.
 *   3. Sets/updates the meta to home_url('/big-sky/').
 *   4. Reads it back to confirm the write succeeded.
 *
 * Usage:
 *   wp eval-file wp-content/themes/blacktieskis/_dev-docs/scripts/ww-49-fix-big-sky-location-url.php
 *
 * After running, flush the object cache if on WP Engine:
 *   wp cache flush
 *
 * Idempotent — safe to run multiple times.
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Run via WP-CLI: wp eval-file wp-content/themes/blacktieskis/_dev-docs/scripts/ww-49-fix-big-sky-location-url.php' . PHP_EOL );
}

$taxonomy   = 'category_state_location';
$meta_key   = 'bt_cate_parent_location_url';
$target_url = home_url( '/big-sky/' );

// ---------------------------------------------------------------------------
// 1. Find the Big Sky term by slug.
// ---------------------------------------------------------------------------

$term = get_term_by( 'slug', 'big-sky', $taxonomy );

if ( ! $term || is_wp_error( $term ) ) {
	// Slug might differ — fall back to a name search.
	$terms = get_terms( [
		'taxonomy'   => $taxonomy,
		'hide_empty' => false,
		'name'       => 'Big Sky',
	] );

	if ( is_wp_error( $terms ) || empty( $terms ) ) {
		WP_CLI::error( "Could not find a 'Big Sky' term in {$taxonomy}. Check the taxonomy name and term spelling." );
	}

	$term = $terms[0];
}

WP_CLI::log( "Found term: {$term->name} (ID: {$term->term_id}, slug: {$term->slug}, parent: {$term->parent})" );

// ---------------------------------------------------------------------------
// 2. Report current meta value.
// ---------------------------------------------------------------------------

// Bypass object cache so we read straight from the DB.
wp_cache_delete( $term->term_id, $taxonomy );
$current = get_term_meta( $term->term_id, $meta_key, true );

if ( $current ) {
	WP_CLI::log( "Current {$meta_key}: {$current}" );
} else {
	WP_CLI::log( "Current {$meta_key}: (not set)" );
}

// ---------------------------------------------------------------------------
// 3. Set/update the meta.
// ---------------------------------------------------------------------------

// update_term_meta creates the row if it doesn't exist, updates if it does.
$result = update_term_meta( $term->term_id, $meta_key, $target_url );

if ( $result === false ) {
	WP_CLI::error( "update_term_meta returned false — the value may already equal the target, or a DB error occurred." );
} elseif ( $result === true || is_int( $result ) ) {
	WP_CLI::log( "Set {$meta_key} → {$target_url}" );
} else {
	// update_term_meta returns the meta ID (int) on insert, true on update, false on failure.
	WP_CLI::warning( "Unexpected return value from update_term_meta: " . var_export( $result, true ) );
}

// ---------------------------------------------------------------------------
// 4. Read back to verify (bypass cache).
// ---------------------------------------------------------------------------

wp_cache_delete( $term->term_id, $taxonomy );
// Also delete the term meta cache key WordPress uses internally.
wp_cache_delete( "term_meta_{$term->term_id}", 'term_meta' );

$verified = get_term_meta( $term->term_id, $meta_key, true );

if ( $verified === $target_url ) {
	WP_CLI::success( "Verified: {$meta_key} = {$verified}" );
} else {
	WP_CLI::warning( "Read-back mismatch. Got: " . var_export( $verified, true ) );
	WP_CLI::log( 'This usually means a persistent object cache (Memcached/Redis) is returning a stale value.' );
	WP_CLI::log( 'Run: wp cache flush' );
}

// ---------------------------------------------------------------------------
// 5. Remind about object cache.
// ---------------------------------------------------------------------------

WP_CLI::log( '' );
WP_CLI::log( 'If on WP Engine staging, flush the persistent cache:' );
WP_CLI::log( '  wp cache flush' );
WP_CLI::log( 'Then reload a location page and verify Big Sky links to /big-sky/.' );
