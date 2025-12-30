<?php
function news25_advertise5_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
/*=========================================
Advertise Section
=========================================*/
	$wp_customize->add_section(
		'advertise5_setting', array(
			'title' => esc_html__( 'Advertise Section 2', 'clever-fox' ),
			'priority' => 4,
			'panel' => 'news25_frontpage_sections',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_advertise5' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_checkbox',
			
		) 
	);

	$wp_customize->add_control(
	'hide_show_advertise5', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'advertise5_setting',
			'type'        => 'checkbox'
		) 
	);	
	
	//  Image // 
	$wp_customize->add_setting( 
		'advertise5_img' , 
		array(
			'default' 			=> esc_url(get_template_directory_uri() .'/assets/images/ads/adv5.jpg'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_url',
		) 
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'advertise5_img' ,
		array(
			'label'          => esc_html__( 'Advertise Image', 'clever-fox'),
			'section'        => 'advertise5_setting',
		) 
	));	
	
	//  Url // 
	$wp_customize->add_setting( 
		'advertise5_url' , 
		array(			
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_url',
		) 
	);

	$wp_customize->add_control( 
	'advertise5_url' ,
		array(
			'label'          => esc_html__( 'Advertise Link', 'clever-fox'),
			'section'        => 'advertise5_setting',
		) 
	);	
	
	/* Tab */
	$wp_customize->add_setting( 
		'advertise5_newtab' , 
			array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control(
	'advertise5_newtab', 
		array(
			'label'	      => esc_html__( 'Open In New Tab', 'clever-fox' ),
			'section'     => 'advertise5_setting',
			'type'        => 'checkbox'
		) 
	);
	
	/* Nofollow */
	$wp_customize->add_setting( 
		'advertise5_nofollow' , 
			array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control(
	'advertise5_nofollow', 
		array(
			'label'	      => esc_html__( 'Add \'nofollow\' to Link', 'clever-fox' ),
			'section'     => 'advertise5_setting',
			'type'        => 'checkbox'
		) 
	);

}

add_action( 'customize_register', 'news25_advertise5_setting' );