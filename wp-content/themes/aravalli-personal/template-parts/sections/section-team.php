<?php
$pg_about_team_ttl 			= get_theme_mod( 'pg_about_team_ttl','Our'); 
$pg_about_team_sub 			= get_theme_mod( 'pg_about_team_sub','Experts'); 
$pg_about_team_desc 		= get_theme_mod( 'pg_about_team_desc',"Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry's standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book."); 
$pg_about_team_contents 	= get_theme_mod( 'pg_about_team_contents',aravalli_get_team_default());
$pg_about_team_column 		= get_theme_mod( 'pg_about_team_column','3');
?>
<section id="team" class="team-wrapper sec-default">
	<div class="container">
		<?php if(!empty($pg_about_team_ttl) || !empty($pg_about_team_sub) || !empty($pg_about_team_desc)): ?>
			<div class="row">
				<div class="col-12">
					<div class="heading-default wow fadeInUp">
					
						<?php if(!empty($pg_about_team_ttl)): ?>
							<h6><?php echo wp_kses_post($pg_about_team_ttl); ?></h6>
						<?php endif; ?>	
						
						<?php if(!empty($pg_about_team_sub)): ?>
							<h3><?php echo wp_kses_post($pg_about_team_sub); ?><span class="line-circle"></span></h3>      
						<?php endif; ?>		
						
						<?php if(!empty($pg_about_team_desc)): ?>				
							<p> <?php echo esc_html($pg_about_team_desc); ?></p>
						<?php endif; ?>		
						
					</div>
				</div>
			</div>
		<?php endif; ?>	
		<div class="row team-contents">
			<?php
				$pg_about_team_contents = json_decode($pg_about_team_contents);
				if( $pg_about_team_contents!='' )
				{
				foreach($pg_about_team_contents as $team_item){
				$image    = ! empty( $team_item->image_url ) ? apply_filters( 'aravalli_translate_single_string', $team_item->image_url, 'Team section' ) : '';
				$title    = ! empty( $team_item->title ) ? apply_filters( 'aravalli_translate_single_string', $team_item->title, 'Team section' ) : '';
				$subtitle = ! empty( $team_item->subtitle ) ? apply_filters( 'aravalli_translate_single_string', $team_item->subtitle, 'Team section' ) : '';
				
			?>
				<div class="col-lg-<?php echo esc_attr($pg_about_team_column); ?> col-md-6 col-12">
					<div class="team-member">
						<?php if ( ! empty( $image ) ): ?>
							<img class="services_cols_mn_icon" src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
						<?php endif; ?>
						<div class="team-footer">
							<div class="personal-info">
								<?php if ( ! empty( $title ) ) : ?>
									<h5><?php echo esc_html( $title ); ?></h5>
								<?php endif; ?>
								
								<?php if ( ! empty( $subtitle ) ) : ?>
									<p><?php echo esc_html( $subtitle ); ?></p>
								<?php endif; ?>
							</div>
						</div>                                                           
						<div class="social">
							<ul>
								<?php if ( ! empty( $team_item->social_repeater ) ) :
										$icons         = html_entity_decode( $team_item->social_repeater );
										$icons_decoded = json_decode( $icons, true );
										if ( ! empty( $icons_decoded ) ) : ?>
										<?php
											foreach ( $icons_decoded as $value ) {
												$social_icon = ! empty( $value['icon'] ) ? apply_filters( 'metasoft_translate_single_string', $value['icon'], 'Team section' ) : '';
												$social_link = ! empty( $value['link'] ) ? apply_filters( 'metasoft_translate_single_string', $value['link'], 'Team section' ) : '';
												if ( ! empty( $social_icon ) ) {
										?>	
											<li><a href="<?php echo esc_url( $social_link ); ?>"><i class="fa <?php echo esc_attr( $social_icon ); ?>"></i></a></li>
									<?php
											}
										}
									endif;
								endif;
								?>	
							</ul>
						</div>
					</div>
				</div>
			<?php }} ?>
		</div>
	</div>
</section>