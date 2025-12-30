<?php // Adding customizer layout manager settings
function aravalli_layout_manager_customizer( $wp_customize ){

	/* layout manager section */
	$wp_customize->add_section( 'frontpage_layout' , array(
		'title'      => __('Sections Reorder', 'aravalli-pro'),
		'priority'       => 39,
   	) );
	
	 $wp_customize->add_setting( 
		'section_reorder' , 
			array(
			'default'   => array(
							'slider',
							'checkin',
							'room',
							 'features',
							'gallery',
							'testimonial',
							'funfact',
							'promotional',
							'newsletter',
							'blog',
						),
		'sanitize_callback' => 'aravalli_sanitize_sortable',
		) 
	);
	
	$wp_customize->add_control( 
	new Aravalli_Control_Sortable( $wp_customize, 'section_reorder', 
		array(
			'label'      => __( 'Structure', 'aravalli-pro' ),
			'section'     => 'frontpage_layout',
			'priority'      => 2,
			'choices'     => array(
				'slider'   => __( 'Slider Section', 'aravalli-pro' ),
				 'checkin'     => __( 'Checkin Section', 'aravalli-pro' ),
				 'room'     => __( 'Room Section', 'aravalli-pro' ),
				'features'     => __( 'Features Section', 'aravalli-pro' ),
				'gallery'   => __( 'Gallery Section', 'aravalli-pro' ),
				'testimonial'     => __( 'Testimonial Section', 'aravalli-pro' ),
				'funfact'     => __( 'Funfact Section', 'aravalli-pro' ),
				 'promotional'     => __( 'Promotional Section', 'aravalli-pro' ),
				 'newsletter'   => __( 'Newsletter Section', 'aravalli-pro' ),
				 'blog'   => __( 'Blog Section', 'aravalli-pro' ),
				'amenities'     => __( 'Amenities Section', 'aravalli-pro' ),
				'team'     => __( 'Team Section', 'aravalli-pro' ),
				'certificates'     => __( 'Certificates Section', 'aravalli-pro' ),
				'cta'     => __( 'Cta Section', 'aravalli-pro' ),
				'contact'     => __( 'Contact Section', 'aravalli-pro' ),
				'map'     => __( 'Map Section', 'aravalli-pro' ),
				'form'     => __( 'Contact Form Section', 'aravalli-pro' ),
				'custom'     => __( 'Custom Section', 'aravalli-pro' ),
			),
		) ) 
	);	
	
}
add_action( 'customize_register', 'aravalli_layout_manager_customizer' );