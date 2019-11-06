<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Uncode
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content content-blog">

		<?php 
			if( has_post_thumbnail() ){
			$image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'uncode-lite-blog-image', true);
		?>
			<div class="main-blog-left">
				<div class="wp-img">
					<a href="<?php the_permalink(); ?>">
						<img src="<?php echo esc_url( $image[0] ); ?>" alt="" class="img-responsive">
					</a>
				</div>
			</div>
		<?php } ?>
		<div class="main-blog-right">

		<a href="<?php the_permalink(); ?>" class="title-text"><?php the_title(); ?></a>
		
		<div class="content-text">
			<div class="comment"><i class="icon fa fa-comment"></i><span><?php comments_popup_link('No Comments', 'Comment : 1', 'Comments : %'); ?></span></div>
		</div>
			<p class="text">
				<?php echo esc_html(uncode_lite_word_count(get_the_excerpt(), 35)); ?>
			</p>
			<div class="btn-readmore">
				<a href="<?php the_permalink(); ?>">
					<?php esc_html_e('Read More','uncode-lite'); ?>
				</a>
			</div>
		</div>
		
	</div><!-- .entry-content -->

</article><!-- #post-## -->
