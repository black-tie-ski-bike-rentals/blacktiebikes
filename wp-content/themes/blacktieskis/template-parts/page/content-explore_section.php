<?php
/**
 * WW-7: Explore [Location] Your Way section
 *
 * ACF layout key: explore_section
 *
 * Sub-fields:
 *   categories (repeater)
 *     cat_label      (text)
 *     cat_cta_text   (text)
 *     cat_cta_url    (url)
 *     packages (repeater)
 *       pkg_title       (text)
 *       pkg_image       (image, return: id)
 *       pkg_description (textarea)
 *       pkg_badge       (text, optional — shown on single-package featured card)
 */

$location_name = get_the_title();
?>

<section class="module mod-explore-section">
  <div class="container">
    <h2 class="explore-section__heading">Explore <?php echo esc_html( $location_name ); ?> Your Way</h2>
    <p class="explore-section__sub">Find the right gear, rentals, and experiences for however you want to explore.</p>

    <?php if ( have_rows( 'categories' ) ) : ?>
      <?php $cat_index = 0; while ( have_rows( 'categories' ) ) : the_row(); ?>
        <?php
        $cat_label    = get_sub_field( 'cat_label' );
        $cat_cta_text = get_sub_field( 'cat_cta_text' );
        $cat_cta_url  = get_sub_field( 'cat_cta_url' );
        $packages     = get_sub_field( 'packages' );
        $pkg_count    = is_array( $packages ) ? count( $packages ) : 0;
        $slider_id    = 'explore-cat-' . $cat_index;
        ?>

        <div class="explore-cat-block">
          <div class="explore-cat-header">
            <span class="explore-cat-label"><?php echo esc_html( $cat_label ); ?></span>
            <?php if ( $cat_cta_text && $cat_cta_url ) : ?>
              <a href="<?php echo esc_url( $cat_cta_url ); ?>" class="explore-cat-cta"><?php echo $pkg_count === 1 ? 'Learn More' : esc_html( $cat_cta_text ); ?> &rarr;</a>
            <?php endif; ?>
          </div>

          <?php if ( $pkg_count >= 3 ) : ?>

            <div class="explore-slider-wrap" data-track-id="<?php echo esc_attr( $slider_id ); ?>" data-total="<?php echo $pkg_count; ?>">
              <button class="explore-arrow explore-arrow--left explore-arrow--hidden" id="<?php echo esc_attr( $slider_id ); ?>-prev" aria-label="Previous">
                <span class="explore-chevron explore-chevron--left"></span>
              </button>
              <div class="explore-slider-viewport">
                <div class="explore-slider-track" id="<?php echo esc_attr( $slider_id ); ?>-track">
                  <?php foreach ( $packages as $pkg ) :
                    $img_id  = ! empty( $pkg['pkg_image'] ) ? $pkg['pkg_image'] : 0;
                    $img_src = $img_id ? wp_get_attachment_image_src( $img_id, 'medium' ) : false;
                    $img_alt = $img_id ? get_post_meta( $img_id, '_wp_attachment_image_alt', true ) : '';
                    $card_tag  = $cat_cta_url ? 'a' : 'div';
                    $card_href = $cat_cta_url ? ' href="' . esc_url( $cat_cta_url ) . '"' : '';
                  ?>
                    <<?php echo $card_tag . $card_href; ?> class="explore-card">
                      <div class="explore-card__img">
                        <?php if ( $img_src ) : ?>
                          <img src="<?php echo esc_url( $img_src[0] ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>">
                        <?php endif; ?>
                      </div>
                      <div class="explore-card__body">
                        <h3 class="explore-card__title"><?php echo esc_html( $pkg['pkg_title'] ); ?></h3>
                        <p class="explore-card__desc"><?php echo esc_html( $pkg['pkg_description'] ); ?></p>
                      </div>
                    </<?php echo $card_tag; ?>>
                  <?php endforeach; ?>
                </div>
              </div>
              <button class="explore-arrow explore-arrow--right" id="<?php echo esc_attr( $slider_id ); ?>-next" aria-label="Next">
                <span class="explore-chevron explore-chevron--right"></span>
              </button>
            </div>

          <?php elseif ( $pkg_count === 2 ) : ?>

            <div class="explore-grid-2">
              <?php foreach ( $packages as $pkg ) :
                $img_id    = ! empty( $pkg['pkg_image'] ) ? $pkg['pkg_image'] : 0;
                $img_src   = $img_id ? wp_get_attachment_image_src( $img_id, 'medium' ) : false;
                $img_alt   = $img_id ? get_post_meta( $img_id, '_wp_attachment_image_alt', true ) : '';
                $card_tag  = $cat_cta_url ? 'a' : 'div';
                $card_href = $cat_cta_url ? ' href="' . esc_url( $cat_cta_url ) . '"' : '';
              ?>
                <<?php echo $card_tag . $card_href; ?> class="explore-card">
                  <div class="explore-card__img">
                    <?php if ( $img_src ) : ?>
                      <img src="<?php echo esc_url( $img_src[0] ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>">
                    <?php endif; ?>
                  </div>
                  <div class="explore-card__body">
                    <h3 class="explore-card__title"><?php echo esc_html( $pkg['pkg_title'] ); ?></h3>
                    <p class="explore-card__desc"><?php echo esc_html( $pkg['pkg_description'] ); ?></p>
                  </div>
                </<?php echo $card_tag; ?>>
              <?php endforeach; ?>
            </div>

          <?php elseif ( $pkg_count === 1 ) : ?>

            <?php
            $pkg     = $packages[0];
            $img_id  = ! empty( $pkg['pkg_image'] ) ? $pkg['pkg_image'] : 0;
            $img_src = $img_id ? wp_get_attachment_image_src( $img_id, 'large' ) : false;
            $img_alt = $img_id ? get_post_meta( $img_id, '_wp_attachment_image_alt', true ) : '';
            $badge   = ! empty( $pkg['pkg_badge'] ) ? $pkg['pkg_badge'] : '';
            ?>
            <?php
            $feat_tag  = $cat_cta_url ? 'a' : 'div';
            $feat_href = $cat_cta_url ? ' href="' . esc_url( $cat_cta_url ) . '"' : '';
            ?>
            <<?php echo $feat_tag . $feat_href; ?> class="explore-featured">
              <div class="explore-featured__img">
                <?php if ( $img_src ) : ?>
                  <img src="<?php echo esc_url( $img_src[0] ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>">
                <?php endif; ?>
              </div>
              <div class="explore-featured__body">
                <?php if ( $badge ) : ?>
                  <span class="explore-featured__badge"><?php echo esc_html( $badge ); ?></span>
                <?php endif; ?>
                <h3 class="explore-featured__title"><?php echo esc_html( $pkg['pkg_title'] ); ?></h3>
                <p class="explore-featured__desc"><?php echo esc_html( $pkg['pkg_description'] ); ?></p>
              </div>
            </<?php echo $feat_tag; ?>>

          <?php endif; ?>
        </div>

        <?php $cat_index++; endwhile; ?>
    <?php endif; ?>
  </div>
</section>