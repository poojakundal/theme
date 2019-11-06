<?php
/* Adding homepage options panel*/
$wp_customize->add_panel( 'uncode-homepage-panel', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'HomePage Settings', 'uncode-lite' ),
    'description'    => esc_html__( 'Customize your awesome site homepage settings', 'uncode-lite' )
) );

/**
 * Load header panel file
*/
require $uncode_lite_customizer_homepage_options_file_path = uncode_lite_file_directory('uncode/customizer/homepage-section/homepage-options.php');