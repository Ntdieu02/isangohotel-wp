<?php  
	if ( ! function_exists( 'cleverfox_aravalli_lite_slider' ) ) :
	function cleverfox_aravalli_lite_slider() {
	$aravalli_slider 						= get_theme_mod('slider',aravalli_get_slider_default());
?>		
<section id="slider-section" class="slider-wrapper">
	<div class="main-slider owl-carousel owl-theme">
		<?php
			if ( ! empty( $aravalli_slider ) ) {
			$aravalli_slider = json_decode( $aravalli_slider );
			foreach ( $aravalli_slider as $aravalli_slide_item ) {
				$aravalli_repeater_title = ! empty( $aravalli_slide_item->title ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_slide_item->title, 'slider section' ) : '';
				$aravalli_repeater_text = ! empty( $aravalli_slide_item->text ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_slide_item->text, 'slider section' ) : '';
				$aravalli_repeater_button = ! empty( $aravalli_slide_item->text2) ? apply_filters( 'aravalli_translate_single_string', $aravalli_slide_item->text2,'slider section' ) : '';
				$aravalli_repeater_link = ! empty( $aravalli_slide_item->link ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_slide_item->link, 'slider section' ) : '';
				$aravalli_repeater_image = ! empty( $aravalli_slide_item->image_url ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_slide_item->image_url, 'slider section' ) : '';
				$aravalli_repeater_image2 = ! empty( $aravalli_slide_item->image_url2 ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_slide_item->image_url2, 'slider section' ) : '';
				$aravalli_repeater_align = ! empty( $aravalli_slide_item->slide_align ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_slide_item->slide_align, 'slider section' ) : '';
		?>
		<div class="item">
			<?php if ( ! empty( $aravalli_repeater_image ) ) : ?>
					<img src="<?php echo esc_url( $aravalli_repeater_image ); ?>" data-img-url="<?php echo esc_url( $aravalli_repeater_image ); ?>"  alt="">
			   <?php endif; ?>
			<div class="theme-slider">
				<div class="theme-table">
					<div class="theme-table-cell">
						<div class="container">                                
							<div class="theme-content text-<?php echo esc_attr($aravalli_repeater_align); ?>">
								               
								<?php if ( ! empty( $aravalli_repeater_title )) : ?>
									<h1 data-animation="fadeInLeft" data-delay="200ms"><?php echo esc_html($aravalli_repeater_title ); ?></h1>
								<?php endif; ?>	
								
								<?php if ( ! empty( $aravalli_repeater_text ) ) : ?>
									<p data-animation="fadeInLeft" data-delay="500ms"><?php echo esc_html($aravalli_repeater_text ); ?></p>
								<?php endif; ?>
												
								<?php if ( ! empty( $aravalli_repeater_button ) ) : ?>				
									<a data-animation="fadeInUp" data-delay="800ms" href="<?php echo esc_url( $aravalli_repeater_link ); ?>" class="btn-shape btn-line-primary"><?php echo esc_html($aravalli_repeater_button ); ?></a>
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
if ( function_exists( 'cleverfox_aravalli_lite_slider' ) ) {
$cleverfox_section_priority = apply_filters( 'aravalli_section_priority', 11, 'cleverfox_aravalli_lite_slider' );
add_action( 'aravalli_sections', 'cleverfox_aravalli_lite_slider', absint( $cleverfox_section_priority ) );
}