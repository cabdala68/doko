<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Doko
 */

get_header(); ?>

<div class="ak-container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main"> 

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			//endif;
			$i=0;
            $count = 1 ;
			/* Start the Loop */
			while ( have_posts() ) : the_post();

			 	$original_date = get_the_date();
                $author_name =  get_the_author();
			if($i == 0 ) { ?>
			
				<div class="feature-blog">

                    <?php 
                        $doko_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                        $doko_img_src = $doko_img[0];

                        if (has_post_thumbnail()) : 
                    ?>     
                    
					<div class="feature-image">
                        <a href="<?php the_permalink();?>">
                            <img src="<?php echo esc_url($doko_img_src); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" />
                            
                        </a>
                    </div>

                    <?php endif; ?>

                    <div class="feature-title">
                        <h4> <?php the_title(); ?> </h4>
                    </div>

                     <div class="feature-post-attributes">
                        <span class="post-date fa fa-clock-o "> <?php echo esc_html($original_date); ?> </span> |
                        <span class="post-author fa fa-pencil-square-o"> <?php echo esc_html($author_name); ?> </span>
                    </div>

                    <div class="feature-content">
                    <?php 
                    	$content = get_the_content();
                        $trimmed_content = wp_trim_words( $content, 40, ' ' );
                    ?>
                        <p> <?php echo esc_html($trimmed_content); ?> </p>
                    </div>

                    <div class="feature-Read-more">
                        <span class="read-more-button">
                            <a href="<?php the_permalink(); ?>"><?php echo esc_html__('Read More','doko'); ?></a>
                        </span>
                    </div>
				</div>

			<?php } else {
                   if ($count == 1 ) {
                    echo wp_kses_post('<div class="blogs-lists-wrapper clear">');
                }
             ?>

				<div class="blogs-lists">
					<div class="image">
                    <a href="<?php the_permalink();?>">

                        <?php
                        $blogs_lists_images = wp_get_attachment_image_src(get_post_thumbnail_id(), 'doko-blogs-lists-images');
                            $doko_img_src = $blogs_lists_images[0];

                        if ( $blogs_lists_images ) : ?>
                            <img src="<?php echo esc_url($doko_img_src); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" />
                        <?php endif; ?>

                       
                    </a>
                    </div>

                    <div class="title">
                        <h4> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> </h4>
                    </div>

                     <div class="post-attributes">
                        <span class="post-date fa fa-clock-o "> <?php echo esc_html($original_date); ?> </span>  |
                        <span class="post-author fa fa-pencil-square-o "> <?php echo esc_html($author_name); ?> </span>
                    </div>

                    <div class="content">
                    <?php 
                    	$content = get_the_content();
                        $trimmed_content = wp_trim_words( $content, 40, ' ' );
                    ?>
                        <p> <?php echo esc_html($trimmed_content); ?> </p>
                    </div>

                    <div class="Read-more">
                        <span class="read-more-button">
                            <a href="<?php the_permalink(); ?>"><?php echo esc_html__('Read More','doko'); ?></a>
                        </span>
                    </div>
				</div>
                <?php
                if(($wp_query->current_post +1) == ($wp_query->post_count))  {
                    echo wp_kses_post('</div>');
                }
                ?>

			<?php  $count++;} $i++;  endwhile; /* end loop  */
            the_posts_pagination( array(
                'mid_size' => 2,
                'prev_text' => wp_kses_post( "<i class='fa fa-long-arrow-left'></i>" ),
                'next_text' => wp_kses_post( "<i class='fa fa-long-arrow-right'></i>"),
            ));

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar();?>
	</div>

<?php

get_footer();