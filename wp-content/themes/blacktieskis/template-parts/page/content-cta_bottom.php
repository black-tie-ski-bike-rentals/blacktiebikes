<?php
/**
 * Displays content for CTA footer Section
 */ 
?>
<?php 
$footer_headline = get_sub_field('headline');
$footer_cta_popup_title = get_sub_field('cta_popup_title');
$footer_cta_title = get_sub_field('cta_title');
$image1 = get_sub_field('full_image');
$image2 = get_sub_field('desk_image');
?>
<section  style="border-top:1px solid #EEEEEE;">
    <div class="book-ski-headline container text-center ani-bottom">
        <?php 
		if( !empty($footer_headline) ) :
			?><h2><?php echo $footer_headline; ?></h2><?php
		endif;
		if( !empty($footer_cta_popup_title) ) :
			?><a href="https://www.blacktiebikes.com/contact/" class="btn btn-outline-primary text-uppercase" ><?php echo $footer_cta_popup_title; ?></a><?php
		endif;
		if( !empty($footer_cta_title) ) :
			?> &nbsp; <a href="javascript:void(0);" id="boonowbutton" data-id="#booknow" data-htmlclass="html-popup-content" class="popup-is-open btn btn-primary text-uppercase"><?php echo $footer_cta_title; ?></a><?php
		endif;
		?>       
    </div>
	  <div class="bg-book-ski-fulldesk ani-bottom" data-src="<?php echo $image1; ?>" style="background-position: top center;"></div>
    <div class="bg-book-ski-desk ani-bottom" style="background-image:url('<?php echo $image2; ?>'); background-position: center center;"></div>	    
</section>