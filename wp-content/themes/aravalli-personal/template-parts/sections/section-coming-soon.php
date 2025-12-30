<?php  
	$enable_comming_soon_form 	= get_theme_mod( 'enable_comming_soon_form','1'); 
	$enable_comming_soon_social = get_theme_mod( 'enable_comming_soon_social','1'); 
	$comming_soon_logo 			= get_theme_mod( 'comming_soon_logo',get_template_directory_uri() .'/assets/images/comingsoon-logo.png'); 
	$comming_soon_pg_ttl 		= get_theme_mod( 'comming_soon_pg_ttl','Aravalli is coming soon'); 	
	$comming_soon_pg_desc 		= get_theme_mod( 'comming_soon_pg_desc',"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.");
	$comming_soon_pg_time 		= get_theme_mod( 'comming_soon_pg_time','2021/01/01 12:00:00');
	$comming_soon_shortcode 	= get_theme_mod( 'comming_soon_shortcode');
	$comming_soon_social_icons 	= get_theme_mod( 'comming_soon_social_icons',aravalli_get_social_icon_default());
?>		
<section id="coming_soon" class="coming_soon">
	<div class="container">
		<div class="row">
			<?php if(!empty($comming_soon_logo) || !empty($comming_soon_pg_ttl)  || !empty($comming_soon_pg_desc)): ?>
				<div class="col-12">
					<?php if(!empty($comming_soon_logo)): ?>
						<div class="logo-soon text-center">
							<a href="index.html">
								<img src="<?php echo esc_url($comming_soon_logo); ?>" alt="">
							</a>
						</div>
					<?php endif; ?>
					
					<?php if(!empty($comming_soon_pg_ttl) || !empty($comming_soon_pg_desc)): ?>
						<div class="text-soon">
							<h1><?php echo esc_html($comming_soon_pg_ttl); ?></h1>
							<p><?php echo esc_html($comming_soon_pg_desc); ?></p>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<div class="col-12">
				<div class="fact-soon text-center">
					<div class="d-flex flex-md-row flex-wrap justify-content-center" id="countDown">                            
					</div>
				</div>
			</div>

			<div class="col-12">
				<?php if($enable_comming_soon_form=='1'): ?>
					<div class="subscribe-form-soon">
						<?php if(!empty($comming_soon_shortcode)):  echo do_shortcode($comming_soon_shortcode); else: ?>
							<form action="#">
								<div class="input-group">
									<input class="form-control" name="search2" id="search2" type="text" placeholder="Some Text Here">
									<button class="btn-shape btn-line-white" type="button">
										<i class="icofont-search-1"></i> Search
									</button>
								</div>                            
							</form>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
			<?php if($enable_comming_soon_social=='1'): ?>
				<div class="col-12 text-center mt-4">
					<div class="social-link">
						<ul>
							<?php
								$comming_soon_social_icons = json_decode($comming_soon_social_icons);
								if( $comming_soon_social_icons!='' )
								{
								foreach($comming_soon_social_icons as $social_item){	
								$social_icon = ! empty( $social_item->icon_value ) ? apply_filters( 'aravalli_translate_single_string', $social_item->icon_value, 'Coming Soon Social section' ) : '';	
								$social_link = ! empty( $social_item->link ) ? apply_filters( 'aravalli_translate_single_string', $social_item->link, 'Coming Soon Social section' ) : '';
							?>
								<li><a href="<?php echo esc_url( $social_link ); ?>" class="linkedin"><i class="fa <?php echo esc_attr( $social_icon ); ?>"></i></a></li>
							<?php }} ?>
						</ul>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
