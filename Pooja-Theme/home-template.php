<?php
/**
 * Template Name: Home Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
get_header(); ?>

		<div id ="outer-div" width="100%">
			 <?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
			
					the_post_thumbnail('full');}
			} ?>
				<p class="info">
					Gearing up the ideas
				<P><br/>
				<p class="short_info">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ut enim ad minim veniam. 
				</p>
		</div>
		<div class="short">
			<div class="advertising">
				<div class="adv_pic"></div>
				<div class="hedding">Advertising</div>
				<div class="infor">Neque porror quisquam est, dolorem ipusum qula doror amet..</div>
			</div>
			<div class="multimedia">
				<div class="mul_pic"></div>
				<div class="hedding">Multimedia</div>
				<div class="infor">Neque porror quisquam est, dolorem ipusum qula doror amet..</div>
			</div>
			<div class="photography">
				<div class="ph_pic"></div>
				<div class="hedding">Photography</div>
				<div class="infor">Neque porror quisquam est, dolorem ipusum qula doror amet..</div>
			</div>
		</div>
				<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$mypost = array( 
						'post_type' => 'portfolio',
						'numberposts' => -1,
						'posts_per_page' => 9,
						'paged' => $paged
					);
					$loop = new WP_Query( $mypost );
				?>
			<div class="design">
				<div id="portfolio" class="group"> 
					<div class="in">
						<p class="soul">D'SIGN IS THE SOUL</p>
						<button class="viewall"><a href="<?php echo site_url('portfolio1'); ?>"> View All</a></button>
					</div>
					<hr class="border">
					<?php if ($loop->have_posts()) : ?>
						<?php while ( $loop->have_posts() ) : $loop->the_post();?>
							<?php
								$title= str_ireplace('"', '', trim(get_the_title()));
								$desc= str_ireplace('"', '', trim(get_the_content()));
							?>   
						
							<div class="item">
							<?php add_thickbox(); ?>
								<div class="img">
										<?php the_post_thumbnail(); ?>
								</div>
							</div>
							
						<?php 
							endwhile;
						endif;
						?>
				</div>
				
			</div>
		<div class="footer_info">
		<?php get_footer(); ?>
	
