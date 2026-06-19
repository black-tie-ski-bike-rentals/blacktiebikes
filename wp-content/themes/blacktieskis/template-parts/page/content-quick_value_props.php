<?php
/**
 * WW-11: Quick Value Props — "The Black Tie Experience"
 *
 * Shared section placed directly below the hero on every location page.
 *
 * ACF layout key: quick_value_props
 * Sub-fields (editable per location):
 *   vp_heading, vp_subheading (text)
 *   vp_prop1_title/desc, vp_prop2_title/desc, vp_prop3_title/desc
 *   cta_url (url) — Book Now destination
 *
 * Icons are NOT editable — inline SVG from images/value-props/ (pin / bike /
 * mountain), cleaned to currentColor so they theme via CSS. One fixed icon per slot.
 */

$heading       = get_sub_field( 'vp_heading' );
$subheading    = get_sub_field( 'vp_subheading' );
$cta_url       = get_sub_field( 'cta_url' );
$location_name = get_the_title();

$icon_dir = get_template_directory() . '/images/value-props/';
$icons    = array(
	'pin'  => file_get_contents( $icon_dir . 'pin.svg' ),
	'bike' => file_get_contents( $icon_dir . 'bike.svg' ),
	'peak' => file_get_contents( $icon_dir . 'mountain.svg' ),
);

$props = array(
	array( 'icon' => 'pin',  'title' => get_sub_field( 'vp_prop1_title' ), 'desc' => get_sub_field( 'vp_prop1_desc' ) ),
	array( 'icon' => 'bike', 'title' => get_sub_field( 'vp_prop2_title' ), 'desc' => get_sub_field( 'vp_prop2_desc' ) ),
	array( 'icon' => 'peak', 'title' => get_sub_field( 'vp_prop3_title' ), 'desc' => get_sub_field( 'vp_prop3_desc' ) ),
);
?>

<section class="module mod-value-props">
  <div class="container">

    <div class="value-props__header">
      <div class="value-props__heading-block">
        <?php if ( $heading ) : ?><h2 class="value-props__heading"><?php echo esc_html( $heading ); ?></h2><?php endif; ?>
        <?php if ( $subheading ) : ?><p class="value-props__sub"><?php echo esc_html( $subheading ); ?></p><?php endif; ?>
      </div>
      <?php if ( $cta_url ) : ?>
      <a href="<?php echo esc_url( $cta_url ); ?>" class="btn value-props__cta">Book Now</a>
      <?php endif; ?>
    </div>

    <div class="value-props__grid">
      <?php foreach ( $props as $p ) : ?>
      <div class="value-prop">
        <div class="value-prop__icon"><?php echo $icons[ $p['icon'] ]; ?></div>
        <?php if ( $p['title'] ) : ?><h3 class="value-prop__title"><?php echo esc_html( $p['title'] ); ?></h3><?php endif; ?>
        <?php if ( $p['desc'] ) : ?><p class="value-prop__desc"><?php echo esc_html( $p['desc'] ); ?></p><?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>
