<?php
function news25_sport_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	sport Section Panel
	=========================================*/
	
	$wp_customize->add_section(
		'sport_setting', array(
			'title' => esc_html__( 'News Section 3', 'clever-fox' ),
			'panel' => 'news25_frontpage_sections',
			'priority' => 5,
		)
	);
	
	
	$wp_customize->add_setting( 
		'news_six_hs' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'news_six_hs', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'sport_setting',
			'type'        => 'checkbox'
		) 
	);
	
	
	// sport Contents
	$wp_customize->add_setting(
		'sport_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'sport_content_head',
		array(
			'type' => 'hidden',
			'label' => __('sport tab','clever-fox'),
			'section' => 'sport_setting',
		)
	);
	$wp_customize->add_setting(
		'sport_title'
			,array(
			'default'     	=> 'Sport',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_html',
			//// 'transport'         => $selective_refresh,
			'priority' => 7,
		)
	);
	
	$wp_customize->add_control(
	'sport_title',
		array(
			'type' => 'text',
			'label' => __('Title','clever-fox'),
			'section' => 'sport_setting',
		)
	);	
	
	$wp_customize->add_setting(
		'sport_subtitle'
			,array(
			'default'     	=> 'News',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_html',
			//// 'transport'         => $selective_refresh,
			'priority' => 7,
		)
	);
	
	$wp_customize->add_control(
	'sport_subtitle',
		array(
			'type' => 'text',
			'label' => __('Sub Title','clever-fox'),
			'section' => 'sport_setting',
		)
	);
	
	$wp_customize->add_setting(
		'sport_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'sport_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Left Column','clever-fox'),
			'section' => 'sport_setting',
		)
	);
		
	$wp_customize->add_setting(
    'sport_tab_category_id',
		array(
		'default' => '6',
		'capability' => 'edit_theme_options',
		'priority' => 5,
		'sanitize_callback' => 'sanitize_categories',
		)
	);	
	$wp_customize->add_control( new News25_Category_Dropdown_Custom_Control( $wp_customize, 
	'sport_tab_category_id', 
		array(
		'label'   => __('Select Categories','clever-fox'),
		'section' => 'sport_setting',
		) 
	) );
	
	
	$wp_customize->add_setting(
		'sport_content_head2'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'sport_content_head2',
		array(
			'type' => 'hidden',
			'label' => __('Right Column','clever-fox'),
			'section' => 'sport_setting',
		)
	);
		
	$wp_customize->add_setting(
    'sport_tab_category_id2',
		array(
		'default' => '7',
		'capability' => 'edit_theme_options',
		'priority' => 5,
		'sanitize_callback' => 'sanitize_categories',
		)
	);	
	$wp_customize->add_control( new News25_Category_Dropdown_Custom_Control( $wp_customize, 
	'sport_tab_category_id2', 
		array(
		'label'   => __('Select Categories','clever-fox'),
		'section' => 'sport_setting',
		) 
	) );
	
	if ( class_exists( 'Cleverfox_Customizer_Range_Slider_Control' ) ) {
		$wp_customize->add_setting(
			'news6_post_count',
			array(
				'default' => '4',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'news25_sanitize_range_value',
			)
		);
		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'news6_post_count', 
			array(
				'label'      => __( 'Show Posts', 'clever-fox' ),
				'section'  => 'sport_setting',
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

add_action( 'customize_register', 'news25_sport_setting' );