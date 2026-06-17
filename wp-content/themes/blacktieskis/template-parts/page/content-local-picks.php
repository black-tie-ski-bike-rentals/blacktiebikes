<?php
/**
 * WW-53: Local Picks page body.
 *
 * ACF fields:
 *   lp_categories (repeater)
 *     category_heading (text)               -> H2
 *     recommendations (repeater)
 *       rec_title       (text)              -> H3
 *       rec_description (wysiwyg)
 *       rec_image       (image, optional)
 *
 * Recommendations alternate image left/right; a recommendation with no image
 * runs full width. On mobile everything stacks with the image below the text.
 */
?>

<section class="module mod-local-picks">
  <div class="container">

    <?php if ( have_rows( 'lp_categories' ) ) : ?>
      <?php while ( have_rows( 'lp_categories' ) ) : the_row();
        $cat_heading = get_sub_field( 'category_heading' );
        ?>
        <div class="lp-category">

          <?php if ( $cat_heading ) : ?>
          <h2 class="lp-category__heading"><?php echo esc_html( $cat_heading ); ?></h2>
          <?php endif; ?>

          <?php if ( have_rows( 'recommendations' ) ) : ?>
            <?php
            $i = 0;
            while ( have_rows( 'recommendations' ) ) : the_row();
              $title   = get_sub_field( 'rec_title' );
              $desc    = get_sub_field( 'rec_description' );
              $image   = get_sub_field( 'rec_image' );
              $has_img = ! empty( $image );
              $i++;

              $classes = 'lp-rec';
              if ( ! $has_img ) {
                $classes .= ' lp-rec--full';      // no image -> full-width text
              } elseif ( $i % 2 === 0 ) {
                $classes .= ' lp-rec--reverse';    // alternate image to the right
              }
              ?>
              <div class="<?php echo esc_attr( $classes ); ?>">
                <?php if ( $has_img ) : ?>
                <div class="lp-rec__img">
                  <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
                </div>
                <?php endif; ?>
                <div class="lp-rec__body">
                  <?php if ( $title ) : ?><h3 class="lp-rec__title"><?php echo esc_html( $title ); ?></h3><?php endif; ?>
                  <?php if ( $desc ) : ?><div class="lp-rec__desc"><?php echo $desc; ?></div><?php endif; ?>
                </div>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>

        </div>
      <?php endwhile; ?>
    <?php endif; ?>

  </div>
</section>
