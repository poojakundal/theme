<?php
/**
 * Header Section Function Area
**/

if ( ! function_exists( 'uncode_lite_skip_links' ) ) {
	/**
	 * Skip links
	 * @since  1.0.0
	 * @return void
	*/
	function uncode_lite_skip_links() {	?>
			<a class="skip-link screen-reader-text" href="#site-navigation"><?php esc_html_e( 'Skip to navigation', 'uncode-lite' ); ?></a>
			<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'uncode-lite' ); ?></a>
		<?php
	}
}
add_action( 'uncode_lite_header_before', 'uncode_lite_skip_links', 5 );


/**
 * Header Before Function Area
**/
if ( ! function_exists( 'uncode_lite_header_before' ) ) { 

	function uncode_lite_header_before() { ?>
		<header id="masthead" class="site-header">
		<?php
	}
}
add_action( 'uncode_lite_header_before', 'uncode_lite_header_before', 10 );


/**
 * Main Header Function Area
**/
if ( ! function_exists( 'uncode_lite_main_header' ) ) {
	function uncode_lite_main_header() { ?>
		<div class="mainheader clearfix">
			<div class="container">
				<div class="site-branding">
					<div class="logo">
					</div>
				</div><!-- .site-branding -->


				<nav id="site-navigation" class="main-navigation">
					<div class="toggle-wrap clearfix">
						<div class="nav-toggle">
				            <div class="one"></div>
				            <div class="two"></div>
				            <div class="three"></div>
				        </div>
			    	</div>
			        
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					</nav><!-- #site-navigation -->
			</div> <!--container -->
		</div>			
		<?php
	}
}
add_action( 'uncode_lite_main_header', 'uncode_lite_main_header', 15 );

/**
 * Header Main Banner Function Area
**/
if ( ! function_exists( 'uncode_lite_header_main_banner' ) ) {
	
	function uncode_lite_header_main_banner() {
		if( is_page_template('template-home.php') ) {
			
		$uncode_lite_main_title =  get_theme_mod( 'uncode_lite_main_title', esc_html__('We Are Responsive', 'uncode-lite') ) ;
		$uncode_lite_main_description =  get_theme_mod( 'uncode_lite_main_description', esc_html__('Better security happens when we work together, Get tips on further steps you can take to protect yourself online. better security happens when we work together happens', 'uncode-lite' ) ) ;

		$uncode_lite_first_button_title =  get_theme_mod( 'uncode_lite_first_button_title', esc_html__('Read More', 'uncode-lite') ) ;
		$uncode_lite_first_button_url =  get_theme_mod( 'uncode_lite_first_button_url', esc_url( home_url( '/' ) ).'#focus' ) ;
		$uncode_lite_second_button_title =  get_theme_mod( 'uncode_lite_second_button_title', esc_html__('Purchase Now', 'uncode-lite') ) ;
		$uncode_lite_second_button_url = get_theme_mod( 'uncode_lite_second_button_url', esc_url( home_url( '/' ) ).'#focus' ) ;

		?>
		<div class="main-banner" data-parallax="scroll" data-image-src="<?php echo esc_url( get_header_image() ); ?>">
			<div class="container">
				<div class="mainbanner-wrap">
					<?php if(!empty( $uncode_lite_main_title )) { ?>
						<h1><?php echo esc_attr($uncode_lite_main_title); ?></h1>
					<?php } ?>
					<?php if(!empty( $uncode_lite_main_description )) { ?>
						<div class="main-content"><?php echo esc_html($uncode_lite_main_description); ?></div>
					<?php } ?>
				</div>
				<div class="mainbanner-button-wrap">
					<?php if( !empty( $uncode_lite_first_button_title ) ) { ?>
						<div class="first-button">
							<a href="<?php echo esc_url($uncode_lite_first_button_url); ?>">
								<?php echo esc_attr($uncode_lite_first_button_title); ?>
							</a>
						</div>
					<?php } ?>
					<?php if( !empty( $uncode_lite_second_button_title ) ) { ?>
						<div class="second-button">
							<a href="<?php echo esc_url( $uncode_lite_second_button_url); ?>">
								<?php echo esc_attr($uncode_lite_second_button_title); ?>
							</a>
						</div>
					<?php } ?>
				</div>
			</div>	
		</div>
	<?php } 
	}
}
add_action( 'uncode_lite_main_banner', 'uncode_lite_header_main_banner', 30 );
/**
 * Header After Function Area
**/
if ( ! function_exists( 'uncode_lite_header_after' ) ) {
	
	function uncode_lite_header_after() { ?>
		</header>
		<?php
	}
}
add_action( 'uncode_lite_header_after', 'uncode_lite_header_after', 25 );