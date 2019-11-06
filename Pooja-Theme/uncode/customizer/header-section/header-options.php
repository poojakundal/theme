<?php
$wp_customize->get_section('header_image')->title = esc_html__( 'HomePage Header Banner', 'uncode-lite' );
$wp_customize->get_section('header_image')->priority = 25;

    /* Main Header Title */
    $wp_customize->add_setting( 'uncode_lite_main_title', array(
        'sanitize_callback' => 'uncode_lite_text_sanitize',
        'default' => esc_html__('We Are Responsive','uncode-lite'),
        'transport' => 'postMessage'
    ) );

    $wp_customize->add_control( 'uncode_lite_main_title', array(
        'label'    => esc_html__( 'Banner Title', 'uncode-lite' ),
        'section'  => 'header_image',
        'settings' => 'uncode_lite_main_title'
    ) );

    /* Very Short Descriptions */
    $wp_customize->add_setting( 'uncode_lite_main_description', array(
        'sanitize_callback' => 'wp_filter_nohtml_kses',
        'transport' => 'postMessage',
        'default' => esc_html__('Better security happens when we work together, Get tips on further steps you can take to protect yourself online. better security happens when we work together happens','uncode-lite'),
    ) );

    $wp_customize->add_control( 'uncode_lite_main_description', array(
        'type' => 'textarea',
        'label'    => esc_html__( 'Banner Description', 'uncode-lite' ),
        'section'  => 'header_image',
        'settings' => 'uncode_lite_main_description'
    ) );

    /* First button */
    $wp_customize->add_setting( 'uncode_lite_first_button_title', array(
        'sanitize_callback' => 'uncode_lite_text_sanitize',
        'default' => esc_html__('Read More','uncode-lite'),
        'transport' => 'postMessage'
    ) );

    $wp_customize->add_control( 'uncode_lite_first_button_title', array(
        'label'    => esc_html__( 'First button Text', 'uncode-lite' ),
        'section'  => 'header_image',
        'settings' => 'uncode_lite_first_button_title'
    ) );

    $wp_customize->add_setting( 'uncode_lite_first_button_url', array(
        'sanitize_callback' => 'esc_url_raw',
        'default' => esc_url( home_url( '/' ) ).'#focus',
        'transport' => 'postMessage'
    ) );

    $wp_customize->add_control( 'uncode_lite_first_button_url', array(
        'label'    => esc_html__( 'First button link', 'uncode-lite' ),
        'section'  => 'header_image',
        'settingsd' => 'uncode_lite_first_button_url',
    ) );

    /* Second button */
    $wp_customize->add_setting( 'uncode_lite_second_button_title', array(
        'sanitize_callback' => 'uncode_lite_text_sanitize',
        'default' => esc_html__('Purchase Now','uncode-lite'),
        'transport' => 'postMessage'
    ) );

    $wp_customize->add_control( 'uncode_lite_second_button_title', array(
        'label'    => esc_html__( 'Second button Text', 'uncode-lite' ),
        'section'  => 'header_image',
        'settings' => 'uncode_lite_second_button_title'
    ) );

    $wp_customize->add_setting( 'uncode_lite_second_button_url', array(
        'sanitize_callback' => 'esc_url_raw',
        'default' => esc_url( home_url( '/' ) ).'#focus',
        'transport' => 'postMessage'
    ) );

    $wp_customize->add_control( 'uncode_lite_second_button_url', array(
        'label'    => esc_html__( 'Second button link', 'uncode-lite' ),
        'section'  => 'header_image',
        'settingsd' => 'uncode_lite_second_button_url',
    ) );