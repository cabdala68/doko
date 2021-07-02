<?php
/**
 * Main include functions ( to support child theme )
 *
 * @since unicon 1.0.0
 *
 * @param string $file_path, path from the theme
 * @return string full path of file inside theme
 *
 */
if( !function_exists('doko_file_directory') ){

    function doko_file_directory( $file_path ){
        if( file_exists( trailingslashit( get_stylesheet_directory() ) . $file_path) ) {
            return trailingslashit( get_stylesheet_directory() ) . $file_path;
        }
        else{
            return trailingslashit( get_template_directory() ) . $file_path;
        }
    }
}


/**
 * Implement the Custom Functions.
 */
require $doko_custom_functions_file_path = doko_file_directory('inc/functions.php');

/**
 * Implement the Custom Header feature.
 */
require $doko_custom_header_file_path = doko_file_directory('inc/core/custom-header.php');


/**
 * Custom template tags for this theme.
 */
require $doko_template_tags_file_path = doko_file_directory('inc/core/template-tags.php');

/**
 * Custom template functions for this theme.
 */
require $doko_template_tags_file_path = doko_file_directory('inc/core/template-functions.php');

/**
 * breadcrumb.
 */
require $doko_template_tags_file_path = doko_file_directory('inc/breadcrumbs.php');

/**
 * Load Customizer File.
 */
require $doko_lite_customizer_file_path = doko_file_directory('inc/customizer/customizer.php');


/**
 * Load Header Hooks Compatibility file.
 */
require $doko_header_file_path = doko_file_directory('inc/hooks/header.php');

/**
 * Load Footer Hooks Compatibility file.
 */
require $doko_header_file_path = doko_file_directory('inc/hooks/footer.php');

/**
 * Load Dynamic Styles
 */
require $doko_header_file_path = doko_file_directory('assets/dynamic_styles.php');

/**
 * Load Welcome Page
 */
require $doko_header_file_path = doko_file_directory('inc/welcome/welcome-config.php');