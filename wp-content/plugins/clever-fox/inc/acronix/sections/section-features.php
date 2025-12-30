<?php 
	$accron_acronix_features_hs			= get_theme_mod('feature_hs','1');
	$accron_acronix_features_title 			= get_theme_mod('features_title',__('<span class=\'primary-color\'>What</span> We Do','clever-fox'));
	$accron_acronix_features_subtitle			= get_theme_mod('features_subtitle',__('Outstanding Features','clever-fox')); 
	$accron_acronix_features_desc				= get_theme_mod('features_desc',__('There are many variations of passages of Lorem Ipsum available.','clever-fox')); 
	$accron_acronix_features_contents			= get_theme_mod('features_contents',accron_get_features_default());
	//$accron_acronix_features_sec_column			= get_theme_mod('features_sec_column','3'); 	
	if($accron_acronix_features_hs=='1'){
?>	
	<!-- features -->
<section class="feature-section feature-two  features-home">
    <div class="container">
        <?php if(!empty($accron_acronix_features_title)  || !empty($$accron_acronix_features_subtitle) || !empty($accron_acronix_features_desc)): ?>
			<div class="section-title col-lg-6 mx-auto">
					
				<?php if(!empty($accron_acronix_features_title)): ?>
					<h2 class="section-title-heading">
						<?php echo wp_kses_post($accron_acronix_features_title); ?>
					</h2>
				<?php endif; ?>
				
				<?php if(!empty($accron_acronix_features_subtitle)): ?>
					<span class="sub-title">
						<?php echo wp_kses_post($accron_acronix_features_subtitle); ?>
					</span>
				<?php endif; ?>
				
				<?php if(!empty($accron_acronix_features_desc)): ?>
					<p>
						<?php echo wp_kses_post($accron_acronix_features_desc); ?>
					</p>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		
        <div class="row">
			<?php
				if ( ! empty( $accron_acronix_features_contents ) ) {
				$accron_acronix_features_contents = json_decode( $accron_acronix_features_contents );
				foreach ( $accron_acronix_features_contents as $accron_acronix_features_item ) {
					$accron_acronix_repeater_title = ! empty( $accron_acronix_features_item->title ) ? apply_filters( 'accron_acronix_translate_single_string', $accron_acronix_features_item->title, 'Features section' ) : '';
					$accron_acronix_repeater_link = ! empty( $accron_acronix_features_item->link ) ? apply_filters( 'accron_acronix_translate_single_string', $accron_acronix_features_item->link, 'Features section' ) : '';
					$accron_acronix_repeater_image = ! empty( $accron_acronix_features_item->image_url ) ? apply_filters( 'accron_acronix_translate_single_string', $accron_acronix_features_item->image_url, 'Features section' ) : '';
					$accron_acronix_repeater_icon = ! empty( $accron_acronix_features_item->icon_value ) ? apply_filters( 'accron_acronix_translate_single_string', $accron_acronix_features_item->icon_value, 'Features section' ) : '';
					$accron_acronix_repeater_choice = ! empty( $accron_acronix_features_item->choice ) ? apply_filters( 'accron_acronix_translate_single_string', $accron_acronix_features_item->choice, 'Features section' ) : '';
			?>
				<div class="col-lg-3 col-md-6 col-sm-6" data-tilt style="transform-style: preserve-3d;">
					<div class="feature-item">
						<div class="feature-inner">
							<?php if(!empty($accron_acronix_repeater_title)): ?>
								<div class="feature-content">
									<h3>
										<?php echo esc_html($accron_acronix_repeater_title); ?>
									</h3>
								</div>
							<?php endif; ?>
							
							<?php if ( $accron_acronix_repeater_choice =='customizer_repeater_image' ) { ?>
								<div class="feature-icon">
									<img src="<?php echo esc_url($accron_acronix_repeater_image); ?>" />
								</div>
							<?php } elseif ( ! empty( $accron_acronix_repeater_icon ) ) { ?>
								<div class="feature-icon">
									<i class="fa <?php echo esc_attr($accron_acronix_repeater_icon); ?>"></i>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } } ?>
        </div>
    </div>
</section>
<!-- features end -->
<?php } ?>