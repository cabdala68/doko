<?php
/**
 * Template part for displaying single posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Doko
 */

?>
<?php 
$feat_img = get_theme_mod('doko_post_img_enable','yes');
$show_post = get_theme_mod('doko_post_title_enable','yes');
$metadata = get_theme_mod('doko_post_metadata_enable','yes');?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if($feat_img == 'yes'){
	         echo '<div class="feature-blog"><div class="feature-image">';
				if ( has_post_thumbnail() ) {
					    the_post_thumbnail(array(640,500));
					}
			echo '</div></div>';
		}
		if($show_post == 'yes'){
			the_title( '<h1 class="entry-title">', '</h1>' );
		}
		if($metadata == 'yes'){

		?>
		<div class="entry-meta">
			<?php doko_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php } ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'doko' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php doko_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->