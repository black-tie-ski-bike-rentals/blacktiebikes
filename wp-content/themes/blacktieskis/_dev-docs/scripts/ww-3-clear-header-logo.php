<?php
/**
 * WW-3: Clear the bt_header_logo ACF option so the theme falls back to BTS-logo.png
 *
 * Usage: wp eval-file wp-content/themes/blacktieskis/_dev-docs/scripts/ww-3-clear-header-logo.php
 */

$current = get_field( 'bt_header_logo', 'option' );

if ( empty( $current ) ) {
    WP_CLI::success( 'bt_header_logo is already empty — no change needed.' );
    return;
}

update_field( 'bt_header_logo', '', 'option' );

$after = get_field( 'bt_header_logo', 'option' );

if ( empty( $after ) ) {
    WP_CLI::success( 'bt_header_logo cleared. Header will now use theme fallback: BTS-logo.png' );
} else {
    WP_CLI::error( 'Failed to clear bt_header_logo.' );
}
