<?php

/**
*Plugin Name: Bizzy for WordPress
*Plugin URI: http://www.bizzy.io
*Description: A plugin to genrate sign up forms for Bizzy email lists.
*Version:     0.1
*Author:      Amanda Kremser
*Author URI:  http://www.amandakremser.com
*License:     GPL2
*License URI: https://www.gnu.org/licenses/gpl-2.0.html
*Domain Path: /languages
*Text Domain: my-toolset
*/

function bizzy_email_forms_install() {
  
}
register_activation_hook( __FILE__, 'bizzy_email_forms_install' );

function bizzy_email_forms_deactivation() {
  
}
register_deactivation_hook( __FILE__, 'bizzy_email_forms_deactivation' );

if ( is_admin() ) {
     // We are in admin mode
     require_once( dirname(__file__).'/admin/bizzy_email_forms_admin.php' );
}

function bizzy_email_form_shortcode( $atts ) {
    $a = shortcode_atts( array(
        'headline' => 'Headline goes here',
        'cta' => 'Call to Action',
        'api' => '96919ae8-291c-7ca6-fea3-1e54462690ac',
        'source' => 'Blog',
        'placeholder' => 'Email',
        'button' => 'Subscribe',
    ), $atts );

    $headline_string = '<div class="bizzy-form-box"><h3>' . $a['headline'] . '</h3>';
	$cta_string = '<p>' . $a['cta'] . '</p>';
	$form_api_string = '<form method="post" action="https://app.bizzy.io/external-api/customers">' . '<input type="hidden" id="api_key" name="api_key" value="' . $a['api'] . '" />';
	$form_source_string = '<input type="hidden" id="source" name="source" value="' . $a['source'] . '" />';
	$form_placeholder_string = '<input type="text" id="email" name="customer[email]" placeholder="' . $a['placeholder'] . '" />';
	$form_redirect_string = '<input type="hidden" id="redirect" name="redirect" value="true" />';
	$form_button_string = '<input type="submit" value="' . $a['button'] . '" /></form></div>';

	$output_string = $headline_string . $cta_string . $form_api_string . $form_source_string . $form_placeholder_string . $form_redirect_string . $form_button_string;

    return $output_string;
}
 
function bizzy_email_form_register_shortcode() {
    add_shortcode( 'bizzyform', 'bizzy_email_form_shortcode' );
}
 
add_action( 'init', 'bizzy_email_form_register_shortcode' );

function bizzy_email_form_enqueue_styles() {
		wp_enqueue_style( 'bizzy_form__styles', plugin_dir_url( __FILE__ ) . 'css/style.css' );
	}
add_action( 'init', 'bizzy_email_form_enqueue_styles' );