<?php  
	$gradiant_colorflow_client_hs 				= get_theme_mod('client_hs','1');
	$gradiant_colorflow_client_title 			= get_theme_mod('client_title',__('We are <span class="primary-color">Working With</span>','clever-fox'));
	$gradiant_colorflow_client_description		= get_theme_mod('client_description',__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','clever-fox')); 
	$gradiant_colorflow_client_contents		= get_theme_mod('client_contents',gradiant_get_client_default());
	if($gradiant_colorflow_client_hs=='1'):
?>
<section id="client-section" class="client-section av-py-default client-home" data-roller="start:0.5">
	<div class="av-container">
		<?php if(!empty($gradiant_colorflow_client_title)  || !empty($gradiant_colorflow_client_description)): ?>
			<div class="av-columns-area">
				<div class="av-column-12">
					<div class="heading-default heading-white text-center wow fadeInUp">
						<?php if(!empty($gradiant_colorflow_client_title)): ?>
							<h3><?php echo wp_kses_post($gradiant_colorflow_client_title); ?></h3>
							<span class="separator"><span><span></span></span></span>
						<?php endif; ?>
						<?php if(!empty($gradiant_colorflow_client_description)): ?>
							<p><?php echo wp_kses_post($gradiant_colorflow_client_description); ?></p>
						<?php endif; ?>	
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="av-columns-area">
			<div class="av-column-12">
				<div class="partner-carousel owl-carousel owl-theme">
					<?php
						if ( ! empty( $gradiant_colorflow_client_contents ) ) {
						$gradiant_colorflow_client_contents = json_decode( $gradiant_colorflow_client_contents );
						foreach ( $gradiant_colorflow_client_contents as $gradiant_colorflow_client_item ) {
							$gradiant_colorflow_repeater_title = ! empty( $gradiant_colorflow_client_item->title ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_colorflow_client_item->title, 'Client section' ) : '';
							$gradiant_colorflow_repeater_subtitle = ! empty( $gradiant_colorflow_client_item->subtitle ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_colorflow_client_item->subtitle, 'Client section' ) : '';
							$gradiant_colorflow_repeater_link = ! empty( $gradiant_colorflow_client_item->link ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_colorflow_client_item->link, 'Client section' ) : '';
							$gradiant_colorflow_repeater_image = ! empty( $gradiant_colorflow_client_item->image_url ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_colorflow_client_item->image_url, 'Client section' ) : '';
					?>
						<div class="single-partner">
							<div class="inner-partner">
								<a href="<?php echo esc_url($gradiant_colorflow_repeater_link); ?>">
									<?php if(!empty($gradiant_colorflow_repeater_image)): ?>
										<img src="<?php echo esc_url($gradiant_colorflow_repeater_image); ?>">
									<?php endif; ?>
									<?php if(!empty($gradiant_colorflow_repeater_title) || !empty($gradiant_colorflow_repeater_subtitle)): ?>
										<span class="client-name"><?php echo esc_html($gradiant_colorflow_repeater_title); ?> <strong><?php echo esc_html($gradiant_colorflow_repeater_subtitle); ?></strong></span>
									<?php endif; ?>
								</a>
							</div>
						</div>
					<?php } } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>