<?php
	if ( ! function_exists( 'avril_above_header' ) ) :
	function avril_above_header() {
	?>
	<?php 
	$avril_ampark_hide_show_social_icon 		= get_theme_mod( 'hide_show_social_icon','1'); 
	$avril_ampark_social_icons 				= get_theme_mod( 'social_icons',avril_get_social_icon_default());
?>
        <!--===// Start: Header Above
        =================================-->
			<div id="above-header" class="header-above-info d-av-block d-none wow fadeInDown">
				<div class="header-widget">
					<div class="av-container">
						<div class="av-columns-area">
								<div class="av-column-7">
									<div class="widget-left text-av-left text-center"> 
									<?php 
										$avril_ampark_hide_show_email_details 	= get_theme_mod( 'hide_show_email_details','1');
										$avril_ampark_tlh_email_icon 			= get_theme_mod( 'tlh_email_icon','fa-phone'); 	
										$avril_ampark_tlh_email_title 			= get_theme_mod( 'tlh_email_title','Email Us'); 
										$avril_ampark_tlh_email_sbtitle 			= get_theme_mod( 'tlh_email_sbtitle','email@email.com'); 
									?>	
									<?php if($avril_ampark_hide_show_email_details == '1') { ?>
										<aside class="widget widget-contact wgt-2">
											<div class="contact-area">
												<div class="contact-icon">
													<i class="fa <?php echo  esc_attr($avril_ampark_tlh_email_icon); ?>"></i>
												</div>
												<a href="mailto:<?php echo esc_attr($avril_ampark_tlh_email_sbtitle); ?>" class="contact-info">
													<span class="text"><?php echo esc_html($avril_ampark_tlh_email_title); ?></span>
													<span class="title"><?php echo esc_html($avril_ampark_tlh_email_sbtitle); ?></span>
												</a>
											</div>
										</aside>
									<?php } ?>	
									<?php 
										$avril_ampark_hide_show_mbl_details 		= get_theme_mod( 'hide_show_mbl_details','1'); 	
										$avril_ampark_tlh_mobile_icon 			= get_theme_mod( 'tlh_mobile_icon','fa-map-marker');
										$avril_ampark_tlh_mobile_title 			= get_theme_mod( 'tlh_mobile_title','Online 24x7'); 
										$avril_ampark_tlh_mobile_sbtitle 		= get_theme_mod( 'tlh_mobile_sbtitle','+1-0120-400-00-00'); 
									?>
									<?php if($avril_ampark_hide_show_mbl_details == '1') { ?>
										<aside class="widget widget-contact wgt-3">
											<div class="contact-area">
												<div class="contact-icon">
													<i class="fa <?php echo  esc_attr($avril_ampark_tlh_mobile_icon); ?>"></i>
												</div>
												<a href="tel:<?php echo esc_attr($avril_ampark_tlh_mobile_sbtitle); ?>" class="contact-info">
													<span class="text"><?php echo esc_html($avril_ampark_tlh_mobile_title); ?></span>
													<span class="title"><?php echo esc_html($avril_ampark_tlh_mobile_sbtitle); ?></span>
												</a>
											</div>
										</aside>
									<?php } ?>	
									</div>	
								</div>
								<div class="av-column-5">
									<div class="widget-right text-av-right text-center">
										<?php if($avril_ampark_hide_show_social_icon == '1') { ?>
											<aside class="widget widget_social_widget">
												<ul>
													<?php
														$avril_ampark_social_icons = json_decode($avril_ampark_social_icons);
														if( $avril_ampark_social_icons!='' )
														{
														foreach($avril_ampark_social_icons as $avril_ampark_social_item){	
														$avril_ampark_repeater_social_icon = ! empty( $avril_ampark_social_item->icon_value ) ? apply_filters( 'avril_translate_single_string', $avril_ampark_social_item->icon_value, 'Header section' ) : '';	
														$avril_ampark_repeater_social_link = ! empty( $avril_ampark_social_item->link ) ? apply_filters( 'avril_translate_single_string', $avril_ampark_social_item->link, 'Header section' ) : '';
													?>
														<li><a href="<?php echo esc_url( $avril_ampark_repeater_social_link ); ?>"><i class="fa <?php echo esc_attr( $avril_ampark_repeater_social_icon ); ?>"></i></a></li>
													<?php }} ?>
												</ul>
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
