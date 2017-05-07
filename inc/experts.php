<?php
/********** Experts Post types ***********/


add_action('init', 'wp_experts_init');

function wp_experts_init(){

	$labels = array(
	'name' => _x('Experts', 'post type general name'),
	'singular_name' => _x('Experts', 'post type singular name'),
	'add_new' => _x('Add New', 'Expert'),
	'add_new_item' => __('Add New Expert'),
	'edit_item' => __('Edit Experts'),
	'new_item' => __('New Expert'),
	'all_items' => __('All Experts'),
	'view_item' => __('View Expert'),
	'search_items' => __('Search Experts'),
	'not_found' =>  __('No Expert found'),
	'not_found_in_trash' => __('No Expert found in Trash'), 
	'parent_item_colon' => '',
	'menu_name' => 'Experts'

	);
	$args = array(
	'labels' => $labels,
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true, 
	'show_in_menu' => true, 
	'query_var' => true,
	'rewrite' => array(
			'slug' => 'expert'
			),
	'capability_type' => 'post',
	'has_archive' => true, 
	'hierarchical' => false,
	'menu_position' => null,
	'supports' => array('title','editor','excerpt','thumbnail')
	); 
	register_post_type('expert',$args);
}
?>