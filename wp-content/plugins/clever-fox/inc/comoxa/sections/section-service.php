<?php  
	$gradiant_comoxa_service_hs 			= get_theme_mod('service_hs','1');
	$gradiant_comoxa_service_title 			= get_theme_mod('service_title',__('Our <span class="primary-color">Expertise</span>','clever-fox'));
	$gradiant_comoxa_service_description	= get_theme_mod('service_description',__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','clever-fox')); 
	$gradiant_comoxa_service_contents		= get_theme_mod('service_contents',gradiant_get_service_default());
	if($gradiant_comoxa_service_hs=='1'){
?>	
<section id="features-section" class="features-section av-py-default shapes-section service-home">
	<div class="av-container">
		<?php if(!empty($gradiant_comoxa_service_title)  || !empty($gradiant_comoxa_service_description)): ?>
			<div class="av-columns-area">
				<div class="av-column-12">
					<div class="heading-default text-center wow fadeInUp">
						<?php if(!empty($gradiant_comoxa_service_title)): ?>
							<h3><?php echo wp_kses_post($gradiant_comoxa_service_title); ?></h3>
							<span class="separator"><span><span></span></span></span>
						<?php endif; ?>
						<?php if(!empty($gradiant_comoxa_service_description)): ?>
							<p><?php echo wp_kses_post($gradiant_comoxa_service_description); ?></p>
						<?php endif; ?>	
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="av-columns-area wow fadeInUp service-contents">
			<?php
				if ( ! empty( $gradiant_comoxa_service_contents ) ) {
				$gradiant_comoxa_service_contents = json_decode( $gradiant_comoxa_service_contents );
				foreach ( $gradiant_comoxa_service_contents as $gradiant_comoxa_service_item ) {
					$gradiant_comoxa_repeater_title = ! empty( $gradiant_comoxa_service_item->title ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_comoxa_service_item->title, 'Service section' ) : '';
					$gradiant_comoxa_repeater_text = ! empty( $gradiant_comoxa_service_item->text ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_comoxa_service_item->text, 'Service section' ) : '';
					$gradiant_comoxa_repeater_button = ! empty( $gradiant_comoxa_service_item->text2 ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_comoxa_service_item->text2, 'Service section' ) : '';
					$gradiant_comoxa_repeater_link = ! empty( $gradiant_comoxa_service_item->link ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_comoxa_service_item->link, 'Service section' ) : '';
					$gradiant_comoxa_repeater_image = ! empty( $gradiant_comoxa_service_item->image_url ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_comoxa_service_item->image_url, 'Service section' ) : '';
					$gradiant_comoxa_repeater_icon = ! empty( $gradiant_comoxa_service_item->icon_value ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_comoxa_service_item->icon_value, 'Service section' ) : '';
			?>
			<div class="av-column-4 av-sm-column-6 tilter">
				<div class="tilter__figure">
					<div class="features-item">
						<div class="features-inner tilter__caption">
							<?php if(!empty($gradiant_comoxa_repeater_icon)): ?>
								<div class="features-icon">
									<i class="fa <?php echo esc_attr($gradiant_comoxa_repeater_icon); ?>"></i>
								</div>
							<?php else: ?>	
								<div class="features-icon">
									<img src="<?php echo esc_url($gradiant_comoxa_repeater_image); ?>" />
								</div>
							<?php endif; ?>

							<?php if(!empty($gradiant_comoxa_repeater_title)  || !empty($gradiant_comoxa_repeater_text)): ?>
								<div class="features-content">
									<h6 class="features-title"><a href="<?php echo esc_url($gradiant_comoxa_repeater_link); ?>"><?php echo esc_html($gradiant_comoxa_repeater_title); ?></a></h6>
									<p><?php echo esc_html($gradiant_comoxa_repeater_text); ?></p>
								</div>
							<?php endif; ?>

							<?php if(!empty($icon)): ?>
								<div class="modern-icon"><i class="fa <?php echo esc_attr($gradiant_comoxa_repeater_icon); ?>"></i></div>
							<?php endif; ?>
						</div>
						<div class="tilter__deco--lines"></div>
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