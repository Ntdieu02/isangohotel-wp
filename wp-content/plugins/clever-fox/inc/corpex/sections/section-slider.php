 <!--===// Start: Slider
    =================================--> 
<?php  
	$corpex_slider_hs 					= get_theme_mod('slider_hs','1');
	$corpex_slider 						= get_theme_mod('slider',corpex_get_slider_default());
	$corpex_slider_autoplay				= get_theme_mod('slider_autoplay', 'true');
	$cleverfox_theme = wp_get_theme();
	if($cleverfox_theme -> name == 'Profolio'){
		wp_enqueue_script('corpex-slider',get_stylesheet_directory_uri().'/assets/js/slider.js',array('jquery'), '0.0', true);
	}
	
	if($corpex_slider_hs=='1'){
?>	
<!-- slider -->
    <section class="slider-section slider-one">
        <div id="main-slider" class="carousel slide main-slider" <?php if($corpex_slider_autoplay == 'true') {echo 'data-bs-ride="carousel"';} ?> >
            <div class="carousel-inner">
				<?php
					if ( ! empty( $corpex_slider ) ) {
					$corpex_slider = json_decode( $corpex_slider );
					$corpex_count = 1;
					foreach ( $corpex_slider as $corpex_slide_item ) {
						$corpex_repeater_title = ! empty( $corpex_slide_item->title ) ? apply_filters( 'corpex_translate_single_string', $corpex_slide_item->title, 'slider section' ) : '';
						$corpex_repeater_subtitle = ! empty( $corpex_slide_item->subtitle ) ? apply_filters( 'corpex_translate_single_string', $corpex_slide_item->subtitle, 'slider section' ) : '';
						$corpex_repeater_button = ! empty( $corpex_slide_item->text) ? apply_filters( 'corpex_translate_single_string', $corpex_slide_item->text,'slider section' ) : '';
						$corpex_repeater_link = ! empty( $corpex_slide_item->link ) ? apply_filters( 'corpex_translate_single_string', $corpex_slide_item->link, 'slider section' ) : '';
						$corpex_repeater_link2 = ! empty( $corpex_slide_item->link2 ) ? apply_filters( 'corpex_translate_single_string', $corpex_slide_item->link2, 'slider section' ) : '';
						$corpex_repeater_video_url = ! empty( $corpex_slide_item->video_url ) ? apply_filters( 'corpex_translate_single_string', $corpex_slide_item->video_url, 'slider section' ) : '';
						$corpex_repeater_image = ! empty( $corpex_slide_item->image_url2 ) ? apply_filters( 'corpex_translate_single_string', $corpex_slide_item->image_url2, 'slider section' ) : '';
						$corpex_repeater_open_new_tab = ! empty( $corpex_slide_item->open_new_tab ) ? apply_filters( 'corpex_translate_single_string',$corpex_slide_item->open_new_tab, 'slider section' ) : '';
						$corpex_repeater_link_follow_nofollow = ! empty( $corpex_slide_item->link_follow_nofollow ) ? apply_filters( 'corpex_translate_single_string',$corpex_slide_item->link_follow_nofollow, 'slider section' ) : '';
						$corpex_repeater_item_choice = ! empty( $corpex_slide_item->item_choice ) ? apply_filters( 'corpex_translate_single_string', $corpex_slide_item->item_choice, 'slider section' ) : '';
						$corpex_repeater_active_class = ($corpex_count==1)?'active':'';
				?>
					<div class="carousel-item <?php echo esc_attr($corpex_repeater_active_class); ?>">
						<div class="slide-main">
							<?php if($corpex_repeater_item_choice =='customizer_repeater_image2'): ?>
								<?php if ( ! empty( $corpex_repeater_image )  ) : ?>
									<img src="<?php echo esc_url($corpex_repeater_image); ?>" class="d-block w-100" alt="<?php echo esc_attr__('Image','clever-fox'); ?>">
								<?php endif; ?>	
							<?php else: ?>	
								<?php if ( ! empty( $corpex_repeater_video_url )  ) : 
									//echo esc_url( $video_url ); 
									$corpex_repeater_parsedUrl  = wp_parse_url($corpex_repeater_video_url);										
								 
								if ( ! empty( $corpex_repeater_parsedUrl['host'] ) ) :
									//YouTube URL
									if($corpex_repeater_parsedUrl['host'] == 'www.youtube.com' || $corpex_repeater_parsedUrl['host'] == 'youtube.com' || $corpex_repeater_parsedUrl['host'] == 'youtu.be')	{
																		
									$corpex_repeater_video_id = '';
									// Define regex patterns to match different YouTube URL formats
									$corpex_repeater_patterns = [
										'/youtu\.be\/([a-zA-Z0-9_-]{11})/',                 // youtu.be/<id>
										'/youtube\.com\/embed\/([a-zA-Z0-9_-]{11})/',       // youtube.com/embed/<id>
										'/youtube\.com\/v\/([a-zA-Z0-9_-]{11})/',           // youtube.com/v/<id>
										'/youtube\.com\/watch\?v=([a-zA-Z0-9_-]{11})/',     // youtube.com/watch?v=<id>
										'/youtube\.com\/watch\?.*&v=([a-zA-Z0-9_-]{11})/',  // Other URL parameters
										'/youtube-nocookie\.com\/embed\/([a-zA-Z0-9_-]{11})/' // youtube-nocookie.com/embed/<id>
									];

									// Try each pattern to see if it matches the given URL
									foreach ($corpex_repeater_patterns as $corpex_repeater_pattern) {
										if (preg_match($corpex_repeater_pattern, $corpex_repeater_video_url, $corpex_repeater_matches)) {
											$corpex_repeater_video_id =  $corpex_repeater_matches[1]; // Return the video ID (first captured group)
										}
									}
										
									$corpex_repeater_embed_url = "https://www.youtube.com/embed/".$corpex_repeater_video_id;
									
									?>
									<div class="overframe" ><iframe class="yt" id="slider_youtube-<?php echo esc_attr($corpex_count); ?>"  src="<?php echo esc_url($corpex_repeater_embed_url); ?>?playlist=<?php echo esc_attr($corpex_repeater_video_id); ?>&loop=1&mute=1&autoplay=1&rel=0&showinfo=0&controls=0&enablejsapi=1" title="YouTube video player" frameborder="0" allowfullscreen></iframe></div>								
									<?php
									} 
									
									 // vimeo URL
									if($corpex_repeater_parsedUrl['host'] == 'www.player.vimeo.com' || $corpex_repeater_parsedUrl['host'] == 'player.vimeo.com' || $corpex_repeater_parsedUrl['host'] == 'www.vimeo.com' || $corpex_repeater_parsedUrl['host'] == 'vimeo.com') {
										
									$corpex_repeater_pattern = '/vimeo\.com\/([a-zA-Z0-9_-]+)/';
									preg_match($corpex_repeater_pattern, $corpex_repeater_video_url, $corpex_repeater_matches);
									
									if (isset($corpex_repeater_matches[1])) {
										$corpex_repeater_video_id = $corpex_repeater_matches[1]; // Return the captured video ID
									} else {
										$corpex_repeater_video_id = ""; // Handle case where video ID is not found
									}
									?>
									
									<div class="overframe"><iframe class="vim" src="https://player.vimeo.com/video/<?php echo esc_attr($corpex_repeater_video_id); ?>?autoplay=1&loop=1&title=0&byline=0&portrait=0&muted=1&controls=0" frameborder="0" allowfullscreen></iframe></div>
									<?php
									}
									endif;	
									?>						
									
								<?php endif; //endif; ?>	
							<?php endif; ?>	
							<div class="slider-content">
								<div class="container">
									<div class="content-inner">
										<div class="play-button">
											<a href="javascript:void(0)"><i  class="fa fa-play"></i></a>
										</div>
										
										<?php if ( ! empty( $corpex_repeater_title ) ) : ?>
											<h1 class="slide-title">
												<?php echo esc_html($corpex_repeater_title); ?>	
											</h1> 
										<?php endif; ?>
										
										<?php if ( ! empty( $corpex_repeater_button ) ) : ?>
											<a href="<?php echo esc_url( $corpex_repeater_link ); ?>" <?php if($corpex_repeater_open_new_tab== 'yes' || $corpex_repeater_open_new_tab== '1') { echo "target='_blank'"; } ?> <?php if($corpex_repeater_link_follow_nofollow=='nofollow') { echo "rel='nofollow'"; } ?> class="main-btn"> <?php echo esc_html( $corpex_repeater_button ); ?> </a>
										<?php endif; ?>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php $corpex_count++; } } ?>               
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#main-slider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden"><?php echo esc_html__('Previous','clever-fox'); ?></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#main-slider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden"><?php echo esc_html__('Next','clever-fox'); ?></span>
            </button>
        </div>
    </section>
    <!-- slider -->
	<?php } ?>