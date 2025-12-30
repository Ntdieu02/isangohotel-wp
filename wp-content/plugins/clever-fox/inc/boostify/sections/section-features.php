<?php  
if ( ! function_exists( 'cleverfox_boostify_lite_features' ) ) :
	function cleverfox_boostify_lite_features() {
	$boostify_hs_features 			= get_theme_mod('hs_features','1');
	$boostify_features_title			= get_theme_mod('feature_title',__('Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Features</b>                                   <b>Features</b><b>Features</b></span></span>','clever-fox'));
	$boostify_features_description	= get_theme_mod('feature_description',__('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','clever-fox'));
	$boostify_features_contents 		= get_theme_mod('features_contents',boostify_get_features_default());
	if($boostify_hs_features=='1'){
?>
 <section id="our-feature" class="our-feature home-feature section-padding-top">
	<div class="container">
		<?php if ( ! empty( $boostify_features_title )  || ! empty( $boostify_features_description )) : ?>
			<div class="row">
				<div class="col-lg-6 offset-lg-3">                    
					<div class="section-header text-center">
						<?php if ( ! empty( $boostify_features_title ) ) : ?>
							<h2><?php echo wp_kses_post($boostify_features_title); ?></h2>
						<?php endif; ?>	
						
						<?php if ( ! empty( $boostify_features_description ) ) : ?>		
							<p><?php echo wp_kses_post($boostify_features_description); ?></p>    
						<?php endif; ?>	
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="row feature-contents">
			<?php
				if ( ! empty( $boostify_features_contents ) ) {
				$boostify_features_contents = json_decode( $boostify_features_contents );
				foreach ( $boostify_features_contents as $boostify_features_item ) {
					$boostify_repeater_title = ! empty( $boostify_features_item->title ) ? apply_filters( 'boostify_translate_single_string', $boostify_features_item->title, 'Features section' ) : '';
					$boostify_repeater_text = ! empty( $boostify_features_item->text ) ? apply_filters( 'boostify_translate_single_string', $boostify_features_item->text, 'Features section' ) : '';
					$boostify_repeater_link = ! empty( $boostify_features_item->link ) ? apply_filters( 'boostify_translate_single_string', $boostify_features_item->link, 'Features section' ) : '';
					$boostify_repeater_icon = ! empty( $boostify_features_item->icon_value) ? apply_filters( 'boostify_translate_single_string', $boostify_features_item->icon_value,'Features section' ) : '';
					$boostify_repeater_image = ! empty( $boostify_features_item->image_url ) ? apply_filters( 'boostify_translate_single_string', $boostify_features_item->image_url, 'Features section' ) : '';
			?>
				<div class="col-xl col-lg-3 col-md-4 col-sm-6 col-12 mb-xl-4 mb-4">
					<div class="features-box">
						<figure>
							<?php if(!empty($boostify_repeater_image)):?>
								<img src="<?php echo esc_url($boostify_repeater_image); ?>" alt="">							
							<?php endif; ?>	
							
							<figcaption>
								<div class="inner-text">
									<?php if(!empty($boostify_repeater_icon)):?>
										<i class="fa <?php echo esc_attr($boostify_repeater_icon); ?>"></i>
									<?php endif; ?>	
									
									<?php if(!empty($boostify_repeater_title)):?>
										<h4><a href="<?php echo esc_url($boostify_repeater_link); ?>"><?php echo esc_html($boostify_repeater_title); ?></a></h4>
									<?php endif; ?>
									
									<?php if(!empty($boostify_repeater_text)):?>
										<p><?php echo esc_html($boostify_repeater_text); ?></p>
									<?php endif; ?>
								</div>
							</figcaption>
						</figure>
					</div>
				</div>
			<?php } } ?>
		</div>
	</div>
</section>
<?php	
	}}
endif;
if ( function_exists( 'cleverfox_boostify_lite_features' ) ) {
$cleverfox_section_priority = apply_filters( 'boostify_section_priority', 13, 'cleverfox_boostify_lite_features' );
add_action( 'boostify_sections', 'cleverfox_boostify_lite_features', absint( $cleverfox_section_priority ) );
}