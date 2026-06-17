<?php
/**
 * Template Name: Local Picks Page
 *
 * WW-53: Dedicated per-location "Local Picks" page — recommendations grouped by
 * activity category (Bike, Paddle, Sight Seeing, …), each with an alternating
 * image/text layout.
 *
 * Content lives in the "Local Picks" ACF field group (bound to this template).
 */

get_header();

if ( have_posts() ) : the_post();

	get_template_part( 'template-parts/page/content', 'local-picks' );

endif;

get_footer();
