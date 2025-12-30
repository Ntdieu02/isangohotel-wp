<?php 
	if ( ! function_exists( 'renoval_above_footer' ) ) :
	function renoval_above_footer() {
		$renoval_footer_get_in_touch_title	= get_theme_mod('footer_get_in_touch_title', __('Get In Touch','clever-fox'));
		$renoval_footer_get_in_touch_link	= get_theme_mod('footer_get_in_touch_link', '#');
		$renoval_footer_get_in_touch_icon	= get_theme_mod('footer_get_in_touch_icon', 'fa-commenting-o');
		$renoval_hs_above_footer			= get_theme_mod('hs_above_footer', '1');
		if ($renoval_hs_above_footer == '1') {
		?>
		<div class="abover-footer"> 
			 <?php if(!empty($renoval_footer_get_in_touch_icon)){ ?>
				<div class="above-footer-icon">
					<i class="fa <?php echo esc_attr($renoval_footer_get_in_touch_icon); ?>"></i> 
				</div> 
			<?php } ?>
				
			<?php if(!empty($renoval_footer_get_in_touch_title) || !empty($renoval_footer_get_in_touch_link)){ ?>
				<div class="above-footer-content">
					<h5>
						<a href="<?php echo esc_url($renoval_footer_get_in_touch_link); ?>">
							<?php echo esc_html($renoval_footer_get_in_touch_title); ?>
						</a>
					</h5> 
				</div> 
			<?php } ?>
		 </div>
		<?php } 
} endif;
add_action('renoval_above_footer', 'renoval_above_footer');
?>