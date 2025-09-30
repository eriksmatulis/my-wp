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

function team_member_name_register_meta() {
	register_post_meta( 'wunderteam', 'team_member_name', [
		'show_in_rest' => true, 
		// Process the value of the field when saving it to the database
		'sanitize_callback' => 'wp_strip_all_tags', 
		] );
}

function team_member_github_account_register_meta() {
	register_post_meta( 'wunderteam', 'team_member_github_account', [
		'show_in_rest' => true, 
		// Process the value of the field when saving it to the database
		'sanitize_callback' => 'wp_strip_all_tags', 
		] );
}

function team_member_linkedin_account_register_meta() {
	register_post_meta( 'wunderteam', 'team_member_linkedin_account', [
		'show_in_rest' => true, 
		// Process the value of the field when saving it to the database
		'sanitize_callback' => 'wp_strip_all_tags', 
	] );
}

function team_member_position_register_meta() {
	register_post_meta( 'wunderteam', 'team_member_position', [
		'show_in_rest' => true, 
		// Process the value of the field when saving it to the database
		'sanitize_callback' => 'wp_strip_all_tags', 
		] );
}

add_action('init', 'team_member_github_account_register_meta');
add_action('init', 'team_member_name_register_meta');
add_action('init', 'team_member_position_register_meta');
add_action('init', 'team_member_linkedin_account_register_meta');

function team_cpt_shortcode_block() {
    return '
    <!-- wp:heading {"textAlign":"center"} -->
    <h2 class="wp-block-heading has-text-align-center">Our Team</h2>
    <!-- /wp:heading -->

    <!-- wp:group {"metadata":{"categories":["posts"],"patternName":"core/query-large-title-posts","name":"Large title"},"align":"full","style":{"spacing":{"padding":{"top":"100px","right":"100px","bottom":"100px","left":"100px"}},"color":{"text":"#ffffff","background":"#000000"}}} -->
    <div class="wp-block-group alignfull has-text-color has-background" style="color:#ffffff;background-color:#000000;padding-top:100px;padding-right:100px;padding-bottom:100px;padding-left:100px"><!-- wp:query {"queryId":20,"query":{"perPage":10,"pages":0,"offset":0,"postType":"wunderteam","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[],"format":[]}} -->
    <div class="wp-block-query"><!-- wp:post-template -->
    <!-- wp:separator {"opacity":"css","className":"alignwide is-style-wide","style":{"color":{"background":"#ffffff"}}} -->
    <hr class="wp-block-separator has-text-color has-css-opacity has-background alignwide is-style-wide" style="background-color:#ffffff;color:#ffffff"/>
    <!-- /wp:separator -->

    <!-- wp:post-title /-->

    <!-- wp:group {"align":"wide","layout":{"type":"grid","columnCount":3,"minimumColumnWidth":null}} -->
    <div class="wp-block-group alignwide"><!-- wp:post-content /-->

    <!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"team_member_position"}}}},"className":"team-name","style":{"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"primary2","fontSize":"medium"} -->
    <p class="team-name has-primary-2-background-color has-background has-medium-font-size"></p>
    <!-- /wp:paragraph -->

    <!-- wp:group {"backgroundColor":"secondary2","layout":{"type":"flex","orientation":"horizontal","justifyContent":"left","flexWrap":"wrap","verticalAlignment":"center"}} -->
    <div class="wp-block-group has-secondary-2-background-color has-background"><!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"team_member_linkedin_account"}}}},"className":"team-name","style":{"layout":{"selfStretch":"fit","flexSize":null}},"backgroundColor":"secondary2"} -->
    <p class="team-name has-secondary-2-background-color has-background"></p>
    <!-- /wp:paragraph -->

    <!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"team_member_github_account"}}}},"className":"team-name","style":{"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"secondary2"} -->
    <p class="team-name has-secondary-2-background-color has-background"></p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group --></div>
    <!-- /wp:group -->
    <!-- /wp:post-template --></div>
    <!-- /wp:query --></div>
    <!-- /wp:group -->
    ';
}

// Register shorcode [wunder_team] to display team members added with the newly created custom post type
add_shortcode( 'wunder_team', 'team_cpt_shortcode_block' );