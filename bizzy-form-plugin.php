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