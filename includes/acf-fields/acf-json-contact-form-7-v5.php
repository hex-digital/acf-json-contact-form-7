<?php
/**
 * ACF JSON field for v5
 *
 * @author Hex Digital <opensource@hexdigital.com>
 * @package ACF_JSON_Contact_Form_7
 */

if ( ! class_exists( 'ACF_JSON_Contact_Form_7_V5' ) ) {

	/**
	 * Declare class and extends to acf_field.
	 */
	class ACF_JSON_Contact_Form_7_V5 extends acf_field {
	    public $name;
        public $label;
        public $category;
	    public $settings;

		/**
		 * @param array $settings The settings.
		 */
		function __construct( $settings ) {
			$this->name = 'acf_json_cf7';
			$this->label = __( 'JSON Contact Form 7', PLUGIN_NAMESPACE );
			$this->category = 'basic';
			$this->settings = $settings;
			parent::__construct();
		}

		/**
		 * @param array $field The field.
		 */
		function render_field( $field ) {
			$contact_forms = WPCF7_ContactForm::find();

            $field_name = esc_attr( $field['name'] );
            $field_value = esc_attr( $field['value'] );

            $default_option = __( 'Select form', PLUGIN_NAMESPACE );
            $options = [];

            foreach ( $contact_forms as $form ) {
                $option = [];
                $option['id'] = $form->id();
                $option['selected'] = $field_value == $option['id'] ? ' selected' : '';
                $option['title'] = $form->title();

                $options[] = $option;
            }

			?><select name="<?php echo esc_attr( $field_name ) ?>" value="<?php echo esc_attr( $field_value ) ?>">
				<option value="0"><?php echo $default_option ?></option>
				<?php foreach ( $options as $option ) {?>
                    <option value='<?php echo $option[ 'id' ] ?>'<?php echo $option[ 'selected' ] ?>>
                        <?php echo $option[ 'title' ] ?>
                    </option>
                <?php } ?>
			</select>
			<?php
		}

		/**
		 * @param object $value   The value.
		 * @param int    $post_id The post identifier.
		 * @param string $field   The field.
		 *
		 * @return object | array | null
		 */
		function load_value( $value ) {
			if ( ! is_admin() ) {
				$contact_forms = WPCF7_ContactForm::find();
				$form_id = ! empty( $value ) ? (int) $value : 0;
				foreach ( $contact_forms as $form ) {
					if ( $form->id() === $form_id ) {
					    // @todo Improve this to return all the field data as JSON as well
						return [
                            'id' => $form->id(),
                            'title' => $form->title(),
                            'form' => $form->prop('form'),
                        ];
					}

					return null;
				}
			}

            return $value;
		}
	}

	new ACF_JSON_Contact_Form_7_V5( $this->settings );
}
