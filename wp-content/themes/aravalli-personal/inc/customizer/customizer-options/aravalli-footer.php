<?php
function aravalli_footer( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'footer_section', 
		array(
			'priority'      => 34,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer', 'aravalli-pro'),
		) 
	);
	/*=========================================
	Footer Above
	=========================================*/	
	$wp_customize->add_section(
        'footer_above',
        array(
            'title' 		=> __('Footer Above','aravalli-pro'),
			'panel'  		=> 'footer_section',
			'priority'      => 2,
		)
    );
	// hide/show
	$wp_customize->add_setting( 
		'hs_above_footer' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'transport'         => $selective_refresh,
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'hs_above_footer', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'aravalli-pro' ),
			'section'     => 'footer_above',
			'type'        => 'checkbox'
		) 
	);	
	//content
	$wp_customize->add_setting( 'footer_above_content', 
		array(
			 'sanitize_callback' => 'aravalli_repeater_sanitize',
			 'default' => aravalli_get_footer_above_default(),
			 'transport'         => $selective_refresh,
			 'priority' => 2,
			)
		);
		
		$wp_customize->add_control( 
			new ARAVALLI_Repeater( $wp_customize, 
				'footer_above_content', 
					array(
						'label'   => esc_html__('Content','aravalli-pro'),
						'section' => 'footer_above',
						'add_field_label'                   => esc_html__( 'Add New', 'aravalli-pro' ),
						'item_name'                         => esc_html__( 'Content', 'aravalli-pro' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_link_control' => true,
						'customizer_repeater_color_control' => true,
					) 
				) 
			);	
			
	// Footer Setting Section // 
	$wp_customize->add_section(
        'footer_copy_Section',
        array(
            'title' 		=> __('Below Footer','aravalli-pro'),
			'panel'  		=> 'footer_section',
			'priority'      => 4,
		)
    );

	if ( class_exists( 'Aravalli_Customize_Control_Radio_Image' ) ) {

		$wp_customize->add_setting(
			'footer_bottom_layout', array(
				'sanitize_callback' => 'aravalli_sanitize_select',
				'default' => 'layout-1',
			)
		);

		$wp_customize->add_control(
			new Aravalli_Customize_Control_Radio_Image(
				$wp_customize, 'footer_bottom_layout', array(
					'label'     => esc_html__( 'Layout', 'aravalli-pro' ),
					'section'   => 'footer_copy_Section',
					'priority'  => 2,
					'choices'   => array(
						'disable' => array(
							'url' => apply_filters( 'aravalli-disable', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/none.svg' )),
						),
						'layout-1' => array(
							'url' => apply_filters( 'aravalli-layout-1', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/layout-center.svg' )),
						),
						'layout-2' => array(
							'url' => apply_filters( 'aravalli-layout-2', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
					),
				)
			)
		);
	}	
	
	$wp_customize->add_setting( 
		'footer_bottom_1' , 
			array(
			'default' => __('custom', 'aravalli-pro' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_select',
		) 
	);

	$wp_customize->add_control(
	'footer_bottom_1' , 
		array(
			'label'          => __( 'Section 1', 'aravalli-pro' ),
			'section'        => 'footer_copy_Section',
			'settings'   	 => 'footer_bottom_1',
			'priority'      => 3,
			'type'           => 'select',
			'choices'        => 
			array(
				'none'       => __( 'None', 'aravalli-pro' ),
				'custom' => __( 'Text / Html', 'aravalli-pro' ),
				'widget' => __( 'Widget', 'aravalli-pro' ),
				'menu'   => __( 'Footer Menu', 'aravalli-pro' )
			) 
		) 
	);
	
	
	// footer first text // 
	$aravalli_footer_copyright = esc_html__('Copyright &copy; [current_year] [site_title] | Powered by [theme_author]', 'aravalli-pro' );
	$wp_customize->add_setting(
    	'footer_first_custom',
    	array(
			'default' => $aravalli_footer_copyright,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
		)
	);	

	$wp_customize->add_control( 
		'footer_first_custom',
		array(
		    'label'   		=> __('Section 1 Custom Text','aravalli-pro'),
		    'section'		=> 'footer_copy_Section',
			'type' 			=> 'textarea',
			'priority'      => 4,
			'transport'         => $selective_refresh,
		)  
	);	
	
	$wp_customize->add_setting( 
		'footer_bottom_2' , 
			array(
			'default' =>'menu',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_select',
		) 
	);

	$wp_customize->add_control(
	'footer_bottom_2' , 
		array(
			'label'          => __( 'Section 2', 'aravalli-pro' ),
			'section'        => 'footer_copy_Section',
			'settings'   	 => 'footer_bottom_2',
			'priority'      => 5,
			'type'           => 'select',
			'choices'        => 
			array(
				'none'       => __( 'None', 'aravalli-pro' ),
				'custom' => __( 'Text / Html', 'aravalli-pro' ),
				'widget' => __( 'Widget', 'aravalli-pro' ),
				'menu'   => __( 'Footer Menu', 'aravalli-pro' ),
			) 
		) 
	);
	
	
	/**
	 * Customizer Repeater
	 */
		// $wp_customize->add_setting( 'footer_icon', 
			// array(
			 // 'sanitize_callback' => 'aravalli_repeater_sanitize',
			 // 'priority' => 2,
			 // 'default' => aravalli_get_payment_icon_default()
		// )
		// );
		
		// $wp_customize->add_control( 
			// new ARAVALLI_Repeater( $wp_customize, 
				// 'footer_icon', 
					// array(
						// 'label'   => esc_html__('Payment Icons','aravalli-pro'),
						// 'section' => 'footer_copy_Section',
						// 'customizer_repeater_icon_control' => true,
						// 'customizer_repeater_link_control' => true,
					// ) 
				// ) 
			// );
			
	// footer second text // 
	$wp_customize->add_setting(
    	'footer_second_custom',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
		)
	);	

	$wp_customize->add_control( 
		'footer_second_custom',
		array(
		    'label'   		=> __('Section 2 Custom Text','aravalli-pro'),
		    'section'		=> 'footer_copy_Section',
			'type' 			=> 'textarea',
			'priority'      => 6,
		)  
	);	

	// Footer Widget // 
	$wp_customize->add_section(
        'footer_widget',
        array(
            'title' 		=> __('Footer Widget Area','aravalli-pro'),
			'panel'  		=> 'footer_section',
			'priority'      => 3,
		)
    );
	
	// Widget Layout
	$wp_customize->add_setting(
		'footer_widget_display'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'footer_widget_display',
		array(
			'type' => 'hidden',
			'label' => __('Widget Layout','aravalli-pro'),
			'section' => 'footer_widget',
			'priority'  => 1,
		)
	);
	
	if ( class_exists( 'Aravalli_Customize_Control_Radio_Image' ) ) {

		$wp_customize->add_setting(
			'footer_widget_layout', array(
				'sanitize_callback' => 'aravalli_sanitize_text',
				'default' => '4',
			)
		);

		$wp_customize->add_control(
			new Aravalli_Customize_Control_Radio_Image(
				$wp_customize, 'footer_widget_layout', array(
					'label'     => esc_html__( 'Widget Layout', 'aravalli-pro' ),
					'section'   => 'footer_widget',
					'priority'  => 2,
					'choices'   => array(
						'disable' => array(
							'url' => apply_filters( 'disable', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/none.svg' ),
						),
						'1' => array(
							'url' => apply_filters( '1', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/widget-1.svg' ),
						),
						'2' => array(
							'url' => apply_filters( '2', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/widget-2.svg' ),
						),
						'3' => array(
							'url' => apply_filters( '3', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/widget-3.svg' ),
						),
						'4' => array(
							'url' => apply_filters( '4', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/widget-4.svg' ),
						),
					),
				)
			)
		);
	}
	
	
	// Footer BG // 
	$wp_customize->add_section(
        'footer_background',
        array(
            'title' 		=> __('Background','aravalli-pro'),
			'panel'  		=> 'footer_section',
			'priority'      => 5,
		)
    );
	
	$wp_customize->add_setting(
	'footer_text_color', 
	array(
		'default' => '#ffffff',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'priority'  => 4,
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'footer_text_color', 
			array(
				'label'      => __( 'Text Color', 'aravalli-pro'),
				'section'    => 'footer_background',
			) 
		) 
	);
	
	$wp_customize->add_setting( 
		'footer_bg' , 
			array(
			'default' => 'image',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_select',
		) 
	);

	$wp_customize->add_control(
	'footer_bg' , 
		array(
			'label'          => __( 'Background', 'aravalli-pro' ),
			'section'        => 'footer_background',
			'priority'      => 5,
			'type'           => 'select',
			'choices'        => 
			array(
				'image' => __( 'Image', 'aravalli-pro' ),
				'color' => __( 'color', 'aravalli-pro' ),
			) 
		) 
	);
	
	
	// Background Image // 
    $wp_customize->add_setting( 
    	'footer_bg_img' , 
    	array(
			'default' 			=> get_template_directory_uri() .'/assets/images/bg/footer-bg.jpg',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_url',	
			'priority' => 10,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'footer_bg_img' ,
		array(
			'label'          => esc_html__( 'Background Image', 'aravalli-pro'),
			'section'        => 'footer_background',
		) 
	));
	
	// Image Opacity // 
	if ( class_exists( 'Aravalli_Customizer_Range_Control' ) ) {
	$wp_customize->add_setting(
    	'footer_bg_img_opacity',
    	array(
	        'default'			=> '0.75',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_range_value',
			'priority'  => 11,
		)
	);
	$wp_customize->add_control( 
	new Aravalli_Customizer_Range_Control( $wp_customize, 'footer_bg_img_opacity', 
		array(
			'label'      => __( 'Opacity', 'aravalli-pro'),
			'section'  => 'footer_background',
			 'media_query'   => false,
                'input_attr'    => array(
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 1,
                        'step'          => 0.1,
                        'default_value' => 0.6,
                    ),
                ),
		) ) 
	);
	}
	
	$wp_customize->add_setting(
	'footer_overlay_color', 
	array(
		'default' => '#000000',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'priority'  => 12,
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'footer_overlay_color', 
			array(
				'label'      => __( 'Overlay Color', 'aravalli-pro'),
				'section'    => 'footer_background',
			) 
		) 
	);
	
	
	$wp_customize->add_setting(
	'footer_bg_color', 
	array(
		'default' => '#3b3a3a',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'priority'  => 12,
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'footer_bg_color', 
			array(
				'label'      => __( 'Background Color', 'aravalli-pro'),
				'section'    => 'footer_background',
			) 
		) 
	);

}
add_action( 'customize_register', 'aravalli_footer' );
// Footer selective refresh
function aravalli_footer_partials( $wp_customize ){

	// hide show Social
	$wp_customize->selective_refresh->add_partial(
		'hs_above_footer', array(
			'selector' => '.footer-contacts',
			'container_inclusive' => true,
			'render_callback' => 'footer_above',
			'fallback_refresh' => true,
		)
	);
	
	// footer_first_custom
	$wp_customize->selective_refresh->add_partial( 'footer_first_custom', array(
		'selector'            => '.footer-copyright .copyright-text',
		'settings'            => 'footer_first_custom',
		'render_callback'  => 'aravalli_footer_first_custom_render_callback',
	
	) );
	
	// footer_above_content
	$wp_customize->selective_refresh->add_partial( 'footer_above_content', array(
		'selector'            => '.footer-wrapper .social-box',
	
	) );
	}

add_action( 'customize_register', 'aravalli_footer_partials' );

// footer_first_custom
function aravalli_footer_first_custom_render_callback() {
	return get_theme_mod( 'footer_first_custom' );
}