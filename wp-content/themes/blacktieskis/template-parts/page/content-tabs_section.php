<?php
/**
 * Displays content for Tabs Section
 */ 
?>
<?php 
$hero_img_video_embed = get_sub_field('video_embed');
?>


<style>


/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 36px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

.col-lg-4 {

  text-align: center;
}
 .home-jumbotron::after {

  border-top:0px solid #eee;
}
	
	.tab button.active:hover {
  background-color: #fff;
}
	
	
</style>

<section class="module mod-reviews container" id="products">
	
	<h1 class="entry-title" style="text-align:center;"><?php echo get_sub_field('heading'); ?></h1>
<div class="home-jumbotron jumbotron">

<div class="tab">
<?php
/**
 * Field Structure:
 *
 * - parent_repeater (Repeater)
 *   - parent_title (Text)
 *   - child_repeater (Repeater)
 *     - child_title (Text)
 */
if( have_rows('tabs') ):
    while( have_rows('tabs') ) : the_row();
	// Get parent value.
        $tab_label = get_sub_field('tab_label');
?>
	<?php if($tab_label=='Bikes'){ ?>
  <button class="tablinks active" onclick="openCity(event, '<?php echo $tab_label;?>')"><?php echo $tab_label;?></button>
	<?php }else{ ?>
	 <button class="tablinks" onclick="openCity(event, '<?php echo $tab_label;?>')"><?php echo $tab_label;?></button>
	<?php } ?>
  <?php

    endwhile;

endif;

?>
  
</div>



<?php
/**
 * Field Structure:
 *
 * - parent_repeater (Repeater)
 *   - parent_title (Text)
 *   - child_repeater (Repeater)
 *     - child_title (Text)
 */
 $i=1;
if( have_rows('tabs') ):
    while( have_rows('tabs') ) : the_row();
	// Get parent value.
        $tab_label = get_sub_field('tab_label');
?>
<div id="<?php echo $tab_label; ?>" class="tabcontent" <?php if($i==1){ ?> style="display: block;"  <?php  } ?> >
   <div class="row">
<?php
        $i++;

        // Loop over sub repeater rows.
        if( have_rows('description') ):
            while( have_rows('description') ) : the_row();
$title = get_sub_field('title');
$image = get_sub_field('image');
$description = get_sub_field('description');
	   
   $imageID = get_sub_field('image'); 
	$image1 = wp_get_attachment_image_src( $imageID, 'full' );
	$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
?>
		
              <div class="col-lg-3">
                <img style="width: 300px; height: 300px;" alt="<?php echo $alt_text; ?>" src="<?php echo $image1[0]; ?>" >
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
		<?php
    endwhile;
endif;
?>

</div>
</div>
</div>
</section>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>


