<?php
/**
 * Footer main Wraper Open Function
*/

if ( ! function_exists( 'uncode_lite_footer_before' ) ) { 

	function uncode_lite_footer_before() { ?>
			<footer id="colophon" class="site-footer">
				<div class="container clearfix">
		<?php
	}
}
add_action( 'uncode_lite_footer_before', 'uncode_lite_footer_before', 10 );

/**
 * Footer Area Credin & Social Finction
**/
if ( ! function_exists( 'uncode_lite_buttom_footer' ) ) {
	function uncode_lite_buttom_footer() { ?>
			<div class="footerwrap">
				<div class="footer-left">
					<div class="site-info">
			            <?php $copyright = wp_filter_nohtml_kses( get_theme_mod( 'uncode_lite_footer_copyright' )); 

			            if( !empty( $copyright ) ) { ?>
			                <?php echo apply_filters( 'uncode_lite_copyright_text', $copyright ); ?>
			            <?php } else { ?>
			                <?php echo esc_html( apply_filters( 'uncode_lite_copyright_text', $content = '&copy; ' . date_i18n(__('Y','uncode-lite')) . ' ' . get_bloginfo( 'name' ) ) ); ?>
			            <?php } 
			            echo " | ";
			            /* translators: %s : official site link */
			            printf( __( 'WordPress Theme: %s by Accesspress Themes', 'uncode-lite' ), '<a href=" ' . esc_url('https://accesspressthemes.com/wordpress-themes/uncode/') . ' " target="_blank">Uncode</a>' ); ?>
			        </div><!-- .site-info -->
				</div>
				<div class="footer-right">
					<?php apply_filters( 'uncode_lite_social', 10 ); ?>
				</div>
			</div>
		<?php
	}
}
add_action( 'uncode_lite_footer', 'uncode_lite_buttom_footer', 20 );


/**
 * Footer Main Wraper Close Function
**/
if ( ! function_exists( 'uncode_lite_footer_after' ) ) { 
	
	function uncode_lite_footer_after() { ?>
			</div>
		</footer><!-- #colophon -->
		<?php
	}
}
add_action( 'uncode_lite_footer_after', 'uncode_lite_footer_after', 30 );