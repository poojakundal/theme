<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Uncode Lite
 */

get_header(); ?>

<?php do_action('uncode-lite-breadcrumb'); ?>

<div class="container clearfix">
	<div class="inner-container uncode-blog clearfix">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) : 
				
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;

				the_posts_pagination( 
            		array(
					    'prev_text' => esc_html__( 'Prev', 'uncode-lite' ),
					    'next_text' => esc_html__( 'Next', 'uncode-lite' ),
					)
	            );

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer();
