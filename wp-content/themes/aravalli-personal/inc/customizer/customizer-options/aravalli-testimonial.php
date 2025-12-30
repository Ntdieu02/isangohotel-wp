<?php
function aravalli_testimonial_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Testimonial  Section
	=========================================*/
	$wp_customize->add_section(
		'testimonial_setting', array(
			'title' => esc_html__( 'Testimonial & Events Section', 'aravalli-pro' ),
			'priority' => 7,
			'panel' => 'aravalli_frontpage_sections',
		)
	);
	
	// Testimnial Header Section // 
	$wp_customize->add_setting(
		'testimonial_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'testimonial_head',
		array(
			'type' => 'hidden',
			'label' => __('Testimonial','aravalli-pro'),
			'section' => 'testimonial_setting',
		)
	);
	
	// Testimonial Title // 
	$wp_customize->add_setting(
    	'testimonial_title',
    	array(
	        'default'			=> __('Explore','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'testimonial_title',
		array(
		    'label'   => __('Title','aravalli-pro'),
		    'section' => 'testimonial_setting',
			'type'           => 'text',
		)  
	);
	
	
	// Testimonial Subtitle // 
	$wp_customize->add_setting(
    	'testimonial_subtitle',
    	array(
	        'default'			=> __('Client’s Speak','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'testimonial_subtitle',
		array(
		    'label'   => __('Subtitle','aravalli-pro'),
		    'section' => 'testimonial_setting',
			'type'           => 'text',
		)  
	);
	
	// Testimonial Description // 
	$wp_customize->add_setting(
    	'testimonial_description',
    	array(
	        'default'			=> __('Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'testimonial_description',
		array(
		    'label'   => __('Description','aravalli-pro'),
		    'section' => 'testimonial_setting',
			'type'           => 'textarea',
		)  
	);
	
	/**
	 * Customizer Repeater for add Testimonial
	 */
	
		$wp_customize->add_setting( 'testimonials_content', 
			array(
			 'sanitize_callback' => 'aravalli_repeater_sanitize',
			 'priority' => 8,
			 'default' => aravalli_get_testimonial_default()
			)
		);
		
		$wp_customize->add_control( 
			new Aravalli_Repeater( $wp_customize, 
				'testimonials_content', 
					array(
						'label'   => esc_html__('Testimonial','aravalli-pro'),
						'section' => 'testimonial_setting',
						'add_field_label'                   => esc_html__( 'Add New', 'aravalli-pro' ),
						'item_name'                         => esc_html__( 'Testimonial', 'aravalli-pro' ),
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_text2_control' => true,
					) 
				) 
			);
			
			
			
			
			
	// Events Header Section // 
	$wp_customize->add_setting(
		'events_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 11,
		)
	);

	$wp_customize->add_control(
	'events_head',
		array(
			'type' => 'hidden',
			'label' => __('Events','aravalli-pro'),
			'section' => 'testimonial_setting',
		)
	);
	
	// Event Title // 
	$wp_customize->add_setting(
    	'event_title',
    	array(
	        'default'			=> __('Explore','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 12,
		)
	);	
	
	$wp_customize->add_control( 
		'event_title',
		array(
		    'label'   => __('Title','aravalli-pro'),
		    'section' => 'testimonial_setting',
			'type'           => 'text',
		)  
	);
	
	
	// Event Subtitle // 
	$wp_customize->add_setting(
    	'event_subtitle',
    	array(
	        'default'			=> __('News & Events','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 13,
		)
	);	
	
	$wp_customize->add_control( 
		'event_subtitle',
		array(
		    'label'   => __('Subtitle','aravalli-pro'),
		    'section' => 'testimonial_setting',
			'type'           => 'text',
		)  
	);
	
	// Event Description // 
	$wp_customize->add_setting(
    	'event_description',
    	array(
	        'default'			=> __('Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 14,
		)
	);	
	
	$wp_customize->add_control( 
		'event_description',
		array(
		    'label'   => __('Description','aravalli-pro'),
		    'section' => 'testimonial_setting',
			'type'           => 'textarea',
		)  
	);
	
	/**
	 * Customizer Repeater for add Event
	 */
	
		$wp_customize->add_setting( 'events_content', 
			array(
			 'sanitize_callback' => 'aravalli_repeater_sanitize',
			 'priority' => 15,
			 'default' => aravalli_get_event_default()
			)
		);
		
		$wp_customize->add_control( 
			new Aravalli_Repeater( $wp_customize, 
				'events_content', 
					array(
						'label'   => esc_html__('Event','aravalli-pro'),
						'section' => 'testimonial_setting',
						'add_field_label'                   => esc_html__( 'Add New', 'aravalli-pro' ),
						'item_name'                         => esc_html__( 'Event', 'aravalli-pro' ),
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_text2_control' => true,
						'customizer_repeater_button2_control' => true,
						'customizer_repeater_link_control' => true,
						'customizer_repeater_shortcode_control' => true,
					) 
				) 
			);		
}

add_action( 'customize_register', 'aravalli_testimonial_setting' );

// Testimonial selective refresh
function aravalli_testimonial_section_partials( $wp_customize ){
	
	// testimonial_title
	$wp_customize->selective_refresh->add_partial( 'testimonial_title', array(
		'selector'            => '.home-testimonial .heading-default h6',
		'settings'            => 'testimonial_title',
		'render_callback'  => 'aravalli_testimonial_title_render_callback',
	
	) );
	
	// testimonial_subtitle
	$wp_customize->selective_refresh->add_partial( 'testimonial_subtitle', array(
		'selector'            => '.home-testimonial .heading-default h3',
		'settings'            => 'testimonial_subtitle',
		'render_callback'  => 'aravalli_testimonial_subtitle_render_callback',
	
	) );
	
	// testimonial_description
	$wp_customize->selective_refresh->add_partial( 'testimonial_description', array(
		'selector'            => '.home-testimonial .heading-default p',
		'settings'            => 'testimonial_description',
		'render_callback'  => 'aravalli_testimonial_description_render_callback',
	
	) );
	
	
	// event_title
	$wp_customize->selective_refresh->add_partial( 'event_title', array(
		'selector'            => '.home-event .heading-default h6',
		'settings'            => 'event_title',
		'render_callback'  => 'aravalli_event_title_render_callback',
	
	) );
	
	// event_subtitle
	$wp_customize->selective_refresh->add_partial( 'event_subtitle', array(
		'selector'            => '.home-event .heading-default h3',
		'settings'            => 'event_subtitle',
		'render_callback'  => 'aravalli_event_subtitle_render_callback',
	
	) );
	
	// event_description
	$wp_customize->selective_refresh->add_partial( 'event_description', array(
		'selector'            => '.home-event .heading-default p',
		'settings'            => 'event_description',
		'render_callback'  => 'aravalli_event_description_render_callback',
	
	) );
	
	}

add_action( 'customize_register', 'aravalli_testimonial_section_partials' );

// testimonial_title
function aravalli_testimonial_title_render_callback() {
	return get_theme_mod( 'testimonial_title' );
}

// testimonial_subtitle
function aravalli_testimonial_subtitle_render_callback() {
	return get_theme_mod( 'testimonial_subtitle' );
}

// testimonial_description
function aravalli_testimonial_description_render_callback() {
	return get_theme_mod( 'testimonial_description' );
}



// event_title
function aravalli_event_title_render_callback() {
	return get_theme_mod( 'event_title' );
}

// event_subtitle
function aravalli_event_subtitle_render_callback() {
	return get_theme_mod( 'event_subtitle' );
}

// event_description
function aravalli_event_description_render_callback() {
	return get_theme_mod( 'event_description' );
}