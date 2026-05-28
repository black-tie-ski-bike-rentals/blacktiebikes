<?php
/**
 * Displays content for Team Section
 */ 
?>
<?php 
$hero_img_video_embed = get_sub_field('video_embed');
?>


<style>



.col-lg-4 {

  text-align: center;
}
 .home-jumbotron::after {

  border-top:0px solid #eee;
}
</style>

<section class="module mod-reviews container">
<div class="home-jumbotron jumbotron">



<h1 style="text-align:center;padding-top:20px;">Our Team</h1>

<div>
   <div class="row">
<?php
      
        if( have_rows('team') ):
            while( have_rows('team') ) : the_row();
$title = get_sub_field('title');
$image = get_sub_field('image');
$description = get_sub_field('description');


              ?>
		
              <div class="col-lg-3">
                <img style="width: 300px; height: 300px;" alt="Performance Packages" src="<?php echo $image; ?>" >
                <h2 style="text-align:center;"><?php echo $title; ?></h2>
                <p><?php echo $description; ?></p>
                <!-- <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
              </div><!-- /.col-lg-4 -->
			  
			  <?php
                

            endwhile;
        endif;
		?>
		
		

</div>
</div>
</div>
</section>