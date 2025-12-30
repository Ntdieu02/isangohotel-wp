<?php  
	$renoval_eractor_client_subtitle		= get_theme_mod('client_subtitle',__('<h2>Outstanding</h2><div class="animation"><div class="first"><div>Sponsor</div></div></div>','clever-fox'));
	$renoval_eractor_client_description		= get_theme_mod('client_description',__('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','clever-fox'));
	$renoval_eractor_client_contents		= get_theme_mod('client_contents',renoval_get_client_default());	
?>
	<!-- Start: Sponsor Section
	=======================-->
	<section id="sponsor-section" class="wow fadeInUp">
		<div class="container">
			<?php if(!empty($renoval_eractor_client_subtitle) || !empty($renoval_eractor_client_description)): ?>
				<div class="row">
					<div class="section-title text-center">
						
						<?php if(!empty($renoval_eractor_client_subtitle)): ?>
							<div>
								<?php echo wp_kses_post($renoval_eractor_client_subtitle); ?>
							</div>
						<?php endif; ?>
						
						<?php if(!empty($renoval_eractor_client_description)): ?>
							<p>
								<?php echo wp_kses_post($renoval_eractor_client_description); ?>
							</p>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
			
			<?php
				if ( ! empty( $renoval_eractor_client_contents ) ) {
				$renoval_eractor_client_contents = json_decode( $renoval_eractor_client_contents );
			?>
				<div class="row">
					<div class="spons">
						<div class="row">
						<?php
							foreach ( $renoval_eractor_client_contents as $renoval_eractor_client_item ) {
								$renoval_eractor_repeater_link = ! empty( $renoval_eractor_client_item->link ) ? apply_filters( 'renoval_translate_single_string', $renoval_eractor_client_item->link, 'Client section' ) : '';
								$renoval_eractor_repeater_image = ! empty( $renoval_eractor_client_item->image_url ) ? apply_filters( 'renoval_translate_single_string', $renoval_eractor_client_item->image_url, 'Client section' ) : '';
								
							if(!empty($renoval_eractor_repeater_image) || !empty($renoval_eractor_repeater_link)):
						?>
						<div class="col-lg col-md-4 col-sm-6">
							<div class="sponsor-image">
								<a href="<?php echo esc_url($renoval_eractor_repeater_link); ?>">
									<img src="<?php echo esc_url($renoval_eractor_repeater_image); ?>" alt="<?php echo esc_attr__('Clients Image','clever-fox'); ?>">
								</a>
								<?php  ?>
							</div>
						</div>	
						<?php 
							endif;
							} 
						?>	
					</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</section>
	<!-- End: Sponsor Section
	=======================-->