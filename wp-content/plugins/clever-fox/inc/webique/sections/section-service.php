<?php  
	$webique_service_hs 			= get_theme_mod('service_hs','1');
	$webique_service_title 			= get_theme_mod('service_title',__('Our <span class="primary-color">Expertise</span>','clever-fox'));
	$webique_service_description	= get_theme_mod('service_description',__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','clever-fox')); 
	$webique_service_contents		= get_theme_mod('service_contents',webique_get_service_default());
	if($webique_service_hs=='1'){
?>	
<section id="service-section" class="service-section av-py-default service-home">
	<div class="av-container">
		<?php if(!empty($webique_service_title)  || !empty($webique_service_description)): ?>
			<div class="av-columns-area">
				<div class="av-column-12">
					<div class="heading-default text-center">
						<div class="title-container animation-style2">
							<div class="arrow-left"></div>
								<?php if(!empty($webique_service_title)): ?>
									<h1 class="title"><?php echo wp_kses_post($webique_service_title); ?></h1>				
								<?php endif; ?>
							<div class="arrow-right"></div>
						</div>
						<?php if(!empty($webique_service_description)): ?>
							<p><?php echo wp_kses_post($webique_service_description); ?></p>
						<?php endif; ?>	
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="av-columns-area service-contents">
			<?php
				if ( ! empty( $webique_service_contents ) ) {
				$webique_service_contents = json_decode( $webique_service_contents );
				foreach ( $webique_service_contents as $webique_service_item ) {
					$webique_repeater_title = ! empty( $webique_service_item->title ) ? apply_filters( 'webique_translate_single_string', $webique_service_item->title, 'Service section' ) : '';
					$webique_repeater_description = ! empty( $webique_service_item->description ) ? apply_filters( 'webique_translate_single_string', $webique_service_item->description, 'Service section' ) : '';
					$webique_repeater_button = ! empty( $webique_service_item->button ) ? apply_filters( 'webique_translate_single_string', $webique_service_item->button, 'Service section' ) : '';
					$webique_repeater_link = ! empty( $webique_service_item->button_link ) ? apply_filters( 'webique_translate_single_string', $webique_service_item->button_link, 'Service section' ) : '';
					$webique_repeater_newtab = ! empty( $webique_service_item->newtab ) ? apply_filters( 'webique_translate_single_string', $webique_service_item->newtab, 'Service section' ) : '';
					$webique_repeater_nofollow = ! empty( $webique_service_item->nofollow ) ? apply_filters( 'webique_translate_single_string', $webique_service_item->nofollow, 'Service section' ) : '';
					$webique_repeater_image = ! empty( $webique_service_item->image_url2 ) ? apply_filters( 'webique_translate_single_string', $webique_service_item->image_url2, 'Service section' ) : '';
					$webique_repeater_icon = ! empty( $webique_service_item->icon_value ) ? apply_filters( 'webique_translate_single_string', $webique_service_item->icon_value, 'Service section' ) : '';
			?>
				<div class="av-column-4 av-sm-column-6 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
					<div class="service-item tilt">
						
							<?php if(!empty($webique_repeater_image)): ?>
								<div class="service-overlay">
									<img src="<?php echo esc_url($webique_repeater_image); ?>">
								</div>
							<?php endif; ?>

							<div class="service-content">
								<?php if(!empty($webique_repeater_title)): ?>
									<h3><?php echo esc_html( $webique_repeater_title ); ?></h3>
								<?php endif; ?>
								
								<?php if(!empty($webique_repeater_description)): ?>
									<p><?php echo esc_html( $webique_repeater_description ); ?></p>
								<?php endif; ?>						

								<?php if(!empty($webique_repeater_button)): ?>								
									<a href="<?php echo esc_url($webique_repeater_link); ?>" class="av-btn av-btn-bubble" <?php if($webique_repeater_newtab =='yes') {echo 'target="_blank"'; } ?> rel="<?php if($webique_repeater_newtab =='yes') {echo 'noreferrer noopener'; } ?> <?php if($webique_repeater_nofollow =='yes') {echo 'nofollow'; } ?>" ><?php echo esc_html( $webique_repeater_button ); ?> <i class="fa fa-chevron-right"></i> </a>
								<?php endif; ?>
							<?php if(!empty($webique_repeater_icon)): ?>
								<div class="icon zig-zag"><i class="fa <?php echo esc_attr($webique_repeater_icon); ?>"></i></div>
							<?php endif; ?>
						</div>						
					</div>
				</div>
			<?php } } ?>	
		</div>
	</div>	
</section>
<?php } ?>