<?php  
	$nexcraft_bpo_info_hs 						= get_theme_mod('info_hs','1');
	$nexcraft_bpo_info		= get_theme_mod('info',nexcraft_get_info_default());	
	$nexcraft_bpo_info_column		= get_theme_mod('info_column','3');
	if($nexcraft_bpo_info_hs=='1'){
	$nexcraft_bpo_settings               = array('items'=>$nexcraft_bpo_info_column);
    wp_register_script('nexcraft-info',get_template_directory_uri().'/assets/js/homepage/info.js',array('jquery'),'6.9',true);
	wp_localize_script('nexcraft-info','info_setting',$nexcraft_bpo_settings);
    wp_enqueue_script('nexcraft-info');
		if ( ! empty( $nexcraft_bpo_info ) ) {
			$nexcraft_bpo_info = json_decode( $nexcraft_bpo_info );
?>
<!-- Info section -->
<div class="info-section nexcraft-info info-section-3" id="info-section">
    <div class="container">
        <div class="info-contents owl-carousel">
				<?php
					foreach ( $nexcraft_bpo_info as $nexcraft_bpo_info_item ) {
						$nexcraft_bpo_repeater_title = ! empty( $nexcraft_bpo_info_item->title ) ? apply_filters( 'nexcraft_translate_single_string', $nexcraft_bpo_info_item->title, 'Info section' ) : '';
						$nexcraft_bpo_repeater_text2 = ! empty( $nexcraft_bpo_info_item->text2 ) ? apply_filters( 'nexcraft_translate_single_string', $nexcraft_bpo_info_item->text2, 'Info section' ) : '';
						$nexcraft_bpo_repeater_icon = ! empty( $nexcraft_bpo_info_item->icon_value ) ? apply_filters( 'nexcraft_translate_single_string', $nexcraft_bpo_info_item->icon_value, 'Info section' ) : '';
						$nexcraft_bpo_repeater_choice = ! empty( $nexcraft_bpo_info_item->choice ) ? apply_filters( 'nexcraft_translate_single_string	', $nexcraft_bpo_info_item->choice, 'Info section' ) : '';
				?>
            <div class="">
                <div class="info-first ">
                    <aside class="widget widget-contact">
                        <div class="contact-area">
                            <div class="contact-icon">
                                <i class="fas <?php echo esc_attr($nexcraft_bpo_repeater_icon); ?>"></i>
                            </div>
                            <div class="contact-info">
								<?php if(!empty($nexcraft_bpo_repeater_title)): ?>
									<h4>
										<?php if($nexcraft_bpo_repeater_title): echo esc_html($nexcraft_bpo_repeater_title); endif; ?>									
									</h4>
								<?php endif; ?>	
								<?php if(!empty($nexcraft_bpo_repeater_text2)): ?>
									<span><?php if($nexcraft_bpo_repeater_text2): echo esc_html($nexcraft_bpo_repeater_text2); endif; ?></span>
								<?php endif; ?>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
			<?php } ?>
        </div>
    </div>
</div>
	<?php } }?>
<!-- Info Section end -->