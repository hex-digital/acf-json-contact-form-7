<?php
/**
 * Plugin Name:     ACF JSON Contact Form 7
 * Plugin URI:      https://wordpress.org/plugins/acf-json-contact-form-7/
 * Description:     Adds a new 'JSON Contact Form 7' field to the popular Advanced Custom Fields plugin that returns JSON.
 * Author:          Hex Digital <opensource@hexdigital.com>
 * Author URI:      https://hexdigital.com/
 * Text Domain:     acf-json-contact-form-7
 * Domain Path:     /languages
 * Version:         1.0
 *
 * @package         ACF_JSON_Contact_Form_7
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

DEFINE( 'PLUGIN_NAMESPACE', 'acf-json-contact-form-7' );

require_once('includes/class-' . basename( __FILE__ ));

add_action( 'plugins_loaded', 'acf_json_cf7_textdomain' );
add_action( 'plugins_loaded', 'acf_json_cf7_init' );

function acf_json_cf7_textdomain() {
	load_plugin_textdomain( PLUGIN_NAMESPACE, false, basename( dirname( __FILE__ ) ) . '/languages' );
}

function acf_json_cf7_init() {
	new ACF_JSON_Contact_Form_7();
}

