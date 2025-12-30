<?php
function aravalli_newsletter_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Newsletter  Section
	=========================================*/
	$wp_customize->add_section(
		'newsletter_setting', array(
			'title' => esc_html__( 'Newsletter Section', 'aravalli-pro' ),
			'priority' => 10,
			'panel' => 'aravalli_frontpage_sections',
		)
	);
	
	// Newsletter Content Section // 
	$wp_customize->add_setting(
		'newsletter_contents'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'newsletter_contents',
		array(
			'type' => 'hidden',
			'label' => __('Content','aravalli-pro'),
			'section' => 'newsletter_setting',
		)
	);
	
	
	//  Title // 
	$wp_customize->add_setting(
    	'newsletter_title',
    	array(
	        'default'			=> __('Vivanta Work With All Devices','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'newsletter_title',
		array(
		    'label'   => __('Title','aravalli-pro'),
		    'section' => 'newsletter_setting',
			'type'           => 'text',
		)  
	);
	
	// Description // 
	$wp_customize->add_setting(
    	'newsletter_desc',
    	array(
	        'default'			=> __("Lorem Ipsum is simply dummy text of the printing and typese industry. Lorem Ipsum has been the industry's standard mytext ever since the 1500s, when an unknown printer took",'aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'newsletter_desc',
		array(
		    'label'   => __('Description','aravalli-pro'),
		    'section' => 'newsletter_setting',
			'type'           => 'textarea',
		)  
	);
	
	
	// shortcode // 
	$wp_customize->add_setting(
    	'newsletter_shortcode',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'newsletter_shortcode',
		array(
		    'label'   => __('Shortcode','aravalli-pro'),
		    'section' => 'newsletter_setting',
			'type'           => 'textarea',
		)  
	);
	
	//  Title // 
	$wp_customize->add_setting(
    	'newsletter_app_title',
    	array(
	        'default'			=> __('Give A Miss Call To Get An App Link','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 7,
		)
	);	
	
	$wp_customize->add_control( 
		'newsletter_app_title',
		array(
		    'label'   => __('App Title','aravalli-pro'),
		    'section' => 'newsletter_setting',
			'type'           => 'text',
		)  
	);
	
	/**
	 * Customizer Repeater for add Button
	 */
	
		$wp_customize->add_setting( 'newsletter_btn', 
			array(
			 'sanitize_callback' => 'aravalli_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 8,
			'default' => aravalli_get_news_btn_default()
			)
		);
		
		$wp_customize->add_control( 
			new Aravalli_Repeater( $wp_customize, 
				'newsletter_btn', 
					array(
						'label'   => esc_html__('News Button','aravalli-pro'),
						'section' => 'newsletter_setting',
						'add_field_label'                   => esc_html__( 'Add New', 'aravalli-pro' ),
						'item_name'                         => esc_html__( 'News Button', 'aravalli-pro' ),
						'customizer_repeater_image_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
			
	// Right Image // 
    $wp_customize->add_setting( 
    	'newsletter_right_img' , 
    	array(
			'default' 			=> esc_url(get_template_directory_uri() .'/assets/images/newsLetter/mobi_mock.png'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_url',	
			'priority' => 9,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'newsletter_right_img' ,
		array(
			'label'          => esc_html__( 'Right Image', 'aravalli-pro'),
			'section'        => 'newsletter_setting',
		) 
	));	
	
	
	
	// Background Head
	$wp_customize->add_setting(
		'newsletter_bg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 11,
		)
	);

	$wp_customize->add_control(
	'newsletter_bg_head',
		array(
			'type' => 'hidden',
			'label' => __('Background','aravalli-pro'),
			'section' => 'newsletter_setting',
		)
	);
	
	// Background Image // 
    $wp_customize->add_setting( 
    	'newsletter_bg_img' , 
    	array(
			'default' 			=> esc_url(get_template_directory_uri() .'/assets/images/newsLetter/pattern-bg.png'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_url',	
			'priority' => 12,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'newsletter_bg_img' ,
		array(
			'label'          => esc_html__( 'Background Image', 'aravalli-pro'),
			'section'        => 'newsletter_setting',
		) 
	));
	
	// Background Attachment // 
	$wp_customize->add_setting( 
		'newsletter_back_attach' , 
			array(
			'default' => 'scroll',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_select',
			'priority'  => 13,
		) 
	);
	
	$wp_customize->add_control(
	'newsletter_back_attach' , 
		array(
			'label'          => __( 'Background Attachment', 'aravalli-pro' ),
			'section'        => 'newsletter_setting',
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

add_action( 'customize_register', 'aravalli_newsletter_setting' );

// Newsletter selective refresh
function aravalli_newsletter_section_partials( $wp_customize ){
	
	// newsletter_title
	$wp_customize->selective_refresh->add_partial( 'newsletter_title', array(
		'selector'            => '.news-home .news-info h4',
		'settings'            => 'newsletter_title',
		'render_callback'  => 'aravalli_newsletter_title_render_callback',
	
	) );
	
	// newsletter_desc
	$wp_customize->selective_refresh->add_partial( 'newsletter_desc', array(
		'selector'            => '.news-home .news-info p',
		'settings'            => 'newsletter_desc',
		'render_callback'  => 'aravalli_newsletter_desc_render_callback',
	) );
	
	// newsletter_app_title
	$wp_customize->selective_refresh->add_partial( 'newsletter_app_title', array(
		'selector'            => '.news-home .news-info h2',
		'settings'            => 'newsletter_app_title',
		'render_callback'  => 'aravalli_newsletter_app_title_render_callback',
	) );
	
	// newsletter_btn
	$wp_customize->selective_refresh->add_partial( 'newsletter_btn', array(
		'selector'            => '.news-home .news-info .news-btns',
	) );
	
	}

add_action( 'customize_register', 'aravalli_newsletter_section_partials' );

// newsletter_title
function aravalli_newsletter_title_render_callback() {
	return get_theme_mod( 'newsletter_title' );
}


// newsletter_desc
function aravalli_newsletter_desc_render_callback() {
	return get_theme_mod( 'newsletter_desc' );
}


// newsletter_app_title
function aravalli_newsletter_app_title_render_callback() {
	return get_theme_mod( 'newsletter_app_title' );
}
