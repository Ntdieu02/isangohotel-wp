<?php
	if(! function_exists('webique_header_animation_bar')):
	function webique_header_animation_bar() {
	$webique_header_marquee_titles 		= get_theme_mod('header_marquee_titles',header_marquee_default());	
	$webique_theme						= wp_get_theme();
	$webique_webique_theme				= $webique_theme->get('Name');
	$webique_hide_show_hdr_anim_bar 	= get_theme_mod('hide_show_hdr_anim_bar','1');
	if( $webique_hide_show_hdr_anim_bar == '1' ) {
	?>
	 <div class="<?php if($webique_webique_theme === 'Webora') echo esc_attr('header-marquee'); ?> marquee-header marquee-section style1 bg-gradient2 mrq-loop" direction="right" scrollamount="30">
            <ul>
			<?php
				$webique_header_marquee_titles = json_decode($webique_header_marquee_titles);
				if( $webique_header_marquee_titles!='' )
				{
				foreach($webique_header_marquee_titles as $webique_index => $webique_marquee_item){	
				$webique_repeater_marquee_title = ! empty( $webique_marquee_item->title ) ? apply_filters( 'webique_translate_single_string', $webique_marquee_item->title, 'Header Section' ) : '';	
				$webique_repeater_marquee_link = ! empty( $webique_marquee_item->link ) ? apply_filters( 'webique_translate_single_string', $webique_marquee_item->link, 'Header Section' ) : '';
				$webique_repeater_newtab = ! empty( $webique_marquee_item->newtab ) ? apply_filters( 'webique_translate_single_string', $webique_marquee_item->newtab, 'Header section' ) : '';
				$webique_repeater_nofollow = ! empty( $webique_marquee_item->nofollow ) ? apply_filters( 'webique_translate_single_string', $webique_marquee_item->nofollow, 'Header section' ) : '';
			?>
                <li class="item wow <?php if($webique_index%2 == '0') { echo 'slideInRight active'; } else { echo 'slideInLeft'; }  ?>"><a href="<?php echo esc_url($webique_repeater_marquee_link); ?>" <?php if($webique_repeater_newtab =='yes') {echo 'target="_blank"'; } ?> rel="<?php if($webique_repeater_newtab =='yes') {echo 'noreferrer noopener'; } ?> <?php if($webique_repeater_nofollow =='yes') {echo 'nofollow'; } ?>"><?php echo esc_html($webique_repeater_marquee_title); ?></a></li>
                <?php }} ?>
            </ul>
        </div>
	<?php
}}
endif;
add_action('webique_header_animation_bar','webique_header_animation_bar');