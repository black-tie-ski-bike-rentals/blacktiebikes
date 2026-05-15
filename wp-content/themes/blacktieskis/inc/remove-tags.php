<?php
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version*/
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'rest_outputx_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('template_redirect', 'rest_output_link_header', 11, 0);
remove_action('wp_head', 'wp_resource_hints', 2);

add_filter('wpseo_canonical', '__return_false');

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');

if (!function_exists('blacktieskis_remove_jquery_migrate')) {
	function blacktieskis_remove_jquery_migrate(&$scripts) {
		if (!is_admin()) {
			$scripts->remove('jquery');
			$scripts->add('jquery', false, array('jquery-core'), '1.10.2');
		}
	}
}
//add_filter('wp_default_scripts', 'blacktieskis_remove_jquery_migrate');

if (!function_exists('blacktieskis_no_more_jquery')) {
	function blacktieskis_no_more_jquery() {
		wp_deregister_script('jquery');
	}
}
//add_action('wp_enqueue_scripts', 'blacktieskis_no_more_jquery');

if (!function_exists('blacktieskis_remove_api')) {
	function blacktieskis_remove_api() {
		remove_action('wp_head', 'rest_output_link_wp_head', 10);
		remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
	}
}
add_action('after_setup_theme', 'blacktieskis_remove_api');

if (!function_exists('blacktieskis_my_deregister_scripts')) {
	function blacktieskis_my_deregister_scripts() {
		wp_deregister_script('wp-embed');
	}
}
add_action('wp_footer', 'blacktieskis_my_deregister_scripts');


if (!function_exists('blacktieskis_my_jquery_enqueue')) {
	function blacktieskis_my_jquery_enqueue() {
		wp_deregister_script('jquery');
		wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://code.jquery.com/jquery-3.2.1.min.js", false, null, false);
		wp_enqueue_script('jquery');
	}
}
//if (!is_admin()) add_action("wp_enqueue_scripts", "blacktieskis_my_jquery_enqueue", 11);

add_filter( 'w3tc_can_print_comment', '__return_false', 10, 1 );