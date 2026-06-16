<?php
/**
 * Template Name: Service Page
 *
 * WW-52: Standardized template for all service pages (Bikes, Paddle, Service,
 * Tours, 4x4, etc.). Fixed ACF section set, rendered in a consistent order:
 *   Hero  ->  Intro  ->  Products  ->  FAQs
 *
 * Content lives in the "Service Page" ACF field group (bound to this template).
 */

get_header();

if ( have_posts() ) : the_post();

	get_template_part( 'template-parts/page/content', 'service' );

endif;

get_footer();
