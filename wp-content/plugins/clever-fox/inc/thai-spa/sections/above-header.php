<?php
	if ( ! function_exists( 'hantus_above_header' ) ) :
	function hantus_above_header() {
	?>
	<?php 
	$hantus_thaispa_hide_show_social_icon		= get_theme_mod('hide_show_social_icon','1');
	$hantus_thaispa_social_icons				= get_theme_mod('social_icons',hantus_get_social_icon_default());
	$hantus_thaispa_time_icon			= get_theme_mod('hantus_time_icon','fa-clock-o');
	$hantus_thaispa_timing				= get_theme_mod('hantus_timing',__('Opening Hours - 10 Am to 6 PM','clever-fox'));
	$hantus_thaispa_hide_show_contact_infot	= get_theme_mod('hide_show_contact_infot','1');
	$hantus_thaispa_header_email_icon			= get_theme_mod('header_email_icon','fa-envelope-o');
	$hantus_thaispa_header_email				= get_theme_mod('header_email',__('email@companyname.com','clever-fox'));
	$hantus_thaispa_header_phone_icon			= get_theme_mod('header_phone_icon','fa-phone'); 
	$hantus_thaispa_header_phone_number		= get_theme_mod('header_phone_number',__('+12 345 678 910','clever-fox'));
?>
     <div id="header-top">
		<div class="container">
			
			<div class="row">
				
				<div class="col-lg-6 col-md-6 text-center text-md-left left-top-header">
				<?php if($hantus_thaispa_hide_show_social_icon == '1') { ?>
					<p class="time-details"><i class="fa <?php echo esc_attr($hantus_thaispa_time_icon); ?>"></i><?php /* translators: %s: Timing */printf( esc_html__('%s.', 'clever-fox'), esc_html($hantus_thaispa_timing)); ?></p>
					<ul class="header-social d-inline-block">
						<?php
							$hantus_thaispa_social_icons = json_decode($hantus_thaispa_social_icons);
							if( $hantus_thaispa_social_icons!='' )
							{
							foreach($hantus_thaispa_social_icons as $hantus_thaispa_social_item){	
							$hantus_thaispa_repeater_social_icon = ! empty( $hantus_thaispa_social_item->icon_value ) ? apply_filters( 'hantus_translate_single_string', $hantus_thaispa_social_item->icon_value, 'Header section' ) : '';	
							$hantus_thaispa_repeater_social_link = ! empty( $hantus_thaispa_social_item->link ) ? apply_filters( 'hantus_translate_single_string', $hantus_thaispa_social_item->link, 'Header section' ) : '';
						?>
							<li><a href="<?php echo esc_url( $hantus_thaispa_repeater_social_link ); ?>" ><i class="fa <?php echo esc_attr( $hantus_thaispa_repeater_social_icon ); ?> "></i></a></li>
						<?php								
							}
						 }
						?>
					</ul>
					<?php
						}
					?>
				</div>
				<?php  ?>
			<?php if($hantus_thaispa_hide_show_contact_infot == '1' ) { ?>
				<div class="col-lg-6 col-md-6 text-center text-md-right header-top-right">
					<ul class="text-details">
						<li class="h-t-e"><a href="mailto:<?php echo esc_html($hantus_thaispa_header_email); ?>"><i class="fa <?php  echo esc_attr( $hantus_thaispa_header_email_icon ); ?>"></i><?php echo esc_html($hantus_thaispa_header_email); ?></a></li>
						<li class="h-t-p"><a href="tel:<?php echo esc_html($hantus_thaispa_header_phone_number); ?>"><i class="fa <?php  echo esc_attr( $hantus_thaispa_header_phone_icon ); ?>"></i><?php /* translators: %s: Phone Number */printf( esc_html__('%s.', 'clever-fox'), esc_html($hantus_thaispa_header_phone_number)); ?></a></li>
					</ul>       
				</div>
			<?php } ?>	
			</div>
		</div>
	</div>    
	<?php 
} endif;
add_action('hantus_above_header', 'hantus_above_header');
