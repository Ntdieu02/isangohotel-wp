<?php
function aravalli_genearl_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'aravalli_general', array(
			'priority' => 31,
			'title' => esc_html__( 'General', 'aravalli-pro' ),
		)
	);
	
	/*=========================================
	Preloader
	=========================================*/
	$wp_customize->add_section(
		'preloader', array(
			'title' => esc_html__( 'Preloader', 'aravalli-pro' ),
			'priority' => 1,
			'panel' => 'aravalli_general',
		)
	);
	
	$wp_customize->add_setting( 
		'hs_preloader' , 
			array(
			'default' => '',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'hs_preloader', 
		array(
			'label'	      => esc_html__( 'Hide / Show Preloader', 'aravalli-pro' ),
			'section'     => 'preloader',
			'type'        => 'checkbox'
		) 
	);
	
	/*=========================================
	Scroller
	=========================================*/
	$wp_customize->add_section(
		'top_scroller', array(
			'title' => esc_html__( 'Top Scroller', 'aravalli-pro' ),
			'priority' => 4,
			'panel' => 'aravalli_general',
		)
	);
	
	$wp_customize->add_setting( 
		'hs_scroller' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'hs_scroller', 
		array(
			'label'	      => esc_html__( 'Hide / Show Scroller', 'aravalli-pro' ),
			'section'     => 'top_scroller',
			'type'        => 'checkbox'
		) 
	);
	
	// Scroller icon // 
	$wp_customize->add_setting(
    	'scroller_icon',
    	array(
	        'default' => 'fa-arrow-up',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Aravalli_Icon_Picker_Control($wp_customize, 
		'scroller_icon',
		array(
		    'label'   		=> __('Scroller Icon','aravalli-pro'),
		    'section' 		=> 'top_scroller',
			'iconset' => 'fa',
			
		))  
	);
	/*=========================================
	Breadcrumb  Section
	=========================================*/
	$wp_customize->add_section(
		'breadcrumb_setting', array(
			'title' => esc_html__( 'Page Breadcrumb', 'aravalli-pro' ),
			'priority' => 12,
			'panel' => 'aravalli_general',
		)
	);
	
	// Settings
	$wp_customize->add_setting(
		'breadcrumb_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'breadcrumb_settings',
		array(
			'type' => 'hidden',
			'label' => __('Settings','aravalli-pro'),
			'section' => 'breadcrumb_setting',
		)
	);
	
	// Breadcrumb Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hs_breadcrumb' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hs_breadcrumb', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'aravalli-pro' ),
			'section'     => 'breadcrumb_setting',
			'settings'    => 'hs_breadcrumb',
			'type'        => 'checkbox'
		) 
	);
	
	// enable on Page Title
	$wp_customize->add_setting(
		'breadcrumb_title_enable'
			,array(
			'default' => '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'priority' => 3,
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_control(
	'breadcrumb_title_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Enable Page Title on Breadcrumb?','aravalli-pro'),
			'section' => 'breadcrumb_setting',
		)
	);
	
	// enable on Page Path
	$wp_customize->add_setting(
		'breadcrumb_path_enable'
			,array(
			'default' => '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'priority' => 4,
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_control(
	'breadcrumb_path_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Enable Page Path on Breadcrumb?','aravalli-pro'),
			'section' => 'breadcrumb_setting',
		)
	);
	
	// Breadcrumb Content Section // 
	$wp_customize->add_setting(
		'breadcrumb_contents'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 5,
		)
	);
	
	// Checkin Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hs_breadcrumb_checkin' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 6,
		) 
	);
	
	$wp_customize->add_control(
	'hs_breadcrumb_checkin', 
		array(
			'label'	      => esc_html__( 'Hide / Show Checkin Section', 'aravalli-pro' ),
			'section'     => 'breadcrumb_setting',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_control(
	'breadcrumb_contents',
		array(
			'type' => 'hidden',
			'label' => __('Content','aravalli-pro'),
			'section' => 'breadcrumb_setting',
		)
	);
	
	
	// Breadcrumb Align // 
	$wp_customize->add_setting( 
		'breadcrumb_align' , 
			array(
			'default' => __('center', 'aravalli-pro'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_select',
			'priority' => 6,
		) 
	);

	$wp_customize->add_control(
	'breadcrumb_align' , 
		array(
			'label'          => __( 'Alignment', 'aravalli-pro'),
			'section'        => 'breadcrumb_setting',
			'type'           => 'select',
			'priority'  	 => 10,
			'choices'        => 
			array(
				'left'       => __( 'Left', 'aravalli-pro'),
				'center' => __( 'Center', 'aravalli-pro'),
				'right' => __( 'Right', 'aravalli-pro')
			) 
		) 
	);	
	
	// Seprator // 
	$wp_customize->add_setting(
    	'breadcrumb_seprator',
    	array(
			'default'      => __( '>', 'aravalli-pro'),
			'sanitize_callback' => 'aravalli_sanitize_text',
			'capability' => 'edit_theme_options',
			'priority' => 7,
		)
	);	

	$wp_customize->add_control( 
		'breadcrumb_seprator',
		array(
		    'label'   => esc_html__('Seprator','aravalli-pro'),
		    'section' => 'breadcrumb_setting',
			'type' => 'text',
		)  
	);
	
	// Content size // 
	$wp_customize->add_setting(
    	'breadcrumb_min_height',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_range_value',
			'transport'         => 'postMessage',
			'priority' => 8,
		)
	);
	$wp_customize->add_control( 
		new Aravalli_Customizer_Range_Control( $wp_customize, 'breadcrumb_min_height', 
			array(
				'label'      => __( 'Min Height', 'aravalli-pro'),
				'section'  => 'breadcrumb_setting',
				'media_query'   => true,
				'input_attr'    => array(
					'mobile'  => array(
						'min'           => 0,
						'max'           => 1000,
						'step'          => 1,
						'default_value' => 300,
					),
					'tablet'  => array(
						'min'           => 0,
						'max'           => 1000,
						'step'          => 1,
						'default_value' => 300,
					),
					'desktop' => array(
						'min'           => 0,
						'max'           => 1000,
						'step'          => 1,
						'default_value' => 300,
					),
				),
			) ) 
		);
		
	// Background // 
	$wp_customize->add_setting(
		'breadcrumb_bg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 9,
		)
	);

	$wp_customize->add_control(
	'breadcrumb_bg_head',
		array(
			'type' => 'hidden',
			'label' => __('Background','aravalli-pro'),
			'section' => 'breadcrumb_setting',
		)
	);
	
	// Background Image // 
    $wp_customize->add_setting( 
    	'breadcrumb_bg_img' , 
    	array(
			'default' 			=> get_template_directory_uri() .'/assets/images/breadcrumbs/rooms-bg.jpg',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_url',	
			'priority' => 10,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'breadcrumb_bg_img' ,
		array(
			'label'          => esc_html__( 'Background Image', 'aravalli-pro'),
			'section'        => 'breadcrumb_setting',
		) 
	));
	
	// Background Attachment // 
	$wp_customize->add_setting( 
		'breadcrumb_back_attach' , 
			array(
			'default' => 'scroll',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_select',
			'priority'  => 10,
		) 
	);
	
	$wp_customize->add_control(
	'breadcrumb_back_attach' , 
		array(
			'label'          => __( 'Background Attachment', 'aravalli-pro' ),
			'section'        => 'breadcrumb_setting',
			'type'           => 'select',
			'choices'        => 
			array(
				'inherit' => __( 'Inherit', 'aravalli-pro' ),
				'scroll' => __( 'Scroll', 'aravalli-pro' ),
				'fixed'   => __( 'Fixed', 'aravalli-pro' )
			) 
		) 
	);
	
	// Image Opacity // 
	if ( class_exists( 'Aravalli_Customizer_Range_Control' ) ) {
	$wp_customize->add_setting(
    	'breadcrumb_bg_img_opacity',
    	array(
	        'default'			=> '0.5',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_range_value',
			'priority'  => 11,
		)
	);
	$wp_customize->add_control( 
	new Aravalli_Customizer_Range_Control( $wp_customize, 'breadcrumb_bg_img_opacity', 
		array(
			'label'      => __( 'Opacity', 'aravalli-pro'),
			'section'  => 'breadcrumb_setting',
			'settings' => 'breadcrumb_bg_img_opacity',
			 'media_query'   => false,
                'input_attr'    => array(
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 1,
                        'step'          => 0.1,
                        'default_value' => 0.5,
                    ),
                ),
		) ) 
	);
	}
	
	$wp_customize->add_setting(
	'breadcrumb_overlay_color', 
	array(
		'default' => '#000000',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'priority'  => 12,
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'breadcrumb_overlay_color', 
			array(
				'label'      => __( 'Overlay Color', 'aravalli-pro'),
				'section'    => 'breadcrumb_setting',
			) 
		) 
	);
	
	// Typography
	$wp_customize->add_setting(
		'breadcrumb_typography'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority'  => 13,
		)
	);

	$wp_customize->add_control(
	'breadcrumb_typography',
		array(
			'type' => 'hidden',
			'label' => __('Typography','aravalli-pro'),
			'section' => 'breadcrumb_setting',
		)
	);
	
	if ( class_exists( 'Aravalli_Customizer_Range_Control' ) ) {
	// Title size // 
	$wp_customize->add_setting(
    	'breadcrumb_title_size',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_range_value',
			'transport'         => 'postMessage',
			'priority'  => 14,
		)
	);
	$wp_customize->add_control( 
	new Aravalli_Customizer_Range_Control( $wp_customize, 'breadcrumb_title_size', 
		array(
			'label'      => __( 'Title Size', 'aravalli-pro' ),
			'section'  => 'breadcrumb_setting',
			'media_query'   => true,
			'input_attr'    => array(
				'mobile'  => array(
					'min'           => 0,
					'max'           => 100,
					'step'          => 1,
					'default_value' => 36,
				),
				'tablet'  => array(
					'min'           => 0,
					'max'           => 100,
					'step'          => 1,
					'default_value' => 36,
				),
				'desktop' => array(
					'min'           => 0,
					'max'           => 100,
					'step'          => 1,
					'default_value' => 36,
				),
			),
		) ) 
	);
	// Content size // 
	$wp_customize->add_setting(
    	'breadcrumb_content_size',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_range_value',
			'transport'         => 'postMessage',
			'priority'  => 15,
		)
	);
	$wp_customize->add_control( 
	new Aravalli_Customizer_Range_Control( $wp_customize, 'breadcrumb_content_size', 
		array(
			'label'      => __( 'Content Size', 'aravalli-pro' ),
			'section'  => 'breadcrumb_setting',
			'media_query'   => true,
			'input_attr'    => array(
				'mobile'  => array(
					'min'           => 0,
					'max'           => 50,
					'step'          => 1,
					'default_value' => 13,
				),
				'tablet'  => array(
					'min'           => 0,
					'max'           => 50,
					'step'          => 1,
					'default_value' => 13,
				),
				'desktop' => array(
					'min'           => 0,
					'max'           => 50,
					'step'          => 1,
					'default_value' => 13,
				),
			),
		) ) 
	);
	}
	
	/*=========================================
	Aravalli Container
	=========================================*/
	$wp_customize->add_section(
        'aravalli_container',
        array(
        	'priority'      => 2,
            'title' 		=> __('Container','aravalli-pro'),
			'panel'  		=> 'aravalli_general',
		)
    );
	
	if ( class_exists( 'Aravalli_Customizer_Range_Control' ) ) {
		//container width
		$wp_customize->add_setting(
			'aravalli_site_cntnr_width',
			array(
				//'default'			=> '',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'aravalli_sanitize_range_value',
				'transport'         => 'postMessage',
				'priority'      => 1,
			)
		);
		$wp_customize->add_control( 
		new Aravalli_Customizer_Range_Control( $wp_customize, 'aravalli_site_cntnr_width', 
			array(
				'label'      => __( 'Container Width', 'aravalli-pro' ),
				'section'  => 'aravalli_container',
				 'media_query'   => false,
                'input_attr'    => array(
                    'desktop' => array(
                        'min'           => 768,
                        'max'           => 2000,
                        'step'          => 1,
                        'default_value' => 1200,
                    ),
                ),
			) ) 
		);
		
		//Margin Top
		$wp_customize->add_setting(
			'aravalli_cntnr_tb_padding',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'aravalli_sanitize_range_value',
				'transport'         => 'postMessage',
				'priority'      => 3,
			)
		);
		$wp_customize->add_control( 
		new Aravalli_Customizer_Range_Control( $wp_customize, 'aravalli_cntnr_tb_padding', 
			array(
				'label'      => __( 'Top Bottom Padding', 'aravalli-pro' ),
				'section'  => 'aravalli_container',
				 'media_query'   => true,
				'input_attr'    => array(
					'mobile'  => array(
						'min'           => 0,
						'max'           => 200,
						'step'          => 1,
						'default_value' => 100,
					),
					'tablet'  => array(
						'min'           => 0,
						'max'           => 200,
						'step'          => 1,
						'default_value' => 100,
					),
					'desktop' => array(
						'min'           => 0,
						'max'           => 200,
						'step'          => 1,
						'default_value' => 100,
					),
				),
			) ) 
		);
	}
	
	/*=========================================
	Aravalli Buttons
	=========================================*/
	$wp_customize->add_section(
        'aravalli_buttons',
        array(
        	'priority'      => 8,
            'title' 		=> __('Buttons','aravalli-pro'),
			'panel'  		=> 'aravalli_general',
		)
    );
	
	// Border Radius // 
	if ( class_exists( 'Aravalli_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'btn_brdr_radius',
			array(
				'default'			=> '1',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'aravalli_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Aravalli_Customizer_Range_Control( $wp_customize, 'btn_brdr_radius', 
			array(
				'label'      => __( 'Border Radius', 'aravalli-pro' ),
				'section'  => 'aravalli_buttons',
				 'media_query'   => true,
					'input_attr'    => array(
						'mobile'  => array(
							'min'           => 0,
							'max'           => 100,
							'step'          => 1,
							'default_value' => 1,
						),
						'tablet'  => array(
							'min'           => 0,
							'max'           => 100,
							'step'          => 1,
							'default_value' => 1,
						),
						'desktop' => array(
							'min'           => 0,
							'max'           => 100,
							'step'          => 1,
							'default_value' => 1,
						),
					),
			) ) 
		);
	}
}

add_action( 'customize_register', 'aravalli_genearl_setting' );


// breadcrumb selective refresh
function aravalli_breadcrumb_section_partials( $wp_customize ){

	// hs_breadcrumb
	$wp_customize->selective_refresh->add_partial(
		'hs_breadcrumb', array(
			'selector' => '#breadcrumbs',
			'container_inclusive' => true,
			'render_callback' => 'breadcrumb_setting',
			'fallback_refresh' => true,
		)
	);
	
	// breadcrumb_title_enable
	$wp_customize->selective_refresh->add_partial(
		'breadcrumb_title_enable', array(
			'selector' => '#breadcrumbs h2',
			'container_inclusive' => true,
			'render_callback' => 'breadcrumb_setting',
			'fallback_refresh' => true,
		)
	);
	// breadcrumb_path_enable
	$wp_customize->selective_refresh->add_partial(
		'breadcrumb_path_enable', array(
			'selector' => '#breadcrumbs ul',
			'container_inclusive' => true,
			'render_callback' => 'breadcrumb_setting',
			'fallback_refresh' => true,
		)
	);	
	}

add_action( 'customize_register', 'aravalli_breadcrumb_section_partials' );
