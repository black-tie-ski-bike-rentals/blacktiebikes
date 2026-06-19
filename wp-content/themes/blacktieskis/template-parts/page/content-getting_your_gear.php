<?php
/**
 * WW-12: Getting Your Gear section
 *
 * ACF layout key: getting_your_gear
 *
 * Sub-fields:
 *   gear_subheading   (text)
 *   delivery_enabled  (true_false)
 *   delivery_image    (image, return: array)
 *   delivery_cta_url  (url)
 *   delivery_bullets  (repeater: bullet text)
 *   pickup_image      (image, return: array)
 *   pickup_cta_url    (url)
 *   pickup_bullets    (repeater: bullet text)
 *   location_heading  (text)
 *   location_text     (textarea)
 *
 * Subheading and bullets fall back to defaults when their fields are empty.
 */

$gear_subheading  = get_sub_field( 'gear_subheading' );
$delivery_enabled = get_sub_field( 'delivery_enabled' );
$delivery_image   = get_sub_field( 'delivery_image' );
$delivery_cta_url = get_sub_field( 'delivery_cta_url' );
$pickup_image     = get_sub_field( 'pickup_image' );
$pickup_cta_url   = get_sub_field( 'pickup_cta_url' );
$location_heading = get_sub_field( 'location_heading' );
$location_text    = get_sub_field( 'location_text' );
$location_name    = get_the_title();
?>

<section class="module mod-getting-your-gear">
  <div class="container">

    <h2 class="gear-heading">Getting Your Gear</h2>
    <p class="gear-subheading"><?php echo esc_html( $gear_subheading ?: 'Delivered to your stay or ready for pickup at our shop.' ); ?></p>

    <div class="row gear-cards">

      <?php if ( $delivery_enabled ) : ?>
      <div class="col-12 col-md-6">
        <div class="gear-card">
          <?php if ( $delivery_image ) : ?>
          <div class="gear-card__img">
            <img src="<?php echo esc_url( $delivery_image['url'] ); ?>" alt="<?php echo esc_attr( $delivery_image['alt'] ); ?>">
          </div>
          <?php endif; ?>
          <div class="gear-card__body">
            <h3 class="gear-card__title">Delivery</h3>
            <ul class="gear-card__list">
              <?php if ( have_rows( 'delivery_bullets' ) ) : ?>
                <?php while ( have_rows( 'delivery_bullets' ) ) : the_row(); ?>
                <li><?php echo esc_html( get_sub_field( 'bullet' ) ); ?></li>
                <?php endwhile; ?>
              <?php else : ?>
                <li>Delivered to your hotel or rental</li>
                <li>Personalized fitting included</li>
                <li>We pick it up when you're done</li>
                <li>2-day minimum may apply</li>
              <?php endif; ?>
            </ul>
            <?php if ( $delivery_cta_url ) : ?>
            <a href="<?php echo esc_url( $delivery_cta_url ); ?>" class="btn btn-primary gear-card__cta">Book Now</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <?php // Pickup-only (no delivery): one full-width card, photo beside the content. ?>
      <?php $gear_wide = ! $delivery_enabled; ?>
      <div class="col-12 <?php echo $delivery_enabled ? 'col-md-6' : ''; ?>">
        <div class="gear-card<?php echo $gear_wide ? ' gear-card--wide' : ''; ?>">
          <?php if ( $pickup_image ) : ?>
          <div class="gear-card__img">
            <img src="<?php echo esc_url( $pickup_image['url'] ); ?>" alt="<?php echo esc_attr( $pickup_image['alt'] ); ?>">
          </div>
          <?php endif; ?>
          <div class="gear-card__body">
            <h3 class="gear-card__title">Shop Pickup</h3>
            <ul class="gear-card__list">
              <li>Visit our local shop in <?php echo esc_html( $location_name ); ?></li>
              <?php if ( have_rows( 'pickup_bullets' ) ) : ?>
                <?php while ( have_rows( 'pickup_bullets' ) ) : the_row(); ?>
                <li><?php echo esc_html( get_sub_field( 'bullet' ) ); ?></li>
                <?php endwhile; ?>
              <?php else : ?>
                <li>Walk-in or scheduled fittings</li>
                <li>Access to retail gear &amp; accessories</li>
              <?php endif; ?>
            </ul>
            <?php if ( $pickup_cta_url ) : ?>
            <a href="<?php echo esc_url( $pickup_cta_url ); ?>" class="btn btn-primary gear-card__cta">Book Now</a>
            <?php endif; ?>
          </div>
        </div>
      </div>

    </div>

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
