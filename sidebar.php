<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Doko
 */
if( ! is_active_sidebar( 'doko-sidebar-widget' ) ){
	return;
}

?>

<aside id="secondary" class="widget-area">
	 <?php dynamic_sidebar( 'doko-sidebar-widget' ); 	?>
</aside><!-- #secondary -->
