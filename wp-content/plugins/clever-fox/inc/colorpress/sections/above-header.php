<?php
	if ( ! function_exists( 'gradiant_above_header' ) ) :
	function gradiant_above_header() {
		$gradiant_colorpress_hs_hdr_icon_menu 			= get_theme_mod( 'hs_hdr_icon_menu','1');
		$gradiant_colorpress_hdr_top_icon_menu 			= get_theme_mod( 'hdr_top_icon_menu',gradiant_get_icon_menu_default());
		$gradiant_colorpress_hide_show_cntct_details 	= get_theme_mod( 'hide_show_cntct_details','1'); 
		$gradiant_colorpress_hide_show_email_details 	= get_theme_mod( 'hide_show_email_details','1');
		$gradiant_colorpress_hide_show_mbl_details 		= get_theme_mod( 'hide_show_mbl_details','1');
		if($gradiant_colorpress_hs_hdr_icon_menu =='1' || $gradiant_colorpress_hide_show_cntct_details =='1' || $gradiant_colorpress_hide_show_email_details =='1' || $gradiant_colorpress_hide_show_mbl_details =='1'):
		?>
			<div id="above-header" class="header-above-info d-av-block d-none">
				<div class="header-widget">
					<div class="av-container">
						<div class="av-columns-area">
							<div class="av-column-6">
								<div class="widget-left text-av-left text-center">
									<?php if($gradiant_colorpress_hs_hdr_icon_menu =='1'): ?>
										<aside class="widget widget_nav_menu">
											<div class="menu-pages-container">
												<ul id="menu-footer-menu" class="menu">
													<?php
														if ( ! empty( $gradiant_colorpress_hdr_top_icon_menu ) ) {
														$gradiant_colorpress_hdr_top_icon_menu = json_decode( $gradiant_colorpress_hdr_top_icon_menu );
														foreach ( $gradiant_colorpress_hdr_top_icon_menu as $gradiant_colorpress_icon_menu_item ) {
															$gradiant_colorpress_title = ! empty( $gradiant_colorpress_icon_menu_item->title ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_colorpress_icon_menu_item->title, 'Header section' ) : '';
															$gradiant_colorpress_icon = ! empty( $gradiant_colorpress_icon_menu_item->icon_value ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_colorpress_icon_menu_item->icon_value, 'Header section' ) : '';
															$gradiant_colorpress_link = ! empty( $gradiant_colorpress_icon_menu_item->link ) ? apply_filters( 'gradiant_translate_single_string', $gradiant_colorpress_icon_menu_item->link, 'Header section' ) : '';
													?>
														<li class="menu-item"><a href="<?php echo esc_url($gradiant_colorpress_link); ?>" class="nav-link"><i class="fa <?php echo esc_attr($gradiant_colorpress_icon); ?>"></i> <?php echo esc_html($gradiant_colorpress_title); ?></a></li>
												 <?php } } ?>
												</ul>   
											</div>
										</aside>
									<?php endif; ?>	
								</div>
							</div>
							<div class="av-column-6">
								<div class="widget-right text-av-right text-center">                                
									<?php do_action('gradiant_abv_hdr_contact_info'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif; 
} endif;
add_action('gradiant_above_header', 'gradiant_above_header');
?>
