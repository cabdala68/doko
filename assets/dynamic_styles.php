<?php
	/** Dynamic Styles **/

	if( ! function_exists( 'doko_register_dynamic_fonts' ) ) {
		function doko_register_dynamic_fonts () {
			$doko_body_font = get_theme_mod( 'doko_body_font', 'Roboto' );
			$doko_heading_font = get_theme_mod( 'doko_heading_font', 'Roboto Condensed' );
			$doko_menu_font = get_theme_mod( 'doko_menu_font', 'Roboto' );
			
			$all_fonts = $doko_body_font . '|' . $doko_heading_font . '|' . $doko_menu_font;

			if( $doko_body_font || $doko_heading_font || $doko_menu_font ) {
				$all_fonts = $doko_body_font . '|' . $doko_heading_font . '|' . $doko_menu_font;

		        wp_register_style('doko-dynamic-font', '//fonts.googleapis.com/css?family='.esc_attr($all_fonts));
		        wp_enqueue_style( 'doko-dynamic-font');
		    }
		}

	}

	if( ! function_exists( 'doko_dynamic_styles' ) ) {
		function doko_dynamic_styles() {
			$custom_css = "";

			$doko_body_font = get_theme_mod( 'doko_body_font', 'Roboto' );
			$doko_heading_font = get_theme_mod( 'doko_heading_font', 'Roboto Condensed' );
			$doko_menu_font = get_theme_mod( 'doko_menu_font', 'Roboto' );
			$doko_general_plane_color = get_theme_mod( 'doko_general_plane_color', '' );
			$doko_general_gradient_color = get_theme_mod( 'doko_general_gradient_color', '' );

			if( $doko_body_font ) {
				$custom_css .= "
					body, body p {
						font-family: {$doko_body_font};
					}";
			}

			if( $doko_heading_font ) {
				$custom_css .= "
					h1, h2, h3, h4, h5, h6 {
						font-family: {$doko_heading_font};
					}";
			}

			if( $doko_menu_font ) {
				$custom_css .= "
					.site-header .nav-before-slider .nav .menu-header-nav-container ul li a,
					.nav-after-slider .menu-header-nav-container ul li a {
						font-family: {$doko_menu_font};
					}";
			}

			if( $doko_general_plane_color ) {
				/** Color **/
				$custom_css .= "
					.site-header .nav-before-slider .nav .menu-header-nav-container ul li:hover >a,
					.site-header .nav-before-slider .nav .menu-header-nav-container ul li.current-menu-item >a,
					.nav-after-slider .menu-header-nav-container ul li:hover >a,
					.nav-after-slider .menu-header-nav-container ul li.current-menu-item >a,
					.counter-section .counter-col .counter-number:before,
					.services-wrapper .services .services-items a.read-more,
					.testimonials-wrapper .testimonials-section .item .text .name-holder span.author,
					.latest-works .titles-port .filter.active,
					.latest-works .titles-port .filter:hover,
					.team-wrapper .teams-sections .teams .name h4 a,
					.services-wrapper .services .services-items a.read-more:before,
					.testimonials-wrapper .testimonials-section .testimonials .owl-nav .owl-prev,
					.testimonials-wrapper .testimonials-section .testimonials .owl-nav .owl-next,
					.blog-wrapper .blogs-sections .blogs span.read-more-button a,
					.site-footer .footer3 .textwidget h4,
					.site-footer .footer3 .textwidget span:before,
					.site-footer .footer-buttom .buttom-left ul li a:hover,
					.site-footer .footer-buttom .buttom-right a:hover,
					.widget_archive ul li a:hover,
					.widget_categories ul li,
					:hover.widget_recent_comments ul li a:hover,
					.widget_nav_menu ul li a:hover,
					.widget_pages ul li a:hover,
					.widget_meta ul li a:hover,
					.widget_categories ul li a:hover,
					.widget_recent_entries ul li a:hover,
					.content-area .blogs-lists-wrapper .Read-more a,
					.navigation.pagination span, .navigation.pagination a,
					.banner-section .owl-nav .owl-prev,
					.banner-section .owl-nav .owl-next,
					.site-header .nav-before-slider .basket a:hover span.fa,
					.site-header .nav-before-slider .search:hover span.header-search,
					.nav-after-slider .search:hover span.header-search,
					.all-social-links .social-links a,
					.banner-section .item .content .link a:hover {
						color: {$doko_general_plane_color};
					}";

				/** Background **/
				$custom_css .= "
					.site-header .nav-before-slider .nav .menu-header-nav-container ul li:before,
					.nav-after-slider .menu-header-nav-container ul li:before,
					.services-wrapper .services .services-items:before,
					.latest-works .titles-port .filter:before,
					.widget_tag_cloud .tagcloud a:hover,
					.all-social-links .social-links a:hover {
						background-color: {$doko_general_plane_color};
					}";
			}

			if( $doko_general_gradient_color ) {
				/** Background Color **/
				$custom_css .= "
					.banner-section .owl-item:before,
					.about-wrapper .about-content .link a,
					a.scrollup,
					.services-wrapper .services-buttom-content .button-label a,
					.features-wrapper .left-container .features-button-section .button-label a,
					.latest-works .works-postse .works-post-wrape .overflow .hm-port-excerpt,
					.search-basket-section .basket span.cart-count,
					.content-area .feature-blog .read-more-button a,
					.woocommerce #respond input#submit.alt, .woocommerce a.button.alt,
					.woocommerce button.button.alt,
					.woocommerce input.button.alt,
					.woocommerce-cart table.cart input,
					.woocommerce #respond input#submit,
					.woocommerce a.button,
					.woocommerce button.button,
					.woocommerce input.button,
					.woocommerce a.added_to_cart,
					.search-form button,
					.search-form input[type=\"button\"],
					.search-form input[type=\"reset\"],
					.search-form input[type=\"submit\"],
					.site-footer .footer2 .widget_text form input[type=\"submit\"] {
						$doko_general_gradient_color;
					}";
			}

			/** Breadcrumb **/
			$header_image = (get_header_image()) ? get_header_image() : esc_url( get_template_directory_uri().'/header.jpg' );

			if( $header_image ) {
				$custom_css .= ".breadcrumb{
					background-image: url({$header_image});
				}";
			}

        	/** Home Sectio Background **/
        	$doko_bgs = array(
        		'about' => 'about-wrapper',
        		'services' => 'services-wrapper',
        		'features' => 'features-wrapper',
        		'testimonials' => 'testimonials-wrapper',
        		'works' => 'latest-works',
        		'our_team' => 'team-wrapper',
        		'blog' => 'blog-wrapper',
        		'partners' => 'partners-wrapper',
        	);

        	foreach( $doko_bgs as $doko_bg_id => $doko_bg_identifier ) {
    			$sec_bg = get_theme_mod( 'doko_' . $doko_bg_id . '_background_image', '' );

    			if( $sec_bg ) {
    				$custom_css .= ".{$doko_bg_identifier}{
    					background-image: url({$sec_bg});
    				}";
    			}
        	}

        	/** Footer Background **/
        	$footer_bg = get_theme_mod( 'doko_footer_background_image', '' );
        	if( $footer_bg ) {
        		$custom_css .= "#doko-footer{
        			background-image: url({$footer_bg});
    			}";
        		
        	}

			wp_add_inline_style( 'doko-style', $custom_css );
		}

		add_action( 'wp_enqueue_scripts', 'doko_dynamic_styles' );
	}