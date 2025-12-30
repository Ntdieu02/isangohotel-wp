<?php 
if ( ! function_exists( 'cleverfox_boostify_lite_testimonial' ) ) :
	function cleverfox_boostify_lite_testimonial() {
	$boostify_hs_testimonial				= get_theme_mod('hs_testimonial','1');	
	$boostify_testimonial_title			= get_theme_mod('testimonial_title',__('Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Testimonial</b><b>Testimonial</b><b>Testimonial</b></span></span>','clever-fox'));
	$boostify_testimonial_description	= get_theme_mod('testimonial_description',__('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','clever-fox'));
	$boostify_testimonials_content		= get_theme_mod('testimonials_content',boostify_get_testimonial_default());
	$boostify_testimonial_bg_setting		= get_theme_mod('testimonial_bg_setting',esc_url(CLEVERFOX_PLUGIN_URL .'inc/boostify/images/patternshape-bg.jpg'));	
	$boostify_testimonial_bg_position	= get_theme_mod('testimonial_bg_position','scroll');	
	if($boostify_hs_testimonial == '1'){
?>
<section id="testimonial" class="testimonial section-padding">
	<div class="testimonial-overlay" style="background-image:url(<?php echo esc_url($boostify_testimonial_bg_setting); ?>);background-attachment: <?php echo esc_attr($boostify_testimonial_bg_position); ?>;"></div>
	<div class="particles-js" id="prtcl3"></div>
	<div class="container"> 
		<?php if ( ! empty( $boostify_testimonial_title )  || ! empty( $boostify_testimonial_description )) : ?>
			<div class="row">
				<div class="col-lg-6 offset-lg-3">                    
					<div class="section-header text-center">
						<?php if ( ! empty( $boostify_testimonial_title ) ) : ?>
							<h2><?php echo wp_kses_post($boostify_testimonial_title); ?></h2>
						<?php endif; ?>	
						
						<?php if ( ! empty( $boostify_testimonial_description ) ) : ?>		
							<p><?php echo wp_kses_post($boostify_testimonial_description); ?></p>    
						<?php endif; ?>	
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="row">
			<div class="col-12">
				<div class="testimonial-carousel">
					<?php
						$boostify_testimonials_content = json_decode($boostify_testimonials_content);
						if( $boostify_testimonials_content!='' )
						{
						foreach($boostify_testimonials_content as $boostify_testimonial_item){
						$boostify_repeater_image    = ! empty( $boostify_testimonial_item->image_url ) ? apply_filters( 'boostify_translate_single_string', $boostify_testimonial_item->image_url, 'Testimonial section' ) : '';
						$boostify_repeater_title    = ! empty( $boostify_testimonial_item->title ) ? apply_filters( 'boostify_translate_single_string', $boostify_testimonial_item->title, 'Testimonial section' ) : '';
						$boostify_repeater_subtitle = ! empty( $boostify_testimonial_item->subtitle ) ? apply_filters( 'boostify_translate_single_string', $boostify_testimonial_item->subtitle, 'Testimonial section' ) : '';
						$boostify_repeater_text = ! empty( $boostify_testimonial_item->text ) ? apply_filters( 'boostify_translate_single_string', $boostify_testimonial_item->text, 'Testimonial section' ) : '';
					?>
					<div class="single-testimonial">
					
						<?php if ( ! empty( $boostify_repeater_image ) ): ?>
							<div class="testi-img">
								<img class="services_cols_mn_icon" src="<?php echo esc_url( $boostify_repeater_image ); ?>" <?php if ( ! empty( $boostify_repeater_title ) ) : ?> alt="<?php echo esc_attr( $boostify_repeater_title ); ?>" title="<?php echo esc_attr( $boostify_repeater_title ); ?>" <?php endif; ?> />
							</div>
						<?php endif; ?>
						
						<div class="testi-info">
							<?php if ( ! empty( $boostify_repeater_title ) ) : ?>
								<h4 class="title"><?php echo esc_html( $boostify_repeater_title ); ?></h4>
							<?php endif; ?>
							
							<?php if ( ! empty( $boostify_repeater_subtitle ) ) : ?>
								<span class="designation"><?php echo esc_html( $boostify_repeater_subtitle ); ?></span>
							<?php endif; ?>
							
							<?php if ( ! empty( $boostify_repeater_text ) ) : ?>
								<p><?php echo esc_html( $boostify_repeater_text ); ?></p>
							<?php endif; ?>
						</div>
					</div>
					<?php }} ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php	
	}}
endif;
if ( function_exists( 'cleverfox_boostify_lite_testimonial' ) ) {
$boostify_cleverfox_section_priority = apply_filters( 'boostify_section_priority', 15, 'cleverfox_boostify_lite_testimonial' );
add_action( 'boostify_sections', 'cleverfox_boostify_lite_testimonial', absint( $boostify_cleverfox_section_priority ) );
}