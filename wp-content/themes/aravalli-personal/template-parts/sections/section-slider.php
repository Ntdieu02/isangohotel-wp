<?php  
	$slider 						= get_theme_mod('slider',aravalli_get_slider_default());
	$slider_animation_in			= get_theme_mod('slider_animation_in','pulse'); 
	$slider_animation_out			= get_theme_mod('slider_animation_out','fadeOut');
	$slider_animation_speed			= get_theme_mod('slider_animation_speed','9000');
	$slider_autoplay				= get_theme_mod('slider_autoplay','false');

	$settings=array('animateIn'=>$slider_animation_in,'animateOut'=>$slider_animation_out,'animationSpeed'=>$slider_animation_speed);
	
	wp_register_script('aravalli-slider',get_template_directory_uri().'/assets/js/homepage/slider.js',array('jquery'));
	wp_localize_script('aravalli-slider','slider_settings',$settings);
	wp_enqueue_script('aravalli-slider');	
?>		
<section id="slider-section" class="slider-wrapper">
	<div class="main-slider owl-carousel owl-theme">
		<?php
			if ( ! empty( $slider ) ) {
			$slider = json_decode( $slider );
			foreach ( $slider as $slide_item ) {
				$aravalli_slide_title = ! empty( $slide_item->title ) ? apply_filters( 'aravalli_translate_single_string', $slide_item->title, 'slider section' ) : '';
				$text = ! empty( $slide_item->text ) ? apply_filters( 'aravalli_translate_single_string', $slide_item->text, 'slider section' ) : '';
				$button = ! empty( $slide_item->text2) ? apply_filters( 'aravalli_translate_single_string', $slide_item->text2,'slider section' ) : '';
				$aravalli_slide_link = ! empty( $slide_item->link ) ? apply_filters( 'aravalli_translate_single_string', $slide_item->link, 'slider section' ) : '';
				$button2 = ! empty( $slide_item->button_second) ? apply_filters( 'aravalli_translate_single_string', $slide_item->button_second,'slider section' ) : '';
				$link2 = ! empty( $slide_item->link2 ) ? apply_filters( 'aravalli_translate_single_string', $slide_item->link2, 'slider section' ) : '';
				$image = ! empty( $slide_item->image_url ) ? apply_filters( 'aravalli_translate_single_string', $slide_item->image_url, 'slider section' ) : '';
				$image2 = ! empty( $slide_item->image_url2 ) ? apply_filters( 'aravalli_translate_single_string', $slide_item->image_url2, 'slider section' ) : '';
				$align = ! empty( $slide_item->slide_align ) ? apply_filters( 'aravalli_translate_single_string', $slide_item->slide_align, 'slider section' ) : '';
		?>
		<div class="item">
			<?php if ( ! empty( $image ) ) : ?>
					<img src="<?php echo esc_url( $image ); ?>" data-img-url="<?php echo esc_url( $image ); ?>"  alt="">
			   <?php endif; ?>
			<div class="theme-slider">
				<div class="theme-table">
					<div class="theme-table-cell">
						<div class="container">                                
							<div class="theme-content text-<?php echo esc_attr($align); ?>">
								               
								<?php if ( ! empty( $aravalli_slide_title )) : ?>
									<h1 data-animation="fadeInLeft" data-delay="200ms"><?php echo esc_html( $aravalli_slide_title ); ?></h1>
								<?php endif; ?>	
								
								<?php if ( ! empty( $text ) ) : ?>
									<p data-animation="fadeInLeft" data-delay="500ms"><?php echo esc_html( $text ); ?></p>
								<?php endif; ?>
												
								<?php if ( ! empty( $button ) ) : ?>				
									<a data-animation="fadeInUp" data-delay="800ms" href="<?php echo esc_url( $link2 ); ?>" class="btn-shape btn-line-primary"><?php echo esc_html( $button ); ?></a>
								<?php endif; ?>
								
								<?php if ( ! empty( $button2 ) ) : ?>	
									<a data-animation="fadeInUp" data-delay="800ms" href=<?php echo esc_url( $aravalli_slide_link ); ?> class="btn-shape btn-bg"><?php echo esc_html( $button2 ); ?></a>
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