<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package aravalli
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function aravalli_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Header
	$aravalli_header_type  = get_theme_mod('aravalli_header_type','header-default');
	$classes[] = $aravalli_header_type; 	
	
	return $classes;
}
add_filter( 'body_class', 'aravalli_body_classes' );

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Backward compatibility for wp_body_open hook.
	 *
	 * @since 1.0.0
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

if (!function_exists('aravalli_str_replace_assoc')) {

    /**
     * aravalli_str_replace_assoc
     * @param  array $replace
     * @param  array $subject
     * @return array
     */
    function aravalli_str_replace_assoc(array $replace, $subject) {
        return str_replace(array_keys($replace), array_values($replace), $subject);
    }
}

// Comments Counts
if ( ! function_exists( 'aravalli_comment_count' ) ) :
function aravalli_comment_count() {
	$aravalli_comments_count 	= get_comments_number();
	if ( 0 === intval( $aravalli_comments_count ) ) {
		echo esc_html__( '0 Comments', 'aravalli-pro' );
	} else {
		/* translators: %s Comment number */
		 echo sprintf( _n( '%s Comment', '%s Comments', $aravalli_comments_count, 'aravalli-pro' ), number_format_i18n( $aravalli_comments_count ) );
	}
} 
endif;

//Background Image Pattern
function aravalli_background_pattern()
{
	$bg_pattern = get_theme_mod('bg_pattern','bg-img1.png');
	if($bg_pattern!='')
	{
	echo '<style>body.boxed { background:url("'.get_template_directory_uri().'/assets/images/bg-pattern/'.$bg_pattern.'");}</style>';
	}
}
add_action('wp_head','aravalli_background_pattern',10,0);


/**
 * Display Sidebars
 */
if ( ! function_exists( 'aravalli_get_sidebars' ) ) {
	/**
	 * Get Sidebar
	 *
	 * @since 1.0
	 * @param  string $sidebar_id   Sidebar Id.
	 * @return void
	 */
	function aravalli_get_sidebars( $sidebar_id ) {
		if ( is_active_sidebar( $sidebar_id ) ) {
			dynamic_sidebar( $sidebar_id );
		} elseif ( current_user_can( 'edit_theme_options' ) ) {
			?>
			<div class="widget">
				<p class='no-widget-text'>
					<a href='<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>'>
						<?php esc_html_e( 'Add Widget', 'aravalli-pro' ); ?>
					</a>
				</p>
			</div>
			<?php
		}
	}
}

/**
 * Get registered sidebar name by sidebar ID.
 *
 * @since  1.0.0
 * @param  string $sidebar_id Sidebar ID.
 * @return string Sidebar name.
 */
function aravalli_get_sidebar_name_by_id( $sidebar_id = '' ) {

	if ( ! $sidebar_id ) {
		return;
	}

	global $wp_registered_sidebars;
	$sidebar_name = '';

	if ( isset( $wp_registered_sidebars[ $sidebar_id ] ) ) {
		$sidebar_name = $wp_registered_sidebars[ $sidebar_id ]['name'];
	}

	return $sidebar_name;
}

// Aravalli Footer Group First
if ( ! function_exists( 'aravalli_footer_group_first' ) ) :
function aravalli_footer_group_first() {
	$footer_bottom_1 			= get_theme_mod('footer_bottom_1','custom');	
	$footer_first_custom 		= get_theme_mod('footer_first_custom','Copyright &copy; [current_year] [site_title] | Powered by [theme_author]');	
		// Custom
		if($footer_bottom_1 == 'custom'): ?>
			<?php  if ( ! empty( $footer_first_custom ) ){ ?>
				<?php 	
					$aravalli_copyright_allowed_tags = array(
						'[current_year]' => date_i18n('Y'),
						'[site_title]'   => get_bloginfo('name'),
						'[theme_author]' => sprintf(__('<a href="#">Aravalli WordPress Theme</a>', 'aravalli-pro')),
					);
				?>                      
				<div class="copyright-text">
					<?php
						echo apply_filters('aravalli_footer_copyright', wp_kses_post(aravalli_str_replace_assoc($aravalli_copyright_allowed_tags, $footer_first_custom)));
					?>
				</div>
			<?php } ?>
		<?php endif;
		
		// Widget
		 if($footer_bottom_1 == 'widget'): ?>
			<?php  aravalli_get_sidebars( 'aravalli-footer-layout-first' ); ?>
		<?php endif; 
		
		// Menu
		 if($footer_bottom_1 == 'menu'): ?>
			<aside class="widget-nav_menu">
				<?php 
					wp_nav_menu( 
						array(  
							'theme_location' => 'footer_menu',
							'container'  => '',
							'menu_class' => 'menu',
							'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
							'walker' => new WP_Bootstrap_Navwalker()
							 ) 
						);
				?>   
			</aside>	
		<?php endif; ?>
	<?php 
	} 
endif;


// Aravalli Footer Group Second
if ( ! function_exists( 'aravalli_footer_group_second' ) ) :
function aravalli_footer_group_second() {
	$footer_bottom_2 			= get_theme_mod('footer_bottom_2','menu');	
	$footer_second_custom 		= get_theme_mod('footer_second_custom');
	
		 
		// Custom
		 if($footer_bottom_2 == 'custom'): ?>
			<?php 	
				$aravalli_copyright_allowed_tags = array(
					'[current_year]' => date_i18n('Y'),
					'[site_title]'   => get_bloginfo('name'),
					'[theme_author]' => sprintf(__('<a href="#">Aravalli WordPress Theme</a>', 'aravalli-pro')),
				);
			?>
			<div class="widget-center text-av-center text-center">                          
				<div class="copyright-text">
					<?php
						echo apply_filters('aravalli_footer_copyright', wp_kses_post(aravalli_str_replace_assoc($aravalli_copyright_allowed_tags, $footer_second_custom)));
					?>
				</div>
			</div>
		<?php endif; 
		
		// Widget
		 if($footer_bottom_2 == 'widget'): ?>
			<?php  aravalli_get_sidebars( 'aravalli-footer-layout-second' ); ?>
		<?php endif; 
		
		// Menu
		 if($footer_bottom_2 == 'menu'): ?>
			<aside class="widget-nav_menu">
				<?php 
					wp_nav_menu( 
						array(  
							'theme_location' => 'footer_menu',
							'container'  => '',
							'menu_class' => 'menu',
							'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
							'walker' => new WP_Bootstrap_Navwalker()
							 ) 
						);
				?>   
			</aside>	
		<?php endif; ?>
	<?php 
	} 
endif;	



/**
 * Aravalli Above Header First
 */
if ( ! function_exists( 'aravalli_abv_hdr_group_1' ) ) {
	function aravalli_abv_hdr_group_1() {
		//above_header_first
		$above_header_first 			= get_theme_mod('above_header_first','default');
		$hide_show_phone_details 		= get_theme_mod( 'hide_show_phone_details','1'); 
		$tlh_phone_icon 				= get_theme_mod( 'tlh_phone_icon','fa-mobile-phone'); 
		$tlh_phone_title 				= get_theme_mod( 'tlh_phone_title','+1514-2861-23'); 
		$hide_show_email_details 		= get_theme_mod( 'hide_show_email_details','1'); 
		$tlh_email_icon 				= get_theme_mod( 'tlh_email_icon','fa-envelope-o'); 
		$tlh_email_title 				= get_theme_mod( 'tlh_email_title','email@companyname.com'); 	
		$abv_hdr_first_shortcode 		= get_theme_mod('abv_hdr_first_shortcode');
		// Custom
			if($above_header_first == 'default'): 
				 if($hide_show_phone_details == '1') { ?>
					 <div class="widget widget-info phone">
						<i class="fa <?php echo esc_attr($tlh_phone_icon); ?>"></i>
						<span><?php echo esc_html($tlh_phone_title); ?></span>
					</div>
				<?php } 
				  if($hide_show_email_details == '1') {
				 ?>	
					<div class="widget widget-info email">
						<i class="fa <?php echo esc_attr($tlh_email_icon); ?>"></i>
						<span><?php echo esc_html($tlh_email_title); ?></span>
					</div>
				 <?php } endif;
		
		// Widget
			if($above_header_first == 'widget'): 
				$aravalli_above_widget_first = 'aravalli-header-above-first';
				  	if ( is_active_sidebar( $aravalli_above_widget_first ) ){ 
							dynamic_sidebar( 'aravalli-header-above-first' );
					}elseif ( current_user_can( 'edit_theme_options' ) ) {
						$aravalli_sidebar_name = aravalli_get_sidebar_name_by_id( $aravalli_above_widget_first );
						?>
						<div class="widget widget_none">
							<h4 class='widget-title'><?php echo esc_html( $aravalli_sidebar_name ); ?></h4>
							<p>
								<?php if ( is_customize_preview() ) { ?>
									<a href="JavaScript:Void(0);" class="" data-sidebar-id="<?php echo esc_attr( $aravalli_above_widget_first ); ?>">
								<?php } else { ?>
									<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">
								<?php } ?>
									<?php esc_html_e( 'Please assign a widget here.', 'aravalli-pro' ); ?>
								</a>
							</p>
						</div>
						<?php
					} 
			endif; 
		// Menu
		
			 if($above_header_first == 'menu'): ?>
				 <aside class="widget widget_nav_menu">
					<div class="menu-pages-container">
					<?php 
						wp_nav_menu( 
							array(  
								'theme_location' => 'header_above_menu',
								'container'  => '',
								'menu_class' => 'menu-wrap',
								'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
								'walker' => new WP_Bootstrap_Navwalker()
								 ) 
							);
						?>
						</div>
					</aside>	
						<?php
				 endif; 
		// Shortcode
			if($above_header_first == 'shortcode'): ?>
				<?php  if ( ! empty( $abv_hdr_first_shortcode ) ){ ?>
					<p class="m-0px"><?php echo do_shortcode($abv_hdr_first_shortcode); ?></p>
		<?php }endif;		
	}
}
add_action( 'aravalli_abv_hdr_data_first', 'aravalli_abv_hdr_group_1' );


/**
 * Aravalli Above Header Second
 */
if ( ! function_exists( 'aravalli_abv_hdr_group_2' ) ) {
	function aravalli_abv_hdr_group_2() {
		//above_header_second
		$above_header_second 			= get_theme_mod('above_header_second','default');
		$hide_show_social_icon 			= get_theme_mod( 'hide_show_social_icon','1'); 
		$social_icons 					= get_theme_mod( 'social_icons',aravalli_get_social_icon_default());
		$abv_hdr_second_shortcode 		= get_theme_mod('abv_hdr_second_shortcode');
		
			// contact
				if($above_header_second == 'default'): ?>
					<?php if($hide_show_social_icon == '1') { ?>
						  <div class="widget widget-social">
							<ul>
								<?php
									$social_icons = json_decode($social_icons);
									if( $social_icons!='' )
									{
									foreach($social_icons as $social_item){	
									$social_icon = ! empty( $social_item->icon_value ) ? apply_filters( 'aravalli_translate_single_string', $social_item->icon_value, 'Header section' ) : '';	
									$social_link = ! empty( $social_item->link ) ? apply_filters( 'aravalli_translate_single_string', $social_item->link, 'Header section' ) : '';
								?>
									<li><a href="<?php echo esc_url( $social_link ); ?>" class="linkedin"><i class="fa <?php echo esc_attr( $social_icon ); ?>"></i></a></li>
								<?php }} ?>
							</ul>
						</div>		
					<?php } ?>
				  
			<?php endif;
			
			// Widget
				 if($above_header_second == 'widget'):  
					  $aravalli_above_widget_second = 'aravalli-header-above-second';
				  	if ( is_active_sidebar( $aravalli_above_widget_second ) ){ 
							dynamic_sidebar( 'aravalli-header-above-second' );
					}elseif ( current_user_can( 'edit_theme_options' ) ) {
						$aravalli_sidebar_name = aravalli_get_sidebar_name_by_id( $aravalli_above_widget_second );
						?>
						<div class="widget widget_none">
							<h4 class='widget-title'><?php echo esc_html( $aravalli_sidebar_name ); ?></h4>
							<p>
								<?php if ( is_customize_preview() ) { ?>
									<a href="JavaScript:Void(0);" class="" data-sidebar-id="<?php echo esc_attr( $aravalli_above_widget_second ); ?>">
								<?php } else { ?>
									<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">
								<?php } ?>
									<?php esc_html_e( 'Please assign a widget here.', 'aravalli-pro' ); ?>
								</a>
							</p>
						</div>
						<?php
					} 
				endif; 
			// Menu
				 if($above_header_second == 'menu'): 
				 ?>
				  <aside class="widget widget_nav_menu">
					<div class="menu-pages-container">
						 <?php
								wp_nav_menu( 
									array(  
										'theme_location' => 'header_above_menu',
										'container'  => '',
										'menu_class' => 'menu-wrap',
										'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
										'walker' => new WP_Bootstrap_Navwalker()
										 ) 
									);
							?>
						</div>
					</aside>	
					<?php			
					 endif; 
			// Shortcode
				if($above_header_second == 'shortcode'): ?>
					<?php  if ( ! empty( $abv_hdr_second_shortcode ) ){ ?>
						<p class="m-0px"><?php echo do_shortcode($abv_hdr_second_shortcode); ?></p>
			<?php }endif;	
	}
}
add_action( 'aravalli_abv_hdr_data_second', 'aravalli_abv_hdr_group_2' );

 /**
 * Add WooCommerce Cart Icon With Cart Count (https://isabelcastillo.com/woocommerce-cart-icon-count-theme-header)
 */
function aravalli_add_to_cart_fragment( $fragments ) {
	
    ob_start();
    $count = WC()->cart->cart_contents_count;
	$header_cart				= get_theme_mod('header_cart','fa-shopping-cart'); 
    ?> 
	<a id="cart" href="javascript:void(0)" title="View your shopping cart"><i class="fa fa-cart-arrow-down"></i>
	<?php
    if ( $count > 0 ) { 
	?>
        <span><?php echo esc_html( $count ); ?></span>
	<?php            
    } else {
	?>	
		<span>0</span>
	<?php
	}
    ?></a><?php
 
    $fragments['a#cart'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'aravalli_add_to_cart_fragment' );



// Activate WordPress Maintenance Mode
$enable_comming_soon = get_theme_mod('enable_comming_soon');
  if($enable_comming_soon == '1') { 
	function wp_maintenance_mode() {
		if (!current_user_can('edit_themes') || !is_user_logged_in()) {
		   // wp_die('<h1>Under Maintenance</h1><br />Something aint right, but we are working on it! Check back later.');
		   $file = get_template_directory() . '/inc/maintenance.php';
				include($file);
				exit();
		}
	}
	add_action('get_header', 'wp_maintenance_mode');
 }
/*
 *
 * Social Icon
 */
function aravalli_get_social_icon_default() {
	return apply_filters(
		'aravalli_get_social_icon_default', json_encode(
				 array(
				array(
					'icon_value'	  =>  esc_html__( 'fa-facebook', 'aravalli-pro' ),
					'link'	  =>  esc_html__( '#', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_header_social_001',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-google-plus', 'aravalli-pro' ),
					'link'	  =>  esc_html__( '#', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_header_social_002',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-twitter', 'aravalli-pro' ),
					'link'	  =>  esc_html__( '#', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_header_social_003',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-linkedin', 'aravalli-pro' ),
					'link'	  =>  esc_html__( '#', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_header_social_004',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-behance', 'aravalli-pro' ),
					'link'	  =>  esc_html__( '#', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_header_social_005',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-vimeo', 'aravalli-pro' ),
					'link'	  =>  esc_html__( '#', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_header_social_006',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-skype', 'aravalli-pro' ),
					'link'	  =>  esc_html__( '#', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_header_social_007',
				),
			)
		)
	);
}

/*
 *
 * Footer Above Default
 */
 function aravalli_get_footer_above_default() {
	return apply_filters(
		'aravalli_get_footer_above_default', json_encode(
				 array(
				array(
					'icon_value'       => 'fa-map-marker',
					'title'           => esc_html__( 'Find Us:', 'aravalli-pro' ),
					'subtitle'           => esc_html__( 'A26, Silver Street, New York.', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_footer_above_001',
				),
				array(
					'icon_value'       => 'fa-phone',
					'title'           => esc_html__( 'Call Us Now:', 'aravalli-pro' ),
					'subtitle'           => esc_html__( '(+233) 123 457789', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_footer_above_002',
				),
				array(
					'icon_value'       => 'fa-envelope-o',
					'title'           => esc_html__( 'Email Address:', 'aravalli-pro' ),
					'subtitle'           => esc_html__( 'email@companyname.com', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_footer_above_003',
				),
			)
		)
	);
}


/*
 *
 * Slider Default
 */
 function aravalli_get_slider_default() {
	return apply_filters(
		'aravalli_get_slider_default', json_encode(
				 array(
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/slider/slider01.jpg',
					'title'           => esc_html__( 'Book Your Room Now', 'aravalli-pro' ),
					'text'            => esc_html__( "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when.", 'aravalli-pro' ),
					'text2'	  =>  esc_html__( 'Book Now', 'aravalli-pro' ),
					'link'	  =>  esc_html__( '#', 'aravalli-pro' ),
					'button_second'	  =>  esc_html__( 'View Price', 'aravalli-pro' ),
					'link2'	  =>  esc_html__( '#', 'aravalli-pro' ),
					"slide_align" => "left", 
					'id'              => 'customizer_repeater_slider_001',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/slider/slider02.jpg',
					'title'           => esc_html__( 'We Are Providing', 'aravalli-pro' ),
					'text'            => esc_html__( "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when.", 'aravalli-pro' ),
					'text2'	  =>  esc_html__( 'Book Now', 'aravalli-pro' ),
					'link'	  =>  esc_html__( '#', 'aravalli-pro' ),
					'button_second'	  =>  esc_html__( 'View Price', 'aravalli-pro' ),
					'link2'	  =>  esc_html__( '#', 'aravalli-pro' ),
					"slide_align" => "center", 
					'id'              => 'customizer_repeater_slider_002',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/slider/slider03.jpg',
					'title'           => esc_html__( 'In Aravalli', 'aravalli-pro' ),
					'text'            => esc_html__( "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when.", 'aravalli-pro' ),
					'text2'	  =>  esc_html__( 'Book Now', 'aravalli-pro' ),
					'link'	  =>  esc_html__( '#', 'aravalli-pro' ),
					'button_second'	  =>  esc_html__( 'View Price', 'aravalli-pro' ),
					'link2'	  =>  esc_html__( '#', 'aravalli-pro' ),
					"slide_align" => "right", 
					'id'              => 'customizer_repeater_slider_003',
			
				),
			)
		)
	);
}

/*
 *
 * Features Default
 */
 function aravalli_get_features_default() {
	return apply_filters(
		'aravalli_get_features_default', json_encode(
				 array(
				array(
					'icon_value'           => 'fa-cutlery',
					'title'           => esc_html__( 'Restaurant', 'aravalli-pro' ),
					'text'            => esc_html__( 'It is a long established fact that a reader will be distracted by the readable content of a page. ', 'aravalli-pro' ),
					'text2'            => esc_html__( 'Book Now ', 'aravalli-pro' ),
					'image_url'       => get_template_directory_uri() . '/assets/images/features/img-1.jpg',
					'id'              => 'customizer_repeater_features_001',
					
				),
				array(
					'icon_value'           => 'fa-user',
					'title'           => esc_html__( 'Wellness Spa', 'aravalli-pro' ),
					'text'            => esc_html__( 'It is a long established fact that a reader will be distracted by the readable content of a page. ', 'aravalli-pro' ),
					'text2'            => esc_html__( 'Book Now ', 'aravalli-pro' ),
					'image_url'       => get_template_directory_uri() . '/assets/images/features/img-2.jpg',
					'id'              => 'customizer_repeater_features_002',				
				),
				array(
					'icon_value'           => 'fa-bullseye',
					'title'           => esc_html__( 'Meditation', 'aravalli-pro' ),
					'text'            => esc_html__( 'It is a long established fact that a reader will be distracted by the readable content of a page. ', 'aravalli-pro' ),
					'text2'            => esc_html__( 'Book Now ', 'aravalli-pro' ),
					'image_url'       => get_template_directory_uri() . '/assets/images/features/img-1.jpg',
					'id'              => 'customizer_repeater_features_003',
				),
				array(
					'icon_value'           => 'fa-users',
					'title'           => esc_html__( 'Banquet Hall', 'aravalli-pro' ),
					'text'            => esc_html__( 'It is a long established fact that a reader will be distracted by the readable content of a page. ', 'aravalli-pro' ),
					'text2'            => esc_html__( 'Book Now ', 'aravalli-pro' ),
					'image_url'       => get_template_directory_uri() . '/assets/images/features/img-2.jpg',
					'id'              => 'customizer_repeater_features_004',
				),
			)
		)
	);
}




/*
 *
 * About FAQ Default
 */
 function aravalli_get_abt_faq_default() {
	return apply_filters(
		'aravalli_get_abt_faq_default', json_encode(
				 array(
				array(
					'title'           => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'aravalli-pro' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore impedit quae repellendus provident dolor iure poss imusven am aliquam. Officiis totam ea laborum deser unt vonsess. iure poss imusven am aliquamLorem.', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_abt_faq_001',
					
				),
				array(
					'title'           => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'aravalli-pro' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore impedit quae repellendus provident dolor iure poss imusven am aliquam. Officiis totam ea laborum deser unt vonsess. iure poss imusven am aliquamLorem.', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_abt_faq_002',		
				),
				array(
					'title'           => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'aravalli-pro' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore impedit quae repellendus provident dolor iure poss imusven am aliquam. Officiis totam ea laborum deser unt vonsess. iure poss imusven am aliquamLorem.', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_abt_faq_003',
				),
				array(
					'title'           => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'aravalli-pro' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore impedit quae repellendus provident dolor iure poss imusven am aliquam. Officiis totam ea laborum deser unt vonsess. iure poss imusven am aliquamLorem.', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_abt_faq_004',
				),
			)
		)
	);
}

/*
 *
 * Amenities Default
 */
 function aravalli_get_amenities_default() {
	return apply_filters(
		'aravalli_get_amenities_default', json_encode(
				 array(
				array(
					'title'           => esc_html__( 'Free Parking', 'aravalli-pro' ),
					'icon_value'       => 'fa-car',
					'id'              => 'customizer_repeater_amenities_001',
				),
				array(
					'title'           => esc_html__( 'Wi - Internet', 'aravalli-pro' ),
					'icon_value'       => 'fa-wifi',
					'id'              => 'customizer_repeater_amenities_002',		
				),
				array(
					'title'           => esc_html__( '24/7 Laundry Searvice', 'aravalli-pro' ),
					'icon_value'       => 'fa-clock-o',
					'id'              => 'customizer_repeater_amenities_003',
				),
				array(
					'title'           => esc_html__( 'Gym & Beauty Care', 'aravalli-pro' ),
					'icon_value'       => 'fa-blind',
					'id'              => 'customizer_repeater_amenities_004',
				),
				array(
					'title'           => esc_html__( '24 Hour- In Room Dining', 'aravalli-pro' ),
					'icon_value'       => 'fa-clock-o',
					'id'              => 'customizer_repeater_amenities_005',
				),
				array(
					'title'           => esc_html__( 'Central Air Condition', 'aravalli-pro' ),
					'icon_value'       => 'fa-hotel',
					'id'              => 'customizer_repeater_amenities_006',
				),
				array(
					'title'           => esc_html__( 'Luxery Swimming Pool', 'aravalli-pro' ),
					'icon_value'       => 'fa-bath',
					'id'              => 'customizer_repeater_amenities_007',
				),
				array(
					'title'           => esc_html__( 'Airport & Local Transfers', 'aravalli-pro' ),
					'icon_value'       => 'fa-taxi',
					'id'              => 'customizer_repeater_amenities_008',
				),
				array(
					'title'           => esc_html__( 'Bar & Restaurant', 'aravalli-pro' ),
					'icon_value'       => 'fa-glass',
					'id'              => 'customizer_repeater_amenities_009',
				),
				array(
					'title'           => esc_html__( 'Ticket Booking', 'aravalli-pro' ),
					'icon_value'       => 'fa-ticket',
					'id'              => 'customizer_repeater_amenities_0010',
				),
				array(
					'title'           => esc_html__( 'Currency Convertibility', 'aravalli-pro' ),
					'icon_value'       => 'fa-money',
					'id'              => 'customizer_repeater_amenities_0011',
				),
				array(
					'title'           => esc_html__( 'Confrence Center', 'aravalli-pro' ),
					'icon_value'       => 'fa-braille',
					'id'              => 'customizer_repeater_amenities_0012',
				),
			)
		)
	);
}


/*
 *
 * Gallery Default
 */
 function aravalli_get_gallery_default() {
	return apply_filters(
		'aravalli_get_gallery_default', json_encode(
				 array(
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/galleryimg01.jpg',
					'title'       => esc_html__( 'Business Ideas', 'aravalli-pro' ),
					'text'       => esc_html__( 'Fact that a reader will distracted by the readable content of a page looking at its layout.', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_gallery_001',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/galleryimg03.jpg',
					'title'       => esc_html__( 'Business Ideas', 'aravalli-pro' ),
					'text'       => esc_html__( 'Fact that a reader will distracted by the readable content of a page looking at its layout.', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_gallery_002',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/galleryimg03.jpg',
					'title'       => esc_html__( 'Business Ideas', 'aravalli-pro' ),
					'text'       => esc_html__( 'Fact that a reader will distracted by the readable content of a page looking at its layout.', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_gallery_003',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/galleryimg04.jpg',
					'title'       => esc_html__( 'Business Ideas', 'aravalli-pro' ),
					'text'       => esc_html__( 'Fact that a reader will distracted by the readable content of a page looking at its layout.', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_gallery_004',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/galleryimg05.jpg',
					'title'       => esc_html__( 'Business Ideas', 'aravalli-pro' ),
					'text'       => esc_html__( 'Fact that a reader will distracted by the readable content of a page looking at its layout.', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_gallery_005',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/galleryimg06.jpg',
					'title'       => esc_html__( 'Business Ideas', 'aravalli-pro' ),
					'text'       => esc_html__( 'Fact that a reader will distracted by the readable content of a page looking at its layout.', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_gallery_006',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/galleryimg07.jpg',
					'title'       => esc_html__( 'Business Ideas', 'aravalli-pro' ),
					'text'       => esc_html__( 'Fact that a reader will distracted by the readable content of a page looking at its layout.', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_gallery_007',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/galleryimg08.jpg',
					'title'       => esc_html__( 'Business Ideas', 'aravalli-pro' ),
					'text'       => esc_html__( 'Fact that a reader will distracted by the readable content of a page looking at its layout.', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_gallery_008',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/galleryimg09.jpg',
					'title'       => esc_html__( 'Business Ideas', 'aravalli-pro' ),
					'text'       => esc_html__( 'Fact that a reader will distracted by the readable content of a page looking at its layout.', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_gallery_009',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/gallery/galleryimg10.jpg',
					'title'       => esc_html__( 'Business Ideas', 'aravalli-pro' ),
					'text'       => esc_html__( 'Fact that a reader will distracted by the readable content of a page looking at its layout.', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_gallery_010',
				),
			)
		)
	);
}


/*
 *
 * Certificates Default
 */
 function aravalli_get_certificates_default() {
	return apply_filters(
		'aravalli_get_certificates_default', json_encode(
				 array(
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/certificates/img-1.jpg',
					'id'              => 'customizer_repeater_certificates_001',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/certificates/img-2.jpg',
					'id'              => 'customizer_repeater_certificates_002',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/certificates/img-3.jpg',
					'id'              => 'customizer_repeater_certificates_003',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/certificates/img-4.jpg',
					'id'              => 'customizer_repeater_certificates_004',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/certificates/img-5.jpg',
					'id'              => 'customizer_repeater_certificates_005',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/certificates/img-1.jpg',
					'id'              => 'customizer_repeater_certificates_006',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/certificates/img-2.jpg',
					'id'              => 'customizer_repeater_certificates_007',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/certificates/img-3.jpg',
					'id'              => 'customizer_repeater_certificates_008',
				),
			)
		)
	);
}

/*
 *
 * Team Default
 */
 function aravalli_get_team_default() {
	return apply_filters(
		'aravalli_get_team_default', json_encode(
					  array(
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/expert/img-1.jpg',
					'title'           => esc_html__( 'Noora Fatehi', 'aravalli-pro' ),
					'subtitle'        => esc_html__( 'Creative Designer','aravalli-pro' ),
					'id'              => 'customizer_repeater_team_00526',
					'social_repeater' => json_encode(
						array(
							array(
								'id'   => 'customizer-repeater-social-repeater-team_00211',
								'link' => 'facebook.com',
								'icon' => 'fa-facebook',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_00213',
								'link' => 'twitter.com',
								'icon' => 'fa-twitter',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_00214',
								'link' => 'instagram.com',
								'icon' => 'fa-instagram',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_00215',
								'link' => 'linkedin.com',
								'icon' => 'fa-linkedin',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_00216',
								'link' => 'behance.com',
								'icon' => 'fa-behance',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_00217',
								'link' => 'vimeo.com',
								'icon' => 'fa-vimeo',
							),
						)
					),
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/expert/img-2.jpg',
					'title'           => esc_html__( 'Masum Parvej', 'aravalli-pro' ),
					'subtitle'        => esc_html__( 'UI/UX Designer', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_team_0002',
					'social_repeater' => json_encode(
						array(
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0011',
								'link' => 'facebook.com',
								'icon' => 'fa-facebook',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0012',
								'link' => 'twitter.com',
								'icon' => 'fa-twitter',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0013',
								'link' => 'pinterest.com',
								'icon' => 'fa-instagram',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0014',
								'link' => 'linkedin.com',
								'icon' => 'fa-linkedin',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0015',
								'link' => 'behance.com',
								'icon' => 'fa-behance',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0016',
								'link' => 'vimeo.com',
								'icon' => 'fa-vimeo',
							),
						)
					),
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/expert/img-3.jpg',
					'title'           => esc_html__( 'Rej Dass', 'aravalli-pro' ),
					'subtitle'        => esc_html__( 'Web Developer', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_team_0003',
					'social_repeater' => json_encode(
						array(
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0021',
								'link' => 'facebook.com',
								'icon' => 'fa-facebook',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0022',
								'link' => 'twitter.com',
								'icon' => 'fa-twitter',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0023',
								'link' => 'linkedin.com',
								'icon' => 'fa-instagram',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0024',
								'link' => 'linkedin.com',
								'icon' => 'fa-linkedin',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0025',
								'link' => 'behance.com',
								'icon' => 'fa-behance',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0026',
								'link' => 'vimeo.com',
								'icon' => 'fa-vimeo',
							),
						)
					),
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/expert/img-4.jpg',
					'title'           => esc_html__( 'Ali Sayyad', 'aravalli-pro' ),
					'subtitle'        => esc_html__( 'Co-Founder/Design', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_team_0004',
					'social_repeater' => json_encode(
						array(
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0031',
								'link' => 'facebook.com',
								'icon' => 'fa-facebook',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0032',
								'link' => 'twitter.com',
								'icon' => 'fa-twitter',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0033',
								'link' => 'linkedin.com',
								'icon' => 'fa-instagram',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0034',
								'link' => 'linkedin.com',
								'icon' => 'fa-linkedin',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0035',
								'link' => 'behance.com',
								'icon' => 'fa-behance',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-team_0036',
								'link' => 'vimeo.com',
								'icon' => 'fa-vimeo',
							),
						)
					),
				),
			)
		)
	);
}


/*
 *
 * Funfact Default
 */
 function aravalli_get_funfact_default() {
	return apply_filters(
		'aravalli_get_funfact_default', json_encode(
				 array(
				array(
					'title'           => esc_html__( '1200', 'aravalli-pro' ),
					'subtitle'           => esc_html__( '+', 'aravalli-pro' ),
					'text'            => esc_html__( 'Customers Feedback', 'aravalli-pro' ),
					 'icon_value'       => 'fa-thumbs-up ',
					'id'              => 'customizer_repeater_funfact_001',
					
				),
				array(
					'title'           => esc_html__( '200', 'aravalli-pro' ),
					'subtitle'           => esc_html__( '+', 'aravalli-pro' ),
					'text'            => esc_html__( 'Hotel Staff', 'aravalli-pro' ),
					 'icon_value'       => ' fa-hotel',
					'id'              => 'customizer_repeater_funfact_002',			
				),
				array(
					'title'           => esc_html__( '500', 'aravalli-pro' ),
					'subtitle'           => esc_html__( '+', 'aravalli-pro' ),
					'text'            => esc_html__( 'Food Recipes', 'aravalli-pro' ),
					'icon_value'       => 'fa-cutlery',
					'id'              => 'customizer_repeater_funfact_003',
				),
				array(
					'title'           => esc_html__( '700', 'aravalli-pro' ),
					'subtitle'           => esc_html__( '+', 'aravalli-pro' ),
					'text'            => esc_html__( 'Rooms & Suits', 'aravalli-pro' ),
					 'icon_value'       => 'fa-bed',
					'id'              => 'customizer_repeater_funfact_004',
				)
			)
		)
	);
}


/*
 *
 * Promotional Default
 */
 function aravalli_get_promotional_default() {
	return apply_filters(
		'aravalli_get_promotional_default', json_encode(
				 array(
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/promostional/img-1.jpg',
					'title'           => esc_html__( 'Order Food', 'aravalli-pro' ),
					'subtitle'           => esc_html__( 'Online', 'aravalli-pro' ),
					'text'            => esc_html__( 'Use code to get 50% upto $5 on your next order.', 'aravalli-pro' ),
					 'text2'       => 'Order Now',
					'id'              => 'customizer_repeater_promotional_001',
					
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/promostional/img-2.jpg',
					'title'           => esc_html__( 'Order Food', 'aravalli-pro' ),
					'subtitle'           => esc_html__( 'Online', 'aravalli-pro' ),
					'text'            => esc_html__( 'Use code to get 50% upto $5 on your next order.', 'aravalli-pro' ),
					 'text2'       => 'Order Now',
					'id'              => 'customizer_repeater_promotional_002',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/promostional/img-3.jpg',
					'title'           => esc_html__( 'Order Food', 'aravalli-pro' ),
					'subtitle'           => esc_html__( 'Online', 'aravalli-pro' ),
					'text'            => esc_html__( 'Use code to get 50% upto $5 on your next order.', 'aravalli-pro' ),
					 'text2'       => 'Order Now',
					'id'              => 'customizer_repeater_promotional_003',
				),
			)
		)
	);
}



/*
 *
 * News Button  Default
 */
 function aravalli_get_news_btn_default() {
	return apply_filters(
		'aravalli_get_news_btn_default', json_encode(
				 array(
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/newsLetter/app.png',
					'id'              => 'customizer_repeater_news_btn_001',
					
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/newsLetter/google.png',
					'id'              => 'customizer_repeater_news_btn_002',
				),
				array(
					'image_url'       => get_template_directory_uri() . '/assets/images/newsLetter/add-btn.png',
					'id'              => 'customizer_repeater_news_btn_003',
				),
			)
		)
	);
}


/*
 *
 * Testimonial Default
 */
 
 function aravalli_get_testimonial_default() {
	return apply_filters(
		'aravalli_get_testimonial_default', json_encode(
			array(
				array(
					'title'           => esc_html__( 'Andrew Reed,', 'aravalli-pro' ),
					'subtitle'        => esc_html__( 'Business man', 'aravalli-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem. Simply dummy text.', 'aravalli-pro' ),
					'text2'        => esc_html__( 'Awesome Service Provider', 'aravalli-pro' ),
					'image_url'		  =>  get_template_directory_uri() . '/assets/images/avatar/img-1.jpg',
					'id'              => 'customizer_repeater_testimonial_001',
				),
				array(
					'title'           => esc_html__( 'Lina Andrew,', 'aravalli-pro' ),
					'subtitle'        => esc_html__( 'Fashion Designer', 'aravalli-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem. Simply dummy text.', 'aravalli-pro' ),
					'text2'        => esc_html__( 'Splendid Service Provider', 'aravalli-pro' ),
					'image_url'		  =>  get_template_directory_uri() . '/assets/images/avatar/img-2.jpg',
					'id'              => 'customizer_repeater_testimonial_002',
				),
				array(
					'title'           => esc_html__( 'Andrew Reed,', 'aravalli-pro' ),
					'subtitle'        => esc_html__( 'Business man', 'aravalli-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem. Simply dummy text.', 'aravalli-pro' ),
					'text2'        => esc_html__( 'Awesome Service Provider', 'aravalli-pro' ),
					'image_url'		  =>  get_template_directory_uri() . '/assets/images/avatar/img-1.jpg',
					'id'              => 'customizer_repeater_testimonial_003',
				),
				array(
					'title'           => esc_html__( 'Lina Andrew,', 'aravalli-pro' ),
					'subtitle'        => esc_html__( 'Fashion Designer', 'aravalli-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem. Simply dummy text.', 'aravalli-pro' ),
					'text2'        => esc_html__( 'Splendid Service Provider', 'aravalli-pro' ),
					'image_url'		  =>  get_template_directory_uri() . '/assets/images/avatar/img-2.jpg',
					'id'              => 'customizer_repeater_testimonial_004',
				),
				array(
					'title'           => esc_html__( 'Andrew Reed,', 'aravalli-pro' ),
					'subtitle'        => esc_html__( 'Business man', 'aravalli-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem. Simply dummy text.', 'aravalli-pro' ),
					'text2'        => esc_html__( 'Awesome Service Provider', 'aravalli-pro' ),
					'image_url'		  =>  get_template_directory_uri() . '/assets/images/avatar/img-1.jpg',
					'id'              => 'customizer_repeater_testimonial_005',
				),
				array(
					'title'           => esc_html__( 'Lina Andrew,', 'aravalli-pro' ),
					'subtitle'        => esc_html__( 'Fashion Designer', 'aravalli-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem. Simply dummy text.', 'aravalli-pro' ),
					'text2'        => esc_html__( 'Splendid Service Provider', 'aravalli-pro' ),
					'image_url'		  =>  get_template_directory_uri() . '/assets/images/avatar/img-2.jpg',
					'id'              => 'customizer_repeater_testimonial_006',
				),
		    )
		)
	);
}



/*
 *
 * Event Default
 */
 
 function aravalli_get_event_default() {
	return apply_filters(
		'aravalli_get_event_default', json_encode(
			array(
				array(
					'title'           => esc_html__( '01', 'aravalli-pro' ),
					'subtitle'        => esc_html__( 'Sept, 2018', 'aravalli-pro' ),
					'text2'            => esc_html__( 'Lorem Ipsum is simply', 'aravalli-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem. Simply dummy text.', 'aravalli-pro' ),
					'button_second'	  =>  esc_html__( 'Book Now', 'aravalli-pro' ),
					'shortcode'	  =>  esc_html__( '1:00am - 2:30am', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_event_001',
				),
				array(
					'title'           => esc_html__( '05', 'aravalli-pro' ),
					'subtitle'        => esc_html__( 'Sept, 2018', 'aravalli-pro' ),
					'text2'            => esc_html__( 'Lorem Ipsum is simply', 'aravalli-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem. Simply dummy text.', 'aravalli-pro' ),
					'button_second'	  =>  esc_html__( 'Book Now', 'aravalli-pro' ),
					'shortcode'	  =>  esc_html__( '1:00am - 2:30am', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_event_002',
				),
				array(
					'title'           => esc_html__( '01', 'aravalli-pro' ),
					'subtitle'        => esc_html__( 'Sept, 2018', 'aravalli-pro' ),
					'text2'            => esc_html__( 'Lorem Ipsum is simply', 'aravalli-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem. Simply dummy text.', 'aravalli-pro' ),
					'button_second'	  =>  esc_html__( 'Book Now', 'aravalli-pro' ),
					'shortcode'	  =>  esc_html__( '1:00am - 2:30am', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_event_003',
				),
				array(
					'title'           => esc_html__( '05', 'aravalli-pro' ),
					'subtitle'        => esc_html__( 'Sept, 2018', 'aravalli-pro' ),
					'text2'            => esc_html__( 'Lorem Ipsum is simply', 'aravalli-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem. Simply dummy text.', 'aravalli-pro' ),
					'button_second'	  =>  esc_html__( 'Book Now', 'aravalli-pro' ),
					'shortcode'	  =>  esc_html__( '1:00am - 2:30am', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_event_004',
				),
				array(
					'title'           => esc_html__( '01', 'aravalli-pro' ),
					'subtitle'        => esc_html__( 'Sept, 2018', 'aravalli-pro' ),
					'text2'            => esc_html__( 'Lorem Ipsum is simply', 'aravalli-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem. Simply dummy text.', 'aravalli-pro' ),
					'button_second'	  =>  esc_html__( 'Book Now', 'aravalli-pro' ),
					'shortcode'	  =>  esc_html__( '1:00am - 2:30am', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_event_005',
				),
				array(
					'title'           => esc_html__( '05', 'aravalli-pro' ),
					'subtitle'        => esc_html__( 'Sept, 2018', 'aravalli-pro' ),
					'text2'            => esc_html__( 'Lorem Ipsum is simply', 'aravalli-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem. Simply dummy text.', 'aravalli-pro' ),
					'button_second'	  =>  esc_html__( 'Book Now', 'aravalli-pro' ),
					'shortcode'	  =>  esc_html__( '1:00am - 2:30am', 'aravalli-pro' ),
					'id'              => 'customizer_repeater_event_006',
				),
		    )
		)
	);
}


/*
 *
 * Contact Info Default
 */
 
 function aravalli_get_contact_pg_info_default() {
	return apply_filters(
		'aravalli_get_contact_pg_info_default', json_encode(
			array(
				array(
					'title'           => esc_html__( 'Call Us At', 'aravalli-pro' ),
					'subtitle'        => esc_html__( '0123-456-789, 0123-987-654', 'aravalli-pro' ),
					'text2'           => esc_html__( '+044-426-888, +044-452-888', 'aravalli-pro' ),
					'icon_value'		  => 'fa-phone',
					'id'              => 'customizer_repeater_ct_info_001',
				),
				array(
					'title'           => esc_html__( 'Our Hotel', 'aravalli-pro' ),
					'subtitle'        => esc_html__( 'Palace Building - 221b', 'aravalli-pro' ),
					'text2'           => esc_html__( 'Baker Street London - UK', 'aravalli-pro' ),
					'icon_value'		  => 'fa-map-pin',
					'id'              => 'customizer_repeater_ct_info_002',
				),
				array(
					'title'           => esc_html__( 'Send A Mail', 'aravalli-pro' ),
					'subtitle'        => esc_html__( 'email@companyname.com', 'aravalli-pro' ),
					'text2'           => esc_html__( 'email@companyname.com', 'aravalli-pro' ),
					'icon_value'		  => 'fa-envelope-o',
					'id'              => 'customizer_repeater_ct_info_003',
				),
				array(
					'title'           => esc_html__( 'Whatsaap', 'aravalli-pro' ),
					'subtitle'        => esc_html__( '0123-456-789, 0123-987-654', 'aravalli-pro' ),
					'text2'           => esc_html__( '+044-426-888, +044-452-888', 'aravalli-pro' ),
					'icon_value'		  => 'fa-phone',
					'id'              => 'customizer_repeater_ct_info_004',
				),
		    )
		)
	);
}


function aravalli_admin_font_awesome_list() {
		$new_icons = array(
			'fa-glass'                               => '&#xf000 fa-glass',
			'fa-music'                               => '&#xf001 fa-music',
			'fa-search'                              => '&#xf002 fa-search',
			'fa-envelope-o'                          => '&#xf0e0 fa-envelope-o',
			'fa-heart'                               => '&#xf004 fa-heart',
			'fa-star'                                => '&#xf005 fa-star',
			'fa-star-o'                              => '&#xf006 fa-star-o',
			'fa-user'                                => '&#xf007 fa-user',
			'fa-film'                                => '&#xf008 fa-film',
			'fa-th-large'                            => '&#xf009 fa-th-large',
			'fa-th'                                  => '&#xf00a fa-th',
			'fa-th-list'                             => '&#xf00b fa-th-list',
			'fa-check'                               => '&#xf00c fa-check',
			'fa-times'                               => '&#xf00d fa-times',
			'fa-search-plus'                         => '[&#xf00e fa-search-plus',
			'fa-search-minus'                        => '&#xf010 fa-search-minus',
			'fa-power-off'                           => '&#xf011 fa-power-off',
			'fa-signal'                              => '&#xf012 fa-signal',
			'fa-cog'                                 => '&#xf085 fa-cog',
			'fa-trash-o'                             => '&#xf014 fa-trash-o',
			'fa-home'                                => '&#xf015 fa-home',
			'fa-file-o'                              => '&#xf016 fa-file-o',
			'fa-clock-o'                             => '&#xf017 fa-clock-o',
			'fa-road'                                => '&#xf018 fa-road',
			'fa-download'                            => '&#xf019 fa-download',
			'fa-arrow-circle-o-down'                 => '&#xf01a fa-arrow-circle-o-down',
			'fa-arrow-circle-o-up'                   => '&#xf01b fa-arrow-circle-o-up',
			'fa-inbox'                               => '&#xf01c fa-inbox',
			'fa-play-circle-o'                       => '&#xf01d fa-play-circle-o',
			'fa-repeat'                              => '&#xf01e fa-repeat',
			'fa-refresh'                             => '&#xf021 fa-refresh',
			'fa-list-alt'                            => '&#xf022 fa-list-alt',
			'fa-lock'                                => '&#xf023 fa-lock',
			'fa-flag'                                => '&#xf024 fa-flag',
			'fa-headphones'                          => '&#xf025 fa-headphones',
			'fa-volume-off'                          => '&#xf026 fa-volume-off',
			'fa-volume-down'                         => '&#xf027 fa-volume-down',
			'fa-volume-up'                           => '&#xf028 fa-volume-up',
			'fa-qrcode'                              => '&#xf029 fa-qrcode',
			'fa-barcode'                             => '&#xf02a fa-barcode',
			'fa-tag'                                 => '&#xf02b fa-tag',
			'fa-tags'                                => '&#xf02c fa-tags',
			'fa-book'                                => '&#xf02d fa-book',
			'fa-bookmark'                            => '&#xf02e fa-bookmark',
			'fa-print'                               => '&#xf02f fa-print',
			'fa-camera'                              => '&#xf030 fa-camera',
			'fa-font'                                => '&#xf031 fa-font',
			'fa-bold'                                => '&#xf032 fa-bold',
			'fa-italic'                              => '&#xf033 fa-italic',
			'fa-text-height'                         => '&#xf034 fa-text-height',
			'fa-text-width'                          => '&#xf035 fa-text-width',
			'fa-align-left'                          => '&#xf036 fa-align-left',
			'fa-align-center'                        => '&#xf037 fa-align-center',
			'fa-align-right'                         => '&#xf038 fa-align-right',
			'fa-align-justify'                       => '&#xf039 fa-align-justify',
			'fa-list'                                => '&#xf03a fa-list',
			'fa-outdent'                             => '&#xf03b fa-outdent',
			'fa-indent'                              => '&#xf03c fa-indent',
			'fa-video-camera'                        => '&#xf03d fa-video-camera',
			'fa-picture-o'                           => '&#xf03e fa-picture-o',
			'fa-pencil'                              => '&#xf040 fa-pencil',
			'fa-map-marker'                          => '&#xf041 fa-map-marker',
			'fa-adjust'                              => '&#xf042 fa-adjust',
			'fa-tint'                                => '&#xf043 fa-tint',
			'fa-pencil-square-o'                     => '&#xf044 fa-pencil-square-o',
			'fa-share-square-o'                      => '&#xf045 fa-share-square-o',
			'fa-check-square-o'                      => '&#xf046 fa-check-square-o',
			'fa-arrows'                              => '&#xf047 fa-arrows',
			'fa-step-backward'                       => '&#xf048 fa-step-backward',
			'fa-fast-backward'                       => '&#xf049 fa-fast-backward',
			'fa-backward'                            => '&#xf04a fa-backward',
			'fa-play'                                => '&#xf04b fa-play',
			'fa-pause'                               => '&#xf04c fa-pause',
			'fa-stop'                                => '&#xf04d fa-stop',
			'fa-forward'                             => '&#xf04e fa-forward',
			'fa-fast-forward'                        => '&#xf050 fa-fast-forward',
			'fa-step-forward'                        => '&#xf051 fa-step-forward',
			'fa-eject'                               => '&#xf052 fa-eject',
			'fa-chevron-left'                        => '&#xf053 fa-chevron-left',
			'fa-chevron-right'                       => '&#xf054 fa-chevron-right',
			'fa-plus-circle'                         => '&#xf055 fa-plus-circle',
			'fa-minus-circle'                        => '&#xf056 fa-minus-circle',
			'fa-times-circle'                        => '&#xf057 fa-times-circle',
			'fa-check-circle'                        => '&#xf058 fa-check-circle',
			'fa-question-circle'                     => '&#xf059 fa-question-circle',
			'fa-info-circle'                         => '&#xf05a fa-info-circle',
			'fa-crosshairs'                          => '&#xf05b fa-crosshairs',
			'fa-times-circle-o'                      => '&#xf05c fa-times-circle-o',
			'fa-check-circle-o'                      => '&#xf05d fa-check-circle-o',
			'fa-ban'                                 => '&#xf05e fa-ban',
			'fa-arrow-left'                          => '&#xf060 fa-arrow-left',
			'fa-arrow-right'                         => '&#xf061 fa-arrow-right',
			'fa-arrow-up'                            => '&#xf062 fa-arrow-up',
			'fa-arrow-down'                          => '&#xf063 fa-arrow-down',
			'fa-share'                               => '&#xf064 fa-share',
			'fa-expand'                              => '&#xf065 fa-expand',
			'fa-compress'                            => '&#xf066 fa-compress',
			'fa-plus'                                => '&#xf067 fa-plus',
			'fa-minus'                               => '&#xf068 fa-minus',
			'fa-asterisk'                            => '&#xf069 fa-asterisk',
			'fa-exclamation-circle'                  => '&#xf06a fa-exclamation-circle',
			'fa-gift'                                => '&#xf06b fa-gift',
			'fa-leaf'                                => '&#xf06c fa-leaf',
			'fa-fire'                                => '&#xf06d fa-fire',
			'fa-eye'                                 => '&#xf06e fa-eye',
			'fa-eye-slash'                           => '&#xf070 fa-eye-slash',
			'fa-exclamation-triangle'                => '&#xf071 fa-exclamation-triangle',
			'fa-plane'                               => '&#xf072 fa-plane',
			'fa-calendar'                            => '&#xf073 fa-calendar',
			'fa-random'                              => '&#xf074 fa-random',
			'fa-comment'                             => '&#xf075 fa-comment',
			'fa-magnet'                              => '&#xf076 fa-magnet',
			'fa-chevron-up'                          => '&#xf077 fa-chevron-up',
			'fa-chevron-down'                        => '&#xf078 fa-chevron-down',
			'fa-retweet'                             => '&#xf079 fa-retweet',
			'fa-shopping-cart'                       => '&#xf07a fa-shopping-cart',
			'fa-folder'                              => '&#xf07b fa-folder',
			'fa-folder-open'                         => '&#xf07b fa-folder-open',
			'fa-arrows-v'                            => '&#xf07d fa-arrows-v',
			'fa-arrows-h'                            => '&#xf07e fa-arrows-h',
			'fa-bar-chart'                           => '&#xf080 fa-bar-chart',
			'fa-twitter-square'                      => '&#xf081 fa-twitter-square',
			'fa-facebook-square'                     => '&#xf082 fa-facebook-square',
			'fa-camera-retro'                        => '&#xf083 fa-camera-retro',
			'fa-key'                                 => '&#xf084 fa-key',
			'fa-cogs'                                => '&#xf085 fa-cogs',
			'fa-comments'                            => '&#xf086 fa-comments',
			'fa-thumbs-o-up'                         => '&#xf087 fa-thumbs-o-up',
			'fa-thumbs-o-down'                       => '&#xf088 fa-thumbs-o-down',
			'fa-star-half'                           => '&#xf089 fa-star-half',
			'fa-heart-o'                             => '&#xf08a fa-heart-o',
			'fa-sign-out'                            => '&#xf08b fa-sign-out',
			'fa-linkedin-square'                     => '&#xf08c fa-linkedin-square',
			'fa-thumb-tack'                          => '&#xf08d fa-thumb-tack',
			'fa-external-link'                       => '&#xf08e fa-external-link',
			'fa-sign-in'                             => '&#xf090 fa-sign-in',
			'fa-trophy'                              => '&#xf091 fa-trophy',
			'fa-github-square'                       => '&#xf092 fa-github-square',
			'fa-upload'                              => '&#xf093 fa-upload',
			'fa-lemon-o'                             => '&#xf094 fa-lemon-o',
			'fa-phone'                               => '&#xf095 fa-phone',
			'fa-square-o'                            => '&#xf096 fa-square-o',
			'fa-bookmark-o'                          => '&#xf097 fa-bookmark-o',
			'fa-phone-square'                        => '&#xf098 fa-phone-square',
			'fa-twitter'                             => '&#xf099 fa-twitter',
			'fa-facebook'                            => '&#xf09a fa-facebook',
			'fa-github'                              => '&#xf09b fa-github',
			'fa-unlock'                              => '&#xf09c fa-unlock',
			'fa-credit-card'                         => '&#xf09d fa-credit-card',
			'fa-rss'                                 => '&#xf09e fa-rss',
			'fa-hdd-o'                               => '&#xf0a0 fa-hdd-o',
			'fa-bullhorn'                            => '&#xf0a1 fa-bullhorn',
			'fa-bell'                                => '&#xf0f3 fa-bell',
			'fa-certificate'                         => '&#xf0a3 fa-certificate',
			'fa-hand-o-right'                        => '&#xf0a4 fa-hand-o-right',
			'fa-hand-o-left'                         => '&#xf0a5 fa-hand-o-left',
			'fa-hand-o-up'                           => '&#xf0a6 fa-hand-o-up',
			'fa-hand-o-down'                         => '&#xf0a7 fa-hand-o-down',
			'fa-arrow-circle-left'                   => '&#xf0a8 fa-arrow-circle-left',
			'fa-arrow-circle-right'                  => '&#xf0a9 fa-arrow-circle-right',
			'fa-arrow-circle-up'                     => '&#xf0aa fa-arrow-circle-up',
			'fa-arrow-circle-down'                   => '&#xf0ab fa-arrow-circle-down',
			'fa-globe'                               => '&#xf0ac fa-globe',
			'fa-wrench'                              => '&#xf0ad fa-wrench',
			'fa-tasks'                               => '&#xf0ae fa-tasks',
			'fa-filter'                              => '&#xf0b0 fa-filter',
			'fa-briefcase'                           => '&#xf0b1 fa-briefcase',
			'fa-arrows-alt'                          => '&#xf0b2 fa-arrows-alt',
			'fa-users'                               => '&#xf0c0 fa-users',
			'fa-link'                                => '&#xf0c1 fa-link',
			'fa-cloud'                               => '&#xf0c2 fa-cloud',
			'fa-flask'                               => '&#xf0c3 fa-flask',
			'fa-scissors'                            => '&#xf0c4 fa-scissors',
			'fa-files-o'                             => '&#xf0c5 fa-files-o',
			'fa-paperclip'                           => '&#xf0c6 fa-paperclip',
			'fa-floppy-o'                            => '&#xf0c7 fa-floppy-o',
			'fa-square'                              => '&#xf0c8 fa-square',
			'fa-bars'                                => '&#xf0c9 fa-bars',
			'fa-list-ul'                             => '&#xf0ca fa-list-ul',
			'fa-list-ol'                             => '&#xf0cb fa-list-ol',
			'fa-strikethrough'                       => '&#xf0cc fa-strikethrough',
			'fa-underline'                           => '&#xf0cd fa-underline',
			'fa-table'                               => '&#xf0ce fa-table',
			'fa-magic'                               => '&#xf0d0 fa-magic',
			'fa-truck'                               => '&#xf0d1 fa-truck',
			'fa-pinterest'                           => '&#xf0d2 fa-pinterest',
			'fa-pinterest-square'                    => '&#xf0d3 fa-pinterest-square',
			'fa-google-plus-square'                  => '&#xf0d4 fa-google-plus-square',
			'fa-google-plus'                         => '&#xf0d5 fa-google-plus',
			'fa-money'                               => '&#xf0d6 fa-money',
			'fa-caret-down'                          => '&#xf0d7 fa-caret-down',
			'fa-caret-up'                            => '&#xf0d8 fa-caret-up',
			'fa-caret-left'                          => '&#xf0d9 fa-caret-left',
			'fa-caret-right'                         => '&#xf0da fa-caret-right',
			'fa-columns'                             => '&#xf0db fa-columns',
			'fa-sort'                                => '&#xf0dc fa-sort',
			'fa-sort-desc'                           => '&#xf0dd fa-sort-desc',
			'fa-sort-asc'                            => '&#xf0de fa-sort-asc',
			'fa-envelope'                            => '&#xf0e0 fa-envelope',
			'fa-linkedin'                            => '&#xf0e1 fa-linkedin',
			'fa-undo'                                => '&#xf0e2 fa-undo',
			'fa-gavel'                               => '&#xf0e3 fa-gavel',
			'fa-tachometer'                          => '&#xf0e4 fa-tachometer',
			'fa-comment-o'                           => '&#xf0e5 fa-comment-o',
			'fa-comments-o'                          => '&#xf0e6 fa-comments-o',
			'fa-bolt'                                => '&#xf0e7 fa-bolt',
			'fa-sitemap'                             => '&#xf0e8 fa-sitemap',
			'fa-umbrella'                            => '&#xf0e9 fa-umbrella',
			'fa-clipboard'                           => '&#xf0ea fa-clipboard',
			'fa-lightbulb-o'                         => '&#xf0eb fa-lightbulb-o',
			'fa-exchange'                            => '&#xf0ec fa-exchange',
			'fa-cloud-download'                      => '&#xf0ed fa-cloud-download',
			'fa-cloud-upload'                        => '&#xf0ee fa-cloud-upload',
			'fa-user-md'                             => '&#xf0f0 fa-user-md',
			'fa-stethoscope'                         => '&#xf0f1 fa-stethoscope',
			'fa-suitcase'                            => '&#xf0f2 fa-suitcase',
			'fa-bell-o'                              => '&#xf0a2 fa-bell-o',
			'fa-coffee'                              => '&#xf0f4 fa-coffee',
			'fa-cutlery'                             => '&#xf0f5 fa-cutlery',
			'fa-file-text-o'                         => '&#xf0f6 fa-file-text-o',
			'fa-building-o'                          => '&#xf0f7 fa-building-o',
			'fa-hospital-o'                          => '&#xf0f8 fa-hospital-o',
			'fa-ambulance'                           => '&#xf0f9 fa-ambulance',
			'fa-medkit'                              => '&#xf0fa fa-medkit',
			'fa-fighter-jet'                         => '&#xf0fb fa-fighter-jet',
			'fa-beer'                                => '&#xf0fc fa-beer',
			'fa-h-square'                            => '&#xf0fd fa-h-square',
			'fa-plus-square'                         => '&#xf0fe fa-plus-square',
			'fa-angle-double-left'                   => '&#xf100 fa-angle-double-left',
			'fa-angle-double-right'                  => '&#xf101 fa-angle-double-right',
			'fa-angle-double-up'                     => '&#xf102 fa-angle-double-up',
			'fa-angle-double-down'                   => '&#xf103 fa-angle-double-down',
			'fa-angle-left'                          => '&#xf104 fa-angle-left',
			'fa-angle-right'                         => '&#xf105 fa-angle-right',
			'fa-angle-up'                            => '&#xf106 fa-angle-up',
			'fa-angle-down'                          => '&#xf107 fa-angle-down',
			'fa-desktop'                             => '&#xf108 fa-desktop',
			'fa-laptop'                              => '&#xf109 fa-laptop',
			'fa-tablet'                              => '&#xf10a fa-tablet',
			'fa-mobile'                              => '&#xf10b fa-mobile',
			'fa-circle-o'                            => '&#xf10c fa-circle-o',
			'fa-quote-left'                          => '&#xf10d fa-quote-left',
			'fa-quote-right'                         => '&#xf10e fa-quote-right',
			'fa-spinner'                             => '&#xf110 fa-spinner',
			'fa-circle'                              => '&#xf111 fa-circle',
			'fa-reply'                               => '&#xf112 fa-reply',
			'fa-github-alt'                          => '&#xf113 fa-github-alt',
			'fa-folder-o'                            => '&#xf114 fa-folder-o',
			'fa-folder-open-o'                       => '&#xf115 fa-folder-open-o',
			'fa-smile-o'                             => '&#xf118 fa-smile-o',
			'fa-frown-o'                             => '&#xf119 fa-frown-o',
			'fa-meh-o'                               => '&#xf11a fa-meh-o',
			'fa-gamepad'                             => '&#xf11b fa-gamepad',
			'fa-keyboard-o'                          => '&#xf11c fa-keyboard-o',
			'fa-flag-o'                              => '&#xf11d fa-flag-o',
			'fa-flag-checkered'                      => '&#xf11e fa-flag-checkered',
			'fa-terminal'                            => '&#xf120 fa-terminal',
			'fa-code'                                => '&#xf121 fa-code',
			'fa-reply-all'                           => '&#xf122 fa-reply-all',
			'fa-star-half-o'                         => '&#xf123 fa-star-half-o',
			'fa-location-arrow'                      => '&#xf124 fa-location-arrow',
			'fa-crop'                                => '&#xf125 fa-crop',
			'fa-code-fork'                           => '&#xf126 fa-code-fork',
			'fa-chain-broken'                        => '&#xf127 fa-chain-broken',
			'fa-question'                            => '&#xf128 fa-question',
			'fa-info'                                => '&#xf129 fa-info',
			'fa-exclamation'                         => '&#xf12a fa-exclamation',
			'fa-superscript'                         => '&#xf12b fa-superscript',
			'fa-subscript'                           => '&#xf12c fa-subscript',
			'fa-eraser'                              => '&#xf12d fa-eraser',
			'fa-puzzle-piece'                        => '&#xf12e fa-puzzle-piece',
			'fa-microphone'                          => '&#xf130 fa-microphone',
			'fa-microphone-slash'                    => '&#xf131 fa-microphone-slash',
			'fa-shield'                              => '&#xf132 fa-shield',
			'fa-calendar-o'                          => '&#xf133 fa-calendar-o',
			'fa-fire-extinguisher'                   => '&#xf134 fa-fire-extinguisher',
			'fa-rocket'                              => '&#xf135 fa-rocket',
			'fa-maxcdn'                              => '&#xf136 fa-maxcdn',
			'fa-chevron-circle-left'                 => '&#xf137 fa-chevron-circle-left',
			'fa-chevron-circle-right'                => '&#xf138 fa-chevron-circle-right',
			'fa-chevron-circle-up'                   => '&#xf139 fa-chevron-circle-up',
			'fa-chevron-circle-down'                 => '&#xf13a fa-chevron-circle-down',
			'fa-html5'                               => '&#xf13b fa-html5',
			'fa-css3'                                => '&#xf13c fa-css3',
			'fa-anchor'                              => '&#xf13d fa-anchor',
			'fa-unlock-alt'                          => '&#xf13e fa-unlock-alt',
			'fa-bullseye'                            => '&#xf140 fa-bullseye',
			'fa-ellipsis-h'                          => '&#xf141 fa-ellipsis-h',
			'fa-ellipsis-v'                          => '&#xf142 fa-ellipsis-v',
			'fa-rss-square'                          => '&#xf143 fa-rss-square',
			'fa-play-circle'                         => '&#xf144 fa-play-circle',
			'fa-ticket'                              => '&#xf145 fa-ticket',
			'fa-minus-square'                        => '&#xf146 fa-minus-square',
			'fa-minus-square-o'                      => '&#xf147 fa-minus-square-o',
			'fa-level-up'                            => '&#xf148 fa-level-up',
			'fa-level-down'                          => '&#xf149 fa-level-down',
			'fa-check-square'                        => '&#xf14a fa-check-square',
			'fa-pencil-square'                       => '&#xf14b fa-pencil-square',
			'fa-external-link-square'                => '&#xf14c fa-external-link-square',
			'fa-share-square'                        => '&#xf14d fa-share-square',
			'fa-compass'                             => '&#xf14e fa-compass',
			'fa-caret-square-o-down'                 => '&#xf150 fa-caret-square-o-down',
			'fa-caret-square-o-up'                   => '&#xf151 fa-caret-square-o-up',
			'fa-caret-square-o-right'                => '&#xf152 fa-caret-square-o-right',
			'fa-eur'                                 => '&#xf153 fa-eur',
			'fa-gbp'                                 => '&#xf154 fa-gbp',
			'fa-usd'                                 => '&#xf155 fa-usd',
			'fa-inr'                                 => '&#xf156 fa-inr',
			'fa-jpy'                                 => '&#xf157 fa-jpy',
			'fa-rub'                                 => '&#xf158 fa-rub',
			'fa-krw'                                 => '&#xf159 fa-krw',
			'fa-btc'                                 => '&#xf15a fa-btc',
			'fa-file'                                => '&#xf15b fa-file',
			'fa-file-text'                           => '&#xf15c fa-file-text',
			'fa-sort-alpha-asc'                      => '&#xf15d fa-sort-alpha-asc',
			'fa-sort-alpha-desc'                     => '&#xf15e fa-sort-alpha-desc',
			'fa-sort-amount-asc'                     => '&#xf160 fa-sort-amount-asc',
			'fa-sort-amount-desc'                    => '&#xf161 fa-sort-amount-desc',
			'fa-sort-numeric-asc'                    => '&#xf162 fa-sort-numeric-asc',
			'fa-sort-numeric-desc'                   => '&#xf163 fa-sort-numeric-desc',
			'fa-thumbs-up'                           => '&#xf164 fa-thumbs-up',
			'fa-thumbs-down'                         => '&#xf165 fa-thumbs-down',
			'fa-youtube-square'                      => '&#xf166 fa-youtube-square',
			'fa-youtube'                             => '&#xf167 fa-youtube',
			'fa-xing'                                => '&#xf168 fa-xing',
			'fa-xing-square'                         => '&#xf169 fa-xing-square',
			'fa-youtube-play'                        => '&#xf16a fa-youtube-play',
			'fa-dropbox'                             => '&#xf16b fa-dropbox',
			'fa-stack-overflow'                      => '&#xf16c fa-stack-overflow',
			'fa-instagram'                           => '&#xf16d fa-instagram',
			'fa-flickr'                              => '&#xf16e fa-flickr',
			'fa-adn'                                 => '&#xf170 fa-adn',
			'fa-bitbucket'                           => '&#xf171 fa-bitbucket',
			'fa-bitbucket-square'                    => '&#xf172 fa-bitbucket-square',
			'fa-tumblr'                              => '&#xf173 fa-tumblr',
			'fa-tumblr-square'                       => '&#xf174 fa-tumblr-square',
			'fa-long-arrow-down'                     => '&#xf175 fa-long-arrow-down',
			'fa-long-arrow-up'                       => '&#xf176 fa-long-arrow-up',
			'fa-long-arrow-left'                     => '&#xf177 fa-long-arrow-left',
			'fa-long-arrow-right'                    => '&#xf178 fa-long-arrow-right',
			'fa-apple'                               => '&#xf179 fa-apple',
			'fa-windows'                             => '&#xf17a fa-windows',
			'fa-android'                             => '&#xf17b fa-android',
			'fa-linux'                               => '&#xf17c fa-linux',
			'fa-dribbble'                            => '&#xf17d fa-dribbble',
			'fa-skype'                               => '&#xf17e fa-skype',
			'fa-foursquare'                          => '&#xf180 fa-foursquare',
			'fa-trello'                              => '&#xf181 fa-trello',
			'fa-female'                              => '&#xf182 fa-female',
			'fa-male'                                => '&#xf183 fa-male',
			'fa-gratipay'                            => '&#xf184 fa-gratipay',
			'fa-sun-o'                               => '&#xf185 fa-sun-o',
			'fa-moon-o'                              => '&#xf186 fa-moon-o',
			'fa-archive'                             => '&#xf187 fa-archive',
			'fa-bug'                                 => '&#xf188 fa-bug',
			'fa-vk'                                  => '&#xf189 fa-vk',
			'fa-weibo'                               => '&#xf18a fa-weibo',
			'fa-renren'                              => '&#xf18b fa-renren',
			'fa-pagelines'                           => '&#xf18c fa-pagelines',
			'fa-stack-exchange'                      => '&#xf18d fa-stack-exchange',
			'fa-arrow-circle-o-right'                => '&#xf18e fa-arrow-circle-o-right',
			'fa-arrow-circle-o-left'                 => '&#xf190 fa-arrow-circle-o-left',
			'fa-caret-square-o-left'                 => '&#xf191 fa-caret-square-o-left',
			'fa-dot-circle-o'                        => '&#xf192 fa-dot-circle-o',
			'fa-wheelchair'                          => '&#xf193 fa-wheelchair',
			'fa-vimeo-square'                        => '&#xf194 fa-vimeo-square',
			'fa-try'                                 => '&#xf195 fa-try',
			'fa-plus-square-o'                       => '&#xf196 fa-plus-square-o',
			'fa-space-shuttle'                       => '&#xf197 fa-space-shuttle',
			'fa-slack'                               => '&#xf198 fa-slack',
			'fa-envelope-square'                     => '&#xf199 fa-envelope-square',
			'fa-wordpress'                           => '&#xf19a fa-wordpress',
			'fa-openid'                              => '&#xf19b fa-openid',
			'fa-university'                          => '&#xf19c fa-university',
			'fa-graduation-cap'                      => '&#xf19d fa-graduation-cap',
			'fa-yahoo'                               => '&#xf19e fa-yahoo',
			'fa-google'                              => '&#xf1a0 fa-google',
			'fa-reddit'                              => '&#xf1a1 fa-reddit',
			'fa-reddit-square'                       => '&#xf1a2 fa-reddit-square',
			'fa-stumbleupon-circle'                  => '&#xf1a3 fa-stumbleupon-circle',
			'fa-stumbleupon'                         => '&#xf1a4 fa-stumbleupon',
			'fa-delicious'                           => '&#xf1a5 fa-delicious',
			'fa-digg'                                => '&#xf1a6 fa-digg',
			'fa-pied-piper-pp'                       => '&#xf1a7 fa-pied-piper-pp',
			'fa-pied-piper-alt'                      => '&#xf1a8 fa-pied-piper-alt',
			'fa-drupal'                              => '&#xf1a9 fa-drupal',
			'fa-joomla'                              => '&#xf1aa fa-joomla',
			'fa-language'                            => '&#xf1ab fa-language',
			'fa-fax'                                 => '&#xf1ac fa-fax',
			'fa-building'                            => '&#xf1ad fa-building',
			'fa-child'                               => '&#xf1ae fa-child',
			'fa-paw'                                 => '&#xf1b0 fa-paw',
			'fa-spoon'                               => '&#xf1b1 fa-spoon',
			'fa-cube'                                => '&#xf1b2 fa-cube',
			'fa-cubes'                               => '&#xf1b3 fa-cubes',
			'fa-behance'                             => '&#xf1b4 fa-behance',
			'fa-behance-square'                      => '&#xf1b5 fa-behance-square',
			'fa-steam'                               => '&#xf1b6 fa-steam',
			'fa-steam-square'                        => '&#xf1b7 fa-steam-square',
			'fa-recycle'                             => '&#xf1b8 fa-recycle',
			'fa-car'                                 => '&#xf1b9 fa-car',
			'fa-taxi'                                => '&#xf1ba fa-taxi',
			'fa-tree'                                => '&#xf1bb fa-tree',
			'fa-spotify'                             => '&#xf1bc fa-spotify',
			'fa-deviantart'                          => '&#xf1bd fa-deviantart',
			'fa-soundcloud'                          => '&#xf1be fa-soundcloud',
			'fa-database'                            => '&#xf1c0 fa-database',
			'fa-file-pdf-o'                          => '&#xf1c1 fa-file-pdf-o',
			'fa-file-word-o'                         => '&#xf1c2 fa-file-word-o',
			'fa-file-excel-o'                        => '&#xf1c3 fa-file-excel-o',
			'fa-file-powerpoint-o'                   => '&#xf1c4 fa-file-powerpoint-o',
			'fa-file-image-o'                        => '&#xf1c5 fa-file-image-o',
			'fa-file-archive-o'                      => '&#xf1c6 fa-file-archive-o',
			'fa-file-audio-o'                        => '&#xf1c7 fa-file-audio-o',
			'fa-file-video-o'                        => '&#xf1c8 fa-file-video-o',
			'fa-file-code-o'                         => '&#xf1c9 fa-file-code-o',
			'fa-vine'                                => '&#xf1ca fa-vine',
			'fa-codepen'                             => '&#xf1cb fa-codepen',
			'fa-jsfiddle'                            => '&#xf1cc fa-jsfiddle',
			'fa-life-ring'                           => '&#xf1cd fa-life-ring',
			'fa-circle-o-notch'                      => '&#xf1ce fa-circle-o-notch',
			'fa-rebel'                               => '&#xf1d0 fa-rebel',
			'fa-empire'                              => '&#xf1d1 fa-empire',
			'fa-git-square'                          => '&#xf1d2 fa-git-square',
			'fa-git'                                 => '&#xf1d3 fa-git',
			'fa-hacker-news'                         => '&#xf1d4 fa-hacker-news',
			'fa-tencent-weibo'                       => '&#xf1d5 fa-tencent-weibo',
			'fa-qq'                                  => '&#xf1d6 fa-qq',
			'fa-weixin'                              => '&#xf1d7 fa-weixin',
			'fa-paper-plane'                         => '&#xf1d8 fa-paper-plane',
			'fa-paper-plane-o'                       => '&#xf1d9 fa-paper-plane-o',
			'fa-history'                             => '&#xf1da fa-history',
			'fa-circle-thin'                         => '&#xf1db fa-circle-thin',
			'fa-header'                              => '&#xf1dc fa-header',
			'fa-paragraph'                           => '&#xf1dd fa-paragraph',
			'fa-sliders'                             => '&#xf1de fa-sliders',
			'fa-share-alt'                           => '&#xf1e0 fa-share-alt',
			'fa-share-alt-square'                    => '&#xf1e1 fa-share-alt-square',
			'fa-bomb'                                => '&#xf1e2 fa-bomb',
			'fa-futbol-o'                            => '&#xf1e3 fa-futbol-o',
			'fa-tty'                                 => '&#xf1e4 fa-tty',
			'fa-binoculars'                          => '&#xf1e5 fa-binoculars',
			'fa-plug'                                => '&#xf1e6 fa-plug',
			'fa-slideshare'                          => '&#xf1e7 fa-slideshare',
			'fa-twitch'                              => '&#xf1e8 fa-twitch',
			'fa-yelp'                                => '&#xf1e9 fa-yelp',
			'fa-newspaper-o'                         => '&#xf1ea fa-newspaper-o',
			'fa-wifi'                                => '&#xf1eb fa-wifi',
			'fa-calculator'                          => '&#xf1ec fa-calculator',
			'fa-paypal'                              => '&#xf1ed fa-paypal',
			'fa-google-wallet'                       => '&#xf1ee fa-google-wallet',
			'fa-cc-visa'                             => '&#xf1f0 fa-cc-visa',
			'fa-cc-mastercard'                       => '&#xf1f1 fa-cc-mastercard',
			'fa-cc-discover'                         => '&#xf1f2 fa-cc-discover',
			'fa-cc-amex'                             => '&#xf1f3 fa-cc-amex',
			'fa-cc-paypal'                           => '&#xf1f4 fa-cc-paypal',
			'fa-cc-stripe'                           => '&#xf1f5 fa-cc-stripe',
			'fa-bell-slash'                          => '&#xf1f6 fa-bell-slash',
			'fa-bell-slash-o'                        => '&#xf1f7 fa-bell-slash-o',
			'fa-trash'                               => '&#xf1f8 fa-trash',
			'fa-copyright'                           => '&#xf1f9 fa-copyright',
			'fa-at'                                  => '&#xf1fa fa-at',
			'fa-eyedropper'                          => '&#xf1fb fa-eyedropper',
			'fa-paint-brush'                         => '&#xf1fc fa-paint-brush',
			'fa-birthday-cake'                       => '&#xf1fd fa-birthday-cake',
			'fa-area-chart'                          => '&#xf1fe fa-area-chart',
			'fa-pie-chart'                           => '&#xf200 fa-pie-chart',
			'fa-line-chart'                          => '&#xf201 fa-line-chart',
			'fa-lastfm'                              => '&#xf202 fa-lastfm',
			'fa-lastfm-square'                       => '&#xf203 fa-lastfm-square',
			'fa-toggle-off'                          => '&#xf204 fa-toggle-off',
			'fa-toggle-on'                           => '&#xf205 fa-toggle-on',
			'fa-bicycle'                             => '&#xf206 fa-bicycle',
			'fa-bus'                                 => '&#xf207 fa-bus',
			'fa-ioxhost'                             => '&#xf208 fa-ioxhost',
			'fa-angellist'                           => '&#xf209 fa-angellist',
			'fa-cc'                                  => '&#xf20a fa-cc',
			'fa-ils'                                 => '&#xf20b fa-ils',
			'fa-meanpath'                            => '&#xf20c fa-meanpath',
			'fa-buysellads'                          => '&#xf20d fa-buysellads',
			'fa-connectdevelop'                      => '&#xf20e fa-connectdevelop',
			'fa-dashcube'                            => '&#xf210 fa-dashcube',
			'fa-forumbee'                            => '&#xf211 fa-forumbee',
			'fa-leanpub'                             => '&#xf212 fa-leanpub',
			'fa-sellsy'                              => '&#xf213 fa-sellsy',
			'fa-shirtsinbulk'                        => '&#xf214 fa-shirtsinbulk',
			'fa-simplybuilt'                         => '&#xf215 fa-simplybuilt',
			'fa-skyatlas'                            => '&#xf216 fa-skyatlas',
			'fa-cart-plus'                           => '&#xf217 fa-cart-plus',
			'fa-cart-arrow-down'                     => '&#xf218 fa-cart-arrow-down',
			'fa-diamond'                             => '&#xf219 fa-diamond',
			'fa-ship'                                => '&#xf21a fa-ship',
			'fa-user-secret'                         => '&#xf21b fa-user-secret',
			'fa-motorcycle'                          => '&#xf21c fa-motorcycle',
			'fa-street-view'                         => '&#xf21d fa-street-view',
			'fa-heartbeat'                           => '&#xf21e fa-heartbeat',
			'fa-venus'                               => '&#xf221 fa-venus',
			'fa-mars'                                => '&#xf222 fa-mars',
			'fa-mercury'                             => '&#xf223 fa-mercury',
			'fa-transgender'                         => '&#xf224 fa-transgender',
			'fa-transgender-alt'                     => '&#xf225 fa-transgender-alt',
			'fa-venus-double'                        => '&#xf226 fa-venus-double',
			'fa-mars-double'                         => '&#xf227 fa-mars-double',
			'fa-venus-mars'                          => '&#xf228 fa-venus-mars',
			'fa-mars-stroke'                         => '&#xf229 fa-mars-stroke',
			'fa-mars-stroke-v'                       => '&#xf22a fa-mars-stroke-v',
			'fa-mars-stroke-h'                       => '&#xf22b fa-mars-stroke-h',
			'fa-neuter'                              => '&#xf22c fa-neuter',
			'fa-genderless'                          => '&#xf22d fa-genderless',
			'fa-facebook-official'                   => '&#xf230 fa-facebook-official',
			'fa-pinterest-p'                         => '&#xf231 fa-pinterest-p',
			'fa-whatsapp'                            => '&#xf232 fa-whatsapp',
			'fa-server'                              => '&#xf233 fa-server',
			'fa-user-plus'                           => '&#xf234 fa-user-plus',
			'fa-user-times'                          => '&#xf235 fa-user-times',
			'fa-bed'                                 => '&#xf236 fa-bed',
			'fa-viacoin'                             => '&#xf237 fa-viacoin',
			'fa-train'                               => '&#xf238 fa-train',
			'fa-subway'                              => '&#xf239 fa-subway',
			'fa-medium'                              => '&#xf23a fa-medium',
			'fa-y-combinator'                        => '&#xf23b fa-y-combinator',
			'fa-optin-monster'                       => '&#xf23c fa-optin-monster',
			'fa-opencart'                            => '&#xf23d fa-opencart',
			'fa-expeditedssl'                        => '&#xf23e fa-expeditedssl',
			'fa-battery-full'                        => '&#xf240 fa-battery-full',
			'fa-battery-three-quarters'              => '&#xf241 fa-battery-three-quarters',
			'fa-battery-half'                        => '&#xf242 fa-battery-half',
			'fa-battery-quarter'                     => '&#xf243 fa-battery-quarter',
			'fa-battery-empty'                       => '&#xf244 fa-battery-empty',
			'fa-mouse-pointer'                       => '&#xf245 fa-mouse-pointer',
			'fa-i-cursor'                            => '&#xf246 fa-i-cursor',
			'fa-object-group'                        => '&#xf247 fa-object-group',
			'fa-object-ungroup'                      => '&#xf248 fa-object-ungroup',
			'fa-sticky-note'                         => '&#xf249 fa-sticky-note',
			'fa-sticky-note-o'                       => '&#xf24a fa-sticky-note-o',
			'fa-cc-jcb'                              => '&#xf24b fa-cc-jcb',
			'fa-cc-diners-club'                      => '&#xf24c fa-cc-diners-club',
			'fa-clone'                               => '&#xf24d fa-clone',
			'fa-balance-scale'                       => '&#xf24e fa-balance-scale',
			'fa-hourglass-o'                         => '&#xf250 fa-hourglass-o',
			'fa-hourglass-start'                     => '&#xf251 fa-hourglass-start',
			'fa-hourglass-half'                      => '&#xf252 fa-hourglass-half',
			'fa-hourglass-end'                       => '&#xf253 fa-hourglass-end',
			'fa-hourglass'                           => '&#xf254 fa-hourglass',
			'fa-hand-rock-o'                         => '&#xf255 fa-hand-rock-o',
			'fa-hand-paper-o'                        => '&#xf256 fa-hand-paper-o',
			'fa-hand-scissors-o'                     => '&#xf257 fa-hand-scissors-o',
			'fa-hand-lizard-o'                       => '&#xf258 fa-hand-lizard-o',
			'fa-hand-spock-o'                        => '&#xf259 fa-hand-spock-o',
			'fa-hand-pointer-o'                      => '&#xf25a fa-hand-pointer-o',
			'fa-hand-peace-o'                        => '&#xf25b fa-hand-peace-o',
			'fa-trademark'                           => '&#xf25c fa-trademark',
			'fa-registered'                          => '&#xf25d fa-registered',
			'fa-creative-commons'                    => '&#xf25e fa-creative-commons',
			'fa-gg'                                  => '&#xf260 fa-gg',
			'fa-gg-circle'                           => '&#xf261 fa-gg-circle',
			'fa-tripadvisor'                         => '&#xf262 fa-tripadvisor',
			'fa-odnoklassniki'                       => '&#xf263 fa-odnoklassniki',
			'fa-odnoklassniki-square'                => '&#xf264 fa-odnoklassniki-square',
			'fa-get-pocket'                          => '&#xf265 fa-get-pocket',
			'fa-wikipedia-w'                         => '&#xf266 fa-wikipedia-w',
			'fa-safari'                              => '&#xf267 fa-safari',
			'fa-chrome'                              => '&#xf268 fa-chrome',
			'fa-firefox'                             => '&#xf269 fa-firefox',
			'fa-opera'                               => '&#xf26a fa-opera',
			'fa-internet-explorer'                   => '&#xf26b fa-internet-explorer',
			'fa-television'                          => '&#xf26c fa-television',
			'fa-contao'                              => '&#xf26d fa-contao',
			'fa-500px'                               => '&#xf26e fa-500px',
			'fa-amazon'                              => '&#xf270 fa-amazon',
			'fa-calendar-plus-o'                     => '&#xf271 fa-calendar-plus-o',
			'fa-calendar-minus-o'                    => '&#xf272 fa-calendar-minus-o',
			'fa-calendar-times-o'                    => '&#xf273 fa-calendar-times-o',
			'fa-calendar-check-o'                    => '&#xf274 fa-calendar-check-o',
			'fa-industry'                            => '&#xf275 fa-industry',
			'fa-map-pin'                             => '&#xf276 fa-map-pin',
			'fa-map-signs'                           => '&#xf277 fa-map-signs',
			'fa-map-o'                               => '&#xf278 fa-map-o',
			'fa-map'                                 => '&#xf279 fa-map',
			'fa-commenting'                          => '&#xf27a fa-commenting',
			'fa-commenting-o'                        => '&#xf27b fa-commenting-o',
			'fa-houzz'                               => '&#xf27c fa-houzz',
			'fa-vimeo'                               => '&#xf27d fa-vimeo',
			'fa-black-tie'                           => '&#xf27e fa-black-tie',
			'fa-fonticons'                           => '&#xf280 fa-fonticons',
			'fa-reddit-alien'                        => '&#xf281 fa-reddit-alien',
			'fa-edge'                                => '&#xf282 fa-edge',
			'fa-credit-card-alt'                     => '&#xf283 fa-credit-card-alt',
			'fa-codiepie'                            => '&#xf284 fa-codiepie',
			'fa-modx'                                => '&#xf285 fa-modx',
			'fa-fort-awesome'                        => '&#xf286 fa-fort-awesome',
			'fa-usb'                                 => '&#xf287 fa-usb',
			'fa-product-hunt'                        => '&#xf288 fa-product-hunt',
			'fa-mixcloud'                            => '&#xf289 fa-mixcloud',
			'fa-scribd'                              => '&#xf28a fa-scribd',
			'fa-pause-circle'                        => '&#xf28b fa-pause-circle',
			'fa-pause-circle-o'                      => '&#xf28c fa-pause-circle-o',
			'fa-stop-circle'                         => '&#xf28d fa-stop-circle',
			'fa-stop-circle-o'                       => '&#xf28e fa-stop-circle-o',
			'fa-shopping-bag'                        => '&#xf290 fa-shopping-bag',
			'fa-shopping-basket'                     => '&#xf291 fa-shopping-basket',
			'fa-hashtag'                             => '&#xf292 fa-hashtag',
			'fa-bluetooth'                           => '&#xf293 fa-bluetooth',
			'fa-bluetooth-b'                         => '&#xf294 fa-bluetooth-b',
			'fa-percent'                             => '&#xf295 fa-percent',
			'fa-gitlab'                              => '&#xf296 fa-gitlab',
			'fa-wpbeginner'                          => '&#xf297 fa-wpbeginner',
			'fa-wpforms'                             => '&#xf298 fa-wpforms',
			'fa-envira'                              => '&#xf299 fa-envira',
			'fa-universal-access'                    => '&#xf29a fa-universal-access',
			'fa-wheelchair-alt'                      => '&#xf29b fa-wheelchair-alt',
			'fa-question-circle-o'                   => '&#xf29c fa-question-circle-o',
			'fa-blind'                               => '&#xf29d fa-blind',
			'fa-audio-description'                   => '&#xf29e fa-audio-description',
			'fa-volume-control-phone'                => '&#xf2a0 fa-volume-control-phone',
			'fa-braille'                             => '&#xf2a1 fa-braille',
			'fa-assistive-listening-systems'         => '&#xf2a2 fa-assistive-listening-systems',
			'fa-american-sign-language-interpreting' => '&#xf2a3 fa-american-sign-language-interpreting',
			'fa-deaf'                                => '&#xf2a4 fa-deaf',
			'fa-glide'                               => '&#xf2a5 fa-glide',
			'fa-glide-g'                             => '&#xf2a6 fa-glide-g',
			'fa-sign-language'                       => '&#xf2a7 fa-sign-language',
			'fa-low-vision'                          => '&#xf2a8 fa-low-vision',
			'fa-viadeo'                              => '&#xf2a9 fa-viadeo',
			'fa-viadeo-square'                       => '&#xf2aa fa-viadeo-square',
			'fa-snapchat'                            => '&#xf2ab fa-snapchat',
			'fa-snapchat-ghost'                      => '&#xf2ac fa-snapchat-ghost',
			'fa-snapchat-square'                     => '&#xf2ad fa-snapchat-square',
			'fa-pied-piper'                          => '&#xf2ae fa-pied-piper',
			'fa-first-order'                         => '&#xf2b0 fa-first-order',
			'fa-yoast'                               => '&#xf2b1 fa-yoast',
			'fa-themeisle'                           => '&#xf2b2 fa-themeisle'
			
		);
		$icons = array_merge( $new_icons );

		ksort( $icons );

		return $icons;
	}