<?php
/**
 * blacktieskis functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package blacktieskis
 */

 /**
 * Define constant
 */
define( 'TEMPLATE_URL', get_template_directory_uri() );
// WP Query
require get_template_directory() . '/inc/custom-query.php';
// Main helper
require get_template_directory() . '/inc/helper.php';
//Schema Markup
require get_template_directory() . '/inc/schema-markup.php';
//Custom post type
require get_template_directory() . '/inc/custom-post-type.php';
//Remove tag
require get_template_directory() . '/inc/remove-tags.php';
// //Menu
require get_template_directory() . '/inc/nav-walker.php';
// //Short code
require get_template_directory() . '/inc/shortcode.php';
// //Enqueue Style and Script.
require get_template_directory() . '/inc/enqueue.php';
// //Custom paginate
require get_template_directory() . '/inc/custom-paginate.php';
// //API Helpers
require get_template_directory() . '/inc/api-helpers.php';
/*
 * The Blacktieskis template section
 */
require get_template_directory() . '/inc/template.php';
//Ajax function
require get_template_directory() . '/inc/ajax-action.php';
// add_filter('wpcf7_spam', '__return_false');

add_filter( 'nav_menu_link_attributes', 'wpse121123_contact_menu_atts', 10, 3 );
function wpse121123_contact_menu_atts( $atts, $item, $args )
{
  // The ID of the target menu item
  $menu_target = 42;

  // inspect $item
  if ($item->ID == $menu_target) {
    $atts['data-id'] = '#contact';
	   $atts['class'] = 'popup-contact-us';
	  
  }
  return $atts;
}

function add_attribute_to_current_menu_item( $atts, $item, $args ) {
    // check if this item represents the current post
    if ( 29175 == get_the_ID() && $atts['href']=='https://btsr.flywheelsites.com/telluride/?id=1') 
    {
        // add the desired attributes:
        $atts['href'] ='#products';
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_attribute_to_current_menu_item', 10, 3 );

// WW-5: About Us — on the contact page, rewrite /#about to the homepage root
// so the smooth-scroll JS in app.js (which intercepts any href containing #)
// can't swallow the click. The browser navigates cleanly to the homepage.
add_filter( 'nav_menu_link_attributes', 'btb_about_us_contact_page_redirect', 10, 3 );
function btb_about_us_contact_page_redirect( $atts, $item, $args ) {
	if ( is_page( 'contact' ) && isset( $atts['href'] ) && $atts['href'] === '/#about' ) {
		$atts['href'] = home_url( '/' );
	}
	return $atts;
}

// WW-5: Jobs — add the data-id attribute needed by the popup-is-open-v2 trigger.
// The CSS class (popup-is-open-v2) is set on the menu item in WP Admin.
add_filter( 'nav_menu_link_attributes', 'btb_jobs_popup_attrs', 10, 3 );
function btb_jobs_popup_attrs( $atts, $item, $args ) {
	if ( isset( $item->title ) && $item->title === 'Jobs' ) {
		$atts['data-id'] = '#careers';
	}
	return $atts;
}