<?php
/**
 * Displays content for Banner Image Section
 */
$bg_position = get_sub_field('bg_position') ?: 'top center';
$banner_image = get_sub_field('banner_image');
?>
<section class="module mod-hero-image">
  <div class="container content opacity">
    <?php blacktieskis_sub_field('description'); ?>
  </div>
  <div class="container content content-fix">
    <?php blacktieskis_sub_field('description'); ?>
  </div>
  <div class="bg-transparent">
    <div class="bg-banner-home bg-banner-home-fulldesk d-none d-lg-block" style="background-image:url('<?php echo esc_url( $banner_image ); ?>'); background-position: <?php echo esc_attr( $bg_position ); ?>;"></div>
    <div class="bg-banner-home bg-banner-home-mobile d-block d-lg-none" style="background-image:url('<?php echo esc_url( $banner_image ); ?>'); background-position: <?php echo esc_attr( $bg_position ); ?>;"></div>
  </div>
 
</section>
<style>
.img-circle {
  border-radius: 50%;
}

table th {
  background: #eee;
  font-weight: bold;
}
table td, table th {
  padding: 8px;
  border: 1px solid #ddd;
  text-align: left;
}

.home-jumbotron::before, .home-jumbotron::after {
  width: 50%;
  margin-left: 25%;
  content: "";
  display: block;
  height: 20px;
  border-top: 5px solid #eee;
}

.jumbotron {
  padding-top:8px;
  padding-bottom: 48px;
}

table {
  border-collapse: collapse;
  width: 100%;
}

.mod-reviews {
  padding: 70px 0;
}
</style>
<?php
$hiw_fields = array( 'heading', 'sub_heading', 'image1', 'heading1', 'description1', 'image2', 'heading2', 'description2' );
$hiw_has_content = false;
foreach ( $hiw_fields as $hiw_f ) {
	if ( blacktieskis_sub_field( $hiw_f, true ) ) { $hiw_has_content = true; break; }
}
if ( $hiw_has_content ) :
?>
<section class="module mod-reviews container" id="how-it-works">
	
<div class="home-jumbotron jumbotron" id="schedule">
            <h1 style="text-align:center;padding-top:20px;"><?php blacktieskis_sub_field('heading'); ?></h1>
            <p class="lead" style="text-align:center;"><?php blacktieskis_sub_field('sub_heading'); ?></p>

            <div class="row">
              <div class="col-lg-6" style="text-align:center;">
                <?php if ( blacktieskis_sub_field('image1', true) ) : ?>
                <img style="width: 500px; height: 500px;" alt="Premium Packages" src="<?php blacktieskis_sub_field('image1'); ?>" class="img-circle">
                <?php endif; ?>
                <h2 style="text-align:center;padding-top:20px;"><?php blacktieskis_sub_field('heading1'); ?></h2>
                <p><?php blacktieskis_sub_field('description1'); ?></p>
                <!-- <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
              </div><!-- /.col-lg-4 -->
              <div class="col-lg-6" style="text-align:center;">
                <?php if ( blacktieskis_sub_field('image2', true) ) : ?>
                <img style="width: 500px; height: 500px;" alt="Performance Packages" src="<?php blacktieskis_sub_field('image2'); ?>" class="img-circle">
                <?php endif; ?>
                <h2 style="text-align:center;padding-top:20px;"><?php blacktieskis_sub_field('heading2'); ?></h2>
                <p><?php blacktieskis_sub_field('description2'); ?></p>
                <!-- <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
              </div><!-- /.col-lg-4 -->

          <!--    <div class="col-lg-3" style="text-align:center;">
                <img style="width: 300px; height: 300px;" alt="Junior Packages" src="<?php blacktieskis_sub_field('image3'); ?>" class="img-circle">
                <h2 style="text-align:center;padding-top:20px;"><?php blacktieskis_sub_field('heading3'); ?></h2>
                <p><?php blacktieskis_sub_field('description3'); ?></p>-->
                <!-- <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> 
              </div><!-- /.col-lg-4 -->
				<!--<div class="col-lg-3" style="text-align:center;">
                <img style="width: 300px; height: 300px;" alt="Junior Packages" src="<?php blacktieskis_sub_field('image4'); ?>" class="img-circle">
                <h2 style="text-align:center;padding-top:20px;"><?php blacktieskis_sub_field('heading4'); ?></h2>
                <p><?php blacktieskis_sub_field('description4'); ?></p>-->
                <!-- <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
              </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->

         
		  </section>
<?php endif; ?>
		  
		  <?php
		  $pageid = get_the_ID();
		  if($pageid==29175){ ?>
<section class="module mod-reviews container"  style="display:none;">
	<?php }else{ ?>
	<section class="module mod-reviews container"  style="display:none;">
		<?php } ?>
		
		
	
<?php

$about_us = get_sub_field('about_us');

 ?>
    
		  <div class="home-jumbotron jumbotron">
		  <h1 class="entry-title" style="text-align:center;"><?php echo $about_us['heading']; ?></h1>
		 
                <div class="row">
                    <div class="col-sm-12">
                        <?php echo $about_us['description']; ?>
<!--<p style="text-align: center;"><em>Bringing your own boots? Just subtract $4/day from any ski or board package.</em></p>-->
                        </div>
                    </div>
                </div> </div>
				
			
				</section>