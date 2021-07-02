<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Doko
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<?php $top_nav_options =  get_theme_mod('doko_header_navigation_settings','before') ;?>

<body <?php body_class(); ?> >
<?php
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}?>
<div id="page" class="site <?php echo esc_attr($top_nav_options); ?>">

	<?php

		/**
		 * @see  doko_header_logo() - 4
		*/	
		do_action( 'doko_header_logo' );

		/**
		 * @see  doko_skip_links() - 5
		*/			
		do_action( 'doko_header_before' ); 

		/**
		 * @see  doko main header
		*/			
		do_action( 'doko_main_header' ); 

		do_action( 'doko_header_after' );  

	?>

<div id="content" class="site-content">

	<?php if(is_page_template( 'template-home.php' )) 
		{
			do_action( 'doko_banner_frontpage_section' );
		 }
		else {

		if(!is_front_page()) {
	?>
	<div class="breadcrumb">


	

	<?php if(is_archive()) : ?>
		<?php the_archive_title( '<h1 class="header-page-title">', '</h1>' ); ?>

	<?php elseif( is_home()) : ?>
		 <h1 class="header-page-title"><?php single_post_title(); ?></h1>
		<?php //the_title( '<h1 class="header-page-title">', '</h1>' ); ?>
	

	<?php elseif(is_singular()) : ?>
		<h1 class="header-page-title"><?php single_post_title(); ?></h1>

	<?php elseif(is_front_page()) : ?>
		<?php the_title( '<h1 class="header-page-title">', '</h1>' ); ?>

	<?php elseif(is_404()) : ?>
		<?php the_title( '<h1 class="header-page-title">', '</h1>' ); ?>

	<?php elseif(function_exists('is_woocommerce')) : ?>
		<?php if(is_woocommerce()) : ?>
			<?php the_title( '<h1 class="header-page-title">', '</h1>' ); ?>
		<?php endif; ?>
	
	<?php elseif(is_category()) : ?>
		<?php the_archive_title( '<h1 class="header-page-title">', '</h1>' ); ?>

	<?php elseif(is_search()) : ?>
		<?php the_title( '<h1 class="header-page-title">', '</h1>' ); ?>
	<?php
	  elseif(is_page()) : ?>
		<?php the_title( '<h1 class="header-page-title">', '</h1>' ); ?>

	
	<?php endif; ?>

		<div class="general-breadcrumb">
			<?php
			
			if(class_exists('WooCommerce') && is_woocommerce()) {
				doko_woo_breadcrumb();
				
			} else {

				Doko_Breadcrumb_Trail(); 
			}
			?>
		</div>
	

	</div>
	<?php 
			}
		}
	?>


<?php 

    /**
	 * Navigation After Banner section
	*/
	do_action( 'doko_navigation_after_banner_section' );