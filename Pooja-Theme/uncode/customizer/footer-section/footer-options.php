<?php

/* Footer settings options */
$wp_customize->add_section( 'uncode_lite_footer_setting', array(
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'Footer Settings', 'uncode-lite' ),
    'panel'          => 'uncode_lite_footer_panel'
) );
   
    $wp_customize->add_setting('uncode_lite_footer_copyright', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'wp_kses_post',  //done
    ));

    $wp_customize->add_control('uncode_lite_footer_copyright', array(
        'type' => 'textarea',
        'label' => esc_html__('Copyright', 'uncode-lite'),
        'section' => 'uncode_lite_footer_setting',
        'settings' => 'uncode_lite_footer_copyright'
    ));

/* Footer social options */
$wp_customize->add_section( 'uncode_lite_footer_socialicon', array(
    'priority'       => 2,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'Social Icon Options', 'uncode-lite' ),
    'panel'          => 'uncode_lite_footer_panel'
) );

        /*facebook url*/
        $wp_customize->add_setting( 'uncode_lite_facebook_url', array(
            'capability'        => 'edit_theme_options',
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );

        $wp_customize->add_control( 'uncode_lite_facebook_url', array(
            'label'     => esc_html__( 'Facebook url', 'uncode-lite' ),
            'section'   => 'uncode_lite_footer_socialicon',
            'settings'  => 'uncode_lite_facebook_url',
            'type'      => 'url',
            'priority'  => 20
        ) );

        /*twitter url*/
        $wp_customize->add_setting( 'uncode_lite_twitter_url', array(
            'capability'        => 'edit_theme_options',
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );

        $wp_customize->add_control( 'uncode_lite_twitter_url', array(
            'label'     => esc_html__( 'Twitter url', 'uncode-lite' ),
            'section'   => 'uncode_lite_footer_socialicon',
            'settings'  => 'uncode_lite_twitter_url',
            'type'      => 'url',
            'priority'  => 25
        ) );

        /*google plus url*/
        $wp_customize->add_setting( 'uncode_lite_google_plus_url', array(
            'capability'        => 'edit_theme_options',
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'uncode_lite_google_plus_url', array(
            'label'     => esc_html__( 'Google Plus url', 'uncode-lite' ),
            'section'   => 'uncode_lite_footer_socialicon',
            'settings'  => 'uncode_lite_google_plus_url',
            'type'      => 'url',
            'priority'  => 25
        ) );

        /*linkedin plus url*/
        $wp_customize->add_setting( 'uncode_lite_youtube_url', array(
            'capability'        => 'edit_theme_options',
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'uncode_lite_youtube_url', array(
            'label'     => esc_html__( 'Youtube url', 'uncode-lite' ),
            'section'   => 'uncode_lite_footer_socialicon',
            'settings'  => 'uncode_lite_youtube_url',
            'type'      => 'url',
            'priority'  => 30
        ) );


        /*linkedin plus url*/
        $wp_customize->add_setting( 'uncode_lite_linkedin_url', array(
            'capability'        => 'edit_theme_options',
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'uncode_lite_linkedin_url', array(
            'label'     => esc_html__( 'Linkedin url', 'uncode-lite' ),
            'section'   => 'uncode_lite_footer_socialicon',
            'settings'  => 'uncode_lite_linkedin_url',
            'type'      => 'url',
            'priority'  => 35
        ) );