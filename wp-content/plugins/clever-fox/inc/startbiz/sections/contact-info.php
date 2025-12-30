<?php
if ( ! function_exists( 'startkit_startbiz_contact_info' ) ) :

	function startkit_startbiz_contact_info() {
	$startkit_startbiz_hs_hdr_nav_ct_info			= get_theme_mod('hs_hdr_nav_ct_info','1');
	$startkit_startbiz_hdr_nav_ct_info_icon		= get_theme_mod('hdr_nav_ct_info_icon','fa-phone');
	$startkit_startbiz_hdr_nav_ct_info_ttl		= get_theme_mod('hdr_nav_ct_info_ttl',__('CALL FOR EMRGENCY','clever-fox'));
	$startkit_startbiz_hdr_nav_ct_info_subttl		= get_theme_mod('hdr_nav_ct_info_subttl',__('+1-900-242-23-23','clever-fox'));
	$startkit_startbiz_hdr_nav_ct_info_url		= get_theme_mod('hdr_nav_ct_info_url');
	if($startkit_startbiz_hs_hdr_nav_ct_info =='1'){
?>
    <div class="emergency-call">
		<div class="contact-area">
			<a href="<?php echo esc_url($startkit_startbiz_hdr_nav_ct_info_url); ?>" class="contact-info">
				<?php if ( ! empty($startkit_startbiz_hdr_nav_ct_info_ttl) ) : ?>
					<span class="text"><?php echo esc_html($startkit_startbiz_hdr_nav_ct_info_ttl); ?></span>
				<?php endif; ?>	
				
				<?php if ( ! empty($startkit_startbiz_hdr_nav_ct_info_subttl) ) : ?>
					<span class="title"><?php echo esc_html($startkit_startbiz_hdr_nav_ct_info_subttl); ?></span>
				<?php endif; ?>
			</a>
			
			<?php if ( ! empty($startkit_startbiz_hdr_nav_ct_info_icon) ) : ?>
				<div class="contact-icon">
					<i class="fa <?php echo esc_attr($startkit_startbiz_hdr_nav_ct_info_icon); ?>"></i>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php 
	}}
add_action('startkit_startbiz_contact_info','startkit_startbiz_contact_info');
endif;