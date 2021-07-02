<?php
/**
 * The template for displaying all pages.
 *
 * Template Name: Front Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Doko
 */

get_header(); 	
	
	/**
	 * About Section in Front Page
	*/
	do_action( 'doko_about_frontpage_section' );

	/**
	 * Counter Section in Front Page
	*/
	do_action( 'doko_counter_frontpage_section' );

	/**
	 * Services Section in Front Page
	*/
	do_action( 'doko_services_frontpage_section' );

	/**
	 * Features Section in Front Page
	*/
	do_action( 'doko_features_frontpage_section' );

	/**
	 * Testimonials Section in Front Page
	*/
	do_action( 'doko_testimonials_frontpage_section' );

	/**
	 *  Works Section in Front Page
	*/
	do_action( 'doko_works_frontpage_section' );
	/**
	 * Our Team Section in Front Page
	*/
	do_action( 'doko_our_team_frontpage_section' );

	/**
	 * Blogs in Front Page
	*/
	do_action( 'doko_blogs_frontpage_section' );

	/**
	 * Partners in Front Page
	*/
	do_action( 'doko_partners_frontpage_section' );
			
get_footer();