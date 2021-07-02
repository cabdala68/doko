<?php
/* Adding header options panel*/
$wp_customize->add_panel( 'doko-home-panel', array(
    'priority'       => 25,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'Home Page  Settings', 'doko' ),
    'description'    => esc_html__( 'Customize your awesome site home page settings', 'doko' )
) );

/**
 * Load home page panel file
*/
require $doko_customizer_home_page_options_file_path = doko_file_directory('inc/customizer/home-section/home-options.php');