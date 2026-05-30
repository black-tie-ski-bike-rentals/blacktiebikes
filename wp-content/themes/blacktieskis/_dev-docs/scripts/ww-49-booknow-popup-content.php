<?php
/**
 * WW-49: Book Now popup content update
 *
 * Updates the bt_booknow_description ACF option field:
 * - New title text, italic/reduced weight
 * - Replaces "Select Location" link with an h3 heading
 * - Adds target="_blank" to all location links
 *
 * Idempotent — safe to run multiple times.
 *
 * Usage (run from the WordPress root):
 *   wp eval-file wp-content/themes/blacktieskis/_dev-docs/scripts/ww-49-booknow-popup-content.php
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Run via WP-CLI: wp eval-file wp-content/themes/blacktieskis/_dev-docs/scripts/ww-49-booknow-popup-content.php' . PHP_EOL );
}

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
