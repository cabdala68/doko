<?php

/**
 * Get categories
*/

$doko_raw_categories = get_categories();
foreach ( $doko_raw_categories  as $categories ) {
    
    $doko_categories[$categories->slug] = $categories->name;
    
}


/**
*  Frotpage Slider section
*/

if(! function_exists('doko_banner_section')) {
    function doko_banner_section() { ?>

    <?php 
    
        $slider_1_id = absint( get_theme_mod('home_page_slider_1') );
        $slider_2_id = absint( get_theme_mod('home_page_slider_2') );
        $slider_3_id = absint( get_theme_mod('home_page_slider_3') );


        $slider_1_button_text = get_theme_mod('home_page_slider_1_button_text');
        $slider_2_button_text = get_theme_mod('home_page_slider_2_button_text');
        $slider_3_button_text = get_theme_mod('home_page_slider_3_button_text');

        $slider_1_button_link = get_theme_mod('home_page_slider_1_button_link');
        $slider_2_button_link = get_theme_mod('home_page_slider_2_button_link');
        $slider_3_button_link = get_theme_mod('home_page_slider_3_button_link');

        $slider_button_text = array($slider_1_button_text, $slider_2_button_text, $slider_3_button_text);
        $slider_button_link = array($slider_1_button_link, $slider_2_button_link, $slider_3_button_link);


        
        $queries = new WP_Query( array( 'order' => 'ASC','post_type' => 'page', 'post__in' => array($slider_1_id, $slider_2_id, $slider_3_id )) );

        if( $queries->have_posts()){
        
        
    ?>
        <div class="banner-section">
            <div class="banner-container">
            <div class="frontpage-banner owl-carousel owl-theme">
            <?php 
            $i=0;
                while ($queries->have_posts()) : $queries->the_post(); 
                global $post;  
            ?>
                <div class="item">
                    <div class="content"> 
                    <?php if(get_the_title()) : ?>
                        <div class="title"> <h4> <?php the_title(); ?></h4>
                        </div>
                    <?php endif; ?>
                    <?php if(get_the_content()) : ?>
                        
                        <div class="text"> 
                     
                         <?php echo esc_html(substr(wp_strip_all_tags(get_the_content()), 0, 150)); ?>
                        
                        </div>
                        <?php endif; ?>

                        <?php 
                        if($slider_button_link[$i]) : ?>
                        <div class="link"> <a href="<?php echo esc_url($slider_button_link[$i]);?>"> <?php echo esc_html($slider_button_text[$i]); ?></a>
                        </div>
                    <?php endif; ?>

                    </div>
                    <?php 
                        $doko_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'doko-banner-image');
                        $doko_img_src = $doko_img[0];

                        if (has_post_thumbnail()) : ?>
                            <img src="<?php echo esc_url($doko_img_src); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" />
                    <?php 
                    endif;
                    ?>
                </div>

            <?php 
               $i++; 
            endwhile;
            } 
            wp_reset_postdata();

             ?>

            </div>

               <?php 
                    //social links
                    doko_social_links();
               ?>

        </div>
        </div>
        <?php
    }

}
add_action('doko_banner_frontpage_section','doko_banner_section');

/**
 * Frontpage Navigation after slider
*/
if( ! function_exists('doko_navigation_after_banner')){
    function doko_navigation_after_banner() {
        
        $top_nav_options = esc_attr( get_theme_mod('doko_header_navigation_settings','before') );

            if(!empty( $top_nav_options ) && $top_nav_options == 'after') {
             ?>
                <div class="nav-after-slider clear">
                <div class="ak-container">

                        <button id="toggle" class="btn-transparent-toggle">
                           <div class="one"></div>
                           <div class="two"></div>
                           <div class="three"></div>
                       </button>
                       
                    <div class="nav">
                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id'=>'primary-menu', 'menu_class' => 'primary-menu', 'container_class' => 'menu-header-nav-container') ); ?>
                    </div>

                    <div class="search-basket-section">
                        <?php 
                            $search_hide_show = get_theme_mod('doko_hide_show_search_icon_settings','show');
                            $search_hide_show_icon= get_theme_mod('doko_search_icon','fa-search');
                            $basket_hide_show = get_theme_mod('doko_hide_show_basket_icon_settings', 'show');
                            $basket_hide_show_icon = get_theme_mod('doko_basket_icon', 'fa-shopping-cart');
                               
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
                                        <input type="submit" id="searchsubmit" value="<?php echo esc_attr__('Search', 'doko')?>" />

                                      </div>
                                    </form>

                                </div>
                         </div>

                        <?php }
                        if ( class_exists( 'WooCommerce' ) ) { 
                        if(!empty( $basket_hide_show ) && $basket_hide_show == 'show') { ?>
                         <div class="basket">
                            <a href="<?php  if ( class_exists( 'WooCommerce' ) ) {if ( WC()->cart->get_cart_contents_count() != 0 ) {echo esc_url(site_url('/cart')); } else {echo esc_url('#');} }?>">

                            <?php ?>
                                <span class="cart-count">
                                <?php
                                
                                global $woocommerce;
                                 echo absint($woocommerce->cart->cart_contents_count);
                                    
                                 ?>
                                </span>
                                <span class="fa <?php echo esc_attr($basket_hide_show_icon);?>"> </span>
                                
                            </a>
                        </div>
                        <?php } } ?>
                    </div>
                </div>
                </div>
            <?php } 
    
    }
}
add_action('doko_navigation_after_banner_section', 'doko_navigation_after_banner');

/**
 * Frontpage about section
*/
if(! function_exists('doko_about_section') ) {
    function doko_about_section() { 
             $about_page_id = absint( get_theme_mod('home_page_about_settings') );
             $background_image = get_theme_mod('doko_about_background_image');
             $queries = new WP_Query( array( 'post_type' => 'page', 'page_id' => $about_page_id ) );

             if($background_image)
             {
               $background_image_class = 'bgimgclass'; 
             }
             else {
                $background_image_class = ' '; 
             }

             if($about_page_id) {

            if($queries->have_posts()) {
            while($queries->have_posts()) : $queries->the_post();

            
        ?>
        
        <div class="about-wrapper <?php echo esc_attr($background_image_class);?>" >
    
        <?php if($background_image): ?>
            <div class="overlay"></div>
        <?php endif; ?>
            <div class="ak-container">
                

                <div class="about-content">
                <?php if(get_the_title()): ?>
                    <div class="about-title">
                    <h4><?php the_title(); ?></h4>
                </div>
            <?php endif; ?>
            <?php if(get_the_content()): ?>

                     <?php echo esc_html(substr(wp_strip_all_tags(get_the_content()), 0, 350)); ?>

                    <div class="link"> <a href="<?php the_permalink(); ?>"> <?php  esc_html_e('Learn More','doko'); ?></a>
                    </div>
            <?php endif; ?>
                </div>


                 <?php 
                    $doko_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'doko-frontpage-about-image');
                    $doko_img_src = $doko_img[0];

                    if (has_post_thumbnail()) : 
                ?>
                        
                <div class="about-image">
                    <img src="<?php echo esc_url($doko_img_src); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" />
                </div>

                <?php 
                    endif;
                ?>

            </div>
        </div>

        <?php 
        endwhile; wp_reset_postdata();
        }
      }
    }

}

add_action('doko_about_frontpage_section','doko_about_section');


/**
 * Frontpage counter section
*/
if(! function_exists('doko_counter_section')) {
    function doko_counter_section() { ?>

        <div class="counter-section">
        <div class="ak-container">
            
            
            <div class="counter-col">    
                <div class="counter-number Count">
                    <?php echo esc_html(get_theme_mod('doko_counter_one_number','4000')); ?>
                </div>
                <div class="counter-text">
                    <?php echo esc_html(get_theme_mod('doko_counter_one_text','CUSTOMERS')); ?>
                </div>
            </div>
            <div class="counter-col"> 
            <div class="counter-number Count">
                <?php echo esc_html(get_theme_mod('doko_counter_two_number','400')); ?>
            </div>
            <div class="counter-text">
                <?php echo esc_html(get_theme_mod('doko_counter_two_text','EMPLOYEES')); ?>
            </div>
            </div>
            <div class="counter-col"> 
            <div class="counter-number Count">
                <?php echo esc_html(get_theme_mod('doko_counter_three_number','8000')); ?>
            </div>
            <div class="counter-text">
                <?php echo esc_html(get_theme_mod('doko_counter_three_text','PROJECTS DONE')); ?>
            </div>
            </div>
            <div class="counter-col"> 
            <div class="counter-number Count">
                <?php echo esc_html(get_theme_mod('doko_counter_four_number', '950')); ?>
            </div>
            <div class="counter-text">
                <?php echo esc_html(get_theme_mod('doko_counter_four_text','CUSTOMERS')); ?>
            </div>
            </div>
        </div>
        </div>
    <?php
    }
}

add_action('doko_counter_frontpage_section','doko_counter_section');

/**
*   Frontpage Services section 
*/
if(! function_exists('doko_services_section')) {
    function doko_services_section() {
        $services_page_id = absint( get_theme_mod('doko_homepage_services_text_setting') );
        $background_image = get_theme_mod('doko_services_background_image');
        $queries = new WP_Query( array( 'post_type' => 'page', 'page_id' => $services_page_id ) );

        if($background_image)
             {
               $background_image_class = 'bgimgclass'; 
             }
             else {
                $background_image_class = ' '; 
             }

        if($queries->have_posts()) {
        ?>
       

        <div class="services-wrapper <?php echo esc_attr($background_image_class); ?>" >

         <?php if($background_image): ?>
            <div class="overlay"></div>
        <?php endif; ?>
            
        <div class="ak-container">
            <div class="services-main-content">
                <?php 
                if($services_page_id){
                    while ($queries->have_posts()) : $queries->the_post();
                    global $post;
                        
                ?>

            <?php if(get_the_title()): ?>
                <div class="title">
                    <h4> <?php the_title(); ?> </h4>
                </div>
            <?php endif; ?>
            <?php if(get_the_content()): ?>
                <div class="content">
                    
                     <?php echo esc_html(substr(wp_strip_all_tags(get_the_content()), 0, 150)); ?>
                </div>
            <?php endif; ?>
                <?php endwhile; wp_reset_postdata(); } ?>

            </div>

            <div class="services">
            <?php
                $i = 0;
                $services_1_id = absint( get_theme_mod('doko_homepage_services_one_settings') );
                $services_2_id = absint( get_theme_mod('doko_homepage_services_two_settings') );
                $services_3_id = absint( get_theme_mod('doko_homepage_services_three_settings') );
                $services_4_id = absint( get_theme_mod('doko_homepage_services_four_settings') );

                $services_1_icon = get_theme_mod('doko_services_1_icon');
                $services_2_icon = get_theme_mod('doko_services_2_icon');
                $services_3_icon = get_theme_mod('doko_services_3_icon');
                $services_4_icon = get_theme_mod('doko_services_4_icon');

                $services_icons = array($services_1_icon, $services_2_icon, $services_3_icon, $services_4_icon );
                
                $queries = new WP_Query( array( 'post_type' => 'page', 'posts_per_page' => -1, 'order'=>'ASC', 'post__in' => array($services_1_id, $services_2_id, $services_3_id, $services_4_id )) );

                if( $queries->have_posts() ){
                    while ($queries->have_posts()){
                        $queries->the_post();
                       
                        ?>
                        <div class="services-items">
                            <div class="services-icon">
                            
                                <i class="fa <?php echo esc_attr($services_icons[$i]); ?>"></i>
                            </div>
                            <?php if(get_the_title()): ?>
                            <div class="services-title">
                                <?php the_title(); ?>
                            </div>
                        <?php endif; ?>
                        <?php if(get_the_content()): ?>
                            <div class="services-content">
                                <?php echo esc_html(substr(wp_strip_all_tags(get_the_content()), 0, 80)); ?>
                            </div>
                        <?php endif; ?>
                            <div class="link">
                                <a href="<?php the_permalink();?>" class="read-more"> <?php echo esc_html('read more', 'doko'); ?></a>    
                            </div>
                        </div>    
                        <?php
                        $i++;
                    } wp_reset_postdata();
                } ?>
                
            </div>

            <?php 
                $services_bottom_text =  get_theme_mod('doko_homepage_services_below_text_section');

                if($services_bottom_text != ''){
             ?>
            <div class="services-buttom-content">
                <div class="content">
                    <?php echo esc_html($services_bottom_text); ?>
                </div>

                <?php 
                    $button_label = get_theme_mod('doko_homepage_services_below_button_text_settings', esc_html__('Download Now', 'doko'));
                    $link = get_theme_mod('doko_homepage_services_below_button_url_settings');

                    if($button_label) {
                        
                    ?>
                    
                <div class="button-label">
                    <a href="<?php echo esc_url($link); ?>"> <?php echo esc_html($button_label); ?> </a>
                </div>

                <?php } ?>
            </div>
            <?php } ?>

        </div>
        </div>
        <?php
        }
    }
}
add_action('doko_services_frontpage_section','doko_services_section');


/**
 * Frontpage Features Section
*/
if(! function_exists('doko_features_section')) {
    function doko_features_section() {
        
        $features_page_id = absint( get_theme_mod('doko_homepage_features_text_setting') );
        $background_image = get_theme_mod('doko_features_background_image');
        $queries = new WP_Query( array( 'post_type' => 'page', 'page_id' => $features_page_id ) );

        if($background_image)
             {
               $background_image_class = 'bgimgclass'; 
             }
             else {
                $background_image_class = ' '; 
             }

        if($queries->have_posts()) :
        ?>
       

        <div class="features-wrapper <?php echo esc_attr($background_image_class); ?>" >

         <?php if($background_image): ?>
            <div class="overlay"></div>
        <?php endif; ?>

            <div class="ak-container">
                    
            <div class="left-container">
                    
                
            <?php 

            if($features_page_id){

                while($queries->have_posts()) : $queries->the_post(); 
                

            ?>
        <?php if(get_the_title()) : ?>
            <div class="title">
                <h4> <?php the_title(); ?> </h4>
            </div>
        <?php endif; ?>

        <?php if(get_the_content()) : ?>
            <div class="content">
               
                 <?php echo esc_html(substr(wp_strip_all_tags(get_the_content()), 0, 150)); ?>
            </div>
        <?php endif; ?>
            <?php endwhile; wp_reset_postdata(); } ?>

            <div class="features-button-section">

                <div class="button-label">
                    <?php 
                        $button_label = get_theme_mod('doko_homepage_features_button_text_settings');
                        $link = get_theme_mod('doko_homepage_features_button_url_settings');

                    if($link != '') {     
                    ?>
                        <a href="<?php echo esc_url($link); ?>"> <?php echo esc_html($button_label); ?> </a>

                    <?php } ?>

                </div>

            </div>
            </div>

            <div class="features">
                <?php
                    $features_1_id = esc_attr( get_theme_mod('doko_homepage_features_one_settings') );
                    $features_2_id = esc_attr( get_theme_mod('doko_homepage_features_two_settings') );
                    $features_3_id = esc_attr( get_theme_mod('doko_homepage_features_three_settings') );
                    $features_4_id = esc_attr( get_theme_mod('doko_homepage_features_four_settings') );

                    $features_icon_1 = get_theme_mod('doko_features_1_icon');
                    $features_icon_2 = get_theme_mod('doko_features_2_icon');
                    $features_icon_3 = get_theme_mod('doko_features_3_icon');
                    $features_icon_4 = get_theme_mod('doko_features_4_icon');

                    $feature_icon = array($features_icon_1, $features_icon_2, $features_icon_3, $features_icon_4);

                    
                    $queries = new WP_Query( array( 'post_type' => 'page',  'order'=>'ASC', 'post__in' => array($features_1_id, $features_2_id, $features_3_id, $features_4_id )) );

                    if($queries->have_posts()) {
                    $feat_icon = 0;
                    $i = 0;
                    while($queries->have_posts()) : $queries->the_post(); 
                    $i++;
                        ?>

                        <div class="features-items featured-item-<?php echo esc_attr($i); ?>">

                            <div class="features-icon">
                              
                                <i class="fa <?php echo esc_attr($feature_icon[$feat_icon]); ?>"></i>
                            </div>
                        <?php if(get_the_title()): ?>
                            <div class="features-title">
                                <?php the_title(); ?>
                            </div>
                        <?php endif; ?>

                         <?php if(get_the_content()): ?>
                            <div class="features-content">
                                <?php echo esc_html(substr(wp_strip_all_tags(get_the_content()), 0, 120)); ?>
                            </div>
                        <?php endif; ?>

                        </div>
                   
                <?php  $feat_icon++;
                    endwhile; wp_reset_postdata();
                    } 
                ?>
               </div>     
            </div>


        </div>


    <?php
        endif;
    }
}

add_action('doko_features_frontpage_section', 'doko_features_section');

/**
*   Frontpage Testimonials section
*/

if(! function_exists('doko_testimonials_section')) {
    function doko_testimonials_section() {

        $testimonials_page_id = absint( get_theme_mod('doko_homepage_testimonials_text_setting') );
        $background_image = get_theme_mod('doko_testimonials_background_image');
        $queries = new WP_Query( array( 'post_type' => 'page', 'page_id' => $testimonials_page_id ) );

        if($background_image)
             {
               $background_image_class = 'bgimgclass'; 
             }
             else {
                $background_image_class = ' '; 
             }

        if($queries->have_posts()) {
        
        ?>
        
        <div class="testimonials-wrapper <?php echo esc_attr($background_image_class); ?>" >

        <?php if($background_image): ?>
            <div class="overlay"></div>
        <?php endif; ?>

        <div class="ak-container">
            <?php 
                if($testimonials_page_id) {

                while($queries->have_posts()) : $queries->the_post();
            ?>
            <div class="features-main-content">
                
        <?php if(get_the_title()): ?>
            <div class="title">
                <h4> <?php the_title(); ?> </h4>
            </div>
        <?php endif; ?>

        <?php if(get_the_content()): ?>
            <div class="content">
               
            <?php echo esc_html(substr(wp_strip_all_tags(get_the_content()), 0, 150)); ?>

            </div>
        <?php endif; ?>
            </div>

            <?php endwhile; wp_reset_postdata();} ?>

            <?php 
               
                $testimonials_1_id = get_theme_mod('doko_homepage_testimonials_one_settings') ;
                $testimonials_2_id = get_theme_mod('doko_homepage_testimonials_two_settings');
                $testimonials_3_id = get_theme_mod('doko_homepage_testimonials_three_settings');
                $testimonials_4_id = get_theme_mod('doko_homepage_testimonials_four_settings');
                $testimonials_5_id = get_theme_mod('doko_homepage_testimonials_five_settings');
                $testimonials_6_id = get_theme_mod('doko_homepage_testimonials_six_settings');

                $datas = array($testimonials_1_id, $testimonials_2_id, $testimonials_3_id, $testimonials_4_id, $testimonials_5_id, $testimonials_6_id); 
                
            ?>
                <div class="testimonials-section">

                    <div  class="testimonials owl-carousel owl-theme">

                    <?php 
                        foreach ($datas as $data) { 

                        if(!empty($data)) {

                        $image_id = attachment_url_to_postid($data);
                      
                        $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true);
                        $attachment_meta = doko_wp_get_attachment($image_id);

                        $doko_img = wp_get_attachment_image_src($image_id, 'doko-frontpage-testimonials-image');
                        $doko_img_src = $doko_img[0];

                    ?>
                        <div class="item">
                            <div class="content clear"> 
                                <div class="image-section">
                                    
                                    <img src="<?php echo esc_url($doko_img_src); ?>" title="<?php echo esc_attr($attachment_meta['title']); ?>" alt="<?php echo esc_attr($attachment_meta['title']); ?>" />
                                </div>


                                <div class="text"> 
                                    <p><?php echo esc_html($attachment_meta['description']); ?></p>
                                    <div class="name-holder">
                                        <span class="author"><?php echo esc_html($attachment_meta['title']); ?></span>
                                        <span class="address">
                                            <?php echo esc_html($attachment_meta['caption']); ?>
                                        </span>    
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php } }  ?> 

                    </div>
                </div> 

                

        </div>
        </div>

    <?php 
        }
    }
}

add_action('doko_testimonials_frontpage_section','doko_testimonials_section');





/**
* Frontpage works section
*/
if(! function_exists('doko_works_section')) {
    function doko_works_section() { 

        $doko_homepage_works_heading_setting = get_theme_mod('doko_homepage_works_heading_setting');
        $doko_homepage_works_text_setting = get_theme_mod('doko_homepage_works_text_setting');
        $doko_homepage_works_category = esc_attr(get_theme_mod('doko_homepage_works_category_settings'));
        $doko_works_args = array('post_type' => 'post', 'cat' => $doko_homepage_works_category, 'order' => 'DESC', 'posts_per_page' => -1);
        $doko_works_query = new WP_Query($doko_works_args);


        $background_image = esc_url( get_theme_mod('doko_works_background_image') );

        $doko_categories = get_categories(array('type' => 'post', 'parent' => $doko_homepage_works_category, 'hide_empty' => false));

        if($background_image)
             {
               $background_image_class = 'bgimgclass'; 
             }
             else {
                $background_image_class = ' '; 
             }
        ?>
        <div class="latest-works <?php echo esc_attr($background_image_class); ?>" >

        <?php if($background_image): ?>
            <div class="overlay"></div>
        <?php endif; ?>
            
        <div class="container ak-container">
            <!-- Works Filter -->
            <div class="works-post-filter clearfix">
                
                <div class="latest-works-content">
                    <?php if($doko_homepage_works_heading_setting){ ?>
                        <h2><?php echo esc_html($doko_homepage_works_heading_setting); ?></h2>
                    <?php } ?>

                    <?php if($doko_homepage_works_text_setting){ ?>
                        <?php echo esc_html($doko_homepage_works_text_setting); ?>
                    <?php } ?>
                </div>

                <?php if($doko_homepage_works_category) { ?>
                <div class="titles-port fadeInUp">
                    <div class="filter active" data-filter="*"><?php echo esc_html__('All', 'doko'); ?></div>
                    <?php foreach ($doko_categories as $doko_cat) : ?>
                        <div class="filter" data-filter=".category-<?php echo esc_attr($doko_cat->term_id); ?>"><?php echo esc_html($doko_cat->name); ?></div>
                    <?php endforeach; ?>
                </div>
                <?php } ?>
            </div>

            <?php if ($doko_works_query->have_posts() && $doko_homepage_works_category) : ?> 
                <div class="works-postse wow fadeInUp clearfix">
                    <?php $doko_count = 1; ?>
                    <?php while ($doko_works_query->have_posts()) : $doko_works_query->the_post(); ?>
                        <?php
                            $doko_cats = get_the_category();
                            $doko_cat_list = '';
                            foreach ($doko_cats as $doko_cat) :
                                if ($doko_cat->term_id != $doko_homepage_works_category) {
                                    $doko_cat_list .= 'category-' . $doko_cat->term_id . ' ';
                                }
                            endforeach;

                            
                            if($doko_count == 3){
                                $doko_image_size = 'doko-work-thumb1';
                                $doko_img_class = 'hm-work-bg-thumb1';
                                
                            } elseif($doko_count == 4){ 
                                $doko_image_size = 'doko-work-thumb2';
                                $doko_img_class = 'hm-work-sm-thumb2';
                                
                            }
                            else
                            {
                                $doko_image_size = 'doko-work-thumb';
                                $doko_img_class = 'hm-work-sm-thumb';
                            }


                            $doko_img = wp_get_attachment_image_src(get_post_thumbnail_id(), $doko_image_size);
                            $doko_img_src = $doko_img[0];

                           
                        ?>
                        <div class="works-post-wrape <?php echo esc_attr($doko_cat_list); ?> <?php echo esc_attr($doko_img_class); ?>">
                            <div class="overflow">
                                <a href="<?php the_permalink(); ?>">
                                    <figure>
                                        <?php if (has_post_thumbnail()) : ?>
                                            <img src="<?php echo esc_url($doko_img_src); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" />
                                        <?php endif; ?>

                                        <div class="hm-port-excerpt">
                                            <div class="isotope-content">

                                            <?php if(get_the_title()) : ?>
                                                <h4 class="hm-port-title" ><?php the_title(); ?></h4>
                                            <?php endif; ?>
                                                <span class="fa fa-search"></span>
                                                
                                                    <span class="button-see-more"><?php echo esc_html__('see more...', 'doko') ;?></span>
                                                
                                            </div>
                                        </div>
                                    </figure>
                                </a>
                            </div>
                        </div>
                        
                        <?php $doko_count++; ?>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        <?php endif; ?>

        </div>

    <?php
    }
}

add_action('doko_works_frontpage_section', 'doko_works_section');



/**
*   Frontpage Our Team section
*/

if(! function_exists('doko_our_team_section')) {
    function doko_our_team_section() {

         $our_team_text_title= esc_html(get_theme_mod('doko_homepage_our_team_text_title_setting'));
         $our_team_text= esc_html( get_theme_mod('doko_homepage_our_team_text_setting') );
         $background_image = esc_url( get_theme_mod('doko_our_team_background_image') );
       
            if($background_image)
             {
               $background_image_class = 'bgimgclass'; 
             }
             else {
                $background_image_class = ' '; 
             }
        
        ?>
       
        <div class="team-wrapper <?php echo esc_attr($background_image_class); ?>" >

        <?php if($background_image): ?>
            <div class="overlay"></div>
        <?php endif; ?>

        <div class="ak-container">
            <div class="our-team-main-content">
            
            <?php if($our_team_text_title) : ?>
                <div class="title">
                    <h4> <?php echo esc_html($our_team_text_title); ?> </h4>
                </div>
            <?php endif; ?>
             <?php if($our_team_text) : ?>
                <div class="content">
                     <?php echo esc_html($our_team_text); ?>
                </div>
            <?php endif; ?>
                
            </div>

            <div class="teams-sections">
                <?php 
                     
                $doko_homepage_our_team_1 = esc_attr( get_theme_mod('doko_homepage_our_team_1') );
                $doko_homepage_our_team_2 = esc_attr( get_theme_mod('doko_homepage_our_team_2') );
                $doko_homepage_our_team_3 = esc_attr( get_theme_mod('doko_homepage_our_team_3') );
               
                $data_array = array($doko_homepage_our_team_1, $doko_homepage_our_team_2, $doko_homepage_our_team_3);
               

                foreach($data_array as $val) {
                    if(!empty($val)) {

                    $image_id = attachment_url_to_postid($val);
                      
                    $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true);
                    $attachment_meta = doko_wp_get_attachment($image_id);

                    $doko_img = wp_get_attachment_image_src($image_id, 'doko-frontpage-our-team-image');
                    $doko_img_src = $doko_img[0];
                   


                ?>

                <div class="teams">
                    <?php 

                        if ($doko_img_src) : 
                    ?>     
                    
                    <div class="image">
                        <img src="<?php echo esc_url($doko_img_src); ?>" title="<?php echo esc_attr($attachment_meta['title']); ?>" alt="<?php echo esc_attr($attachment_meta['title']); ?>" />
                    </div>

                    <?php endif; ?>

                    <div class="name">
                        <h4> <a href="#"><?php echo esc_html($attachment_meta['title']); ?></a> </h4>
                        <?php echo esc_html($attachment_meta['caption']); ?>
                    </div>

                </div>

                <?php  } }  ?>

            </div>

            </div>
        </div>

    <?php 
        
        
    }
}
add_action('doko_our_team_frontpage_section', 'doko_our_team_section');


/**
* Frontpage Blog Section
*/
if(! function_exists('doko_blogs_section')) {
    function doko_blogs_section() {

        $blogs_title = get_theme_mod('doko_homepage_blog_text_title_setting');
         $blogs_text = get_theme_mod('doko_homepage_blog_text_setting');
        
        $background_image = get_theme_mod('doko_blog_background_image');

        if($background_image)
             {
               $background_image_class = 'bgimgclass'; 
             }
             else {
                $background_image_class = ' '; 
             }
        
            
        ?>
        <div class="blog-wrapper <?php echo esc_attr($background_image_class); ?>">

         <?php if($background_image): ?>
            <div class="overlay"></div>
        <?php endif; ?>

        <div class="ak-container">
            <div class="blogs-main-content">
                
                
            <?php if($blogs_title) : ?>
                <div class="title">
                    <h4> <?php echo esc_html($blogs_title); ?> </h4>
                </div>
            <?php endif; ?>
             <?php if($blogs_text) : ?>
                <div class="content">
                   
                     <?php echo esc_html($blogs_text); ?>
                </div>
            <?php endif; ?>
                
            </div> 

            <div class="blogs-sections">
                <?php 
                    $blogs_excluded_categories_id = get_theme_mod('doko_homepage_excluded_categories') ;
                    $num_of_blogs_display = esc_attr( get_theme_mod('doko_display_number_blog_post_in_homepage') );

                    if(!empty($blogs_excluded_categories_id)){
                    foreach ( $blogs_excluded_categories_id as $excluded_id )
                        {
                            $cat = get_category_by_slug( $excluded_id );
                            $cat and $category__not_in[] = $cat->term_id;
                        }

                    $queries = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $num_of_blogs_display, 'order'=>'asc', 'category__not_in' => $category__not_in ));

                    while($queries->have_posts()) : $queries->the_post();

                        $original_date = get_the_date();
                        $author_name =  get_the_author();

                ?>

                <div class="blogs">
                    <?php 
                        $doko_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'doko-frontpage-blogs-image');
                        $doko_img_src = $doko_img[0]; 

                        if ($doko_img_src) : 
                    ?>     
                    
                    <div class="image">
                        <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo esc_url($doko_img_src); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" />
                        </a>
                    </div>

                    <?php endif; ?>

                    <div class="title">
                        <h4> <a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h4>
                    </div>

                     <div class="post-attributes">
                        <?php if($original_date) { ?>
                        <span class="post-date"> <?php echo esc_html($original_date); ?> </span>
                    <?php } if($author_name) { ?>
                        <span class="post-author"> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><?php the_author(); ?></a> </span>
                    <?php } ?>
                    </div>

                    <div class="content">
                          <?php echo esc_html(substr(wp_strip_all_tags(get_the_content()), 0, 150)); ?>
                    </div>

                    <div class="Read-more">
                        <span class="read-more-button">
                            <a href="<?php the_permalink(); ?>"><?php echo esc_html__('Read More','doko'); ?></a>
                        </span>
                    </div>

                </div>

                <?php 
           
                 endwhile; wp_reset_postdata();  }?>

            </div>
        </div>    
        </div>

    <?php 
        
    }
}

add_action('doko_blogs_frontpage_section', 'doko_blogs_section');


/**
*  Frontpage Partners section
*/
if(! function_exists('doko_partners_section')) {
    function doko_partners_section() { 
        $background_image = esc_url( get_theme_mod('doko_partners_background_image'));

        if($background_image)
             {
               $background_image_class = 'bgimgclass'; 
             }
             else {
                $background_image_class = ' '; 
             }
        ?>

        <div class="partners-wrapper <?php echo esc_attr($background_image_class);?>" >

            <?php if($background_image): ?>
                <div class="overlay"></div>
            <?php endif; ?>

            <div class="ak-container">
            <div class="partners-sections">
            <?php 
                $i=0;
                $partners_1_id = get_theme_mod('doko_partners_image_one');
                $partners_2_id = get_theme_mod('doko_partners_image_two');
                $partners_3_id = get_theme_mod('doko_partners_image_three');
                $partners_4_id = get_theme_mod('doko_partners_image_four');

                $datas = array($partners_1_id, $partners_2_id, $partners_3_id, $partners_4_id);
               
              
                foreach ($datas as $data) { 
                   if(!empty($data[$i])) {
                ?>
                
                <div class="partners">
                    <img src="<?php echo esc_url($data); ?>" alt="partnfers-<?php echo esc_attr($i); ?>">
                </div>

                <?php } $i++; } ?>
            </div>
            </div>

        </div>

    <?php
    }
}
add_action('doko_partners_frontpage_section', 'doko_partners_section');





/**
*   Social Links
*/

if(! function_exists('doko_social_links')) {
    function doko_social_links() { ?>

         <div class="all-social-links">

                <?php 
                    $doko_facebook_icon = get_theme_mod('doko_facebook_icon', 'fa-facebook');
                    $doko_facebook_url = get_theme_mod('doko_facebook_url');
                    $doko_twitter_icon = get_theme_mod('doko_twitter_icon', 'fa-twitter');
                    $doko_twitter_url = get_theme_mod('doko_twitter_url');
                    $doko_linkedin_icon = get_theme_mod('doko_linkedin_icon', 'fa-linkedin');
                    $doko_linkedin_url = get_theme_mod('doko_linkedin_url');

                    $datas = array(
                            $doko_facebook_icon => $doko_facebook_url,
                            $doko_twitter_icon => $doko_twitter_url,
                            $doko_linkedin_icon => $doko_linkedin_url

                            );

                    foreach($datas as $icon => $url) {
                        
                ?>

                    <div class="social-links">
                        <a href="<?php if ($url != ''){ echo esc_url($url); } ?>" target="_blank">
                            <?php if ($url != ''){ ?>
                            <span class=" fa <?php if ($icon != ''){ echo esc_attr($icon); } ?>"> 
                            </span>
                            <?php } ?>
                        </a>
            </div>

            <?php  } ?>

        </div>

    <?php 
    }
}
add_action('doko_social_links_section', 'doko_social_links');



/**
 * All fontawesome icon list
*/
if (!function_exists('doko_icons_array')) {
    function doko_icons_array(){
       $kr_icon_list_raw = 'fa-glass, fa-music, fa-search, fa-envelope-o, fa-heart, fa-star, fa-star-o, fa-user, fa-film, fa-th-large, fa-th, fa-th-list, fa-check, fa-times, fa-search-plus, fa-search-minus, fa-power-off, fa-signal, fa-cog, fa-trash-o, fa-home, fa-file-o, fa-clock-o, fa-road, fa-download, fa-arrow-circle-o-down, fa-arrow-circle-o-up, fa-inbox, fa-play-circle-o, fa-repeat, fa-refresh, fa-list-alt, fa-lock, fa-flag, fa-headphones, fa-volume-off, fa-volume-down, fa-volume-up, fa-qrcode, fa-barcode, fa-tag, fa-tags, fa-book, fa-bookmark, fa-print, fa-camera, fa-font, fa-bold, fa-italic, fa-text-height, fa-text-width, fa-align-left, fa-align-center, fa-align-right, fa-align-justify, fa-list, fa-outdent, fa-indent, fa-video-camera, fa-picture-o, fa-pencil, fa-map-marker, fa-adjust, fa-tint, fa-pencil-square-o, fa-share-square-o, fa-check-square-o, fa-arrows, fa-step-backward, fa-fast-backward, fa-backward, fa-play, fa-pause, fa-stop, fa-forward, fa-fast-forward, fa-step-forward, fa-eject, fa-chevron-left, fa-chevron-right, fa-plus-circle, fa-minus-circle, fa-times-circle, fa-check-circle, fa-question-circle, fa-info-circle, fa-crosshairs, fa-times-circle-o, fa-check-circle-o, fa-ban, fa-arrow-left, fa-arrow-right, fa-arrow-up, fa-arrow-down, fa-share, fa-expand, fa-compress, fa-plus, fa-minus, fa-asterisk, fa-exclamation-circle, fa-gift, fa-leaf, fa-fire, fa-eye, fa-eye-slash, fa-exclamation-triangle, fa-plane, fa-calendar, fa-random, fa-comment, fa-magnet, fa-chevron-up, fa-chevron-down, fa-retweet, fa-shopping-cart, fa-folder, fa-folder-open, fa-arrows-v, fa-arrows-h, fa-bar-chart, fa-twitter-square, fa-facebook-square, fa-camera-retro, fa-key, fa-cogs, fa-comments, fa-thumbs-o-up, fa-thumbs-o-down, fa-star-half, fa-heart-o, fa-sign-out, fa-linkedin-square, fa-thumb-tack, fa-external-link, fa-sign-in, fa-trophy, fa-github-square, fa-upload, fa-lemon-o, fa-phone, fa-square-o, fa-bookmark-o, fa-phone-square, fa-twitter, fa-facebook, fa-github, fa-unlock, fa-credit-card, fa-rss, fa-hdd-o, fa-bullhorn, fa-bell, fa-certificate, fa-hand-o-right, fa-hand-o-left, fa-hand-o-up, fa-hand-o-down, fa-arrow-circle-left, fa-arrow-circle-right, fa-arrow-circle-up, fa-arrow-circle-down, fa-globe, fa-wrench, fa-tasks, fa-filter, fa-briefcase, fa-arrows-alt, fa-users, fa-link, fa-cloud, fa-flask, fa-scissors, fa-files-o, fa-paperclip, fa-floppy-o, fa-square, fa-bars, fa-list-ul, fa-list-ol, fa-strikethrough, fa-underline, fa-table, fa-magic, fa-truck, fa-pinterest, fa-pinterest-square, fa-google-plus-square, fa-google-plus, fa-money, fa-caret-down, fa-caret-up, fa-caret-left, fa-caret-right, fa-columns, fa-sort, fa-sort-desc, fa-sort-asc, fa-envelope, fa-linkedin, fa-undo, fa-gavel, fa-tachometer, fa-comment-o, fa-comments-o, fa-bolt, fa-sitemap, fa-umbrella, fa-clipboard, fa-lightbulb-o, fa-exchange, fa-cloud-download, fa-cloud-upload, fa-user-md, fa-stethoscope, fa-suitcase, fa-bell-o, fa-coffee, fa-cutlery, fa-file-text-o, fa-building-o, fa-hospital-o, fa-ambulance, fa-medkit, fa-fighter-jet, fa-beer, fa-h-square, fa-plus-square, fa-angle-double-left, fa-angle-double-right, fa-angle-double-up, fa-angle-double-down, fa-angle-left, fa-angle-right, fa-angle-up, fa-angle-down, fa-desktop, fa-laptop, fa-tablet, fa-mobile, fa-circle-o, fa-quote-left, fa-quote-right, fa-spinner, fa-circle, fa-reply, fa-github-alt, fa-folder-o, fa-folder-open-o, fa-smile-o, fa-frown-o, fa-meh-o, fa-gamepad, fa-keyboard-o, fa-flag-o, fa-flag-checkered, fa-terminal, fa-code, fa-reply-all, fa-star-half-o, fa-location-arrow, fa-crop, fa-code-fork, fa-chain-broken, fa-question, fa-info, fa-exclamation, fa-superscript, fa-subscript, fa-eraser, fa-puzzle-piece, fa-microphone, fa-microphone-slash, fa-shield, fa-calendar-o, fa-fire-extinguisher, fa-rocket, fa-maxcdn, fa-chevron-circle-left, fa-chevron-circle-right, fa-chevron-circle-up, fa-chevron-circle-down, fa-html5, fa-css3, fa-anchor, fa-unlock-alt, fa-bullseye, fa-ellipsis-h, fa-ellipsis-v, fa-rss-square, fa-play-circle, fa-ticket, fa-minus-square, fa-minus-square-o, fa-level-up, fa-level-down, fa-check-square, fa-pencil-square, fa-external-link-square, fa-share-square, fa-compass, fa-caret-square-o-down, fa-caret-square-o-up, fa-caret-square-o-right, fa-eur, fa-gbp, fa-usd, fa-inr, fa-jpy, fa-rub, fa-krw, fa-btc, fa-file, fa-file-text, fa-sort-alpha-asc, fa-sort-alpha-desc, fa-sort-amount-asc, fa-sort-amount-desc, fa-sort-numeric-asc, fa-sort-numeric-desc, fa-thumbs-up, fa-thumbs-down, fa-youtube-square, fa-youtube, fa-xing, fa-xing-square, fa-youtube-play, fa-dropbox, fa-stack-overflow, fa-instagram, fa-flickr, fa-adn, fa-bitbucket, fa-bitbucket-square, fa-tumblr, fa-tumblr-square, fa-long-arrow-down, fa-long-arrow-up, fa-long-arrow-left, fa-long-arrow-right, fa-apple, fa-windows, fa-android, fa-linux, fa-dribbble, fa-skype, fa-foursquare, fa-trello, fa-female, fa-male, fa-gratipay, fa-sun-o, fa-moon-o, fa-archive, fa-bug, fa-vk, fa-weibo, fa-renren, fa-pagelines, fa-stack-exchange, fa-arrow-circle-o-right, fa-arrow-circle-o-left, fa-caret-square-o-left, fa-dot-circle-o, fa-wheelchair, fa-vimeo-square, fa-try, fa-plus-square-o, fa-space-shuttle, fa-slack, fa-envelope-square, fa-wordpress, fa-openid, fa-university, fa-graduation-cap, fa-yahoo, fa-google, fa-reddit, fa-reddit-square, fa-stumbleupon-circle, fa-stumbleupon, fa-delicious, fa-digg, fa-pied-piper-pp, fa-pied-piper-alt, fa-drupal, fa-joomla, fa-language, fa-fax, fa-building, fa-child, fa-paw, fa-spoon, fa-cube, fa-cubes, fa-behance, fa-behance-square, fa-steam, fa-steam-square, fa-recycle, fa-car, fa-taxi, fa-tree, fa-spotify, fa-deviantart, fa-soundcloud, fa-database, fa-file-pdf-o, fa-file-word-o, fa-file-excel-o, fa-file-powerpoint-o, fa-file-image-o, fa-file-archive-o, fa-file-audio-o, fa-file-video-o, fa-file-code-o, fa-vine, fa-codepen, fa-jsfiddle, fa-life-ring, fa-circle-o-notch, fa-rebel, fa-empire, fa-git-square, fa-git, fa-hacker-news, fa-tencent-weibo, fa-qq, fa-weixin, fa-paper-plane, fa-paper-plane-o, fa-history, fa-circle-thin, fa-header, fa-paragraph, fa-sliders, fa-share-alt, fa-share-alt-square, fa-bomb, fa-futbol-o, fa-tty, fa-binoculars, fa-plug, fa-slideshare, fa-twitch, fa-yelp, fa-newspaper-o, fa-wifi, fa-calculator, fa-paypal, fa-google-wallet, fa-cc-visa, fa-cc-mastercard, fa-cc-discover, fa-cc-amex, fa-cc-paypal, fa-cc-stripe, fa-bell-slash, fa-bell-slash-o, fa-trash, fa-copyright, fa-at, fa-eyedropper, fa-paint-brush, fa-birthday-cake, fa-area-chart, fa-pie-chart, fa-line-chart, fa-lastfm, fa-lastfm-square, fa-toggle-off, fa-toggle-on, fa-bicycle, fa-bus, fa-ioxhost, fa-angellist, fa-cc, fa-ils, fa-meanpath, fa-buysellads, fa-connectdevelop, fa-dashcube, fa-forumbee, fa-leanpub, fa-sellsy, fa-shirtsinbulk, fa-simplybuilt, fa-skyatlas, fa-cart-plus, fa-cart-arrow-down, fa-diamond, fa-ship, fa-user-secret, fa-motorcycle, fa-street-view, fa-heartbeat, fa-venus, fa-mars, fa-mercury, fa-transgender, fa-transgender-alt, fa-venus-double, fa-mars-double, fa-venus-mars, fa-mars-stroke, fa-mars-stroke-v, fa-mars-stroke-h, fa-neuter, fa-genderless, fa-facebook-official, fa-pinterest-p, fa-whatsapp, fa-server, fa-user-plus, fa-user-times, fa-bed, fa-viacoin, fa-train, fa-subway, fa-medium, fa-y-combinator, fa-optin-monster, fa-opencart, fa-expeditedssl, fa-battery-full, fa-battery-three-quarters, fa-battery-half, fa-battery-quarter, fa-battery-empty, fa-mouse-pointer, fa-i-cursor, fa-object-group, fa-object-ungroup, fa-sticky-note, fa-sticky-note-o, fa-cc-jcb, fa-cc-diners-club, fa-clone, fa-balance-scale, fa-hourglass-o, fa-hourglass-start, fa-hourglass-half, fa-hourglass-end, fa-hourglass, fa-hand-rock-o, fa-hand-paper-o, fa-hand-scissors-o, fa-hand-lizard-o, fa-hand-spock-o, fa-hand-pointer-o, fa-hand-peace-o, fa-trademark, fa-registered, fa-creative-commons, fa-gg, fa-gg-circle, fa-tripadvisor, fa-odnoklassniki, fa-odnoklassniki-square, fa-get-pocket, fa-wikipedia-w, fa-safari, fa-chrome, fa-firefox, fa-opera, fa-internet-explorer, fa-television, fa-contao, fa-500px, fa-amazon, fa-calendar-plus-o, fa-calendar-minus-o, fa-calendar-times-o, fa-calendar-check-o, fa-industry, fa-map-pin, fa-map-signs, fa-map-o, fa-map, fa-commenting, fa-commenting-o, fa-houzz, fa-vimeo, fa-black-tie, fa-fonticons, fa-reddit-alien, fa-edge, fa-credit-card-alt, fa-codiepie, fa-modx, fa-fort-awesome, fa-usb, fa-product-hunt, fa-mixcloud, fa-scribd, fa-pause-circle, fa-pause-circle-o, fa-stop-circle, fa-stop-circle-o, fa-shopping-bag, fa-shopping-basket, fa-hashtag, fa-bluetooth, fa-bluetooth-b, fa-percent, fa-gitlab, fa-wpbeginner, fa-wpforms, fa-envira, fa-universal-access, fa-wheelchair-alt, fa-question-circle-o, fa-blind, fa-audio-description, fa-volume-control-phone, fa-braille, fa-assistive-listening-systems, fa-american-sign-language-interpreting, fa-deaf, fa-glide, fa-glide-g, fa-sign-language, fa-low-vision, fa-viadeo, fa-viadeo-square, fa-snapchat, fa-snapchat-ghost, fa-snapchat-square, fa-pied-piper, fa-first-order, fa-yoast, fa-themeisle, fa-google-plus-official, fa-font-awesome, fa-shopping-cart, fa-facebook, fa-twitter, fa-google-plus, fa-linkedin' ;
       $kr_icon_list = explode( ", " , $kr_icon_list_raw);
       return $kr_icon_list;
    }
}


/**
 * All fontawesome icon list for Search icons
*/
if (!function_exists('doko_icons_search_array')) {
    function doko_icons_search_array(){
       $kr_icon_list_raw = 'fa-search, fa-search-minus, fa-search-plus';

    $kr_icon_list = explode( ", " , $kr_icon_list_raw);
       return $kr_icon_list;
    }
}

/**
 * All fontawesome icon list for Basket icons
*/
if (!function_exists('doko_icons_basket_array')) {
    function doko_icons_basket_array(){
       $kr_icon_list_raw = 'fa-shopping-basket, fa-shopping-cart, fa-cart-plus, fa-cart-arrow-down ';

    $kr_icon_list = explode( ", " , $kr_icon_list_raw);
       return $kr_icon_list;
    }
}

/**
 * All fontawesome icon list for Phone icons
*/
if (!function_exists('doko_icons_phone_array')) {
    function doko_icons_phone_array(){
       $kr_icon_list_raw = 'fa-mobile-phone, fa-phone-square, fa-phone';

    $kr_icon_list = explode( ", " , $kr_icon_list_raw);
       return $kr_icon_list;
    }
}

/**
 * All fontawesome icon list for social icons
*/
if (!function_exists('doko_social_icons_array')) {
    function doko_social_icons_array(){
       $kr_icon_list_raw = 'fa-facebook-official, fa-facebook-square, fa-facebook, fa-facebook-f, fa-twitter, fa-twitter-square, fa-google-plus, fa-google-plus-circle, fa-google-plus-official, fa-google-plus-square, fa-linkedin, fa-linkedin-square';

    $kr_icon_list = explode( ", " , $kr_icon_list_raw);
       return $kr_icon_list;
    }
}


/**
 * All fontawesome icon list for Email icons
*/
if (!function_exists('doko_icons_email_array')) {
    function doko_icons_email_array(){
       $kr_icon_list_raw = 'fa-envelope, fa-envelope-o, fa-envelope-square';

    $kr_icon_list = explode( ", " , $kr_icon_list_raw);
       return $kr_icon_list;
    }
}


/**
 * Top Header Quick Contact Function Area
*/
if ( ! function_exists( 'doko_quick_contact_info_top_header' ) ) {
    function doko_quick_contact_info_top_header() { 
        $doko_phone_icon = get_theme_mod('doko_phone_icon','fa fa-phone');
        $doko_phone = get_theme_mod('doko_phone', esc_html__('+977-1-4671980', 'doko'));
        
        $doko_email_icon = get_theme_mod('doko_email_icon','fa fa-envelope');
        $doko_email = get_theme_mod('doko_email', esc_html__('support@accesspressthemes.com', 'doko'));

        ?>
        <ul>
            <?php if(!empty( $doko_phone )) { ?>              
                <li>
                    <span class="fa <?php if(!empty( $doko_phone_icon )) { echo esc_attr($doko_phone_icon); } ?>">&nbsp;</span>
                    <?php echo esc_html($doko_phone); ?>
                </li>
            <?php }  ?>
            
            <?php if(!empty( $doko_email )) { ?>              
                <li>
                    <span class="fa <?php if(!empty( $doko_email_icon )) { echo esc_attr($doko_email_icon); } ?>">&nbsp;</span>
                    <?php echo esc_html($doko_email); ?>
                </li>
            <?php }  ?> 
            
                         
        </ul>
        <?php 
    }
}
add_filter( 'doko_quick_contact_info_top_header', 'doko_quick_contact_info_top_header', 5 );

/**
 * Footer buttom menu function area
*/
if ( ! function_exists( 'doko_bottom_menu' ) ) {
    function doko_bottom_menu() { ?>       

        <div class="buttom-menu">
            <?php wp_nav_menu( array( 'theme_location' => 'buttom', 'depth' => 1 ) ); ?>
        </div><!-- .buttom-menu -->
        
        <?php
    }
}
add_filter('doko_bottom_menu', 'doko_bottom_menu', 10 );

/**
 * Footer credit function area
*/
if ( ! function_exists( 'doko_copyright' ) ) {
    function doko_copyright() { ?>       

        <div class="site-info">
            <?php $copyright = get_theme_mod( 'doko_footer_copyright' ); if( !empty( $copyright ) ) { ?>
                <?php echo apply_filters( 'doko_footer_copyright', wp_kses_post($copyright) );  ?>
            <?php }else{
                            printf(wp_kses_post('&copy; %1$s %2$s'), esc_html(date("Y")), esc_html(get_bloginfo('name')));

                } ?>
            <?php if ( apply_filters( 'doko_credit_link', true ) ) {
                printf( wp_kses( __( 'WordPress Theme : <a href="%s">Doko</a>', 'doko' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( 'https://accesspressthemes.com/wordpress-themes/doko/' ) );
            } ?>
        </div><!-- .site-info -->
                
        <?php
    }
}
add_filter('doko_copyright', 'doko_copyright', 5 );

if( ! function_exists( 'doko_menu_create' ) ) {
    function doko_menu_create() {
        ?>
        <div class="menu-create-info">
            <?php esc_html_e( 'Menu has not been set', 'doko' ); ?>
            <a href="<?php admin_url('nav-menus.php'); ?>">
                <?php esc_html_e('Set the Menu', 'doko'); ?>
            </a>
        </div>
        <?php
    }
}