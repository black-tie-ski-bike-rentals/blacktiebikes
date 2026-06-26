<?php
/**
 * WW-12: Getting Your Gear section
 *
 * ACF layout key: getting_your_gear
 *
 * Sub-fields:
 *   gear_subheading   (text, optional)
 *   gear_options      (repeater, 1–2 rows):
 *       option_heading  (text)
 *       option_image    (image, return: array)
 *       option_bullets  (repeater: bullet text — addresses auto-link to Maps)
 *       option_cta_url  (url — button label is always "Book Now")
 *   location_heading  (text)
 *   location_text     (textarea)
 *
 * One option renders as a single wide card; two render side-by-side.
 */

$gear_subheading  = get_sub_field( 'gear_subheading' );
$location_heading = get_sub_field( 'location_heading' );
$location_text    = get_sub_field( 'location_text' );
$location_name    = get_the_title();

$option_rows  = get_sub_field( 'gear_options' );
$option_count = is_array( $option_rows ) ? count( $option_rows ) : 0;
$gear_wide    = ( 1 === $option_count ); // single option => wide card, like the old pickup-only layout
?>

<section class="module mod-getting-your-gear">
  <div class="container">

    <h2 class="gear-heading">Getting Your Gear</h2>
    <?php if ( $gear_subheading ) : ?>
    <p class="gear-subheading"><?php echo esc_html( $gear_subheading ); ?></p>
    <?php endif; ?>

    <?php if ( have_rows( 'gear_options' ) ) : ?>
    <div class="row gear-cards">

      <?php while ( have_rows( 'gear_options' ) ) : the_row();
        $opt_heading = get_sub_field( 'option_heading' );
        $opt_image   = get_sub_field( 'option_image' );
        $opt_cta     = get_sub_field( 'option_cta_url' );
        ?>
      <div class="col-12 <?php echo $gear_wide ? '' : 'col-md-6'; ?>">
        <div class="gear-card<?php echo $gear_wide ? ' gear-card--wide' : ''; ?>">
          <?php if ( $opt_image ) : ?>
          <div class="gear-card__img">
            <img src="<?php echo esc_url( $opt_image['url'] ); ?>" alt="<?php echo esc_attr( $opt_image['alt'] ); ?>">
          </div>
          <?php endif; ?>
          <div class="gear-card__body">
            <?php if ( $opt_heading ) : ?>
            <h3 class="gear-card__title"><?php echo esc_html( $opt_heading ); ?></h3>
            <?php endif; ?>
            <ul class="gear-card__list">
              <?php if ( have_rows( 'option_bullets' ) ) : ?>
                <?php while ( have_rows( 'option_bullets' ) ) : the_row(); ?>
              <li><?php echo blacktieskis_gear_bullet_html( get_sub_field( 'bullet' ) ); ?></li>
                <?php endwhile; ?>
              <?php else : ?>
              <?php // Fallback default when no bullets have been entered yet. ?>
              <li>Visit our local shop in <?php echo esc_html( $location_name ); ?></li>
              <?php endif; ?>
            </ul>
            <?php if ( $opt_cta ) : ?>
            <a href="<?php echo esc_url( $opt_cta ); ?>" class="btn btn-primary gear-card__cta">Book Now</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php endwhile; ?>

    </div>
    <?php endif; ?>

    <?php if ( $location_heading || $location_text ) : ?>
    <div class="gear-location-info">
      <?php if ( $location_heading ) : ?>
      <h3 class="gear-location-info__heading"><?php echo esc_html( $location_heading ); ?></h3>
      <?php endif; ?>
      <?php if ( $location_text ) : ?>
      <p><?php echo esc_html( $location_text ); ?></p>
      <?php endif; ?>
    </div>
    <?php endif; ?>

  </div>
</section>
