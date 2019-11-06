<?php
/**
 * Uncode functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Uncode
 */

if ( ! function_exists( 'uncode_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function uncode_lite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Uncode, use a find and replace
	 * to change 'uncode-lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'uncode-lite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );	
	add_image_size('uncode-lite-homeblog-image', 390, 250, true);
	add_image_size('uncode-lite-portfolio-image', 500, 345, true);
	add_image_size('uncode-lite-blog-image', 360, 270, true);
	add_image_size('uncode-lite-single-blog-image', 820, 400, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'uncode-lite' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'uncode_lite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	*/
	add_editor_style( 'assets/css/editor-style.css' );

	/**
	 * Enable support for custom logo.
	*/
	add_image_size( 'uncode-logo', 250, 75 );
	add_theme_support( 'custom-logo', array( 'size' => 'uncode-logo' ) );
}
endif;
add_action( 'after_setup_theme', 'uncode_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function uncode_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'uncode_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'uncode_lite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function uncode_lite_widgets_init() {
    register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar Widget Area', 'uncode-lite' ),
		'id'            => 'uncode-lite-right',
		'description'   => esc_html__( 'Add widgets here.', 'uncode-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	

}
add_action( 'widgets_init', 'uncode_lite_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function uncode_lite_scripts() {

	$uncode_lite_theme = wp_get_theme();
	$theme_version = $uncode_lite_theme->get( 'Version' );
	
	/**
	 * Google Fonts
	*/
	wp_enqueue_style( 'uncode-lite-googlefonts', '//fonts.googleapis.com/css?family=Raleway:300,400,600,700,900|Open+Sans:400,300,600,700,900|Poppins:300,400,500,600,700,900', array(), '1.0.0' );

	/**
	 * Font-Awesome-master
	*/
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/library/fontawesome/css/font-awesome.min.css', esc_attr( $theme_version ) );

	/**
	 * Flat Ultimate Icon Font
	*/
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/library/flaticon-ultimate/flaticon.css', esc_attr( $theme_version ) );

	/**
	 * Main style 
	*/
	wp_enqueue_style( 'uncode-lite-style', get_stylesheet_uri() );

	/**
	 * jquery start
	*/
	wp_enqueue_script('html5shiv', get_template_directory_uri() . '/assets/library/html5shiv/html5shiv.min.js', array('jquery'), esc_attr( $theme_version ), false);
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	wp_enqueue_script('respond', get_template_directory_uri() . '/assets/library/respond/respond.min.js', array('jquery'), esc_attr( $theme_version ), false);
	wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
	
	wp_enqueue_script( 'navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), esc_attr( $theme_version ), true );
	wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), esc_attr( $theme_version ), true );

	/**
	 * Parallax effect Jquery
	*/
	wp_enqueue_script('parallax', get_template_directory_uri() . '/assets/library/parallax/parallax.min.js', array('jquery'), esc_attr( $theme_version ), true);
	
	/**
	 * Uncode Custom Jquery With Localize Scripts
	*/
	wp_enqueue_script('uncode-lite-plugins', get_template_directory_uri() . '/assets/js/plugins.js', array('jquery'), esc_attr( $theme_version ), true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'uncode_lite_scripts' );

function uncode_lite_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo( 'pingback_url', 'display' )) );
	}
}
add_action( 'wp_head', 'uncode_lite_pingback_header' );

/**
 * Enqueue admin scripts and styles for customizer.
*/
if ( ! function_exists( 'uncode_lite_admin_scripts' ) ) {
	function uncode_lite_admin_scripts( ) {
		wp_enqueue_script( 'uncode-lite-customizer-script', get_template_directory_uri() . '/uncode/customizer/assets/js/customizer-scripts.js', array( 'jquery', 'customize-controls' ), '20160714', true );
		wp_enqueue_style( 'uncode-lite-customizer-style', get_template_directory_uri() . '/uncode/customizer/assets/css/customizer-style.css' );
	}
}
add_action( 'customize_controls_enqueue_scripts', 'uncode_lite_admin_scripts' );


/**
 * Load Require init file.
*/
require $uncode_lite_file_directory_init_file_path = trailingslashit( get_template_directory() ).'uncode/init.php';




require_once('portfolio-type.php');

add_filter('excerpt_length', 'my_excerpt_length');
 
function my_excerpt_length($length) {
 
    return 25; 
 
}
 
add_filter('excerpt_more', 'new_excerpt_more');  
 
function new_excerpt_more($text){  
 
    return ' ';  
 
}  
 
function portfolio_thumbnail_url($pid){
    $image_id = get_post_thumbnail_id($pid);  
    $image_url = wp_get_attachment_image_src($image_id,'screen-shot');  
    return  $image_url[0];  
}
 
?>