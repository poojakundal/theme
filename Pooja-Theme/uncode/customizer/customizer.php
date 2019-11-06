<?php
/**
 * Uncode Lite Theme Customizer.
 *
 * @package AccessPress Themes
 * @package Uncode Lite
 */

/**
 * Load file for customizer sanitization functions
*/
require $uncode_lite_sanitize_functions_file_path = uncode_lite_file_directory('uncode/customizer/uncode-sanitize.php');


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function uncode_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

/**
 * General Settings Panel
*/
$wp_customize->add_panel( 'uncode_lite_general_settings_panel', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'General Settings', 'uncode-lite' ),
) );
	
	$wp_customize->get_section('title_tagline')->panel = 'uncode_lite_general_settings_panel';
	
	$wp_customize->get_section('colors')->panel = 'uncode_lite_general_settings_panel';
	$wp_customize->get_section('background_image')->panel = 'uncode_lite_general_settings_panel';
	$wp_customize->get_section('static_front_page')->panel = 'uncode_lite_general_settings_panel';
	$wp_customize->get_section('colors')->title = esc_html__( 'Themes Colors', 'uncode-lite' );

	/** Dynamic Color Options **/
	$wp_customize->add_setting( 'uncode_lite_tpl_color', array( 'default' => '#1c9cda', 'sanitize_callback' => 'sanitize_hex_color' ));

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'uncode_lite_tpl_color', 
		array(
			'label'      => esc_html__( 'Template Color', 'uncode-lite' ),
			'section'    => 'colors',
			'settings'   => 'uncode_lite_tpl_color',
		) ) 
	);

	/**
	 * Load Customizer Custom Control File
	*/
	require $uncode_lite_customizer_file_path = uncode_lite_file_directory('uncode/customizer/uncode-custom-controls.php');

	/*------------------------------------------------------------------------------------*/
	/**
	 * Upgrade to enlighten Pro
	*/
	// Register custom section types.
	$wp_customize->register_section_type( 'Uncode_Customize_Section_Pro' );

	// Register sections.
	$wp_customize->add_section(
	    new Uncode_Customize_Section_Pro(
	        $wp_customize,
	        'uncode-pro',
	        array(
	            'title1'    => esc_html__( 'Free vs Pro', 'uncode-lite' ),
	            'pro_text1' => esc_html__( 'Compare','uncode-lite' ),
	            'pro_url1'  => admin_url('themes.php?page=uncodelite-welcome&section=free_vs_pro'),
	            'priority' => 1,
	        )
	    )
	);

	/**
	 * Theme Info section
	 */
	$wp_customize->add_section(
	    'uncode_theme_info_section',
	    array(
	        'title'		=> esc_html__( 'Theme Info', 'uncode-lite' ),
	        'priority'  => 1,
	    )
	);
	
		/**
		 * Breadcrumb Settings Area
		*/
	    $wp_customize->add_section('uncode_lite_breadcrumb_setting', array(
	        'title'    => esc_html__('Breadcrumb Settings', 'uncode-lite'),
	        'priority' => 36,
	        'panel'    => 'uncode_lite_general_settings_panel'
	    )); 

		    $wp_customize->add_setting( 'uncode_lite_breadcrumb_options', array(
		        'default' => 'show',
		        'sanitize_callback' => 'uncode_lite_sanitize_switch_option',
		        'transport' => 'postMessage'
		    ) );

		    $wp_customize->add_control( new Uncode_Lite_Customize_Switch_Control( $wp_customize, 'uncode_lite_breadcrumb_options',  array(
		        'type'      => 'switch',                    
		        'label'     => esc_html__( 'Enable/Disable Breadcrumb Section', 'uncode-lite' ),
		        'section'   => 'uncode_lite_breadcrumb_setting',
		        'choices'   => array(
		    	        'show'  => esc_html__( 'Enable', 'uncode-lite' ),
		    	        'hide'  => esc_html__( 'Disable', 'uncode-lite' )
		            )
		    ) ) );

		    $wp_customize->add_setting('uncode_lite_breadcrumb_bg_image', array(
		        'default' =>      '',
		        'sanitize_callback' => 'esc_url_raw',
		        'transport' => 'postMessage'
		    ) );

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'uncode_lite_breadcrumb_bg_image', array(
		        'section'  => 'uncode_lite_breadcrumb_setting',
		        'label'    => esc_html__('Upload Breadcrumb Background Image', 'uncode-lite'),
		        'type'     => 'image',
		    ) ) );


		    $wp_customize->add_setting( 'uncode_lite_breadcrumb_menu', array(
		        'default' => 'show',
		        'sanitize_callback' => 'uncode_lite_sanitize_switch_option',
		        'transport' => 'postMessage'
		    ) );

		    $wp_customize->add_control( new Uncode_Lite_Customize_Switch_Control( $wp_customize, 'uncode_lite_breadcrumb_menu',  array(
		        'type'      => 'switch',                    
		        'label'     => esc_html__( 'Enable/Disable Breadcrumb Menu', 'uncode-lite' ),
		        'section'   => 'uncode_lite_breadcrumb_setting',
		        'choices'   => array(
		    	        'show'  => esc_html__( 'Enable', 'uncode-lite' ),
		    	        'hide'  => esc_html__( 'Disable', 'uncode-lite' )
		            )
		    ) ) );
	
    
    /**
     * Load header panel file
    */
    require $uncode_lite_customizer_header_options_file_path = uncode_lite_file_directory('uncode/customizer/header-section/header-options.php');

	/**
	 * Load homepage panel file
	*/
	require $uncode_lite_customizer_homepage_settings_file_path = uncode_lite_file_directory('uncode/customizer/homepage-section/homepage-settings.php');

	/**
	 * Load footer panel file
	*/
	require $uncode_lite_customizer_footer_settings_file_path = uncode_lite_file_directory('uncode/customizer/footer-section/footer-settings.php');

	/** Typography Section **/
	$uncode_lite_fontlists = array(
	    'Lato' => 'Lato',
	    'Bad Script' => 'Bad Script',
	    'Open Sans' => 'Open Sans',
	    'Open Sans Condensed' => 'Open Sans Condensed',
	    'Poppins' => 'Poppins',
	    'Raleway' => 'Raleway',
	    'Josefin Slab' => 'Josefin Slab',
	    'Abril Fatface' => 'Abril Fatface',
	    'PT Sans' => 'PT Sans',
	  );


	 /** Typography Settings **/
	 $wp_customize->add_section('uncode_lite_typography_section', array(
	      'priority' => 44,
	      'title' => esc_html__('Typography Settings', 'uncode-lite'),
	  ));

	/** Body Typography **/
	$wp_customize->add_setting( 'uncode_lite_body_font', array( 'default' => 'Open Sans', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'uncode_lite_body_font', array(
	  'settings' => 'uncode_lite_body_font',
	  'label'   => esc_html__( 'Body Font.', 'uncode-lite'),
	  'description'   => esc_html__( 'Set the font for the body.', 'uncode-lite'),
	  'section'  => 'uncode_lite_typography_section',
	  'type'    => 'select',
	  'choices' => $uncode_lite_fontlists,
	));

	/** Heading Typography **/
	$wp_customize->add_setting( 'uncode_lite_heading_font', array( 'default' => 'Open Sans', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'uncode_lite_heading_font', array(
	  'settings' => 'uncode_lite_heading_font',
	  'label'   => esc_html__( 'Heading Font.', 'uncode-lite'),
	  'description'   => esc_html__( 'Set the font for the Heading (1-6).', 'uncode-lite'),
	  'section'  => 'uncode_lite_typography_section',
	  'type'    => 'select',
	  'choices' => $uncode_lite_fontlists,
	));

	/** Section Title Typography **/
	$wp_customize->add_setting( 'uncode_lite_section_title_font', array( 'default' => 'Bad Script', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'uncode_lite_section_title_font', array(
	  'settings' => 'uncode_lite_section_title_font',
	  'label'   => esc_html__( 'Section Title Font.', 'uncode-lite'),
	  'description'   => esc_html__( 'Set the font family for Section Titles.', 'uncode-lite'),
	  'section'  => 'uncode_lite_typography_section',
	  'type'    => 'select',
	  'choices' => $uncode_lite_fontlists,
	));

	/** Menu Title Typography **/
	$wp_customize->add_setting( 'uncode_lite_menu_font', array( 'default' => 'Open Sans Condensed', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'uncode_lite_menu_font', array(
	  'settings' => 'uncode_lite_menu_font',
	  'label'   => esc_html__( 'Menu Font.', 'uncode-lite'),
	  'description'   => esc_html__( 'Set the font family for Menu.', 'uncode-lite'),
	  'section'  => 'uncode_lite_typography_section',
	  'type'    => 'select',
	  'choices' => $uncode_lite_fontlists,
	));


}
add_action( 'customize_register', 'uncode_lite_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function uncode_lite_customize_preview_js() {
	wp_enqueue_script( 'uncode_lite_customizer', get_template_directory_uri() . '/uncode/customizer/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'uncode_lite_customize_preview_js' );

/**
 * Enqueue scripts and style for customizer
*/
function uncode_lite_customize_backend_scripts() {
	wp_enqueue_style( 'uncode-lite-customizer-style', get_template_directory_uri() . '/uncode/customizer/assets/css/customizer-style.css' );
	wp_enqueue_script( 'uncode-lite-customizer-script', get_template_directory_uri() . '/uncode/customizer/assets/js/customizer-scripts.js', array( 'jquery', 'customize-controls' ), '20160714', true );
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/library/flaticon-ultimate/flaticon.css');
}
add_action( 'customize_controls_enqueue_scripts', 'uncode_lite_customize_backend_scripts', 10 );