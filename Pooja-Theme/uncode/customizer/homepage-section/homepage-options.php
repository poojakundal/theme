<?php
/* Aobut Section */
$wp_customize->add_section( 'uncode_lite_about_section', array(
    'title'		=> esc_html__( 'About Section', 'uncode-lite' ),
    'panel'     => 'uncode-homepage-panel',
    'priority'  => 1,
) );

	$wp_customize->add_setting( 'uncode_lite_about_section_option', array(
	    'default' => 'hide',
	    'sanitize_callback' => 'uncode_lite_sanitize_switch_option',
	) );

	$wp_customize->add_control( new Uncode_Lite_Customize_Switch_Control( $wp_customize, 'uncode_lite_about_section_option',  array(
	    'type'      => 'switch',                    
	    'label'     => esc_html__( 'Enable/Disable Section', 'uncode-lite' ),
	    'section'   => 'uncode_lite_about_section',
	    'choices'   => array(
		        'show'  => esc_html__( 'Enable', 'uncode-lite' ),
		        'hide'  => esc_html__( 'Disable', 'uncode-lite' )
	        )
	) ) );

	/* AboutUs Features Image */
	$wp_customize->add_setting( 'uncode_lite_about_features_image', array(
	    'default'       =>      '',
	    'sanitize_callback' => 'esc_url_raw',  // done
	    'transport' => 'postMessage'
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'uncode_lite_about_features_image', array(
	    'section'    =>      'uncode_lite_about_section',
	    'label'      =>      esc_html__('Upload Featured Image', 'uncode-lite'),
	    'type'       =>      'image',
	) ) );
	

	/* About Section Page */
	$wp_customize->add_setting( 'uncode_lite_about_section_page', array(
		'default'           => '0',
		'sanitize_callback' => 'absint'
	) );

	$wp_customize->add_control( 'uncode_lite_about_section_page', array(
		'label'    => esc_html__( 'Select Page', 'uncode-lite' ),
		'section'  => 'uncode_lite_about_section',
		'type'     => 'dropdown-pages'
	) );
	
	$wp_customize->add_setting( 'uncode_lite_about_more_info', array( 'default' => '', 'sanitize_callback' => 'absint' ));
	$wp_customize->add_control( new Uncode_Lite_Customize_Moreinfos_Control( $wp_customize,  'uncode_lite_about_more_info',  array(
	        'type' 		=> 'uncode_lite_about_more_info',
	        'label' 	=> __('Pro version provides the Section Reorder Options', 'uncode-lite'),
	        'section' 	=> 'uncode_lite_about_section',
    ) ) );


/* Services Section */
$wp_customize->add_section( 'uncode_lite_services_section', array(
    'title'		=> esc_html__( 'Services Section', 'uncode-lite' ),
    'panel'     => 'uncode-homepage-panel',
    'priority'  => 2,
) );

	$wp_customize->add_setting( 'uncode_lite_services_section_option', array(
	    'default' => 'hide',
	    'sanitize_callback' => 'uncode_lite_sanitize_switch_option',
	) );

	$wp_customize->add_control( new Uncode_Lite_Customize_Switch_Control( $wp_customize, 'uncode_lite_services_section_option',  array(
	    'type'      => 'switch',                    
	    'label'     => esc_html__( 'Enable/Disable Section', 'uncode-lite' ),
	    'section'   => 'uncode_lite_services_section',
	    'choices'   => array(
		        'show'  => esc_html__( 'Enable', 'uncode-lite' ),
		        'hide'  => esc_html__( 'Disable', 'uncode-lite' )
	        )
	) ) );

	/* Services Section Page */
	$wp_customize->add_setting( 'uncode_lite_services_area_one', array(
		'default'           => '0',
		'sanitize_callback' => 'absint'
	) );

	$wp_customize->add_control( 'uncode_lite_services_area_one', array(
		'label'    => esc_html__( 'Select Page One', 'uncode-lite' ),
		'section'  => 'uncode_lite_services_section',
		'type'     => 'dropdown-pages'
	) );

	$wp_customize->add_setting( 'uncode_lite_services_area_two', array(
		'default'           => '0',
		'sanitize_callback' => 'absint'
	) );

	$wp_customize->add_control( 'uncode_lite_services_area_two', array(
		'label'    => esc_html__( 'Select Page Two', 'uncode-lite' ),
		'section'  => 'uncode_lite_services_section',
		'type'     => 'dropdown-pages'
	) );

	$wp_customize->add_setting( 'uncode_lite_services_area_three', array(
		'default'           => '0',
		'sanitize_callback' => 'absint'
	) );

	$wp_customize->add_control( 'uncode_lite_services_area_three', array(
		'label'    => esc_html__( 'Select Page Three', 'uncode-lite' ),
		'section'  => 'uncode_lite_services_section',
		'type'     => 'dropdown-pages'
	) );	


/* Our Features Section */
$wp_customize->add_section( 'uncode_lite_features_section', array(
    'title'		=> esc_html__( 'Our Features Section', 'uncode-lite' ),
    'panel'     => 'uncode-homepage-panel',
    'priority'  => 3,
) );

	$wp_customize->add_setting( 'uncode_lite_features_section_option', array(
	    'default' => 'hide',
	    'sanitize_callback' => 'uncode_lite_sanitize_switch_option',
	) );

	$wp_customize->add_control( new Uncode_Lite_Customize_Switch_Control( $wp_customize, 'uncode_lite_features_section_option',  array(
	    'type'      => 'switch',                    
	    'label'     => esc_html__( 'Enable/Disable Section', 'uncode-lite' ),
	    'section'   => 'uncode_lite_features_section',
	    'choices'   => array(
		        'show'  => esc_html__( 'Enable', 'uncode-lite' ),
		        'hide'  => esc_html__( 'Disable', 'uncode-lite' )
	        )
	) ) );

	/* Our Features Main Section Title */
	$wp_customize->add_setting( 'uncode_lite_features_section_main_title', array(
	    'sanitize_callback' => 'uncode_lite_text_sanitize',
	    'default' => esc_html__('Our <span>Features</span>','uncode-lite'),
	    'transport' => 'postMessage'
	) );

	$wp_customize->add_control( 'uncode_lite_features_section_main_title', array(
	    'label'    => esc_html__( 'Section Title', 'uncode-lite' ),
	    'section'  => 'uncode_lite_features_section',
	    'settings' => 'uncode_lite_features_section_main_title'
	) );

	/* Very Short Descriptions */
	$wp_customize->add_setting( 'uncode_lite_features_description', array(
	    'sanitize_callback' => 'wp_filter_nohtml_kses',
	    'transport' => 'postMessage',
	    'default' => esc_html__('Better security happens when we work together, Get tips on further steps you can take to protect yourself online.','uncode-lite'),
	) );

	$wp_customize->add_control( 'uncode_lite_features_description', array(
	    'label'    => esc_html__( 'Section Subtitle', 'uncode-lite' ),
	    'section'  => 'uncode_lite_features_section',
	    'settings' => 'uncode_lite_features_description'
	) );


    $uncode_lite_default_service_icon = array( 'flaticon-home-3', 'flaticon-binoculars', 'flaticon-like', 'flaticon-video-camera' );
    $uncode_lite_separator_label = array( 'First', 'Second', 'Third', 'Forth' );
    foreach ( $uncode_lite_default_service_icon as $icon_key => $icon_value ) { 
	    /**
	     * Our Services Section Separator
	    */
	    $wp_customize->add_setting( 'features_icon_sec_separator_'.$icon_key, array(
            'default' => '',
            'sanitize_callback' => 'uncode_lite_text_sanitize',
        ) );

	    $wp_customize->add_control( new Uncode_Lite_Customize_Section_Separator( $wp_customize,  'features_icon_sec_separator_'.$icon_key,  array(
            'type' 		=> 'uncode_lite_separator',
            /* translators: %s : icon key */
            'label' 	=> sprintf(esc_html__( '%s Features Section', 'uncode-lite' ), $uncode_lite_separator_label[$icon_key] ),
            'section' 	=> 'uncode_lite_features_section',
        ) ) );

	    /**
	     * Select Our Features Icon
	    */
   		$wp_customize->add_setting( 'features_icon_'.$icon_key, array(
        	'default' => $icon_value,
        	'sanitize_callback' => 'uncode_lite_text_sanitize',
    	) );
    	$wp_customize->add_control( new Uncode_Lite_Customize_Icons_Control( $wp_customize, 'features_icon_'.$icon_key, array(
            'type' 		=> 'uncode_lite_icons',	                
            'label' 	=> esc_html__( 'Select Features Icon', 'uncode-lite' ),
            'section' 	=> 'uncode_lite_features_section',
        ) ) );

	    /**
	     * Our Features Page in Dropdown Options
	    */
	    $wp_customize->add_setting( 'features_page_id_'.$icon_key, array(
            'default' => '0',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        ) );

	    $wp_customize->add_control( 'features_page_id_'.$icon_key, array(
        	'type' => 'dropdown-pages',
            'label' => esc_html__( 'Select Features Page', 'uncode-lite' ),            
            'section' => 'uncode_lite_features_section'
        ) );

	}


/* Our Blogs Section */
$wp_customize->add_section( 'uncode_lite_blog_section', array(
    'title'		=> esc_html__( 'Our Blog Section', 'uncode-lite' ),
    'panel'     => 'uncode-homepage-panel',
    'priority'  => 4,
) );

	$wp_customize->add_setting( 'uncode_lite_blog_section_option', array(
	    'default' => 'hide',
	    'sanitize_callback' => 'uncode_lite_sanitize_switch_option',
	) );

	$wp_customize->add_control( new Uncode_Lite_Customize_Switch_Control( $wp_customize, 'uncode_lite_blog_section_option',  array(
	    'type'      => 'switch',                    
	    'label'     => esc_html__( 'Enable/Disable Section', 'uncode-lite' ),
	    'section'   => 'uncode_lite_blog_section',
	    'choices'   => array(
		        'show'  => esc_html__( 'Enable', 'uncode-lite' ),
		        'hide'  => esc_html__( 'Disable', 'uncode-lite' )
	        )
	) ) );

	/* Our Blogs Main Section Title */
	$wp_customize->add_setting( 'uncode_lite_blog_section_main_title', array(
	    'sanitize_callback' => 'uncode_lite_text_sanitize',
	    'default' => esc_html__('Recent <span>Blog</span>','uncode-lite'),
	    'transport' => 'postMessage'
	) );

	$wp_customize->add_control( 'uncode_lite_blog_section_main_title', array(
	    'label'    => esc_html__( 'Section Title', 'uncode-lite' ),
	    'section'  => 'uncode_lite_blog_section',
	    'settings' => 'uncode_lite_blog_section_main_title'
	) );

	/* Very Short Descriptions */
	$wp_customize->add_setting( 'uncode_lite_blog_description', array(
	    'sanitize_callback' => 'wp_filter_nohtml_kses',
	    'transport' => 'postMessage',
	    'default' => esc_html__('Better security happens when we work together, Get tips on further steps you can take to protect yourself online.','uncode-lite'),
	) );

	$wp_customize->add_control( 'uncode_lite_blog_description', array(
	    'label'    => esc_html__( 'Section Subtitle', 'uncode-lite' ),
	    'section'  => 'uncode_lite_blog_section',
	    'settings' => 'uncode_lite_blog_description'
	) );

	/* Blogs Section Category */
	$wp_customize->add_setting( 'uncode_lite_blog_team_id', array(
        'default' => '0',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint'
	) );

	$wp_customize->add_control( new Uncode_Lite_Customize_Category_Control( $wp_customize, 'uncode_lite_blog_team_id', array(
	    'label' => esc_html__( 'Select Blog Section Category', 'uncode-lite' ),
	    'description' => esc_html__( 'Select cateogry for Blog Section', 'uncode-lite' ),
	    'section' => 'uncode_lite_blog_section',
	) ) );	


/* Portfolio Section */
$wp_customize->add_section( 'uncode_lite_portfolio_section', array(
    'title'		=> esc_html__( 'Portfolio Section', 'uncode-lite' ),
    'panel'     => 'uncode-homepage-panel',
    'priority'  => 5,
) );

	$wp_customize->add_setting( 'uncode_lite_portfolio_section_option', array(
	    'default' => 'hide',
	    'sanitize_callback' => 'uncode_lite_sanitize_switch_option',
	) );

	$wp_customize->add_control( new Uncode_Lite_Customize_Switch_Control( $wp_customize, 'uncode_lite_portfolio_section_option',  array(
	    'type'      => 'switch',                    
	    'label'     => esc_html__( 'Enable/Disable Section', 'uncode-lite' ),
	    'section'   => 'uncode_lite_portfolio_section',
	    'choices'   => array(
		        'show'  => esc_html__( 'Enable', 'uncode-lite' ),
		        'hide'  => esc_html__( 'Disable', 'uncode-lite' )
	        )
	) ) );

	/* Portfolio Main Section Title */
	$wp_customize->add_setting( 'uncode_lite_portfolio_section_main_title', array(
	    'sanitize_callback' => 'uncode_lite_text_sanitize',
	    'default' => esc_html__('Recent <span>Portfolio</span>','uncode-lite'),
	    'transport' => 'postMessage'
	) );

	$wp_customize->add_control( 'uncode_lite_portfolio_section_main_title', array(
	    'label'    => esc_html__( 'Section Title', 'uncode-lite' ),
	    'section'  => 'uncode_lite_portfolio_section',
	    'settings' => 'uncode_lite_portfolio_section_main_title'
	) );

	/* Very Short Descriptions */
	$wp_customize->add_setting( 'uncode_lite_portfolio_description', array(
	    'sanitize_callback' => 'wp_filter_nohtml_kses',
	    'transport' => 'postMessage',
	    'default' => esc_html__('Better security happens when we work together, Get tips on further steps you can take to protect yourself online.','uncode-lite'),
	) );

	$wp_customize->add_control( 'uncode_lite_portfolio_description', array(
	    'label'    => esc_html__( 'Section Subtitle', 'uncode-lite' ),
	    'section'  => 'uncode_lite_portfolio_section',
	    'settings' => 'uncode_lite_portfolio_description'
	) );
	

	/* Portfolio Section Category */
	$wp_customize->add_setting( 'uncode_lite_portfolio_team_id', array(
        'default' => '0',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint'
	) );

	$wp_customize->add_control( new Uncode_Lite_Customize_Category_Control( $wp_customize, 'uncode_lite_portfolio_team_id', array(
	    'label' => esc_html__( 'Select Portfolio Section Category', 'uncode-lite' ),
	    'description' => esc_html__( 'Select cateogry for Portfolio Section', 'uncode-lite' ),
	    'section' => 'uncode_lite_portfolio_section',
	) ) );



/* Call To Action Section */
$wp_customize->add_section( 'uncode_lite_call_to_action_section', array(
    'title'		=> esc_html__( 'Call To Action Section', 'uncode-lite' ),
    'panel'     => 'uncode-homepage-panel',
    'priority'  => 6,
) );

	$wp_customize->add_setting( 'uncode_lite_call_to_action_section_option', array(
	    'default' => 'hide',
	    'sanitize_callback' => 'uncode_lite_sanitize_switch_option',
	) );

	$wp_customize->add_control( new Uncode_Lite_Customize_Switch_Control( $wp_customize, 'uncode_lite_call_to_action_section_option',  array(
	    'type'      => 'switch',                    
	    'label'     => esc_html__( 'Enable/Disable Section', 'uncode-lite' ),
	    'section'   => 'uncode_lite_call_to_action_section',
	    'choices'   => array(
		        'show'  => esc_html__( 'Enable', 'uncode-lite' ),
		        'hide'  => esc_html__( 'Disable', 'uncode-lite' )
	        )
	) ) );

	/* Call To Action Main Section Title */
	$wp_customize->add_setting( 'uncode_lite_call_to_action_section_main_title', array(
	    'sanitize_callback' => 'uncode_lite_text_sanitize',
	    'default' => esc_html__('Uncode WordPress Theme','uncode-lite'),
	    'transport' => 'postMessage'
	) );

	$wp_customize->add_control( 'uncode_lite_call_to_action_section_main_title', array(
	    'label'    => esc_html__( 'Section Title', 'uncode-lite' ),
	    'section'  => 'uncode_lite_call_to_action_section',
	    'settings' => 'uncode_lite_call_to_action_section_main_title'
	) );


	/* Call To Action Very Short Description */
	$wp_customize->add_setting( 'uncode_lite_call_to_action_description', array(
	    'sanitize_callback' => 'wp_filter_nohtml_kses',
	    'default' => esc_html__('Build promptly, Launch Fast','uncode-lite'),
	    'transport' => 'postMessage'
	) );

	$wp_customize->add_control( 'uncode_lite_call_to_action_description', array(
	    'label'    => esc_html__( 'Section Subtitle', 'uncode-lite' ),
	    'section'  => 'uncode_lite_call_to_action_section',
	    'settings' => 'uncode_lite_call_to_action_description'
	) );

	/* button */
	$wp_customize->add_setting( 'uncode_lite_call_to_action_button_title', array(
	    'sanitize_callback' => 'uncode_lite_text_sanitize',
	    'default' => esc_html__('Get Start Now','uncode-lite'),
	    'transport' => 'postMessage'
	) );

	$wp_customize->add_control( 'uncode_lite_call_to_action_button_title', array(
	    'label'    => esc_html__( 'Button Text', 'uncode-lite' ),
	    'section'  => 'uncode_lite_call_to_action_section',
	    'settings' => 'uncode_lite_call_to_action_button_title'
	) );

	$wp_customize->add_setting( 'uncode_lite_call_to_action_button_url', array(
	    'sanitize_callback' => 'esc_url_raw',
	    'default' => esc_url( home_url( '/' ) ).'#focus',
	    'transport' => 'postMessage'
	) );

	$wp_customize->add_control( 'uncode_lite_call_to_action_button_url', array(
	    'label'    => esc_html__( 'Button Link', 'uncode-lite' ),
	    'section'  => 'uncode_lite_call_to_action_section',
	    'settings' => 'uncode_lite_call_to_action_button_url',
	) );


/* Our Contact Section */
$wp_customize->add_section( 'uncode_lite_contact_section', array(
    'title'		=> esc_html__( 'Our Contact Section', 'uncode-lite' ),
    'panel'     => 'uncode-homepage-panel',
    'priority'  => 7,
) );

	$wp_customize->add_setting( 'uncode_lite_contact_section_option', array(
	    'default' => 'hide',
	    'sanitize_callback' => 'uncode_lite_sanitize_switch_option',
	) );

	$wp_customize->add_control( new Uncode_Lite_Customize_Switch_Control( $wp_customize, 'uncode_lite_contact_section_option',  array(
	    'type'      => 'switch',                    
	    'label'     => esc_html__( 'Enable/Disable Section', 'uncode-lite' ),
	    'section'   => 'uncode_lite_contact_section',
	    'choices'   => array(
		        'show'  => esc_html__( 'Enable', 'uncode-lite' ),
		        'hide'  => esc_html__( 'Disable', 'uncode-lite' )
	        )
	) ) );

	/* Contact Main Section Title */
	$wp_customize->add_setting( 'uncode_lite_contact_section_main_title', array(
	    'sanitize_callback' => 'uncode_lite_text_sanitize',
	    'default' => esc_html__('Our <span>Contact</span>','uncode-lite'),
	    'transport' => 'postMessage'
	) );

	$wp_customize->add_control( 'uncode_lite_contact_section_main_title', array(
	    'label'    => esc_html__( 'Section Title', 'uncode-lite' ),
	    'section'  => 'uncode_lite_contact_section',
	    'settings' => 'uncode_lite_contact_section_main_title'
	) );

	/* Very Short Descriptions */
	$wp_customize->add_setting( 'uncode_lite_contact_description', array(
	    'sanitize_callback' => 'wp_filter_nohtml_kses',
	    'transport' => 'postMessage',
	    'default' => esc_html__('Better security happens when we work together, Get tips on further steps you can take to protect yourself online.','uncode-lite'),
	) );

	$wp_customize->add_control( 'uncode_lite_contact_description', array(
	    'label'    => esc_html__( 'Section Subtitle', 'uncode-lite' ),
	    'section'  => 'uncode_lite_contact_section',
	    'settings' => 'uncode_lite_contact_description'
	) );

	/**
	 * Quick Contact Info
	*/
	
	$wp_customize->add_setting('uncode_lite_phone_number', array(
	    'default' => esc_html__('+977-1-4671980', 'uncode-lite'),
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'uncode_lite_text_sanitize',  // done
	));
	
	$wp_customize->add_control('uncode_lite_phone_number',array(
	    'type' => 'text',
	    'label' => esc_html__('Phone Number', 'uncode-lite'),
	    'section' => 'uncode_lite_contact_section',
	    'settings' => 'uncode_lite_phone_number',
	));
	
	$wp_customize->add_setting('uncode_lite_quick_map_address', array(
	    'default' => esc_html__('Mathuri Sadan, 5th floor Ravi Bhawan, Kathmandu, Nepal', 'uncode-lite'),
	    'sanitize_callback' => 'uncode_lite_text_sanitize',  // done
	    'transport' => 'postMessage'
	));
	
	$wp_customize->add_control('uncode_lite_quick_map_address',array(
	    'type' => 'text',
	    'label' => esc_html__('Address', 'uncode-lite'),
	    'section' => 'uncode_lite_contact_section',
	    'settings' => 'uncode_lite_quick_map_address',
	));

	$wp_customize->add_setting('uncode_lite_email_title', array(
	    'default' => 'support@accesspressthemes.com',
	    'sanitize_callback' => 'uncode_lite_text_sanitize',  // done
	    'transport' => 'postMessage'
	));
	
	$wp_customize->add_control('uncode_lite_email_title',array(
	    'type' => 'text',
	    'label' => esc_html__('Email Address', 'uncode-lite'),
	    'section' => 'uncode_lite_contact_section',
	    'settings' => 'uncode_lite_email_title',
	));
	

/* Our Contact Section */
$wp_customize->add_section( 'uncode_lite_map_section', array(
    'title'		=> esc_html__( 'Google Map Section', 'uncode-lite' ),
    'panel'     => 'uncode-homepage-panel',
    'priority'  => 8,
) );

	$wp_customize->add_setting( 'uncode_lite_map_section_option', array(
	    'default' => 'hide',
	    'sanitize_callback' => 'uncode_lite_sanitize_switch_option',
	) );

	$wp_customize->add_control( new Uncode_Lite_Customize_Switch_Control( $wp_customize, 'uncode_lite_map_section_option',  array(
	    'type'      => 'switch',                    
	    'label'     => esc_html__( 'Enable/Disable Section', 'uncode-lite' ),	    
	    'section'   => 'uncode_lite_map_section',
	    'choices'   => array(
		        'show'  => esc_html__( 'Enable', 'uncode-lite' ),
		        'hide'  => esc_html__( 'Disable', 'uncode-lite' )
	        )
	) ) );

	/* Very Short Descriptions */
	$wp_customize->add_setting( 'uncode_lite_map_address', array(
		'default'           => '',
	    'sanitize_callback' => 'absint',
	) );

    $wp_customize->add_control( 'uncode_lite_map_address', array(
		'label'    => esc_html__( 'Select Page For Google Maps', 'uncode-lite' ),
		'section'  => 'uncode_lite_map_section',
		'type'     => 'dropdown-pages'
	) );