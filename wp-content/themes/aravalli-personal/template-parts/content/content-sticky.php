<?php
$sticky_type= get_theme_mod('aravalli_sticky_type','circle');
$sticky_content= get_theme_mod('sticky_content','<i class="fa fa-thumb-tack"></i>');
$sticky_bg_color= get_theme_mod('sticky_bg_color','#1ed12f');
if ( is_sticky() ) { ?>
	<?php 	if($sticky_type == 'circle') : ?>
		<span class="bg-sticky rounded-circle" style="color:#fff;background-color:<?php echo esc_attr($sticky_bg_color); ?>"><?php echo wp_kses_post($sticky_content); ?></span>
	<?php else : ?>	
		<span class="bg-sticky" style="color:#fff;background-color:<?php echo esc_attr($sticky_bg_color); ?>"><?php echo wp_kses_post($sticky_content); ?></span>
	<?php endif; ?>	
<?php } ?>