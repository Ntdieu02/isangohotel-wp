 <!--===// Start: Slider
    =================================--> 
<?php  
if ( ! function_exists( 'metasoft_lite_slider' ) ) :
	function metasoft_lite_slider() {
	$metasoft_slider  = get_theme_mod('slider',metasoft_get_slider_default());	
?>		
 <!-- Slider Start -->
<section id="slider-wrapper" class="slider-wrapper">
	<div class="main-slider owl-carousel owl-theme">
		<?php
			if ( ! empty( $metasoft_slider ) ) {
			$metasoft_slider = json_decode( $metasoft_slider );
			foreach ( $metasoft_slider as $metasoft_slide_item ) {
				$metasoft_repeater_title = ! empty( $metasoft_slide_item->title ) ? apply_filters( 'metasoft_translate_single_string', $metasoft_slide_item->title, 'slider section' ) : '';
				$metasoft_repeater_subtitle = ! empty( $metasoft_slide_item->subtitle ) ? apply_filters( 'metasoft_translate_single_string', $metasoft_slide_item->subtitle, 'slider section' ) : '';
				$metasoft_repeater_text = ! empty( $metasoft_slide_item->text ) ? apply_filters( 'metasoft_translate_single_string', $metasoft_slide_item->text, 'slider section' ) : '';
				$metasoft_repeater_button = ! empty( $metasoft_slide_item->text2) ? apply_filters( 'metasoft_translate_single_string', $metasoft_slide_item->text2,'slider section' ) : '';
				$metasoft_repeater_link = ! empty( $metasoft_slide_item->link ) ? apply_filters( 'metasoft_translate_single_string', $metasoft_slide_item->link, 'slider section' ) : '';
				$metasoft_repeater_image = ! empty( $metasoft_slide_item->image_url ) ? apply_filters( 'metasoft_translate_single_string', $metasoft_slide_item->image_url, 'slider section' ) : '';
				$metasoft_repeater_align = ! empty( $metasoft_slide_item->slide_align ) ? apply_filters( 'metasoft_translate_single_string', $metasoft_slide_item->slide_align, 'slider section' ) : '';
		?>
			<div class="item">
				<?php if ( ! empty( $metasoft_repeater_image ) ) : ?>
					<img src="<?php echo esc_url( $metasoft_repeater_image ); ?>" alt="">
			   <?php endif; ?>
				<div class="theme-slider">
					<div class="theme-table">
						<div class="theme-table-cell">
							<div class="container">
								<div class="theme-content text-<?php echo esc_attr($metasoft_repeater_align); ?>">
									<div class="theme-slider-card">
									
										<?php if ( ! empty( $metasoft_repeater_title ) || ! empty( $metasoft_repeater_subtitle )) : ?>
											<h1><?php echo esc_html( $metasoft_repeater_title ); ?> <span class="text-primary"><?php echo esc_html( $metasoft_repeater_subtitle ); ?></span></h1>
										<?php endif; ?>	
										
										<?php if ( ! empty( $metasoft_repeater_text ) ) : ?>
											<p><?php echo esc_html( $metasoft_repeater_text ); ?></p>
										<?php endif; ?>
									
									</div>
									
									<?php if ( ! empty( $metasoft_repeater_button ) ) : ?>
										<a href="<?php echo esc_url( $metasoft_repeater_link ); ?>" class="btn btn-secondary btn-like-icon"><?php echo esc_html( $metasoft_repeater_button ); ?> <span class="bticn"><i class="fa fa-angle-right"></i></span></a>
									<?php endif; ?>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } } ?>
	</div>
</section>
<?php	
	}
endif;
if ( function_exists( 'metasoft_lite_slider' ) ) {
$cleverfox_section_priority = apply_filters( 'metasoft_section_priority', 11, 'metasoft_lite_slider' );
add_action( 'metasoft_sections', 'metasoft_lite_slider', absint( $cleverfox_section_priority ) );
}
?>
<!-- Slider End -->
	