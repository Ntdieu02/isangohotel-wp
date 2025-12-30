<?php  
	$webique_client_hs 				= get_theme_mod('client_hs','1');
	$webique_client_contents		= get_theme_mod('client_contents',webique_get_client_default());
	if($webique_client_hs=='1'){	
?>
<section id="client-section" class="client-section client-home shape3-section" data-roller="start:0.5">
	<div class="av-container">		
		<div class="av-columns-area">
			<div class="av-column-12 client-inner">
				<div class="client-slider owl-carousel" data-cursor-type="text">
					<?php
						if ( ! empty( $webique_client_contents ) ) {
						$webique_client_contents = json_decode( $webique_client_contents );
						foreach ( $webique_client_contents as $webique_client_item ) {							
							$webique_repeater_link = ! empty( $webique_client_item->link ) ? apply_filters( 'webique_translate_single_string', $webique_client_item->link, 'Client section' ) : '';
							$webique_repeater_image = ! empty( $webique_client_item->image_url ) ? apply_filters( 'webique_translate_single_string', $webique_client_item->image_url, 'Client section' ) : '';
							$webique_repeater_newtab = ! empty( $webique_client_item->newtab ) ? apply_filters( 'webique_translate_single_string', $webique_client_item->newtab, 'Client section' ) : '';
							$webique_repeater_nofollow = ! empty( $webique_client_item->nofollow ) ? apply_filters( 'webique_translate_single_string', $webique_client_item->nofollow, 'Client section' ) : '';
					?>
						<div class="client-item wow fadeInUp bubbly-effect" data-wow-delay="0ms" data-wow-duration="1500ms">
							<a href="<?php echo esc_url($webique_repeater_link); ?>" <?php if($webique_repeater_newtab =='yes') {echo 'target="_blank"'; } ?> rel="<?php if($webique_repeater_newtab =='yes') {echo 'noreferrer noopener'; } ?> <?php if($webique_repeater_nofollow =='yes') {echo 'nofollow'; } ?>">
								<?php if(!empty($webique_repeater_image)): ?>
									<img src="<?php echo esc_url($webique_repeater_image); ?>">
								<?php endif; ?>
							</a>
						</div>
					<?php } } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php } ?>