<?php
/**
 * Displays content for Reviews Section
 */ 
?>
<?php
$conditions = array(
	'post_type' => 'post',
	'order' => 'DESC',
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'cache_results' => false
);
$ps_reviews = query_posts($conditions);
if( count($ps_reviews) ) :
?>
<section id="reviews" class="module mod-reviews container animation" data-module="mod-reviews">
  <div class="mod-reviews-list ani-bottom">
    <div class="reviews-slider">
		<?php
		for ($i = 0; $i < count($ps_reviews); $i++) :
		
			global $post;
			$post = $ps_reviews[$i];
			setup_postdata($post);
			//get feature's post
			$review_thumbnail_id = get_post_thumbnail_id($post->ID);
			if ( !empty($review_thumbnail_id) ) {
				$review_thumbnail = blacktieskis_get_attachment($review_thumbnail_id);
				$review_thumbnail_src = $review_thumbnail['src'];		
				$review_thumbnail_alt = $review_thumbnail['alt'];	
				if( empty($review_thumbnail_alt) )
					$review_thumbnail_alt = get_the_title();
			} else {
				$review_thumbnail_src = get_stylesheet_directory_uri() . '/images/logo.png';
				$review_thumbnail_alt = get_the_title();
			}
			$_time = get_the_date();
			$review_link = get_field('bt_review_link');
			?><div class="review-item item-review-slider col-left<?php if(!empty($review_link)) print ' has-review-link';?>">
				<div class="review-item-head d-flex align-items-center">
				  <div class="review-item-image float-left">
					<img src="<?php echo $review_thumbnail_src; ?>" class="rounded-circle" alt="<?php echo $review_thumbnail_alt; ?>">
				  </div>				  
				  <div class="review-item-author float-left">
					<p class="m-0"><?php the_field('bt_review_name'); ?></p>
					<span><?php the_field('bt_review_location'); ?></span>
				  </div>
				</div>
				<div class="review-item-mid text-center d-inline-block">
				  <?php blacktieskis_platform(); ?>
				  <?php blacktieskis_rating(); ?>				  
				</div>
				<div class="review-item-content col-lg-offset-4">
				  <?php
				  if( !empty($review_link) ){
					?><h3><a href="<?php echo $review_link;?>" class="review-link" target="_blank"><?php						
					the_title();
					?></a></h3><?php
				  }
				  else{
					?><h3><?php						
					the_title();
					?></h3><?php
				  }
				  ?>
				  <?php 
					$blacktieskis_content = get_the_content();
					$blacktieskis_content = strip_tags($blacktieskis_content,'<br><a><strong>'); ?>
					<p><span><?php echo $blacktieskis_content;?></span></p>				  
					<span><?php echo date( 'F d, Y', strtotime( $_time ) ); ?></span>
				</div>
			  </div><?php
		endfor;
		wp_reset_query();
		wp_reset_postdata();
		?>
    </div>
    <div class="group-arrows"></div>
  </div>
</section>
<?php
endif;
