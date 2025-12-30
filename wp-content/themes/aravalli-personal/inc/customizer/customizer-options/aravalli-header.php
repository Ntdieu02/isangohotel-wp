<?php
function aravalli_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'aravalli-pro'),
		) 
	);
	
	/*=========================================
	Aravalli Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','aravalli-pro'),
			'panel'  		=> 'header_section',
		)
    );

	// Logo Width // 
	if ( class_exists( 'Aravalli_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'logo_width',
			array(
				'default'			=> '140',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'aravalli_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Aravalli_Customizer_Range_Control( $wp_customize, 'logo_width', 
			array(
				'label'      => __( 'Logo Width', 'aravalli-pro' ),
				'section'  => 'title_tagline',
				 'media_query'   => true,
					'input_attr'    => array(
						'mobile'  => array(
							'min'           => 0,
							'max'           => 500,
							'step'          => 1,
							'default_value' => 140,
						),
						'tablet'  => array(
							'min'           => 0,
							'max'           => 500,
							'step'          => 1,
							'default_value' => 140,
						),
						'desktop' => array(
							'min'           => 0,
							'max'           => 500,
							'step'          => 1,
							'default_value' => 140,
						),
					),
			) ) 
		);
	}
	
	// Typography
	$wp_customize->add_setting(
		'logo_typography'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'logo_typography',
		array(
			'type' => 'hidden',
			'label' => __('Typography','aravalli-pro'),
			'section' => 'title_tagline',
			'priority' => 100,
		)
	);
	
	// Site Title Font Size// 
	if ( class_exists( 'Aravalli_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'site_ttl_size',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'aravalli_sanitize_range_value',
				'transport'         => 'postMessage'
			)
		);
		$wp_customize->add_control( 
		new Aravalli_Customizer_Range_Control( $wp_customize, 'site_ttl_size', 
			array(
				'label'      => __( 'Site Title Font Size', 'aravalli-pro' ),
				'section'  => 'title_tagline',
				'priority' => 101,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 30,
                    ),
                    'tablet'  => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 30,
                    ),
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 30,
                    ),
                ),
			) ) 
		);

	// Site Description Font Size// 	
		$wp_customize->add_setting(
			'site_desc_size',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'aravalli_sanitize_range_value',
				'transport'         => 'postMessage'
			)
		);
		$wp_customize->add_control( 
		new Aravalli_Customizer_Range_Control( $wp_customize, 'site_desc_size', 
			array(
				'label'      => __( 'Site Description Font Size', 'aravalli-pro' ),
				'section'  => 'title_tagline',
				'priority' => 102,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 12,
                    ),
                    'tablet'  => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 12,
                    ),
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 12,
                    ),
                ),
			) ) 
		);
	}

	/*=========================================
	Aravalli Header Types
	=========================================*/
	$wp_customize->add_section(
        'header_type',
        array(
        	'priority'      => 2,
            'title' 		=> __('Header Type','aravalli-pro'),
			'panel'  		=> 'header_section',
		)
    );
	
	$wp_customize->add_setting( 
		'aravalli_header_type' , 
			array(
			'default' => 'header-default',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
		) 
	);

	$wp_customize->add_control(
	'aravalli_header_type' , 
		array(
			'label'          => __( 'Header Type', 'avril-pro' ),
			'section'        => 'header_type',
			'type'           => 'select',
			'choices'        => 
			array(
				'header-default'      			=> __( 'Header 1', 'aravalli-pro' ),
				'header-transparent' 			=> __( 'Header 2', 'aravalli-pro' ),
			) 
		) 
	);
	
	/*=========================================
	Above Header Section
	=========================================*/
	$wp_customize->add_section(
        'above_header',
        array(
        	'priority'      => 2,
            'title' 		=> __('Above Header','aravalli-pro'),
			'panel'  		=> 'header_section',
		)
    );
	
	if ( class_exists( 'Aravalli_Customize_Control_Radio_Image' ) ) {

		$wp_customize->add_setting(
			'header_above_layout', array(
				'sanitize_callback' => 'aravalli_sanitize_text',
				'default' => 'layout-2',
			)
		);

		$wp_customize->add_control(
			new Aravalli_Customize_Control_Radio_Image(
				$wp_customize, 'header_above_layout', array(
					'label'     => esc_html__( 'Layout', 'aravalli-pro' ),
					'section'   => 'above_header',
					'priority'  => 2,
					'choices'   => array(
						'disable' => array(
							'url' => apply_filters( 'disable', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/none.svg' ),
						),
						'layout-1' => array(
							'url' => apply_filters( 'layout-1', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' ),
						),
						'layout-2' => array(
							'url' => apply_filters( 'layout-2', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/layout-center.svg' ),
						),
					),
				)
			)
		);
	}

	$wp_customize->add_setting( 
		'above_header_first' , 
			array(
			'default' => 'default',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_select',
		) 
	);

	$wp_customize->add_control(
	'above_header_first' , 
		array(
			'label'          => __( 'Section 1', 'aravalli-pro' ),
			'section'        => 'above_header',
			'type'           => 'select',
			'choices'        => 
			array(
				''       => __( 'None', 'aravalli-pro' ),
				'default' => __( 'Default', 'aravalli-pro' ),
				'widget' => __( 'Widget', 'aravalli-pro' ),
				'menu'   => __( 'Header Menu', 'aravalli-pro' ),
				'shortcode'   => __( 'Shortcode', 'aravalli-pro' ),
			) 
		) 
	);
	
	
	// Mobile
	$wp_customize->add_setting(
		'hdr_top_mobile'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'hdr_top_mobile',
		array(
			'type' => 'hidden',
			'label' => __('Phone','aravalli-pro'),
			'section' => 'above_header',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_phone_details' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'transport'         => $selective_refresh,
			'priority' => 4,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_phone_details', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'aravalli-pro' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);	
	
	// icon // 
	$wp_customize->add_setting(
    	'tlh_phone_icon',
    	array(
	        'default' => 'fa-mobile-phone',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
			'priority' => 4,
		)
	);	

	$wp_customize->add_control(new Aravalli_Icon_Picker_Control($wp_customize, 
		'tlh_phone_icon',
		array(
		    'label'   		=> __('Icon','aravalli-pro'),
		    'section' 		=> 'above_header',
			'iconset' => 'fa',
			
		))  
	);		
	// Mobile title // 
	$wp_customize->add_setting(
    	'tlh_phone_title',
    	array(
	        'default'			=> __('+1514-2861-23','aravalli-pro'),
			'sanitize_callback' => 'aravalli_sanitize_text',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
			'priority' => 5,
		)
	);	

	$wp_customize->add_control( 
		'tlh_phone_title',
		array(
		    'label'   		=> __('Title','aravalli-pro'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	// Email
	$wp_customize->add_setting(
		'hdr_top_email'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 5,
		)
	);

	$wp_customize->add_control(
	'hdr_top_email',
		array(
			'type' => 'hidden',
			'label' => __('Email','aravalli-pro'),
			'section' => 'above_header',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_email_details' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'transport'         => $selective_refresh,
			'priority' => 6,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_email_details', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'aravalli-pro' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);	
	
	// icon // 
	$wp_customize->add_setting(
    	'tlh_email_icon',
    	array(
	        'default' => 'fa-envelope-o',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
			'priority' => 6,
		)
	);	

	$wp_customize->add_control(new Aravalli_Icon_Picker_Control($wp_customize, 
		'tlh_email_icon',
		array(
		    'label'   		=> __('Icon','aravalli-pro'),
		    'section' 		=> 'above_header',
			'iconset' => 'fa',
			
		))  
	);	
	// Mobile title // 
	$wp_customize->add_setting(
    	'tlh_email_title',
    	array(
	        'default'			=> __('email@companyname.com','aravalli-pro'),
			'sanitize_callback' => 'aravalli_sanitize_text',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 7,
		)
	);	

	$wp_customize->add_control( 
		'tlh_email_title',
		array(
		    'label'   		=> __('Title','aravalli-pro'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	// Header first Shortcode // 
	$wp_customize->add_setting(
    	'abv_hdr_first_shortcode',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
		)
	);	

	$wp_customize->add_control( 
		'abv_hdr_first_shortcode',
		array(
		    'label'   		=> __('Section 1 Shortcode','aravalli-pro'),
		    'section'		=> 'above_header',
			'type' 			=> 'textarea',
			'transport'         => $selective_refresh,
		)  
	);	
	
	$wp_customize->add_setting( 
		'above_header_second' , 
			array(
			'default' =>'default',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_select',
		) 
	);

	$wp_customize->add_control(
	'above_header_second' , 
		array(
			'label'          => __( 'Section 2', 'aravalli-pro' ),
			'section'        => 'above_header',
			'type'           => 'select',
			'choices'        => 
			array(
				''       => __( 'None', 'aravalli-pro' ),
				'default' => __( 'Default', 'aravalli-pro' ),
				'widget' => __( 'Widget', 'aravalli-pro' ),
				'menu'   => __( 'Header Menu', 'aravalli-pro' ),
				'shortcode'   => __( 'Shortcode', 'aravalli-pro' ),
			) 
		) 
	);
	
	
	$wp_customize->add_setting( 
		'hide_show_social_icon' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'transport'         => $selective_refresh,
			'priority' => 7,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_social_icon', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'aravalli-pro' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);
	
	/**
	 * Customizer Repeater
	 */
		$wp_customize->add_setting( 'social_icons', 
			array(
			 'sanitize_callback' => 'aravalli_repeater_sanitize',
			 'priority' => 8,
			 'default' => aravalli_get_social_icon_default()
		)
		);
		
		$wp_customize->add_control( 
			new ARAVALLI_Repeater( $wp_customize, 
				'social_icons', 
					array(
						'label'   => esc_html__('Social Icons','aravalli-pro'),
						'section' => 'above_header',
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
			
	// Header Second Shortcode // 
	$wp_customize->add_setting(
    	'abv_hdr_second_shortcode',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
		)
	);	

	$wp_customize->add_control( 
		'abv_hdr_second_shortcode',
		array(
		    'label'   		=> __('Section 2 Shortcode','aravalli-pro'),
		    'section'		=> 'above_header',
			'type' 			=> 'textarea',
			'transport'         => $selective_refresh,
		)  
	);	
	
	
	/*=========================================
	Header Navigation
	=========================================*/	
	$wp_customize->add_section(
        'header_navigation',
        array(
        	'priority'      => 4,
            'title' 		=> __('Header Navigation','aravalli-pro'),
			'panel'  		=> 'header_section',
		)
    );
	
	
	// Info Left
	$wp_customize->add_setting(
		'hdr_nav_info_left'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'hdr_nav_info_left',
		array(
			'type' => 'hidden',
			'label' => __('Info Left','aravalli-pro'),
			'section' => 'header_navigation',
		)
	);
	$wp_customize->add_setting( 
		'hs_nav_info_left' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hs_nav_info_left', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'aravalli-pro' ),
			'section'     => 'header_navigation',
			'type'        => 'checkbox'
		) 
	);	
	
	// icon // 
	$wp_customize->add_setting(
    	'nav_info_left_icon',
    	array(
	        'default' => 'fa-clock-o',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
			'priority' => 3,
		)
	);	

	$wp_customize->add_control(new Aravalli_Icon_Picker_Control($wp_customize, 
		'nav_info_left_icon',
		array(
		    'label'   		=> __('Icon','aravalli-pro'),
		    'section' 		=> 'header_navigation',
			'iconset' => 'fa',
			
		))  
	);	
	// title // 
	$wp_customize->add_setting(
    	'nav_info_left_ttl',
    	array(
	        'default'			=> __('We Are Open','aravalli-pro'),
			'sanitize_callback' => 'aravalli_sanitize_text',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	

	$wp_customize->add_control( 
		'nav_info_left_ttl',
		array(
		    'label'   		=> __('Title','aravalli-pro'),
		    'section' 		=> 'header_navigation',
			'type'		 =>	'text'
		)  
	);
	
	
	// subtitle // 
	$wp_customize->add_setting(
    	'nav_info_left_subttl',
    	array(
	        'default'			=> __('Mon - Fri 8:00 - 16:00','aravalli-pro'),
			'sanitize_callback' => 'aravalli_sanitize_text',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 5,
		)
	);	

	$wp_customize->add_control( 
		'nav_info_left_subttl',
		array(
		    'label'   		=> __('Subtitle','aravalli-pro'),
		    'section' 		=> 'header_navigation',
			'type'		 =>	'text'
		)  
	);
	
	
	
	
	// Info Right
	$wp_customize->add_setting(
		'hdr_nav_info_right'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 6,
		)
	);

	$wp_customize->add_control(
	'hdr_nav_info_right',
		array(
			'type' => 'hidden',
			'label' => __('Info Right','aravalli-pro'),
			'section' => 'header_navigation',
		)
	);
	$wp_customize->add_setting( 
		'hs_nav_info_right' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'priority' => 7,
		) 
	);
	
	$wp_customize->add_control(
	'hs_nav_info_right', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'aravalli-pro' ),
			'section'     => 'header_navigation',
			'type'        => 'checkbox'
		) 
	);	
	
	// icon // 
	$wp_customize->add_setting(
    	'nav_info_right_icon',
    	array(
	        'default' => 'fa-clock-o',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
			'priority' => 8,
		)
	);	

	$wp_customize->add_control(new Aravalli_Icon_Picker_Control($wp_customize, 
		'nav_info_right_icon',
		array(
		    'label'   		=> __('Icon','aravalli-pro'),
		    'section' 		=> 'header_navigation',
			'iconset' => 'fa',
			
		))  
	);	
	// title // 
	$wp_customize->add_setting(
    	'nav_info_right_ttl',
    	array(
	        'default'			=> __('Our Location','aravalli-pro'),
			'sanitize_callback' => 'aravalli_sanitize_text',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 9,
		)
	);	

	$wp_customize->add_control( 
		'nav_info_right_ttl',
		array(
		    'label'   		=> __('Title','aravalli-pro'),
		    'section' 		=> 'header_navigation',
			'type'		 =>	'text'
		)  
	);
	
	
	// subtitle // 
	$wp_customize->add_setting(
    	'nav_info_right_subttl',
    	array(
	        'default'			=> __('24 St, Angeles, US','aravalli-pro'),
			'sanitize_callback' => 'aravalli_sanitize_text',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 10,
		)
	);	

	$wp_customize->add_control( 
		'nav_info_right_subttl',
		array(
		    'label'   		=> __('Subtitle','aravalli-pro'),
		    'section' 		=> 'header_navigation',
			'type'		 =>	'text'
		)  
	);
	
	// Search
	$wp_customize->add_setting(
		'hdr_nav_search'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 11,
		)
	);

	$wp_customize->add_control(
	'hdr_nav_search',
		array(
			'type' => 'hidden',
			'label' => __('Search','aravalli-pro'),
			'section' => 'header_navigation',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_search' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'priority' => 12,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_search', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'aravalli-pro' ),
			'section'     => 'header_navigation',
			'type'        => 'checkbox'
		) 
	);	
	
	// Cart
	$wp_customize->add_setting(
		'hdr_nav_cart'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 13,
		)
	);

	$wp_customize->add_control(
	'hdr_nav_cart',
		array(
			'type' => 'hidden',
			'label' => __('Cart','aravalli-pro'),
			'section' => 'header_navigation',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_cart' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'priority' => 14,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_cart', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'aravalli-pro' ),
			'section'     => 'header_navigation',
			'type'        => 'checkbox'
		) 
	);	
	
	// Button
	$wp_customize->add_setting(
		'hdr_nav_btn'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 15,
		)
	);

	$wp_customize->add_control(
	'hdr_nav_btn',
		array(
			'type' => 'hidden',
			'label' => __('Button','aravalli-pro'),
			'section' => 'header_navigation',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_nav_btn' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'transport'         => $selective_refresh,
			'priority' => 16,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_nav_btn', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'aravalli-pro' ),
			'section'     => 'header_navigation',
			'type'        => 'checkbox'
		) 
	);	
	
	// Button Label // 
	$wp_customize->add_setting(
    	'nav_btn_lbl',
    	array(
	        'default'			=> __('Buy Now','aravalli-pro'),
			'sanitize_callback' => 'aravalli_sanitize_text',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 17,
		)
	);	

	$wp_customize->add_control( 
		'nav_btn_lbl',
		array(
		    'label'   		=> __('Button Label','aravalli-pro'),
		    'section' 		=> 'header_navigation',
			'type'		 =>	'text'
		)  
	);
	
	// Button Link // 
	$wp_customize->add_setting(
    	'nav_btn_link',
    	array(
	        'default'			=> __('#','aravalli-pro'),
			'sanitize_callback' => 'aravalli_sanitize_url',
			'capability' => 'edit_theme_options',
			'priority' => 18,
		)
	);	

	$wp_customize->add_control( 
		'nav_btn_link',
		array(
		    'label'   		=> __('Button Link','aravalli-pro'),
		    'section' 		=> 'header_navigation',
			'type'		 =>	'text'
		)  
	);
	
	// icon // 
	// $wp_customize->add_setting(
    	// 'nav_btn_icon',
    	// array(
	        // 'default' => 'fa-shopping-basket',
			// 'sanitize_callback' => 'sanitize_text_field',
			// 'capability' => 'edit_theme_options',
		// )
	// );	

	// $wp_customize->add_control(new Aravalli_Icon_Picker_Control($wp_customize, 
		// 'nav_btn_icon',
		// array(
		    // 'label'   		=> __('Icon','aravalli-pro'),
		    // 'section' 		=> 'header_navigation',
			// 'iconset' => 'fa',
			
		// ))  
	// );	
	
	/*=========================================
	Sticky Header
	=========================================*/	
	$wp_customize->add_section(
        'sticky_header_set',
        array(
        	'priority'      => 4,
            'title' 		=> __('Sticky Header','aravalli-pro'),
			'panel'  		=> 'header_section',
		)
    );
	
	// Heading
	$wp_customize->add_setting(
		'sticky_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'sticky_head',
		array(
			'type' => 'hidden',
			'label' => __('Sticky Header','aravalli-pro'),
			'section' => 'sticky_header_set',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_sticky' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_sticky', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'aravalli-pro' ),
			'section'     => 'sticky_header_set',
			'type'        => 'checkbox'
		) 
	);	
}
add_action( 'customize_register', 'aravalli_header_settings' );

// Header selective refresh
function aravalli_header_partials( $wp_customize ){

	// hide show Social
	$wp_customize->selective_refresh->add_partial(
		'hide_show_social_icon', array(
			'selector' => '#above-header .widget-social',
			'container_inclusive' => true,
			'render_callback' => 'header_top_right',
			'fallback_refresh' => true,
		)
	);
	// hide_show_phone_details
	$wp_customize->selective_refresh->add_partial(
		'hide_show_phone_details', array(
			'selector' => '.header-top-info .phone',
			'container_inclusive' => true,
			'render_callback' => 'header_top_right',
			'fallback_refresh' => true,
		)
	);
	// hide_show_email_details
	$wp_customize->selective_refresh->add_partial(
		'hide_show_email_details', array(
			'selector' => '.header-top-info .email',
			'container_inclusive' => true,
			'render_callback' => 'header_top_right',
			'fallback_refresh' => true,
		)
	);
	
	// hide_show_nav_btn
	$wp_customize->selective_refresh->add_partial(
		'hide_show_nav_btn', array(
			'selector' => '.navbar-area li.header-btn',
			'container_inclusive' => true,
			'render_callback' => 'header_navigation',
			'fallback_refresh' => true,
		)
	);	
	
	// tlh_email_title
	$wp_customize->selective_refresh->add_partial( 'tlh_email_title', array(
		'selector'            => '.header-top-info .email span',
		'settings'            => 'tlh_email_title',
		'render_callback'  => 'aravalli_tlh_email_title_render_callback',
	) );
	
	
	// tlh_phone_title
	$wp_customize->selective_refresh->add_partial( 'tlh_phone_title', array(
		'selector'            => '.header-top-info .phone span',
		'settings'            => 'tlh_phone_title',
		'render_callback'  => 'aravalli_tlh_phone_title_render_callback',
	) );
	
	// nav_info_left_ttl
	$wp_customize->selective_refresh->add_partial( 'nav_info_left_ttl', array(
		'selector'            => '.header-widget-info .header-info.left h6',
		'settings'            => 'nav_info_left_ttl',
		'render_callback'  => 'aravalli_nav_info_left_ttl_render_callback',
	) );
	
	// nav_info_left_subttl
	$wp_customize->selective_refresh->add_partial( 'nav_info_left_subttl', array(
		'selector'            => '.header-widget-info .header-info.left .info-sub-title',
		'settings'            => 'nav_info_left_subttl',
		'render_callback'  => 'aravalli_nav_info_left_subttl_render_callback',
	) );
	
	
	// nav_info_right_ttl
	$wp_customize->selective_refresh->add_partial( 'nav_info_right_ttl', array(
		'selector'            => '.header-widget-info .header-info.right h6',
		'settings'            => 'nav_info_right_ttl',
		'render_callback'  => 'aravalli_nav_info_right_ttl_render_callback',
	) );
	
	// nav_info_right_subttl
	$wp_customize->selective_refresh->add_partial( 'nav_info_right_subttl', array(
		'selector'            => '.header-widget-info .header-info.right .info-sub-title',
		'settings'            => 'nav_info_right_subttl',
		'render_callback'  => 'aravalli_nav_info_right_subttl_render_callback',
	) );
	
	// nav_btn_lbl
	$wp_customize->selective_refresh->add_partial( 'nav_btn_lbl', array(
		'selector'            => '.menu-item .bt-primary',
		'settings'            => 'nav_btn_lbl',
		'render_callback'  => 'aravalli_nav_btn_lbl_render_callback',
	) );
	
	}

add_action( 'customize_register', 'aravalli_header_partials' );


// tlh_email_title
function aravalli_tlh_email_title_render_callback() {
	return get_theme_mod( 'tlh_email_title' );
}

// tlh_phone_title
function aravalli_tlh_phone_title_render_callback() {
	return get_theme_mod( 'tlh_phone_title' );
}


// nav_info_left_ttl
function aravalli_nav_info_left_ttl_render_callback() {
	return get_theme_mod( 'nav_info_left_ttl' );
}

// nav_info_left_subttl
function aravalli_nav_info_left_subttl_render_callback() {
	return get_theme_mod( 'nav_info_left_subttl' );
}


// nav_info_right_ttl
function aravalli_nav_info_right_ttl_render_callback() {
	return get_theme_mod( 'nav_info_right_ttl' );
}

// nav_info_right_subttl
function aravalli_nav_info_right_subttl_render_callback() {
	return get_theme_mod( 'nav_info_right_subttl' );
}


// nav_btn_lbl
function aravalli_nav_btn_lbl_render_callback() {
	return get_theme_mod( 'nav_btn_lbl' );
}
