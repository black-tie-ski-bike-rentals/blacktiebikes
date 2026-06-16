<?php
/**
 * WW-11: Quick Value Props — "The Black Tie Experience"
 *
 * Shared section placed directly below the hero on every location page.
 * Replaces the old "How do I get my gear?" section.
 *
 * ACF layout key: quick_value_props
 * Sub-fields:
 *   cta_url (url) — Book Now destination
 *
 * Icons are inline SVG (svgrepo: truck / bike-sport-travel / mountain-climb),
 * cleaned to use currentColor so they theme via CSS. Files in images/value-props/.
 */

$cta_url       = get_sub_field( 'cta_url' );
$location_name = get_the_title();

$icon_dir = get_template_directory() . '/images/value-props/';
$icons    = array(
	'truck' => file_get_contents( $icon_dir . 'truck.svg' ),
	'bike'  => file_get_contents( $icon_dir . 'bike.svg' ),
	'peak'  => file_get_contents( $icon_dir . 'mountain.svg' ),
);

$props = array(
	array(
		'icon'  => 'truck',
		'title' => 'Delivery or Store Pickup',
		'desc'  => 'Gear fitted and ready — delivered to your stay or picked up in-store.',
	),
	array(
		'icon'  => 'bike',
		'title' => 'Premium Equipment',
		'desc'  => 'High-quality bikes and gear for every skill level.',
	),
	array(
		'icon'  => 'peak',
		'title' => 'Local Experts',
		'desc'  => 'Get personalized recommendations from our ' . $location_name . ' team.',
	),
);
?>

<section class="module mod-value-props">
  <div class="container">

    <h2 class="value-props__heading text-center">The Black Tie Experience</h2>

    <div class="value-props__grid">
      <?php foreach ( $props as $p ) : ?>
      <div class="value-prop">
        <div class="value-prop__icon"><?php echo $icons[ $p['icon'] ]; ?></div>
        <h3 class="value-prop__title"><?php echo esc_html( $p['title'] ); ?></h3>
        <p class="value-prop__desc"><?php echo esc_html( $p['desc'] ); ?></p>
      </div>
      <?php endforeach; ?>
    </div>

    <?php if ( $cta_url ) : ?>
    <div class="value-props__cta text-center">
      <a href="<?php echo esc_url( $cta_url ); ?>" class="btn">Book Now</a>
    </div>
    <?php endif; ?>

  </div>
</section>
