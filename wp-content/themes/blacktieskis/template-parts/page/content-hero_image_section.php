<?php
/**
 * Displays content for Hero Image Section
 */
$hero_img_video_embed = get_sub_field('video_embed');
$hero_bg_position     = get_sub_field('hero_bg_position') ?: 'top center';
?>

<?php if ( is_front_page() ) : ?>

<section class="btb-hero">
  <div class="btb-hero__photo"></div>
  <div class="btb-hero__gradient"></div>
  <div class="btb-hero__mountain"></div>
  <div class="btb-hero__content container">
    <?php blacktieskis_sub_field('description'); ?>
  </div>
</section>

<?php else : ?>

<section class="module mod-hero-image">
  <div class="container content opacity">
    <?php blacktieskis_sub_field('description'); ?>
    <?php if ( !empty( $hero_img_video_embed ) ) : ?>
      <a href="<?php echo $hero_img_video_embed; ?>" data-id="" data-popup="video" data-htmlclass="html-popup-video" class="d-flex justify-content-center popup-is-open">
        <span class="icomoon align-self-center icon-play is-close"></span> Watch Video
      </a>
    <?php endif; ?>
  </div>
  <div class="bg-transparent">
    <div class="bg-banner-home bg-banner-home-fulldesk d-none d-lg-block" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/bike-rentals.jpg'); background-position: <?php echo esc_attr( $hero_bg_position ); ?>;"></div>
    <div class="bg-banner-home bg-banner-home-mobile d-block d-lg-none" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/hero-images-mobile.jpg'); background-position: <?php echo esc_attr( $hero_bg_position ); ?>;"></div>
    <div class="bg-transparent-violet"></div>
  </div>
  <div class="bg-mountain bg-mountain-desktop-full" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/bg-mountain.png'); background-position: center center;"></div>
  <div class="bg-mountain bg-mountain-mb" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/mountain-mobile-home.png'); background-position: top center;"></div>
</section>

<?php endif; ?>
