 <!--===// Start: Slider
    =================================--> 
<?php  
	$gradiant_slider_hs 						= get_theme_mod('slider_hs','1');
	$gradiant_slider 						= get_theme_mod('slider',gradiant_get_slider_default());
	$gradiant_slider_autoplay				= get_theme_mod('slider_autoplay','false');
	if($gradiant_slider_hs=='1'){
?>	
<section id="slider-section" class="slider-wrapper">
	<div class="main-slider owl-carousel owl-theme">
		<?php
			if ( ! empty( $gradiant_slider ) ) {
			$gradiant_slider = json_decode( $gradiant_slider );
			foreach ( $gradiant_slider as $gradiant_slide_item ) {
				$gradiant_repeater_title = ! empty( $gradiant_slide_item->title ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_slide_item->title, 'slider section' ) : '';
				$gradiant_repeater_subtitle = ! empty( $gradiant_slide_item->subtitle ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_slide_item->subtitle, 'slider section' ) : '';
				$gradiant_repeater_subtitle2 = ! empty( $gradiant_slide_item->subtitle2 ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_slide_item->subtitle2, 'slider section' ) : '';
				$gradiant_repeater_text = ! empty( $gradiant_slide_item->text ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_slide_item->text, 'slider section' ) : '';
				$gradiant_repeater_button = ! empty( $gradiant_slide_item->text2) ? apply_filters( 'gradiant_translate_single_string', $gradiant_slide_item->text2,'slider section' ) : '';
				$gradiant_repeater_link = ! empty( $gradiant_slide_item->link ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_slide_item->link, 'slider section' ) : '';
				$gradiant_repeater_image = ! empty( $gradiant_slide_item->image_url ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_slide_item->image_url, 'slider section' ) : '';
				$gradiant_repeater_open_new_tab = ! empty( $gradiant_slide_item->open_new_tab ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_slide_item->open_new_tab, 'slider section' ) : '';
				$gradiant_repeater_align = ! empty( $gradiant_slide_item->slide_align ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_slide_item->slide_align, 'slider section' ) : '';
				if($gradiant_repeater_align == 'left'): $gradiant_repeater_animation_align='fadeInLeft'; 
				elseif($gradiant_repeater_align == 'center'): $gradiant_repeater_animation_align='fadeInUp';
				else: $gradiant_repeater_animation_align='fadeInRight'; endif;
		?>
			<div class="item">
				<?php if ( ! empty( $gradiant_repeater_image ) ) : ?>
					<img src="<?php echo esc_url($gradiant_repeater_image); ?>" data-img-url="<?php echo esc_url($gradiant_repeater_image); ?>" alt="">
				<?php endif; ?>	
				<div class="theme-slider">
					<div class="theme-table">
						<div class="theme-table-cell">
							<div class="av-container">                                
								<div class="theme-content text-<?php echo esc_attr($gradiant_repeater_align); ?> wow zoomIn">
									<?php if ( ! empty( $gradiant_repeater_title ) ) : ?>
										<h3 data-animation="fadeInUp" data-delay="150ms"><?php echo esc_html($gradiant_repeater_title); ?></h3>
									<?php endif; ?>
									
									<?php if ( ! empty( $gradiant_repeater_subtitle )  || ! empty( $gradiant_repeater_subtitle2 )) : ?>
										<h1 data-animation="<?php echo esc_attr($gradiant_repeater_animation_align); ?>" data-delay="200ms"><?php echo esc_html($gradiant_repeater_subtitle); ?> <span class="primary-color"><?php echo esc_html($gradiant_repeater_subtitle2); ?></span></h1>   
									<?php endif; ?>
									
									<?php if ( ! empty( $gradiant_repeater_text ) ) : ?>									
										<p data-animation="<?php echo esc_attr($gradiant_repeater_animation_align); ?>" data-delay="500ms"><?php echo esc_html($gradiant_repeater_text); ?></p>
									<?php endif; ?>
									
									<?php if ( ! empty( $gradiant_repeater_button ) ) : ?>
										<a data-animation="fadeInUp" data-delay="800ms" href="<?php echo esc_url( $gradiant_repeater_link ); ?>" <?php if($gradiant_repeater_open_new_tab== 'yes' || $gradiant_repeater_open_new_tab== '1') { echo "target='_blank'"; } ?> class="av-btn av-btn-primary av-btn-bubble"><?php echo esc_html( $gradiant_repeater_button ); ?> <i class="fa fa-arrow-right"></i> <span class="bubble_effect"><span class="circle top-left"></span> <span class="circle top-left"></span> <span class="circle top-left"></span> <span class="button effect-button"></span> <span class="circle bottom-right"></span> <span class="circle bottom-right"></span> <span class="circle bottom-right"></span></span></a>
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
<?php } ?>