<?php
/**
 * Plugin Name: Tutorials Custom Post Type
 * Description: Plugin for creating and inserting a team member custom post type.
 * Version: 1.0
 * Author: ERM
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

function tutorials_custom_post_type() {
	register_post_type('tutorials',
		array(
			'labels'      => array(
				'name'          => __( 'Tutorials', 'textdomain' ),
				'singular_name' => __( 'Tutorial', 'textdomain' ),
                'add_new'       => __( 'Add New', 'textdomain'),
                'add_new_item'  => __( 'Add New Tutorial', 'textdomain'),
			),
			'public'      => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'tutorials' ), // my custom slug
            'supports'    => array( 'title', 'editor', 'custom-fields', 'thumbnail'),
            'show_in_rest' => true,
            'menu_icon'   => 'dashicons-admin-users',
		)
	);
 
    register_setting('general', 'tutorial_author_name_register_meta');

}
add_action('init', 'tutorials_custom_post_type');

function tutorial_author_name_register_meta() {
	register_post_meta( 'tutorials', 'tutorial_author_name', [
		'show_in_rest' => true, 
		// Process the value of the field when saving it to the database
		'sanitize_callback' => 'wp_strip_all_tags', 
		] );
}

add_action('init', 'tutorial_author_name_register_meta');

// TAXONOMY
function tutorial_register_taxonomy() {
	// Taxonomy for Topics
	$args = array(
		'labels' => array(
			'name' => 'Topics',
			'singular_name' => 'Topic',
			'edit_item' => 'Edit Topic',
			'update_item' => 'Update Topic',
			'add_new_item' => 'Add New Topic',
			'new_item_name' => 'New Topic Name',
			'menu_name' => 'Topic',
		),
		'hierarchical' => true,
		'rewrite' => array('slug', 'topic'),
		'show_in_rest' => true,
	);
	register_taxonomy('topic', 'tutorials', $args);

	// Taxonomy for Difficulty
	$args = array(
		'labels' => array(
			'name' => 'Difficulty',
			'singular_name' => 'Difficulty',
			'edit_item' => 'Edit Difficulty',
			'update_item' => 'Update Difficulty',
			'add_new_item' => 'Add New Difficulty',
			'new_item_name' => 'New Difficulty Name',
			'menu_name' => 'Difficulty',
		),
		'hierarchical' => true,
		'rewrite' => array('slug', 'difficulty'),
		'show_in_rest' => true,
	);
	register_taxonomy('difficulty', 'tutorials', $args);	
}

add_action('init', 'tutorial_register_taxonomy');