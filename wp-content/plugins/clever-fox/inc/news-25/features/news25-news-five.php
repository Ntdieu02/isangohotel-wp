<?php
function news25_articles_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	articles Section Panel
	=========================================*/
	
	$wp_customize->add_section(
		'articles_setting', array(
			'title' => esc_html__( 'News Section 2', 'clever-fox' ),
			'panel' => 'news25_frontpage_sections',
			'priority' => 3,
		)
	);
	
	
	$wp_customize->add_setting( 
		'articles_hs' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'articles_hs', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'articles_setting',
			'type'        => 'checkbox'
		) 
	);
	
	
	// articles Contents
	$wp_customize->add_setting(
		'articles_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'articles_content_head',
		array(
			'type' => 'hidden',
			'label' => __('articles tab','clever-fox'),
			'section' => 'articles_setting',
		)
	);
	
	$wp_customize->add_setting(
		'articles_title'
			,array(
			'default'     	=> 'Trending',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_html',
			//// 'transport'         => $selective_refresh,
			'priority' => 7,
		)
	);
	
	$wp_customize->add_control(
	'articles_title',
		array(
			'type' => 'text',
			'label' => __('Title','clever-fox'),
			'section' => 'articles_setting',
		)
	);	
	
	$wp_customize->add_setting(
		'articles_subtitle'
			,array(
			'default'     	=> 'Articles',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_html',
			//// 'transport'         => $selective_refresh,
			'priority' => 7,
		)
	);
	
	$wp_customize->add_control(
	'articles_subtitle',
		array(
			'type' => 'text',
			'label' => __('Sub Title','clever-fox'),
			'section' => 'articles_setting',
		)
	);	
	
	$wp_customize->add_setting(
    'articles_tab_category_id',
		array(
		'default'	=> '5', //?cat=5
		'capability' => 'edit_theme_options',
		'priority' => 5,
		'sanitize_callback' => 'sanitize_categories',
		)
	);	
	$wp_customize->add_control( new News25_Category_Dropdown_Custom_Control( $wp_customize, 
	'articles_tab_category_id', 
		array(
		'label'   => __('Select Categories','clever-fox'),
		'section' => 'articles_setting',
		) 
	) );
	
	if ( class_exists( 'Cleverfox_Customizer_Range_Slider_Control' ) ) {
		$wp_customize->add_setting(
			'news5_post_count',
			array(
				'default' => '6',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'news25_sanitize_range_value',
			)
		);
		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'news5_post_count', 
			array(
				'label'      => __( 'Post Count', 'clever-fox' ),
				'section'  => 'articles_setting',
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

add_action( 'customize_register', 'news25_articles_setting' );