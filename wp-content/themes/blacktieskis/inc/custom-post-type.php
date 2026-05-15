<?php
/*
 * Register Custom Taxonomies Type
 * for the post type
 */
function blacktieskis_create_taxonomies()
{	
	//State/Country Parent Location 
	$labels = array(
        'name' => _x('State/Location', 'taxonomy general name'),
        'singular_name' => _x('Category', 'taxonomy singular name'),
        'search_items' => __('Search Categories'),
        'all_items' => __('All Categories'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
        'menu_name' => __('Geographical Location'),
    );	
	
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
		'rewrite' => array(
			'slug' => false,
			'with_front' => false
		),
    );

    register_taxonomy('category_state_location', array('bt_resport'), $args);
	flush_rewrite_rules();	
}
// hook into the init action and call blacktieskis_create_taxonomies when it fires
add_action('init', 'blacktieskis_create_taxonomies', 0);

/**
 * Define custom post type
 */
//Add option page
if ( ! function_exists('blacktieskis_create_post_type')) {
	function blacktieskis_create_post_type() 
	{
		//Individual Resport
		$labels = array(
			'name' => _x('Resorts', 'Post Type General Name'),
			'singular_name' => _x('Resort', 'Post Type Singular Name'),
			'menu_name' => __('Resortss'),
			'parent_item_colon' => __('Parent Resort:'),
			'all_items' => __('All Resorts'),
			'view_item' => __('View Resort'),
			'add_new_item' => __('Add New Resort'),
			'add_new' => __('Add New'),
			'edit_item' => __('Edit Resort'),
			'update_item' => __('Update Resort'),
			'search_items' => __('Search Resort'),
			'not_found' => __('Not found'),
			'not_found_in_trash' => __('Not found in Trash'),
			'featured_image'        => __( 'Resort’s Image' ),
			'set_featured_image'    => __( 'Set resort’s image' ),
			'remove_featured_image' => __( 'Remove resort’s photo' ),
			'use_featured_image'    => __( 'Use as resort’s photo' )			
		);
		$args = array(
			'label' => __('Resort'),
			'description' => __('Attached to the resort pages'),
			'labels' => $labels,
			'supports' => array('title', 'thumbnail'),
			'taxonomies' => array('category_state_location'),
			'hierarchical' => false,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'show_in_admin_bar' => true,
			'menu_position' => 4,
			'menu_icon' => 'dashicons-location',
			'can_export' => true,
			'has_archive' => false,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'capability_type' => 'post',
		);
		register_post_type('bt_resport', $args);
		flush_rewrite_rules();		
	}
}
add_action( 'init', 'blacktieskis_create_post_type' );

