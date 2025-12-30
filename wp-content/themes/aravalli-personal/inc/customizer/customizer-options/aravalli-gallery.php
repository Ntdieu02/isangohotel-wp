<?php
function aravalli_gallery_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Gallery  Section
	=========================================*/
	$wp_customize->add_section(
		'gallery_setting', array(
			'title' => esc_html__( 'Gallery Section', 'aravalli-pro' ),
			'priority' => 6,
			'panel' => 'aravalli_frontpage_sections',
		)
	);
	
	// Gallery content Section // 
	
	$wp_customize->add_setting(
		'gallery_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'gallery_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','aravalli-pro'),
			'section' => 'gallery_setting',
		)
	);
	/**
	 * Customizer Repeater for add service
	 */
	
		$wp_customize->add_setting( 'gallery_content', 
			array(
			 'sanitize_callback' => 'aravalli_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 8,
			 'default' => aravalli_get_gallery_default()
			)
		);
		
		$wp_customize->add_control( 
			new Aravalli_Repeater( $wp_customize, 
				'gallery_content', 
					array(
						'label'   => esc_html__('Gallery','aravalli-pro'),
						'section' => 'gallery_setting',
						'add_field_label'                   => esc_html__( 'Add New', 'aravalli-pro' ),
						'item_name'                         => esc_html__( 'Gallery', 'aravalli-pro' ),
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control' => true,
					) 
				) 
			);
			
	// Gallery column // 
	$wp_customize->add_setting(
    	'gallery_column',
    	array(
	        'default'			=> '5',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_select',
			'priority' => 5,
		)
	);	

	$wp_customize->add_control(
		'gallery_column',
		array(
		    'label'   		=> __('Gallery Column','aravalli-pro'),
		    'section' 		=> 'gallery_setting',
			'type'			=> 'select',
			'choices'        => 
			array(
				'2' => __( '2 Column', 'aravalli-pro' ),
				'3' => __( '3 Column', 'aravalli-pro' ),
				'4' => __( '4 Column', 'aravalli-pro' ),
				'5' => __( '5 Column', 'aravalli-pro' ),
			) 
		) 
	);
	
}

add_action( 'customize_register', 'aravalli_gallery_setting' );