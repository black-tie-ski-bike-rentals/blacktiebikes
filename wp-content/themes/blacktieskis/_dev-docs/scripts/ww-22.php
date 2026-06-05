<?php
/**
 * WW-22: Update 1-5 value props — content text and images
 *
 * Usage: wp eval-file wp-content/themes/blacktieskis/_dev-docs/scripts/ww-22.php
 */

require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/image.php';

$post_id = 20; // Homepage

$steps = [
    0 => [
        'title' => 'Multiple Destinations',
        'desc'  => 'Choose from top locations and get gear ready for your trip.',
        'image' => 'multiple-destinations.jpg',
    ],
    1 => [
        'title' => 'Delivery or Pickup',
        'desc'  => 'Delivered to your stay or ready at our local shop.',
        'image' => 'delivery-or-pickup.jpeg',
    ],
    2 => [
        'title' => 'Personalized Fit',
        'desc'  => 'Our team ensures everything fits and rides perfectly.',
        'image' => 'personalized-fit.jpg',
    ],
    3 => [
        'title' => 'On-Trip Support',
        'desc'  => 'Need an adjustment or swap? We\'re just a call away!',
        'image' => 'on-trip-support.jpg',
    ],
    4 => [
        'title' => 'Easy Returns',
        'desc'  => 'We\'ll pick it up or you can drop it off. It\'s simple either way!',
        'image' => 'easy-returns.jpg',
    ],
];

foreach ( $steps as $index => $step ) {
    $step_num = $index + 1;

    // -- Content --
    $content     = '<h2>' . $step['title'] . '</h2><p>' . $step['desc'] . '</p>';
    $content_key = "bt_templates_1_items_{$index}_content";
    update_post_meta( $post_id, $content_key, $content );
    WP_CLI::log( "Step {$step_num}: updated content — {$step['title']}" );

    // -- Image --
    $image_url = get_stylesheet_directory_uri() . '/images/' . $step['image'];
    $photo_key = "bt_templates_1_items_{$index}_photo";

    // Idempotency: check if already imported from this source URL
    $existing = get_posts( [
        'post_type'      => 'attachment',
        'meta_key'       => '_source_url',
        'meta_value'     => $image_url,
        'posts_per_page' => 1,
        'fields'         => 'ids',
    ] );

    if ( ! empty( $existing ) ) {
        $attachment_id = $existing[0];
        WP_CLI::log( "Step {$step_num}: image already imported (ID: {$attachment_id}), reusing." );
    } else {
        $attachment_id = media_sideload_image( $image_url, $post_id, $step['title'], 'id' );

        if ( is_wp_error( $attachment_id ) ) {
            WP_CLI::warning( "Step {$step_num}: failed to import image — " . $attachment_id->get_error_message() );
            continue;
        }
        WP_CLI::log( "Step {$step_num}: imported image (ID: {$attachment_id})" );
    }

    update_post_meta( $post_id, $photo_key, $attachment_id );
    WP_CLI::log( "Step {$step_num}: updated photo." );
}

WP_CLI::success( 'WW-22 complete. Check: homepage 1-5 section shows updated titles, descriptions, and images.' );
