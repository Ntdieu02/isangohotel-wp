<?php
function news25_advertise2_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
/*=========================================
Advertise Section
=========================================*/
	$wp_customize->add_section(
		'advertise2_setting', array(
			'title' => esc_html__( 'Advertise Section', 'clever-fox' ),
			'priority' => 2,
			'panel' => 'news25_frontpage_sections',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_advertise2' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_checkbox',
			
		) 
	);

	$wp_customize->add_control(
	'hide_show_advertise2', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'advertise2_setting',
			'type'        => 'checkbox'
		) 
	);	
	
	//  Image // 
	$wp_customize->add_setting( 
		'advertise2_img' , 
		array(
			'default' 			=> esc_url(get_template_directory_uri() .'/assets/images/ads/adv2.jpg'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_url',
		) 
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'advertise2_img' ,
		array(
			'label'          => esc_html__( 'Advertise Image', 'clever-fox'),
			'section'        => 'advertise2_setting',
		) 
	));	
	
	//  Url // 
	$wp_customize->add_setting( 
		'advertise2_url' , 
		array(			
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_url',
		) 
	);

	$wp_customize->add_control( 
	'advertise2_url' ,
		array(
			'label'          => esc_html__( 'Advertise Link', 'clever-fox'),
			'section'        => 'advertise2_setting',
		) 
	);	
	
	/* Tab */
	$wp_customize->add_setting( 
		'advertise2_newtab' , 
			array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
			'default' => 'false'
		) 
	);

	$wp_customize->add_control(
	'advertise2_newtab', 
		array(
			'label'	      => esc_html__( 'Open In New Tab', 'clever-fox' ),
			'section'     => 'advertise2_setting',
			'type'        => 'checkbox'
		) 
	);
	
	/* Nofollow */
	$wp_customize->add_setting( 
		'advertise2_nofollow' , 
			array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
			'default' => 'false'
		) 
	);

	$wp_customize->add_control(
	'advertise2_nofollow', 
		array(
			'label'	      => esc_html__( 'Add \'nofollow\' to Link', 'clever-fox' ),
			'section'     => 'advertise2_setting',
			'type'        => 'checkbox'
		) 
	);

}

add_action( 'customize_register', 'news25_advertise2_setting' );