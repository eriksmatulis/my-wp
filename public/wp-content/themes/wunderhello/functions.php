<?php
// Enqueues custom stylesheet
function wunderhello_register_styles() {
    wp_enqueue_style('wunderhello-css', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');

    wp_enqueue_style('tailwind-output', get_template_directory_uri() . '/src/output.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'wunderhello_register_styles');

// Register custom menu for wunder-hello theme
function register_wunderhello_menu(){
    register_nav_menu('header-menu', __('Header Menu'));
}
add_action('init', 'register_wunderhello_menu');

// Register widgets
function wh_widgets_init(){
    register_sidebar( array(
       'name'       => 'New posts right sidebar',
       'id'         => 'new_right_1',
       'before_widget' => '<div class="bg-white rounded-lg shadow-lg p-6 md:p-10 lg:p-12 fixed top-1/2 right-0 py-5 px-10> </div> <div ">',
       'after_widget' => '</div></div>',
       'before_title' => '<h3>',
       'after_title' => '</h3>',

    ) );
}
add_action('widgets_init', 'wh_widgets_init');

?>