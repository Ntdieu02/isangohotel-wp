<?php
	function news25_editor_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	editor Section Panel
	=========================================*/
	
	$wp_customize->add_section(
		'editor_setting', array(
			'title' => esc_html__( 'Editor Choice Section', 'clever-fox' ),
			'panel' => 'news25_frontpage_sections',
		)
	);
	
	$wp_customize->add_setting( 
		'news_nine_hs' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'news_nine_hs', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'editor_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// editor Contents
	$wp_customize->add_setting(
		'editor_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'editor_content_head',
		array(
			'type' => 'hidden',
			'label' => __('editor tab','clever-fox'),
			'section' => 'editor_setting',
		)
	);
	
	$wp_customize->add_setting(
		'editor_title'
			,array(
			'default'     	=> 'Editor',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_html',
			//// 'transport'         => $selective_refresh,
			'priority' => 7,
		)
	);
	
	$wp_customize->add_control(
	'editor_title',
		array(
			'type' => 'text',
			'label' => __('Title','clever-fox'),
			'section' => 'editor_setting',
		)
	);	
	
	$wp_customize->add_setting(
		'editor_subtitle'
			,array(
			'default'     	=> 'Choice',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_html',
			//// 'transport'         => $selective_refresh,
			'priority' => 7,
		)
	);
	
	$wp_customize->add_control(
	'editor_subtitle',
		array(
			'type' => 'text',
			'label' => __('Sub Title','clever-fox'),
			'section' => 'editor_setting',
		)
	);	
	$wp_customize->add_setting(
    'editor_tab_category_id',
		array(
		'default' => '6',
		'capability' => 'edit_theme_options',
		'priority' => 5,
		'sanitize_callback' => 'sanitize_categories',
		)
	);	
	$wp_customize->add_control( new News25_Category_Dropdown_Custom_Control( $wp_customize, 
	'editor_tab_category_id', 
		array(
		'label'   => __('Select Categories','clever-fox'),
		'section' => 'editor_setting',
		) 
	) );
	
	if ( class_exists( 'Cleverfox_Customizer_Range_Slider_Control' ) ) {
		$wp_customize->add_setting(
			'news9_post_count',
			array(
				'default' => '4',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'news25_sanitize_range_value',
			)
		);
		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'news9_post_count', 
			array(
				'label'      => __( 'Post Count', 'clever-fox' ),
				'section'  => 'editor_setting',
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

add_action( 'customize_register', 'news25_editor_setting' );