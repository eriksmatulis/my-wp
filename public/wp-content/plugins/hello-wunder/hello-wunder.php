<?php
/**
 * Plugin Name: My First Plugin
 * Description: A simple example plugin.
 * Version: 1.0
 * Author: ERM
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

// Function to display message
function wunder_hello_message() {
    return "<h2 style='color: #2c3e50;'>Hello, Wunder Interns! 🚀</h2>";
}

// Register shortcode [hello_wunder]
add_shortcode( 'hello_wunder', 'wunder_hello_message' );
