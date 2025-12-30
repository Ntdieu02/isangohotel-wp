<?php 
	$renoval_builderse_testimonial_subttl		= get_theme_mod('testimonial_subttl',__('<h2>Outstanding</h2><div class="animation"><div class="first"><div>Testimonial</div></div></div>','clever-fox'));
	$renoval_builderse_testimonial_desc		= get_theme_mod('testimonial_desc',__('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','clever-fox'));  
	$renoval_builderse_testimonial_contents	= get_theme_mod('testimonial_contents',renoval_get_testimonial_default()); 
	$renoval_builderse_hs_testimonial 		= get_theme_mod('hs_testimonial','1');
	if($renoval_builderse_hs_testimonial=='1'):
?>	

	<!-- Start: Testimonial Section
	=======================-->
	<section id="testimonial-section" class="home-testimonial testimonial-section wow fadeInUp">
		<div class="bg-elements-none">
			<div class="elemt-tb1"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/element/measure.png'); ?>" alt="<?php echo esc_attr__('Image','clever-fox'); ?>"></div>
			<div class="elemt-tb2"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/element/axe.png'); ?>" alt="<?php echo esc_attr__('Image','clever-fox'); ?>"></div>
			<div class="elemt-tb3"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/element/crane.png'); ?>" alt="<?php echo esc_attr__('Image','clever-fox'); ?>"></div>
			<div class="elemt-tb4"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/element/hammer.png'); ?>" alt="<?php echo esc_attr__('Image','clever-fox'); ?>"></div>
			<div class="elemt-tb5"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/element/drill.png'); ?>" alt="<?php echo esc_attr__('Image','clever-fox'); ?>"></div>
			<div class="elemt-tb6"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/element/bulldozer.png'); ?>" alt="<?php echo esc_attr__('Image','clever-fox'); ?>"></div>
		</div>
		
		<div class="container">
			<?php if( !empty($renoval_builderse_testimonial_subttl) || !empty($renoval_builderse_testimonial_desc)): ?>
				<div class="row">
					<div class="section-title text-center">
						
						<?php if(!empty($renoval_builderse_testimonial_subttl)): ?>
							<div>
								<?php echo wp_kses_post($renoval_builderse_testimonial_subttl); ?>
							</div>
						<?php endif; ?>
						
						<?php if(!empty($renoval_builderse_testimonial_desc)): ?>
							<p>
								<?php echo wp_kses_post($renoval_builderse_testimonial_desc); ?>
							</p>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
			
			<?php 
				if ( ! empty( $renoval_builderse_testimonial_contents ) ) { 
				$renoval_builderse_testimonial_contents = json_decode( $renoval_builderse_testimonial_contents );
			?>
				<div class="testimonial-item">
					<div class="owl-thumbs" data-slider-id="2">
						<?php							
							foreach ( $renoval_builderse_testimonial_contents as $renoval_builderse_testimonial_item ) {
								$renoval_builderse_repeater_title = ! empty( $renoval_builderse_testimonial_item->title ) ? apply_filters( 'renoval_translate_single_string', $renoval_builderse_testimonial_item->title, 'Testimonial section' ) : '';
								$renoval_builderse_repeater_subtitle = ! empty( $renoval_builderse_testimonial_item->subtitle ) ? apply_filters( 'renoval_translate_single_string', $renoval_builderse_testimonial_item->subtitle, 'Testimonial section' ) : '';
								$renoval_builderse_repeater_image = ! empty( $renoval_builderse_testimonial_item->image_url ) ? apply_filters( 'renoval_translate_single_string', $renoval_builderse_testimonial_item->image_url, 'Testimonial section' ) : '';
						?>
							<div class="owl-thumb-item">
								<div class="testimonial-box">
									<?php if(!empty($renoval_builderse_repeater_image)): ?>
										<div class="testimonial-image">
											<img src="<?php echo esc_url($renoval_builderse_repeater_image); ?>" alt="<?php echo esc_attr__('Testimonial Image','clever-fox'); ?>">
										</div>
									<?php endif; ?>										
									
									<?php if(!empty($renoval_builderse_repeater_title) || !empty($renoval_builderse_repeater_subtitle)): ?>
										<div class="testimonial-content">
											<h4>
												<?php echo esc_html($renoval_builderse_repeater_title); ?>
											</h4>
											<p>
												<?php echo esc_html($renoval_builderse_repeater_subtitle); ?>
											</p>
										</div>
									<?php endif; ?>	
								</div>
							</div>
						<?php } ?>
					</div>						
					<div class="testimonial-carousel owl-carousel wow fadeInUp" data-slider-id="2"> 
						<?php							
							foreach ( $renoval_builderse_testimonial_contents as $renoval_builderse_testimonial_item ) {
								$renoval_builderse_repeater_subtitle2 = ! empty( $renoval_builderse_testimonial_item->subtitle2 ) ? apply_filters( 'renoval_translate_single_string', $renoval_builderse_testimonial_item->subtitle2, 'Testimonial section' ) : '';
								$renoval_builderse_repeater_text = ! empty( $renoval_builderse_testimonial_item->text ) ? apply_filters( 'renoval_translate_single_string', $renoval_builderse_testimonial_item->text, 'Testimonial section' ) : '';
								$renoval_builderse_repeater_text2 = ! empty( $renoval_builderse_testimonial_item->text2 ) ? apply_filters( 'renoval_translate_single_string', $renoval_builderse_testimonial_item->text2, 'Testimonial section' ) : '';
								$renoval_builderse_repeater_button = ! empty( $renoval_builderse_testimonial_item->text2) ? apply_filters( 'renoval_translate_single_string', $renoval_builderse_testimonial_item->text2,'service section' ) : '';
								$renoval_builderse_repeater_link = ! empty( $renoval_builderse_testimonial_item->link ) ? apply_filters( 'renoval_translate_single_string', $renoval_builderse_testimonial_item->link, 'service section' ) : '';
						?>
							<div class="testimonial-content">
								<?php if(!empty($renoval_builderse_repeater_subtitle2)): ?>
									<h3>
										<?php echo esc_html($renoval_builderse_repeater_subtitle2); ?>
									</h3>
								<?php endif; ?>
								
								<?php if(!empty($renoval_builderse_repeater_text)): ?>
									<p>
										<i class="fa fa-quote-left" aria-hidden="true"></i><?php echo esc_html($renoval_builderse_repeater_text); ?></p>
								<?php endif; ?>
								
								<?php if ( ! empty( $renoval_builderse_repeater_button ) && ! empty( $renoval_builderse_repeater_link ) ) : ?>
									<a href="<?php echo esc_url( $renoval_builderse_repeater_link ); ?>" class="main-button">
										<span>
											<?php echo esc_html( $renoval_builderse_repeater_button ); ?>
										</span> 
										<i
										class="fa fa-angle-double-right"></i>
									</a>
								<?php endif; ?>	
							</div>
						<?php } ?>
					</div>		
				</div>
			<?php } ?>
		</div>
	</section>
	<!-- End: Testimonial Section
		=======================-->
<?php endif; ?>