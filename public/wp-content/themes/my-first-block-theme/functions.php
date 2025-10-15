<?php

function myblocks_myheader_block_init() {
	/**
	 * Registers the block(s) metadata from the `blocks-manifest.php` and registers the block type(s)
	 * based on the registered block metadata.
	 * Added in WordPress 6.8 to simplify the block metadata registration process added in WordPress 6.7.
	 *
	 * @see https://make.wordpress.org/core/2025/03/13/more-efficient-block-type-registration-in-6-8/
	 */
	if ( function_exists( 'wp_register_block_types_from_metadata_collection' ) ) {
		wp_register_block_types_from_metadata_collection( __DIR__ . '/build', __DIR__ . '/build/blocks-manifest.php' );
		return;
	}

	/**
	 * Registers the block(s) metadata from the `blocks-manifest.php` file.
	 * Added to WordPress 6.7 to improve the performance of block type registration.
	 *
	 * @see https://make.wordpress.org/core/2024/10/17/new-block-type-registration-apis-to-improve-performance-in-wordpress-6-7/
	 */
	if ( function_exists( 'wp_register_block_metadata_collection' ) ) {
		wp_register_block_metadata_collection( __DIR__ . '/build', __DIR__ . '/build/blocks-manifest.php' );
	}
	/**
	 * Registers the block type(s) in the `blocks-manifest.php` file.
	 *
	 * @see https://developer.wordpress.org/reference/functions/register_block_type/
	 */
	$manifest_data = require __DIR__ . '/build/blocks-manifest.php';
	foreach ( array_keys( $manifest_data ) as $block_type ) {
		register_block_type( __DIR__ . "/build/{$block_type}" );
	}
}
add_action( 'init', 'myblocks_myheader_block_init' );

// REST API
add_action('rest_api_init', function () {
  register_rest_route('intern/v1', '/hello/', array(
    'methods' => 'GET',
    'callback' => function () {
      return array('message' => 'Hello from REST API!');
    },
  ));
});

// Custom REST route that returns 5 latest posts and their link+title
add_action('rest_api_init', function () {
	register_rest_route('intern/v1', '/recent/', array(
		'methods' => 'GET',
		'callback' => function () {

			// Get recent posts (limit to 5 max)
			$recent = wp_get_recent_posts(array(
				'numberposts' => 5
			));
			// Create new array to hold posts that will be displayed in REST call
			$rest_posts = array();
			
			for ($i=0; $i < count($recent); $i++) {
				// Create new array for each post
				$post = array();	
				// Add current post's hyperlink and title to post array
				$post['post_link'] = $recent[$i]['guid'];
				$post['post_title'] = $recent[$i]['post_title'];
				// Add current post's data to posts array
				array_push($rest_posts, $post);
			}

			return array('recent_posts' => $rest_posts);
		},
	));
});