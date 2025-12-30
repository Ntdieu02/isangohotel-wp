 <!--===// Start: Slider
    =================================--> 
<?php  
	$nexcraft_slider_hs 						= get_theme_mod('slider_hs','1');
	$nexcraft_slider 						= get_theme_mod('slider',nexcraft_get_slider_default());
	if($nexcraft_slider_hs=='1'){
?>	
	<!-- slider -->
    <section class="slider-section slider-one">
		<div id="slidercarousel" class="carousel slide" data-bs-ride="carousel" data-bs-wrap="true" data-bs-pause="hover" data-bs-interval="5000">
		
            <div class="carousel-inner">
				<?php
					if ( ! empty( $nexcraft_slider ) ) {
						$nexcraft_slider = json_decode( $nexcraft_slider );
						$nexcraft_count = 1;
					foreach ( $nexcraft_slider as $nexcraft_slide_item ) {
						$nexcraft_repeater_title = ! empty( $nexcraft_slide_item->title ) ? apply_filters( 'nexcraft_translate_single_string', $nexcraft_slide_item->title, 'slider section' ) : '';
						$nexcraft_repeater_subtitle = ! empty( $nexcraft_slide_item->subtitle ) ? apply_filters( 'nexcraft_translate_single_string', $nexcraft_slide_item->subtitle, 'slider section' ) : '';
						$nexcraft_repeater_button = ! empty( $nexcraft_slide_item->text2) ? apply_filters( 'nexcraft_translate_single_string', $nexcraft_slide_item->text2,'slider section' ) : '';
						$nexcraft_repeater_link = ! empty( $nexcraft_slide_item->link ) ? apply_filters( 'nexcraft_translate_single_string', $nexcraft_slide_item->link, 'slider section' ) : '';
						$nexcraft_repeater_image = ! empty( $nexcraft_slide_item->image_url ) ? apply_filters( 'nexcraft_translate_single_string', $nexcraft_slide_item->image_url, 'slider section' ) : '';
						$nexcraft_repeater_active_class = ($nexcraft_count==1)?'active':'';
				?>
					<div class="carousel-item <?php echo esc_attr($nexcraft_repeater_active_class); ?>">
						<div class="slider-item">
							<?php if ( ! empty( $nexcraft_repeater_image ) ) : ?>
								<img src="<?php echo esc_url($nexcraft_repeater_image); ?>" class="d-block w-100" alt="<?php echo esc_attr__('Image','clever-fox'); ?>">
							<?php endif; ?>	
							<div class="slider-content">
								<div class="container">
									<div class="carousel-caption text-center mx-auto">
										<?php if ( ! empty( $nexcraft_repeater_subtitle ) ) : ?>
											 <span class="slide_subtitle">
												<?php if($nexcraft_repeater_subtitle): echo esc_html($nexcraft_repeater_subtitle); endif; ?>	
											</span> 
										<?php endif; ?>
										<?php if ( ! empty( $nexcraft_repeater_title ) ) : ?>
											<h2 class="slide_title">
												<?php if($nexcraft_repeater_title): echo esc_html($nexcraft_repeater_title); endif; ?>
											</h2>
										<?php endif; ?>
										<?php if ( ! empty( $nexcraft_repeater_button ) ) : ?>
											<a href="<?php echo esc_url( $nexcraft_repeater_link ); ?>" class="main-btn"class="main-btn"> <?php if($nexcraft_repeater_button): echo esc_html($nexcraft_repeater_button); endif; ?> <i class="fas fa-angle-double-right"></i></a>
										<?php endif; ?>	
									
									</div>
								</div>
							</div>
						</div>
					</div>
					
				<?php $nexcraft_count++; }  ?>  
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#slidercarousel" data-bs-slide="prev">
                <i class="fas fa-arrow-left"></i>
                <span class="visually-hidden"><?php echo esc_html__('Previous','clever-fox'); ?></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#slidercarousel" data-bs-slide="next">
                <i class="fas fa-arrow-right"></i>
                <span class="visually-hidden"><?php echo esc_html__('Next','clever-fox'); ?></span>
            </button>
        </div>
    </section>
    <!-- slider end -->
	<?php }}?>