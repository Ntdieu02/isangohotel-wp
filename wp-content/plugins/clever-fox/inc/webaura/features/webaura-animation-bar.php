<?php
function webique_animation_bars_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Animation Bars  Section
	=========================================*/
	$wp_customize->add_section(
		'animation_bars_setting', array(
			'title' => esc_html__( 'Animation Bars Section', 'clever-fox' ),
			'priority' => 2,
			'panel' => 'webique_frontpage_sections',
		)
	);

	// Animation Bars Left Content Section // 
	$wp_customize->add_setting(
		'left_bar_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'webique_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'left_bar_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Left Bar Content','clever-fox'),
			'section' => 'animation_bars_setting',
		)
	);
	
	$wp_customize->add_setting( 
		'left_bar_hs' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'webique_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'left_bar_hs', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'animation_bars_setting',
			'type'        => 'checkbox'
		) 
	);	

	/**
	 * Customizer Repeater for add service
	 */
	
	$wp_customize->add_setting( 'left_bar_contents', 
		array(
			'sanitize_callback' => 'webique_repeater_sanitize',
			// 'transport'         => $selective_refresh,
			'priority' => 8,
			'default' => header_marquee_default()
		)
	);
	
	$wp_customize->add_control( 
		new Theme_Repeater( $wp_customize, 
			'left_bar_contents', 
				array(
					'label'   => esc_html__('Animation Bars','clever-fox'),
					'section' => 'animation_bars_setting',
					'settings' => 'left_bar_contents',
					'add_field_label'                   => esc_html__( 'Add New Lbar', 'clever-fox' ),
					'item_name'                         => esc_html__( 'Lbar', 'clever-fox' ),
					'customizer_repeater_title_control' => true,
					'customizer_repeater_link_control' => true,
					'customizer_repeater_newtab_control' => true,
					'customizer_repeater_nofollow_control' => true,
				) 
			) 
		);

	//Pro feature Left
	class Webique_marquee_left_col__section_upgrade extends WP_Customize_Control {
		public function render_content() { 
		?>
		<a class="customizer_left_animbar_upgrade_section up-to-pro" href="<?php echo webique_premium_links(); ?>" target="_blank" style="display: none;"><?php esc_html_e('Unlock By Upgrade to Pro','clever-fox'); ?></a>
		<?php
		}
	}
	
	$wp_customize->add_setting( 'webique_marquee_left_col_upgrade_to_pro', array(
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		'priority' => 5,
	));
	$wp_customize->add_control(
		new Webique_marquee_left_col__section_upgrade(
		$wp_customize,
		'webique_marquee_left_col_upgrade_to_pro',
			array(
				'section'				=> 'animation_bars_setting',
			)
		)
	);

	// Animation Bars content Section // 
	
	$wp_customize->add_setting(
	'right_bar_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'webique_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'right_bar_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Right Bar Content','clever-fox'),
			'section' => 'animation_bars_setting',
		)
	);

	$wp_customize->add_setting( 
		'right_bar_hs' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'webique_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'right_bar_hs', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'animation_bars_setting',
			'type'        => 'checkbox'
		) 
	);

	/**
	 * Customizer Repeater for add service
	 */

	$wp_customize->add_setting( 'right_bar_contents', 
		array(
			'sanitize_callback' => 'webique_repeater_sanitize',
			// 'transport'         => $selective_refresh,
			'priority' => 8,
			'default' => header_marquee_default()
		)
	);
	
	$wp_customize->add_control( 
		new Theme_Repeater( $wp_customize, 
		'right_bar_contents', 
			array(
				'label'   => esc_html__('Animation Bars','clever-fox'),
				'section' => 'animation_bars_setting',
				'settings' => 'right_bar_contents',
				'add_field_label'                   => esc_html__( 'Add New Rbar', 'clever-fox' ),
				'item_name'                         => esc_html__( 'Rbar', 'clever-fox' ),
				'customizer_repeater_title_control' => true,
				'customizer_repeater_link_control' => true,
				'customizer_repeater_newtab_control' => true,
				'customizer_repeater_nofollow_control' => true,
			) 
		) 
	);

		
	//Pro feature Right
	class Webique_marquee_right_col__section_upgrade extends WP_Customize_Control {
		public function render_content() { 
			$theme = wp_get_theme(); // gets the current theme	
		?>
		<a class="customizer_right_animbar_upgrade_section up-to-pro" href="<?php echo webique_premium_links(); ?>" target="_blank" style="display: none;"><?php esc_html_e('Unlock By Upgrade to Pro','clever-fox'); ?></a>
		<?php
		}
	}
	
	$wp_customize->add_setting( 'webique_marquee_right_col_upgrade_to_pro', array(
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		'priority' => 5,
	));
	$wp_customize->add_control(
		new Webique_marquee_right_col__section_upgrade(
		$wp_customize,
		'webique_marquee_right_col_upgrade_to_pro',
			array(
				'section'				=> 'animation_bars_setting',
			)
		)
	);
}

add_action( 'customize_register', 'webique_animation_bars_setting' );

function webique_marquee_partials( $wp_customize ){
	// marquee_contents
	$wp_customize->selective_refresh->add_partial( 'marquee_contents', array(
		'selector'            => '.marquee-section',
	) );
}
add_action( 'customize_register', 'webique_marquee_partials' );