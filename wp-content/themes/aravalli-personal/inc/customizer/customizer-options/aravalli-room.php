<?php
function aravalli_room_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Room  Section
	=========================================*/
	$wp_customize->add_section(
		'room_setting', array(
			'title' => esc_html__( 'Room Section', 'aravalli-pro' ),
			'priority' => 3,
			'panel' => 'aravalli_frontpage_sections',
		)
	);
	
	// Room Header Section // 
	$wp_customize->add_setting(
		'room_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'room_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','aravalli-pro'),
			'section' => 'room_setting',
		)
	);
	
	// Room Title // 
	$wp_customize->add_setting(
    	'room_title',
    	array(
	        'default'			=> __('Explore','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'room_title',
		array(
		    'label'   => __('Title','aravalli-pro'),
		    'section' => 'room_setting',
			'type'           => 'text',
		)  
	);
	
	// Room Subtitle // 
	$wp_customize->add_setting(
    	'room_subtitle',
    	array(
	        'default'			=> __('Rooms & Suits','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'room_subtitle',
		array(
		    'label'   => __('Subtitle','aravalli-pro'),
		    'section' => 'room_setting',
			'type'           => 'text',
		)  
	);
	
	// Room Description // 
	$wp_customize->add_setting(
    	'room_desc',
    	array(
	        'default'			=> __("Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry's standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book.",'aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'room_desc',
		array(
		    'label'   => __('Description','aravalli-pro'),
		    'section' => 'room_setting',
			'type'           => 'textarea',
		)  
	);

	// Room content Section // 
	
	$wp_customize->add_setting(
		'room_contents_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'room_contents_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','aravalli-pro'),
			'section' => 'room_setting',
		)
	);
	
	if ( class_exists( 'Aravalli_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'room_display_num',
			array(
				'default' => '10',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'aravalli_sanitize_range_value',
				'priority' => 8,
			)
		);
		$wp_customize->add_control( 
		new Aravalli_Customizer_Range_Control( $wp_customize, 'room_display_num', 
			array(
				'label'      => __( 'No. of Room Display', 'aravalli-pro' ),
				'section'  => 'room_setting',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop' => array(
							'min'           => 1,
							'max'           => 100,
							'step'          => 1,
							'default_value' => 10,
						),
					),
			) ) 
		);
	}
	
	
	// column // 
	$wp_customize->add_setting(
    	'room_sec_column',
    	array(
	        'default'			=> '4',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_select',
			'priority' => 5,
		)
	);	

	$wp_customize->add_control(
		'room_sec_column',
		array(
		    'label'   		=> __('Room Column','aravalli-pro'),
		    'section' 		=> 'room_setting',
			'type'			=> 'select',
			'choices'        => 
			array(
				'12' => __( '1', 'aravalli-pro' ),
				'6' => __( '2 ', 'aravalli-pro' ),
				'4' => __( '3', 'aravalli-pro' ),
				'3' => __( '4', 'aravalli-pro' ),
			) 
		) 
	);

}

add_action( 'customize_register', 'aravalli_room_setting' );

// room selective refresh
function aravalli_Room_section_partials( $wp_customize ){	
	// room_title
	$wp_customize->selective_refresh->add_partial( 'room_title', array(
		'selector'            => '.room-home .heading-default h6',
		'settings'            => 'room_title',
		'render_callback'  => 'aravalli_room_title_render_callback',
	) );
	
	// room_subtitle
	$wp_customize->selective_refresh->add_partial( 'room_subtitle', array(
		'selector'            => '.room-home .heading-default h3',
		'settings'            => 'room_subtitle',
		'render_callback'  => 'aravalli_room_subtitle_render_callback',
	) );
	
	// room_desc
	$wp_customize->selective_refresh->add_partial( 'room_desc', array(
		'selector'            => '.room-home .heading-default p',
		'settings'            => 'room_desc',
		'render_callback'  => 'aravalli_room_desc_render_callback',
	) );
	
	}

add_action( 'customize_register', 'aravalli_Room_section_partials' );

// room_title
function aravalli_room_title_render_callback() {
	return get_theme_mod( 'room_title' );
}

// room_title
function aravalli_room_subtitle_render_callback() {
	return get_theme_mod( 'room_subtitle' );
}

// room_desc
function aravalli_room_desc_render_callback() {
	return get_theme_mod( 'room_desc' );
}