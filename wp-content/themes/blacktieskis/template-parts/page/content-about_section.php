<?php
/**
 * Displays content for About Section
 */ 
?>
<?php 
$about_photo = get_sub_field('photo');
?>
<?php 
$pageid = get_the_ID();

if($pageid==20){ ?>
<section id="about" class="module mod-about container-fluid animation">
	<?php }else{ ?>
	<section id="about" class="module mod-about container-fluid ">
		<?php } ?>
		
  <div class="row">
    <div class="col-left col-12 col-lg-6">
		<?php 
		if( !empty($about_photo) ) :
			?><div class="mod-about-background" data-src="<?php echo $about_photo['url']; ?>" style="background-position: center center;"></div><?php
		endif;
		?>      
      <div class="triangle-blue"></div>
      <div class="triangle-black"></div>
      <div class="triangle-purple triangle-purple-left"></div>
    </div>
    <div class="col-right col-12 col-lg-6 d-flex">
      <div class="triangle-purple triangle-purple-right"></div>
      <div class="mod-about-content ani-bottom">
        <?php blacktieskis_sub_field('description'); ?>
      </div>
    </div>
  </div>
</section>