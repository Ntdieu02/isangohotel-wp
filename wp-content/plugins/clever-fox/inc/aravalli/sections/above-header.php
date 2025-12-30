<?php
	if ( ! function_exists( 'aravalli_above_header' ) ) :
	function aravalli_above_header() {

	$aravalli_hide_show_phone_details 	= get_theme_mod( 'hide_show_phone_details','1'); 
	$aravalli_tlh_phone_icon 			= get_theme_mod( 'tlh_phone_icon','fa-mobile-phone'); 
	$aravalli_tlh_phone_title 			= get_theme_mod( 'tlh_phone_title',__('+1514-2861-23','clever-fox')); 
	$aravalli_hide_show_email_details 	= get_theme_mod( 'hide_show_email_details','1'); 
	$aravalli_tlh_email_icon 			= get_theme_mod( 'tlh_email_icon','fa-envelope-o'); 
	$aravalli_tlh_email_title 			= get_theme_mod( 'tlh_email_title', __('email@companyname.com', 'clever-fox'));
	$aravalli_hide_show_social_icon 	= get_theme_mod( 'hide_show_social_icon','1'); 
	$aravalli_social_icons 				= get_theme_mod( 'social_icons',aravalli_get_social_icon_default());
?>
    <?php if($aravalli_hide_show_phone_details == '1' || $aravalli_hide_show_email_details == '1' || $aravalli_social_icons == '1') { ?>
	<div id="header-top" class="header-top-info d-lg-block d-sm-none d-none wow fadeInDown">
		<div class="header-widget">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12">
						 <div id="header-top-left" class="text-lg-left text-center">
							<?php if($aravalli_hide_show_phone_details == '1') { ?>
								 <div class="widget widget-info phone">
									<i class="fa <?php echo esc_attr($aravalli_tlh_phone_icon); ?>"></i>
									<span><?php echo esc_html($aravalli_tlh_phone_title); ?></span>
								</div>
							<?php } 
							  if($aravalli_hide_show_email_details == '1') {
							 ?>	
								<div class="widget widget-info email">
									<i class="fa <?php echo esc_attr($aravalli_tlh_email_icon); ?>"></i>
									<span><?php echo esc_html($aravalli_tlh_email_title); ?></span>
								</div>
							 <?php } ?>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						 <div id="header-top-right" class="text-lg-right text-center">
							<?php if($aravalli_hide_show_social_icon == '1') { ?>
								<div class="widget widget-social">
									<ul>
										<?php
											$aravalli_social_icons = json_decode($aravalli_social_icons);
											if( $aravalli_social_icons!='' )
											{
											foreach($aravalli_social_icons as $aravalli_social_item){	
											$aravalli_repeater_social_icon = ! empty( $aravalli_social_item->icon_value ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_social_item->icon_value, 'Header section' ) : '';	
											$aravalli_repeater_social_link = ! empty( $aravalli_social_item->link ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_social_item->link, 'Header section' ) : '';
										?>
											<li><a href="<?php echo esc_url( $aravalli_repeater_social_link ); ?>" class="linkedin"><i class="fa <?php echo esc_attr( $aravalli_repeater_social_icon ); ?>"></i></a></li>
										<?php }} ?>
									</ul>
								</div>		
							<?php } ?>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php }  
} endif;
add_action('aravalli_above_header', 'aravalli_above_header');