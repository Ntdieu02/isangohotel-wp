<?php	
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aravalli
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function aravalli_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Header Widget Area 1', 'aravalli-pro' ),
		'id' => 'aravalli-header-above-first',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Header Widget Area 2', 'aravalli-pro' ),
		'id' => 'aravalli-header-above-second',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'aravalli-pro' ),
		'id' => 'aravalli-sidebar-primary',
		'description' => __( 'The Primary Widget Area', 'aravalli-pro' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	
	$footer_widget_layout = get_theme_mod('footer_widget_layout','4');
	for ($i=1; $i<=$footer_widget_layout; $i++) {
		register_sidebar( array(
			'name' => __( 'Footer  ', 'aravalli-pro' )  . $i,
			'id' => 'footer-' . $i,
			'description' => __( 'The Footer Widget Area', 'aravalli-pro' )  . $i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		) );
	}
	
	 
	register_sidebar( array(
		'name' => __( 'Footer Layout Section 1', 'aravalli-pro' ),
		'id' => 'aravalli-footer-layout-first',
		'description' => __( 'The Footer Layout Left', 'aravalli-pro' ),
		'before_widget' => ' <div class="widget-left text-av-left text-center"><aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside></div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Layout Section 2', 'aravalli-pro' ),
		'id' => 'aravalli-footer-layout-second',
		'description' => __( 'The Footer Layout Second', 'aravalli-pro' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'WooCommerce Widget Area', 'aravalli-pro' ),
		'id' => 'aravalli-woocommerce-sidebar',
		'description' => __( 'This Widget area for WooCommerce Widget', 'aravalli-pro' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
}
add_action( 'widgets_init', 'aravalli_widgets_init' );
?>