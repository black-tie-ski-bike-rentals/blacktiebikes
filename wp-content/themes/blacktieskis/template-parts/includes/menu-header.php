<header id="header" class="module" data-module="header">
	
	


	
  <?php
  $is_bar = get_field( 'enable_top_bar', 'option' );
	
  if($is_bar === true){?>
    <?php echo get_field( 'content_top_bar', 'option' );?>
	<?php
					   echo do_shortcode('[gtranslate]');

 ?>
<a href="tel:8663606433" class="desktop"> Call Us: 866.360.6433</a>&nbsp; &nbsp; <p class="popup-header-content__p2 center-left"  style=""><span style="display: inline-block;color: #fff; ;" class="" ><span style="display: inline-block;" class=" hide-x"></p>

        <p class="popup-header-content__p2 center-left"  style="" id="mob"><span style="display: inline-block;color: #fff; ;" class="" ><span style="display: inline-block;" class=" hide-x">

<a href="tel:866-360-6433">  <img src="https://www.blacktiebikes.com/wp-content/uploads/2024/05/btn-call.webp"  width="28px"  alt="Icon"></a>

      
</p>

      
        </div>
    </div>
  </div>
    <div id="covid-19" class="d-none">
      <div class="container popup-inner">
      <div class="privacy-policy">
        <?php the_field('content_popup', 'option'); ?>
      </div>
      </div>
    </div>
  <?php } ?>
  <nav class="container navbar navbar-expand-lg d-flex" role="navigation">
    <a id="header-logo" class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" alt="">
	  <?php blacktieskis_header_logo(); ?>
    </a>
    <div class="btn-cta">
			<!-- <a href="https://booknow.blacktieskis.com/" class="btn btn-outline-white" target="_blank">Book now11</a>-->
		<a href="javascript:void(0);" id="boonowbutton" data-id="#booknow" data-htmlclass="html-popup-content" class="popup-is-open">Book Now</a>
		</div>
    <button class="navbar-toggler hamburger-menu" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
	  
    <div class="navbar-collapse align-self-start" id="main-menu" data-module="menu">
	<?php			
		
		
		  $args = array(
        'menu'                 => '',
        'container'            => 'div',
        'container_class'      => 'menu-main-menu-container',
        'container_id'         => '',
        'container_aria_label' => '',
        'menu_class'           => 'ml-auto main-menu-ul navbar-nav',
        'menu_id'              => '',
        'echo'                 => true,
        'fallback_cb'          => 'wp_page_menu',
        'before'               => '',
        'after'                => '',
        'link_before'          => '',
        'link_after'           => '',
        'items_wrap'           => '<ul id="%1$s" class="ml-auto main-menu-ul navbar-nav">%3$s</ul>',
        'item_spacing'         => 'preserve',
        'depth'                => 0,
        'walker'               => '',
        'theme_location'       => '',
    );
		
		blacktieskis_main_menu();
			
//echo wp_nav_menu( $args );
		?> 
</div>

  </nav>
</header>
<main id="main-content" role="main">
	