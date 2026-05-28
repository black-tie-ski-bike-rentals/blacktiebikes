<?php
/**
 * The template for displaying all pages
 */

get_header(); ?>

<?php	
	if ( have_posts() ) : the_post();		
		
		// Include the page content template.
		$_content = get_the_content();
		if( !empty($_content) )
			get_template_part( 'template-parts/page/content', 'page' );		
			
			if ( have_rows('bt_templates') ) :
				while ( have_rows('bt_templates') ) : the_row();
					echo get_template_part('template-parts/page/content', get_row_layout());
				endwhile; ?>
				<?php   
			endif;
	endif; ?>	
<?php get_footer();