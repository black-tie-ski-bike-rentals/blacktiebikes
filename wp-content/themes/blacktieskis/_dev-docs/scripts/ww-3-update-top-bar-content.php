<?php
/**
 * WW-3: Update content_top_bar ACF option field
 *
 * Fixes:
 *   - Replaces old green #01b037 with brand green #568F3B in inline CSS
 *   - Replaces hardcoded domain in image URLs with current site_url()
 *
 * Idempotent — safe to run multiple times.
 *
 * Usage:
 *   wp eval-file wp-content/themes/blacktieskis/_dev-docs/scripts/ww-3-update-top-bar-content.php
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Run via WP-CLI: wp eval-file ...' . PHP_EOL );
}

$content = get_field( 'content_top_bar', 'option' );

if ( ! $content ) {
	WP_CLI::error( 'content_top_bar field is empty or not found.' );
}

$original = $content;

// Fix old green → brand green.
$content = str_replace( '#01b037', '#568F3B', $content );

// Replace switch.png toggle image with theme SVG (environment-independent).
$template_url = get_stylesheet_directory_uri();
$svg_img = '<img src="' . $template_url . '/images/toggle-sun.svg" alt="Switch to Winter" class="toggle-sun-img" width="60" height="30">';

// Desktop: not wrapped in <a>, so add link.
$content = preg_replace_callback(
	'/<img[^>]+switch\.png[^>]*>/i',
	function() use ( $svg_img ) {
		return '<a href="https://www.blacktieskis.com/" target="_blank">' . $svg_img . '</a>';
	},
	$content
);

// Mobile: already wrapped in <a>, just replace the <img>.
$content = preg_replace_callback(
	'/<img[^>]+mob-switch\.png[^>]*>/i',
	function() use ( $svg_img ) {
		return $svg_img;
	},
	$content
);

// Refresh any SVG img already in content (re-run: ensures class + correct attributes).
$content = preg_replace_callback(
	'/<img[^>]+toggle-sun\.svg[^>]*>/i',
	function() use ( $svg_img ) {
		return $svg_img;
	},
	$content
);

// Inject sizing rule into the inline <style> block so max-width:100% can't override it.
$toggle_css = '.toggle-sun-img{width:60px!important;height:30px!important;max-width:none!important;}';
if ( strpos( $content, '.toggle-sun-img{' ) === false ) {
	$content = preg_replace( '/(<\/style>)/i', $toggle_css . '$1', $content, 1 );
}

// Fix any remaining hardcoded domains in other URLs → current site URL.
$site_url = untrailingslashit( site_url() );
$patterns = [
	'https://blacktiebikes-sent.local',
	'https://blacktiebikstg.wpenginepowered.com',
	'https://www.blacktiebikes.com',
	'https://blacktiesummer.wpengine.com',
];
foreach ( $patterns as $pattern ) {
	if ( $pattern !== $site_url ) {
		$content = str_replace( $pattern, $site_url, $content );
	}
}

if ( $content === $original ) {
	WP_CLI::success( 'content_top_bar already up to date — no change needed.' );
	return;
}

$updated = update_field( 'content_top_bar', $content, 'option' );

if ( $updated ) {
	WP_CLI::success( 'content_top_bar updated.' );
} else {
	WP_CLI::error( 'Failed to update content_top_bar.' );
}
