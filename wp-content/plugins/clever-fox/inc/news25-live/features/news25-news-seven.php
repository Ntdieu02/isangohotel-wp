<?php
function news25_fashion_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	fashion Section Panel
	=========================================*/
	
	$wp_customize->add_section(
		'fashion_setting', array(
			'title' => esc_html__( 'News Section 3', 'clever-fox' ),
			'panel' => 'news25_frontpage_sections',
			'priority' => 5,
		)
	);
	
	
	$wp_customize->add_setting( 
		'news_seven_hs' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'news_seven_hs', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'fashion_setting',
			'type'        => 'checkbox'
		) 
	);
	
	
	// fashion Contents
	$wp_customize->add_setting(
		'fashion_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'fashion_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Sport tab','clever-fox'),
			'section' => 'fashion_setting',
		)
	);
	$wp_customize->add_setting(
		'fashion_title'
			,array(
			'default'     	=> 'Latest',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_html',
			//// 'tranfashion'         => $selective_refresh,
			'priority' => 7,
		)
	);
	
	$wp_customize->add_control(
	'fashion_title',
		array(
			'type' => 'text',
			'label' => __('Title','clever-fox'),
			'section' => 'fashion_setting',
		)
	);	
	
	$wp_customize->add_setting(
		'fashion_subtitle'
			,array(
			'default'     	=> 'Fashion',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_html',
			//// 'tranfashion'         => $selective_refresh,
			'priority' => 7,
		)
	);
	
	$wp_customize->add_control(
	'fashion_subtitle',
		array(
			'type' => 'text',
			'label' => __('Sub Title','clever-fox'),
			'section' => 'fashion_setting',
		)
	);
	
	$wp_customize->add_setting(
		'fashion_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'fashion_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Left Column','clever-fox'),
			'section' => 'fashion_setting',
		)
	);
		
	$wp_customize->add_setting(
    'fashion_tab_category_id',
		array(
		'default' => '6',
		'capability' => 'edit_theme_options',
		'priority' => 5,
		'sanitize_callback' => 'sanitize_categories',
		)
	);	
	$wp_customize->add_control( new News25_Category_Dropdown_Custom_Control( $wp_customize, 
	'fashion_tab_category_id', 
		array(
		'label'   => __('Select Categories','clever-fox'),
		'section' => 'fashion_setting',
		) 
	) );
	
	
	$wp_customize->add_setting(
		'fashion_content_head2'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'fashion_content_head2',
		array(
			'type' => 'hidden',
			'label' => __('Right Column','clever-fox'),
			'section' => 'fashion_setting',
		)
	);
		
	$wp_customize->add_setting(
    'fashion_tab_category_id2',
		array(
		'default' => '7',
		'capability' => 'edit_theme_options',
		'priority' => 5,
		'sanitize_callback' => 'sanitize_categories',
		)
	);	
	$wp_customize->add_control( new News25_Category_Dropdown_Custom_Control( $wp_customize, 
	'fashion_tab_category_id2', 
		array(
		'label'   => __('Select Categories','clever-fox'),
		'section' => 'fashion_setting',
		) 
	) );
	
	if ( class_exists( 'Cleverfox_Customizer_Range_Slider_Control' ) ) {
		$wp_customize->add_setting(
			'news7_post_count',
			array(
				'default' => '1',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'news25_sanitize_range_value',
			)
		);
		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'news7_post_count', 
			array(
				'label'      => __( 'Show Posts', 'clever-fox' ),
				'section'  => 'fashion_setting',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop' => array(
							'min'           => 1,
							'max'           => 100,
							'step'          => 1,
							'default_value' => 2,
						),
					),
			) ) 
		);
	}
	
}

add_action( 'customize_register', 'news25_fashion_setting' );