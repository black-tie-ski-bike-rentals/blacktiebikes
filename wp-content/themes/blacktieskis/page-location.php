<?php
/**
 * Template Name: Location Page
 *
 * Marks a page as location-specific, which switches the header nav
 * from the global nav (btb-global-nav) to the location nav (btb-location-nav).
 * Layout and content sections are handled in WW-6.
 */

get_header();

if ( have_posts() ) : the_post();

	$_content = get_the_content();
	if ( ! empty( $_content ) ) {
		get_template_part( 'template-parts/page/content', 'page' );
	}

	if ( have_rows( 'bt_templates' ) ) :
		while ( have_rows( 'bt_templates' ) ) : the_row();
			echo get_template_part( 'template-parts/page/content', get_row_layout() );
		endwhile;
	endif;

endif;

get_footer();
