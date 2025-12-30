<?php  
	$renoval_eractor_team_subtitle		= get_theme_mod('team_subtitle', __('<h2>Outstanding</h2><div class="animation"><div class="first"><div>Team</div></div></div>','clever-fox'));
	$renoval_eractor_team_description	= get_theme_mod('team_description', __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','clever-fox')); 
	$renoval_eractor_team_contents		= get_theme_mod('team_contents',renoval_get_team_default());
	$renoval_eractor_team_bg_image		= get_theme_mod('team_bg_image',esc_url(CLEVERFOX_PLUGIN_URL .'inc/eractor/images/team/team-bg.jpg'));
?>
	<!-- Start: Team Section
	=======================-->
	<section id="team-section" class="team-section team-home team-one wow fadeInUp" <?php if(!empty($renoval_eractor_team_bg_image)){ ?> style="background-image:url('<?php echo esc_url($renoval_eractor_team_bg_image); ?>');" <?php } ?>>
		<div class="container">
			<?php if(!empty($renoval_eractor_team_subtitle) || !empty($renoval_eractor_team_description)): ?>
				<div class="row">
					<div class="section-title text-center">
						
						<?php if(!empty($renoval_eractor_team_subtitle)): ?>
							<div>
								<?php echo wp_kses_post($renoval_eractor_team_subtitle); ?>
							</div>
						<?php endif; ?>
						
						<?php if(!empty($renoval_eractor_team_description)): ?>
							<p>
								<?php echo wp_kses_post($renoval_eractor_team_description); ?>
							</p>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
			
			<div class="row justify-content-center">
				<?php
					$renoval_eractor_team_contents = json_decode($renoval_eractor_team_contents);
					if( $renoval_eractor_team_contents!='' )
					{
					foreach($renoval_eractor_team_contents as $renoval_eractor_team_item){
					$renoval_eractor_repeater_image    = ! empty( $renoval_eractor_team_item->image_url ) ? apply_filters( 'renoval_translate_single_string', $renoval_eractor_team_item->image_url, 'Team section' ) : '';
					$renoval_eractor_repeater_title    = ! empty( $renoval_eractor_team_item->title ) ? apply_filters( 'renoval_translate_single_string', $renoval_eractor_team_item->title, 'Team section' ) : '';
					$renoval_eractor_repeater_subtitle = ! empty( $renoval_eractor_team_item->subtitle ) ? apply_filters( 'renoval_translate_single_string', $renoval_eractor_team_item->subtitle, 'Team section' ) : '';
					$renoval_eractor_repeater_link = ! empty( $renoval_eractor_team_item->link ) ? apply_filters( 'renoval_translate_single_string', $renoval_eractor_team_item->link, 'Team section' ) : '';
					
				?>
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
						<div class="team-member">
							<?php if(!empty($renoval_eractor_repeater_image)): ?>
								<div class="team-image">
									<a href="#">
										<img src="<?php echo esc_url($renoval_eractor_repeater_image); ?>" alt="<?php echo esc_attr($renoval_eractor_repeater_title); ?>">
									</a>
								</div>
							<?php endif; ?>	
							
							<?php if(!empty($renoval_eractor_repeater_title) || !empty($renoval_eractor_repeater_subtitle)): ?>
								<div class="team-content">
									<h5>
										<?php echo esc_html($renoval_eractor_repeater_title); ?>
									</h5>
									<p>
										<?php echo esc_html($renoval_eractor_repeater_subtitle); ?>
									</p>
									<div class="section-element-team">
										<img src="<?php echo esc_url(CLEVERFOX_PLUGIN_URL .'inc/eractor/images/section-bg.png'); ?>" alt="<?php echo esc_attr($renoval_eractor_repeater_title); ?>"> 
									</div>
								</div>
							<?php endif; ?>
							
							<div class="section-element-team">
								<img src="<?php echo esc_url(CLEVERFOX_PLUGIN_URL .'inc/eractor/images/section-bg.png'); ?>" alt="<?php echo esc_attr($renoval_eractor_repeater_title); ?>"> 
							</div>
							<aside class="widget widget-social-widget">
								<ul>
									<?php if ( ! empty( $renoval_eractor_repeater_team_item->social_repeater ) ) :
										$renoval_eractor_repeater_icons         = html_entity_decode( $renoval_eractor_repeater_team_item->social_repeater );
										$renoval_eractor_repeater_icons_decoded = json_decode( $renoval_eractor_repeater_icons, true );
										if ( ! empty( $renoval_eractor_repeater_icons_decoded ) ) : ?>
										<?php
											foreach ( $renoval_eractor_repeater_icons_decoded as $renoval_eractor_repeater_value ) {
												$renoval_eractor_repeater_social_icon = ! empty( $renoval_eractor_repeater_value['icon'] ) ? apply_filters( 'renoval_translate_single_string', $renoval_eractor_repeater_value['icon'], 'Team section' ) : '';
												$renoval_eractor_repeater_social_link = ! empty( $renoval_eractor_repeater_value['link'] ) ? apply_filters( 'renoval_translate_single_string', $renoval_eractor_repeater_value['link'], 'Team section' ) : '';
												if ( ! empty( $renoval_eractor_repeater_social_icon ) ) {
										?>
											<li><a href="<?php echo esc_url( $renoval_eractor_repeater_social_link ); ?>"><i class="fa <?php echo esc_attr( $renoval_eractor_repeater_social_icon ); ?>"></i></a></li>
									<?php	} } endif; endif; ?>								
								</ul>
						   </aside>
						</div>
					</div>
				<?php } } ?>
			</div>
		</div>
	</section>
	<!-- End: Team Section
	=======================-->