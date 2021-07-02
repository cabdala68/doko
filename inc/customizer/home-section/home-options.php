<?php
/* adding sections for home page banner options */

 global $doko_categories;

/* Banner sections */
$dok_pages = get_pages();
$pages_lists = array();
$pages_lists[0] = esc_html__( '--- Select Page ---', 'doko' );
foreach ( $dok_pages as $d_page ) {           
    $pages_lists[$d_page->ID] = $d_page->post_title;
} 

$wp_customize->add_section( 'doko-banner-settings', array(
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'Banner Section', 'doko' ),
    'panel'          => 'doko-home-panel'
) );


    /* Slider 1 Sections */
    $wp_customize->add_setting('home_page_slider_1',array( 'default' => 0, 'sanitize_callback' => 'doko_sanitize_select' ) );
 
    $wp_customize->add_control('home_page_slider_1',  array(
            'type' => 'select',
            'label' => esc_html__('Slide One','doko'),
            'capability'     => 'edit_theme_options',
            'section' => 'doko-banner-settings',
            'choices' => $pages_lists
     ) );

    // Button text
     $wp_customize->add_setting('home_page_slider_1_button_text', array(
        'sanitize_callback' => 'sanitize_text_field',  // done
    ));

    $wp_customize->add_control('home_page_slider_1_button_text',array(
        'type' => 'text',
        'label' => esc_html__('Slide One Button Text', 'doko'),
        'section' => 'doko-banner-settings',
        'setting' => 'home_page_slider_1_button_text',
    )); 

    //button link
     $wp_customize->add_setting( 'home_page_slider_1_button_link', array(
        'sanitize_callback' => 'esc_url_raw', 
    ) );

    $wp_customize->add_control( 'home_page_slider_1_button_link', array(
        'label'    => esc_html__( 'Slide One  Button Link', 'doko' ),
        'section'  => 'doko-banner-settings',
        'settings' => 'home_page_slider_1_button_link',
        'type' => 'url'
    ) );

    /* Slider 2 Sections */
    $wp_customize->add_setting('home_page_slider_2',array( 'default' => 0, 'sanitize_callback' => 'doko_sanitize_select' ) );
 
    $wp_customize->add_control('home_page_slider_2',  array(
            'type' => 'select',
            'label' => esc_html__('Slide Two','doko'),
            'section' => 'doko-banner-settings',
            'choices' => $pages_lists
    ) );

    // Button text
     $wp_customize->add_setting('home_page_slider_2_button_text', array(
        'sanitize_callback' => 'sanitize_text_field',  // done
    ));

    $wp_customize->add_control('home_page_slider_2_button_text',array(
        'type' => 'text',
        'label' => esc_html__('Slide Two Button Text', 'doko'),
        'section' => 'doko-banner-settings',
        'setting' => 'home_page_slider_2_button_text',
    )); 

    //button link
     $wp_customize->add_setting( 'home_page_slider_2_button_link', array(
        'sanitize_callback' => 'esc_url_raw', 
    ) );

    $wp_customize->add_control( 'home_page_slider_2_button_link', array(
        'label'    => esc_html__( 'Slide Two Button Link', 'doko' ),
        'section'  => 'doko-banner-settings',
        'settings' => 'home_page_slider_2_button_link',
        'type' => 'url'
    ) );

    /* Slider 3 Sections */
    $wp_customize->add_setting('home_page_slider_3',array( 'default' => 0, 'sanitize_callback' => 'doko_sanitize_select' ) );
 
    $wp_customize->add_control('home_page_slider_3',  array(
            'type' => 'select',
            'label' => esc_html__('Slide Three','doko'),
            'section' => 'doko-banner-settings',
           'choices' => $pages_lists
     ) );

     // Button text
     $wp_customize->add_setting('home_page_slider_3_button_text', array(
        'sanitize_callback' => 'sanitize_text_field',  // done
    ));

    $wp_customize->add_control('home_page_slider_3_button_text',array(
        'type' => 'text',
        'label' => esc_html__('Slide Three Button Text', 'doko'),
        'section' => 'doko-banner-settings',
        'setting' => 'home_page_slider_3_button_text',
    )); 

    //button link
     $wp_customize->add_setting( 'home_page_slider_3_button_link', array(
        'sanitize_callback' => 'esc_url_raw', 
    ) );

    $wp_customize->add_control( 'home_page_slider_3_button_link', array(
        'label'    => esc_html__( 'Slide Three  Button Link', 'doko' ),
        'section'  => 'doko-banner-settings',
        'settings' => 'home_page_slider_3_button_link',
        'type' => 'url'
    ) );

/* About Section */
$wp_customize->add_section('doko-homepage-about-section',array(
    'priority' => 3 ,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => esc_html__('About Us Section','doko'),
    'panel' => 'doko-home-panel'
));

    // Background Image
    $wp_customize->add_setting( 'doko_about_background_image', array(
        'sanitize_callback' => 'esc_url_raw', 
        
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'doko_about_background_image', array(
               'label'      => esc_html__( 'Upload About Section Background Image', 'doko' ),
               'section'    => 'doko-homepage-about-section',
               'settings'   => 'doko_about_background_image',
    ) ) );

     /* About Us Settings */
    $wp_customize->add_setting('home_page_about_settings',array( 'default' => 0, 'sanitize_callback' => 'doko_sanitize_select' ) );
 
    $wp_customize->add_control('home_page_about_settings',  array(
            'type' => 'select',
            'label' => esc_html__('About Us Section','doko'),
            'description' => esc_html__('Home page about us selection','doko'),
            'section' => 'doko-homepage-about-section',
           'choices' => $pages_lists
     ) );


/* Counter Section */
$wp_customize->add_section('doko-homepage-counter-section',array(
    'priority' => 4 ,
    'capability' => 'edit_theme_options',
    'theme_supports' => '' ,
    'title' => esc_html__('Counter Section','doko'),
    'panel' => 'doko-home-panel'
));
    //Counter One Number
    $wp_customize->add_setting('doko_counter_one_number', array(
        'default' => esc_html__('4000', 'doko'),
        'sanitize_callback' => 'sanitize_text_field',  // done
    ));

    $wp_customize->add_control('doko_counter_one_number',array(
        'type' => 'text',
        'label' => esc_html__('Counter One', 'doko'),
        'section' => 'doko-homepage-counter-section',
        'setting' => 'doko_counter_one_number',
    )); 
    //Counter One Text
    $wp_customize->add_setting('doko_counter_one_text', array(
        'default' => esc_html__('CUSTOMERS', 'doko'),
        'sanitize_callback' => 'sanitize_text_field',  // done
    ));

    $wp_customize->add_control('doko_counter_one_text',array(
        'type' => 'text',
        'label' => esc_html__('Counter One Text', 'doko'),
        'section' => 'doko-homepage-counter-section',
        'setting' => 'doko_counter_one_text',
    )); 
    //Counter Two Number
    $wp_customize->add_setting('doko_counter_two_number', array(
        'default' => esc_html__('400', 'doko'),
        'sanitize_callback' => 'sanitize_text_field',  // done
    ));

    $wp_customize->add_control('doko_counter_two_number',array(
        'type' => 'text',
        'label' => esc_html__('Counter Two', 'doko'),
        'section' => 'doko-homepage-counter-section',
        'setting' => 'doko_counter_two_number',
    )); 
    //Counter Two Text
    $wp_customize->add_setting('doko_counter_two_text', array(
        'default' => esc_html__('EMPLOYEES', 'doko'),
        'sanitize_callback' => 'sanitize_text_field',  // done
    ));

    $wp_customize->add_control('doko_counter_two_text',array(
        'type' => 'text',
        'label' => esc_html__('Counter Two Text', 'doko'),
        'section' => 'doko-homepage-counter-section',
        'setting' => 'doko_counter_two_text',
    )); 
    
    //Counter Three Number
    $wp_customize->add_setting('doko_counter_three_number', array(
        'default' => esc_html__('8000', 'doko'),
        'sanitize_callback' => 'sanitize_text_field',  // done
    ));

    $wp_customize->add_control('doko_counter_three_number',array(
        'type' => 'text',
        'label' => esc_html__('Counter Three', 'doko'),
        'section' => 'doko-homepage-counter-section',
        'setting' => 'doko_counter_three_number',
    )); 
    //Counter Three Text
    $wp_customize->add_setting('doko_counter_three_text', array(
        'default' => esc_html__('PROJECTS DONE', 'doko'),
        'sanitize_callback' => 'sanitize_text_field',  // done
    ));

    $wp_customize->add_control('doko_counter_three_text',array(
        'type' => 'text',
        'label' => esc_html__('Counter Three Text', 'doko'),
        'section' => 'doko-homepage-counter-section',
        'setting' => 'doko_counter_three_text',
    )); 
    //Counter Four Number
    $wp_customize->add_setting('doko_counter_four_number', array(
        'default' => esc_html__('950', 'doko'),
        'sanitize_callback' => 'sanitize_text_field',  // done
    ));

    $wp_customize->add_control('doko_counter_four_number',array(
        'type' => 'text',
        'label' => esc_html__('Counter Four', 'doko'),
        'section' => 'doko-homepage-counter-section',
        'setting' => 'doko_counter_four_number',
    )); 
    //Counter Four Text
    $wp_customize->add_setting('doko_counter_four_text', array(
        'default' => esc_html__('CUSTOMERS', 'doko'),
        'sanitize_callback' => 'sanitize_text_field',  // done
    ));

    $wp_customize->add_control('doko_counter_four_text',array(
        'type' => 'text',
        'label' => esc_html__('Counter Four Text', 'doko'),
        'section' => 'doko-homepage-counter-section',
        'setting' => 'doko_counter_four_text',
    )); 


/* Services Section */
$wp_customize->add_section('doko-homepage-services-section',array(
    'priority' => 5,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => esc_html__('Services Section', 'doko'),
    'panel' => 'doko-home-panel'
));
    // Background Image
    $wp_customize->add_setting( 'doko_services_background_image', array(
        'sanitize_callback' => 'esc_url_raw', 
        
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'doko_services_background_image', array(
               'label'      => esc_html__( 'Upload Services Background Image', 'doko' ),
               'section'    => 'doko-homepage-services-section',
               'settings'   => 'doko_services_background_image',
    ) ) );

     //Homepage Services Text
    $wp_customize->add_setting('doko_homepage_services_text_setting', array( 'default' => 0, 'sanitize_callback' => 'doko_sanitize_select' ));

    $wp_customize->add_control('doko_homepage_services_text_setting',  array(
        'type' => 'select',
        'label' => esc_html__('Services Text','doko'),
        'capability'     => 'edit_theme_options',
        'description' => esc_html__('Home page Services content','doko'),
        'section' => 'doko-homepage-services-section',
        'choices' => $pages_lists
    ) );

    /* Services One Settings */

     /* Icon */
    $wp_customize->add_setting('doko_services_1_icon', array(
        'default' => 'fa fa-desktop',
        'sanitize_callback' => 'doko_text_sanitize', // done
    ));


    $wp_customize->add_control( new Doko_Customize_Icons_Control( $wp_customize, 'doko_services_1_icon', array(
            'type'      => 'doko_icons',                  
            'label'     => esc_html__( 'Services One Icon', 'doko' ),
            'section'   => 'doko-homepage-services-section',
    ) ) );


    $wp_customize->add_setting('doko_homepage_services_one_settings',array( 'default' => 0, 'sanitize_callback' => 'doko_sanitize_select' ) );
 
    $wp_customize->add_control('doko_homepage_services_one_settings',  array(
            'type' => 'select',
            'label' => esc_html__('Service One','doko'),
            'section' => 'doko-homepage-services-section',
           'choices' => $pages_lists
     ) );

    /* Services Two Settings */
    /* Icon */
    $wp_customize->add_setting('doko_services_2_icon', array(
        'default' => 'fa fa-desktop',
        'sanitize_callback' => 'doko_text_sanitize', // done
    ));

    $wp_customize->add_control( new Doko_Customize_Icons_Control( $wp_customize, 'doko_services_2_icon', array(
            'type'      => 'doko_icons',                  
            'label'     => esc_html__( 'Services Two Icon', 'doko' ),
            'section'   => 'doko-homepage-services-section',
    ) ) );


    $wp_customize->add_setting('doko_homepage_services_two_settings',array( 'default' => 0, 'sanitize_callback' => 'doko_sanitize_select' ) );
 
    $wp_customize->add_control('doko_homepage_services_two_settings',  array(
            'type' => 'select',
            'label' => esc_html__('Service Two','doko'),
            'section' => 'doko-homepage-services-section',
           'choices' => $pages_lists
     ) );

    /* Services Three Settings */
    /* Icon */
    $wp_customize->add_setting('doko_services_3_icon', array(
        'default' => 'fa fa-desktop',
        'sanitize_callback' => 'doko_text_sanitize', // done
    ));

    $wp_customize->add_control( new Doko_Customize_Icons_Control( $wp_customize, 'doko_services_3_icon', array(
            'type'      => 'doko_icons',                  
            'label'     => esc_html__( 'Services Three Icon', 'doko' ),
            'section'   => 'doko-homepage-services-section',
    ) ) );

    $wp_customize->add_setting('doko_homepage_services_three_settings',array( 'default' => 0, 'sanitize_callback' => 'doko_sanitize_select' ) );
 
    $wp_customize->add_control('doko_homepage_services_three_settings',  array(
            'type' => 'select',
            'label' => esc_html__('Service Three','doko'),
            'section' => 'doko-homepage-services-section',
           'choices' => $pages_lists
     ) );

    /* Services Four Settings */

    /* Icon */
    $wp_customize->add_setting('doko_services_4_icon', array(
        'default' => 'fa fa-desktop',
        'sanitize_callback' => 'doko_text_sanitize', // done
    ));

    $wp_customize->add_control( new Doko_Customize_Icons_Control( $wp_customize, 'doko_services_4_icon', array(
            'type'      => 'doko_icons',                  
            'label'     => esc_html__( 'Services Four Icon', 'doko' ),
            'section'   => 'doko-homepage-services-section',
    ) ) );


    $wp_customize->add_setting('doko_homepage_services_four_settings',array( 'default' => 0, 'sanitize_callback' => 'doko_sanitize_select' ) );
 
    $wp_customize->add_control('doko_homepage_services_four_settings',  array(
            'type' => 'select',
            'label' => esc_html__('Service Four','doko'),
            'section' => 'doko-homepage-services-section',
           'choices' => $pages_lists
     ) );

    //Homepage Services Buttom Text
    $wp_customize->add_setting('doko_homepage_services_below_text_section', array(
        'sanitize_callback' => 'doko_text_sanitize',  // done
    ));

    $wp_customize->add_control('doko_homepage_services_below_text_section',array(
        'type' => 'text',
        'label' => esc_html__('Services Bottom Text', 'doko'),
        'section' => 'doko-homepage-services-section',
        'setting' => 'doko_homepage_services_below_text_section',
    )); 

     // Homepage Services Buttom Button Text
    $wp_customize->add_setting( 'doko_homepage_services_below_button_text_settings', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => esc_html__('Download Now','doko'),
    ) );

    $wp_customize->add_control( 'doko_homepage_services_below_button_text_settings', array(
        'type' => 'text',
        'label'    => esc_html__( 'Services Bottom Button label', 'doko' ),
        'section'  => 'doko-homepage-services-section',
        'settings' => 'doko_homepage_services_below_button_text_settings'
    ) );
    //Homepage Services Buttom Button URL
    $wp_customize->add_setting( 'doko_homepage_services_below_button_url_settings', array(
        'sanitize_callback' => 'esc_url_raw', 
        'default' => esc_url( home_url( '/' ) )
    ) );

    $wp_customize->add_control( 'doko_homepage_services_below_button_url_settings', array(
        'type' => 'url',
        'label'    => esc_html__( 'Services Bottom Button Link', 'doko' ),
        'section'  => 'doko-homepage-services-section',
        'settings' => 'doko_homepage_services_below_button_url_settings',
    ) );


/* Features Section */
$wp_customize->add_section('doko-homepage-features-section',array(
    'priority' => 6,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => esc_html__('Features Section', 'doko'),
    'panel' => 'doko-home-panel'
));
    // Background Image
    $wp_customize->add_setting( 'doko_features_background_image', array(
        'sanitize_callback' => 'esc_url_raw', 
        
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'doko_features_background_image', array(
       'label'      => esc_html__( 'Upload Features Background Image', 'doko' ),
       'section'    => 'doko-homepage-features-section',
       'settings'   => 'doko_features_background_image'
    ) ) );

     //Homepage Features Text
    $wp_customize->add_setting('doko_homepage_features_text_setting', array( 'default' => 0, 'sanitize_callback' => 'doko_sanitize_select' ));

    $wp_customize->add_control('doko_homepage_features_text_setting',  array(
        'type' => 'select',
        'label' => esc_html__('Features Text','doko'),
        'capability'     => 'edit_theme_options',
        'description' => esc_html__('Home page Features content','doko'),
        'section' => 'doko-homepage-features-section',
        'choices' => $pages_lists
       
    ) );


     // Homepage Features  Button Text
    $wp_customize->add_setting( 'doko_homepage_features_button_text_settings', array(
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'doko_homepage_features_button_text_settings', array(
        'type' => 'text',
        'label'    => esc_html__( 'Features  Button label', 'doko' ),
        'section'  => 'doko-homepage-features-section',
        'settings' => 'doko_homepage_features_button_text_settings'
    ) );

    //Homepage Features  Button URL
    $wp_customize->add_setting( 'doko_homepage_features_button_url_settings', array(
        'sanitize_callback' => 'esc_url_raw', 
    ) );

    $wp_customize->add_control( 'doko_homepage_features_button_url_settings', array(
        'type' => 'url',
        'label'    => esc_html__( 'Features  Button Link', 'doko' ),
        'section'  => 'doko-homepage-features-section',
        'settings' => 'doko_homepage_features_button_url_settings',
    ) );


    /* Features One Settings */

    $wp_customize->add_setting('doko_features_1_icon', array(
        'default' => 'fa fa-desktop',
        'sanitize_callback' => 'doko_text_sanitize', // done
    ));

    $wp_customize->add_control( new Doko_Customize_Icons_Control( $wp_customize, 'doko_features_1_icon', array(
            'type'      => 'doko_icons',                  
            'label'     => esc_html__( 'Features One Icon', 'doko' ),
            'section'   => 'doko-homepage-features-section',
    ) ) );

    $wp_customize->add_setting('doko_homepage_features_one_settings',array( 'default' => 0, 'sanitize_callback' => 'doko_sanitize_select' ) );
 
    $wp_customize->add_control('doko_homepage_features_one_settings',  array(
            'type' => 'select',
            'label' => esc_html__('Feature One','doko'),
            'section' => 'doko-homepage-features-section',
           'choices' => $pages_lists
     ) );

    /* Features Two Settings */

    $wp_customize->add_setting('doko_features_2_icon', array(
        'default' => 'fa fa-desktop',
        'sanitize_callback' => 'doko_text_sanitize', // done
    ));

    $wp_customize->add_control( new Doko_Customize_Icons_Control( $wp_customize, 'doko_features_2_icon', array(
            'type'      => 'doko_icons',                  
            'label'     => esc_html__( 'Features Two Icon', 'doko' ),
            'section'   => 'doko-homepage-features-section',
    ) ) );

    $wp_customize->add_setting('doko_homepage_features_two_settings',array( 'default' => 0, 'sanitize_callback' => 'doko_sanitize_select' ) );
 
    $wp_customize->add_control('doko_homepage_features_two_settings',  array(
            'type' => 'select',
            'label' => esc_html__('Feature Two','doko'),
            'section' => 'doko-homepage-features-section',
           'choices' => $pages_lists
     ) );

    /* Features Three Settings */

    $wp_customize->add_setting('doko_features_3_icon', array(
        'default' => 'fa fa-desktop',
        'sanitize_callback' => 'doko_text_sanitize', // done
    ));

    $wp_customize->add_control( new Doko_Customize_Icons_Control( $wp_customize, 'doko_features_3_icon', array(
            'type'      => 'doko_icons',                  
            'label'     => esc_html__( 'Features Three Icon', 'doko' ),
            'section'   => 'doko-homepage-features-section',
    ) ) );

    $wp_customize->add_setting('doko_homepage_features_three_settings',array( 'default' => 0, 'sanitize_callback' => 'doko_sanitize_select' ) );
 
    $wp_customize->add_control('doko_homepage_features_three_settings',  array(
            'type' => 'select',
            'label' => esc_html__('Feature Three','doko'),
            'section' => 'doko-homepage-features-section',
           'choices' => $pages_lists
     ) );

    /* Features Four Settings */
    $wp_customize->add_setting('doko_features_4_icon', array(
        'default' => 'fa fa-desktop',
        'sanitize_callback' => 'doko_text_sanitize', // done
    ));

    $wp_customize->add_control( new Doko_Customize_Icons_Control( $wp_customize, 'doko_features_4_icon', array(
            'type'      => 'doko_icons',                  
            'label'     => esc_html__( 'Features Four Icon', 'doko' ),
            'section'   => 'doko-homepage-features-section',
    ) ) );

    $wp_customize->add_setting('doko_homepage_features_four_settings',array( 'default' => 0, 'sanitize_callback' => 'doko_sanitize_select' ) );
 
    $wp_customize->add_control('doko_homepage_features_four_settings',  array(
            'type' => 'select',
            'label' => esc_html__('Feature Four','doko'),
            'section' => 'doko-homepage-features-section',
           'choices' => $pages_lists
     ) );


/* Testimonials Section */
$wp_customize->add_section('doko-homepage-testimonials-section',array(
    'priority' => 7,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => esc_html__('Testimonials Section', 'doko'),
    'panel' => 'doko-home-panel'
));
    // Background Image
    $wp_customize->add_setting( 'doko_testimonials_background_image', array(
        'sanitize_callback' => 'esc_url_raw', 
        
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'doko_testimonials_background_image', array(
           'label'      => esc_html__( 'Upload Testimonials Background Image', 'doko' ),
           'section'    => 'doko-homepage-testimonials-section',
           'settings'   => 'doko_testimonials_background_image',
    ) ) );

    /* Note */
    $wp_customize->add_setting('doko_homepage_testimonial_note_setting', array(
        'sanitize_callback' => 'doko_text_sanitize',  // done
    ));

   
    $wp_customize->add_control( new Doko_Customize_Testimonials_Info_Control( $wp_customize, 'doko_homepage_testimonial_note_setting',array(
        'type' => 'input',
        'section' => 'doko-homepage-testimonials-section',
        'setting' => 'doko_homepage_testimonial_note_setting',
    )));

    //Homepage Testimonials Text
    $wp_customize->add_setting('doko_homepage_testimonials_text_setting', array( 'default' => 0, 'sanitize_callback' => 'doko_sanitize_select' ));
 
    $wp_customize->add_control('doko_homepage_testimonials_text_setting',  array(
            'type' => 'select',
            'label' => esc_html__('Testimonials Text','doko'),
            'description' => esc_html__('Home page testimonials  selection','doko'),
            'section' => 'doko-homepage-testimonials-section',
           'choices' => $pages_lists
     ) );

    /* Testimonials One Settings */
    $wp_customize->add_setting('doko_homepage_testimonials_one_settings',array(
            'sanitize_callback' => 'esc_url_raw', 
        ) );

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'doko_homepage_testimonials_one_settings', array(
               'label'      => esc_html__( 'Testimonial One  Settings', 'doko' ),
               'section'    => 'doko-homepage-testimonials-section',
               'settings'   => 'doko_homepage_testimonials_one_settings',
               'description' => esc_html__('Enter Title, Caption and Description after you upload the image.','doko'),
    ) ) );

    /* Testimonials Two Settings */
    $wp_customize->add_setting('doko_homepage_testimonials_two_settings',array(
            'sanitize_callback' => 'esc_url_raw', 
        ) );
 
     $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'doko_homepage_testimonials_two_settings', array(
               'label'      => esc_html__( 'Testimonial Two  Settings', 'doko' ),
               'section'    => 'doko-homepage-testimonials-section',
               'settings'   => 'doko_homepage_testimonials_two_settings',
               'description' => esc_html__('Enter Title, Caption and Description after you upload the image.','doko'),
    ) ) );

    /* Testimonials Three Settings */
    $wp_customize->add_setting('doko_homepage_testimonials_three_settings',array(
            'sanitize_callback' => 'esc_url_raw', 
        ) );
 
     $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'doko_homepage_testimonials_three_settings', array(
               'label'      => esc_html__( 'Testimonial Three  Settings', 'doko' ),
               'section'    => 'doko-homepage-testimonials-section',
               'settings'   => 'doko_homepage_testimonials_three_settings',
               'description' => esc_html__('Enter Title, Caption and Description after you upload the image.','doko'),
    ) ) );

    /* Testimonials Four Settings */
    $wp_customize->add_setting('doko_homepage_testimonials_four_settings',array(
            'sanitize_callback' => 'esc_url_raw', 
        ) );
 
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'doko_homepage_testimonials_four_settings', array(
               'label'      => esc_html__( 'Testimonial Four  Settings', 'doko' ),
               'section'    => 'doko-homepage-testimonials-section',
               'settings'   => 'doko_homepage_testimonials_four_settings',
               'description' => esc_html__('Enter Title, Caption and Description after you upload the image.','doko'),
    ) ) );
  
     /* Testimonials Five Settings */
    $wp_customize->add_setting('doko_homepage_testimonials_five_settings',array(
            'sanitize_callback' => 'esc_url_raw', 
        ) );
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'doko_homepage_testimonials_five_settings', array(
               'label'      => esc_html__( 'Testimonial Five  Settings', 'doko' ),
               'section'    => 'doko-homepage-testimonials-section',
               'settings'   => 'doko_homepage_testimonials_five_settings',
               'description' => esc_html__('Enter Title, Caption and Description after you upload the image.','doko'),
    ) ) );

     /* Testimonials Six Settings */
    $wp_customize->add_setting('doko_homepage_testimonials_six_settings',array(
            'sanitize_callback' => 'esc_url_raw', 
        ) );
 
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'doko_homepage_testimonials_six_settings', array(
               'label'      => esc_html__( 'Testimonial Six  Settings', 'doko' ),
               'section'    => 'doko-homepage-testimonials-section',
               'settings'   => 'doko_homepage_testimonials_six_settings',
               'description' => esc_html__('Enter Title, Caption and Description after you upload the image.','doko'),
    ) ) );


/* Works Section */
$wp_customize->add_section('doko-homepage-works-section',array(
    'priority' => 8,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => esc_html__('Latest Works Section', 'doko'),
    'panel' => 'doko-home-panel'
));
    // Background Image
    $wp_customize->add_setting( 'doko_works_background_image', array(
        'sanitize_callback' => 'esc_url_raw', 
        
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'doko_works_background_image', array(
               'label'      => esc_html__( 'Upload Latest Works Background Image', 'doko' ),
               'section'    => 'doko-homepage-works-section',
               'settings'   => 'doko_works_background_image',
    ) ) );

    //Homepage Works Heading
    $wp_customize->add_setting('doko_homepage_works_heading_setting', array(
        
        'sanitize_callback' => 'doko_text_sanitize',  // done
    ));

    $wp_customize->add_control('doko_homepage_works_heading_setting',array(
        'type' => 'text',
        'label' => esc_html__('Latest Works Header Text', 'doko'),
        'section' => 'doko-homepage-works-section',
        'setting' => 'doko_homepage_works_heading_setting',
    )); 

     //Homepage Works Text
    $wp_customize->add_setting('doko_homepage_works_text_setting', array(
        'sanitize_callback' => 'doko_text_sanitize',  // done
    ));

    $wp_customize->add_control('doko_homepage_works_text_setting',array(
        'type' => 'textarea',
        'label' => esc_html__('Latest Works Text', 'doko'),
        'section' => 'doko-homepage-works-section',
        'setting' => 'doko_homepage_works_text_setting',
    )); 

    // Homepage works category 
    $wp_customize->add_setting( 'doko_homepage_works_category_settings', array(
        'default' => '0',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'doko_text_sanitize', 
    ) );

    $wp_customize->add_control( new Doko_Customize_Category_Control( $wp_customize, 'doko_homepage_works_category_settings', array(
        'label' => esc_html__( 'Select Latest Works Section Category', 'doko' ),
        'description' => esc_html__( 'The subcategory of the selected category will display as a portfolio tab', 'doko' ),
        'section' => 'doko-homepage-works-section',
    ) ) );


/* Our Team Section */
$wp_customize->add_section('doko-homepage-our-team-section',array(
    'priority' => 8,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => esc_html__('Our Team Section', 'doko'),
    'panel' => 'doko-home-panel'
));
    // Background Image
    $wp_customize->add_setting( 'doko_our_team_background_image', array(
        'sanitize_callback' => 'esc_url_raw', 
        
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'doko_our_team_background_image', array(
               'label'      => esc_html__( 'Upload Our Team Background Image', 'doko' ),
               'section'    => 'doko-homepage-our-team-section',
               'settings'   => 'doko_our_team_background_image',
    ) ) );


     /* Note */
    $wp_customize->add_setting('doko_homepage_our_team_note_setting', array(
        'sanitize_callback' => 'doko_text_sanitize',  // done
    ));

   
    $wp_customize->add_control( new Doko_Customize_Our_Team_Info_Control( $wp_customize, 'doko_homepage_our_team_note_setting',array(
        'type' => 'input',
        'section' => 'doko-homepage-our-team-section',
        'setting' => 'doko_homepage_our_team_note_setting',
    )));

     //Homepage Our Team Text

    //title
     $wp_customize->add_setting('doko_homepage_our_team_text_title_setting', array(
        'sanitize_callback' => 'doko_text_sanitize',  // done
        'capability' => 'edit_theme_options'
    ));

    $wp_customize->add_control('doko_homepage_our_team_text_title_setting',array(
        'type' => 'text',
        'label' => esc_html__('Our Team Text Title', 'doko'),
        'section' => 'doko-homepage-our-team-section',
        'setting' => 'doko_homepage_our_team_text_title_setting'
    ));

    //content
    $wp_customize->add_setting('doko_homepage_our_team_text_setting', array(
        'sanitize_callback' => 'doko_text_sanitize',  // done
        'capability' => 'edit_theme_options'
    ));

  
     $wp_customize->add_control('doko_homepage_our_team_text_setting',array(
        'type' => 'textarea',
        'label' => esc_html__('Our Team Text', 'doko'),
        'section' => 'doko-homepage-our-team-section',
        'setting' => 'doko_homepage_our_team_text_setting'
    )); 

    // Team 1
     $wp_customize->add_setting('doko_homepage_our_team_1', array(
        'sanitize_callback' => 'esc_url_raw'
    ));

     $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'doko_homepage_our_team_1', array(
               'label'      => esc_html__( 'Our Team One Settings', 'doko' ),
               'section'    => 'doko-homepage-our-team-section',
               'settings'   => 'doko_homepage_our_team_1',
               'description' => esc_html__('Enter Title, Caption and Description after you upload the image.','doko')
    ) ) );

      // Team 2
     $wp_customize->add_setting('doko_homepage_our_team_2', array(
        'sanitize_callback' => 'esc_url_raw'
    ));


    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'doko_homepage_our_team_2', array(
               'label'      => esc_html__( 'Our Team Two Settings', 'doko' ),
               'section'    => 'doko-homepage-our-team-section',
               'settings'   => 'doko_homepage_our_team_2',
               'description' => esc_html__('Enter Title, Caption and Description after you upload the image.','doko')
    ) ) );


      // Team 3
     $wp_customize->add_setting('doko_homepage_our_team_3', array(
        'sanitize_callback' => 'esc_url_raw'

    ));

     $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'doko_homepage_our_team_3', array(
               'label'      => esc_html__( 'Our Team Three Settings', 'doko' ),
               'section'    => 'doko-homepage-our-team-section',
               'settings'   => 'doko_homepage_our_team_3',
               'description' => esc_html__('Enter Title, Caption and Description after you upload the image.','doko')
    ) ) );



/* blog Section */
$wp_customize->add_section('doko-homepage-blog-section',array(
    'priority' => 8,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => esc_html__('Blog Section', 'doko'),
    'panel' => 'doko-home-panel'
));
    // Background Image
    $wp_customize->add_setting( 'doko_blog_background_image', array(
        'sanitize_callback' => 'esc_url_raw' 
        
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'doko_blog_background_image', array(
               'label'      => esc_html__( 'Upload Blog Background Image', 'doko' ),
               'section'    => 'doko-homepage-blog-section',
               'settings'   => 'doko_blog_background_image',
    ) ) );

  

    //Homepage Blog Text
    $wp_customize->add_setting('doko_homepage_blog_text_title_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('doko_homepage_blog_text_title_setting',array(
        'type' => 'text',
        'label' => esc_html__('Blog Header Text', 'doko'),
        'section' => 'doko-homepage-blog-section',
        'setting' => 'doko_homepage_blog_text_title_setting'
    )); 

     //Homepage Works Text
    $wp_customize->add_setting('doko_homepage_blog_text_setting', array(
        'sanitize_callback' => 'doko_text_sanitize'
    ));

    $wp_customize->add_control('doko_homepage_blog_text_setting',array(
        'type' => 'textarea',
        'label' => esc_html__('Blog  Text', 'doko'),
        'section' => 'doko-homepage-blog-section',
        'setting' => 'doko_homepage_blog_text_setting'
    )); 



    /* Posts Section */
    $wp_customize->add_setting( 'doko_homepage_excluded_categories', array(
        'sanitize_callback' => 'doko_multiple_categories_sanitize'
    ) );

    $wp_customize->add_control( new Doko_Customize_Control_Checkbox_Multiple( $wp_customize, 'doko_homepage_excluded_categories', array(
        'section' => 'doko-homepage-blog-section',
        'label'   => esc_html__( 'Select Excluded Blogs Categories', 'doko' ),
        'choices' => $doko_categories
    ) ) );

    $wp_customize->add_setting( 'doko_display_number_blog_post_in_homepage', array(
        'default'           => 10,
        'sanitize_callback' => 'absint'
    ) );

    $wp_customize->add_control( 'doko_display_number_blog_post_in_homepage', array(
        'type'    => 'number',
        'label'    => esc_html__( 'Display Number of Blogs In Home Page ', 'doko' ),
        'section'  => 'doko-homepage-blog-section'
    ) );

    /* Partners Section */
    $wp_customize->add_section('doko-homepage-partners-section',array(
        'priority' => 9,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Partners Section', 'doko'),
        'panel' => 'doko-home-panel'
    ));
    
    // Background Image
    $wp_customize->add_setting( 'doko_partners_background_image', array(
        'sanitize_callback' => 'esc_url_raw'
        
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'doko_partners_background_image', array(
               'label'      => esc_html__( 'Upload Partners Background Image', 'doko' ),
               'section'    => 'doko-homepage-partners-section',
               'settings'   => 'doko_partners_background_image',
    ) ) );

    // Partners Image One
    $wp_customize->add_setting( 'doko_partners_image_one', array(
        'sanitize_callback' => 'esc_url_raw'
        
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'doko_partners_image_one', array(
               'label'      => esc_html__( 'Upload Partners  Image One', 'doko' ),
               'section'    => 'doko-homepage-partners-section',
               'settings'   => 'doko_partners_image_one',
    ) ) );

    // Partners Image Two 
    $wp_customize->add_setting( 'doko_partners_image_two', array(
        'sanitize_callback' => 'esc_url_raw'
        
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'doko_partners_image_two', array(
               'label'      => esc_html__( 'Upload Partners Image Two', 'doko' ),
               'section'    => 'doko-homepage-partners-section',
               'settings'   => 'doko_partners_image_two',
    ) ) );

    // Partners Image Three
    $wp_customize->add_setting( 'doko_partners_image_three', array(
        'sanitize_callback'=> 'esc_url_raw'
        
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'doko_partners_image_three', array(
               'label'      => esc_html__( 'Upload Partners Image Three', 'doko' ),
               'section'    => 'doko-homepage-partners-section',
               'settings'   => 'doko_partners_image_three',
    ) ) );

    // Partners Image Four
    $wp_customize->add_setting( 'doko_partners_image_four', array(
        'sanitize_callback' => 'esc_url_raw'
        
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'doko_partners_image_four', array(
               'label'      => esc_html__( 'Upload Partners Image Four', 'doko' ),
               'section'    => 'doko-homepage-partners-section',
               'settings'   => 'doko_partners_image_four',
    ) ) );