<?php
/********** Video Post types ***********/


add_action('init', 'wp_videos_init');

function wp_videos_init(){

	$labels = array(
	'name' => _x('Videos', 'post type general name'),
	'singular_name' => _x('Video', 'post type singular name'),
	'add_new' => _x('Add New', 'Video'),
	'add_new_item' => __('Add New Video'),
	'edit_item' => __('Edit Video'),
	'new_item' => __('New Video'),
	'all_items' => __('All Video'),
	'view_item' => __('View Video'),
	'search_items' => __('Search Video'),
	'not_found' =>  __('No Video found'),
	'not_found_in_trash' => __('No Video found in Trash'), 
	'parent_item_colon' => '',
	'menu_name' => 'Videos'

	);
	$args = array(
	'labels' => $labels,
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true, 
	'show_in_menu' => true, 
	'query_var' => true,
	'rewrite' => array(
			'slug' => 'videos'
			),
	'capability_type' => 'post',
	'has_archive' => true, 
	'hierarchical' => false,
	'menu_position' => null,
	'supports' => array('title','editor','excerpt','thumbnail')
	); 
	register_post_type('videos',$args);
}
?>