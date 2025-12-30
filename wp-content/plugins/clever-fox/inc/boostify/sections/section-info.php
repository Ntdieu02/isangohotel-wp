<?php  
if ( ! function_exists( 'cleverfox_boostify_lite_info' ) ) :
	function cleverfox_boostify_lite_info() {
	$boostify_hs_info 			= get_theme_mod('hs_info','1');
	$boostify_info_contents 		= get_theme_mod('info_contents',boostify_get_info_default());
	if($boostify_hs_info == '1'){
?>	
 <section id="contact-info-section" class="contact-info-section">
	<div class="container">
		<div class="row">
			<?php
				if ( ! empty( $boostify_info_contents ) ) {
				$boostify_info_contents = json_decode( $boostify_info_contents );
				foreach ( $boostify_info_contents as $boostify_slide_item ) {
					$boostify_repeater_title = ! empty( $boostify_slide_item->title ) ? apply_filters( 'boostify_translate_single_string', $boostify_slide_item->title, 'Info section' ) : '';
					$boostify_repeater_subtitle = ! empty( $boostify_slide_item->subtitle ) ? apply_filters( 'boostify_translate_single_string', $boostify_slide_item->subtitle, 'Info section' ) : '';
					$boostify_repeater_link = ! empty( $boostify_slide_item->link ) ? apply_filters( 'boostify_translate_single_string', $boostify_slide_item->link, 'Info section' ) : '';
					$boostify_repeater_icon = ! empty( $boostify_slide_item->icon_value) ? apply_filters( 'boostify_translate_single_string', $boostify_slide_item->icon_value,'Info section' ) : '';
			?>
				<div class="col-lg-3 col-sm-6 col-12">
					<div class="inner-content">
						<div class="widget-contact">
							<div class="contact-area">
								<?php if(!empty($boostify_repeater_icon) || !empty($boostify_repeater_image)):?>
									<div class="contact-icon">
										<div class="contact-corn">
											<?php if(!empty($boostify_repeater_icon)):?>
												<i class="fa <?php echo esc_attr($boostify_repeater_icon); ?>"></i>
											<?php endif; ?>	
										</div>
									</div>
								<?php endif; ?>
								<?php if(!empty($boostify_repeater_title) || !empty($boostify_repeater_subtitle)):?>
									<div class="contact-info">
										<?php if(!empty($boostify_repeater_title)):?>
											<h6><a href="<?php echo esc_url($boostify_repeater_link); ?>"><?php echo esc_html($boostify_repeater_title); ?></a></h6>
										<?php endif; ?>
										
										<?php if(!empty($boostify_repeater_subtitle)):?>
											<p><a href="<?php echo esc_url($boostify_repeater_link); ?>"><?php echo esc_html($boostify_repeater_subtitle); ?></a></p>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			<?php } } ?>
		</div>
	</div>
</section>
<?php	
	}}
endif;
if ( function_exists( 'cleverfox_boostify_lite_info' ) ) {
$cleverfox_section_priority = apply_filters( 'boostify_section_priority', 12, 'cleverfox_boostify_lite_info' );
add_action( 'boostify_sections', 'cleverfox_boostify_lite_info', absint( $cleverfox_section_priority ) );
}