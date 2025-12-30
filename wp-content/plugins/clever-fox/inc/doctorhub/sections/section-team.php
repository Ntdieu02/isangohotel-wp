<?php  
	$medazin_doctorhub_team_title			= get_theme_mod('team_title','Our Doctors');
	$medazin_doctorhub_team_subtitle		= get_theme_mod('team_subtitle','Doctors');
	$medazin_doctorhub_team_contents			= get_theme_mod('team_contents',medazin_get_team_default());	
?>
	<!-- ================================- Doctors Section ======================== -->
    <section class="doctors-section team-home" id="doctors-section">
        <div class="bg-elements ">
			<img src="<?php echo esc_url(CLEVERFOX_PLUGIN_URL .'/inc/medazin/images/elements/element4.png'); ?>" class="element1 " alt="<?php echo esc_attr__('Image','clever-fox'); ?>">
        </div>
        <div class="container ">
            <?php if(!empty($medazin_doctorhub_team_title)  || !empty($medazin_doctorhub_team_subtitle)): ?>
				<div class="section-title text-center wow slideInDown">
					<?php if(!empty($medazin_doctorhub_team_subtitle)): ?>
						<span class="subtitle">
							<?php echo wp_kses_post($medazin_doctorhub_team_subtitle); ?>
						</span>
						<span class="title-element"> <i class="fa fa-heartbeat"></i></span>
					<?php endif; ?>
					
					<?php if(!empty($medazin_doctorhub_team_title)): ?>
						<h5>
							<?php echo wp_kses_post($medazin_doctorhub_team_title); ?>
						</h5>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			
            <div class=" doctors-carousel owl-carousel ">
				<?php
					$medazin_doctorhub_team_contents = json_decode($medazin_doctorhub_team_contents);
					if( $medazin_doctorhub_team_contents!='' )
					{
					foreach($medazin_doctorhub_team_contents as $medazin_doctorhub_team_item){
					$medazin_doctorhub_repeater_image    = ! empty( $medazin_doctorhub_team_item->image_url ) ? apply_filters( 'medazin_translate_single_string', $medazin_doctorhub_team_item->image_url, 'Team section' ) : '';
					$medazin_doctorhub_repeater_title    = ! empty( $medazin_doctorhub_team_item->title ) ? apply_filters( 'medazin_translate_single_string', $medazin_doctorhub_team_item->title, 'Team section' ) : '';
					$medazin_doctorhub_repeater_subtitle = ! empty( $medazin_doctorhub_team_item->subtitle ) ? apply_filters( 'medazin_translate_single_string', $medazin_doctorhub_team_item->subtitle, 'Team section' ) : '';
					$medazin_doctorhub_repeater_subtitle2 = ! empty( $medazin_doctorhub_team_item->subtitle2 ) ? apply_filters( 'medazin_translate_single_string', $medazin_doctorhub_team_item->subtitle2, 'Team section' ) : '';
					$medazin_doctorhub_repeater_subtitle3 = ! empty( $medazin_doctorhub_team_item->subtitle3 ) ? apply_filters( 'medazin_translate_single_string', $medazin_doctorhub_team_item->subtitle3, 'Team section' ) : '';
					$medazin_doctorhub_repeater_link = ! empty( $medazin_doctorhub_team_item->link ) ? apply_filters( 'medazin_translate_single_string', $medazin_doctorhub_team_item->link, 'Team section' ) : '';
					
				?>
					<div class="content-box wow flipInY ">
						<div class="main-wrap ">
							<?php if(!empty($medazin_doctorhub_repeater_image)): ?>
								<div class="image-wrap ">
									<img src="<?php echo esc_url($medazin_doctorhub_repeater_image); ?>" alt="<?php echo esc_attr($medazin_doctorhub_repeater_title); ?>">
								</div>
							<?php endif; ?>	
							
							<?php if(!empty($medazin_doctorhub_repeater_title) || !empty($medazin_doctorhub_repeater_subtitle)): ?>
								<div class="text-wrap ">
									<a href="#">
										<h4 class="title">
											<?php echo esc_html($medazin_doctorhub_repeater_title); ?>
										</h4>
									</a>
									<p class="desc">
										<?php echo esc_html($medazin_doctorhub_repeater_subtitle); ?>
									</p>
								</div>
							<?php endif; ?>
							
							<aside class="widget widget_social_widget ">
								<ul>
									<?php if ( ! empty( $medazin_doctorhub_repeater_team_item->social_repeater ) ) :
										$medazin_doctorhub_repeater_icons         = html_entity_decode( $medazin_doctorhub_repeater_team_item->social_repeater );
										$medazin_doctorhub_repeater_icons_decoded = json_decode( $medazin_doctorhub_repeater_icons, true );
										if ( ! empty( $medazin_doctorhub_repeater_icons_decoded ) ) : ?>
										<?php
											foreach ( $medazin_doctorhub_repeater_icons_decoded as $medazin_doctorhub_repeater_value ) {
												$medazin_doctorhub_repeater_social_icon = ! empty( $medazin_doctorhub_repeater_value['icon'] ) ? apply_filters( 'medazin_translate_single_string', $medazin_doctorhub_repeater_value['icon'], 'Team section' ) : '';
												$medazin_doctorhub_repeater_social_link = ! empty( $medazin_doctorhub_repeater_value['link'] ) ? apply_filters( 'medazin_translate_single_string', $medazin_doctorhub_repeater_value['link'], 'Team section' ) : '';
												if ( ! empty( $medazin_doctorhub_repeater_social_icon ) ) {
										?>
											<li><a href="<?php echo esc_url( $medazin_doctorhub_repeater_social_link ); ?>"><i class="fab <?php echo esc_attr( $medazin_doctorhub_repeater_social_icon ); ?>"></i></a></li>
									<?php	} } endif; endif; ?>
								</ul>
							</aside>
						</div>					
						<div class="detail-wrap ">
							<?php if(!empty($medazin_doctorhub_repeater_image)): ?>
								<div class="circle-image ">
									<img src="<?php echo esc_url($medazin_doctorhub_repeater_image); ?>" alt="<?php echo esc_attr($medazin_doctorhub_repeater_title); ?>">
								</div>
							<?php endif; ?>	
							
							<?php if(!empty($medazin_doctorhub_repeater_title) || !empty($medazin_doctorhub_repeater_subtitle)): ?>
								<div class="text-wrap ">
									<a href="#">
										<h4 class="title">
											<?php echo esc_html($medazin_doctorhub_repeater_title); ?>
										</h4>
									</a>
									<p class="desc">
										<?php echo esc_html($medazin_doctorhub_repeater_subtitle); ?>
									</p>
								</div>
							<?php endif; ?>
							<p class="achive "><span><?php echo esc_html($medazin_doctorhub_repeater_subtitle2); ?>+</span><?php echo esc_html($medazin_doctorhub_repeater_subtitle3); ?></p>
							<div class="link-wrap ">
								<a href="<?php echo esc_url($medazin_doctorhub_repeater_link); ?>"><?php echo esc_html__('Read More','clever-fox'); ?></a>
							</div>
							<aside class="widget widget_social_widget ">
								<ul>
									<?php if ( ! empty( $medazin_doctorhub_repeater_team_item->social_repeater ) ) :
										$medazin_doctorhub_repeater_icons         = html_entity_decode( $medazin_doctorhub_repeater_team_item->social_repeater );
										$medazin_doctorhub_repeater_icons_decoded = json_decode( $medazin_doctorhub_repeater_icons, true );
										if ( ! empty( $medazin_doctorhub_repeater_icons_decoded ) ) : ?>
										<?php
											foreach ( $medazin_doctorhub_repeater_icons_decoded as $medazin_doctorhub_repeater_value ) {
												$medazin_doctorhub_repeater_social_icon = ! empty( $medazin_doctorhub_repeater_value['icon'] ) ? apply_filters( 'medazin_translate_single_string', $medazin_doctorhub_repeater_value['icon'], 'Team section' ) : '';
												$medazin_doctorhub_repeater_social_link = ! empty( $medazin_doctorhub_repeater_value['link'] ) ? apply_filters( 'medazin_translate_single_string', $medazin_doctorhub_repeater_value['link'], 'Team section' ) : '';
												if ( ! empty( $medazin_doctorhub_repeater_social_icon ) ) {
										?>
											<li><a href="<?php echo esc_url( $medazin_doctorhub_repeater_social_link ); ?>"><i class="fab <?php echo esc_attr( $medazin_doctorhub_repeater_social_icon ); ?>"></i></a></li>
									<?php	} } endif; endif; ?>
								</ul>
							</aside>
						</div>
					</div>
				<?php } } ?>
            </div>
        </div>
    </section>
    <!-- ================================- End ======================== -->