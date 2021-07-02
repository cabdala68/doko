<?php
	/**
	 * Welcome Page Initiation
	*/

	get_template_part('/inc/welcome/welcome');

	/** Plugins **/
	$th_plugins = array(
		// *** Companion Plugins
		'companion_plugins' => array(

		),

		//Displays on Required Plugins tab
		'req_plugins' => array(

			// Free Plugins
			'free_plug' => array(

				'contact-form-7' => array(
					'slug' => 'contact-form-7',
					'filename' => 'wp-contact-form-7.php',
				),

				'siteorigin-panels' => array(
					'slug' => 'siteorigin-panels',
					'filename' => 'siteorigin-panels.php',
				),

				'accesspress-instagram-feed' => array(
					'slug' => 'accesspress-instagram-feed',
					'filename' => 'accesspress-instagram-feed.php',
					'class' => 'IF_Class'
				),
			),
			'pro_plug' => array(

			),
		),

		// *** Displays on Import Demo section
		'required_plugins' => array(
			'access-demo-importer' => array(
					'slug' 		=> 'access-demo-importer',
					'name' 		=> esc_html__('Access Demo Importer', 'doko'),
					'filename' 	=>'access-demo-importer.php',
					'host_type' => 'wordpress', // Use either bundled, remote, wordpress
					'class' 	=> 'Access_Demo_Importer',
					'info' 		=> esc_html__('Access Demo Importer adds the feature to Import the Demo Conent with a single click.', 'doko'),
			),
		

		),

		// *** Recommended Plugins
		'recommended_plugins' => array(
			// Free Plugins
			'free_plugins' => array(
				
			),

			// Pro Plugins
			'pro_plugins' => array(

			)
		),
	);

	$strings = array(
		// Welcome Page General Texts
		'welcome_menu_text' => esc_html__( 'Doko Welcome', 'doko' ),
		'theme_short_description' => esc_html__( 'Doko is a fast and modern Material Design WordPress Theme. It is intuitive and easy to use, robust and reliable, highly flexible and fully responsive theme. Based on live customizer, the theme allows previewing the changes as you made. It is the perfect theme for the professionals, bloggers, and creative personnel’s website, as it provides a clean and flexible appearance, an elegant portfolio, and a catchy online shop.', 'doko' ),

		// Plugin Action Texts
		'install_n_activate' 	=> esc_html__('Install and Activate', 'doko'),
		'deactivate' 			=> esc_html__('Deactivate', 'doko'),
		'activate' 				=> esc_html__('Activate', 'doko'),

		// Getting Started Section
		'doc_heading' 		=> esc_html__('Step 1 - Documentation', 'doko'),
		'doc_description' 	=> esc_html__('Read the Documentation and follow the instructions to manage the site , it helps you to set up the theme more easily and quickly. The Documentation is very easy with its pictorial  and well managed listed instructions. ', 'doko'),
		'doc_link'			=> 'https://doc.accesspressthemes.com/doko/',
		'doc_read_now' 		=> esc_html__( 'Read Now', 'doko' ),
		'cus_heading' 		=> esc_html__('Step 2 - Customizer Panel', 'doko'),
		'cus_read_now' 		=> esc_html__( 'Go to Customizer Panels', 'doko' ),

		// Recommended Plugins Section
		'pro_plugin_title' 			=> esc_html__( 'Premium Plugins', 'doko' ),
		'free_plugin_title' 		=> esc_html__( 'Free Plugins', 'doko' ),


		// Demo Actions
		'activate_btn' 		=> esc_html__('Activate', 'doko'),
		'installed_btn' 	=> esc_html__('Activated', 'doko'),
		'demo_installing' 	=> esc_html__('Installing Demo', 'doko'),
		'demo_installed' 	=> esc_html__('Demo Installed', 'doko'),
		'demo_confirm' 		=> esc_html__('Are you sure to import demo content ?', 'doko'),

		// Actions Required
		'req_plugin_info' => esc_html__('All these required plugins will be installed and activated while importing demo. Or you can choose to install and activate them manually. If you\'re not importing any of the demos, you must install and activate these plugins manually.', 'doko' ),
		'req_plugins_installed' => esc_html__( 'All Recommended action has been successfully completed.', 'doko' ),
		'customize_theme_btn' 	=> esc_html__( 'Customize Theme', 'doko' ),
		'pro_plugin_title' 			=> esc_html__( 'Premium Plugins', 'doko' ),
		'free_plugin_title' 		=> esc_html__( 'Free Plugins', 'doko' ),
	);

	/**
	 * Initiating Welcome Page
	*/
	$my_theme_wc_page = new Agency_Lite_Welcome( $th_plugins, $strings );