<?php
	if ( ! function_exists( 'fiona_blog_below_header' ) ) :
	function fiona_blog_below_header() {?>	
		<div class="header-below d-none d-md-block">
			<div class="av-container">
				<div class="av-columns-area">
					<?php
						$fionablog_fionanews_bh_latest_news_hs	= get_theme_mod('bh_latest_news_hs','1');
						$fionablog_fionanews_bh_latest_news_ttl	= get_theme_mod('bh_latest_news_ttl',__('Latest News','clever-fox')); 
						$fionablog_fionanews_bh_latest_news_cat_id 	= get_theme_mod('bh_latest_news_cat_id');
					?>
					<div class="av-column-8 av-md-column-7">
						<div class="widget-left text-md-left text-center">
							<?php if($fionablog_fionanews_bh_latest_news_hs =='1'){ ?>
								<aside class="widget widget_breakingNews">
									<div class="breakingNews-box">
										<div class="breakingNews" id="breakingNews">
											<?php if(!empty($fionablog_fionanews_bh_latest_news_ttl)){ ?>
												<div class="bn-title"><h5><?php echo wp_kses_post($fionablog_fionanews_bh_latest_news_ttl); ?></h5><span></span></div>
											<?php } ?>	
											<div class="breakingNewss marquee">
												<?php
													$fionablog_fionanews_fiona_blog_args = array( 'post_type' => 'post', 'category_name' => $fionablog_fionanews_bh_latest_news_cat_id,'posts_per_page' => 4,'ignore_sticky_posts' => true );
													$fionablog_fionanews_fiona_blog_wp_query = new WP_Query($fionablog_fionanews_fiona_blog_args);
													if($fionablog_fionanews_fiona_blog_wp_query)
													{	
													while($fionablog_fionanews_fiona_blog_wp_query->have_posts()):$fionablog_fionanews_fiona_blog_wp_query->the_post();
												?>		
													<a href="<?php echo esc_url(get_permalink()); ?>"><span><?php the_title(); ?></span></a>
											   <?php endwhile; } wp_reset_postdata(); ?>
											</div>
										</div>
									</div>
								</aside>
							<?php } ?>
						</div>
					</div>
					<div class="av-column-4 av-md-column-5">
						<div class="widget-right text-md-right text-center">
							<aside class="widget widget_weather_date">
								<div class="trending-box">
									<?php
										$fionablog_fionanews_bh_temp_hs	 = get_theme_mod('bh_temp_hs','1');
										$fionablog_fionanews_bh_temp_api = get_theme_mod('bh_temp_api','http://api.openweathermap.org/data/2.5/weather?q=London,uk&APPID=66078b6cc6f4a920e0e653b41e1cb6ee');
										if($fionablog_fionanews_bh_temp_hs =='1' && !empty($fionablog_fionanews_bh_temp_api)){
										// $fionablog_fionanews_json = file_get_contents($fionablog_fionanews_bh_temp_api);
										// $fionablog_fionanews_weather = json_decode($fionablog_fionanews_json);
										// $fionablog_fionanews_kelvin = $fionablog_fionanews_weather->main->temp;
										// $fionablog_fionanews_celcius = $fionablog_fionanews_kelvin - 273.15;
										// $fionablog_fionanews_city =  $fionablog_fionanews_weather->name;										
										
										$fionablog_fionanews_response = wp_remote_get( $fionablog_fionanews_bh_temp_api, array(
											'sslverify' => false,
										) );
										if ( ! is_wp_error( $fionablog_fionanews_response ) && wp_remote_retrieve_response_code( $fionablog_fionanews_response ) === 200 ) :
										$fionablog_fionanews_body = wp_remote_retrieve_body( $fionablog_fionanews_response );
										$fionablog_fionanews_weather = json_decode($fionablog_fionanews_body);
										$fionablog_fionanews_currentTime = time();
										if(!empty($fionablog_fionanews_weather->main->temp) && !empty($fionablog_fionanews_weather->name)){
											$fionablog_fionanews_kelvin = $fionablog_fionanews_weather->main->temp;
											$fionablog_fionanews_celcius = $fionablog_fionanews_kelvin - 273.15;
											$fionablog_fionanews_city =  $fionablog_fionanews_weather->name;
										?>
										<div class="trending-weather is-animated">
											<i class="fa fa-sun-o"></i>
											<span class="city"><?php echo esc_html($fionablog_fionanews_city); ?></span>
											<span class="weather-current-temp"> <?php echo esc_html(substr($fionablog_fionanews_celcius,0,3)); ?> <sup>℃</sup> </span>
										</div>
									<?php
										}else{ echo esc_html__('Please Enter Valid API Key','clever-fox');}
										else :
											echo esc_html__( 'Failed to fetch weather data', 'clever-fox' );
										endif;
										}
										$fionablog_fionanews_bh_date_hs	= get_theme_mod('bh_date_hs','1');
										if($fionablog_fionanews_bh_date_hs =='1'){
									?>
										<div class="trending-date">
											<?php  echo '<span class="t-day">'. esc_html(date_i18n('j', 	strtotime(current_time("d"))) ).'</span>';
											echo '<span class="t-all">'. esc_html(date_i18n('M Y', strtotime(current_time("Y-m"))) ).'</span>';
											?>
										</div>
									<?php } ?>
							    </div>
							</aside>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php 
} endif;
add_action('fiona_blog_below_header', 'fiona_blog_below_header');
