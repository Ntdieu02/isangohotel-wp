<?php  
	$corpex_cormex_testimonial_ttl		= get_theme_mod('testimonial_ttl','Our <span>Testimonial</span>');
	$corpex_cormex_testimonial_description= get_theme_mod('testimonial_description','There are many variations of passages of Lorem Ipsum available.');
	$corpex_cormex_testimonial_bg_image			= get_theme_mod('testimonial_bg_image',esc_url(CLEVERFOX_PLUGIN_URL .'inc/corpex/images/shapes/shape-4.png'));
	$corpex_cormex_testimonial_bg_position	= get_theme_mod('testimonial_bg_position','fixed');
	$corpex_cormex_testimonial_contents	= get_theme_mod('testimonial_contents',corpex_get_testimonial_default()); 						
?>	
<!-- testimonial -->
    <section class="testimonial-section home-testimonial" <?php if(!empty($corpex_cormex_testimonial_bg_image)){ ?> style="background:url('<?php echo esc_url($corpex_cormex_testimonial_bg_image); ?>'); background-repeat:no-repeat;background-size:cover;background-attachment:<?php echo esc_attr($corpex_cormex_testimonial_bg_position); ?>" <?php } ?>>
        <div class="container">
            <?php if(!empty($corpex_cormex_testimonial_ttl) || !empty($corpex_cormex_testimonial_description)): ?>
				<div class="section-title">
					<?php if(!empty($corpex_cormex_testimonial_ttl)): ?>
						<h2>
							<?php echo wp_kses_post($corpex_cormex_testimonial_ttl); ?>
						</h2>
					<?php endif; ?>
					
					<?php if(!empty($corpex_cormex_testimonial_description)): ?>
						<p>
							<?php echo esc_html($corpex_cormex_testimonial_description); ?>
						</p>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			
			<?php 
				if ( ! empty( $corpex_cormex_testimonial_contents ) ) { 
				$corpex_cormex_testimonial_contents = json_decode( $corpex_cormex_testimonial_contents );
			?>
				<div id="testimonial" class="carousel slide testimonial" data-bs-ride="carousel">
					<div class="carousel-indicators">
						<button type="button" data-bs-target="#testimonial" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
						<button type="button" data-bs-target="#testimonial" data-bs-slide-to="1" aria-label="Slide 2"></button>
						<button type="button" data-bs-target="#testimonial" data-bs-slide-to="2" aria-label="Slide 3"></button>
					</div>
					<div class="carousel-inner">
						<?php $corpex_cormex_count=0;							
							foreach ( $corpex_cormex_testimonial_contents as $corpex_cormex_testimonial_item ) {
								
								$corpex_cormex_repeater_image = ! empty( $corpex_cormex_testimonial_item->image_url ) ? apply_filters( 'corpex_translate_single_string', $corpex_cormex_testimonial_item->image_url, 'Testimonial section' ) : '';
								$corpex_cormex_repeater_title = ! empty( $corpex_cormex_testimonial_item->title ) ? apply_filters( 'corpex_translate_single_string', $corpex_cormex_testimonial_item->title, 'Testimonial section' ) : '';
								$corpex_cormex_repeater_subtitle = ! empty( $corpex_cormex_testimonial_item->subtitle ) ? apply_filters( 'corpex_translate_single_string', $corpex_cormex_testimonial_item->subtitle, 'Testimonial section' ) : '';
								$corpex_cormex_repeater_subtitle2 = ! empty( $corpex_cormex_testimonial_item->subtitle2 ) ? apply_filters( 'corpex_translate_single_string', $corpex_cormex_testimonial_item->subtitle2, 'Testimonial section' ) : '';
								$corpex_cormex_repeater_text = ! empty( $corpex_cormex_testimonial_item->text ) ? apply_filters( 'corpex_translate_single_string', $corpex_cormex_testimonial_item->text, 'Testimonial section' ) : '';
								$corpex_cormex_repeater_active = ($corpex_cormex_count == 0)?'active':'';
						?>
							<div class="carousel-item <?php echo esc_attr($corpex_cormex_repeater_active); ?>">
								<div class="row">
									<?php if(!empty($corpex_cormex_repeater_image)): ?>
										<div class="col-lg-6">
											<div class="testimonial-image">
												<span><img src="<?php echo esc_url($corpex_cormex_repeater_image); ?>" alt="<?php echo esc_attr__('Testimonial Image','clever-fox'); ?>"></span>
											</div>
										</div>
									<?php endif; ?>
									
									<div class="col-lg-6">
										<div class="testimonial-content">
											<?php if(!empty($corpex_cormex_repeater_subtitle2)){ ?>
												<div class="content-heading">
													<h2>
														<?php echo wp_kses_post($corpex_cormex_repeater_subtitle2); ?>
													</h2>
												</div>
											<?php } ?>
											
											<div class="testimonial-content-inner">
												<?php if(!empty($corpex_cormex_repeater_text)): ?>
													<p class="paragraph">
														<?php echo esc_html($corpex_cormex_repeater_text); ?>
													</p>
												<?php endif; ?>
												
												
												<div class="client-detail">
													<?php if(!empty($corpex_cormex_repeater_image)): ?>
														<div class="image">
															<img src="<?php echo esc_url($corpex_cormex_repeater_image); ?>" alt="<?php echo esc_attr__('Testimonial Image','clever-fox'); ?>">
														</div>
													<?php endif; ?>
													
													<div class="info">
														<?php if(!empty($corpex_cormex_repeater_title) || !empty($corpex_cormex_repeater_subtitle)): ?>
															<h6>
																<?php echo esc_html($corpex_cormex_repeater_title); ?>
															</h6>
															<span>
																<?php echo esc_html($corpex_cormex_repeater_subtitle); ?>
															</span>
														<?php endif; ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php ++$corpex_cormex_count; } ?>
					</div>
				</div>
			<?php } ?>
        </div>
    </section>
    <!-- testimonial end -->