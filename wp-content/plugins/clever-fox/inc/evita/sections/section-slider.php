 <!--===// Start: Slider
    =================================--> 

	<?php  
if ( ! function_exists( 'cleverfox_evita_lite_slider' ) ) :
	function cleverfox_evita_lite_slider() {
	$evita_slider_bg_element_enable	= get_theme_mod('slider_bg_element_enable','1'); 	
	$evita_slider 					= get_theme_mod('slider',evita_get_slider_default()); 	
?>	
	<!--===// start:slider
	=================================-->
	<section class="slider-section slider-one">
		<div class="bg-elements">
			<div class="element1"></div>			
			<div class="element4"></div>
			<div class="element5"></div>
		</div>
		<div class="slider-main owl-carousel">
			<?php
				if ( ! empty( $evita_slider ) ) {
				$evita_slider = json_decode( $evita_slider );
				foreach ( $evita_slider as $evita_slide_item ) {
					$evita_repeater_title = ! empty( $evita_slide_item->title ) ? apply_filters( 'evita_translate_single_string', $evita_slide_item->title, 'slider section' ) : '';
					$evita_repeater_subtitle = ! empty( $evita_slide_item->subtitle ) ? apply_filters( 'evita_translate_single_string', $evita_slide_item->subtitle, 'slider section' ) : '';
					$evita_repeater_text = ! empty( $evita_slide_item->text ) ? apply_filters( 'evita_translate_single_string', $evita_slide_item->text, 'slider section' ) : '';
					$evita_repeater_button = ! empty( $evita_slide_item->text2) ? apply_filters( 'evita_translate_single_string', $evita_slide_item->text2,'slider section' ) : '';
					$evita_repeater_link = ! empty( $evita_slide_item->link ) ? apply_filters( 'evita_translate_single_string', $evita_slide_item->link, 'slider section' ) : '';
					$evita_repeater_image = ! empty( $evita_slide_item->image_url ) ? apply_filters( 'evita_translate_single_string', $evita_slide_item->image_url, 'slider section' ) : '';
					$evita_repeater_img_id  = attachment_url_to_postid( $evita_repeater_image );
					$evita_repeater_alt_text = get_post_meta($evita_repeater_img_id , '_wp_attachment_image_alt', true);					
			?>
				<div class="slide-item">
					<div class="nt-container">
						<div class="nt-columns-area">
							<div class="nt-column-6 nt-sm-column-6">
								<div class="theme-content">
									<?php if ( ! empty( $evita_repeater_subtitle ) ) : ?>
										<h3>
											<?php echo wp_kses_post($evita_repeater_subtitle); ?>
										</h3> 
									<?php endif; ?>
									
									<?php if ( ! empty( $evita_repeater_title ) ) : ?>
										<h1>
											<?php echo esc_html($evita_repeater_title); ?>
										</h1>
									<?php endif; ?>
									
									<?php if ( ! empty( $evita_repeater_text ) ) : ?>		
										<p>
											<?php echo esc_html($evita_repeater_text); ?>
										</p>
									<?php endif; ?>
									
									<?php if ( ! empty( $evita_repeater_button ) ) : ?>
										<a href="<?php echo esc_url( $evita_repeater_link ); ?>" target='_blank' class="nt-btn main-btn"> <span><?php echo esc_html( $evita_repeater_button ); ?></span> <i class="fa fa-user"></i> </a>
									<?php endif; ?>
									
								</div>
							</div>
							<div class="nt-column-6 nt-sm-column-6">
								<?php if ( ! empty( $evita_repeater_image ) ) : ?>
									<div class="slider-image">
										<img src="<?php echo esc_url($evita_repeater_image); ?>" alt="<?php echo esc_attr($evita_repeater_alt_text); ?>">
									</div>
								<?php endif; ?>	
							</div>
						</div>
					</div>
				</div>
			<?php } } ?>
		</div>
	</section>
	<!--===// end: slider
	=================================-->
	<?php	
	}
endif;
if ( function_exists( 'cleverfox_evita_lite_slider' ) ) {
$cleverfox_section_priority = apply_filters( 'evita_section_priority', 11, 'cleverfox_evita_lite_slider' );
add_action( 'evita_sections', 'cleverfox_evita_lite_slider', absint( $cleverfox_section_priority ) );
}