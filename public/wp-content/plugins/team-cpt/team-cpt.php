<?php
/**
 * Plugin Name: Team Member Custom Post Type
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
    register_setting('general', 'wunderteam_max_per_row');
    register_setting('general', 'wunderteam_display_socials');
}
add_action('init', 'wunderteam_custom_post_type');

// Create custom settings page
function wunderteam_register_ref_page() {
    add_submenu_page(
        'edit.php?post_type=wunderteam',
        __( 'Team CPT Settings', 'textdomain' ),
        __( 'Team CPT Settings', 'textdomain' ),
        'manage_options',
        'books-shortcode-ref',
        'wunderteam_ref_page_callback'
    );
}

/*
* Display callback for the submenu page.
*/
function wunderteam_ref_page_callback() { 
    $setting = get_option('wunderteam_max_per_row');?>

    <div class="wrap">
        <form method="post" action="">
            <table class="form-table">
                <tr>
                    <th>
                        <label for="wunderteam_max_per_row"><?php esc_html_e('Team members per row:', 'themeName'); ?></label>
                    </th>
                    <td>
                        <input type="text" name="wunderteam_max_per_row" id="wunderteam_max_per_row" value="<?php echo esc_attr($setting); ?>">
                        <p class="description"><?php esc_html_e('Enter how many team members should be displayed per row.', 'themeName'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="wunderteam_display_socials"><?php esc_html_e('Display team member socials:', 'themeName'); ?></label>
                    </th>
                    <td>
                        <input type="checkbox" name="wunderteam_display_socials" id="wunderteam_display_socials" <?php if (get_option('wunderteam_display_socials') == "true") echo "checked" ?> >
                        <p class="description"><?php esc_html_e('Should social links be displayed for each team member?', 'themeName'); ?></p>
                    </td>
                </tr>
            </table>
            <?php submit_button(__('Save Settings', 'themeName'), 'primary', 'save_wt_settings'); ?>
        </form>
    </div>

    
    <?php
        if (isset($_POST['wunderteam_display_socials'])) $displaySocials = "true";
        else $displaySocials = "false";

        if (isset($_POST['save_wt_settings'])) {
        update_option('wunderteam_max_per_row', sanitize_text_field($_POST['wunderteam_max_per_row']));
        update_option('wunderteam_display_socials', $displaySocials);
        echo '<div class="updated"><p>Settings saved.</p></div>';
    }
}

add_action( 'admin_menu', 'wunderteam_register_ref_page' );

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
    // Get values for total number of team members per column and whether to display social links
    $columns = get_option('wunderteam_max_per_row');
    $displaySocials = get_option('wunderteam_display_socials');
    $text = '        
        <!-- wp:heading {"textAlign":"center"} -->
        <h2 class="wp-block-heading has-text-align-center">Our Team</h2>
        <!-- /wp:heading -->

        <!-- wp:query {"queryId":50,"query":{"perPage":6,"pages":0,"offset":0,"postType":"wunderteam","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[],"format":[]},"metadata":{"categories":["posts"],"patternName":"core/query-grid-posts","name":"Grid"}} -->
        <div class="wp-block-query"><!-- wp:separator -->
        <hr class="wp-block-separator has-alpha-channel-opacity"/>
        <!-- /wp:separator -->

        <!-- wp:post-template {"layout":{"type":"grid","columnCount":'.$columns.'}} -->
        <!-- wp:group {"style":{"spacing":{"padding":{"top":"30px","right":"30px","bottom":"30px","left":"30px"}}},"layout":{"inherit":false}} -->
        <div class="wp-block-group" style="padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px"><!-- wp:post-title {"isLink":true} /-->

        <!-- wp:post-content /-->

        <!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"team_member_position"}}}},"className":"team-name","style":{"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"primary2","fontSize":"medium"} -->
        <p class="team-name has-primary-2-background-color has-background has-medium-font-size"></p>
        <!-- /wp:paragraph -->';
    
    if ($displaySocials == "true") {
        $text .=
        '
            <!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"team_member_linkedin_account"}}}},"className":"team-name","style":{"layout":{"selfStretch":"fit","flexSize":null}},"backgroundColor":"secondary2"} -->
            <p class="team-name has-secondary-2-background-color has-background"></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"team_member_github_account"}}}},"className":"team-name","style":{"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"secondary2"} -->
            <p class="team-name has-secondary-2-background-color has-background"></p>
            <!-- /wp:paragraph --></div>
        ';
    }

    $text .=
    '
        <!-- /wp:group -->
        <!-- /wp:post-template --></div>
        <!-- /wp:query -->
    ';
    
    return $text;
}

// Register shortcode [wunder_team] to display team members added with the newly created custom post type
add_shortcode( 'wunder_team', 'team_cpt_shortcode_block' );