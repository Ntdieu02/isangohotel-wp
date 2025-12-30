<?php  
	$gradiant_service_hs 			= get_theme_mod('service_hs','1');
	$gradiant_service_title 			= get_theme_mod('service_title',__('Our <span class="primary-color">Expertise</span>','clever-fox'));
	$gradiant_service_description	= get_theme_mod('service_description',__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','clever-fox')); 
	$gradiant_service_contents		= get_theme_mod('service_contents',gradiant_get_service_default());
	if($gradiant_service_hs=='1'){
?>	
<section id="service-section" class="service-section av-py-default service-home shapes-section">
	<div class="av-container">
		<?php if(!empty($gradiant_service_title)  || !empty($gradiant_service_description)): ?>
			<div class="av-columns-area">
				<div class="av-column-12">
					<div class="heading-default text-center wow fadeInUp">
						<?php if(!empty($gradiant_service_title)): ?>
							<h3><?php echo wp_kses_post($gradiant_service_title); ?></h3>
							<span class="separator"><span><span></span></span></span>
						<?php endif; ?>
						<?php if(!empty($gradiant_service_description)): ?>
							<p><?php echo wp_kses_post($gradiant_service_description); ?></p>
						<?php endif; ?>	
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="av-columns-area wow fadeInUp service-contents">
			<?php
				if ( ! empty( $gradiant_service_contents ) ) {
				$gradiant_service_contents = json_decode( $gradiant_service_contents );
				foreach ( $gradiant_service_contents as $gradiant_service_item ) {
					$gradiant_repeater_title = ! empty( $gradiant_service_item->title ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_service_item->title, 'Service section' ) : '';
					$gradiant_repeater_subtitle = ! empty( $gradiant_service_item->subtitle ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_service_item->subtitle, 'Service section' ) : '';
					$gradiant_repeater_subtitle2 = ! empty( $gradiant_service_item->subtitle2 ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_service_item->subtitle2, 'Service section' ) : '';
					$gradiant_repeater_subtitle3 = ! empty( $gradiant_service_item->subtitle3 ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_service_item->subtitle3, 'Service section' ) : '';
					$gradiant_repeater_subtitle4 = ! empty( $gradiant_service_item->subtitle4 ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_service_item->subtitle4, 'Service section' ) : '';
					$gradiant_repeater_subtitle5 = ! empty( $gradiant_service_item->subtitle5 ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_service_item->subtitle5, 'Service section' ) : '';
					$gradiant_repeater_text = ! empty( $gradiant_service_item->text ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_service_item->text, 'Service section' ) : '';
					$gradiant_repeater_button = ! empty( $gradiant_service_item->text2 ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_service_item->text2, 'Service section' ) : '';
					$gradiant_repeater_link = ! empty( $gradiant_service_item->link ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_service_item->link, 'Service section' ) : '';
					$gradiant_repeater_image = ! empty( $gradiant_service_item->image_url ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_service_item->image_url, 'Service section' ) : '';
					$gradiant_repeater_icon = ! empty( $gradiant_service_item->icon_value ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_service_item->icon_value, 'Service section' ) : '';
			?>
				<div class="av-column-4 av-sm-column-6 tilter">
					<div class="tilter__figure">
						<div class="service-item">
							<?php if(!empty($gradiant_repeater_image)): ?>
								<div class="service-overlay">
									<img src="<?php echo esc_url($gradiant_repeater_image); ?>">
								</div>
							<?php endif; ?>

							<div class="service-content tilter__caption">
								<?php if(!empty($gradiant_repeater_icon)): ?>
									<div class="service-icon">
										<i class="fa <?php echo esc_attr($gradiant_repeater_icon); ?>"></i>
									</div>
								<?php endif; ?>
								
								<?php if(!empty($gradiant_repeater_title)): ?>
									<h5 class="service-title"><a href="<?php echo esc_url($gradiant_repeater_link); ?>"><?php echo esc_html($gradiant_repeater_title); ?></a></h5>
								<?php endif; ?>

								
									<ul>
										<?php if(!empty($gradiant_repeater_subtitle)): ?>
											<li><?php echo esc_html($gradiant_repeater_subtitle); ?></li>
										<?php endif; ?>
										
										<?php if(!empty($gradiant_repeater_subtitle2)): ?>
											<li><?php echo esc_html($gradiant_repeater_subtitle2); ?></li>
										<?php endif; ?>
										
										<?php if(!empty($gradiant_repeater_subtitle3)): ?>
											<li><?php echo esc_html($gradiant_repeater_subtitle3); ?></li>
										<?php endif; ?>
										
										<?php if(!empty($gradiant_repeater_subtitle4)): ?>
											<li><?php echo esc_html($gradiant_repeater_subtitle4); ?></li>
										<?php endif; ?>
										
										<?php if(!empty($gradiant_repeater_subtitle5)): ?>
											<li><?php echo esc_html($gradiant_repeater_subtitle5); ?></li>
										<?php endif; ?>
									</ul>
								

								<?php if(!empty($gradiant_repeater_button)): ?>
									<a href="<?php echo esc_url($gradiant_repeater_link); ?>" class="av-btn av-btn-secondary av-btn-bubble"><?php echo esc_html($gradiant_repeater_button); ?> <i class="fa fa-arrow-right"></i> <span class="bubble_effect"><span class="circle top-left"></span> <span class="circle top-left"></span> <span class="circle top-left"></span> <span class="button effect-button"></span> <span class="circle bottom-right"></span> <span class="circle bottom-right"></span> <span class="circle bottom-right"></span></span></a>
								<?php endif; ?>
							</div>
							<?php if(!empty($gradiant_repeater_icon)): ?>
								<div class="modern-icon"><i class="fa <?php echo esc_attr($gradiant_repeater_icon); ?>"></i></div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php } } ?>	
		</div>
	</div>
	<div class="shape1 bg-elements"><img src="<?php echo esc_url(CLEVERFOX_PLUGIN_URL); ?>inc/gradiant/images/service/clipArt/shape1.png" alt="image"></div>
	<div class="shape2 bg-elements"><img src="<?php echo esc_url(CLEVERFOX_PLUGIN_URL); ?>inc/gradiant/images/service/clipArt/shape2.png" alt="image"></div>
	<div class="shape3 bg-elements"><img src="<?php echo esc_url(CLEVERFOX_PLUGIN_URL); ?>inc/gradiant/images/service/clipArt/shape3.png" alt="image"></div>
	<div class="shape4 bg-elements"><img src="<?php echo esc_url(CLEVERFOX_PLUGIN_URL); ?>inc/gradiant/images/service/clipArt/shape4.png" alt="image"></div>
</section>
<?php } ?>