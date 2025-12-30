<?php 
$hs_breadcrumb				= get_theme_mod('hs_breadcrumb','1');
$breadcrumb_title_enable	= get_theme_mod('breadcrumb_title_enable','1');
$breadcrumb_path_enable		= get_theme_mod('breadcrumb_path_enable','1');
$hs_breadcrumb_checkin		= get_theme_mod('hs_breadcrumb_checkin','1');
$breadcrumb_bg_img			= get_theme_mod('breadcrumb_bg_img',esc_url(get_template_directory_uri() .'/assets/images/breadcrumbs/rooms-bg.jpg'));
$breadcrumb_back_attach		= get_theme_mod('breadcrumb_back_attach','scroll');
$breadcrumb_align			= get_theme_mod('breadcrumb_align','center');
if($hs_breadcrumb == '1') {	
?>
<section id="breadcrumbs">
	<div class="breadcrumbs breadcrumb-<?php echo esc_attr($breadcrumb_align); ?>" style="background-image:url('<?php echo esc_url($breadcrumb_bg_img); ?>');background-attachment:<?php echo esc_attr($breadcrumb_back_attach); ?>">
		 <div class="container">
			<div class="page-title">
				<?php if($breadcrumb_title_enable == '1') { ?>
					<h2>
						<?php 
							if ( is_home() || is_front_page()):
		
										single_post_title();
										
							elseif ( is_day() ) : 
							
								printf( __( 'Daily Archives: %s', 'metasoft-pro' ), get_the_date() );
							
							elseif ( is_month() ) :
							
								printf( __( 'Monthly Archives: %s', 'metasoft-pro' ), (get_the_date( 'F Y' ) ));
								
							elseif ( is_year() ) :
							
								printf( __( 'Yearly Archives: %s', 'metasoft-pro' ), (get_the_date( 'Y' ) ) );
								
							elseif ( is_category() ) :
							
								printf( __( 'Category Archives: %s', 'metasoft-pro' ), (single_cat_title( '', false ) ));

							elseif ( is_tag() ) :
							
								printf( __( 'Tag Archives: %s', 'metasoft-pro' ), (single_tag_title( '', false ) ));
								
							elseif ( is_404() ) :

								printf( __( 'Error 404', 'metasoft-pro' ));
								
							elseif ( is_author() ) :
							
								printf( __( 'Author: %s', 'metasoft-pro' ), (get_the_author( '', false ) ));		
							
							elseif ( is_tax( 'portfolio_categories' ) ) :

								printf( __( 'Portfolio Categories: %s', 'metasoft-pro' ), (single_term_title( '', false ) ));	
								
							elseif ( is_tax( 'pricing_categories' ) ) :

								printf( __( 'Pricing Categories: %s', 'metasoft-pro' ), (single_term_title( '', false ) ));	
								
							elseif ( class_exists( 'metasoft-pro' ) ) : 
								
								if ( is_shop() ) {
									woocommerce_page_title();
								}
								
								elseif ( is_cart() ) {
									the_title();
								}
								
								elseif ( is_checkout() ) {
									the_title();
								}
								
								else {
									single_post_title();
								}
							else :
									the_title();
									
							endif;
							
						?>
					</h2>
				<?php } ?>
			</div>
			<?php if($breadcrumb_path_enable == '1') { ?>
				<ul class="crumb">
					<?php if (function_exists('aravalli_breadcrumbs')) aravalli_breadcrumbs();?>
				</ul>
			<?php } ?>
		</div>
	</div>
</section>
<?php 
}
if($hs_breadcrumb_checkin == '1') {	
	get_template_part('template-parts/sections/section','checkin');
}else{ ?>
	<section style="margin-bottom:50px;"></section>
<?php } ?>	