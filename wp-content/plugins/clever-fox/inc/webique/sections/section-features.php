<?php  
	$webique_features_hs 				= get_theme_mod('features_hs','1');
	$webique_features_contents			= get_theme_mod('features_contents',webique_get_features_default());
	$webique_features_sec_column		= get_theme_mod('features_sec_column','6'); 	
	$webique_features_right_img			= get_theme_mod('features_right_img',get_template_directory_uri() .'/assets/images/features/features.png'); 
	if($webique_features_hs=='1'){
?>	
<section id="features-section" class="features-section bg-primary-light av-py-default features-home shapes-section">
	<div class="av-container">		
		<div class="av-columns-area">
			<div class="av-column-6">
				<div class="av-columns-area">
				<?php
				if ( ! empty( $webique_features_contents ) ) {
				$webique_features_contents = json_decode( $webique_features_contents );
				foreach ( $webique_features_contents as $webique_features_item ) {
					$webique_repeater_title = ! empty( $webique_features_item->title ) ? apply_filters( 'webique_translate_single_string', $webique_features_item->title, 'Features section' ) : '';
					$webique_repeater_icon = ! empty( $webique_features_item->icon_value ) ? apply_filters( 'webique_translate_single_string', $webique_features_item->icon_value, 'Features section' ) : '';
					
			?>
				<div class="av-column-6 av-sm-column-6 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="features-item">
							<div class="features-inner">
								<div class="features-icon wave-effect">
									<i class="fa <?php echo esc_attr($webique_repeater_icon); ?>"></i>
								</div>
								<div class="features-content">
									<h5 class="features-title"><?php echo esc_html($webique_repeater_title); ?></h5>
								</div>
							</div>
						</div>
					</div>
				<?php }} ?>
				</div>
			</div>
			<div class="av-column-6 featuresbgwrapper">
				<div class="features-image-wrap">
					<div class="features-image">
						<img src="<?php echo esc_url($webique_features_right_img); ?>" alt="Feature Image">
					</div>
				</div>
			</div>			
		</div>
	</div>
</section>
<?php } ?>