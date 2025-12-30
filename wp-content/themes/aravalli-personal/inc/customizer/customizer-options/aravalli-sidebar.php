<?php
function aravalli_sidebar_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	

	/*=========================================
	Aravalli Sidebar
	=========================================*/
	$wp_customize->add_section(
        'aravalli_blog_settings',
        array(
        	'priority'      => 3,
            'title' 		=> __('Sidebar','aravalli-pro'),
			'panel' => 'aravalli_general',
		)
    );
	
	if ( class_exists( 'Aravalli_Customize_Control_Radio_Image' ) ) {
		// Default pages
		$wp_customize->add_setting(
			'aravalli_default_pg_layout', array(
				'sanitize_callback' => 'aravalli_sanitize_select',
				'default' => 'aravalli_rsb',
			)
		);

		$wp_customize->add_control(
			new Aravalli_Customize_Control_Radio_Image(
				$wp_customize, 'aravalli_default_pg_layout', array(
					'label'     => esc_html__( 'Default Page Layout', 'aravalli-pro' ),
					'section'   => 'aravalli_blog_settings',
					'priority'  => 1,
					'choices'   => array(
						'aravalli_lsb' => array(
							'url' => apply_filters( 'aravalli_lsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/lsb.svg' )),
						),
						'aravalli_fullwidth' => array(
							'url' => apply_filters( 'aravalli_fullwidth', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
						'aravalli_rsb' => array(
							'url' => apply_filters( 'aravalli_rsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/rsb.svg' )),
						),
					),
				)
			)
		);
		// Archive pages
		$wp_customize->add_setting(
			'archive_pg_layout', array(
				'sanitize_callback' => 'aravalli_sanitize_select',
				'default' => 'aravalli_rsb',
			)
		);

		$wp_customize->add_control(
			new Aravalli_Customize_Control_Radio_Image(
				$wp_customize, 'archive_pg_layout', array(
					'label'     => esc_html__( 'Archive Page Layout', 'aravalli-pro' ),
					'section'   => 'aravalli_blog_settings',
					'priority'  => 2,
					'choices'   => array(
						'aravalli_lsb' => array(
							'url' => apply_filters( 'aravalli_lsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/lsb.svg' )),
						),
						'aravalli_fullwidth' => array(
							'url' => apply_filters( 'aravalli_fullwidth', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
						'aravalli_rsb' => array(
							'url' => apply_filters( 'aravalli_rsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/rsb.svg' )),
						),
					),
				)
			)
		);
		
		// Single page
		$wp_customize->add_setting(
			'blog_single_layout', array(
				'sanitize_callback' => 'aravalli_sanitize_select',
				'default' => 'aravalli_rsb',
			)
		);

		$wp_customize->add_control(
			new Aravalli_Customize_Control_Radio_Image(
				$wp_customize, 'blog_single_layout', array(
					'label'     => esc_html__( 'Single Page Layout', 'aravalli-pro' ),
					'section'   => 'aravalli_blog_settings',
					'priority'  => 3,
					'choices'   => array(
						'aravalli_lsb' => array(
							'url' => apply_filters( 'aravalli_lsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/lsb.svg' )),
						),
						'aravalli_fullwidth' => array(
							'url' => apply_filters( 'aravalli_fullwidth', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
						'aravalli_rsb' => array(
							'url' => apply_filters( 'aravalli_rsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/rsb.svg' )),
						),
					),
				)
			)
		);
		
		// Blog page
		$wp_customize->add_setting(
			'blog_page_layout', array(
				'sanitize_callback' => 'aravalli_sanitize_select',
				'default' => 'aravalli_rsb',
			)
		);

		$wp_customize->add_control(
			new Aravalli_Customize_Control_Radio_Image(
				$wp_customize, 'blog_page_layout', array(
					'label'     => esc_html__( 'Blog Page Layout', 'aravalli-pro' ),
					'section'   => 'aravalli_blog_settings',
					'priority'  => 4,
					'choices'   => array(
						'aravalli_lsb' => array(
							'url' => apply_filters( 'aravalli_lsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/lsb.svg' )),
						),
						'aravalli_fullwidth' => array(
							'url' => apply_filters( 'aravalli_fullwidth', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
						'aravalli_rsb' => array(
							'url' => apply_filters( 'aravalli_rsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/rsb.svg' )),
						),
					),
				)
			)
		);
		
		// Search page
		$wp_customize->add_setting(
			'search_pg_layout', array(
				'sanitize_callback' => 'aravalli_sanitize_select',
				'default' => 'aravalli_rsb',
			)
		);

		$wp_customize->add_control(
			new Aravalli_Customize_Control_Radio_Image(
				$wp_customize, 'search_pg_layout', array(
					'label'     => esc_html__( 'Search Page Layout', 'aravalli-pro' ),
					'section'   => 'aravalli_blog_settings',
					'priority'  => 5,
					'choices'   => array(
						'aravalli_lsb' => array(
							'url' => apply_filters( 'aravalli_lsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/lsb.svg' )),
						),
						'aravalli_fullwidth' => array(
							'url' => apply_filters( 'aravalli_fullwidth', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
						'aravalli_rsb' => array(
							'url' => apply_filters( 'aravalli_rsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/rsb.svg' )),
						),
					),
				)
			)
		);
	}
	
	// Widget options
	$wp_customize->add_setting(
		'sidebar_options'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'sidebar_options',
		array(
			'type' => 'hidden',
			'label' => __('Options','aravalli-pro'),
			'section' => 'aravalli_blog_settings',
			'priority'  => 6
		)
	);
	// Sidebar Width 
	if ( class_exists( 'Aravalli_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'aravalli_sidebar_width',
			array(
				'default'	      => esc_html__( '35', 'aravalli-pro' ),
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'aravalli_sanitize_range_value',
				'transport'         => 'postMessage'
			)
		);
		$wp_customize->add_control( 
		new Aravalli_Customizer_Range_Control( $wp_customize, 'aravalli_sidebar_width', 
			array(
				'label'      => __( 'Sidebar Width', 'aravalli-pro' ),
				'section'  => 'aravalli_blog_settings',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop' => array(
							'min'           => 25,
							'max'           => 50,
							'step'          => 1,
							'default_value' => 35,
						),
					),
				'priority'  => 7
			) ) 
		);
	}
	
	// Widget Typography
	$wp_customize->add_setting(
		'sidebar_typography'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'sidebar_typography',
		array(
			'type' => 'hidden',
			'label' => __('Typography','aravalli-pro'),
			'section' => 'aravalli_blog_settings',
			'priority'  => 21,
		)
	);
	
	// Widget Title // 
	if ( class_exists( 'Aravalli_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'sidebar_wid_ttl_size',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'aravalli_sanitize_range_value',
				'transport'         => 'postMessage'
			)
		);
		$wp_customize->add_control( 
		new Aravalli_Customizer_Range_Control( $wp_customize, 'sidebar_wid_ttl_size', 
			array(
				'label'      => __( 'Widget Title Font Size', 'aravalli-pro' ),
				'section'  => 'aravalli_blog_settings',
				'priority'  => 22,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 5,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 20,
                    ),
                    'tablet'  => array(
                        'min'           => 5,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 20,
                    ),
                    'desktop' => array(
                        'min'           => 5,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 20,
                    ),
                ),
			) ) 
		);
	}
}
add_action( 'customize_register', 'aravalli_sidebar_settings' );