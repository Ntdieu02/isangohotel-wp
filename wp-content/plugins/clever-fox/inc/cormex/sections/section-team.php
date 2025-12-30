<?php  
	$corpex_cormex_team_title				= get_theme_mod('team_title','Our <span class="primary-color">Team</span>');
	$corpex_cormex_team_description		= get_theme_mod('team_description','There are many variations of passages of Lorem Ipsum available.');
	$corpex_cormex_team_contents			= get_theme_mod('team_contents',corpex_get_team_default());
	$corpex_cormex_team_sec_column		= get_theme_mod('team_sec_column','3');  
	$corpex_cormex_team_bg_image			= get_theme_mod('team_bg_image',esc_url(CLEVERFOX_PLUGIN_URL . 'inc/corpex/images/team/team-bg.jpg'));
	$corpex_cormex_team_bg_position		= get_theme_mod('team_bg_position','fixed');
?>
<!-- team  -->
    <section class="team-section team-home" <?php if(!empty($corpex_cormex_team_bg_image)){ ?> style="background:url('<?php echo esc_url($corpex_cormex_team_bg_image); ?>'); background-repeat:no-repeat;background-size:cover;background-attachment:<?php echo esc_attr($corpex_cormex_team_bg_position); ?>" <?php } ?>>
        <div class="container">
            <?php if(!empty($corpex_cormex_team_title) || !empty($corpex_cormex_team_description)): ?>
				<div class="section-title">
					<?php if(!empty($corpex_cormex_team_title)): ?>
						<h2>
							<?php echo wp_kses_post($corpex_cormex_team_title); ?>
						</h2>
					<?php endif; ?>
					
					<?php if(!empty($corpex_cormex_team_description)): ?>
						<p>
							<?php echo esc_html($corpex_cormex_team_description); ?>
						</p>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			
            <div class="row">
				<?php
					$corpex_cormex_team_contents = json_decode($corpex_cormex_team_contents);
					if( $corpex_cormex_team_contents!='' )
					{
					foreach($corpex_cormex_team_contents as $corpex_cormex_team_item){
					$corpex_cormex_image    = ! empty( $corpex_cormex_team_item->image_url ) ? apply_filters( 'corpex_translate_single_string', $corpex_cormex_team_item->image_url, 'Team section' ) : '';
					$corpex_cormex_title    = ! empty( $corpex_cormex_team_item->title ) ? apply_filters( 'corpex_translate_single_string', $corpex_cormex_team_item->title, 'Team section' ) : '';
					$corpex_cormex_subtitle = ! empty( $corpex_cormex_team_item->subtitle ) ? apply_filters( 'corpex_translate_single_string', $corpex_cormex_team_item->subtitle, 'Team section' ) : '';
				?>			
					<div class="col-lg-3 col-md-6">
						<div class="team">
							<?php if(!empty($corpex_cormex_image)): ?>
								<div class="team-image">
									<img src="<?php echo esc_url($corpex_cormex_image); ?>" alt="<?php echo esc_attr($corpex_cormex_title); ?>">
								</div>
							<?php endif; ?>	
							
							
							<div class="team-content">
								<?php if(!empty($corpex_cormex_title) || !empty($corpex_cormex_subtitle)): ?>
									<h4>
										<?php echo esc_html($corpex_cormex_title); ?>
									</h4>
									<span>
										<?php echo esc_html($corpex_cormex_subtitle); ?>
									</span>
								<?php endif; ?>
								
								<aside class="widget widget_social_widget">
									<ul>
										<?php if ( ! empty( $corpex_cormex_team_item->social_repeater ) ) :
											$corpex_cormex_repeater_icons         = html_entity_decode( $corpex_cormex_team_item->social_repeater );
											$corpex_cormex_repeater_icons_decoded = json_decode( $corpex_cormex_repeater_icons, true );
											if ( ! empty( $corpex_cormex_repeater_icons_decoded ) ) : ?>
											<?php
												foreach ( $corpex_cormex_repeater_icons_decoded as $corpex_cormex_repeater_value ) {
													$corpex_cormex_repeater_social_icon = ! empty( $corpex_cormex_repeater_value['icon'] ) ? apply_filters( 'corpex_translate_single_string', $corpex_cormex_repeater_value['icon'], 'Team section' ) : '';
													$corpex_cormex_repeater_social_link = ! empty( $corpex_cormex_repeater_value['link'] ) ? apply_filters( 'corpex_translate_single_string', $corpex_cormex_repeater_value['link'], 'Team section' ) : '';
													if ( ! empty( $corpex_cormex_repeater_social_icon ) ) {
											?>
												<li><a href="<?php echo esc_url( $corpex_cormex_repeater_social_link ); ?>"><i class=" fab <?php echo esc_attr( $corpex_cormex_repeater_social_icon ); ?>"></i></a></li>
										<?php	} } endif; endif; ?>
									</ul>
								</aside>
							</div>								
						</div>
					</div>
				<?php } } ?>	
            </div>
        </div>
    </section>
    <!-- team end -->