<?php
/**
 * Plugin Name: Team Custom Post Type
 * Description: Plugin for creating and inserting a team member custom post type.
 * Version: 1.0
 * Author: ERM
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

function wunderteam_custom_post_type() {
	register_post_type('wunderteam',
		array(
			'labels'      => array(
				'name'          => __( 'Team Members', 'textdomain' ),
				'singular_name' => __( 'Team Member', 'textdomain' ),
                'add_new'       => __( 'Add New', 'textdomain'),
                'add_new_item'  => __( 'Add New Member', 'textdomain'),
			),
			'public'      => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'team' ), // my custom slug
            'supports'    => array('title', 'editor', 'custom-fields', 'thumbnail'),
            'show_in_rest' => true,
            'menu_icon'   => 'dashicons-admin-users',
		)
	);
}
add_action('init', 'wunderteam_custom_post_type');
