<?php  
	$renoval_eractor_funfact_subtitle		= get_theme_mod('funfact_subtitle',__('<h2>Outstanding</h2><div class="animation"><div class="first"><div>Funfact</div></div></div>','clever-fox'));	
	$renoval_eractor_funfact_description	= get_theme_mod('funfact_description',__('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','clever-fox')); 
	$renoval_eractor_funfact_contents		= get_theme_mod('funfact_contents',renoval_get_funfact_default());
	$renoval_eractor_funfact_left_img		= get_theme_mod('funfact_left_img',esc_url(CLEVERFOX_PLUGIN_URL.'inc/eractor/images/left-funfact.jpg'));  
	$renoval_eractor_funfact_bg_img			= get_theme_mod('funfact_bg_img',esc_url(CLEVERFOX_PLUGIN_URL.'inc/eractor/images/funfact-bg.jpg')); 
?>	
	<!--=======================
		Start: Funfact Section
	=======================-->
	<section id="funfact-section" class="funfact-section home-funfact wow fadeInUp" <?php if(!empty($renoval_eractor_funfact_bg_img)){ ?> style="background-image:url(<?php echo esc_url($renoval_eractor_funfact_bg_img) ?>);" <?php } ?>>
		<div class="container">
			<?php if( !empty($renoval_eractor_funfact_subtitle) || !empty($renoval_eractor_funfact_description)): ?>
				<div class="section-title text-center">
					
					<?php if(!empty($renoval_eractor_funfact_subtitle)): ?>
						<div>
							<?php echo wp_kses_post($renoval_eractor_funfact_subtitle); ?>
						</div>
					<?php endif; ?>
					
					<?php if(!empty($renoval_eractor_funfact_description)): ?>
						<p>
							<span class="funfact-title">
								<?php echo wp_kses_post($renoval_eractor_funfact_description); ?>
							</span>
						</p>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			
			
			<div class="row">
				<?php if(!empty($renoval_eractor_funfact_left_img)): ?>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="left-area-funfact">
							<div class="ring">
								<div class="left-image">
									<img class="rounded-circle" src="<?php echo esc_url($renoval_eractor_funfact_left_img); ?>" alt="<?php echo esc_attr__('Funfact Image','clever-fox'); ?>">
									<span class="funfact-effect-1"></span>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
				
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="row">
						<?php
							if ( ! empty( $renoval_eractor_funfact_contents ) ) {
							$renoval_eractor_funfact_contents = json_decode( $renoval_eractor_funfact_contents );
							foreach ( $renoval_eractor_funfact_contents as $renoval_eractor_funfact_item ) {
								$renoval_eractor_repeater_title = ! empty( $renoval_eractor_funfact_item->title ) ? apply_filters( 'renoval_translate_single_string', $renoval_eractor_funfact_item->title, 'Funfact section' ) : '';
								$renoval_eractor_repeater_subtitle = ! empty( $renoval_eractor_funfact_item->subtitle ) ? apply_filters( 'renoval_translate_single_string', $renoval_eractor_funfact_item->subtitle, 'Funfact section' ) : '';
								$renoval_eractor_repeater_text = ! empty( $renoval_eractor_funfact_item->text ) ? apply_filters( 'renoval_translate_single_string', $renoval_eractor_funfact_item->text, 'Funfact section' ) : '';
								$renoval_eractor_repeater_image = ! empty( $renoval_eractor_funfact_item->image_url ) ? apply_filters( 'renoval_translate_single_string', $renoval_eractor_funfact_item->image_url, 'Funfact section' ) : '';
								$renoval_eractor_repeater_icon = ! empty( $renoval_eractor_funfact_item->icon_value ) ? apply_filters( 'renoval_translate_single_string', $renoval_eractor_funfact_item->icon_value, 'Funfact section' ) : '';
								$renoval_eractor_repeater_choice = ! empty( $renoval_eractor_funfact_item->choice ) ? apply_filters( 'renoval_translate_single_string', $renoval_eractor_funfact_item->choice, 'Funfact section' ) : '';
						?>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="funfact-box spin thick">
									<div class="funfact-icon">
										<?php if($renoval_eractor_repeater_choice =='customizer_repeater_image'): ?>
											<img src="<?php echo esc_url($renoval_eractor_repeater_image); ?>" />
										<?php else: ?>
											<i class="fa <?php echo esc_attr($renoval_eractor_repeater_icon); ?>"></i>
										<?php endif; ?>
									</div>
									<div class="funfact-content">
										
										<?php if(!empty($renoval_eractor_repeater_text)): ?>
											<p>
												<?php echo esc_html($renoval_eractor_repeater_text); ?>
											</p>
										<?php endif; ?>
										
										<?php if(!empty($renoval_eractor_repeater_title)  || !empty($renoval_eractor_repeater_subtitle)): ?>
											<h1><span class="counter"><?php echo esc_html($renoval_eractor_repeater_title); ?></span> <?php echo esc_html($renoval_eractor_repeater_subtitle); ?></h1>
										<?php endif; ?>	
									</div>
									
									<div class="section-element-funfact">
										<img src="<?php echo esc_url(CLEVERFOX_PLUGIN_URL.'inc/eractor/images/section-bg.png'); ?>" alt="<?php echo esc_attr__('Image','clever-fox'); ?>"> 
							</div>
									<span class="fun-over"></span>
								</div>
							</div>
						<?php } } ?>	
					</div>
				</div>	 	
			</div>
		</div>
	</section>
	<!-- End: Funfact Section
	=======================-->