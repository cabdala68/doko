<?php

/* Navigation  sections */
$wp_customize->add_section( 'doko-navigation-shortcuts', array(
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'Navigation  Sections', 'doko' ),
    'panel'          => 'doko-top-header-panel'
) );

    //Enable / Disable navigation Section before and after slider
    $wp_customize->add_setting( 'doko_header_navigation_settings', array(
        'default' => 'before',
        'sanitize_callback' => 'doko_text_sanitize',
    ) );

    $wp_customize->add_control('doko_header_navigation_settings',  array(
        'type'      => 'radio',                    
        'label'     => esc_html__( 'Navigation Before/After Slider Option', 'doko' ),
        'description'   => esc_html__( 'Before/After Header Navigation Section Option', 'doko' ),
        'section'   => 'doko-navigation-shortcuts',
        'choices'   => array(
            'before'  => esc_html__( 'Before Slider', 'doko' ),
            'after'  => esc_html__( 'After Slider', 'doko' )
            )
     ) );



    /* hide show search icon */
    $wp_customize->add_setting( 'doko_hide_show_search_icon_settings', array(
        'default' => 'show',
        'sanitize_callback' => 'doko_sanitize_switch_option',
    ) );

    $wp_customize->add_control( new Doko_Customize_Switch_Control( $wp_customize, 'doko_hide_show_search_icon_settings',  array(
        'type'      => 'switch',                    
        'label'     => esc_html__( 'Show/Hide Option For Search Icon', 'doko' ),
        'description'   => esc_html__( 'Show/Hide Search Section Option', 'doko' ),
        'section'   => 'doko-navigation-shortcuts',
        'choices'   => array(
            'show'  => esc_html__( 'Show', 'doko' ),
            'hide'  => esc_html__( 'Hide', 'doko' )
            )
    ) ) );

    /* Navigation Search Settings */
    $wp_customize->add_setting('doko_search_icon', array(
        'default' => 'fa-search',
        'sanitize_callback' => 'doko_text_sanitize', // done
    ));

    /* Search icon */
    $wp_customize->add_control( new Doko_Customize_Icons_Search_Control( $wp_customize, 'doko_search_icon', array(
            'type'      => 'doko_icons',                  
            'label'     => esc_html__( 'Search Icon', 'doko' ),
            'section'   => 'doko-navigation-shortcuts',
    ) ) );


    /* hide show basket icon */
    $wp_customize->add_setting( 'doko_hide_show_basket_icon_settings', array(
        'default' => 'show',
        'sanitize_callback' => 'doko_sanitize_switch_option',
    ) );

    $wp_customize->add_control( new Doko_Customize_Switch_Control( $wp_customize, 'doko_hide_show_basket_icon_settings',  array(
        'type'      => 'switch',                    
        'label'     => esc_html__( 'Show/Hide Option For Basket Icon', 'doko' ),
        'description'   => esc_html__( 'Show/Hide Basket Section Option', 'doko' ),
        'section'   => 'doko-navigation-shortcuts',
        'choices'   => array(
            'show'  => esc_html__( 'Show', 'doko' ),
            'hide'  => esc_html__( 'Hide', 'doko' )
            )
    ) ) );

    /* Navigation Basket Settings */
    $wp_customize->add_setting('doko_basket_icon', array(
        'default' => ' fa-shopping-cart',
        'sanitize_callback' => 'doko_text_sanitize'
        
    ));

    /* Basket Text */
    $wp_customize->add_control( new Doko_Customize_Icons_Basket_Control( $wp_customize, 'doko_basket_icon', array(
            'type'      => 'doko_icons',                  
            'label'     => esc_html__( 'Basket Icon', 'doko' ),
            'section'   => 'doko-navigation-shortcuts',
    ) ) );


/* adding sections for header contact options */
$wp_customize->add_section( 'doko-header-contacts', array(
    'priority'       => 2,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'Contacts Info', 'doko' ),
    'panel'          => 'doko-top-header-panel'
) );
    //Enable / Disable Section
    $wp_customize->add_setting( 'doko_header_settings_options', array(
        'default' => 'show',
        'sanitize_callback' => 'doko_sanitize_switch_option',
    ) );

    $wp_customize->add_control( new Doko_Customize_Switch_Control( $wp_customize, 'doko_header_settings_options',  array(
        'type'      => 'switch',                    
        'label'     => esc_html__( 'Enable/Disable Option For Header Contacts Section', 'doko' ),
        'description'   => esc_html__( 'Enable/Disable Header Section Contacts Option', 'doko' ),
        'section'   => 'doko-header-contacts',
        'choices'   => array(
            'show'  => esc_html__( 'Enable', 'doko' ),
            'hide'  => esc_html__( 'Disable', 'doko' )
            )
    ) ) );   

    //Phone Icon
    $wp_customize->add_setting('doko_phone_icon', array(
        'default' => 'fa fa-phone',
        'sanitize_callback' => 'doko_text_sanitize', // done
    ));

    $wp_customize->add_control( new Doko_Customize_Icons_Phone_Control( $wp_customize, 'doko_phone_icon', array(
            'type'      => 'doko_icons',                  
            'label'     => esc_html__( 'Phone Icon', 'doko' ),
            'section'   => 'doko-header-contacts',
    ) ) );

    //Phone Text
    $wp_customize->add_setting('doko_phone', array(
        'default' => esc_html__('+977-1-4671980', 'doko'),
        'sanitize_callback' => 'doko_text_sanitize',  // done
    ));

    $wp_customize->add_control('doko_phone',array(
        'type' => 'text',
        'label' => esc_html__('Phone', 'doko'),
        'section' => 'doko-header-contacts',
        'setting' => 'doko_phone',
    )); 

    //Email icon
    $wp_customize->add_setting('doko_email_icon', array(
        'default' => 'fa fa-envelope',
        'sanitize_callback' => 'doko_text_sanitize', // done
    ));

    //Email Text
    $wp_customize->add_control( new Doko_Customize_Icons_Email_Control( $wp_customize, 'doko_email_icon', array(
            'type'      => 'doko_icons',                  
            'label'     => esc_html__( 'Email Icon', 'doko' ),
            'section'   => 'doko-header-contacts',
    ) ) );


    $wp_customize->add_setting('doko_email', array(
        'default' => esc_html__('support@accesspressthemes.com', 'doko'),
        'sanitize_callback' => 'doko_text_sanitize',  // done
    ));

    $wp_customize->add_control('doko_email',array(
        'type' => 'text',
        'label' => esc_html__('Email Address', 'doko'),
        'section' => 'doko-header-contacts',
        'setting' => 'doko_email',
    )); 




/* adding sections for header social options */
$wp_customize->add_section( 'doko-header-social-icon', array(
    'priority'       => 3,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'Social Icon Options', 'doko' ),
    'panel'          => 'doko-top-header-panel'
) );

    //Facebook icon
    $wp_customize->add_setting('doko_facebook_icon', array(
        'default' => 'fa-facebook',
        'sanitize_callback' => 'doko_text_sanitize', // done
    ));

    //Facebook Text
    $wp_customize->add_control( new Doko_Customize_Social_Icons_Control( $wp_customize, 'doko_facebook_icon', array(
            'type'      => 'doko_icons',                  
            'label'     => esc_html__( 'Facebook Icon', 'doko' ),
            'section'   => 'doko-header-social-icon',
            'priority'  => 20
    ) ) );

    /*facebook url*/
    $wp_customize->add_setting( 'doko_facebook_url', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'doko_facebook_url', array(
        'label'     => esc_html__( 'Facebook url', 'doko' ),
        'section'   => 'doko-header-social-icon',
        'settings'  => 'doko_facebook_url',
        'type'      => 'url',
        'priority'  => 25
    ) );

    //Twitter icon
    $wp_customize->add_setting('doko_twitter_icon', array(
        'default' => 'fa-twitter',
        'sanitize_callback' => 'doko_text_sanitize', // done
    ));

    //Twitter Text
    $wp_customize->add_control( new Doko_Customize_Social_Icons_Control( $wp_customize, 'doko_twitter_icon', array(
            'type'      => 'doko_icons',                  
            'label'     => esc_html__( 'Twitter Icon', 'doko' ),
            'section'   => 'doko-header-social-icon',
            'priority'  => 30
    ) ) );


    /*twitter url*/
    $wp_customize->add_setting( 'doko_twitter_url', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'doko_twitter_url', array(
        'label'     => esc_html__( 'Twitter url', 'doko' ),
        'section'   => 'doko-header-social-icon',
        'settings'  => 'doko_twitter_url',
        'type'      => 'url',
        'priority'  => 40
    ) );


    //Linkedin icon
    $wp_customize->add_setting('doko_linkedin_icon', array(
        'default' => 'fa-linkedin',
        'sanitize_callback' => 'doko_text_sanitize', // done
    ));

    //Linkedin Text
    $wp_customize->add_control( new Doko_Customize_Social_Icons_Control( $wp_customize, 'doko_linkedin_icon', array(
            'type'      => 'doko_icons',                  
            'label'     => esc_html__( 'Linkedin Icon', 'doko' ),
            'section'   => 'doko-header-social-icon',
            'priority'  => 70
    ) ) );


    /*linkedin plus url*/
    $wp_customize->add_setting( 'doko_linkedin_url', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'doko_linkedin_url', array(
        'label'     => esc_html__( 'Linkedin url', 'doko' ),
        'section'   => 'doko-header-social-icon',
        'settings'  => 'doko_linkedin_url',
        'type'      => 'url',
        'priority'  => 80
    ) );