<?php
function aravalli_funfact_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Funfact Section
	=========================================*/
	$wp_customize->add_section(
		'funfact_setting', array(
			'title' => esc_html__( 'Funfact Section', 'aravalli-pro' ),
			'priority' => 8,
			'panel' => 'aravalli_frontpage_sections',
		)
	);
	
	// Content Head
	$wp_customize->add_setting(
		'funfact_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 11,
		)
	);

	$wp_customize->add_control(
	'funfact_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','aravalli-pro'),
			'section' => 'funfact_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add Funfact
	 */
	
		$wp_customize->add_setting( 'funfact_contents', 
			array(
			 'sanitize_callback' => 'aravalli_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 8,
			'default' => aravalli_get_funfact_default()
			)
		);
		
		$wp_customize->add_control( 
			new Aravalli_Repeater( $wp_customize, 
				'funfact_contents', 
					array(
						'label'   => esc_html__('Funfact','aravalli-pro'),
						'section' => 'funfact_setting',
						'add_field_label'                   => esc_html__( 'Add New', 'aravalli-pro' ),
						'item_name'                         => esc_html__( 'Funfact', 'aravalli-pro' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_text_control' => true,
					) 
				) 
			);
			
	// funfact column // 
	$wp_customize->add_setting(
    	'funfact_sec_column',
    	array(
	        'default'			=> '3',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_select',
			'priority' => 9,
		)
	);	

	$wp_customize->add_control(
		'funfact_sec_column',
		array(
		    'label'   		=> __('Funfact Column','aravalli-pro'),
		    'section' 		=> 'funfact_setting',
			'type'			=> 'select',
			'choices'        => 
			array(
				'12' => __( '1 column', 'aravalli-pro' ),
				'6' => __( '2 column', 'aravalli-pro' ),
				'4' => __( '3 column', 'aravalli-pro' ),
				'3' => __( '4 column', 'aravalli-pro' ),
			) 
		) 
	);
	
	
	// Background Head
	$wp_customize->add_setting(
		'funfact_bg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 11,
		)
	);

	$wp_customize->add_control(
	'funfact_bg_head',
		array(
			'type' => 'hidden',
			'label' => __('Background','aravalli-pro'),
			'section' => 'funfact_setting',
		)
	);
	
	// Background Image // 
    $wp_customize->add_setting( 
    	'funfact_bg_img' , 
    	array(
			'default' 			=> esc_url(get_template_directory_uri() .'/assets/images/bg/fun-fact-bg.jpg'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_url',	
			'priority' => 12,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'funfact_bg_img' ,
		array(
			'label'          => esc_html__( 'Background Image', 'aravalli-pro'),
			'section'        => 'funfact_setting',
		) 
	));
	
	// Background Attachment // 
	$wp_customize->add_setting( 
		'funfact_back_attach' , 
			array(
			'default' => 'scroll',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_select',
			'priority'  => 13,
		) 
	);
	
	$wp_customize->add_control(
	'funfact_back_attach' , 
		array(
			'label'          => __( 'Background Attachment', 'aravalli-pro' ),
			'section'        => 'funfact_setting',
			'type'           => 'select',
			'choices'        => 
			array(
				'inherit' => __( 'Inherit', 'aravalli-pro' ),
				'scroll' => __( 'Scroll', 'aravalli-pro' ),
				'fixed'   => __( 'Fixed', 'aravalli-pro' )
			) 
		) 
	);
}

add_action( 'customize_register', 'aravalli_funfact_setting' );

// Funfact selective refresh
function aravalli_funfact_section_partials( $wp_customize ){
	// Funfact content
	$wp_customize->selective_refresh->add_partial( 'funfact_contents', array(
		'selector'            => '.fun-fact .funfact-content'
	) );
	}

add_action( 'customize_register', 'aravalli_funfact_section_partials' );
