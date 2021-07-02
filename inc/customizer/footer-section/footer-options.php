<?php
/* Buttom Footer settings options */
$wp_customize->add_section( 'doko-buttom-footer-section', array(
    'priority'       => 35,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'Footer Settings', 'doko' )
) );

    // Background Image
    $wp_customize->add_setting( 'doko_footer_background_image', array(
        'sanitize_callback' => 'esc_url_raw'
        
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'doko_footer_background_image', array(
               'label'      => esc_html__( 'Upload Footer Background Image', 'doko' ),
               'section'    => 'doko-buttom-footer-section',
               'settings'   => 'doko_footer_background_image',
    ) ) );
    
   // Footer copyright text
    $wp_customize->add_setting('doko_footer_copyright', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'doko_text_sanitize',  //done
        
    ));

    $wp_customize->add_control('doko_footer_copyright', array(
        'type' => 'text',
        'label' => esc_html__('Footer Text', 'doko'),
        'section' => 'doko-buttom-footer-section',
        'settings' => 'doko_footer_copyright'
    ));


/* Buttom Footer settings options */
$wp_customize->add_section( 'doko-buttom-post-section', array(
    'priority'       => 40,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'Post Settings', 'doko' )
) );

    // Featured Image
    $wp_customize->add_setting('doko_post_img_enable', array(
          'default' => 'yes',
          'capability' => 'edit_theme_options',
          'sanitize_callback' => 'doko_radio_sanitize_yesno',
    ));

    $wp_customize->add_control('doko_post_img_enable', array(
          'type' => 'radio',
          'label' => esc_html__('Show/Hide Featured Image', 'doko'),
          'section' => 'doko-buttom-post-section',
          'setting' => 'doko_post_img_enable',
          'choices' => array(
             'yes' => esc_html__('Yes', 'doko'),
             'no' => esc_html__('No', 'doko'),
          )
    ));
    
     // post title 
    $wp_customize->add_setting('doko_post_title_enable', array(
          'default' => 'yes',
          'capability' => 'edit_theme_options',
          'sanitize_callback' => 'doko_radio_sanitize_yesno',
    ));

    $wp_customize->add_control('doko_post_title_enable', array(
          'type' => 'radio',
          'label' => esc_html__('Show/Hide Post Title', 'doko'),
          'section' => 'doko-buttom-post-section',
          'setting' => 'doko_post_metadata_enable',
          'choices' => array(
             'yes' => esc_html__('Yes', 'doko'),
             'no' => esc_html__('No', 'doko'),
          )
    ));

    // MEtaData Image
    $wp_customize->add_setting('doko_post_metadata_enable', array(
          'default' => 'yes',
          'capability' => 'edit_theme_options',
          'sanitize_callback' => 'doko_radio_sanitize_yesno',
    ));

    $wp_customize->add_control('doko_post_metadata_enable', array(
          'type' => 'radio',
          'label' => esc_html__('Show/Hide MetaData', 'doko'),
          'section' => 'doko-buttom-post-section',
          'setting' => 'doko_post_metadata_enable',
          'choices' => array(
             'yes' => esc_html__('Yes', 'doko'),
             'no' => esc_html__('No', 'doko'),
          )
    ));