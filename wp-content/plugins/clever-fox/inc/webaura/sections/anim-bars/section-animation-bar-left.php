<?php 	
	$webique_webaura_left_bar_hs 					= get_theme_mod('left_bar_hs','1');
	$webique_webaura_left_bar_contents				= get_theme_mod('left_bar_contents',header_marquee_default());
if($webique_webaura_left_bar_hs=='1'){
?>	
<section id="marquee-section-left" class="marquee-section style2 bg-gradient1 mrq-loop  wow fadeInUp" direction="left" scrollamount="40" data-wow-delay="100ms" data-wow-duration="1500ms">
	<ul>
		<?php 
			if ( ! empty( $webique_webaura_left_bar_contents ) ) {
			$webique_webaura_left_bar_contents = json_decode( $webique_webaura_left_bar_contents );
			foreach ( $webique_webaura_left_bar_contents as $webique_webaura_left_bar_content ) {
				$webique_webaura_repeater_title = ! empty( $webique_webaura_left_bar_content->title ) ? apply_filters( 'webique_translate_single_string', $webique_webaura_left_bar_content->title, 'animation bars section' ) : '';
				$webique_webaura_repeater_link = ! empty( $webique_webaura_left_bar_content->link ) ? apply_filters( 'webique_translate_single_string', $webique_webaura_left_bar_content->link, 'animation bars section' ) : '';
				$webique_webaura_repeater_newtab = ! empty( $webique_webaura_left_bar_content->newtab ) ? apply_filters( 'webique_translate_single_string', $webique_webaura_left_bar_content->newtab, 'animation bars section' ) : '';
				$webique_webaura_repeater_nofollow = ! empty( $webique_webaura_left_bar_content->nofollow ) ? apply_filters( 'webique_translate_single_string', $webique_webaura_left_bar_content->nofollow, 'animation bars section' ) : '';
		?><?php if(!empty($webique_webaura_repeater_title)) { ?>
			<li class="item"><a href="<?php echo esc_url($webique_webaura_repeater_link); ?>" <?php if($webique_webaura_repeater_newtab =='yes') {echo 'target="_blank"'; } ?> rel="<?php if($webique_webaura_repeater_newtab =='yes') {echo 'noreferrer noopener'; } ?> <?php if($webique_webaura_repeater_nofollow =='yes') {echo 'nofollow'; } ?>"><?php echo esc_html( $webique_webaura_repeater_title ); ?></a></li>
		<?php } } } ?>	
	</ul>	
</section>
<?php } ?>