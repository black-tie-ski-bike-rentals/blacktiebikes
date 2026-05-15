<?php
/**
 * Displays content for 4 Column Section
 */ 
?>
<?php 

$description_box = get_sub_field('description_box');

$pageid = get_the_ID();

if($pageid==20){ ?>
<section id="products" class="module mod-about container-fluid animation">
	<?php }else{ ?>
	<section  class="module mod-about container-fluid ">
		<?php } ?>
		
  	

    
		  <div class="home-jumbotron jumbotron">
		  <h1 class="entry-title" style="text-align:center;"><?php echo $heading; ?></h1>
		 
                <div class="row">
                    <div class="col-sm-12">
                        <?php echo $description_box; ?>
<!--<p style="text-align: center;"><em>Bringing your own boots? Just subtract $4/day from any ski or board package.</em></p>-->
                        </div>
                    </div>
                </div> </div>
</section>