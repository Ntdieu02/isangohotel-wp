<?php
function aravalli_promotional_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Promotional Section
	=========================================*/
	$wp_customize->add_section(
		'promotional_setting', array(
			'title' => esc_html__( 'Promotional Section', 'aravalli-pro' ),
			'priority' => 9,
			'panel' => 'aravalli_frontpage_sections',
		)
	);
	
	// Content Head
	$wp_customize->add_setting(
		'promotional_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 11,
		)
	);

	$wp_customize->add_control(
	'promotional_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','aravalli-pro'),
			'section' => 'promotional_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add Promotional
	 */
	
		$wp_customize->add_setting( 'promotional_contents', 
			array(
			 'sanitize_callback' => 'aravalli_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 8,
			'default' => aravalli_get_promotional_default()
			)
		);
		
		$wp_customize->add_control( 
			new Aravalli_Repeater( $wp_customize, 
				'promotional_contents', 
					array(
						'label'   => esc_html__('Promotional','aravalli-pro'),
						'section' => 'promotional_setting',
						'add_field_label'                   => esc_html__( 'Add New', 'aravalli-pro' ),
						'item_name'                         => esc_html__( 'Promotional', 'aravalli-pro' ),
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_text2_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
			
	// promotional column // 
	$wp_customize->add_setting(
    	'promotional_sec_column',
    	array(
	        'default'			=> '4',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_select',
			'priority' => 9,
		)
	);	

	$wp_customize->add_control(
		'promotional_sec_column',
		array(
		    'label'   		=> __('Promotional Column','aravalli-pro'),
		    'section' 		=> 'promotional_setting',
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
}

add_action( 'customize_register', 'aravalli_promotional_setting' );

// Promotional selective refresh
function aravalli_promotional_section_partials( $wp_customize ){
	// Promotional content
	$wp_customize->selective_refresh->add_partial( 'promotional_contents', array(
		'selector'            => '.promostional .promostional-wrapper'
	) );
	}

add_action( 'customize_register', 'aravalli_promotional_section_partials' );
