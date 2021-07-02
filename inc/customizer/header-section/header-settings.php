<?php
/* Adding header options panel*/
$wp_customize->add_panel( 'doko-top-header-panel', array(
    'priority'       => 25,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'Navigation Settings', 'doko' ),
    'description'    => esc_html__( 'Customize your awesome site header settings', 'doko' )
) );

/**
 * Load header panel file
*/
require $doko_customizer_header_options_file_path = doko_file_directory('inc/customizer/header-section/header-options.php');