<?php
/**
 * Class for ACF Field support.
 *
 * @author Hex Digital <opensource@hexdigital.com>
 * @package ACF_JSON_Contact_Form_7
 */

if ( ! class_exists( 'ACF_JSON_Contact_Form_7' ) ) {

	class ACF_JSON_Contact_Form_7 {

		/** @var array */
		var $settings;

		/** @var string */
		var $plugin_message;

		public function __construct() {
			$this->settings = array(
				'version' => '1.0',
				'url' => plugin_dir_url( __FILE__ ),
				'path' => plugin_dir_path( __FILE__ ),
			);

			$this->plugin_message = __( 'This website needs "%s" to run. Please download and activate it', PLUGIN_NAMESPACE );

			add_action( 'admin_notices', array( $this, 'acf_json_cf7_check_acf_is_activate' ) );

			if ( ! class_exists( 'acf' ) || ! defined( 'WPCF7_VERSION' ) ) {
				return;
			}

			// Include field type for version 5.
			add_action( 'acf/include_field_types', array( $this, 'acf_json_cf7_include_fields' ) );
		}

        /**
         * Include fields for ACF 5.
         * @param int $version Plugin version.
         */
		public function acf_json_cf7_include_fields( $version = 5 ) {
			require_once plugin_dir_path( __FILE__ ) . 'acf-fields/acf-json-contact-form-7-v' . $version . '.php';
		}

		/**
		 * If check ACF plugin activate or not.
		 */
		public function acf_json_cf7_check_acf_is_activate() {
			if ( ! class_exists( 'acf' ) ) {
				echo '<div class="notice notice-error is-dismissible"><p>' . wp_sprintf( $this->plugin_message, 'Advanced Custom Fields' ) . '</p></div>';
			} else if ( ! defined( 'WPCF7_VERSION' ) ) {
				echo '<div class="notice notice-error is-dismissible"><p>' . wp_sprintf( $this->plugin_message, 'Contact Form 7' ) . '</p></div>';
			}
		}
	}
}
