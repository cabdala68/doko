<?php
/**
 * Doko Theme Customizer
 *
 * @package Doko
 */

/**
 * Load file for customizer sanitization functions
*/
require $doko_sanitize_functions_file_path = doko_file_directory('inc/customizer/doko-sanitize.php');

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function doko_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

/**
* General Settings Panel
*/
$wp_customize->add_panel( 'doko_general_settings_panel', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'General Settings', 'doko' ),
) );

	$wp_customize->get_section('title_tagline')->panel = 'doko_general_settings_panel';
	
	$wp_customize->get_section('colors')->panel = 'doko_general_settings_panel';
	
	$wp_customize->get_section('background_image')->panel = 'doko_general_settings_panel';
	
	$wp_customize->get_section('static_front_page')->panel = 'doko_general_settings_panel';

	$wp_customize->get_section('colors')->title = esc_html__( 'Themes Colors', 'doko' );


	/**
	 * Load Customizer Custom Control File
	*/
	require $doko_customizer_file_path = doko_file_directory('inc/customizer/doko-custom-controls.php');

/*------------------------------------------------------------------------------------*/
	/**
	 * Upgrade to Doko Pro
	*/
	// Register custom section types.
	$wp_customize->register_section_type( 'Doko_Customize_Section_Pro' );

	// Register sections.
	$wp_customize->add_section(
	    new Doko_Customize_Section_Pro(
	        $wp_customize,
	        'doko-pro',
	        array(
	            'title'    => esc_html__( 'Free vs Pro', 'doko' ),
	            'pro_text' => esc_html__( 'Compare','doko' ),
	            'pro_url'  => admin_url( 'themes.php?page=doko-welcome&section=free_vs_pro' ),
	            'priority' => 1,
	        )
	    )
	);


/* Inner Pages Image*/

	   $wp_customize->add_panel( 
	    'header_image', 
	        array(
	        'priority' => 10,
	        'capability' => 'edit_theme_options',
	        'theme_supports' => '',
	        'title' => esc_html__( 'Inner Pages Header Image', 'doko' ),
	        'description' => esc_html__( 'Description of what this panel does.', 'doko' ),
	    ) 
	);

	$wp_customize->add_section(
	    'header_image',
	    array(
	        'title' => esc_html__( 'Inner Pages Header Image', 'doko' ),
	        'description' => esc_html__( 'This Is A Section Inner Pages Header Image.', 'doko' ),
	        'priority' => 10,
	        'panel' => 'doko_general_settings_panel',
	    )
	);

	

	/**
	 * Load header panel file
	*/
	require $doko_customizer_header_settings_file_path = doko_file_directory('inc/customizer/header-section/header-settings.php');

	/**
	 * Home page panel file
	*/
	require $doko_customizer_home_settings_file_path = doko_file_directory('inc/customizer/home-section/home-settings.php');


	/**
	 * Footer Settings panel file
	*/
	require $doko_customizer_footer_settings_file_path = doko_file_directory('inc/customizer/footer-section/footer-settings.php');


	/** Typography Settings **/
		$doko_fontlist = array(
			'Lora' => 'Lora',
			'Poppins' => 'Poppins',
			'Roboto' => 'Roboto',
			'Roboto Condensed' => 'Roboto Condensed',
			'Open Sans' => 'Open Sans',
			'Lato' => 'Lato',
			'Montserrat' => 'Montserrat',
		);

		$wp_customize->add_section('doko_typography_sections', array(
	        'title'   => esc_html__('Typography Settings', 'doko'),
	        'description' => esc_html__('Configure Typography Settings.', 'doko')
	    ));

	    $wp_customize->add_setting( 'doko_body_font', array( 'default' => 'Roboto', 'sanitize_callback' => 'sanitize_text_field' ) );
	    $wp_customize->add_control( 'doko_body_font', array(
	    	'type' => 'select',
			'label'      => esc_html__( 'Body Font', 'doko' ),
			'section'    => 'doko_typography_sections',
			'choices'   => $doko_fontlist,
		) );

		$wp_customize->add_setting( 'doko_heading_font', array( 'default' => 'Roboto Condensed', 'sanitize_callback' => 'sanitize_text_field' ) );
	    $wp_customize->add_control( 'doko_heading_font', array(
	    	'type' => 'select',
			'label'      => esc_html__( 'Heading Font', 'doko' ),
			'section'    => 'doko_typography_sections',
			'choices'   => $doko_fontlist,
		) );

		$wp_customize->add_setting( 'doko_menu_font', array( 'default' => 'Roboto', 'sanitize_callback' => 'sanitize_text_field' ) );
	    $wp_customize->add_control( 'doko_menu_font', array(
	    	'type' => 'select',
			'label'      => esc_html__( 'Menu Font', 'doko' ),
			'section'    => 'doko_typography_sections',
			'choices'   => $doko_fontlist,
		) );

		// Solid Color
		$wp_customize->add_setting( 'doko_general_plane_color', array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color',
		) ) ;

		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'doko_general_plane_color', 
			array(
				'label'      => esc_html__( 'Theme Plane Color', 'doko' ),
				'section'    => 'colors',
				'settings'   => 'doko_general_plane_color',
			) ) 
		);

		// gradient color
		$wp_customize->add_setting( 'doko_general_gradient_color', array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'doko_text_sanitize',
		) ) ;

		$wp_customize->add_control( new Doko_Gradient_Control($wp_customize,'doko_general_gradient_color', array(
			'label'      => esc_html__( 'Theme Gradient Color', 'doko' ),
			'section'    => 'colors',
			'settings'   => 'doko_general_gradient_color',
			'params' => array(
				'class' => 'gradient-generator'
			),
		) ) );


}
add_action( 'customize_register', 'doko_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function doko_customize_preview_js() {
	wp_enqueue_script( 'doko-customizer', get_template_directory_uri() . '/inc/customizer/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'doko_customize_preview_js' );

/**
 * Enqueue scripts and style for customizer
*/
function doko_customize_backend_scripts() {
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/library/fontawesome/css/font-awesome.min.css');
	wp_enqueue_style( 'doko-customizer-style', get_template_directory_uri() . '/inc/customizer/assets/css/customizer-style.css' );
	wp_enqueue_script( 'doko-customizer-script', get_template_directory_uri() . '/inc/customizer/assets/js/customizer-scripts.js', array( 'jquery', 'customize-controls' ), '20160715', true );
}
add_action( 'customize_controls_enqueue_scripts', 'doko_customize_backend_scripts', 10 );