<?php  
	$corpex_info_contents 		= get_theme_mod('info_contents',corpex_get_info_default());
	$corpex_hs_info				= get_theme_mod('hs_info','1');
	if( $corpex_hs_info == '1' ) {
?>	
<!-- info section -->
<section class="info-section">
        <div class="container">
            <div class="row">
				<?php
					if (  !empty( $corpex_info_contents ) ) {
					$corpex_info_contents = json_decode( $corpex_info_contents );
					foreach ( $corpex_info_contents as $corpex_info_item ) {
						$corpex_repeater_title = ! empty( $corpex_info_item->title ) ? apply_filters( 'corpex_translate_single_string', $corpex_info_item->title, 'Info section' ) : '';
						$corpex_repeater_text = ! empty( $corpex_info_item->text ) ? apply_filters( 'corpex_translate_single_string', $corpex_info_item->text, 'Info section' ) : '';
						$corpex_repeater_link = ! empty( $corpex_info_item->link ) ? apply_filters( 'corpex_translate_single_string', $corpex_info_item->link, 'Info section' ) : '';
						$corpex_repeater_image = ! empty( $corpex_info_item->image_url ) ? apply_filters( 'corpex_translate_single_string', $corpex_info_item->image_url, 'Info section' ) : '';
						$corpex_repeater_icon = ! empty( $corpex_info_item->icon_value ) ? apply_filters( 'corpex_translate_single_string', $corpex_info_item->icon_value, 'Info section' ) : '';
						$corpex_repeater_choice = ! empty( $corpex_info_item->choice ) ? apply_filters( 'corpex_translate_single_string', $corpex_info_item->choice, 'Info section' ) : '';
				?>
					<div class="col-lg-4 col-md-6">
						<div class="info-item">
							<aside class="widget widget-contact">
								<div class="contact-area">
									<div class="contact-info">
										<p class="text">
											<?php if(!empty($corpex_repeater_title)): ?>
												<a href="<?php echo esc_url($corpex_repeater_link); ?>">
													<?php echo esc_html($corpex_repeater_title); ?>													
												</a>
											<?php endif; ?>
											
											<span><?php echo esc_html($corpex_repeater_text); ?></span>
										</p>
									</div>
									
									<?php if($corpex_repeater_choice =='customizer_repeater_image'): ?>
										<div class="contact-icon">
											<img src="<?php echo esc_url($corpex_repeater_image); ?>" />
										</div>
									<?php else: ?>
										<div class="contact-icon">
											<i class="fa <?php echo esc_attr($corpex_repeater_icon); ?>"></i>
										</div>
									<?php endif; ?>
								</div>
							</aside>
						</div>
					</div>
				<?php } } ?>
			</div>
        </div>
</section>
<?php } ?>
<!-- info section end -->