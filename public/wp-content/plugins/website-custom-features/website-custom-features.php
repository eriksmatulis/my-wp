<?php

/*
Plugin Name: custom feature tutorial
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: A basic plugin that displays a customizable welcome message in admin dashboard.
Version: 1.0
Author: eriksralfsmatulis
Author URI: http://URI_Of_The_Plugin_Author
License: A "Slug" license name e.g. GPL2
*/

// Prevent unauthorized direct access
if (!defined('ABSPATH')) {
    exit;
}

// Plugin's public URL
// site.com/wp-content/plugins/website-custom-features/
define('WCFP_PLUGIN_URL', plugin_dir_url(__FILE__));

// Directory path for file operations
// C:\xampp\htdocs\website\wp-content\plugins\website-custom-features
define('WCFP_PLUGIN_DIR', plugin_dir_path(__FILE__));

// ------------------------------------------------ ENQUEUE SCRIPTS
/*
Enqueue CSS and JavaScript files for the plugin with versioning
based on file modification times. This prevents having to clear
cache every time there is a new change.
*/

function WCFP_add_scripts() {
    $css_file = WCFP_PLUGIN_URL . 'inc/style.css';
    $css_file_version = filemtime(WCFP_PLUGIN_DIR . 'inc/style.css');
    wp_enqueue_style('WCFP-main-style', $css_file, [], $css_file_version);

    // Main JS
    $js_file = WCFP_PLUGIN_URL . 'inc/script.js';
    $js_file_version = filemtime(WCFP_PLUGIN_DIR . 'inc/script.js');
    wp_enqueue_script('WCFP-main-script', $js_file, ['jquery'], $js_file_version, true);
}
add_action('wp_enqueue_scripts', 'WCFP_add_scripts');

// ON ACTIVATION
register_activation_hook(__FILE__, 'WCFP_activate');

// ON DEACTIVATION
register_deactivation_hook(__FILE__, 'WCFP_deactivate');

register_uninstall_hook(__FILE__, 'WCFP_uninstall');

register_activation_hook(__FILE__, 'WCFP_activate');
function WCFP_activate() {
    /* EXAMPLE
    //-- Set default options --//
    add_option('my_plugin_options', 'default_value');

    //-- Create custom database tables --//
    global $wpdb;
    $table_name = $wpdb->prefix . 'my_custom_table';
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        name tinytext NOT NULL,
        text text NOT NULL,
        url varchar(55) DEFAULT '' NOT NULL,
        UNIQUE KEY id (id)
    );";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    //-- Other setup tasks --//
    // Additional code here
    */
}


function WCFP_deactivate() {
    /* EXAMPLE
    //-- Remove temporary data --//
    delete_transient('my_plugin_temp_data');

    //-- Stop cron jobs --//
    wp_clear_scheduled_hook('my_plugin_cron_job');

    //-- Revert settings temporarily changed by the plugin --//
    update_option('my_plugin_settings', 'original_value');
    */
}

function WCFP_uninstall() {
    /* EXAMPLE
    //-- Delete options --//

    delete_option('my_plugin_options');

    //-- Drop a custom database table --//

    global $wpdb;
    $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}my_custom_table");

    */
}