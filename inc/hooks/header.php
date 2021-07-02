<?php
/**
 * Header Section Function Area
*/

if ( ! function_exists( 'doko_skip_links' ) ) {
	/**
	 * Skip links
	 * @since  1.0.0
	 * @return void
	*/
	function doko_skip_links() {
		?>
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'doko' ); ?></a>
		<?php
	}
}
add_action( 'doko_header_before', 'doko_skip_links', 5 );


/**
 * Header Before Function Area
**/
if ( ! function_exists( 'doko_header_before' ) ) { 

	function doko_header_before() { ?>
		<header id="masthead" class="site-header <?php if( ( is_page_template('template-home.php') ) ){ 
			echo esc_attr('kr-homepage');
			 }else{ echo esc_attr('kr-innerheader');
			  } ?> ">

			<?php if( is_front_page() ) { ?><div class="kr-headerwrap"> <?php } ?>
		<?php
	}
}
add_action( 'doko_header_before', 'doko_header_before', 10 );


/**
 * Top Header Function Area
**/
if ( ! function_exists( 'doko_top_header' ) ) {
	function doko_top_header() {

		$top_nav_options = esc_attr( get_theme_mod('doko_header_navigation_settings','before') );

		 ?>			
			<div class="topheader clearfix">
				<div class="container-wrap clear">

						<div class="logo-wrap">
							<?php if( has_custom_logo() ) : ?>
								<div class="logo">
									<?php
									if ( function_exists( 'the_custom_logo' ) ) {
										the_custom_logo();
									}
								?>
								</div>
							<?php endif; ?>

							<?php if ( !has_custom_logo() )  { ?>

							<div class="logo-textwrap">
								<h1 class="site-title">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
										<?php bloginfo( 'name' ); ?>
									</a>
								</h1>
								<?php 
									$description = get_bloginfo( 'description', 'display' );
									if ( $description || is_customize_preview() ) { ?>
										<p class="site-description"><?php echo esc_html($description); /* WPCS: xss ok. */ ?></p>
								<?php } ?>
							</div>

							<?php } ?>
						</div>

					<?php if(!empty( $top_nav_options ) && $top_nav_options == 'before') { ?>
						<div class="nav-before-slider">
						
						<button id="toggle" class="btn-transparent-toggle">
		                   <div class="one"></div>
		                   <div class="two"></div>
		                   <div class="three"></div>
		               </button>

							<div class="nav">
		                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id'=>'primary-menu', 'menu_class' => 'primary-menu','fallback_cb' => 'doko_menu_create', 'container_class' => 'menu-header-nav-container') ); ?>
		                    </div>
		                    
							<div class="search-basket-section">
								 	<?php 
								 	$search_hide_show = get_theme_mod('doko_hide_show_search_icon_settings','show');
								 	$search_hide_show_icon= esc_attr(get_theme_mod('doko_search_icon','fa-search'));
								 	$basket_hide_show = get_theme_mod('doko_hide_show_basket_icon_settings', 'show');
								 	$basket_hide_show_icon = esc_attr(get_theme_mod('doko_basket_icon','fa-shopping-cart'));
								 	if(!empty( $search_hide_show ) && $search_hide_show == 'show') {
								 	?>
						            <div class="search search-s">
						            	<button class="btn-transparent-toggle">
						            	<span class="header-search fa <?php echo esc_attr($search_hide_show_icon); ?>"> </span>
						            	</button>
							            <div class="searchbox-icon">
							            	<form role="search" class="searchbox" method="get" id="searchform" action="<?php echo esc_url(home_url( '/' )); ?>">
			                                  <div><label class="screen-reader-text" for="s"><?php echo esc_html__('Search for:','doko'); ?></label>
			                                    <input type="text" class="searchbox-input" value="" name="s" id="s" />
			                                    <input type="submit" id="searchsubmit" value="<?php echo esc_attr__('Search','doko'); ?>" />

			                                  </div>
			                                </form>

							            </div>
							        </div>
							        <?php
							        	}
							        if ( class_exists( 'WooCommerce' ) ) {
					        		if(!empty( $basket_hide_show ) && $basket_hide_show == 'show' && WC()->cart->get_cart_contents_count() != 0 ) {
				        			?>
							            <div class="basket">
								            <a class="woso-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
								            	<span class="cart-count">
								                <?php echo absint(WC()->cart->get_cart_contents_count()); ?>
								                </span>
								            	<span class="fa <?php echo esc_attr($basket_hide_show_icon); ?>"> </span>
								            </a>
							            </div>
							        <?php } } ?>
							        
								</div>

						 
					<?php } ?>

					<?php 
					if(!empty( $top_nav_options ) && $top_nav_options == 'after') { 
						$top_header = esc_attr( get_theme_mod('doko_header_settings_options','show') );
						if( !empty( $top_header ) && $top_header == 'show' ) {
					?>
						<div class="quickinfo right-header-wrap">
							<?php apply_filters( 'doko_quick_contact_info_top_header', 5 ); ?>
						</div>
					<?php } } ?>

					<div class="right-header-wrap">
					
					<?php if(!empty( $about_toggle ) && $about_toggle == 1) { ?>
						<div class="abouttoggle">
							<span class="first-line"></span>
							<span class="second-line"></span>
							<span class="third-line"></span>
						</div>
						<div class="abouttoggle-content">
						</div>
					<?php } ?>

					</div>
				</div>
			</div>				
			<?php
		
	}
}
add_action( 'doko_main_header', 'doko_top_header', 15 );

/**
 * Header After Function Area
**/
if ( ! function_exists( 'doko_header_after' ) ) {
	
	function doko_header_after() { ?>
			<?php if( is_front_page() ) { ?></div><?php } ?>
		</header>
		<?php
	}
}
add_action( 'doko_header_after', 'doko_header_after', 30 );