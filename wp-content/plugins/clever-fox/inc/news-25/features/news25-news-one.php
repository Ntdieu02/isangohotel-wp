<?php
function news25_one_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Slider Section Panel
	=========================================*/
	$wp_customize->add_panel(
		'news25_frontpage_sections', array(
			'priority' => 32,
			'title' => esc_html__( 'Frontpage Sections', 'clever-fox' ),
		)
	);
	
	$wp_customize->add_section(
		'slider_setting', array(
			'title' => esc_html__( 'News Section 1', 'clever-fox' ),
			'panel' => 'news25_frontpage_sections',
			'priority' => 1,
		)
	);
	
	$wp_customize->add_setting( 
		'news_one_hs' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'news_one_hs', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'slider_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// slider Contents
	$wp_customize->add_setting(
		'slider_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'slider_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Left Column','clever-fox'),
			'section' => 'slider_setting',
		)
	);
	
	
	// Slider Category
	$wp_customize->add_setting(
    'slider_category_id',
		array(
		'default'	=>	'2',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_categories',
		)
	);	
	$wp_customize->add_control( new News25_Category_Dropdown_Custom_Control( $wp_customize, 
	'slider_category_id', 
		array(
		'label'   => __('Select Categories','clever-fox'),
		'section' => 'slider_setting',
		) 
	) );
	
	
	$wp_customize->add_setting(
		'slider_content_middle'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_text',
			'priority' => 6,
		)
	);

	$wp_customize->add_control(
	'slider_content_middle',
		array(
			'type' => 'hidden',
			'label' => __('Middle Column','clever-fox'),
			'section' => 'slider_setting',
		)
	);
	
	//Video Upload
	$wp_customize->add_setting(
		'slider_video_url'
			,array(
			'default'     	=> 'https://www.youtube.com/watch?v=bTqVqk7FSmY',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_html',
		)
	);
	
	$wp_customize->add_control(
	'slider_video_url',
		array(
			'type' => 'textarea',
			'label' => __('Video Url','clever-fox'),
			'section' => 'slider_setting',
		)
	);
		
	$wp_customize->add_setting( 
		'news25_middle_top_news_title' , 
			array(
			'default' => __('Top 10 News','clever-fox'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_text',
		) 
	);

	$wp_customize->add_control(
	'news25_middle_top_news_title', 
		array(
			'label'	      => esc_html__( 'Title', 'clever-fox' ),
			'section'     => 'slider_setting',
		) 
	);

	$wp_customize->add_setting(
    'news25_middle_top_news_cats',
		array(
		'default'	=>	['2','4'],
		'capability' => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_categories',
		)
	);	
	$wp_customize->add_control( new News25_Category_Dropdown_Custom_Control( $wp_customize, 
	'news25_middle_top_news_cats', 
		array(
		'label'   => __('Select Categories','clever-fox'),
		'section' => 'slider_setting',
		) 
	) );
	
	$wp_customize->add_setting(
		'slider_content_tab'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_text',
			'priority' => 6,
		)
	);

	$wp_customize->add_control(
	'slider_content_tab',
		array(
			'type' => 'hidden',
			'label' => __('Right Column','clever-fox'),
			'section' => 'slider_setting',
		)
	);
	
	$wp_customize->add_setting(
    'slider_right_tab1_id',
		array(
		'default'	=>	'Popular', //?cat=4
		'capability' => 'edit_theme_options',
		'priority' => 5,
		'sanitize_callback' => 'news25_sanitize_text',
		)
	);	
	$wp_customize->add_control( new Category_Dropdown_Custom_Control( $wp_customize, 
	'slider_right_tab1_id', 
		array(
		'label'   => __('Tab 1 Category','clever-fox'),
		'section' => 'slider_setting',
		) 
	) );
	
	$wp_customize->add_setting(
    'slider_right_tab2_id',
		array(
		'default'	=>	'Featured', //?cat=3
		'capability' => 'edit_theme_options',
		'priority' => 5,
		'sanitize_callback' => 'news25_sanitize_text',
		)
	);	
	$wp_customize->add_control( new Category_Dropdown_Custom_Control( $wp_customize, 
	'slider_right_tab2_id', 
		array(
		'label'   => __('Tab 2 Category','clever-fox'),
		'section' => 'slider_setting',
		) 
	) );
	
	if ( class_exists( 'Cleverfox_Customizer_Range_Slider_Control' ) ) {
		$wp_customize->add_setting(
			'slider_post_count',
			array(
				'default' => '3',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'news25_sanitize_range_value',
			)
		);
		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'slider_post_count', 
			array(
				'label'      => __( 'Post Count', 'clever-fox' ),
				'section'  => 'slider_setting',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop' => array(
							'min'           => 1,
							'max'           => 100,
							'step'          => 1,
							'default_value' => 3,
						),
					),
			) ) 
		);
	}

}

add_action( 'customize_register', 'news25_one_setting' );