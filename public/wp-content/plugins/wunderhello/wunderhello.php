<?php

/**
* Plugin Name: WunderHello
* Description: Adds a customizable greeting to admin dashboard.
* Version: 1.0
**/

if (!defined('ABSPATH')) {
    exit;
}

// ON ACTIVATION
register_activation_hook(__FILE__, 'WH_activate');

// ON DEACTIVATION
register_deactivation_hook(__FILE__, 'WH_deactivate');

// ON UNINSTALL
register_uninstall_hook(__FILE__, 'WH_uninstall');

function WH_activate() {
}
function WH_deactivate() {}
function WH_uninstall() {
    unregister_setting('WH_welcome_message');
}
function hello_wunder() {
    $msg = get_option('WH_welcome_message');
    printf('<p>%s</p>', $msg);
}

// Prints custom greeting when admin panel is opened
add_action('admin_notices', 'hello_wunder');

function WH_settings_init() {
    register_setting('general', 'WH_welcome_message');

    add_settings_section(
        'WH_settings_section',
        'WunderHello settings',
        'WH_settings_section_callback',
        'general'
    );

    add_settings_field(
        'WH_settings_field',
        'Custom hello message: ',
        'WH_settings_field_callback',
        'general',
        'WH_settings_section'
    );
}

add_action('admin_init', 'WH_settings_init');

function WH_settings_section_callback() {
    echo '<p>This section allows you to enter your custom welcome message for the admin dashboard.</p>';
}

function WH_settings_field_callback() {
    $setting = get_option('WH_welcome_message');

    ?>
    <input type="text" name="WH_welcome_message" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
    <?php
}