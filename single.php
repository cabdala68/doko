<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Doko
 */

get_header(); ?>


	<div class="ak-container">
	<div id="primary" class="content-area" >
		<main id="main" class="site-main">
		<?php
		while ( have_posts() ) : the_post();


			// get_template_part( 'template-parts/content', get_post_type() );
			get_template_part( 'template-parts/content', 'post');

			//the_post_navigation();
			echo '<div class="normal-wrapper">';
			echo '<div class="posts-previous">'; previous_post_link('%link', esc_html__('Previous','doko' ), TRUE); echo '</div>';
			echo '<div class="all-posts">'; echo '<a href="'.esc_url(site_url('/blog')).'">'.esc_html__('All Post', 'doko').'</a>'; echo '</div>';
			echo '<div class="posts-next">'; next_post_link( '%link', esc_html__('Next', 'doko'), TRUE ); echo '</div>';
			echo '</div>';

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar();?>
	</div>

<?php

get_footer();