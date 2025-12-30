<?php
	if ( ! function_exists( 'gradiant_header_contact' ) ) :
	function gradiant_header_contact() {
		$gradiant_flavita_hdr_nav_contact_content = get_theme_mod( 'hdr_nav_contact_content',__('<div class="contact-icon"><i class="fa fa-wechat"></i></div><a href="#" class="contact-info"> <span class="title">Hotline Number</span><span class="text">0123-456-789</span></a>','clever-fox'));
		$gradiant_flavita_hdr_nav_contact_content2 = get_theme_mod( 'hdr_nav_contact_content2',__('<div class="contact-icon"><i class="fa fa-clock-o"></i></div><a href="#" class="contact-info"><span class="title">Office Hours</span><span class="text">9:00-7:00 {Sun:Closed}</span></a>','clever-fox'));
		$gradiant_flavita_hdr_nav_contact_content3 = get_theme_mod( 'hdr_nav_contact_content3',__('<div class="contact-icon"><i class="fa fa-envelope"></i></div><div class="contact-info"><span class="title">Email Us</span></div><div class="contact-info"><a href="#"><span class="text">example.com</span></a></div>','clever-fox'));
			if(!empty($gradiant_flavita_hdr_nav_contact_content) || !empty($gradiant_flavita_hdr_nav_contact_content2) || !empty($gradiant_flavita_hdr_nav_contact_content3)):
		?>	
	<li class="widget-wrap">
		<div class="widget-wrp">
			<?php if(!empty($gradiant_flavita_hdr_nav_contact_content)): ?>
				<aside class="widget widget-contact">
					<div class="contact-area ct-area1">
						<?php echo wp_kses_post($gradiant_flavita_hdr_nav_contact_content); ?>
					</div>
				</aside>
			<?php endif;
			 if(!empty($gradiant_flavita_hdr_nav_contact_content2)): ?>
				<aside class="widget widget-contact">
					<div class="contact-area ct-area2">
						<?php echo wp_kses_post($gradiant_flavita_hdr_nav_contact_content2); ?>
					</div>
				</aside>
			<?php endif;
			$cleverfox_theme = wp_get_theme(); // gets the current theme
			if( 'Colorsy' !== $cleverfox_theme->name){
			if(!empty($gradiant_flavita_hdr_nav_contact_content3)): ?>
				<aside class="widget widget-contact">
					<div class="contact-area ct-area3">
						<?php echo wp_kses_post($gradiant_flavita_hdr_nav_contact_content3); ?>
					</div>
				</aside>
			<?php endif; } ?>
		</div>
	</li>
	<?php endif;  
} endif;
add_action('gradiant_header_contact', 'gradiant_header_contact');
?>
