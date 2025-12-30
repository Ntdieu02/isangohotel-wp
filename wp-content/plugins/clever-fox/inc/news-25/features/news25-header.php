<?php
function news25_lite_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'clever-fox'),
		) 
	);
	
	/*=========================================
	Fiona Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','clever-fox'),
			'panel'  		=> 'header_section',
		)
    );

	// Logo Width // 
	if ( class_exists( 'Cleverfox_Customizer_Range_Slider_Control' ) ) {
		$wp_customize->add_setting(
			'logo_width',
			array(
				'default'			=> '250',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'news25_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'logo_width', 
			array(
				'label'      => __( 'Logo Width', 'clever-fox' ),
				'section'  => 'title_tagline',
				'input_attrs' => array(
				'min'    => 0,
				'max'    => 500,
				'step'   => 1,
				//'suffix' => 'px', //optional suffix
			),
			) ) 
		);
	}

	/*=========================================
	Above Header Section
	=========================================*/
	$wp_customize->add_section(
        'above_header',
        array(
        	'priority'      => 2,
            'title' 		=> __('Above Header','clever-fox'),
			'panel'  		=> 'header_section',
		)
    );
	
	// Temperature
	$wp_customize->add_setting(
		'hdr_nav_time1'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'hdr_nav_time1',
		array(
			'type' => 'hidden',
			'label' => __('Time & Date','clever-fox'),
			'section' => 'above_header',
		)
	);
	//  Hide/Show
	$wp_customize->add_setting(
		'bh_time_hs'
			,array(
			'default'     	=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
	'bh_time_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide/Show','clever-fox'),
			'section' => 'above_header',
		)
	);
	
	// Temperature
	$wp_customize->add_setting(
		'hdr_nav_temp1'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'hdr_nav_temp1',
		array(
			'type' => 'hidden',
			'label' => __('Temperature','clever-fox'),
			'section' => 'above_header',
		)
	);
	//  Hide/Show
	$wp_customize->add_setting(
		'bh_temp_hs'
			,array(
			'default'     	=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
	'bh_temp_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide/Show','clever-fox'),
			'section' => 'above_header',
		)
	);
	
	
	// Temperature
	$wp_customize->add_setting(
		'hdr_nav_weather1'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'hdr_nav_weather1',
		array(
			'type' => 'hidden',
			'label' => __('Weather','clever-fox'),
			'section' => 'above_header',
		)
	);
	//  Hide/Show
	$wp_customize->add_setting(
		'bh_temp_api_key_hs'
			,array(
			'default'     	=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
	'bh_temp_api_key_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide/Show','clever-fox'),
			'section' => 'above_header',
		)
	);
	
	//City
	$wp_customize->add_setting('bh_temp_city', array(
		'default' => 'London',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('bh_temp_city', array(
		'label' => __('Default City', 'clever-fox'),
		'section' => 'above_header',
		'type' => 'text',
	));
	
	
	$wp_customize->add_setting(
		'hdr_abv_right'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'news25_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'hdr_abv_right',
		array(
			'type' => 'hidden',
			'label' => __('Header Right','clever-fox'),
			'section' => 'above_header',
		)
	);
	
	//Custom
	$page_editor_path = trailingslashit( get_template_directory() ) . 'inc/custom-controls/editor/customizer-page-editor.php';
		if ( file_exists( $page_editor_path ) ) {
			require_once( $page_editor_path );
		}
	if ( class_exists( 'News25_Page_Editor' ) ) {
		$frontpage_id = get_option( 'page_on_front' );
		$default = '';
		if ( ! empty( $frontpage_id ) ) {
			$default = get_post_field( 'post_content', $frontpage_id );
		}
		$wp_customize->add_setting(
			'abv_hdr_second_custom', array(
				'default' => __('<a href="javascript:void(0)" class="btn mode dark-mode-switch"><i class="fa fa-moon-o" aria-hidden="true"></i></a>  <a href="#" class="btn advetise border"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Advertise with us</a>','clever-fox'),
				'sanitize_callback' => 'wp_kses_post',
			)
		);

		$wp_customize->add_control(
			new News25_Page_Editor(
				$wp_customize, 'abv_hdr_second_custom', array(
					'label' => esc_html__( 'Content', 'clever-fox' ),
					'section' => 'above_header',
					'needsync' => true,
				)
			)
		);
	}
	$default = '';
}
add_action( 'customize_register', 'news25_lite_header_settings' );