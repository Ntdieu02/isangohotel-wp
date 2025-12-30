<?php
	if ( ! function_exists( 'gradiant_above_footer' ) ) :
	function gradiant_above_footer() {
		$gradiant_hs_above_footer		= get_theme_mod('hs_above_footer','1'); 
			$gradiant_footer_above_content	= get_theme_mod('footer_above_content',gradiant_get_footer_above_default());
			if ($gradiant_hs_above_footer == '1') {
		?>
			<div class="footer-above">
				<div class="av-container">
					<div class="av-columns-area">
						<?php
							if ( ! empty( $gradiant_footer_above_content ) ) {
							$gradiant_footer_above_content = json_decode( $gradiant_footer_above_content );
							foreach ( $gradiant_footer_above_content as $gradiant_footer_item ) {
								$gradiant_repeater_title = ! empty( $gradiant_footer_item->title ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_footer_item->title, 'footer section' ) : '';
								$gradiant_repeater_text = ! empty( $gradiant_footer_item->text ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_footer_item->text, 'footer section' ) : '';
								$gradiant_repeater_choice = ! empty( $gradiant_footer_item->choice ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_footer_item->choice, 'footer section' ) : '';
								$gradiant_repeater_icon = ! empty( $gradiant_footer_item->icon_value ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_footer_item->icon_value, 'footer section' ) : '';
								$gradiant_repeater_link = ! empty( $gradiant_footer_item->link ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_footer_item->link, 'footer section' ) : '';
						?>
							<div class="av-column-4 av-sm-column-6">
								<aside class="widget widget-contact">
									<div class="contact-area">
										<?php if(!empty($gradiant_repeater_icon)): ?>
											<div class="contact-icon"><i class="fa <?php echo esc_attr($gradiant_repeater_icon); ?>"></i></div>
										<?php endif; ?>
										
										<?php if(!empty($gradiant_repeater_title)  || !empty($gradiant_repeater_text)): ?>
											<a href="<?php echo esc_url($gradiant_repeater_link); ?>" class="contact-info">
												<span class="text"><?php echo esc_html($gradiant_repeater_title); ?></span>
												<span class="title"><?php echo esc_html($gradiant_repeater_text); ?></span>
											</a>
										<?php endif; ?>	
									</div>
								</aside>
							</div>
						<?php }}?>
					</div>
				</div>
			</div>
		<?php } 
} endif;
add_action('gradiant_above_footer', 'gradiant_above_footer');
?>
