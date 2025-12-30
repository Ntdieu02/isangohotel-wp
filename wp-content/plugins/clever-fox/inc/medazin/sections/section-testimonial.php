<?php  
	$medazin_testimonial_ttl		= get_theme_mod('testimonial_ttl',__('Our Testimonial','clever-fox'));
	$medazin_testimonial_subttl		= get_theme_mod('testimonial_subttl',__('Testimonial','clever-fox'));
	$medazin_testimonial_contents	= get_theme_mod('testimonial_contents',medazin_get_testimonial_default()); 
do_action('medazin_before_testimonial_section_trigger');							
?>	
	<!-- ================================- Testimonial Section ===================================== -->
    <section class="testimonial-section home-testimonial">
        <div class="container ">
            <?php if(!empty($medazin_testimonial_ttl)  || !empty($medazin_testimonial_subttl)): ?>
				<div class="section-title text-center wow slideInDown">
					<?php if(!empty($medazin_testimonial_subttl)): ?>
						<span class="subtitle">
							<?php echo wp_kses_post($medazin_testimonial_subttl); ?>
						</span>
						<span class="title-element"> <i class="fa fa-heartbeat"></i></span>
					<?php endif; ?>
					
					<?php if(!empty($medazin_testimonial_ttl)): ?>
						<h5>
							<?php echo wp_kses_post($medazin_testimonial_ttl); ?>
						</h5>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			
			<?php 
				if ( ! empty( $medazin_testimonial_contents ) ) { 
				$medazin_testimonial_contents = json_decode( $medazin_testimonial_contents );
			?>
				<div class="testimonial-items owl-carousel ">
					<?php							
						foreach ( $medazin_testimonial_contents as $medazin_testimonial_item ) {
							
							$medazin_repeater_image = ! empty( $medazin_testimonial_item->image_url ) ? apply_filters( 'medazin_translate_single_string', $medazin_testimonial_item->image_url, 'Testimonial section' ) : '';
							$medazin_repeater_title = ! empty( $medazin_testimonial_item->title ) ? apply_filters( 'medazin_translate_single_string', $medazin_testimonial_item->title, 'Testimonial section' ) : '';
							$medazin_repeater_subtitle = ! empty( $medazin_testimonial_item->subtitle ) ? apply_filters( 'medazin_translate_single_string', $medazin_testimonial_item->subtitle, 'Testimonial section' ) : '';
							$medazin_repeater_text = ! empty( $medazin_testimonial_item->text ) ? apply_filters( 'medazin_translate_single_string', $medazin_testimonial_item->text, 'Testimonial section' ) : '';
					?>
						<div class="testimonial-box wow slideInUp ">
							<?php if(!empty($medazin_repeater_image)): ?>
								<div class="testimonial-img">
									<img src="<?php echo esc_url($medazin_repeater_image); ?>" alt="<?php echo esc_attr__('Testimonial Image','clever-fox'); ?>">
								</div>
							<?php endif; ?>		
							
							<div class="info-wrap ">
								<?php if(!empty($medazin_repeater_title) || !empty($medazin_repeater_subtitle)): ?>
									<h4 class="testimonial-name ">
										<?php echo esc_html($medazin_repeater_title); ?>
									</h4>
									<span class="sub-title">
										<?php echo esc_html($medazin_repeater_subtitle); ?>
									</span>
								<?php endif; ?>	
								
								<?php if(!empty($medazin_repeater_text)): ?>
									<blockquote>
										<?php echo esc_html($medazin_repeater_text); ?>
									</blockquote>
								<?php endif; ?>
								
								<div class="star-list ">
									<i class="fa fa-star "></i>
									<i class="fa fa-star "></i>
									<i class="fa fa-star "></i>
									<i class="fa fa-star "></i>
									<i class="fa fa-star "></i>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
        </div>
    </section>
    <!-- =================================== End =====================- -->
<?php do_action('medazin_after_testimonial_section_trigger'); ?>