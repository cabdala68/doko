<?php
/**
 * Doko functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Doko
 */

if ( ! function_exists( 'doko_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function doko_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Doko, use a find and replace
		 * to change 'doko' to the name of your theme in all the template files.
		 */

		load_theme_textdomain( 'doko', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		add_image_size('doko-banner-image', 1920, 780, true); // banner image size
		add_image_size('doko-frontpage-about-image', 500, 300, true); // frontpage about image size
		add_image_size('doko-frontpage-testimonials-image', 130, 130, true); // frontpage testimonials image size
		add_image_size('doko-frontpage-our-team-image', 330, 350, true); // frontpage our team image size
		add_image_size('doko-frontpage-blogs-image', 240, 240, true); // frontpage blogs image size
		add_image_size('doko-blogs-lists-images', 500, 380, true); // frontpage blogs image size

		add_image_size('doko-work-thumb', 350, 350, true);
		add_image_size('doko-work-thumb1', 350, 720, true);
		add_image_size('doko-work-thumb2', 720, 350, true);
		

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'doko' ),
			'buttom' => esc_html__( 'Bottom', 'doko' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
		
		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'doko_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );


		if ( class_exists( 'WooCommerce' ) ) {
		// to support woocommerce product image lightbox
		   add_theme_support( 'woocommerce' );
		   add_theme_support( 'wc-product-gallery-zoom' );
		   add_theme_support( 'wc-product-gallery-lightbox' );
		   add_theme_support( 'wc-product-gallery-slider' );

		}


	}
endif;

add_action( 'after_setup_theme', 'doko_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

function doko_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'doko_content_width', 640 );
}
add_action( 'after_setup_theme', 'doko_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function doko_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Doko Sidebar  Widget Area', 'doko' ),
		'id'            => 'doko-sidebar-widget',
		'description'   => esc_html__( 'Add widgets here.', 'doko' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title wow slideInUp">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Left  Widget Area', 'doko' ),
		'id'            => 'doko-footer-left-widget',
		'description'   => esc_html__( 'Add widgets here.', 'doko' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title wow slideInUp">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Middle Widget Area', 'doko' ),
		'id'            => 'doko-footer-middle-widget',
		'description'   => esc_html__( 'Add widgets here.', 'doko' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title wow slideInUp">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
        'name'          => esc_html__('Footer right Widget Area','doko'),
        'id'            => 'doko-footer-right-widget',
        'description'   => esc_html__( 'Add widgets here.', 'doko' ),
        'before_widget' => '<aside id="%1$s" class="widget footer-widget-footer %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'doko_widgets_init' );

/**
 * Enqueue scripts and styles.
 */


if(!function_exists('doko_fonts_url')) {
	function doko_fonts_url() {
	    $fonts_url = '';
	    $fonts = array();
	  
	   if ('off' !== _x('on', 'Roboto: on or off', 'doko')) {
			$fonts[] = 'Roboto:300,400,500,700';
		}

		if ('off' !== _x('on', 'Rubik: on or off', 'doko')) {
			$fonts[] = 'Rubik:400,500,700';
		}

		if ('off' !== _x('on', 'Roboto+Condensed: on or off', 'doko')) {
			$fonts[] = 'Roboto+Condensed:400,700';
		}

	 
	    // Ready to enqueue Google Font
	    if ($fonts) {
	        $fonts_url = add_query_arg(array(
	            'family' => urlencode(implode('|', $fonts))
	                ), '//fonts.googleapis.com/css');
	    }
	    return $fonts_url;
	}
}


if (!function_exists('doko_scripts')) {
function doko_scripts() {
	/**
	 * Font-Awesome-master
	*/
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/library/fontawesome/css/font-awesome.min.css');


	/**
	 * Main Style 
	*/
	wp_enqueue_style( 'doko-style', get_stylesheet_uri() );

	wp_enqueue_style( 'doko-keyboard', get_template_directory_uri() . '/assets/css/keyboard.css' );

	/**
	 * Main Style 
	*/
	wp_enqueue_style( 'doko-responsive', get_template_directory_uri().'/responsive.css' );

	/**
	 * Owl Carousel Style 
	*/
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/library/owl-carousel/owl.carousel.css' );



	 wp_enqueue_style('doko-google-fonts', doko_fonts_url(), array(), null);
	
	/**
	* Owl carousel js
	*/
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/library/owl-carousel/owl.carousel.js', array('jquery'), false, true );

	/**
	* isotope js
	*/
	wp_enqueue_script( 'isotope-pkgd', get_template_directory_uri(). '/assets/js/isotope/isotope.pkgd.js', array('jquery'));
    wp_enqueue_script( 'packery-mode-pkgd', get_template_directory_uri(). '/assets/js/isotope/packery-mode.pkgd.js',array('jquery'));

    /**
	* customizer js
	*/
	wp_enqueue_script( 'doko-custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery', 'owl-carousel', 'imagesloaded', 'isotope-pkgd'));
	

	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'doko_scripts' );
}

/**
 * Enqueue editor styles for Gutenberg
 */
	 
function doko_editor_styles() {
	wp_enqueue_style('doko-google-fonts', doko_fonts_url(), array(), null);

    wp_enqueue_style( 'doko-google-fonts', add_query_arg( $vmagazine_lite_font_args, "//fonts.googleapis.com/css" ) );

    wp_enqueue_style( 'doko-editor-style', get_template_directory_uri() . '/assets/css/style-editor.css' );
}
add_action( 'enqueue_block_editor_assets', 'doko_editor_styles' );

/**
 * Load Require init file.
 */
require $doko_file_directory_init_file_path = trailingslashit( get_template_directory() ).'inc/init.php';

function doko_wsf_make_link ( $url, $anchortext, $title=NULL, $nofollow=false ) {  
   if ( $title == null ) $title=$anchortext;  
   $rel = ($nofollow == true) ? ' rel="nofollow"' : $rel = '';   

   $link = sprintf( '<a href="%s" title="%s" %s>%s</a>', esc_url($url), esc_html($title), esc_attr($rel), esc_html($anchortext) );  
   return $link;   
}  

if ( class_exists( 'WooCommerce' ) ) {
	function doko_woo_breadcrumb() {

		$args = array(
				'delimiter' => '/',
				'before' => '<span class="breadcrumb-title"></span>'
		);
		 woocommerce_breadcrumb( $args );
	}
	
}


/**
* get thuumbnail attributes (caption, alt-text, description)
*/
if (!function_exists('doko_wp_get_attachment')) {
function doko_wp_get_attachment( $attachment_id ) {
 $attachment = get_post( $attachment_id ); return array( 'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ), 
 	'caption' => $attachment->post_excerpt, 'description' => $attachment->post_content, 'href' => get_permalink( $attachment->ID ), 'src' => $attachment->guid, 'title' => $attachment->post_title ); 
 }
}

if (!function_exists('doko_post_filter')) {
add_action( 'pre_get_posts', 'doko_post_filter' );
function doko_post_filter($query) {
    global $wp_query;
    
    if(is_home()) {
    	$blogs_excluded_categories_id = get_theme_mod('doko_homepage_excluded_categories') ;

    	if(!empty($blogs_excluded_categories_id)) {
    	
    	$num_of_blogs_display = esc_attr( get_theme_mod('doko_display_number_blog_post_in_homepage') );

    	foreach ( $blogs_excluded_categories_id as $excluded_id )
                        {
                            $cat = get_category_by_slug( $excluded_id );
                            $cat and $category__not_in[] = $cat->term_id;
                        }
                 

    	$query->set( 'category__not_in', $category__not_in );
    	return;
    }
	}
       
}
}


if (!function_exists('doko_mytheme_comment')) {
 $count = 1;
// comment lists customization
function doko_mytheme_comment($comment, $args, $depth) {
global $count;
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
   
    <?php  if ($count % 2 == 0)
    	{
    		$class="right";
    	} else {
    		$class = "left";
    	}
    ?>

    <<?php echo esc_attr($tag) ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body <?php if ($depth == 1) { echo esc_html($class); $count ++;} ?>">
    <?php endif; ?>
    <div class="comment-author vcard">

  
    	<div class="image-section">
        	<?php if ( $args['avatar_size'] != 0 ) echo wp_kses_post(get_avatar( $comment, 124 )); ?>
        </div>

        <div class="comment-section">
        	

			    <?php if ( $comment->comment_approved == '0' ) : ?>
			         <em class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'doko' ); ?></em>
			          <br />
			    <?php endif; ?>

			    <div class="comment-meta commentmetadata"><a href="<?php echo esc_url(htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>">
			        <?php
			        /* translators: %1$s : date, %2$s : time */
			        printf( esc_html__('%1$s at %2$s', 'doko'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( esc_html__( '(Edit)','doko' ), '  ', '' );
			        ?>
			    </div>

			    <?php comment_text(); ?>
			    <?php printf(( '<cite class="fn">%s</cite> <span class="says">'.esc_html__('says:', 'doko').'</span>' ), get_comment_author_link() ); ?>
			    <div class="reply">
			        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			    </div>


        </div>
    </div>
    
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php 
    }
}




if (!function_exists('doko_crunchify_disable_comment_url')) {
function doko_crunchify_disable_comment_url($fields) { 
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields','doko_crunchify_disable_comment_url');
}


if (!function_exists('doko_my_header_add_to_cart_fragment')) {
// header cart update without page reload when added to cart
function doko_my_header_add_to_cart_fragment( $fragments ) {
 
    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?><span class="cart-count" href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" title="<?php echo esc_attr__( 'View your shopping cart','doko' ); ?>"><?php
    if ( $count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo absint( $count ); ?></span>
        <?php            
    }
        ?></span><?php
 
    $fragments['span.cart-count'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'doko_my_header_add_to_cart_fragment' );
}



if (!function_exists('doko_wecodeart_com')) {
//filter to remove the itemprop tag of the custom logo
add_filter( 'get_custom_logo', 'doko_wecodeart_com' );
// Filter the output of logo to fix Googles Error about itemprop logo
function doko_wecodeart_com() {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $html = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home">%2$s</a>',
            esc_url( home_url( '/' ) ),
            wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                'class'    => 'custom-logo',
            ) )
        );
    return $html;   
}
}

add_filter('woocommerce_add_to_cart_fragments', 'doko_woocommerce_header_add_to_cart_fragment');

function doko_woocommerce_header_add_to_cart_fragment( $fragments ) {
    $basket_hide_show_icon = esc_attr(get_theme_mod('doko_basket_icon','fa-shopping-cart'));
	$fragments['a.cart'] = '<a class="cart" href="' . esc_url( wc_get_cart_url() ) . '"><i class="ei ei-icon_cart_alt"></i><i class="cart-counter">' . absint(WC()->cart->get_cart_contents_count()) . '</i></a>';
    $fragments['a.woo-cart'] = '<a href="' . esc_url( wc_get_cart_url() ) . '">
    <span class="cart-count">'. absint(WC()->cart->get_cart_contents_count()). '</span>
    <span class="fa ' . esc_attr($basket_hide_show_icon) . '"> </span></a>';
	return $fragments;

}