<?php
/*
 *
 * Social Icon
 */
 function news25_get_social_icon_default() {
	 return apply_filters(
		'news25_get_social_icon_default', json_encode(
				 array(
				array(
					'title'           => esc_html__( 'facebook', 'clever-fox' ),
					'icon_value'	  =>  esc_html__( 'fa-facebook', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_header_social_001',
				),
				array(
					'title'           => esc_html__( 'twitter', 'clever-fox' ),
					'icon_value'	  =>  esc_html__( 'fa-twitter', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_header_social_002',
				),
				array(
					'title'           => esc_html__( 'instagram', 'clever-fox' ),
					'icon_value'	  =>  esc_html__( 'fa-instagram', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_header_social_003',
				),
				array(
					'title'           => esc_html__( 'pinterest', 'clever-fox' ),
					'icon_value'	  =>  esc_html__( 'fa-pinterest-p', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_header_social_004',
				),
				array(
					'title'           => esc_html__( 'youtube', 'clever-fox' ),
					'icon_value'	  =>  esc_html__( 'fa-youtube-play', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_header_social_005',
				),
				array(
					'title'           => esc_html__( 'envelope', 'clever-fox' ),
					'icon_value'	  =>  esc_html__( 'fa-envelope', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_header_social_006',
				),
			)
		)
	);
}

function news25_social_widget(){ 
	$social_icons 	= get_theme_mod('social_icons',news25_get_social_icon_default());
?>
	<aside class="widget widget_social_widget">
		<h2><?php //echo esc_html($abv_hdr_social_ttl); ?></h2>
		<ul>
			<?php
				$social_icons = json_decode($social_icons);
				if( $social_icons!='' )
				{
				foreach($social_icons as $social_item){	
				$social_icon = ! empty( $social_item->icon_value ) ? apply_filters( 'news25_translate_single_string', $social_item->icon_value, 'Header section' ) : '';
				$social_link = ! empty( $social_item->link ) ? apply_filters( 'news25_translate_single_string', $social_item->link, 'Header section' ) : '';
			?>
				<li><a href="<?php echo esc_url( $social_link ); ?>"><i class="fa <?php echo esc_attr( $social_icon ); ?>"></i></a></li>
			<?php }} ?>
		</ul>
	</aside>
<?php }


function news25_custom_html_text() {
	$abv_hdr_second_custom 	= get_theme_mod('abv_hdr_second_custom','<a href="javascript:void(0)" class="btn mode dark-mode-switch"><i class="fa fa-moon-o" aria-hidden="true"></i></a>  <a href="javascript:void(0)" class="btn advetise border"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Advertise with us</a>');
	
	echo wp_kses_post($abv_hdr_second_custom);
}

if ( ! function_exists( 'news25_local_time' ) ) :
function news25_local_time(){ ?>
		<aside class="widget widget-date-time flex gap-lg-2">
		<?php $bh_time_hs = get_theme_mod('bh_time_hs', '1');
			if($bh_time_hs == '1' ) { ?>
		<div class="date">
			<?php
				$timezone = new DateTimeZone('UTC');
				$date = new DateTime('now', $timezone);

				echo wp_kses_post('<span class="day">' . $date->format('j') . '</span>');
				echo '<div>';
				echo wp_kses_post('<span class="month">' . $date->format('M') . '</span>');
				echo wp_kses_post('<span class="year">' . $date->format('Y') . '</span>');
				echo '</div>';
			?>
		</div>
		
		<div id="live-time" class="live-time"></div>
		<?php } ?>
		<script>
			function updateTime() {
				const now = new Date();
				const timeString = now.toLocaleTimeString('en-EN', {
					hour: 'numeric',
					minute: 'numeric',
					second: 'numeric',
					hour12: true,
				});
				document.getElementById('live-time').innerText = timeString;
			}

			// Update every second
			setInterval(updateTime, 1000);
			updateTime(); // run once immediately
		</script>
		</aside>
		<div class="widget widget-temperature-air">
			<ul>
				<?php
					$bh_temp_hs = get_theme_mod('bh_temp_hs', '1');
					$api_key = get_theme_mod('bh_temp_api_key', '9a796d360bc3b41cbdb3641c1d487b07'); // Get from Customizer

					if ($bh_temp_hs == '1') {
					echo '<li>';
						if (!empty($api_key)) {

							$city = get_theme_mod('bh_temp_city', 'London');
							$bh_temp_api = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$api_key}";

							$response = wp_remote_get($bh_temp_api, array('sslverify' => true));

							if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
								$body = wp_remote_retrieve_body($response);
								$weather = json_decode($body);

								if (!empty($weather->main->temp) && !empty($weather->name)) {
									$kelvin = $weather->main->temp;
									$celcius = round($kelvin - 273.15);
									$city = $weather->name;
									?>
									<span id="cityName"><?php echo esc_html($city); ?></span>
									<i class="fa fa-cloud"></i>
									<span id="temp"><?php echo esc_html($celcius); ?> ℃</span>
									<?php
								} else {
									echo esc_html__('Invalid weather data.', 'clever-fox');
								}
							} else {
								echo esc_html__('Failed to fetch weather data.', 'clever-fox');
							}

						} else {
							echo esc_html__('Weather feature not enabled or API key missing.', 'clever-fox');
						}
					echo '</li>';
					}
					?>
				
					<?php
					$bh_temp_api_key_hs = get_theme_mod('bh_temp_api_key_hs', '1');
					$city    = get_theme_mod('bh_temp_city', 'London');

					if ( $bh_temp_api_key_hs == '1' ) {
					echo '<li>';
						if (!empty($api_key) && !empty($city)) {

							// Step 1: Get coordinates of the city using Geocoding API
							$geo_url = "http://api.openweathermap.org/geo/1.0/direct?q=" . urlencode($city) . "&limit=1&appid=" . $api_key;
							$geo_response = wp_remote_get($geo_url);

							if (!is_wp_error($geo_response) && wp_remote_retrieve_response_code($geo_response) === 200) {
								$geo_data = json_decode(wp_remote_retrieve_body($geo_response));

								if (!empty($geo_data[0]->lat) && !empty($geo_data[0]->lon)) {
									$lat = $geo_data[0]->lat;
									$lon = $geo_data[0]->lon;

									// Step 2: Fetch AQI data
									$aqi_url = "http://api.openweathermap.org/data/2.5/air_pollution?lat={$lat}&lon={$lon}&appid={$api_key}";
									$aqi_response = wp_remote_get($aqi_url);

									if (!is_wp_error($aqi_response) && wp_remote_retrieve_response_code($aqi_response) === 200) {
										$aqi_data = json_decode(wp_remote_retrieve_body($aqi_response));

										if (!empty($aqi_data->list[0]->main->aqi)) {
											$aqi_value = $aqi_data->list[0]->main->aqi;

											// Convert AQI index (1–5) to label
											$aqi_levels = array(
												1 => __('Good', 'clever-fox'),
												2 => __('Fair', 'clever-fox'),
												3 => __('Moderate', 'clever-fox'),
												4 => __('Poor', 'clever-fox'),
												5 => __('Very Poor', 'clever-fox'),
												6 => __('Severe', 'clever-fox'),
											);
											$aqi_label = isset($aqi_levels[$aqi_value]) ? $aqi_levels[$aqi_value] : __('Unknown', 'clever-fox');
											?>
											<?php echo esc_html__('AQI:','clever-fox'); ?><span id="aqi"><?php echo esc_html($aqi_value); ?></span> <i class="fa fa-circle"></i> <span id="aqiCategory"><?php echo esc_html($aqi_label); ?></span>
											<?php
										} else {
											echo esc_html__('Unable to fetch AQI value.', 'clever-fox');
										}
									} else {
										echo esc_html__('Failed to fetch AQI data.', 'clever-fox');
									}
								} else {
									echo esc_html__('Failed to get location coordinates.', 'clever-fox');
								}
							} else {
								echo esc_html__('Failed to fetch location data.', 'clever-fox');
							}

						} else {
							echo esc_html__('Please enter your API key and city in the Customizer.', 'clever-fox');
						}
						echo '</li>';
					}
					?>
				
				<li>
				<?php
					news25_header_widget_area_first(); ?>
				</li>
			</ul>
		</div> 
<?php } endif;


// Estimated reading time
	function news25_get_estimated_reading_time($content = '') {
				if (empty($content)) {
						$content = get_post_field('post_content', get_the_ID());
				}

				// Strip tags and shortcodes
				$text = strip_shortcodes(wp_strip_all_tags($content));
									
				// Word count
				$word_count = str_word_count($text);

				// Reading speed (words per minute)
				$words_per_minute = 200;

				// Calculate time
				$minutes = ceil($word_count / $words_per_minute);

				return 'Est '. $minutes . ' min ';
			} 
								
// Post views count increment function
function news25_set_post_views($postID) {
		$key = 'post_views_count';
		$count = get_post_meta($postID, $key, true);
		if($count == ''){
			$count = 0;
			delete_post_meta($postID, $key);
			add_post_meta($postID, $key, '0');
		} else {
			$count++;
			update_post_meta($postID, $key, $count);
		}
}

// To retrieve post views count
function news25_get_post_views($postID){
		$key = 'post_views_count';
		$count = get_post_meta($postID, $key, true);
		if($count == ''){
			return "0 Views";
		}
		return '<i class="fa fa-eye"></i> ' . $count . ' Views';
}

if(! function_exists('news25_media_player_video')){
function news25_media_player_video($video_url, $video_id) {	
	if($video_url):
		$is_youtube = false;
		$is_vimeo = false;
		if (strpos($video_url, 'youtube.com') !== false || strpos($video_url, 'youtu.be') !== false) {
			$is_youtube = true;
			if (strpos($video_url, 'youtube.com') !== false) {
				parse_str(parse_url($video_url, PHP_URL_QUERY), $url_params);
				$video_url = isset($url_params['v']) ? $url_params['v'] : '';
			} elseif (strpos($video_url, 'youtu.be') !== false) {
				$video_url = ltrim(parse_url($video_url, PHP_URL_PATH), '/');
			}
		}
		if (strpos($video_url, 'vimeo.com') !== false ) {
			$is_vimeo = true;
			$video_url = preg_replace('/[^0-9]/', '', $video_url);
		}		
		?>
		<?php if($is_vimeo): ?>
			<!-- Vimeo Player -->
			<div class="js-player" data-plyr-provider="vimeo" data-plyr-embed-id="<?php echo esc_attr($video_url); ?>"></div> 
		<?php 
		endif;		
		if($is_youtube): ?>
			<!-- YouTube Player -->
			<div class="js-player" data-plyr-provider="youtube"  data-plyr-embed-id="<?php echo esc_attr($video_url); ?>"></div>	
<?php	
		endif;
 
	elseif ( $video_id ) :
		$video_url = wp_get_attachment_url( $video_id );
		if ( $video_url ) :
	echo '<video controls playsinline style="width:100%;">
			<source src="'.esc_url($video_url).'" type="video/mp4">
		</video>';
	endif;
	endif;
} }
add_action('news25_media_player_video','news25_media_player_video');

if(!function_exists('news25_empty_post_select_msg')):
	function news25_empty_post_select_msg() {
		 $data = array( 'post_type' => 'post', 'category__in' => ' ');	
		echo '<p style="color: initial; font-size: 14px;"><a href="#">'.esc_html__('Select Category From Customizer','clever-fox').'</a></p>';
		 
		return $data;
	}
endif;