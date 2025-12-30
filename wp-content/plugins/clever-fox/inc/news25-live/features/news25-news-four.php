<?php
function news25_business_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	business Section Panel
	=========================================*/
	$wp_customize->add_section(
		'business_setting', array(
			'title' => esc_html__( 'News Section 4', 'clever-fox' ),
			'panel' => 'news25_frontpage_sections',
		)
	);
	
	// business Contents
	$wp_customize->add_setting(
		'business_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'business_content_head',
		array(
			'type' => 'hidden',
			'label' => __('business tab','clever-fox'),
			'section' => 'business_setting',
		)
	);
	$wp_customize->add_setting(
		'business_title'
			,array(
			'default'     	=> 'Business',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_html',
			//// 'transport'         => $selective_refresh,
			'priority' => 7,
		)
	);
	
	$wp_customize->add_control(
	'business_title',
		array(
			'type' => 'text',
			'label' => __('Title','clever-fox'),
			'section' => 'business_setting',
		)
	);	
	
	$wp_customize->add_setting(
		'business_subtitle'
			,array(
			'default'     	=> 'News',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_html',
			//// 'transport'         => $selective_refresh,
			'priority' => 7,
		)
	);
	
	$wp_customize->add_control(
	'business_subtitle',
		array(
			'type' => 'text',
			'label' => __('Sub Title','clever-fox'),
			'section' => 'business_setting',
		)
	);	
	
	$wp_customize->add_setting(
		'business_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'business_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Left Column','clever-fox'),
			'section' => 'business_setting',
		)
	);
		
	$wp_customize->add_setting(
		'business_video_url'
			,array(
			'default'     	=> 'https://www.youtube.com/watch?v=bTqVqk7FSmY',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_html',
			//// 'transport'         => $selective_refresh,
			'priority' => 7,
		)
	);
	
	$wp_customize->add_control(
	'business_video_url',
		array(
			'type' => 'textarea',
			'label' => __('Video Url','clever-fox'),
			'section' => 'business_setting',
		)
	);

	$wp_customize->add_setting(
		'business_content_head2'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'business_content_head2',
		array(
			'type' => 'hidden',
			'label' => __('Right Column','clever-fox'),
			'section' => 'business_setting',
		)
	);	
	$wp_customize->add_setting(
		'business_tab_category_id',
			array(
			'default' => array('6','5'),
			'capability' => 'edit_theme_options',
			'priority' => 5,
			'sanitize_callback' => 'sanitize_categories',
		)
	);	
	
	$wp_customize->add_control( new News25_Category_Dropdown_Custom_Control( $wp_customize, 
		'business_tab_category_id', 
			array(
			'label'   => __('Select Categories','clever-fox'),
			'section' => 'business_setting',
		) 
	) );
	
	if ( class_exists( 'Cleverfox_Customizer_Range_Slider_Control' ) ) {
		$wp_customize->add_setting(
			'news4_post_count',
			array(
				'default' => '4',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'news25_sanitize_range_value',
			)
		);
		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'news4_post_count', 
			array(
				'label'      => __( 'Show Posts', 'clever-fox' ),
				'section'  => 'business_setting',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop' => array(
							'min'           => 1,
							'max'           => 100,
							'step'          => 1,
							'default_value' => 4,
						),
					),
			) ) 
		);
	}
}

add_action( 'customize_register', 'news25_business_setting' );