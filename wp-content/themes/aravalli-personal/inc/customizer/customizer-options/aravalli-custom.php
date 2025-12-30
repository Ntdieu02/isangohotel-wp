<?php
function aravalli_custom_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Custom  Section
	=========================================*/
	$wp_customize->add_section(
		'custom_setting', array(
			'title' => esc_html__( 'Custom Section', 'aravalli-pro' ),
			'priority' => 14,
			'panel' => 'aravalli_frontpage_sections',
		)
	);
	
	// Custom Header Section // 
	$wp_customize->add_setting(
		'custom_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'custom_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','aravalli-pro'),
			'section' => 'custom_setting',
		)
	);
	
	// Custom Title // 
	$wp_customize->add_setting(
    	'custom_title',
    	array(
	        'default'			=> __('Explore','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'custom_title',
		array(
		    'label'   => __('Title','aravalli-pro'),
		    'section' => 'custom_setting',
			'type'           => 'text',
		)  
	);
	
	
	// Custom Subtitle // 
	$wp_customize->add_setting(
    	'custom_subtitle',
    	array(
	        'default'			=> __('Custom','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'custom_subtitle',
		array(
		    'label'   => __('Subtitle','aravalli-pro'),
		    'section' => 'custom_setting',
			'type'           => 'text',
		)  
	);
	
	// Custom Description // 
	$wp_customize->add_setting(
    	'custom_description',
    	array(
	        'default'			=> __("Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry's standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book.",'aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'custom_description',
		array(
		    'label'   => __('Description','aravalli-pro'),
		    'section' => 'custom_setting',
			'type'           => 'textarea',
		)  
	);

	// Custom content Section // 
	
	$wp_customize->add_setting(
		'custom_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'custom_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','aravalli-pro'),
			'section' => 'custom_setting',
		)
	);
	
	// custom content // 
	
	$page_editor_path = trailingslashit( get_template_directory() ) . 'inc/customizer/custom-controls/controls/editor/customizer-page-editor.php';
		if ( file_exists( $page_editor_path ) ) {
			require_once( $page_editor_path );
		}
	if ( class_exists( 'Aravalli_Page_Editor' ) ) {
		$frontpage_id = get_option( 'page_on_front' );
		$default = '';
		if ( ! empty( $frontpage_id ) ) {
			$default = get_post_field( 'post_content', $frontpage_id );
		}
		$wp_customize->add_setting(
			'aravalli_custom_editor', array(
				'default' => __('Custom Section Description','aravalli-pro'),
				'sanitize_callback' => 'wp_kses_post',
				'priority' => 8,
				
			)
		);

		$wp_customize->add_control(
			new Aravalli_Page_Editor(
				$wp_customize, 'aravalli_custom_editor', array(
					'label' => esc_html__( 'Content', 'aravalli-pro' ),
					'section' => 'custom_setting',
					'needsync' => true,
				)
			)
		);
	}
	$default = '';
}

add_action( 'customize_register', 'aravalli_custom_setting' );

// custom selective refresh
function aravalli_custom_section_partials( $wp_customize ){
	// custom_title
	$wp_customize->selective_refresh->add_partial( 'custom_title', array(
		'selector'            => '.custom-wrapper .heading-default h6',
		'settings'            => 'custom_title',
		'render_callback'  => 'aravalli_custom_title_render_callback',
	
	) );
	
	// custom_subtitle
	$wp_customize->selective_refresh->add_partial( 'custom_subtitle', array(
		'selector'            => '.custom-wrapper .heading-default h3',
		'settings'            => 'custom_subtitle',
		'render_callback'  => 'aravalli_custom_subtitle_render_callback',
	
	) );
	
	
	// custom_description
	$wp_customize->selective_refresh->add_partial( 'custom_description', array(
		'selector'            => '.custom-wrapper .heading-default p',
		'settings'            => 'custom_description',
		'render_callback'  => 'aravalli_custom_description_render_callback',
	) );
	}
add_action( 'customize_register', 'aravalli_custom_section_partials' );

// custom_title
function aravalli_custom_title_render_callback() {
	return get_theme_mod( 'custom_title' );
}


// custom_subtitle
function aravalli_custom_subtitle_render_callback() {
	return get_theme_mod( 'custom_subtitle' );
}


// custom_description
function aravalli_custom_description_render_callback() {
	return get_theme_mod( 'custom_description' );
}