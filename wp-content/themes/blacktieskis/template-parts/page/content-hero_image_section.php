<?php
/**
 * Displays content for Hero Image Section
 */ 
?>
<?php 
$hero_img_video_embed = get_sub_field('video_embed');
?>



<section class="module mod-hero-image">		  
  <div class="container content opacity">
	 
	
	  
	  
      <?php blacktieskis_sub_field('description'); ?>
	  
    <?php 
    if( !empty($hero_img_video_embed) ) :
      ?><a href="<?php echo $hero_img_video_embed; ?>" data-id="" data-popup="video" data-htmlclass="html-popup-video" class="d-flex justify-content-center popup-is-open"><span class="icomoon align-self-center icon-play is-close"></span> Watch Video</a><?php
    endif;
    ?>
    <div class="icon-mouse">
      <span class="icomoon icon-arrow-down"> </span>
    </div>
    </div>
	
	
  <div class="container content content-fix">
    <?php blacktieskis_sub_field('description'); ?>
    <?php 
    if( !empty($hero_img_video_embed) ) :
      ?><a href="<?php echo $hero_img_video_embed; ?>" data-id="" data-popup="video" data-htmlclass="html-popup-video" class="d-flex justify-content-center popup-is-open"><span class="icomoon align-self-center icon-play is-close"></span> Watch Video</a><?php
    endif;
    ?>
    <div class="icon-mouse">
      <span class="icomoon icon-arrow-down"> </span>
    </div>
  </div>
  <div class="bg-transparent">
    <div class="bg-banner-home bg-banner-home-fulldesk d-none d-lg-block" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/bike-rentals.jpg'); background-position: top center;"></div>
    <div class="bg-banner-home bg-banner-home-mobile d-block d-lg-none" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/hero-images-mobile.jpg');"></div>
    <div class=" bg-transparent-blue"></div>
    <div class="bg-transparent-white"></div>
    <div class="bg-transparent-violet"></div>
  </div>
  <div class="bg-mountain bg-mountain-desktop-full" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/bg-mountain.png'); background-position: center center;"></div>
  <div class="bg-mountain bg-mountain-desktop" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/bg-mountain-desktop.png'); background-position: top center;"></div>
  <div class="bg-mountain bg-mountain-mb" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/mountain-mobile-home.png'); background-position: top center;"></div>
</section>