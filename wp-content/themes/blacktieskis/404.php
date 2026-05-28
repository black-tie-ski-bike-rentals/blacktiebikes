<?php
/**
 * Header
 */
get_header();
?>
	<section id="mod-404">
    <div class="bg-transparent" style="z-index:-1;">
      <div class="bg-banner-home bg-banner-home-fulldesk d-none d-lg-block" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/hero-image-fulldesk.jpg'); background-position: top center;"></div>
      <div class="bg-banner-home bg-banner-home-mobile d-block d-lg-none" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/hero-images-mobile.jpg');"></div>
      <div class=" bg-transparent-blue"></div>
      <div class="bg-transparent-white"></div>
      <div class="bg-transparent-violet"></div>
    </div>
    <div class="d-table w-100 h-100">
      <div class="d-table-cell align-middle text-center">
        <div class="container">
          <?php the_field('not_found', 'option'); ?>
        </div>
      </div>
    </div>
    
  </section>
<?php
/**
 * Footer
 */
get_footer();