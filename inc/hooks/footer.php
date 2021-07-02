<?php
/**
 * Footer Section Function Area
*/

/**
 * Footer Before Function Area
**/



if ( ! function_exists( 'doko_footer_before' ) ) { 

	function doko_footer_before() { 
		$footer_class = '';
		if(is_active_sidebar('doko-footer-left-widget') || is_active_sidebar('doko-footer-middle-widget') || is_active_sidebar('doko-footer-right-widget')) {
			$footer_class = 'show-footer-widgets';
		}
		?>
			<footer id="doko-footer" class="site-footer <?php echo esc_attr($footer_class); ?>" >
				<div class="ak-container clear">
		<?php
	}
}
add_action( 'doko_footer_before', 'doko_footer_before', 10 );


/**
 * Footer Widget area function area
**/
if ( ! function_exists( 'doko_footer_widgets' ) ) {
	function doko_footer_widgets() {

		if ( is_active_sidebar( 'doko-footer-left-widget' ) ) : 
		echo '<div class="footer1 footer-col">';
			dynamic_sidebar('doko-footer-left-widget');
		echo '</div>';
		endif;

		if ( is_active_sidebar( 'doko-footer-middle-widget' ) ) : 
		echo '<div class="footer2 footer-col">';
				dynamic_sidebar('doko-footer-middle-widget');
		echo '</div>';
		endif;


		if ( is_active_sidebar( 'doko-footer-right-widget' ) ) : 
		echo '<div class="footer3 footer-col">';
				dynamic_sidebar('doko-footer-right-widget');
		echo '</div>';
		endif;

       }  
		
}
add_action( 'doko_footer', 'doko_footer_widgets', 20 );


/**
 * Footer buttom section
**/
if ( ! function_exists( 'doko_bottom_footer' ) ) {
	function doko_bottom_footer() { ?>
			<div class="footer-buttom">
			<div class="container-wrap clear">
				<div class="buttom-left">
					<?php apply_filters( 'doko_bottom_menu', 10 ); ?>
				</div>
				<div class="buttom-right">
					<?php apply_filters( 'doko_copyright', 5 ); ?>
				</div>
			</div>
			</div>
		<?php
	}
}
add_action( 'doko_footer', 'doko_bottom_footer', 30 );


/**
 * Footer After Function Area
**/
if ( ! function_exists( 'doko_footer_after' ) ) { 
	
	function doko_footer_after() { ?>
			</div> <!-- end of the ak-container -->
		</footer><!-- #colophon -->
		<?php
	}
}
add_action( 'doko_footer_after', 'doko_footer_after', 40 );