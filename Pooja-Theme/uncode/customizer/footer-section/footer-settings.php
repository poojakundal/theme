<?php
/* Adding header options panel*/
$wp_customize->add_panel( 'uncode_lite_footer_panel', array(
    'priority'       => 35,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'Footer Settings', 'uncode-lite' ),
    'description'    => esc_html__( 'Customize your awesome site footer settings', 'uncode-lite' )
) );

/**
 * Load header panel file
*/
require $uncode_lite_customizer_footer_options_file_path = uncode_lite_file_directory('uncode/customizer/footer-section/footer-options.php');