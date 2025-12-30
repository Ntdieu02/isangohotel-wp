<!--===// Start: Ads Section
=================================--> 
<?php 
	$news25_hide_show_advertise 	= get_theme_mod('hide_show_advertise2','1');
	$news25_advertise_img			= get_theme_mod('advertise2_img',esc_url(get_template_directory_uri() .'/assets/images/ads/adv2.jpg')); 
	$news25_advertise_url			= get_theme_mod('advertise2_url');
	$news25_advertise_newtab		= get_theme_mod('advertise2_newtab'); 
	$news25_advertise_nofollow		= get_theme_mod('advertise2_nofollow'); 
	if($news25_hide_show_advertise == '1') { ?>
	<div class="ads-section st-py-default wow fadeInUp">
		<div class="container">
			<a href="<?php echo esc_url($news25_advertise_url);?>" target="<?php if($news25_advertise_newtab == '1' ) { echo '_blank'; } ?>" rel="<?php if($news25_advertise_nofollow == '1' ) { echo 'noopener noreferrer'; } ?>" title="<?php esc_attr_e('Ad2','clever-fox'); ?>">
				<img src="<?php echo esc_url($news25_advertise_img);?>" class="w-100" alt="<?php esc_attr_e('Ads','clever-fox'); ?>">
			</a>
		</div>
	</div>
<?php } ?>
<!-- End: Ads Section
=================================-->