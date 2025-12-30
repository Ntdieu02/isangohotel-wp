<?php
function aravalli_checkin_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Checkin  Section
	=========================================*/
	$wp_customize->add_section(
		'checkin_setting', array(
			'title' => esc_html__( 'Checkin Section', 'aravalli-pro' ),
			'priority' => 2,
			'panel' => 'aravalli_frontpage_sections',
		)
	);
	
	// Checkin Content Section // 
	$wp_customize->add_setting(
		'checkin_contents'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'checkin_contents',
		array(
			'type' => 'hidden',
			'label' => __('Content','aravalli-pro'),
			'section' => 'checkin_setting',
		)
	);
	
	
	//  Title // 
	$wp_customize->add_setting(
    	'checkin_title',
    	array(
	        'default'			=> __('Find a Room','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'checkin_title',
		array(
		    'label'   => __('Title','aravalli-pro'),
		    'section' => 'checkin_setting',
			'type'           => 'text',
		)  
	);
	
	// Description // 
	$wp_customize->add_setting(
    	'checkin_desc',
    	array(
	        'default'			=> __('When you want to be our guest ?','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'checkin_desc',
		array(
		    'label'   => __('Description','aravalli-pro'),
		    'section' => 'checkin_setting',
			'type'           => 'textarea',
		)  
	);
	
	
	// shortcode // 
	$wp_customize->add_setting(
    	'checkin_shortcode',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'checkin_shortcode',
		array(
		    'label'   => __('Shortcode','aravalli-pro'),
		    'section' => 'checkin_setting',
			'type'           => 'textarea',
		)  
	);

}

add_action( 'customize_register', 'aravalli_checkin_setting' );

// Checkin selective refresh
function aravalli_checkin_section_partials( $wp_customize ){
	
	// checkin_title
	$wp_customize->selective_refresh->add_partial( 'checkin_title', array(
		'selector'            => '.home-checkin .checkin-text h3',
		'settings'            => 'checkin_title',
		'render_callback'  => 'aravalli_checkin_title_render_callback',
	
	) );
	
	// checkin_desc
	$wp_customize->selective_refresh->add_partial( 'checkin_desc', array(
		'selector'            => '.home-checkin .checkin-text p',
		'settings'            => 'checkin_desc',
		'render_callback'  => 'aravalli_checkin_desc_render_callback',
	) );
	}

add_action( 'customize_register', 'aravalli_checkin_section_partials' );

// checkin_title
function aravalli_checkin_title_render_callback() {
	return get_theme_mod( 'checkin_title' );
}


// checkin_desc
function aravalli_checkin_desc_render_callback() {
	return get_theme_mod( 'checkin_desc' );
}
