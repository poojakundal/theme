<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Uncode
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-blog-post">
		<?php 
			if( has_post_thumbnail() ){
				$image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'uncode-lite-single-blog-image', true);
		?>
			<div class="blog-image">
				<img src="<?php echo esc_url( $image[0] ); ?>" alt="" class="img-responsive">
			</div>
		<?php } ?>
		<div class="blog-content">
			<div class="blog-detail-content">
				<div class="wrapper-infomation clearfix">
					<div class="wrapper-infomation dates">
						<div class="day"><?php echo esc_attr(get_the_time( 'd' )); ?></div>
						<div class="month-year">- <?php echo esc_attr(get_the_time( 'F' )); ?></div>
						<div class="year"><?php echo esc_attr(get_the_time( 'Y' )); ?></div>
					</div>
					<div class="content-text">
						<div class="author"><?php esc_html_e('Posted By :','uncode-lite'); ?> <?php the_author(); ?></div>
						<div class="comment"><i class="icon fa fa-comment"></i><span><?php comments_popup_link('No Comments', 'Comment : 1', 'Comments : %'); ?></span></div>
					</div>
				</div>
				<div class="content">
					<div class="title"><?php the_title(); ?></div>
					<div class="description">
						<?php
							the_content( sprintf(
								/* translators: %s: Name of current post. */
								wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'uncode-lite' ), array( 'span' => array( 'class' => array() ) ) ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							) );

							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'uncode-lite' ),
								'after'  => '</div>',
							) );
						?>
						<div class="tags">        
						    <?php the_tags( '<ul><li><i class="fa fa-tag"></i></li><li>', '</li><li>', '</li></ul>' ); ?>
                            <div class="category">
                                <?php echo esc_html__('Category: ','uncode-lite').wp_kses_post(get_the_category_list( )); ?>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</article><!-- #post-## -->