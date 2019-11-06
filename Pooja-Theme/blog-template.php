<?php
 /*Template Name: Blog Template
 */
 
get_header();
 ?>
 <?php
// the query
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$wpb_all_query = new WP_Query(array('post_type'=>'post', 
'post_status'=>'publish', 
'posts_per_page'=>-1,
	'posts_per_page' => 5,
'paged' => $paged
)); ?>

<div class="container">
    <div class="content-left-wrap col-9">
        <div id="primary" class="content-area">
			<div class="in">
				<p class="soul">LET'S BLOG</p>
			</div>
			<hr>
			<?php if ( $wpb_all_query->have_posts() ) : ?>

			<!-- the loop -->
			<?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
			<?php 
					if( has_post_thumbnail() ){
						$image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'uncode-lite-single-blog-image', true);
					?><?php } ?>
					<div class="blog-page">
						<a href="<?php the_permalink(); ?>">
							<div class="date-name">
								<?php echo esc_attr(get_the_time( 'd' )); ?>
								<?php echo esc_attr(get_the_time( 'F' )); ?> |
								<?php the_title(); ?>
							</div>
						</a>
						<div class="blog-content">
							<div class="blog-image">
								<img src="<?php echo esc_url( $image[0] ); ?>" alt="sorry img is not avilable" class="img-responsive">
							</div>
							<div class="auther-content">
								<div class="auther-date">
									By <?php the_author_posts_link() ?>
									On <?php echo esc_attr(get_the_time( 'd' )); ?> - <?php echo esc_attr(get_the_time( 'F' )); ?> - <?php echo esc_attr(get_the_time( 'Y' )); ?>
								</div>
								<div class="comm">
									<?php comments_popup_link('No Comments', 'Comment : 1', 'Comments : %'); ?>
								</div>
								<div class="divider-hr"></div>
								<div class="b-content">
									<?php
										$content = get_the_content(); echo mb_strimwidth($content, 0, 300, '...');
									?>
								<a href="<?php the_permalink() ?>"> (more) </a>
								</div>
							</div>
						</div>
					</div>
				
			<?php endwhile; ?></div>
			<!-- end of the loop -->
			<?php
				$total_pages = $wpb_all_query->max_num_pages;
            if ($total_pages > 1){
            ?>
			<div class="blog-pagination">
            <nav class="navigation pagination" role="navigation">
                <?php 
                   $big = 999999999; // need an unlikely integer
                   echo paginate_links( array(
                      'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                      'format' => '?paged=%#%',
                      'current' => max( 1, get_query_var('paged') ),
                      'total' => $wpb_all_query->max_num_pages
                  ) );
                }  ?>
			</nav>
			</div>
            <?php endif;
            wp_reset_postdata(); ?>

       
			<?php get_sidebar();?>
			</div>
</div>
<?php
get_footer();

           