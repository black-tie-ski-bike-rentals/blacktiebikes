<?php
/**
 * WW-20: Add Instagram to social media repeater
 *
 * Usage: wp eval-file wp-content/themes/blacktieskis/_dev-docs/scripts/ww-20.php
 */

$instagram_url = 'https://www.instagram.com/blacktieskirentals/';

// Get existing rows and check if Instagram already exists
$rows = get_field( 'bt_social_media', 'option' );

if ( is_array( $rows ) ) {
    foreach ( $rows as $row ) {
        if ( isset( $row['icon'] ) && $row['icon'] === 'Instagram' ) {
            WP_CLI::success( 'Instagram already exists in social media — skipping.' );
            return;
        }
    }
} else {
    $rows = [];
}

$rows[] = [
    'icon' => 'Instagram',
    'link' => $instagram_url,
];

update_field( 'bt_social_media', $rows, 'option' );

WP_CLI::success( 'WW-20 complete. Instagram added to footer social icons.' );
