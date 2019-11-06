<?php
/**
 * Main include functions ( to support child theme )
 *
 * @since Uncode Lite 1.0.0
 *
 * @param string $file_path, path from the theme
 * @return string full path of file inside theme
 *
 */
if( !function_exists('uncode_lite_file_directory') ){

    function uncode_lite_file_directory( $file_path ){
        if( file_exists( trailingslashit( get_stylesheet_directory() ) . $file_path) ) {
            return trailingslashit( get_stylesheet_directory() ) . $file_path;
        }
        else{
            return trailingslashit( get_template_directory() ) . $file_path;
        }
    }
}


/**
 * Implement the Custom Functions.
*/
require $uncode_lite_custom_functions_file_path = uncode_lite_file_directory('uncode/functions.php');

/**
 * Implement the Custom Header feature.
*/
require $uncode_lite_custom_header_file_path = uncode_lite_file_directory('uncode/core/custom-header.php');


/**
 * Custom template tags for this theme.
*/
require $uncode_lite_template_tags_file_path = uncode_lite_file_directory('uncode/core/template-tags.php');


/**
 * Custom functions that act independently of the theme templates.
*/
require $uncode_lite_extras_file_path = uncode_lite_file_directory('uncode/core/extras.php');


/**
 * Load Customizer File.
*/
require $uncode_lite_customizer_file_path = uncode_lite_file_directory('uncode/customizer/customizer.php');

/**
 * Load Jetpack compatibility file.
*/
require $uncode_lite_jetpack_file_path = uncode_lite_file_directory('uncode/core/jetpack.php');


/**
 * Implement the Custom Hooks.
*/
require $uncode_lite_custom_functions_file_path = uncode_lite_file_directory('uncode/hooks/hooks.php');

/**
 * Load Header Hooks Compatibility file.
*/
require $uncode_lite_header_file_path = uncode_lite_file_directory('uncode/hooks/header.php');

/**
 * Load Footer Hooks Compatibility file.
*/
require $uncode_lite_header_file_path = uncode_lite_file_directory('uncode/hooks/footer.php');

/**
 * Dynamic Styles
*/
require $uncode_lite_header_file_path = uncode_lite_file_directory('assets/css/dynamic-styles.php');

/**
 * Load welcome page
*/
require $uncode_lite_plugin_activation_file_path = uncode_lite_file_directory('welcome/welcome.php');