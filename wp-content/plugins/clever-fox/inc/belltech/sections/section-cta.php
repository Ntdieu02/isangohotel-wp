<?php 
if ( ! function_exists( 'metasoft_belltech_lite_cta' ) ) :
	function metasoft_belltech_lite_cta() {
	$metasoft_belltech_cta_hs					= get_theme_mod('cta_hs','1');
	$metasoft_belltech_cta_title				= get_theme_mod('cta_title',__('Need Emergency <span>Plumbing Service?</span> Call us at','clever-fox'));
	$metasoft_belltech_cta_description			= get_theme_mod('cta_description',__('24 hours, 7 days a week, 365 days a year','clever-fox'));
	$metasoft_belltech_cta_btn_lbl1				= get_theme_mod('cta_btn_lbl1',__('Contact With Us','clever-fox'));
	$metasoft_belltech_cta_btn_link1			= get_theme_mod('cta_btn_link1');
	$metasoft_belltech_cta_btn_second_ttl		= get_theme_mod('cta_btn_second_ttl',__('or','clever-fox'));
	$metasoft_belltech_cta_btn_lbl2				= get_theme_mod('cta_btn_lbl2',__('+1 (088) 456 888 (24/7)','clever-fox'));
	$metasoft_belltech_cta_btn_link2			= get_theme_mod('cta_btn_link2');
	$metasoft_belltech_cta_btn2_icon			= get_theme_mod('cta_btn2_icon','fa-bell');
	if($metasoft_belltech_cta_hs =='1'){
?>	
<!-- Call to Action Start -->
<section id="cta-wrapper" class="cta-wrapper home-cta home-cta-3">
	<div id="particles-js2"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-sm-12 text-lg-left text-center head">
				<?php if ( ! empty( $metasoft_belltech_cta_title ) ) : ?>
					<h2><?php echo wp_kses_post($metasoft_belltech_cta_title); ?></h2>
				<?php endif; ?>
				<?php if ( ! empty( $metasoft_belltech_cta_description ) ) : ?>
				<p><?php echo wp_kses_post($metasoft_belltech_cta_description); ?></p>
				<?php endif; ?>
			</div>
			<div class="col-lg-6 col-sm-12 text-lg-right text-center my-lg-auto mt-4">
			
				<div class="learn-more">
					<?php if ( ! empty( $metasoft_belltech_cta_btn2_icon ) ) : ?>
						<div class="cta-icon-box">
							<i class="fa <?php echo esc_attr($metasoft_belltech_cta_btn2_icon); ?>"></i>
						</div>
					<?php endif; ?>
					<a href="<?php echo esc_url($metasoft_belltech_cta_btn_link2); ?>"><?php echo esc_html($metasoft_belltech_cta_btn_lbl2); ?></a>
					<div class="or"><?php echo esc_html($metasoft_belltech_cta_btn_second_ttl); ?></div>
				</div>
				
				<?php if ( ! empty( $metasoft_belltech_cta_btn_lbl1 ) ) : ?>
					<a href="<?php echo esc_url($metasoft_belltech_cta_btn_link1); ?>" class="btn btn-border-white btn-like-icon first"><?php echo esc_html($metasoft_belltech_cta_btn_lbl1); ?> <span class="bticn"><i class="fa fa-angle-right"></i></span></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php	
}}
endif;
if ( function_exists( 'metasoft_belltech_lite_cta' ) ) {
$cleverfox_section_priority = apply_filters( 'metasoft_section_priority', 12, 'metasoft_belltech_lite_cta' );
add_action( 'metasoft_sections', 'metasoft_belltech_lite_cta', absint( $cleverfox_section_priority ) );
}
?>
<!-- Call to Action End -->