<?php
function aravalli_slider_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Slider Section Panel
	=========================================*/
	$wp_customize->add_panel(
		'aravalli_frontpage_sections', array(
			'priority' => 32,
			'title' => esc_html__( 'Frontpage Sections', 'aravalli-pro' ),
		)
	);
	
	$wp_customize->add_section(
		'slider_setting', array(
			'title' => esc_html__( 'Slider Section', 'aravalli-pro' ),
			'panel' => 'aravalli_frontpage_sections',
			'priority' => 1,
		)
	);
	
	// slider Contents
	$wp_customize->add_setting(
		'slider_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'slider_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Contents','aravalli-pro'),
			'section' => 'slider_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add slides
	 */
	
		$wp_customize->add_setting( 'slider', 
			array(
			 'sanitize_callback' => 'aravalli_repeater_sanitize',
			 'priority' => 5,
			  'default' => aravalli_get_slider_default()
			)
		);
		
		$wp_customize->add_control( 
			new Aravalli_Repeater( $wp_customize, 
				'slider', 
					array(
						'label'   => esc_html__('Slide','aravalli-pro'),
						'section' => 'slider_setting',
						'add_field_label'                   => esc_html__( 'Add New', 'aravalli-pro' ),
						'item_name'                         => esc_html__( 'Slide', 'aravalli-pro' ),
						
						
						'customizer_repeater_icon_control' => false,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_text2_control'=> true,
						'customizer_repeater_link_control' => true,
						'customizer_repeater_link2_control' => true,
						'customizer_repeater_button2_control' => true,
						'customizer_repeater_slide_align' => true,
						'customizer_repeater_image_control' => true,
						'customizer_repeater_image2_control' => true,
					) 
				) 
			);
	
	//Overlay Enable //
	$wp_customize->add_setting( 
		'slider_overlay_enable' , 
			array(
			'default' => '1',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'priority' => 6,
		) 
	);
	
	$wp_customize->add_control(
	'slider_overlay_enable', 
		array(
			'label'	      => esc_html__( 'Overlay Enable?', 'aravalli-pro' ),
			'section'     => 'slider_setting',
			'type'        => 'checkbox'
		) 
	);	
	
	
	// slider opacity
	if ( class_exists( 'Aravalli_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'slider_opacity',
			array(
				'default'	      => '0.5',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'aravalli_sanitize_range_value',
				'priority' => 7,
			)
		);
		$wp_customize->add_control( 
		new Aravalli_Customizer_Range_Control( $wp_customize, 'slider_opacity', 
			array(
				'label'      => __( 'opacity', 'aravalli-pro' ),
				'section'  => 'slider_setting',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop' => array(
							'min'           => 0,
							'max'           => 0.9,
							'step'          => 0.1,
							'default_value' => 0,
						),
					),
			) ) 
		);
	}
	
	 // Overlay Color
	$wp_customize->add_setting(
	'slide_overlay_color', 
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => '#000000',
		'priority' => 8,
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'slide_overlay_color', 
			array(
				'label'      => __( 'Overlay Color', 'aravalli-pro' ),
				'section'    => 'slider_setting'
			) 
		) 
	);
	
	$wp_customize->add_setting( 
		'slider_animation_in' , 
			array(
			'default' => __('pulse', 'aravalli-pro' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'priority' => 9,
		) 
	);	
		$wp_customize->add_control('slider_animation_in', array(
		'label' => __('Animation In', 'aravalli-pro'),
		'section' => 'slider_setting',
		'settings' => 'slider_animation_in',
		'type'			=> 'select',
		'choices'        => 
			array(
				''		=>__('Amimation 1', 'aravalli-pro'),
				'pulse'		=>__('Amimation 2', 'aravalli-pro'),
				'fadeIn'=>__('Amimation 3', 'aravalli-pro'),
				'lightSpeedIn'=>__('Amimation 4', 'aravalli-pro'),
				'rollIn'=>__('Amimation 5', 'aravalli-pro'),
				'flipInX'=>__('Amimation 6', 'aravalli-pro'), 	
				'bounceIn'=>__('Amimation 7', 'aravalli-pro'),
			) 
	));
	$wp_customize->add_setting( 
		'slider_animation_out' , 
			array(
			'default' => __('fadeOut', 'aravalli-pro' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'priority' => 10,
		) 
	);
	$wp_customize->add_control('slider_animation_out', array(
    'label' => __('Animation Out', 'aravalli-pro'),
    'section' => 'slider_setting',
	'type'			=> 'select',
	'settings' => 'slider_animation_out',
	'choices'        => 
			array(
				''		=>__('Animation 1', 'aravalli-pro'),
				'fadeOut'=>__('Animation 2', 'aravalli-pro'),
				'fadeOut'=>__('Animation 3', 'aravalli-pro'),
				'lightSpeedOut'=>__('Animation 4', 'aravalli-pro'),
				'rollOut'=>__('Animation 5', 'aravalli-pro'),
				'flipInY'=>__('Animation 6', 'aravalli-pro'),
				'bounceOut'=>__('Animation 7', 'aravalli-pro'),
			) 
	));
	
	// slider opacity
	if ( class_exists( 'Aravalli_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'slider_animation_speed',
			array(
				'default' => '9000',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'aravalli_sanitize_range_value',
				'priority' => 11,
			)
		);
		$wp_customize->add_control( 
		new Aravalli_Customizer_Range_Control( $wp_customize, 'slider_animation_speed', 
			array(
				'label'      => __( 'Slider Speed', 'aravalli-pro' ),
				'section'  => 'slider_setting',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop' => array(
							'min'           => 500,
							'max'           => 10000,
							'step'          => 500,
							'default_value' => 9000,
						),
					),
			) ) 
		);
	}
}

add_action( 'customize_register', 'aravalli_slider_setting' );