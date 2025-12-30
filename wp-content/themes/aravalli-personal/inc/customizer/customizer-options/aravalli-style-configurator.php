<?php
function aravalli_style_configurator( $wp_customize ) {

	/*=========================================
	Style Configurator Settings Section
	=========================================*/
	$wp_customize->add_panel( 
		'style_configurator', 
		array(
			'priority'      => 37,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Style Configurator', 'aravalli-pro'),
		) 
	);

	/*=========================================
	Page Layout Settings Section
	=========================================*/
	$wp_customize->add_section(
        'page_layout',
        array(
            'title' 		=> __('Page Layout','aravalli-pro'),
            'description' 	=>'',
			'panel'  		=> 'style_configurator',
		)
    );
	
	//Layout Style
	class WP_layout_Customize_Control extends WP_Customize_Control {
	public $type = 'new_menu';

		   function render_content()
		   
		   {
		    echo '<h3>' .  __( 'Website Layout', 'aravalli-pro' ) . '</h3>';
			  $name = '_customize-layout-radio-' . $this->id; 
			  foreach($this->choices as $key => $value ) {
				?>
				   <label>
					<input type="radio" value="<?php echo $key; ?>" name="<?php echo esc_attr( $name ); ?>" data-customize-setting-link="<?php echo esc_attr( $this->id ); ?>" <?php if($this->value() == $key){ echo 'checked'; } ?>>
					<img <?php if($this->value() == $key){ echo 'class="layout_active"'; } ?> src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/bg-pattern/<?php echo $value; ?>" alt="<?php echo esc_attr( $value ); ?>" />
					</label>
					
				<?php
			  } ?>
			  <script>
				jQuery(document).ready(function($) {
					$("#customize-control-wide_boxed label img").click(function(){
						$("#customize-control-wide_boxed label img").removeClass("layout_active");
						$(this).addClass("layout_active");
					});
				});
			  </script>
			  <?php
		   }

	}
	
	// Page Layout Setting // 
	$wp_customize->add_setting( 
		'wide_boxed' , 
			array(
			'default' => 'wide.jpg',  
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);

	$wp_customize->add_control(new WP_layout_Customize_Control($wp_customize,
	'wide_boxed' , 
		array(
			'label'          => __( 'Select Page Layout', 'aravalli-pro' ),
			'section'        => 'page_layout',
			'type'           => 'radio',
			'description'    => __( 'Select Page Layout Wide & Boxed', 'aravalli-pro' ),
			'choices'        => 
			array(
				'wide' => 'wide.jpg',
				'boxed' => 'boxed.jpg',
			) 
		) 
	) );
	
	
	//Background Image Pattern
	class WP_pre_Customize_Control extends WP_Customize_Control {
	public $type = 'new_menu';

	   function render_content()
	   
	   {
	   echo '<h3>Preset Background Image</h3>';
		  $name = '_customize-image-radio-' . $this->id;
		  $i=1;
		  foreach($this->choices as $key => $value ) {
			?>
			   <label>
				<input type="radio" value="<?php echo $key; ?>" name="<?php echo esc_attr( $name ); ?>" data-customize-setting-link="<?php echo esc_attr( $this->id ); ?>" <?php if($this->value() == $key){ echo 'checked'; } ?>>
				<img <?php if($this->value() == $key){ echo 'class="bg_pattern_active"'; } ?> src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/bg-pattern/<?php echo $value; ?>" alt="<?php echo esc_attr( $value ); ?>" />
				</label>
			<?php 
			if($i==4)
			{
			  echo '<p></p>';
			  $i=0;
			}
			$i++;
			
			} ?>
			<h3>Add Custom Background Image :</h3>
			<p>Customize > Background Image <a href="?autofocus[control]=background_image">Click Here</a></p><br/>
			<h3>Add Custom Background Color :</h3>
			<p>Customize > Colors <a href="?autofocus[control]=colors">Click Here</a></p>
		  <script>
			jQuery(document).ready(function($) {
				$("#customize-control-bg_pattern label img").click(function(){
					$("#customize-control-bg_pattern label img").removeClass("bg_pattern_active");
					$(this).addClass("bg_pattern_active");
				});
			});
		  </script>
		<?php
	   }
	}
	
	// Background Pattern // 
	$wp_customize->add_setting( 
		'bg_pattern' , 
			array(
			'default' => 'bg-img1.png',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);

	$wp_customize->add_control(new WP_pre_Customize_Control($wp_customize,
	'bg_pattern' , 
		array(
			'label'          => __( 'Preset Background Pattern', 'aravalli-pro' ),
			'section'        => 'page_layout',
			'type'           => 'radio',
			'description'    => __( 'Background Pattern will work only Boxed Page Layout', 'aravalli-pro' ),
			'choices'        => 
			array(
				'bg-img0.png' => 'sm0.png',
				'pattern-1.png' => 'pattern-1.png',
				'pattern-2.png' => 'pattern-2.png',
				'pattern-3.png' => 'pattern-3.png',
				'pattern-4.png' => 'pattern-4.png',
				'pattern-5.png' => 'pattern-5.png',
				'pattern-6.png' => 'pattern-6.png',
				'pattern-7.png' => 'pattern-7.png',
				'pattern-8.png' => 'pattern-8.png',
				'pattern-9.png' => 'pattern-9.png',
				'pattern-10.png' => 'pattern-10.png',
				'pattern-11.png' => 'pattern-11.png',
				'pattern-12.png' => 'pattern-12.png',
				'pattern-13.png' => 'pattern-13.png',
				'pattern-14.png' => 'pattern-14.png',
				'pattern-15.png' => 'pattern-15.png',
				'pattern-16.png' => 'pattern-16.png',
				'pattern-17.png' => 'pattern-17.png',
				'pattern-18.png' => 'pattern-18.png',
				'pattern-19.png' => 'pattern-19.png',
				'pattern-20.png' => 'pattern-20.png',
				'pattern-21.png' => 'pattern-21.png',
				'pattern-22.png' => 'pattern-22.png',
				'pattern-23.png' => 'pattern-23.png',
				'pattern-24.png' => 'pattern-24.png',
				'pattern-25.png' => 'pattern-25.png',
				'pattern-26.png' => 'pattern-26.png',
				'pattern-27.png' => 'pattern-27.png',
				'pattern-28.png' => 'pattern-28.png',
				'pattern-29.png' => 'pattern-29.png',
				'pattern-30.png' => 'pattern-30.png',
				'pattern-31.png' => 'pattern-31.png',
				'pattern-32.png' => 'pattern-32.png',
				'pattern-33.png' => 'pattern-33.png',
				'pattern-34.png' => 'pattern-34.png',
				'pattern-35.png' => 'pattern-35.png',
				'pattern-36.png' => 'pattern-36.png',
				'pattern-37.png' => 'pattern-37.png',
				'pattern-38.png' => 'pattern-38.png',
				'pattern-39.png' => 'pattern-39.png',
			) 
		) 
	) );
	
	
	
	/*=========================================
	Pre Built Colors Settings Section
	=========================================*/
	// Footer Setting Section // 
	$wp_customize->add_section(
        'prebuilt_colors',
        array(
            'title' 		=> __('Prebuilt Theme Color','aravalli-pro'),
            'description' 	=>'',
			'panel'  		=> 'style_configurator',
		)
    );
	
	//Pre Built Colors
	class WP_color_Customize_Control extends WP_Customize_Control {
	public $type = 'new_menu';

		   function render_content()
		   {
		   echo '<h3>' .  __( 'Select Your Prebuilt Theme Color', 'aravalli-pro' ) . '</h3>';
			  $name = '_customize-color-radio-' . $this->id; 
			  foreach($this->choices as $key => $value ) {
				?>
				   <label>
					<input type="radio" value="<?php echo $key; ?>" name="<?php echo esc_attr( $name ); ?>" data-customize-setting-link="<?php echo esc_attr( $this->id ); ?>" <?php if($this->value() == $key){ echo 'checked'; } ?>>
					<img <?php if($this->value() == $key){ echo 'class="selected_img"'; } ?> src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/color/<?php echo $value; ?>" alt="<?php echo esc_attr( $value ); ?>" />
					</label>
					
				<?php
			  } ?>
			
			  <script>
				jQuery(document).ready(function($) {
					$("#customize-control-theme_color label img").click(function(){
						$("#customize-control-theme_color label img").removeClass("selected_img");
						$(this).addClass("selected_img");
					});
				});
			  </script>
			  <?php 
		   }

	}
	
	 //Theme Color Scheme
	$wp_customize->add_setting(
	'theme_color', array(
	'default' => '#b39148',  
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
    ));
	$wp_customize->add_control(new WP_color_Customize_Control($wp_customize,'theme_color',
	array(
        'label'   => __('Select Your Theme Color', 'aravalli-pro'),
        'section' => 'prebuilt_colors',
		'type' => 'radio',
		'settings' => 'theme_color',	
		'choices' => array(
			'#b39148' => '2.png',
			'#f22853' => 'default.png',
			'#ec5598' => 'default.png',
            '#1abac8' => '1.png',
			'#7aa228' => '3.png',
			'#2997ab' => '4.png',
			'#1bbc9b' => '5.png',
			'#0073aa' => '6.png',
			'#395ca3' => '7.png',
			'#008080' => '8.png',
			'#ee591f' => '9.png',
			'#ffba00' => '10.png',
			'#000000' => '11.png',
			'#0574f7' => '12.png',
			'#019875' => '13.png',
    )
	
	)));
	
	/*=========================================
	Make Your Own Theme Color
	=========================================*/
	$wp_customize->add_section(
        'make_theme',
        array(
            'title' 		=> __('Make Own Theme Color','aravalli-pro'),
			'panel'  		=> 'style_configurator',
		)
    );
	
	// Enable / Disable Color
	$wp_customize->add_setting( 
		'theme_color_enable' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'theme_color_enable', 
		array(
			'label'	      => esc_html__( 'Enable Custom Color', 'aravalli-pro' ),
			'section'     => 'make_theme',
			'type'        => 'checkbox'
		) 
	);
	
	// Primary Theme Color
	$wp_customize->add_setting(
	'primary_color', 
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => '#b39148'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'primary_color', 
			array(
				'label'      => __( 'Primary Theme Color', 'aravalli-pro' ),
				'section'    => 'make_theme',
				'settings'   => 'primary_color',
			) 
		) 
	);
	
	// Secondary Theme Color
	$wp_customize->add_setting(
	'secondary_color', 
	array(
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => '#3b3a3a'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'secondary_color', 
			array(
				'label'      => __( 'Secondary Theme Color', 'aravalli-pro' ),
				'section'    => 'make_theme',
				'settings'   => 'secondary_color',
			) 
		) 
	);	
		/*=========================================
	Color Pallete
	=========================================*/
	$wp_customize->add_section(
        'front_pallate',
        array(
            'title' 		=> __('Front Pallate','aravalli-pro'),
			'panel'  		=> 'style_configurator',
		)
    );
	
	// Enable / Disable Front Pallate
	$wp_customize->add_setting( 
		'front_pallate_enable' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'front_pallate_enable', 
		array(
			'label'	      => esc_html__( 'This features for testing purpose, how it look website front before publishing', 'aravalli-pro' ),
			'section'     => 'front_pallate',
			'type'        => 'checkbox'
		) 
	);
}

add_action( 'customize_register', 'aravalli_style_configurator' );
?>