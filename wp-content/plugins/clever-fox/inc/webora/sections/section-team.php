<?php  
	$webique_webora_clever_fox_theme = wp_get_theme();
	if ( 'Webora' === $webique_webora_clever_fox_theme->get( 'Name' ) ) {
		$webique_webora_get_team_default = webora_get_team_default();
	}else{
		$webique_webora_get_team_default = webique_webaura_get_team_default();
	}
	$webique_webora_team_hs 				= get_theme_mod('team_hs','1');
	$webique_webora_team_title 				= get_theme_mod('team_title',__('Our <span class="primary-color">Team</span>','clever-fox'));
	$webique_webora_team_description		= get_theme_mod('team_description',__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','clever-fox')); 
	$webique_webora_team_contents			= get_theme_mod('team_contents',$webique_webora_get_team_default);
	if($webique_webora_team_hs=='1'){
?>	
 <section id="team-section" class="team-section av-py-default shape1-section">
	<div class="av-container">
		<?php if(!empty($webique_webora_team_title)  || !empty($webique_webora_team_description)): ?>
			<div class="av-columns-area">
				<div class="av-column-12">
					<div class="heading-default text-center">
						<div class="title-container animation-style2">
							<div class="arrow-left"></div>
								<?php if(!empty($webique_webora_team_title)): ?>
									<h1 class="title"><?php echo wp_kses_post($webique_webora_team_title); ?></h1>				
								<?php endif; ?>
							<div class="arrow-right"></div>
						</div>
						<?php if(!empty($webique_webora_team_description)): ?>
							<p><?php echo wp_kses_post($webique_webora_team_description); ?></p>
						<?php endif; ?>	
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="av-columns-area">
		<!-->
		<?php
		if ( ! empty( $webique_webora_team_contents ) ) {
			$webique_webora_team_contents = json_decode( $webique_webora_team_contents );
			foreach ( $webique_webora_team_contents as $webique_webora_team_item ) {
				$webique_webora_repeater_title = ! empty( $webique_webora_team_item->title ) ? apply_filters( 'webique_translate_single_string', $webique_webora_team_item->title, 'team section' ) : '';
				$webique_webora_repeater_subtitle = ! empty( $webique_webora_team_item->subtitle ) ? apply_filters( 'webique_translate_single_string', $webique_webora_team_item->subtitle, 'team section' ) : '';
				$webique_webora_repeater_image = ! empty( $webique_webora_team_item->image_url ) ? apply_filters( 'webique_translate_single_string', $webique_webora_team_item->image_url, 'team section' ) : '';
				$webique_webora_repeater_link = ! empty( $webique_webora_team_item->link ) ? apply_filters( 'webique_translate_single_string', $webique_webora_team_item->link, 'team section' ) : '';
				$webique_webora_repeater_newtab = ! empty( $webique_webora_team_item->newtab ) ? apply_filters( 'webique_translate_single_string', $webique_webora_team_item->newtab, 'team section' ) : '';
				$webique_webora_repeater_nofollow = ! empty( $webique_webora_team_item->nofollow ) ? apply_filters( 'webique_translate_single_string', $webique_webora_team_item->nofollow, 'team section' ) : '';
		?>
			<div class="av-column-3 av-sm-column-6 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
				<div class="team-item box-hover">
					<div class="av-media">
						<img src="<?php echo esc_url($webique_webora_repeater_image); ?>" alt="<?php echo esc_attr( $webique_webora_repeater_title ); ?>">
					</div>
					<div class="team-content">
					<?php if(!empty($webique_webora_repeater_title)){ ?>
						<h5 class="av-name"><a href="<?php echo esc_url($webique_webora_repeater_link); ?>" <?php if($webique_webora_repeater_newtab =='yes') {echo 'target="_blank"'; } ?> rel="<?php if($webique_webora_repeater_newtab =='yes') {echo 'noreferrer noopener'; } ?> <?php if($webique_webora_repeater_nofollow =='yes') {echo 'nofollow'; } ?>"><?php echo esc_html( $webique_webora_repeater_title ); ?></a></h5>
					<?php } ?>
					<?php if(!empty($webique_webora_repeater_subtitle)){ ?>
						<span class="av-position"><?php echo esc_html( $webique_webora_repeater_subtitle ); ?></span>
					<?php } ?>
					</div>
					<ul class="team-social">
						<?php if ( ! empty( $webique_webora_team_item->social_repeater ) ) :
							$webique_webora_icons         = html_entity_decode( $webique_webora_team_item->social_repeater );
							$webique_webora_icons_decoded = json_decode( $webique_webora_icons, true );
							if ( ! empty( $webique_webora_icons_decoded ) ) : ?>
							<?php
								foreach ( $webique_webora_icons_decoded as $webique_webora_value ) {
									$webique_webora_repeater_social_icon = ! empty( $webique_webora_value['icon'] ) ? apply_filters( 'webique_translate_single_string', $webique_webora_value['icon'], 'Team section' ) : '';
									$webique_webora_repeater_social_link = ! empty( $webique_webora_value['link'] ) ? apply_filters( 'webique_translate_single_string', $webique_webora_value['link'], 'Team section' ) : '';
									if ( ! empty( $webique_webora_repeater_social_icon ) ) {
							?>
								<li><a href="<?php echo esc_url( $webique_webora_repeater_social_link ); ?>" <?php if($webique_webora_repeater_newtab =='yes') {echo 'target="_blank"'; } ?> rel="<?php if($webique_webora_repeater_newtab =='yes') {echo 'noreferrer noopener'; } ?> <?php if($webique_webora_repeater_nofollow =='yes') {echo 'nofollow'; } ?>" ><i class="fa <?php echo esc_attr( $webique_webora_repeater_social_icon ); ?>"></i></a></li>
						<?php	} } endif; endif; ?>
					</ul>
				</div>
			</div>
			<?php }} ?>
		   <!-->
		</div>
	</div>
</section>
<?php } ?>