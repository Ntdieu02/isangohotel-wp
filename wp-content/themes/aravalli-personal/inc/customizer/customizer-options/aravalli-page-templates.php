<?php
function aravalli_pages_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Aravalli Page Templates
	=========================================*/
	$wp_customize->add_panel(
		'aravalli_page_templates', array(
			'priority' => 33,
			'title' => esc_html__( 'Page Templates', 'aravalli-pro' ),
		)
	);
	
	
	/*=========================================
	About Page
	=========================================*/
	$wp_customize->add_section(
		'about_pg_Settings', array(
			'title' => esc_html__( 'About Page', 'aravalli-pro' ),
			'priority' => 1,
			'panel' => 'aravalli_page_templates',
		)
	);
	
	// Settings
	$wp_customize->add_setting(
		'about_pg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'about_pg_head',
		array(
			'type' => 'hidden',
			'label' => __('About Contents','aravalli-pro'),
			'section' => 'about_pg_Settings',
		)
	);
	
	// About Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hs_pg_about' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hs_pg_about', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'aravalli-pro' ),
			'section'     => 'about_pg_Settings',
			'type'        => 'checkbox'
		) 
	);
	// hs_pg_about
	$wp_customize->selective_refresh->add_partial(
		'hs_pg_about', array(
			'selector' => '#about-section',
			'container_inclusive' => true,
			'render_callback' => 'about_pg_Settings',
			'fallback_refresh' => true,
		)
	);
	
	// About Title // 
	$wp_customize->add_setting(
    	'pg_about_title',
    	array(
	        'default'			=> __('Luxury Rooms & Resorts','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_title',
		array(
		    'label'   => __('Title','aravalli-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	// About Subtitle // 
	$wp_customize->add_setting(
    	'pg_about_subtitle',
    	array(
	        'default'			=> __('Welcome To Aravalli','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_subtitle',
		array(
		    'label'   => __('Subtitle','aravalli-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	
	// About Description // 
	$wp_customize->add_setting(
    	'pg_about_desc',
    	array(
	        'default'			=> 'Duis vel nisl lacinia, facilisis in, consectetur leon vestibulum et ullamcorper tortor<br>
                            leon placerat mauris.fringilla est sodales dui, non mattis tortor volutpat vitae. as<br>
                            leon placerat mauris. fringilla est sodales dui, non mattis tortor volutpat vitae. as</p>
                        <p>faucibus nam a pretium sapien nunc quis congue purus nunc feugiat nec purus a ultricies suspendisse in fringilla est sodales dui, non mattis tortor volutpat vitae.a<br>
                        leon placerat mauris.',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_desc',
		array(
		    'label'   => __('Description','aravalli-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'textarea',
		)  
	);
	
	// Button Label // 
	$wp_customize->add_setting(
    	'pg_about_btn_lbl',
    	array(
	        'default'			=> __('Book Now','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_btn_lbl',
		array(
		    'label'   => __('Button Label','aravalli-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	
	// Button Link // 
	$wp_customize->add_setting(
    	'pg_about_btn_url',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_url',
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_btn_url',
		array(
		    'label'   => __('Button URL','aravalli-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	
	//  Image // 
    $wp_customize->add_setting( 
    	'pg_about_img' , 
    	array(
			'default' 			=> esc_url(get_template_directory_uri() .'/assets/images/about/welcome-bg.jpg'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_url',	
			'priority' => 6,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'pg_about_img' ,
		array(
			'label'          => esc_html__( 'Image', 'aravalli-pro'),
			'section'        => 'about_pg_Settings',
		) 
	));
	
	$wp_customize->add_setting(
    	'pg_about_video_link',
    	array(
			'default'			=> 'https://www.youtube.com/watch?v=abmKeAgdR2M&list=PLLoQ2d0Iz2fOri-fMIL6pzjb_a5ekvj2M&index=8',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_url',
			'priority' => 7,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_video_link',
		array(
		    'label'   => __('Video Link','aravalli-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'text',
		)  
	);



	/*=========================================
	Testimonial
	=========================================*/	
	// Settings
	$wp_customize->add_setting(
		'about_pg_testimonial_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 15,
		)
	);

	$wp_customize->add_control(
	'about_pg_testimonial_head',
		array(
			'type' => 'hidden',
			'label' => __('Testimonial Section','aravalli-pro'),
			'section' => 'about_pg_Settings',
		)
	);
	
	//  Hide/ Show // 
	$wp_customize->add_setting( 
		'hs_pg_about_testimonial' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 16,
		) 
	);
	
	$wp_customize->add_control(
	'hs_pg_about_testimonial', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'aravalli-pro' ),
			'section'     => 'about_pg_Settings',
			'type'        => 'checkbox'
		) 
	);
	
	
	
	/*=========================================
	Why Choose US
	=========================================*/	
	// Settings
	$wp_customize->add_setting(
		'about_pg_why_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 17,
		)
	);

	$wp_customize->add_control(
	'about_pg_why_head',
		array(
			'type' => 'hidden',
			'label' => __('Why Choose Us','aravalli-pro'),
			'section' => 'about_pg_Settings',
		)
	);
	
	//  Hide/ Show // 
	$wp_customize->add_setting( 
		'hs_pg_about_why' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 18,
		) 
	);
	
	$wp_customize->add_control(
	'hs_pg_about_why', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'aravalli-pro' ),
			'section'     => 'about_pg_Settings',
			'type'        => 'checkbox'
		) 
	);
	
	
	//  Title // 
	$wp_customize->add_setting(
    	'pg_about_why_ttl',
    	array(
	        'default'			=> __('Why','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 19,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_why_ttl',
		array(
		    'label'   => __('Title','aravalli-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	
	//  Subtitle // 
	$wp_customize->add_setting(
    	'pg_about_why_sub',
    	array(
	        'default'			=> __('Choose Us','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 20,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_why_sub',
		array(
		    'label'   => __('Subtitle','aravalli-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	//  Description // 
	$wp_customize->add_setting(
    	'pg_about_why_desc',
    	array(
	        'default'			=> __('Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 21,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_why_desc',
		array(
		    'label'   => __('Description','aravalli-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'textarea',
		)  
	);
	
	/**
	 * Customizer Repeater for add faq
	 */
	
		$wp_customize->add_setting( 'pg_about_why_content', 
			array(
			 'sanitize_callback' => 'aravalli_repeater_sanitize',
			 'priority' => 22,
			 'transport'         => $selective_refresh,
			 'default' => aravalli_get_abt_faq_default()
			)
		);
		
		$wp_customize->add_control( 
			new Aravalli_Repeater( $wp_customize, 
				'pg_about_why_content', 
					array(
						'label'   => esc_html__('FAQ','aravalli-pro'),
						'section' => 'about_pg_Settings',
						'add_field_label'                   => esc_html__( 'Add New', 'aravalli-pro' ),
						'item_name'                         => esc_html__( 'FAQ', 'aravalli-pro' ),
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control' => true,
					) 
				) 
			);
	
	
	
	
	/*=========================================
	Amenities
	=========================================*/	
	// Settings
	$wp_customize->add_setting(
		'about_pg_why_amenities'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 31,
		)
	);

	$wp_customize->add_control(
	'about_pg_why_amenities',
		array(
			'type' => 'hidden',
			'label' => __('Amenities Section','aravalli-pro'),
			'section' => 'about_pg_Settings',
		)
	);
	
	//  Hide/ Show // 
	$wp_customize->add_setting( 
		'hs_pg_about_amenities' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 32,
		) 
	);
	
	$wp_customize->add_control(
	'hs_pg_about_amenities', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'aravalli-pro' ),
			'section'     => 'about_pg_Settings',
			'type'        => 'checkbox'
		) 
	);
	
	
	//  Title // 
	$wp_customize->add_setting(
    	'pg_about_amenities_ttl',
    	array(
	        'default'			=> __('Hotel','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 33,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_amenities_ttl',
		array(
		    'label'   => __('Title','aravalli-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	
	//  Subtitle // 
	$wp_customize->add_setting(
    	'pg_about_amenities_sub',
    	array(
	        'default'			=> __('Amenities','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 34,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_amenities_sub',
		array(
		    'label'   => __('Subtitle','aravalli-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	//  Description // 
	$wp_customize->add_setting(
    	'pg_about_amenities_desc',
    	array(
	        'default'			=> __("Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry's standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book.",'aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 35,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_amenities_desc',
		array(
		    'label'   => __('Description','aravalli-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'textarea',
		)  
	);
	
	
	
	/**
	 * Customizer Repeater for add amenities
	 */
	
		$wp_customize->add_setting( 'pg_about_amenities_content', 
			array(
			 'sanitize_callback' => 'aravalli_repeater_sanitize',
			 'priority' => 36,
			 'transport'         => $selective_refresh,
			 'default' => aravalli_get_amenities_default()
			)
		);
		
		$wp_customize->add_control( 
			new Aravalli_Repeater( $wp_customize, 
				'pg_about_amenities_content', 
					array(
						'label'   => esc_html__('Amenities','aravalli-pro'),
						'section' => 'about_pg_Settings',
						'add_field_label'                   => esc_html__( 'Add New', 'aravalli-pro' ),
						'item_name'                         => esc_html__( 'Amenities', 'aravalli-pro' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
			
			
	// Background Image // 
    $wp_customize->add_setting( 
    	'pg_about_amenities_bg_img' , 
    	array(
			'default' 			=> esc_url(get_template_directory_uri() .'/assets/images/about/amenities-bg.jpg'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_url',	
			'priority' => 37,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'pg_about_amenities_bg_img' ,
		array(
			'label'          => esc_html__( 'Background Image', 'aravalli-pro'),
			'section'        => 'about_pg_Settings',
		) 
	));
	
	// Background Attachment // 
	$wp_customize->add_setting( 
		'pg_about_amenities_back_attach' , 
			array(
			'default' => 'scroll',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_select',
			'priority'  => 38,
		) 
	);
	
	$wp_customize->add_control(
	'pg_about_amenities_back_attach' , 
		array(
			'label'          => __( 'Background Attachment', 'aravalli-pro' ),
			'section'        => 'about_pg_Settings',
			'type'           => 'select',
			'choices'        => 
			array(
				'inherit' => __( 'Inherit', 'aravalli-pro' ),
				'scroll' => __( 'Scroll', 'aravalli-pro' ),
				'fixed'   => __( 'Fixed', 'aravalli-pro' )
			) 
		) 
	);		
	
	
	/*=========================================
	Team
	=========================================*/	
	// Settings
	$wp_customize->add_setting(
		'about_pg_team'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 41,
		)
	);

	$wp_customize->add_control(
	'about_pg_team',
		array(
			'type' => 'hidden',
			'label' => __('Team Section','aravalli-pro'),
			'section' => 'about_pg_Settings',
		)
	);
	
	//  Hide/ Show // 
	$wp_customize->add_setting( 
		'hs_pg_about_team' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 42,
		) 
	);
	
	$wp_customize->add_control(
	'hs_pg_about_team', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'aravalli-pro' ),
			'section'     => 'about_pg_Settings',
			'type'        => 'checkbox'
		) 
	);
	
	
	//  Title // 
	$wp_customize->add_setting(
    	'pg_about_team_ttl',
    	array(
	        'default'			=> __('Our','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 43,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_team_ttl',
		array(
		    'label'   => __('Title','aravalli-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	
	//  Subtitle // 
	$wp_customize->add_setting(
    	'pg_about_team_sub',
    	array(
	        'default'			=> __('Experts','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 44,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_team_sub',
		array(
		    'label'   => __('Subtitle','aravalli-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	//  Description // 
	$wp_customize->add_setting(
    	'pg_about_team_desc',
    	array(
	        'default'			=> __("Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry's standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book.",'aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 45,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_team_desc',
		array(
		    'label'   => __('Description','aravalli-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'textarea',
		)  
	);
	
	/**
	 * Customizer Repeater for add Team
	 */
	
		$wp_customize->add_setting( 'pg_about_team_contents', 
			array(
			 'sanitize_callback' => 'aravalli_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 46,
			 'default' => aravalli_get_team_default()
			)
		);
		
		$wp_customize->add_control( 
			new Aravalli_Repeater( $wp_customize, 
				'pg_about_team_contents', 
					array(
						'label'   => esc_html__('Team','aravalli-pro'),
						'section' => 'about_pg_Settings',
						'add_field_label'                   => esc_html__( 'Add New', 'aravalli-pro' ),
						'item_name'                         => esc_html__( 'Team', 'aravalli-pro' ),
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_repeater_control' => true,
					) 
				) 
			);
	// Team column // 
	$wp_customize->add_setting(
    	'pg_about_team_column',
    	array(
	        'default'			=> '3',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_select',
			'priority' => 47,
		)
	);	

	$wp_customize->add_control(
		'pg_about_team_column',
		array(
		    'label'   		=> __('Team Column','aravalli-pro'),
		    'section' 		=> 'about_pg_Settings',
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
	
	
	/*=========================================
	Certificates
	=========================================*/	
	// Settings
	$wp_customize->add_setting(
		'about_pg_certificates'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 55,
		)
	);

	$wp_customize->add_control(
	'about_pg_certificates',
		array(
			'type' => 'hidden',
			'label' => __('Certificates Section','aravalli-pro'),
			'section' => 'about_pg_Settings',
		)
	);
	
	//  Hide/ Show // 
	$wp_customize->add_setting( 
		'hs_pg_about_certificates' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 56,
		) 
	);
	
	$wp_customize->add_control(
	'hs_pg_about_certificates', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'aravalli-pro' ),
			'section'     => 'about_pg_Settings',
			'type'        => 'checkbox'
		) 
	);
	
	
	//  Title // 
	$wp_customize->add_setting(
    	'pg_about_certificates_ttl',
    	array(
	        'default'			=> __('Our','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 57,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_certificates_ttl',
		array(
		    'label'   => __('Title','aravalli-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	
	//  Subtitle // 
	$wp_customize->add_setting(
    	'pg_about_certificates_sub',
    	array(
	        'default'			=> __('Certificates','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 58,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_certificates_sub',
		array(
		    'label'   => __('Subtitle','aravalli-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	//  Description // 
	$wp_customize->add_setting(
    	'pg_about_certificates_desc',
    	array(
	        'default'			=> __("Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry's standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book.",'aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 59,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_certificates_desc',
		array(
		    'label'   => __('Description','aravalli-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'textarea',
		)  
	);
	
	
	/**
	 * Customizer Repeater for add Certificates
	 */
	
		$wp_customize->add_setting( 'pg_about_certificates', 
			array(
			 'sanitize_callback' => 'aravalli_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 60,
			 'default' => aravalli_get_certificates_default()
			)
		);
		
		$wp_customize->add_control( 
			new Aravalli_Repeater( $wp_customize, 
				'pg_about_certificates', 
					array(
						'label'   => esc_html__('Certificates','aravalli-pro'),
						'section' => 'about_pg_Settings',
						'add_field_label'                   => esc_html__( 'Add New', 'aravalli-pro' ),
						'item_name'                         => esc_html__( 'Certificates', 'aravalli-pro' ),
						'customizer_repeater_image_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
			
			
			
	/*=========================================
	Funfact
	=========================================*/	
	// Settings
	$wp_customize->add_setting(
		'about_pg_funfact'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 61,
		)
	);

	$wp_customize->add_control(
	'about_pg_funfact',
		array(
			'type' => 'hidden',
			'label' => __('Funfact Section','aravalli-pro'),
			'section' => 'about_pg_Settings',
		)
	);
	
	//  Hide/ Show // 
	$wp_customize->add_setting( 
		'hs_pg_about_funfact' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 62,
		) 
	);
	
	$wp_customize->add_control(
	'hs_pg_about_funfact', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'aravalli-pro' ),
			'section'     => 'about_pg_Settings',
			'type'        => 'checkbox'
		) 
	);		
	
	
	/*=========================================
	CTA
	=========================================*/	
	// Settings
	$wp_customize->add_setting(
		'about_pg_cta'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 66,
		)
	);

	$wp_customize->add_control(
	'about_pg_cta',
		array(
			'type' => 'hidden',
			'label' => __('CTA Section','aravalli-pro'),
			'section' => 'about_pg_Settings',
		)
	);
	
	//  Hide/ Show // 
	$wp_customize->add_setting( 
		'hs_pg_about_cta' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 67,
		) 
	);
	
	$wp_customize->add_control(
	'hs_pg_about_cta', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'aravalli-pro' ),
			'section'     => 'about_pg_Settings',
			'type'        => 'checkbox'
		) 
	);	

	//  Title // 
	$wp_customize->add_setting(
    	'cta_ttl',
    	array(
	        'default'			=> 'Make a reservation by phone: <a href="tel:(+233) 123 457789">(+233) 123 457789</a>',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 68,
		)
	);	
	
	$wp_customize->add_control( 
		'cta_ttl',
		array(
		    'label'   => __('Title','aravalli-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'textarea',
		)  
	);	
	
	//  Email // 
	$wp_customize->add_setting(
    	'cta_email',
    	array(
	        'default'			=> '<a href="mailto:email@companyname.com">email@companyname.com</a>',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 69,
		)
	);	
	
	$wp_customize->add_control( 
		'cta_email',
		array(
		    'label'   => __('Email','aravalli-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'textarea',
		)  
	);	
	
	//  Button Label // 
	$wp_customize->add_setting(
    	'cta_btn_lbl',
    	array(
	        'default'			=> 'Reservation',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 70,
		)
	);	
	
	$wp_customize->add_control( 
		'cta_btn_lbl',
		array(
		    'label'   => __('Button Label','aravalli-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'text',
		)  
	);	
	
	//  Button Label // 
	$wp_customize->add_setting(
    	'cta_btn_url',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_url',
			'priority' => 70,
		)
	);	
	
	$wp_customize->add_control( 
		'cta_btn_url',
		array(
		    'label'   => __('Button Link','aravalli-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'text',
		)  
	);	
	
	
	
	/*=========================================
	packages Page
	=========================================*/
	$wp_customize->add_section(
		'package_pg_Settings', array(
			'title' => esc_html__( 'Packages Page', 'aravalli-pro' ),
			'priority' => 2,
			'panel' => 'aravalli_page_templates',
		)
	);
	
	/*=========================================
	packages
	=========================================*/
	$wp_customize->add_setting(
		'package_pg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'package_pg_head',
		array(
			'type' => 'hidden',
			'label' => __('Packages','aravalli-pro'),
			'section' => 'package_pg_Settings',
		)
	);
	
	//  Hide/ Show // 
	$wp_customize->add_setting( 
		'hs_pg_packages' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hs_pg_packages', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'aravalli-pro' ),
			'section'     => 'package_pg_Settings',
			'type'        => 'checkbox'
		) 
	);
	
	
	//  Title // 
	$wp_customize->add_setting(
    	'pg_packages_ttl',
    	array(
	        'default'			=> __('Explore','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 3,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_packages_ttl',
		array(
		    'label'   => __('Title','aravalli-pro'),
		    'section' => 'package_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	
	//  Subtitle // 
	$wp_customize->add_setting(
    	'pg_packages_sub',
    	array(
	        'default'			=> __('Aravalli Packages','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_packages_sub',
		array(
		    'label'   => __('Subtitle','aravalli-pro'),
		    'section' => 'package_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	//  Description // 
	$wp_customize->add_setting(
    	'pg_packages_desc',
    	array(
	        'default'			=> __("Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry's standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book.",'aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_packages_desc',
		array(
		    'label'   => __('Description','aravalli-pro'),
		    'section' => 'package_pg_Settings',
			'type'           => 'textarea',
		)  
	);
	
	//  Category
	$wp_customize->add_setting(
    'pg_packages_category_id',
		array(
		'capability' => 'edit_theme_options',
		'default' => 1,
		'priority' => 8,
		)
	);	
	
	$wp_customize->add_control( new Aravalli_Package_Category_Control( $wp_customize, 
	'pg_packages_category_id', 
		array(
		'label'   => __('Select category','aravalli-pro'),
		'section' => 'package_pg_Settings',
		) 
	) );
	
	// column // 
	$wp_customize->add_setting(
    	'pg_packages_column',
    	array(
	        'default'			=> '6',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_select',
			'priority' => 6,
		)
	);	

	$wp_customize->add_control(
		'pg_packages_column',
		array(
		    'label'   		=> __('Package Column','aravalli-pro'),
		    'section' 		=> 'package_pg_Settings',
			'type'			=> 'select',
			'choices'        => 
			array(
				'6' => __( '2 column', 'aravalli-pro' ),
				'4' => __( '3 column', 'aravalli-pro' ),
				'3' => __( '4 column', 'aravalli-pro' ),
			) 
		) 
	);
	
	// pg_packages_display_num
	if ( class_exists( 'Aravalli_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'pg_packages_display_num',
			array(
				'default' => '4',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'aravalli_sanitize_range_value',
				'priority' => 7,
			)
		);
		$wp_customize->add_control( 
		new Aravalli_Customizer_Range_Control( $wp_customize, 'pg_packages_display_num', 
			array(
				'label'      => __( 'No of Package Display', 'aravalli-pro' ),
				'section'  => 'package_pg_Settings',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop' => array(
							'min'    => 1,
							'max'    => 500,
							'step'   => 1,
							'default_value' => 4,
						),
					),
			) ) 
		);
	}
	
	
	/*=========================================
	packages Special
	=========================================*/
	$wp_customize->add_setting(
		'package_pg_offer_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 11,
		)
	);

	$wp_customize->add_control(
	'package_pg_offer_head',
		array(
			'type' => 'hidden',
			'label' => __('Special Offer','aravalli-pro'),
			'section' => 'package_pg_Settings',
		)
	);
	
	//  Hide/ Show // 
	$wp_customize->add_setting( 
		'hs_pg_packages_offer' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 12,
		) 
	);
	
	$wp_customize->add_control(
	'hs_pg_packages_offer', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'aravalli-pro' ),
			'section'     => 'package_pg_Settings',
			'type'        => 'checkbox'
		) 
	);
	
	
	//  Title // 
	$wp_customize->add_setting(
    	'pg_packages_offer_ttl',
    	array(
	        'default'			=> __('Explore','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 13,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_packages_offer_ttl',
		array(
		    'label'   => __('Title','aravalli-pro'),
		    'section' => 'package_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	
	//  Subtitle // 
	$wp_customize->add_setting(
    	'pg_packages_offer_sub',
    	array(
	        'default'			=> __('Special Offers','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 14,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_packages_offer_sub',
		array(
		    'label'   => __('Subtitle','aravalli-pro'),
		    'section' => 'package_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	//  Description // 
	$wp_customize->add_setting(
    	'pg_packages_offer_desc',
    	array(
	        'default'			=> __("Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry's standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book.",'aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 15,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_packages_offer_desc',
		array(
		    'label'   => __('Description','aravalli-pro'),
		    'section' => 'package_pg_Settings',
			'type'           => 'textarea',
		)  
	);
	
	//  Category
	$wp_customize->add_setting(
    'pg_packages_offer_category_id',
		array(
		'capability' => 'edit_theme_options',
		'default' => 1,
		'priority' => 16,
		)
	);	
	
	$wp_customize->add_control( new Aravalli_Package_Category_Control( $wp_customize, 
	'pg_packages_offer_category_id', 
		array(
		'label'   => __('Select category','aravalli-pro'),
		'section' => 'package_pg_Settings',
		) 
	) );
	
	// column // 
	$wp_customize->add_setting(
    	'pg_packages_offer_column',
    	array(
	        'default'			=> '4',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_select',
			'priority' => 16,
		)
	);	

	$wp_customize->add_control(
		'pg_packages_offer_column',
		array(
		    'label'   		=> __('Package Column','aravalli-pro'),
		    'section' 		=> 'package_pg_Settings',
			'type'			=> 'select',
			'choices'        => 
			array(
				'6' => __( '2 column', 'aravalli-pro' ),
				'4' => __( '3 column', 'aravalli-pro' ),
				'3' => __( '4 column', 'aravalli-pro' ),
			) 
		) 
	);
	
	// pg_packages_display_num
	if ( class_exists( 'Aravalli_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'pg_packages_offer_display_num',
			array(
				'default' => '6',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'aravalli_sanitize_range_value',
				'priority' => 17,
			)
		);
		$wp_customize->add_control( 
		new Aravalli_Customizer_Range_Control( $wp_customize, 'pg_packages_offer_display_num', 
			array(
				'label'      => __( 'No of Package Display', 'aravalli-pro' ),
				'section'  => 'package_pg_Settings',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop' => array(
							'min'    => 1,
							'max'    => 500,
							'step'   => 1,
							'default_value' => 6,
						),
					),
			) ) 
		);
	}
	
	
	
	/*=========================================
	Gallery Page
	=========================================*/
	$wp_customize->add_section(
		'gallery_pg_Settings', array(
			'title' => esc_html__( 'Gallery Page', 'aravalli-pro' ),
			'priority' => 3,
			'panel' => 'aravalli_page_templates',
		)
	);
	
	$wp_customize->add_setting(
		'gallery_pg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'gallery_pg_head',
		array(
			'type' => 'hidden',
			'label' => __('Gallery Page','aravalli-pro'),
			'section' => 'gallery_pg_Settings',
		)
	);
	
	
	//  Title // 
	$wp_customize->add_setting(
    	'pg_gallery_ttl',
    	array(
	        'default'			=> __('Our','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 3,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_gallery_ttl',
		array(
		    'label'   => __('Title','aravalli-pro'),
		    'section' => 'gallery_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	
	//  Subtitle // 
	$wp_customize->add_setting(
    	'pg_gallery_sub',
    	array(
	        'default'			=> __('Gallery','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_gallery_sub',
		array(
		    'label'   => __('Subtitle','aravalli-pro'),
		    'section' => 'gallery_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	//  Description // 
	$wp_customize->add_setting(
    	'pg_gallery_desc',
    	array(
	        'default'			=> __("Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry's standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book.",'aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_gallery_desc',
		array(
		    'label'   => __('Description','aravalli-pro'),
		    'section' => 'gallery_pg_Settings',
			'type'           => 'textarea',
		)  
	);
	
	
	/**
	 * Customizer Repeater for add Gallery
	 */
	
		$wp_customize->add_setting( 'pg_gallery_content', 
			array(
			 'default' => aravalli_get_gallery_default(),
			 'sanitize_callback' => 'aravalli_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 8,
			)
		);
		
		$wp_customize->add_control( 
			new Aravalli_Repeater( $wp_customize, 
				'pg_gallery_content', 
					array(
						'label'   => esc_html__('Gallery','aravalli-pro'),
						'section' => 'gallery_pg_Settings',
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
    	'pg_gallery_column',
    	array(
	        'default'			=> '4',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_select',
			'priority' => 5,
		)
	);	

	$wp_customize->add_control(
		'pg_gallery_column',
		array(
		    'label'   		=> __('Gallery Column','aravalli-pro'),
		    'section' 		=> 'gallery_pg_Settings',
			'type'			=> 'select',
			'choices'        => 
			array(
				'6' => __( '2 Column', 'aravalli-pro' ),
				'4' => __( '3 Column', 'aravalli-pro' ),
				'3' => __( '4 Column', 'aravalli-pro' ),
			) 
		) 
	);
	
	
	/*=========================================
	Room Page
	=========================================*/
	$wp_customize->add_section(
		'room_pg_Settings', array(
			'title' => esc_html__( 'Room Page', 'aravalli-pro' ),
			'priority' => 4,
			'panel' => 'aravalli_page_templates',
		)
	);
	
	$wp_customize->add_setting(
		'room_pg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'room_pg_head',
		array(
			'type' => 'hidden',
			'label' => __('Room Page','aravalli-pro'),
			'section' => 'room_pg_Settings',
		)
	);
	
	
	//  Title // 
	$wp_customize->add_setting(
    	'pg_room_ttl',
    	array(
	        'default'			=> __('Explore','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 3,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_room_ttl',
		array(
		    'label'   => __('Title','aravalli-pro'),
		    'section' => 'room_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	
	//  Subtitle // 
	$wp_customize->add_setting(
    	'pg_room_sub',
    	array(
	        'default'			=> __('Rooms & Suits','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_room_sub',
		array(
		    'label'   => __('Subtitle','aravalli-pro'),
		    'section' => 'room_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	//  Description // 
	$wp_customize->add_setting(
    	'pg_room_desc',
    	array(
	        'default'			=> __("Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry's standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book.",'aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_room_desc',
		array(
		    'label'   => __('Description','aravalli-pro'),
		    'section' => 'room_pg_Settings',
			'type'           => 'textarea',
		)  
	);
	
	/*=========================================
	Blog  Page
	=========================================*/
	$wp_customize->add_section(
		'blog_pg_setting', array(
			'title' => esc_html__( 'Blog Page', 'aravalli-pro' ),
			'priority' => 10,
			'panel' => 'aravalli_page_templates',
		)
	);
	$wp_customize->add_setting(
		'blog_pg_grid_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'blog_pg_grid_head',
		array(
			'type' => 'hidden',
			'label' => __('Blog Grid','aravalli-pro'),
			'section' => 'blog_pg_setting',
		)
	);
	
	$wp_customize->add_setting(
    	'blog_pg_grid_load_btn',
    	array(
	        'default'			=> __('Load More','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'priority' => 3,
		)
	);	
	
	$wp_customize->add_control( 
		'blog_pg_grid_load_btn',
		array(
		    'label'   => __('Load More Button','aravalli-pro'),
		    'section' => 'blog_pg_setting',
			'type'           => 'text',
		)  
	);
	
	// Blog Masonary
	$wp_customize->add_setting(
		'blog_pg_masonary_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'blog_pg_masonary_head',
		array(
			'type' => 'hidden',
			'label' => __('Blog Masonary','aravalli-pro'),
			'section' => 'blog_pg_setting',
		)
	);
	
	
	// Blog Category
	$wp_customize->add_setting(
    'blog_pg_masonary_cat_id',
		array(
		'capability' => 'edit_theme_options',
		'default' => 1,
		'priority' => 8,
		)
	);	
	$wp_customize->add_control( new Category_Dropdown_Custom_Control( $wp_customize, 
	'blog_pg_masonary_cat_id', 
		array(
		'label'   => __('Select category','aravalli-pro'),
		'section' => 'blog_pg_setting',
		) 
	) );
	
	
	// Blog Header Section // 
	$wp_customize->add_setting(
		'pg_blog_sticky_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'pg_blog_sticky_headings',
		array(
			'type' => 'hidden',
			'label' => __('Blog Sticky','aravalli-pro'),
			'section' => 'blog_pg_setting',
		)
	);
	
	if ( class_exists( 'Aravalli_Customize_Control_Radio_Image' ) ) {
		$wp_customize->add_setting(
			'aravalli_sticky_type', array(
				'sanitize_callback' => 'aravalli_sanitize_select',
				'default' => 'aravalli_rsb',
				'priority'  => 8,
			)
		);

		$wp_customize->add_control(
			new Aravalli_Customize_Control_Radio_Image(
				$wp_customize, 'aravalli_sticky_type', array(
					'label'     => esc_html__( 'Default Page Layout', 'aravalli-pro' ),
					'section'   => 'blog_pg_setting',
					'choices'   => array(
						'square' => array(
							'url' => apply_filters( 'square', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/sticky-suare.png' )),
						),
						'circle' => array(
							'url' => apply_filters( 'circle', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/sticky-circle.png' )),
						),
					),
				)
			)
		);
	}
	
	$wp_customize->add_setting(
    	'sticky_content',
    	array(
	        'default'			=> '<i class="fa fa-thumb-tack"></i>',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'priority'  => 9
		)
	);
	
	$wp_customize->add_control( 
		'sticky_content',
		array(
		    'label'   => __('Sticky Content','aravalli-pro'),
		    'section' => 'blog_pg_setting',
			'type' => 'text',
		)  
	);
	
	// Sticky Bg Color
	$wp_customize->add_setting(
	'sticky_bg_color', 
	array(
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => '#1ed12f',
		'priority'  => 10
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'sticky_bg_color', 
			array(
				'label'      => __( 'Bg Color', 'aravalli-pro' ),
				'section'    => 'blog_pg_setting',
				'settings'   => 'sticky_bg_color',
			) 
		) 
	);	
	
	
	
	/*=========================================
	Contact  Page
	=========================================*/
	$wp_customize->add_section(
		'contact_pg_setting', array(
			'title' => esc_html__( 'Contact Page', 'aravalli-pro' ),
			'priority' => 10,
			'panel' => 'aravalli_page_templates',
		)
	);
	$wp_customize->add_setting(
		'contact_pg_ct_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'contact_pg_ct_head',
		array(
			'type' => 'hidden',
			'label' => __('Contact Section','aravalli-pro'),
			'section' => 'contact_pg_setting',
		)
	);
	
	//  Hide/ Show // 
	$wp_customize->add_setting( 
		'contact_pg_ct_hs' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'contact_pg_ct_hs', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'aravalli-pro' ),
			'section'     => 'contact_pg_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// Title // 
	$wp_customize->add_setting(
    	'contact_pg_ct_ttl',
    	array(
	        'default'			=> __('Let’s Talk','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 2,
		)
	);	
	
	$wp_customize->add_control( 
		'contact_pg_ct_ttl',
		array(
		    'label'   => __('Title','aravalli-pro'),
		    'section' => 'contact_pg_setting',
			'type'           => 'text',
		)  
	);
	
	// Subtitle // 
	$wp_customize->add_setting(
    	'contact_pg_ct_subttl',
    	array(
	        'default'			=> __('Contact Us','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 3,
		)
	);	
	
	$wp_customize->add_control( 
		'contact_pg_ct_subttl',
		array(
		    'label'   => __('Subtitle','aravalli-pro'),
		    'section' => 'contact_pg_setting',
			'type'           => 'text',
		)  
	);
	
	
	// Description // 
	$wp_customize->add_setting(
    	'contact_pg_ct_desc',
    	array(
	        'default'			=> __('We are here when you need us.','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'contact_pg_ct_desc',
		array(
		    'label'   => __('Description','aravalli-pro'),
		    'section' => 'contact_pg_setting',
			'type'           => 'textarea',
		)  
	);
	
	/**
	 * Customizer Repeater for add Contact
	 */
	
		$wp_customize->add_setting( 'contact_pg_ct_contents', 
			array(
			 'sanitize_callback' => 'aravalli_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 5,
			'default' => aravalli_get_contact_pg_info_default()
			)
		);
		
		$wp_customize->add_control( 
			new Aravalli_Repeater( $wp_customize, 
				'contact_pg_ct_contents', 
					array(
						'label'   => esc_html__('Contact','aravalli-pro'),
						'section' => 'contact_pg_setting',
						'add_field_label'                   => esc_html__( 'Add New', 'aravalli-pro' ),
						'item_name'                         => esc_html__( 'Contact', 'aravalli-pro' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_text2_control' => true,
					) 
				) 
			);
	
	
	
	/*=========================================
	Map
	=========================================*/
	$wp_customize->add_setting(
		'contact_pg_map_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 8,
		)
	);

	$wp_customize->add_control(
	'contact_pg_map_head',
		array(
			'type' => 'hidden',
			'label' => __('Map','aravalli-pro'),
			'section' => 'contact_pg_setting',
		)
	);
	
	// Map Hide Show // 
	$wp_customize->add_setting(
    	'contact_pg_map_hs',
    	array(
	        'default'			=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'priority' => 9,
		)
	);	
	
	$wp_customize->add_control( 
		'contact_pg_map_hs',
		array(
		    'label'   => __('Hide / Show','aravalli-pro'),
		    'section' => 'contact_pg_setting',
			'type'           => 'checkbox',
		)  
	);
	
	//  Map Link // 
	$wp_customize->add_setting(
    	'contact_pg_map_link',
    	array(
	        'default'			=> 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1438544.2714565487!2d10.197676761709376!3d51.14314480954461!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1489634550185',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_url',
			'priority' => 10,
		)
	);	
	
	$wp_customize->add_control( 
		'contact_pg_map_link',
		array(
		    'label'   => __('Map Link','aravalli-pro'),
		    'section' => 'contact_pg_setting',
			'type'           => 'textarea',
		)  
	);
	
	
	
	/*=========================================
	Contact Form
	=========================================*/
	$wp_customize->add_setting(
		'contact_pg_form_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 11,
		)
	);

	$wp_customize->add_control(
	'contact_pg_form_head',
		array(
			'type' => 'hidden',
			'label' => __('Contact Form','aravalli-pro'),
			'section' => 'contact_pg_setting',
		)
	);
	
	//  Hide Show // 
	$wp_customize->add_setting(
    	'contact_pg_form_hs',
    	array(
	        'default'			=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'priority' => 12,
		)
	);	
	
	$wp_customize->add_control( 
		'contact_pg_form_hs',
		array(
		    'label'   => __('Hide / Show','aravalli-pro'),
		    'section' => 'contact_pg_setting',
			'type'           => 'checkbox',
		)  
	);
	
	//  Title // 
	$wp_customize->add_setting(
    	'contact_pg_form_ttl',
    	array(
	        'default'			=> __('Get In Touch','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 13,
		)
	);	
	
	$wp_customize->add_control( 
		'contact_pg_form_ttl',
		array(
		    'label'   => __('Title','aravalli-pro'),
		    'section' => 'contact_pg_setting',
			'type'           => 'text',
		)  
	);
	
	//  Shortcode // 
	$wp_customize->add_setting(
    	'contact_pg_form_shortcode',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'priority' => 14,
		)
	);	
	
	$wp_customize->add_control( 
		'contact_pg_form_shortcode',
		array(
		    'label'   => __('Shortcode','aravalli-pro'),
		    'section' => 'contact_pg_setting',
			'type'           => 'textarea',
		)  
	);
	
	/*=========================================
	Comming Soon  Page
	=========================================*/
	$wp_customize->add_section(
		'comming_soon_setting', array(
			'title' => esc_html__( 'Comming Soon Page', 'aravalli-pro' ),
			'priority' => 10,
			'panel' => 'aravalli_page_templates',
		)
	);
	$wp_customize->add_setting(
		'comming_soon_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'comming_soon_settings',
		array(
			'type' => 'hidden',
			'label' => __('Setting','aravalli-pro'),
			'section' => 'comming_soon_setting',
		)
	);
	
	// Enable Comming Soon // 
	$wp_customize->add_setting( 
		'enable_comming_soon' , 
			array(
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'enable_comming_soon', 
		array(
			'label'	      => esc_html__( 'Enable Comming Soon', 'aravalli-pro' ),
			'section'     => 'comming_soon_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// Enable Form // 
	$wp_customize->add_setting( 
		'enable_comming_soon_form' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'enable_comming_soon_form', 
		array(
			'label'	      => esc_html__( 'Enable Form', 'aravalli-pro' ),
			'section'     => 'comming_soon_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// Enable Social Icon // 
	$wp_customize->add_setting( 
		'enable_comming_soon_social' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'enable_comming_soon_social', 
		array(
			'label'	      => esc_html__( 'Enable Social Icon', 'aravalli-pro' ),
			'section'     => 'comming_soon_setting',
			'type'        => 'checkbox'
		) 
	);
	
	$wp_customize->add_setting(
		'comming_soon_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'comming_soon_head',
		array(
			'type' => 'hidden',
			'label' => __('Header','aravalli-pro'),
			'section' => 'comming_soon_setting',
		)
	);
	
	//  Logo // 
    $wp_customize->add_setting( 
    	'comming_soon_logo' , 
    	array(
			'default' 			=> get_template_directory_uri() .'/assets/images/comingsoon-logo.png',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_url',	
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'comming_soon_logo' ,
		array(
			'label'          => esc_html__( 'Logo', 'aravalli-pro'),
			'section'        => 'comming_soon_setting',
		) 
	));
	
	// Title // 
	$wp_customize->add_setting(
    	'comming_soon_pg_ttl',
    	array(
	        'default'			=> __('Aravalli is coming soon','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'priority' => 3,
		)
	);	
	
	$wp_customize->add_control( 
		'comming_soon_pg_ttl',
		array(
		    'label'   => __('Title','aravalli-pro'),
		    'section' => 'comming_soon_setting',
			'type'           => 'text',
		)  
	);
	
	// Description // 
	$wp_customize->add_setting(
    	'comming_soon_pg_desc',
    	array(
	        'default'			=> __("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.",'aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'priority' => 3,
		)
	);	
	
	$wp_customize->add_control( 
		'comming_soon_pg_desc',
		array(
		    'label'   => __('Description','aravalli-pro'),
		    'section' => 'comming_soon_setting',
			'type'           => 'textarea',
		)  
	);
	
	$wp_customize->add_setting(
		'comming_soon_time_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'comming_soon_time_head',
		array(
			'type' => 'hidden',
			'label' => __('Time','aravalli-pro'),
			'section' => 'comming_soon_setting',
		)
	);
	
	// Comming Soon Time // 
	$wp_customize->add_setting(
    	'comming_soon_pg_time',
    	array(
	        'default'			=> __('2021/01/01 12:00:00','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'twd_sanitize_date_time',
			'priority' => 5,
		)
	);	
	$wp_customize->add_control( 
		'comming_soon_pg_time',
		array(
		    'section' => 'comming_soon_setting',
			'type'     => 'date_time',
		)  
	);
	
	$wp_customize->add_setting(
		'comming_soon_form'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 6,
		)
	);

	$wp_customize->add_control(
	'comming_soon_form',
		array(
			'type' => 'hidden',
			'label' => __('Form','aravalli-pro'),
			'section' => 'comming_soon_setting',
		)
	);
	
	// Shortcode // 
	$wp_customize->add_setting(
    	'comming_soon_shortcode',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'comming_soon_shortcode',
		array(
		    'label'   => __('Shortcode','aravalli-pro'),
		    'section' => 'comming_soon_setting',
			'type'           => 'textarea',
		)  
	);
	
	
	$wp_customize->add_setting(
		'comming_soon_social'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'comming_soon_social',
		array(
			'type' => 'hidden',
			'label' => __('Social Icon','aravalli-pro'),
			'section' => 'comming_soon_setting',
		)
	);
	
	/**
	 * Customizer Repeater
	 */
		$wp_customize->add_setting( 'comming_soon_social_icons', 
			array(
			 'sanitize_callback' => 'aravalli_repeater_sanitize',
			 'priority' => 8,
			 'default' => aravalli_get_social_icon_default()
		)
		);
		
		$wp_customize->add_control( 
			new ARAVALLI_Repeater( $wp_customize, 
				'comming_soon_social_icons', 
					array(
						'label'   => esc_html__('Social Icons','aravalli-pro'),
						'section' => 'comming_soon_setting',
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);

	
	/*=========================================
	404  Page
	=========================================*/
	$wp_customize->add_section(
		'error_pg_setting', array(
			'title' => esc_html__( '404 Page', 'aravalli-pro' ),
			'priority' => 11,
			'panel' => 'aravalli_page_templates',
		)
	);
	$wp_customize->add_setting(
		'error_pg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'error_pg_head',
		array(
			'type' => 'hidden',
			'label' => __('404 Page','aravalli-pro'),
			'section' => 'error_pg_setting',
		)
	);	
	
	
	// Title // 
	$wp_customize->add_setting(
    	'error_pg_ttl',
    	array(
	        'default'			=> '4<span>0</span>4',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'priority' => 3,
		)
	);	
	
	$wp_customize->add_control( 
		'error_pg_ttl',
		array(
		    'label'   => __('Title','aravalli-pro'),
		    'section' => 'error_pg_setting',
			'type'           => 'text',
		)  
	);
	
	
	// Subtitle // 
	$wp_customize->add_setting(
    	'error_pg_subttl',
    	array(
	         'default'			=> __('Something Went Wrong','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'error_pg_subttl',
		array(
		    'label'   => __('Subtitle','aravalli-pro'),
		    'section' => 'error_pg_setting',
			'type'           => 'text',
		)  
	);
	
	$wp_customize->add_setting(
    	'error_pg_subttl2',
    	array(
	         'default'			=> __('Oops! That page can’t be found.','aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'error_pg_subttl2',
		array(
		    'label'   => __('Subtitle 2','aravalli-pro'),
		    'section' => 'error_pg_setting',
			'type'           => 'text',
		)  
	);
	
	$wp_customize->add_setting(
    	'error_pg_text',
    	array(
	         'default'			=> __("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummyever since the 1500s",'aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'error_pg_text',
		array(
		    'label'   => __('Description','aravalli-pro'),
		    'section' => 'error_pg_setting',
			'type'           => 'textarea',
		)  
	);
	
	$wp_customize->add_setting(
    	'error_pg_btn_lbl',
    	array(
	         'default'			=> __("Go To Home",'aravalli-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'error_pg_btn_lbl',
		array(
		    'label'   => __('Button Label','aravalli-pro'),
		    'section' => 'error_pg_setting',
			'type'           => 'text',
		)  
	);
	
	$wp_customize->add_setting(
    	'error_pg_btn_url',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'error_pg_btn_url',
		array(
		    'label'   => __('Button URL','aravalli-pro'),
		    'section' => 'error_pg_setting',
			'type'           => 'text',
		)  
	);
}

add_action( 'customize_register', 'aravalli_pages_setting' );

// selective refresh
function aravalli_pages_partials( $wp_customize ){
	
	// contact_pg_ct_ttl
	$wp_customize->selective_refresh->add_partial( 'contact_pg_ct_ttl', array(
		'selector'            => '.contact-section .heading-default h6',
		'settings'            => 'contact_pg_ct_ttl',
		'render_callback'  => 'aravalli_contact_pg_ct_ttl_render_callback',
	) );
	
	// contact_pg_ct_subttl
	$wp_customize->selective_refresh->add_partial( 'contact_pg_ct_subttl', array(
		'selector'            => '.contact-section .heading-default h3',
		'settings'            => 'contact_pg_ct_subttl',
		'render_callback'  => 'aravalli_contact_pg_ct_subttl_render_callback',
	) );
	
	// contact_pg_ct_desc
	$wp_customize->selective_refresh->add_partial( 'contact_pg_ct_desc', array(
		'selector'            => '.contact-section .heading-default p',
		'settings'            => 'contact_pg_ct_desc',
		'render_callback'  => 'aravalli_contact_pg_ct_desc_render_callback',
	) );
	
	// contact_pg_ct_contents
	$wp_customize->selective_refresh->add_partial( 'contact_pg_ct_contents', array(
		'selector'            => '.contact-section .contents',
	) );
	
	
	// contact_pg_form_ttl
	$wp_customize->selective_refresh->add_partial( 'contact_pg_form_ttl', array(
		'selector'            => '.contact-form .heading-form h3',
		'settings'            => 'contact_pg_form_ttl',
		'render_callback'  => 'aravalli_contact_pg_form_ttl_render_callback',
	) );
	
	
	
	// pg_room_ttl
	$wp_customize->selective_refresh->add_partial( 'pg_room_ttl', array(
		'selector'            => '.room-page .heading-default h6',
		'settings'            => 'pg_room_ttl',
		'render_callback'  => 'aravalli_pg_room_ttl_render_callback',
	) );
	
	// pg_room_sub
	$wp_customize->selective_refresh->add_partial( 'pg_room_sub', array(
		'selector'            => '.room-page .heading-default h3',
		'settings'            => 'pg_room_sub',
		'render_callback'  => 'aravalli_pg_room_sub_render_callback',
	) );
	
	// pg_room_desc
	$wp_customize->selective_refresh->add_partial( 'pg_room_desc', array(
		'selector'            => '.room-page .heading-default p',
		'settings'            => 'pg_room_desc',
		'render_callback'  => 'aravalli_pg_room_desc_render_callback',
	) );
	
	// pg_gallery_ttl
	$wp_customize->selective_refresh->add_partial( 'pg_gallery_ttl', array(
		'selector'            => '.gallery-page .heading-default h6',
		'settings'            => 'pg_gallery_ttl',
		'render_callback'  => 'aravalli_pg_gallery_ttl_render_callback',
	) );
	
	// pg_gallery_sub
	$wp_customize->selective_refresh->add_partial( 'pg_gallery_sub', array(
		'selector'            => '.gallery-page .heading-default h3',
		'settings'            => 'pg_gallery_sub',
		'render_callback'  => 'aravalli_pg_gallery_sub_render_callback',
	) );
	
	// pg_gallery_desc
	$wp_customize->selective_refresh->add_partial( 'pg_gallery_desc', array(
		'selector'            => '.gallery-page .heading-default p',
		'settings'            => 'pg_gallery_desc',
		'render_callback'  => 'aravalli_pg_gallery_desc_render_callback',
	) );
	
	// pg_packages_offer_ttl
	$wp_customize->selective_refresh->add_partial( 'pg_packages_offer_ttl', array(
		'selector'            => '.pg-packages-soffers .heading-default h6',
		'settings'            => 'pg_packages_offer_ttl',
		'render_callback'  => 'aravalli_pg_packages_offer_ttl_render_callback',
	) );
	
	// pg_packages_offer_sub
	$wp_customize->selective_refresh->add_partial( 'pg_packages_offer_sub', array(
		'selector'            => '.pg-packages-soffers .heading-default h3',
		'settings'            => 'pg_packages_offer_sub',
		'render_callback'  => 'aravalli_pg_packages_offer_sub_render_callback',
	) );
	
	// pg_packages_offer_desc
	$wp_customize->selective_refresh->add_partial( 'pg_packages_offer_desc', array(
		'selector'            => '.pg-packages-soffers .heading-default p',
		'settings'            => 'pg_packages_offer_desc',
		'render_callback'  => 'aravalli_pg_packages_offer_desc_render_callback',
	) );
	
	
	
	// pg_packages_ttl
	$wp_customize->selective_refresh->add_partial( 'pg_packages_ttl', array(
		'selector'            => '.pg-packages-offers .heading-default h6',
		'settings'            => 'pg_packages_ttl',
		'render_callback'  => 'aravalli_pg_packages_ttl_render_callback',
	) );
	
	// pg_packages_sub
	$wp_customize->selective_refresh->add_partial( 'pg_packages_sub', array(
		'selector'            => '.pg-packages-offers .heading-default h3',
		'settings'            => 'pg_packages_sub',
		'render_callback'  => 'aravalli_pg_packages_sub_render_callback',
	) );
	
	// pg_packages_desc
	$wp_customize->selective_refresh->add_partial( 'pg_packages_desc', array(
		'selector'            => '.pg-packages-offers .heading-default p',
		'settings'            => 'pg_packages_desc',
		'render_callback'  => 'aravalli_pg_packages_desc_render_callback',
	) );
	
	
	
	// pg_about_title
	$wp_customize->selective_refresh->add_partial( 'pg_about_title', array(
		'selector'            => '.about-section .heading-default h6',
		'settings'            => 'pg_about_title',
		'render_callback'  => 'aravalli_pg_about_title_render_callback',
	) );
	
	// pg_about_subtitle
	$wp_customize->selective_refresh->add_partial( 'pg_about_subtitle', array(
		'selector'            => '.about-section .heading-default h3',
		'settings'            => 'pg_about_subtitle',
		'render_callback'  => 'aravalli_pg_about_subtitle_render_callback',
	) );
	
	// pg_about_desc
	$wp_customize->selective_refresh->add_partial( 'pg_about_desc', array(
		'selector'            => '.about-section .about-panel .content',
		'settings'            => 'pg_about_desc',
		'render_callback'  => 'aravalli_pg_about_desc_render_callback',
	) );
	
	// pg_about_btn_lbl
	$wp_customize->selective_refresh->add_partial( 'pg_about_btn_lbl', array(
		'selector'            => '.about-section .about-panel a',
		'settings'            => 'pg_about_btn_lbl',
		'render_callback'  => 'aravalli_pg_about_btn_lbl_render_callback',
	) );
	
	
	
	// pg_about_why_ttl
	$wp_customize->selective_refresh->add_partial( 'pg_about_why_ttl', array(
		'selector'            => '.about-faq .heading-default h6',
		'settings'            => 'pg_about_why_ttl',
		'render_callback'  => 'aravalli_pg_about_why_ttl_render_callback',
	) );
	
	// pg_about_why_sub
	$wp_customize->selective_refresh->add_partial( 'pg_about_why_sub', array(
		'selector'            => '.about-faq .heading-default h3',
		'settings'            => 'pg_about_why_sub',
		'render_callback'  => 'aravalli_pg_about_why_sub_render_callback',
	) );
	
	// pg_about_why_desc
	$wp_customize->selective_refresh->add_partial( 'pg_about_why_desc', array(
		'selector'            => '.about-faq .heading-default p',
		'settings'            => 'pg_about_why_desc',
		'render_callback'  => 'aravalli_pg_about_why_desc_render_callback',
	) );
	
	// pg_about_why_content
	$wp_customize->selective_refresh->add_partial( 'pg_about_why_content', array(
		'selector'            => '.about-faq .why-choose',
	) );
	
	
	
	// pg_about_amenities_ttl
	$wp_customize->selective_refresh->add_partial( 'pg_about_amenities_ttl', array(
		'selector'            => '.amenities .heading-default h6',
		'settings'            => 'pg_about_amenities_ttl',
		'render_callback'  => 'aravalli_pg_about_amenities_ttl_render_callback',
	) );
	
	// pg_about_amenities_sub
	$wp_customize->selective_refresh->add_partial( 'pg_about_amenities_sub', array(
		'selector'            => '.amenities .heading-default h3',
		'settings'            => 'pg_about_amenities_sub',
		'render_callback'  => 'aravalli_pg_about_amenities_sub_render_callback',
	) );
	
	// pg_about_amenities_desc
	$wp_customize->selective_refresh->add_partial( 'pg_about_amenities_desc', array(
		'selector'            => '.amenities .heading-default p',
		'settings'            => 'pg_about_amenities_desc',
		'render_callback'  => 'aravalli_pg_about_amenities_desc_render_callback',
	) );
	
	// pg_about_amenities_content
	$wp_customize->selective_refresh->add_partial( 'pg_about_amenities_content', array(
		'selector'            => '.amenities .amenities-content',
	) );
	
	
	
	// pg_about_team_ttl
	$wp_customize->selective_refresh->add_partial( 'pg_about_team_ttl', array(
		'selector'            => '.team-wrapper .heading-default h6',
		'settings'            => 'pg_about_team_ttl',
		'render_callback'  => 'aravalli_pg_about_team_ttl_render_callback',
	) );
	
	// pg_about_team_sub
	$wp_customize->selective_refresh->add_partial( 'pg_about_team_sub', array(
		'selector'            => '.team-wrapper .heading-default h3',
		'settings'            => 'pg_about_team_sub',
		'render_callback'  => 'aravalli_pg_about_team_sub_render_callback',
	) );
	
	// pg_about_team_desc
	$wp_customize->selective_refresh->add_partial( 'pg_about_team_desc', array(
		'selector'            => '.team-wrapper .heading-default p',
		'settings'            => 'pg_about_team_desc',
		'render_callback'  => 'aravalli_pg_about_team_desc_render_callback',
	) );
	
	// pg_about_team_contents
	$wp_customize->selective_refresh->add_partial( 'pg_about_team_contents', array(
		'selector'            => '.team-wrapper .team-contents',
	) );
	
	
	
	// pg_about_certificates_ttl
	$wp_customize->selective_refresh->add_partial( 'pg_about_certificates_ttl', array(
		'selector'            => '.certificates .heading-default h6',
		'settings'            => 'pg_about_certificates_ttl',
		'render_callback'  => 'aravalli_pg_about_certificates_ttl_render_callback',
	) );
	
	// pg_about_certificates_sub
	$wp_customize->selective_refresh->add_partial( 'pg_about_certificates_sub', array(
		'selector'            => '.certificates .heading-default h3',
		'settings'            => 'pg_about_certificates_sub',
		'render_callback'  => 'aravalli_pg_about_certificates_sub_render_callback',
	) );
	
	// pg_about_certificates_desc
	$wp_customize->selective_refresh->add_partial( 'pg_about_certificates_desc', array(
		'selector'            => '.certificates .heading-default p',
		'settings'            => 'pg_about_certificates_desc',
		'render_callback'  => 'aravalli_pg_about_certificates_desc_render_callback',
	) );
	
	// pg_about_certificates
	$wp_customize->selective_refresh->add_partial( 'pg_about_certificates', array(
		'selector'            => '.certificates .partner-carousel',
	) );
	
	
	// cta_ttl
	$wp_customize->selective_refresh->add_partial( 'cta_ttl', array(
		'selector'            => '.call_action .ttl',
		'settings'            => 'cta_ttl',
		'render_callback'  => 'aravalli_cta_ttl_render_callback',
	) );
	
	// cta_email
	$wp_customize->selective_refresh->add_partial( 'cta_email', array(
		'selector'            => '.call_action .text',
		'settings'            => 'cta_email',
		'render_callback'  => 'aravalli_cta_email_render_callback',
	) );
	
	// cta_btn_lbl
	$wp_customize->selective_refresh->add_partial( 'cta_btn_lbl', array(
		'selector'            => '.call_action .button a',
		'settings'            => 'cta_btn_lbl',
		'render_callback'  => 'aravalli_cta_btn_lbl_render_callback',
	) );
	
	}
add_action( 'customize_register', 'aravalli_pages_partials' );


// contact_pg_ct_ttl
function aravalli_contact_pg_ct_ttl_render_callback() {
	return get_theme_mod( 'contact_pg_ct_ttl' );
}

// contact_pg_ct_subttl
function aravalli_contact_pg_ct_subttl_render_callback() {
	return get_theme_mod( 'contact_pg_ct_subttl' );
}


// contact_pg_ct_desc
function aravalli_contact_pg_ct_desc_render_callback() {
	return get_theme_mod( 'contact_pg_ct_desc' );
}


// contact_pg_form_ttl
function aravalli_contact_pg_form_ttl_render_callback() {
	return get_theme_mod( 'contact_pg_form_ttl' );
}

// pg_room_ttl
function aravalli_pg_room_ttl_render_callback() {
	return get_theme_mod( 'pg_room_ttl' );
}

// pg_room_sub
function aravalli_pg_room_sub_render_callback() {
	return get_theme_mod( 'pg_room_sub' );
}


// pg_room_desc
function aravalli_pg_room_desc_render_callback() {
	return get_theme_mod( 'pg_room_desc' );
}


// pg_gallery_ttl
function aravalli_pg_gallery_ttl_render_callback() {
	return get_theme_mod( 'pg_gallery_ttl' );
}

// pg_gallery_sub
function aravalli_pg_gallery_sub_render_callback() {
	return get_theme_mod( 'pg_gallery_sub' );
}


// pg_gallery_desc
function aravalli_pg_gallery_desc_render_callback() {
	return get_theme_mod( 'pg_gallery_desc' );
}




// pg_packages_offer_ttl
function aravalli_pg_packages_offer_ttl_render_callback() {
	return get_theme_mod( 'pg_packages_offer_ttl' );
}

// pg_packages_offer_sub
function aravalli_pg_packages_offer_sub_render_callback() {
	return get_theme_mod( 'pg_packages_offer_sub' );
}


// pg_packages_offer_desc
function aravalli_pg_packages_offer_desc_render_callback() {
	return get_theme_mod( 'pg_packages_offer_desc' );
}

// pg_packages_ttl
function aravalli_pg_packages_ttl_render_callback() {
	return get_theme_mod( 'pg_packages_ttl' );
}

// pg_packages_sub
function aravalli_pg_packages_sub_render_callback() {
	return get_theme_mod( 'pg_packages_sub' );
}


// pg_packages_desc
function aravalli_pg_packages_desc_render_callback() {
	return get_theme_mod( 'pg_packages_desc' );
}



// pg_about_title
function aravalli_pg_about_title_render_callback() {
	return get_theme_mod( 'pg_about_title' );
}

// pg_about_subtitle
function aravalli_pg_about_subtitle_render_callback() {
	return get_theme_mod( 'pg_about_subtitle' );
}


// pg_about_desc
function aravalli_pg_about_desc_render_callback() {
	return get_theme_mod( 'pg_about_desc' );
}

// pg_about_btn_lbl
function aravalli_pg_about_btn_lbl_render_callback() {
	return get_theme_mod( 'pg_about_btn_lbl' );
}




// pg_about_why_ttl
function aravalli_pg_about_why_ttl_render_callback() {
	return get_theme_mod( 'pg_about_why_ttl' );
}

// pg_about_why_sub
function aravalli_pg_about_why_sub_render_callback() {
	return get_theme_mod( 'pg_about_why_sub' );
}


// pg_about_why_desc
function aravalli_pg_about_why_desc_render_callback() {
	return get_theme_mod( 'pg_about_why_desc' );
}


// pg_about_amenities_ttl
function aravalli_pg_about_amenities_ttl_render_callback() {
	return get_theme_mod( 'pg_about_amenities_ttl' );
}

// pg_about_amenities_sub
function aravalli_pg_about_amenities_sub_render_callback() {
	return get_theme_mod( 'pg_about_amenities_sub' );
}


// pg_about_amenities_desc
function aravalli_pg_about_amenities_desc_render_callback() {
	return get_theme_mod( 'pg_about_amenities_desc' );
}


// pg_about_team_ttl
function aravalli_pg_about_team_ttl_render_callback() {
	return get_theme_mod( 'pg_about_team_ttl' );
}

// pg_about_team_sub
function aravalli_pg_about_team_sub_render_callback() {
	return get_theme_mod( 'pg_about_team_sub' );
}


// pg_about_team_desc
function aravalli_pg_about_team_desc_render_callback() {
	return get_theme_mod( 'pg_about_team_desc' );
}




// pg_about_certificates_ttl
function aravalli_pg_about_certificates_ttl_render_callback() {
	return get_theme_mod( 'pg_about_certificates_ttl' );
}

// pg_about_certificates_sub
function aravalli_pg_about_certificates_sub_render_callback() {
	return get_theme_mod( 'pg_about_certificates_sub' );
}


// pg_about_certificates_desc
function aravalli_pg_about_certificates_desc_render_callback() {
	return get_theme_mod( 'pg_about_certificates_desc' );
}




// cta_ttl
function aravalli_cta_ttl_render_callback() {
	return get_theme_mod( 'cta_ttl' );
}

// cta_email
function aravalli_cta_email_render_callback() {
	return get_theme_mod( 'cta_email' );
}


// cta_btn_lbl
function aravalli_cta_btn_lbl_render_callback() {
	return get_theme_mod( 'cta_btn_lbl' );
}