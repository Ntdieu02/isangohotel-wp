<?php 
if ( ! function_exists( 'cleverfox_axtria_lite_team' ) ) :
	function cleverfox_axtria_lite_team() {
	$avril_axtria_hs_team					= get_theme_mod('hs_team','1');		
	$avril_axtria_team_title					= get_theme_mod('team_title',__('Technology from tomorrow','clever-fox'));
	$avril_axtria_team_subtitle				= get_theme_mod('team_subtitle',__('Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Team</b>                                   <b>Team</b><b>Team</b></span></span>','clever-fox'));
	$avril_axtria_team_description			= get_theme_mod('team_description',__('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','clever-fox'));
	$avril_axtria_team_contents				= get_theme_mod('team_contents',avril_get_team_default());
	if($avril_axtria_hs_team=='1'){
?>
  <section id="team-section" class="team-section bg-primary-light av-py-default">
        <div class="av-container">
            <div class="av-columns-area">
                <div class="av-column-12">
                    <div class="heading-default wow fadeInUp">
                        <?php if ( ! empty( $avril_axtria_team_title ) ) : ?>
							<span class='ttl'><?php echo wp_kses_post($avril_axtria_team_title); ?></span>
						<?php endif; ?>
						<?php if ( ! empty( $avril_axtria_team_subtitle ) ) : ?>		
							<h3><?php echo wp_kses_post($avril_axtria_team_subtitle); ?></h3>    
						<?php endif; ?>	
						<?php if ( ! empty( $avril_axtria_team_description ) ) : ?>		
							<p><?php echo wp_kses_post($avril_axtria_team_description); ?></p>    
						<?php endif; ?>	
                    </div>
                </div>
            </div>
            <div class="av-columns-area wow fadeInUp">
                <div class="av-column-12">
                    <!-- Filter list starts -->
                    <div class="av-filter-wrapper-2">
                        <div class="av-columns-area">
							<?php
								$avril_axtria_team_contents = json_decode($avril_axtria_team_contents);
								if( $avril_axtria_team_contents!='' )
								{
								foreach($avril_axtria_team_contents as $avril_axtria_team_item){
								$avril_axtria_repeater_image    = ! empty( $avril_axtria_team_item->image_url ) ? apply_filters( 'avril_translate_single_string', $avril_axtria_team_item->image_url, 'Team section' ) : '';
								$avril_axtria_repeater_title    = ! empty( $avril_axtria_team_item->title ) ? apply_filters( 'avril_translate_single_string', $avril_axtria_team_item->title, 'Team section' ) : '';
								$avril_axtria_repeater_subtitle = ! empty( $avril_axtria_team_item->subtitle ) ? apply_filters( 'avril_translate_single_string', $avril_axtria_team_item->subtitle, 'Team section' ) : '';
								$avril_axtria_repeater_text = ! empty( $avril_axtria_team_item->text ) ? apply_filters( 'avril_translate_single_string', $avril_axtria_team_item->text, 'Team section' ) : '';
								
							?>
								<div class="av-column-3 av-sm-column-6 mb-4 mb-av-0 av-filter-item support">
									<div class="team-member">
										<?php if ( ! empty( $avril_axtria_repeater_image ) ): ?>
											<img class="services_cols_mn_icon" src="<?php echo esc_url( $avril_axtria_repeater_image ); ?>" <?php if ( ! empty( $avril_axtria_repeater_title ) ) : ?> alt="<?php echo esc_attr( $avril_axtria_repeater_title ); ?>" title="<?php echo esc_attr( $avril_axtria_repeater_title ); ?>" <?php endif; ?> />
										<?php endif; ?>	
										<div class="team-footer">
											<div class="team-info">
												<?php if ( ! empty( $avril_axtria_repeater_title ) ) : ?>
													<h6><a href="javascript:void(0)"><?php echo esc_html( $avril_axtria_repeater_title ); ?></a></h6>
												<?php endif; ?>
												<?php if ( ! empty( $avril_axtria_repeater_subtitle ) ) : ?>
													<span><?php echo esc_html( $avril_axtria_repeater_subtitle ); ?></span>
												<?php endif; ?>
												<?php if ( ! empty( $avril_axtria_repeater_text ) ) : ?>
													<p><?php echo esc_html( $avril_axtria_repeater_text ); ?></p>
												<?php endif; ?>
											</div>
											<aside class="widget widget_social_widget">
												<ul>
													<?php if ( ! empty( $avril_axtria_repeater_team_item->social_repeater ) ) :
															$avril_axtria_repeater_icons         = html_entity_decode( $avril_axtria_repeater_team_item->social_repeater );
															$avril_axtria_repeater_icons_decoded = json_decode( $avril_axtria_repeater_icons, true );
															if ( ! empty( $avril_axtria_repeater_icons_decoded ) ) : ?>
															<?php
																foreach ( $avril_axtria_repeater_icons_decoded as $avril_axtria_repeater_value ) {
																	$avril_axtria_repeater_social_icon = ! empty( $avril_axtria_repeater_value['icon'] ) ? apply_filters( 'avril_translate_single_string', $avril_axtria_repeater_value['icon'], 'Team section' ) : '';
																	$avril_axtria_repeater_social_link = ! empty( $avril_axtria_repeater_value['link'] ) ? apply_filters( 'avril_translate_single_string', $avril_axtria_repeater_value['link'], 'Team section' ) : '';
																	if ( ! empty( $avril_axtria_repeater_social_icon ) ) {
															?>	
																<li><a href="<?php echo esc_url( $avril_axtria_repeater_social_link ); ?>"><i class="fa <?php echo esc_attr( $avril_axtria_repeater_social_icon ); ?>"></i></a></li>
														<?php
																}
															}
														endif;
													endif;
													?>	
												</ul>
											</aside>
										</div>
									</div>
								</div>
							<?php }} ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
}} endif; 
	if ( function_exists( 'cleverfox_axtria_lite_team' ) ) {
		$cleverfox_section_priority = apply_filters( 'avril_section_priority', 14, 'avril_lite_team' );
		add_action( 'avril_sections', 'cleverfox_axtria_lite_team', absint( $cleverfox_section_priority ) );
	}	