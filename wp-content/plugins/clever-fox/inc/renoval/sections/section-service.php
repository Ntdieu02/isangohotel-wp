<?php 
	$renoval_service_subtitle		= get_theme_mod('service_subtitle',__('<h2>Outstanding</h2><div class="animation"><div class="first"><div>Service</div></div></div>','clever-fox'));
	$renoval_service_description	= get_theme_mod('service_description',__('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','clever-fox')); 
	$renoval_service_contents		= get_theme_mod('service_contents',renoval_get_service_default());
	$renoval_service_hs				= get_theme_mod('service_hs','1');
	if($renoval_service_hs == '1'):
?>	
<!-- Start: Service Section
=======================-->
<section id="service-section" class="service-section service-home wow fadeInUp">
	<div class="container">
		<?php if(!empty($renoval_service_title)  || !empty($renoval_service_subtitle) || !empty($renoval_service_description)): ?>
			<div class="section-title text-center">
				
				<?php if(!empty($renoval_service_subtitle)): ?>
					<div>
						<?php echo wp_kses_post($renoval_service_subtitle); ?>
					</div>
				<?php endif; ?>
				
				<?php if(!empty($renoval_service_description)): ?>
					<p>
						<?php echo wp_kses_post($renoval_service_description); ?>
					</p>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		
		<div class="row">
			<?php
				if ( ! empty( $renoval_service_contents ) ) {
				$renoval_service_contents = json_decode( $renoval_service_contents );
				foreach ( $renoval_service_contents as $renoval_service_item ) { 
					$renoval_repeater_image = ! empty( $renoval_service_item->image_url ) ? apply_filters( 'renoval_translate_single_string', $renoval_service_item->image_url, 'Service section' ) : '';
					$renoval_repeater_service_icon = ! empty( $renoval_service_item->icon_value) ? apply_filters( 'renoval_translate_single_string', $renoval_service_item->icon_value,'Service section' ) : '';
					$renoval_repeater_service_title = ! empty( $renoval_service_item->title ) ? apply_filters( 'renoval_translate_single_string', $renoval_service_item->title, 'Service section' ) : '';
					$renoval_repeater_service_text = ! empty( $renoval_service_item->text ) ? apply_filters( 'renoval_translate_single_string', $renoval_service_item->text, 'Service section' ) : '';
					$renoval_repeater_service_button = ! empty( $renoval_service_item->text2) ? apply_filters( 'renoval_translate_single_string', $renoval_service_item->text2,'Service section' ) : '';
					$renoval_repeater_service_link = ! empty( $renoval_service_item->link ) ? apply_filters( 'renoval_translate_single_string', $renoval_service_item->link, 'Service section' ) : '';
					$renoval_repeater_choice = ! empty( $renoval_service_item->choice ) ? apply_filters( 'renoval_translate_single_string', $renoval_service_item->choice, 'Service section' ) : '';
			
			?>
			<div class="col-lg-3 col-md-6">
				<div class="service-box">
					<?php if($renoval_repeater_choice =='customizer_repeater_image'): ?>
						<div class="service-icon">
							<img src="<?php echo esc_url($renoval_repeater_image); ?>" />
						</div>
					<?php else: ?>
						<?php if ( ! empty( $renoval_repeater_service_icon ) ) { ?>
							<div class="service-icon">
								<i class="fa <?php echo esc_attr($renoval_repeater_service_icon); ?>"></i>
							</div>
						<?php } ?>
					<?php endif; ?>
					
					<div class="service-content">
						<?php if ( ! empty( $renoval_repeater_service_title ) ) : ?>
							<h4>
								<?php echo esc_html( $renoval_repeater_service_title ); ?>
							</h4>
						<?php endif; ?>
						
						<?php if ( ! empty( $renoval_repeater_service_text ) ) : ?>
							<p>
								<?php echo esc_html( $renoval_repeater_service_text ); ?>
							</p>
						<?php endif; ?>	
						
						<?php if ( ! empty( $renoval_repeater_service_button ) && ! empty( $renoval_repeater_service_link ) ) : ?>
							<a href="<?php echo esc_url( $renoval_repeater_service_link ); ?>" class="main-button">
								<span>
									<?php echo esc_html( $renoval_repeater_service_button ); ?>
								</span> 
								<i class="fa fa-angle-right"></i>
							</a>
						<?php endif; ?>	
					</div>
					<div class="section-element-service">
						<img src="<?php echo esc_url(plugin_dir_url( dirname(__FILE__) ) . 'images/section-bg.png'); ?>" alt="<?php echo esc_attr( $renoval_repeater_service_title ); ?>"> 
					</div>
				</div>
			</div>	
			<?php } }?>
		</div>
	</div>
</section>
<!-- End: Service Section
=======================-->
<?php endif; ?>