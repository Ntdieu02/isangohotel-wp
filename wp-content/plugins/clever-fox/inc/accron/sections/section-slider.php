 <!--===// Start: Slider
    =================================--> 
<?php  
	$accron_slider_hs 					= get_theme_mod('slider_hs','1');
	$accron_slider 						= get_theme_mod('slider',accron_get_slider_default());
	if($accron_slider_hs == '1'){
?>	
<!--===// Start: Slider
=====================-->
	<section class="slider-section slider-one imgarrow">
        <div id="carouselExampleInterval" class="carousel slide carousel-fade">
            <div class="carousel-inner">
			<?php
				if ( ! empty( $accron_slider ) ) {
				$accron_slider = json_decode( $accron_slider );
				foreach ( $accron_slider as $accron_slide_item ) {
					$accron_repeater_title = ! empty( $accron_slide_item->title ) ? apply_filters( 'accron_translate_single_string', $accron_slide_item->title, 'slider section' ) : '';
					$accron_repeater_subtitle = ! empty( $accron_slide_item->subtitle ) ? apply_filters( 'accron_translate_single_string', $accron_slide_item->subtitle, 'slider section' ) : '';
					$accron_repeater_button = ! empty( $accron_slide_item->text2) ? apply_filters( 'accron_translate_single_string', $accron_slide_item->text2,'slider section' ) : '';
					$accron_repeater_link = ! empty( $accron_slide_item->link ) ? apply_filters( 'accron_translate_single_string', $accron_slide_item->link, 'slider section' ) : '';
					$accron_repeater_image = ! empty( $accron_slide_item->image_url ) ? apply_filters( 'accron_translate_single_string', $accron_slide_item->image_url, 'slider section' ) : '';
				?>
					<div class="carousel-item active">
						<div class="slide-main-item">
							<?php if ( ! empty( $accron_repeater_image ) ) : ?>
								<img src="<?php echo esc_url($accron_repeater_image); ?>" class="d-block w-100" alt="<?php echo esc_attr__('Image','clever-fox'); ?>">
							<?php endif; ?>	
							<div class="slider-content">
								<div class="container">
									<div class="carousel-caption col-lg-8 mx-auto">
										<?php if ( ! empty( $accron_repeater_title ) ) : ?>
											<span class="firstword1">
												<span class="firstword"><?php echo esc_html($accron_repeater_title); ?></span>
												<span class="sub-effect"></span>
											</span>
										<?php endif; ?>
										<?php if ( ! empty( $accron_repeater_subtitle ) ) : ?>
											<h1  class="lastword">
												<?php echo esc_html($accron_repeater_subtitle); ?>	
											</h1> 
										<?php endif; ?>
										
										<?php if ( ! empty( $accron_repeater_button ) ) : ?>
											<a href="<?php echo esc_url( $accron_repeater_link ); ?>" target="_blank" rel="nofollow" class="main-btn bg"> <?php echo esc_html( $accron_repeater_button ); ?> </a>
										<?php endif; ?>										
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } } ?>
            </div>            
        </div>
    </section>
<?php } ?>
<!-- End: Slider
=======================-->