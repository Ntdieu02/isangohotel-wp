<?php  
	$nexcraft_bpo_team_title				= get_theme_mod('team_title','Team');
	$nexcraft_bpo_team_description		= get_theme_mod('team_description','Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur quisquam saepe eveniet, cumque tempore veritatis!');
	$nexcraft_bpo_team_contents			= get_theme_mod('team_contents',nexcraft_get_team_default());
	$nexcraft_bpo_team_sec_column		= get_theme_mod('team_sec_column','3');  
	$nexcraft_bpo_team_bg_position		= get_theme_mod('team_bg_position','fixed');
?>
<!-- team  -->
    <section class="team-section"  id="team-section">
        <div class="container">
            <?php if(!empty($nexcraft_bpo_team_title) || !empty($nexcraft_bpo_team_description)): ?>
				<div class="section-title col-lg-6 mx-auto">
					<?php if(!empty($nexcraft_bpo_team_title)): ?>
						<h2 class="maintitle">
						<svg xmlns="http://www.w3.org/2000/svg" width="54" height="27" viewBox="0 0 54 27" style="fill: var(--primary-color);" class="desg1"><path id="Rectangle_2_copy_3" data-name="Rectangle 2 copy 3" class="cls-1" d="M1156 147h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1A2 2 0 0 1 1156 147Zm7 0h5a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-5a2 2 0 0 1-2-2v-1A2 2 0 0 1 1163 147Zm3 13h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1A2 2 0 0 1 1166 160Zm7 0h8a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-8a2 2 0 0 1-2-2v-1A2 2 0 0 1 1173 160Zm-11.5 11a1.5 1.5 0 1 1-1.5 1.5A1.5 1.5 0 0 1 1161.5 171Zm4 0h3a1.5 1.5 0 0 1 0 3h-3A1.5 1.5 0 0 1 1165.5 171Zm7 0h7a1.5 1.5 0 0 1 0 3h-7A1.5 1.5 0 0 1 1172.5 171Zm16.5-11h17a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-17a2 2 0 0 1-2-2v-1A2 2 0 0 1 1189 160Z" transform="translate(-1154 -147)"/></svg>
						
							<span><?php echo wp_kses_post($nexcraft_bpo_team_title); ?></span>
						
						<svg xmlns="http://www.w3.org/2000/svg" width="54" height="27" viewBox="0 0 54 27" style="fill: var(--primary-color);"><path id="Rectangle_2_copy_3" data-name="Rectangle 2 copy 3" class="cls-1" d="M1156 147h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1A2 2 0 0 1 1156 147Zm7 0h5a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-5a2 2 0 0 1-2-2v-1A2 2 0 0 1 1163 147Zm3 13h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1A2 2 0 0 1 1166 160Zm7 0h8a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-8a2 2 0 0 1-2-2v-1A2 2 0 0 1 1173 160Zm-11.5 11a1.5 1.5 0 1 1-1.5 1.5A1.5 1.5 0 0 1 1161.5 171Zm4 0h3a1.5 1.5 0 0 1 0 3h-3A1.5 1.5 0 0 1 1165.5 171Zm7 0h7a1.5 1.5 0 0 1 0 3h-7A1.5 1.5 0 0 1 1172.5 171Zm16.5-11h17a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-17a2 2 0 0 1-2-2v-1A2 2 0 0 1 1189 160Z" transform="translate(-1154 -147)"/></svg>
					</h2>
					<?php endif; ?>
					
					<?php if(!empty($nexcraft_bpo_team_description)): ?>
						<p>
							<?php echo esc_html($nexcraft_bpo_team_description); ?>
						</p>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			
            <div class="row">
				<?php
					$nexcraft_bpo_team_contents = json_decode($nexcraft_bpo_team_contents);
					if( $nexcraft_bpo_team_contents!='' )
					{
					foreach($nexcraft_bpo_team_contents as $nexcraft_bpo_team_item){
					$nexcraft_bpo_repeater_icon   = ! empty( $nexcraft_bpo_team_item->icon_value ) ? apply_filters( 'nexcraft_translate_single_string', $nexcraft_bpo_team_item->icon_value, 'Team section' ) : '';
					$nexcraft_bpo_repeater_image    = ! empty( $nexcraft_bpo_team_item->image_url2 ) ? apply_filters( 'nexcraft_translate_single_string', $nexcraft_bpo_team_item->image_url2, 'Team section' ) : '';
					$nexcraft_bpo_repeater_title    = ! empty( $nexcraft_bpo_team_item->title ) ? apply_filters( 'nexcraft_translate_single_string', $nexcraft_bpo_team_item->title, 'Team section' ) : '';
					$nexcraft_bpo_repeater_subtitle = ! empty( $nexcraft_bpo_team_item->subtitle ) ? apply_filters( 'nexcraft_translate_single_string', $nexcraft_bpo_team_item->subtitle, 'Team section' ) : '';
				?>			
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="team">
							<?php if(!empty($nexcraft_bpo_repeater_image)): ?>
								<div class="team-image">
									<img src="<?php echo esc_url($nexcraft_bpo_repeater_image); ?>" alt="<?php echo esc_attr($nexcraft_bpo_repeater_title); ?>">
								</div>
							<?php endif; ?>	
							
							
							<div class="team-content">
								<?php if(!empty($nexcraft_bpo_repeater_title) || !empty($nexcraft_bpo_repeater_subtitle)): ?>
									<div class="icon">
										<i class="fas <?php echo esc_attr($nexcraft_bpo_repeater_icon); ?>"></i>
									</div>
									<h2>
										<?php if($nexcraft_bpo_repeater_title): echo esc_html($nexcraft_bpo_repeater_title); endif; ?>
									</h2>
									<span>
										<?php if($nexcraft_bpo_repeater_subtitle): echo esc_html($nexcraft_bpo_repeater_subtitle); endif; ?>
									</span>
								<?php endif; ?>
								
								<aside class="widget widget_social_widget">
									<ul>
										<?php if ( ! empty( $nexcraft_bpo_repeater_team_item->social_repeater ) ) :
											$nexcraft_bpo_repeater_icons         = html_entity_decode( $nexcraft_bpo_repeater_team_item->social_repeater );
											$nexcraft_bpo_repeater_icons_decoded = json_decode( $nexcraft_bpo_repeater_icons, true );
											if ( ! empty( $nexcraft_bpo_repeater_icons_decoded ) ) : ?>
											<?php
												foreach ( $nexcraft_bpo_repeater_icons_decoded as $nexcraft_bpo_repeater_value ) {
													$nexcraft_bpo_repeater_social_icon = ! empty( $nexcraft_bpo_repeater_value['icon'] ) ? apply_filters( 'nexcraft_translate_single_string', $nexcraft_bpo_repeater_value['icon'], 'Team section' ) : '';
													$nexcraft_bpo_repeater_social_link = ! empty( $nexcraft_bpo_repeater_value['link'] ) ? apply_filters( 'nexcraft_translate_single_string', $nexcraft_bpo_repeater_value['link'], 'Team section' ) : '';
													if ( ! empty( $nexcraft_bpo_social_icon ) ) {
											?>
												<li><a href="<?php echo esc_url( $nexcraft_bpo_repeater_social_link ); ?>"><i class=" fab <?php echo esc_attr( $nexcraft_bpo_repeater_social_icon ); ?>"></i></a></li>
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