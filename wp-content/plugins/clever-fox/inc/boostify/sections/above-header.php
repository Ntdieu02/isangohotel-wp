<?php
	if ( ! function_exists( 'boostify_above_header' ) ) :
	function boostify_above_header() {

	$boostify_hide_show_mbl_details 		= get_theme_mod( 'hide_show_mbl_details','1'); 	
	$boostify_hide_show_email_details 	= get_theme_mod( 'hide_show_email_details','1');	
	$boostify_hs_hdr_social 				= get_theme_mod( 'hs_hdr_social','1');	
	 if($boostify_hide_show_mbl_details == '1' || $boostify_hide_show_email_details == '1' || $boostify_hs_hdr_social == '1') { ?>			
		<div id="header-top" class="header-top">
			<div class="container">
				<div class="row">
					
					<div class="col-lg-6 col-md-12 text-lg-left text-center boostify-top-left">
						<?php 	
							$boostify_tlh_mobile_icon 		= get_theme_mod( 'tlh_mobile_icon','fa-phone');
							$boostify_tlh_mobile_title 		= get_theme_mod( 'tlh_mobile_title',__('Call: 0 (123) 456 7891','clever-fox')); 
							$boostify_tlh_mobile_link 		= get_theme_mod( 'tlh_mobile_link'); 
						?>
						<?php if($boostify_hide_show_mbl_details == '1') { ?>
							<div class="widget widget_info">
								<i class="fa <?php echo  esc_attr($boostify_tlh_mobile_icon); ?>"></i> 
								<span class="phone"><a href="<?php echo esc_url($boostify_tlh_mobile_link); ?>"><?php echo esc_html($boostify_tlh_mobile_title); ?></a></span>
							</div>
						<?php } ?>	

						<?php 
							$boostify_tlh_email_icon 			= get_theme_mod( 'tlh_email_icon','fa-envelope'); 	
							$boostify_tlh_email_title 			= get_theme_mod( 'tlh_email_title',__('info@example.com','clever-fox')); 
							$boostify_tlh_email_link 			= get_theme_mod( 'tlh_email_link'); 
						?>	
						<?php if($boostify_hide_show_email_details == '1') { ?>
							<div class="widget widget_info">
								<i class="fa <?php echo  esc_attr($boostify_tlh_email_icon); ?>"></i> 
								<span class="email"><a href="<?php echo esc_url($boostify_tlh_email_link); ?>"><?php echo esc_html($boostify_tlh_email_title); ?></a></span>
							</div>	
						<?php } ?>	
					</div>
					
					<div class="col-lg-6 col-md-12 text-lg-right text-center boostify-top-right">
						<?php $boostify_social_icons = get_theme_mod( 'social_icons',boostify_get_social_icon_default()); 
								if($boostify_hs_hdr_social == '1') { 
						?>
							 <aside class="widget widget_social_widget">
								<ul class="header-social d-inline-block">
									<?php
										$boostify_social_icons = json_decode($boostify_social_icons);
										if( $boostify_social_icons!='' )
										{
										foreach($boostify_social_icons as $boostify_social_item){	
										$boostify_repeater_social_icon = ! empty( $boostify_social_item->icon_value ) ? apply_filters( 'boostify_translate_single_string', $boostify_social_item->icon_value, 'Header section' ) : '';	
										$boostify_repeater_social_link = ! empty( $boostify_social_item->link ) ? apply_filters( 'boostify_translate_single_string', $boostify_social_item->link, 'Header section' ) : '';
									?>
										<li><a href="<?php echo esc_url( $boostify_repeater_social_link ); ?>"><i class="fa <?php echo esc_attr( $boostify_repeater_social_icon ); ?>"></i></a></li>
									<?php }} ?>
								</ul>
							</aside>
						<?php } ?>	
					</div>
				</div>
			</div>
		</div>
	<?php } 	
} endif;
add_action('boostify_above_header', 'boostify_above_header');

