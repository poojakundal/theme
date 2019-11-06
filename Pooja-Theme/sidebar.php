<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Uncode
 */

$post_sidebar = esc_attr(get_post_meta($post->ID, 'uncode_lite_page_layouts', true));

if(empty($post_sidebar)){
	$post_sidebar = 'rightsidebar';
}

if ( $post_sidebar ==  'nosidebar' ) {
	return;
}


if( $post_sidebar == 'rightsidebar' || $post_sidebar == 'bothsidebar'  && is_active_sidebar('uncode-lite-right')){
	?>
		<aside id="secondaryright" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'uncode-lite-right' ); ?>
		</aside><!-- #secondary -->
	<?php
}

if( $post_sidebar == 'leftsidebar' || $post_sidebar == 'bothsidebar'  && is_active_sidebar('uncode-lite-right')){
	?>
		<aside id="secondaryleft" class="widget-area right" role="complementary">
			<?php dynamic_sidebar( 'uncode-lite-left' ); ?>
		</aside><!-- #secondary -->
	<?php
}