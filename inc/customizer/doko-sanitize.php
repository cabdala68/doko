<?php 

/**
 * Sanitize switch button
 *
 * @package AccessPress Themes
 * @subpackage Doko
 * @since 1.0.0
 */
function doko_sanitize_switch_option( $input ) {
    $valid_keys = array(
            'show'  => esc_html__( 'Enable', 'doko' ),
            'hide'  => esc_html__( 'Disable', 'doko' )
        );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}


/**
 * Sanitize text field
 *
 * @package AccessPress Themes
 * @subpackage Doko
 * @since 1.0.0
 */
function doko_text_sanitize( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}


/**
 * Sanitize multiple categories for blog
 *
 * @since 1.0.0
 */
function doko_multiple_categories_sanitize( $values ) {

    $multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;

    return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
}


/**
 * Sanitize number fields
 *
 * @since 1.0.0
 */
function doko_number_sanitize( $input ) {
    $output = intval($input);
    return $output;
} 

//select sanitization function
function doko_sanitize_select( $input, $setting ){
 
    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);

    //get the list of possible select options 
    $choices = $setting->manager->get_control( $setting->id )->choices;
                     
    //return input if valid or return default option
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
     
}

   function doko_radio_sanitize_yesno($input) {
      $valid_keys = array(
        'yes'=>esc_html__('Yes', 'doko'),
        'no'=>esc_html__('No', 'doko')
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
   }