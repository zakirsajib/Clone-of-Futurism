<?php
/********** Images Post types ***********/


add_action('init', 'wp_images_init');

function wp_images_init(){

	$labels = array(
	'name' => _x('Images', 'post type general name'),
	'singular_name' => _x('Image', 'post type singular name'),
	'add_new' => _x('Add New', 'Image'),
	'add_new_item' => __('Add New Image'),
	'edit_item' => __('Edit Image'),
	'new_item' => __('New Image'),
	'all_items' => __('All Images'),
	'view_item' => __('View Image'),
	'search_items' => __('Search Images'),
	'not_found' =>  __('No Images found'),
	'not_found_in_trash' => __('No Images found in Trash'), 
	'parent_item_colon' => '',
	'menu_name' => 'Images'

	);
	$args = array(
	'labels' => $labels,
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true, 
	'show_in_menu' => true, 
	'query_var' => true,
	'rewrite' => array(
			'slug' => 'images'
			),
	'capability_type' => 'post',
	'has_archive' => true, 
	'hierarchical' => false,
	'menu_position' => null,
	'supports' => array('title','editor','excerpt','thumbnail'),
	'taxonomies'          => array( 'category' )
	); 
	register_post_type('images',$args);
}
?>