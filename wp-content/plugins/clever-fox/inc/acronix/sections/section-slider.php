 <!--===// Start: Slider
    =================================--> 
<?php  
	$accron_acronix_slider_hs 						= get_theme_mod('slider_hs','1');
	$accron_acronix_slider 						= get_theme_mod('slider',accron_get_slider_default());
	if($accron_acronix_slider_hs=='1'){
?>	
<!-- slider -->
<section class="slider-section slider-two">
    <div id="sliderTwo" class="carousel slide">        
        <div class="carousel-inner">		
			<?php 
				if ( ! empty( $accron_acronix_slider ) ) {
				$accron_acronix_slider = json_decode( $accron_acronix_slider );
				foreach ( $accron_acronix_slider as $accron_acronix_slide_item ) {
					$accron_acronix_repeater_title = ! empty( $accron_acronix_slide_item->title ) ? apply_filters( 'accron_acronix_translate_single_string', $accron_acronix_slide_item->title, 'slider section' ) : '';
					$accron_acronix_repeater_subtitle = ! empty( $accron_acronix_slide_item->subtitle ) ? apply_filters( 'accron_acronix_translate_single_string', $accron_acronix_slide_item->subtitle, 'slider section' ) : '';
					$accron_acronix_repeater_button = ! empty( $accron_acronix_slide_item->text2) ? apply_filters( 'accron_acronix_translate_single_string', $accron_acronix_slide_item->text2,'slider section' ) : '';
					$accron_acronix_repeater_link = ! empty( $accron_acronix_slide_item->link ) ? apply_filters( 'accron_acronix_translate_single_string', $accron_acronix_slide_item->link, 'slider section' ) : '';
					$accron_acronix_repeater_button2 = ! empty( $accron_acronix_slide_item->button_second) ? apply_filters( 'accron_acronix_translate_single_string', $accron_acronix_slide_item->button_second,'slider section' ) : '';
					$accron_acronix_repeater_link2 = ! empty( $accron_acronix_slide_item->link2 ) ? apply_filters( 'accron_acronix_translate_single_string', $accron_acronix_slide_item->link2, 'slider section' ) : '';
					$accron_acronix_repeater_image = ! empty( $accron_acronix_slide_item->image_url ) ? apply_filters( 'accron_acronix_translate_single_string', $accron_acronix_slide_item->image_url, 'slider section' ) : '';					
					
			?>
				<div class="carousel-item active">
					<div class="container">
						<div class="slider2-item">
							<div class="row">
								<div class="col-sm-6">
									<div class="slider2-content">
										<div class="carousel-caption">
											<?php if ( ! empty( $accron_acronix_repeater_title ) ) : ?>
											<span class="firstword1">
												<span class="firstword"><?php echo esc_html($accron_acronix_repeater_title); ?></span>
												<span class="sub-effect"></span>
											</span>
										<?php endif; ?>
										<?php if ( ! empty( $accron_acronix_repeater_subtitle ) ) : ?>
											<h1  class="lastword">
												<?php echo esc_html($accron_acronix_repeater_subtitle); ?>	
											</h1> 
										<?php endif; ?>
										
										<?php if ( ! empty( $accron_acronix_repeater_button ) ) : ?>
											<a href="<?php echo esc_url( $accron_acronix_repeater_link ); ?>" target="_blank" rel="nofollow" class="main-btn bg"> <?php echo esc_html( $accron_acronix_repeater_button ); ?> </a>
										<?php endif; ?>											
										</div>
									</div>  
								</div>
								<div class="col-sm-6">
									<div class="slider-image">
										<?php if ( ! empty( $accron_acronix_repeater_image ) ) : ?>
											<img src="<?php echo esc_url($accron_acronix_repeater_image); ?>" alt="<?php echo esc_attr__('Image','clever-fox'); ?>">
										<?php endif; ?>	
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            <?php  } } ?>
        </div>       
    </div>
</section>
	<?php }?>
<!-- slider end -->