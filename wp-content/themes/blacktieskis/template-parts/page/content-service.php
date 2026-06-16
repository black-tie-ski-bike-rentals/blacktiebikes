<?php
/**
 * WW-52: Service page body — fixed ACF section set.
 *
 * Sections (all optional, render only when filled):
 *   Hero      — svc_hero_image, svc_hero_heading, svc_hero_subheading
 *   Intro     — svc_intro (wysiwyg, centered 70%)
 *   Products  — svc_products repeater: product_heading + product_body (wysiwyg)
 *   FAQs      — svc_faqs repeater: faq_question + faq_answer (wysiwyg)
 */

$hero_image = get_field( 'svc_hero_image' );
$hero_head  = get_field( 'svc_hero_heading' );
$hero_sub   = get_field( 'svc_hero_subheading' );
$intro      = get_field( 'svc_intro' );
$book_url   = 'https://booknow.blacktiebikes.com/reservations/step1';
?>

<?php /* ── Hero ─────────────────────────────────────────────── */ ?>
<section class="module mod-service-hero"<?php if ( $hero_image ) : ?> style="background-image:url('<?php echo esc_url( is_array( $hero_image ) ? $hero_image['url'] : $hero_image ); ?>')"<?php endif; ?>>
  <div class="service-hero__overlay"></div>
  <div class="container service-hero__inner text-center">
    <?php if ( $hero_head ) : ?><h1 class="service-hero__heading"><?php echo esc_html( $hero_head ); ?></h1><?php endif; ?>
    <?php if ( $hero_sub ) : ?><p class="service-hero__sub"><?php echo esc_html( $hero_sub ); ?></p><?php endif; ?>
    <a href="<?php echo esc_url( $book_url ); ?>" class="btn">Book Now</a>
  </div>
</section>

<?php /* ── Intro (centered, 70%) ────────────────────────────── */ ?>
<?php if ( ! empty( $intro ) ) : ?>
<section class="module mod-service-intro">
  <div class="container">
    <div class="service-intro text-center"><?php echo $intro; ?></div>
  </div>
</section>
<?php endif; ?>

<?php /* ── Products ─────────────────────────────────────────── */ ?>
<?php if ( have_rows( 'svc_products' ) ) : ?>
<section class="module mod-service-products">
  <div class="container">
    <?php while ( have_rows( 'svc_products' ) ) : the_row();
      $p_head = get_sub_field( 'product_heading' );
      $p_body = get_sub_field( 'product_body' );
      ?>
      <div class="service-product">
        <?php if ( $p_head ) : ?><h2 class="service-product__heading"><?php echo esc_html( $p_head ); ?></h2><?php endif; ?>
        <?php if ( $p_body ) : ?><div class="service-product__body"><?php echo $p_body; ?></div><?php endif; ?>
      </div>
    <?php endwhile; ?>
  </div>
</section>
<?php endif; ?>

<?php /* ── FAQs — same accordion build as the existing FAQ blocks ── */ ?>
<?php $faqs = get_field( 'svc_faqs' ); ?>
<?php if ( ! empty( $faqs ) ) : ?>
<section class="module mod-service-faqs">
  <h2 class="service-faqs__heading text-center">FAQs</h2>
  <?php echo $faqs; ?>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
<script>
jQuery(document).ready(function ($) {
  $(".accordion-list > li > .answer").hide();

  $(".accordion-list > li").click(function () {
    if ($(this).hasClass("active")) {
      $(this).removeClass("active").find(".answer").slideUp();
    } else {
      $(".accordion-list > li.active .answer").slideUp();
      $(".accordion-list > li.active").removeClass("active");
      $(this).addClass("active").find(".answer").slideDown();
    }
    return false;
  });
});
</script>
<?php endif; ?>
