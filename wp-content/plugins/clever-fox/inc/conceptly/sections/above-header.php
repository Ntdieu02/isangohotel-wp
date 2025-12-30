<?php
	if ( ! function_exists( 'conceptly_above_header' ) ) :
	function conceptly_above_header() {
	$conceptly_hide_show_preloader		= get_theme_mod('hide_show_preloader','0');
	$conceptly_hide_show_social_icon		= get_theme_mod('hide_show_social_icon','1');
	$conceptly_social_icons				= get_theme_mod('social_icons',conceptly_get_social_icon_default());
	$conceptly_hide_show_contact_infot	= get_theme_mod('hide_show_contact_infot','1');
	$conceptly_header_email_icon			= get_theme_mod('header_email_icon','fa-envelope-o');
	$conceptly_header_email				= get_theme_mod('header_email',__('email@companyname.com','clever-fox'));
	$conceptly_header_phone_icon			= get_theme_mod('header_phone_icon','fa-phone'); 
	$conceptly_header_phone_number		= get_theme_mod('header_phone_number',__('+1 514-286-4242','clever-fox'));
	$conceptly_header_faq_icon 			= get_theme_mod('header_faq_icon','fa-question');
	$conceptly_header_faq 				= get_theme_mod('header_faq',__('Ask Your Question','clever-fox'));
	$conceptly_sticky_header_setting		= get_theme_mod('sticky_header_setting','1'); 
	$conceptly_hide_show_email_infot		= get_theme_mod('hide_show_email_infot','1');
	$conceptly_hide_show_faq				= get_theme_mod('hide_show_faq','1');
	
?>

 <!-- Start: Header Top
    ============================= -->
    <div id="header-top" class="header-above">
    	<div class="header-abover-mobile">
			<div class="header-above-button">
				<button type="button" class="pull-down-toggle"><i class="fa fa-chevron-down"></i></button>
			</div>
			<div id="mobi-above" class="mobi-above"></div>
		</div>
		<div class="header-above-desk">
	        <div class="container">
	            <div class="row">
	                <div class="col-lg-9 col-md-12 text-lg-left text-center my-auto mb-lg-0 mb-sm-3 mb-3">
	                    <ul class="header-info d-inline-block">
							<?php if($conceptly_hide_show_contact_infot =='1'){ ?>
								<?php if($conceptly_header_phone_number) {?>
									<li class="tlh-phone"><a href="tel:<?php echo esc_html($conceptly_header_phone_number); ?>"><i class="fa <?php echo esc_attr($conceptly_header_phone_icon); ?>"></i><?php echo esc_html($conceptly_header_phone_number); ?></a></li>
								<?php 
										} 
									}
								?>
							<?php if($conceptly_hide_show_email_infot =='1'){ ?>
								<?php if($conceptly_header_email) {?>
									<li class="tlh-email"><a href="mailto:<?php echo esc_html($conceptly_header_email); ?>"><i class="fa <?php  echo esc_attr( $conceptly_header_email_icon ); ?>"></i><?php echo esc_html($conceptly_header_email); ?></a></li>
								<?php } ?>	
							<?php } ?>
							<?php if($conceptly_hide_show_faq =='1'){ ?>
								<?php if($conceptly_header_faq) {?>
									<li class="tlh-faq"><a href="#"><i class="fa <?php echo esc_attr($conceptly_header_faq_icon); ?>"></i><?php echo esc_html($conceptly_header_faq); ?></a></li>
								<?php } ?>
							<?php } ?>						
	                    </ul>
	                </div>
					
	                <div class="col-lg-3 col-md-12 text-lg-right text-center my-auto">
						<?php if($conceptly_hide_show_social_icon =='1') { ?>
	                    <ul class="trh-social d-inline-block">
							<?php
								$conceptly_social_icons = json_decode($conceptly_social_icons);
								if( $conceptly_social_icons!='' )
								{
								foreach($conceptly_social_icons as $conceptly_social_item){	
								$conceptly_repeater_social_icon = ! empty( $conceptly_social_item->icon_value ) ? apply_filters( 'conceptly_translate_single_string', $conceptly_social_item->icon_value, 'Header section' ) : '';	
								$conceptly_repeater_social_link = ! empty( $conceptly_social_item->link ) ? apply_filters( 'conceptly_translate_single_string', $conceptly_social_item->link, 'Header section' ) : '';
							?>
								<li><a href="<?php echo esc_url( $conceptly_repeater_social_link ); ?>" ><i class="fa <?php echo esc_attr( $conceptly_repeater_social_icon ); ?> "></i></a></li>
							<?php								
								}
							 }
							?>
	                    </ul>  
						<?php }	?>
	                </div>
			     </div>
	        </div>
	    </div>
    </div>
	<?php 
} endif;
add_action('conceptly_above_header', 'conceptly_above_header');
?>
