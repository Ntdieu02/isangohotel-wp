<?php
	if ( ! function_exists( 'avril_above_header' ) ) :
	function avril_above_header() {
	?>
	<?php 
	$avril_aviser_hide_show_social_icon 		= get_theme_mod( 'hide_show_social_icon','1'); 
	$avril_aviser_social_icons 				= get_theme_mod( 'social_icons',avril_get_social_icon_default());
	$avril_aviser_hs_hdr_time 				= get_theme_mod( 'hs_hdr_time','1');
	$avril_aviser_hdr_time_icon 				= get_theme_mod( 'hdr_time_icon','fa-clock-o');
	$avril_aviser_hdr_time_title 			= get_theme_mod( 'hdr_time_title',__('Opening Hours - 10 Am to 6 PM','clever-fox'));
	$avril_aviser_hs_hdr_welcome 			= get_theme_mod( 'hs_hdr_welcome','1');
	$avril_aviser_hdr_welcome_icon 			= get_theme_mod( 'hdr_welcome_icon','fa-building-o');
	$avril_aviser_hdr_welcome_ttl 			= get_theme_mod( 'hdr_welcome_ttl',__('Welcome to our Business Agency','clever-fox'));
?>
        <!--===// Start: Header Above
        =================================-->
			<div id="above-header" class="header-above-info d-av-block d-none wow fadeInDown">
				<div class="header-widget">
					<div class="av-container">
						<div class="av-columns-area">
								<div class="av-column-5">
									<div class="widget-left text-av-left text-center">
										<?php if($avril_aviser_hide_show_social_icon == '1') { ?>
											<aside class="widget widget_social_widget">
												<ul>
													<?php
														$avril_aviser_social_icons = json_decode($avril_aviser_social_icons);
														if( $avril_aviser_social_icons!='' )
														{
														foreach($avril_aviser_social_icons as $avril_aviser_social_item){	
														$avril_aviser_repeater_social_icon = ! empty( $avril_aviser_social_item->icon_value ) ? apply_filters( 'avril_translate_single_string', $avril_aviser_social_item->icon_value, 'Header section' ) : '';	
														$avril_aviser_repeater_social_link = ! empty( $avril_aviser_social_item->link ) ? apply_filters( 'avril_translate_single_string', $avril_aviser_social_item->link, 'Header section' ) : '';
													?>
														<li><a href="<?php echo esc_url( $avril_aviser_repeater_social_link ); ?>"><i class="fa <?php echo esc_attr( $avril_aviser_repeater_social_icon ); ?>"></i></a></li>
													<?php }} ?>
												</ul>
											</aside>
										<?php } ?>
									</div>
								</div>
								<div class="av-column-7">
									<div class="widget-right text-av-right text-center"> 
										<?php if($avril_aviser_hs_hdr_welcome == '1') { ?>
											<aside class="widget widget-contact wgt-6">
												<div class="contact-area">
													<div class="contact-icon">
													   <i class="fa <?php echo  esc_attr($avril_aviser_hdr_welcome_icon); ?>"></i>
													</div>
													<a href="javascript:void(0)" class="contact-info">
														<span class="text"><?php echo esc_html($avril_aviser_hdr_welcome_ttl); ?></span>
													</a>
												</div>
											</aside>
										<?php } ?>
										<?php if($avril_aviser_hs_hdr_time == '1') { ?>
											<aside class="widget widget-contact wgt-5">
												<div class="contact-area">
													<div class="contact-icon">
													   <i class="fa <?php echo  esc_attr($avril_aviser_hdr_time_icon); ?>"></i>
													</div>
													<a href="javascript:void(0)" class="contact-info">
														<span class="text"><?php echo esc_html($avril_aviser_hdr_time_title); ?></span>
													</a>
												</div>
											</aside>
										<?php } ?>
									</div>	
								</div>
						</div>
					</div>
				</div>
			</div>	
        <!--===// End: Header Top
        =================================-->   
	<?php 
} endif;
add_action('avril_above_header', 'avril_above_header');
?>
