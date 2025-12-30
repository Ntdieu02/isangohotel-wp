<?php
	if ( ! function_exists( 'webique_above_header' ) ) :
	function webique_above_header(){
		$webique_hide_show_email_details 	= get_theme_mod('hide_show_email_details', '1');
		$webique_hide_show_mbl_details 		= get_theme_mod('hide_show_mbl_details', '1');
		$webique_hide_show_social_icon 		= get_theme_mod( 'hide_show_social_icon','1');
		$webique_nav_btn_lbl 				= get_theme_mod( 'nav_btn_lbl','Consult Now');
		if( ( $webique_hide_show_email_details == '1' ) || ( $webique_hide_show_mbl_details == '1' ) ||  ( $webique_hide_show_social_icon == '1' ) || !empty( $webique_nav_btn_lbl )  ){
	?>
	<div id="above-header" class="header-above-info d-av-block">
		<div class="header-widget">
			<div class="av-container">
				<div class="d-flex align-items-center justify-content-between">
					<div class="top-widget-left justify-content-start ">
						<?php do_action('webique_abv_hdr_social'); ?>						
					</div>
					<?php 
						$webique_tlh_email_title = get_theme_mod('tlh_email_title', __('Email Us','clever-fox'));
						$webique_tlh_email_icon = get_theme_mod('tlh_email_icon', 'fa-envelope-o');
						$webique_tlh_email_link = get_theme_mod('tlh_email_link', 'info@example.com');					
						
						$webique_tlh_mobile_title = get_theme_mod('tlh_mobile_title', __('Call Us','clever-fox'));
						$webique_tlh_mobile_icon = get_theme_mod('tlh_mobile_icon', 'fa-whatsapp');
						$webique_tlh_mobile_link = get_theme_mod('tlh_mobile_link', '987654321');
					?>
					<div class="top-widget-right text-av-right text-center ">                                
						<?php if($webique_hide_show_email_details == '1' ): ?>
						<aside class="widget widget-contact">
							<div class="contact-area">
								<div class="contact-icon zig-zag icon-bounce">
									<i class="fa <?php echo  esc_attr($webique_tlh_email_icon); ?>"></i>
								</div>
								<div class="icon-content">
									<h4 class="primary-color"><?php echo esc_html( $webique_tlh_email_title ); ?></h4>
									<a href="mailto:<?php echo esc_attr($webique_tlh_email_link); ?>" class="contact-info">
										<span class="title"><?php echo esc_html( $webique_tlh_email_link ); ?></span>
									</a>
								</div>
							</div>
						</aside>
						<?php endif; 
						
						 if($webique_hide_show_mbl_details == '1' ): ?>
						<aside class="widget widget-contact">
							<div class="contact-area">
								<div class="contact-icon zig-zag icon-bounce">
									<i class="fa <?php echo esc_attr($webique_tlh_mobile_icon); ?>"></i>
								</div>
								<div class="icon-content">
									<h4 class="primary-color"><?php echo esc_html( $webique_tlh_mobile_title ); ?></h4>
									<a href="tel:<?php echo esc_attr(str_replace(' ', '', $webique_tlh_mobile_link)); ?>" class="contact-info">
										<span class="title"><?php echo esc_html( $webique_tlh_mobile_link ); ?></span>
									</a>
								</div>
							</div>
						</aside>
						<?php endif; ?>
					</div>
					<div class="contact-area text-right">
						<?php do_action('webique_navigation_button'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php }} endif;
add_action('webique_above_header', 'webique_above_header');
?>
