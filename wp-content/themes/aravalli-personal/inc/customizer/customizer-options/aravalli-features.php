<?php
function aravalli_features_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Features  Section
	=========================================*/
	$wp_customize->add_section(
		'features_setting', array(
			'title' => esc_html__( 'Features Section', 'aravalli-pro' ),
			'priority' => 4,
			'panel' => 'aravalli_frontpage_sections',
		)
	);

	// Features Header Section // 
	$wp_customize->add_setting(
		'features_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'features_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','aravalli-pro'),
			'section' => 'features_setting',
		)
	);
	
	// Features Title // 
	$wp_customize->add_setting(
    	'features_title',
    	array(
	        'default'			=> __('Explore','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'features_title',
		array(
		    'label'   => __('Title','aravalli-pro'),
		    'section' => 'features_setting',
			'type'           => 'text',
		)  
	);
	
	
	// Features Subtitle // 
	$wp_customize->add_setting(
    	'features_subtitle',
    	array(
	        'default'			=> __('theme Features','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'features_subtitle',
		array(
		    'label'   => __('Subtitle','aravalli-pro'),
		    'section' => 'features_setting',
			'type'           => 'text',
		)  
	);
	
	// Features Description // 
	$wp_customize->add_setting(
    	'features_description',
    	array(
	        'default'			=> __("Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry's standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book.",'aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'features_description',
		array(
		    'label'   => __('Description','aravalli-pro'),
		    'section' => 'features_setting',
			'type'           => 'textarea',
		)  
	);

	// Features content Section // 
	
	$wp_customize->add_setting(
		'features_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'features_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','aravalli-pro'),
			'section' => 'features_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add features
	 */
	
		$wp_customize->add_setting( 'features_contents', 
			array(
			 'sanitize_callback' => 'aravalli_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 8,
			 'default' => aravalli_get_features_default()
			)
		);
		
		$wp_customize->add_control( 
			new Aravalli_Repeater( $wp_customize, 
				'features_contents', 
					array(
						'label'   => esc_html__('Features','aravalli-pro'),
						'section' => 'features_setting',
						'add_field_label'                   => esc_html__( 'Add New', 'aravalli-pro' ),
						'item_name'                         => esc_html__( 'Features', 'aravalli-pro' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_text2_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
	// features column // 
	$wp_customize->add_setting(
    	'features_sec_column',
    	array(
	        'default'			=> '3',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_select',
			'priority' => 9,
		)
	);	

	$wp_customize->add_control(
		'features_sec_column',
		array(
		    'label'   		=> __('Features Column','aravalli-pro'),
		    'section' 		=> 'features_setting',
			'settings'   	 => 'features_sec_column',
			'type'			=> 'select',
			'choices'        => 
			array(
				'12' => __( '1', 'aravalli-pro' ),
				'6' => __( '2', 'aravalli-pro' ),
				'4' => __( '3 ', 'aravalli-pro' ),
				'3' => __( '4', 'aravalli-pro' ),
			) 
		) 
	);
}

add_action( 'customize_register', 'aravalli_features_setting' );

// features selective refresh
function aravalli_home_features_section_partials( $wp_customize ){	
	// features title
	$wp_customize->selective_refresh->add_partial( 'features_title', array(
		'selector'            => '.features-home .heading-default h6',
		'settings'            => 'features_title',
		'render_callback'  => 'aravalli_features_title_render_callback',
	) );
	
	// features_subtitle
	$wp_customize->selective_refresh->add_partial( 'features_subtitle', array(
		'selector'            => '.features-home .heading-default h3',
		'settings'            => 'features_subtitle',
		'render_callback'  => 'aravalli_features_subtitle_render_callback',
	) );
	
	// features description
	$wp_customize->selective_refresh->add_partial( 'features_description', array(
		'selector'            => '.features-home .heading-default p',
		'settings'            => 'features_description',
		'render_callback'  => 'aravalli_features_desc_render_callback',
	) ); 
	// features content
	$wp_customize->selective_refresh->add_partial( 'features_contents', array(
		'selector'            => '.features-home .featuress-contents'
	) );
	
	}

add_action( 'customize_register', 'aravalli_home_features_section_partials' );

// features title
function aravalli_features_title_render_callback() {
	return get_theme_mod( 'features_title' );
}

// features_subtitle
function aravalli_features_subtitle_render_callback() {
	return get_theme_mod( 'features_subtitle' );
}

// features description
function aravalli_features_desc_render_callback() {
	return get_theme_mod( 'features_description' );
}