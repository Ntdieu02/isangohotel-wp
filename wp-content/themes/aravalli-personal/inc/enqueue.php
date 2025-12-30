<?php
 /**
 * Enqueue scripts and styles.
 */
function aravalli_scripts() {
	
	// Styles	
	
	wp_enqueue_style('bootstrap-min',get_template_directory_uri().'/assets/css/bootstrap.min.css');
	
	wp_enqueue_style('owl-carousel-min',get_template_directory_uri().'/assets/css/owl.carousel.min.css');

	wp_enqueue_style('owl-theme-default-min',get_template_directory_uri().'/assets/css/owl.theme.default.min.css');
	
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/assets/css/fonts/font-awesome/css/font-awesome.min.css');
	
	wp_enqueue_style('animate',get_template_directory_uri().'/assets/css/animate.css');
	
	wp_enqueue_style('magnific-popup',get_template_directory_uri().'/assets/css/magnific-popup.css');
	
	wp_enqueue_style('timecircles',get_template_directory_uri().'/assets/css/timecircles.css');
	
	wp_enqueue_style('aravalli-editor-style',get_template_directory_uri().'/assets/css/editor-style.css');

	wp_enqueue_style('aravalli-color-default', get_template_directory_uri() . '/assets/css/color/default.css');


	wp_enqueue_style('aravalli-menus', get_template_directory_uri() . '/assets/css/menu.css');

	wp_enqueue_style('aravalli-widgets',get_template_directory_uri().'/assets/css/widgets.css');

	wp_enqueue_style('aravalli-main', get_template_directory_uri() . '/assets/css/main.css');
	
	wp_enqueue_style('aravalli-typography', get_template_directory_uri() . '/assets/css/typography/typography.css');
	
	wp_enqueue_style('aravalli-media-query', get_template_directory_uri() . '/assets/css/responsive.css');
	
	wp_enqueue_style('aravalli-woocommerce',get_template_directory_uri().'/assets/css/woo.css');
	
	wp_enqueue_style( 'aravalli-style', get_stylesheet_uri() );
	
	// Scripts
	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), false, true);
	
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), false, true);
	
	wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), true);
	
	wp_enqueue_script('owl-carousel-thumb', get_template_directory_uri() . '/assets/js/owl.carousel2.thumbs.min.js', array('jquery'), true);
	
	wp_enqueue_script('jquery-meanmenu', get_template_directory_uri() . '/assets/js/jquery.meanmenu.min.js', array('jquery'), true);
	
	wp_enqueue_script('contactform', get_template_directory_uri() . '/assets/js/contactform.js', array('jquery'), false, true);
	
	wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/assets/js/jquery.easing.js', array('jquery'),false, true);
	
	wp_enqueue_script('jquery-hoverdir', get_template_directory_uri() . '/assets/js/jquery.hoverdir.js', array('jquery'),false, true);
	
	$enable_comming_soon = get_theme_mod('enable_comming_soon');
	  if($enable_comming_soon == '1') {
		wp_enqueue_script('jquery-particles', get_template_directory_uri() . '/assets/js/particles.js', array('jquery'),false, true);
	  }
	  
	wp_enqueue_script('countdown', get_template_directory_uri() . '/assets/js/jquery.downcount.js', array('jquery'), false, true);
	
	wp_enqueue_script('counterup', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array('jquery'), false, true);
	
	wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), false, true);
	
	wp_enqueue_script('shuffle', get_template_directory_uri() . '/assets/js/jquery.shuffle.min.js', array('jquery'), false, true);
	
	wp_enqueue_script('jquery-sticky', get_template_directory_uri() . '/assets/js/jquery.sticky.js', array('jquery'), false, true);
	
	wp_enqueue_script('wow-min', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), false, true);
	
	// wp_enqueue_script('time-circle', get_template_directory_uri() . '/assets/js/timecircles.js', array('jquery'), false, true);

	wp_enqueue_script('aravalli-custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), false, true);
	
	// wp_enqueue_script('aravalli-theme-js', get_template_directory_uri() . '/assets/js/theme.min.js', array('jquery'), false, true);
	
	//wp_enqueue_script('aravalli-map-link', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAqoWGSQYygV-G1P5tVrj-dM2rVHR5wOGY');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aravalli_scripts' );

//Admin Enqueue for Admin
function aravalli_admin_enqueue_scripts(){
	wp_enqueue_style('aravalli-admin-style', get_template_directory_uri() . '/inc/customizer/assets/css/admin.css');
	
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/assets/css/fonts/font-awesome/css/font-awesome.min.css');
	
	wp_enqueue_style( 'startkit-icon-picker-css', get_template_directory_uri() . '/inc/customizer/assets/js/fonticonpicker/jquery.fonticonpicker.min.css', false );
			 
	wp_enqueue_script( 'startkit-icon-picker-js', get_template_directory_uri() .'/inc/customizer/assets/js/fonticonpicker/jquery.fonticonpicker.min.js', array( 'jquery', 'jquery-ui-sortable' ) );
}
add_action( 'admin_enqueue_scripts', 'aravalli_admin_enqueue_scripts' );
?>