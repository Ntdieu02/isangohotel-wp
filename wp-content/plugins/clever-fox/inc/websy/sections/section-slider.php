<!--===// Start: Slider Section
            =================================--> 
<?php  
	$webique_websy_slider_hs 						= get_theme_mod('slider_hs','1');
	$webique_websy_slider 						= get_theme_mod('slider',webique_get_slider_default());
	$webique_websy_slider_autoplay				= get_theme_mod('slider_autoplay','false');
	if($webique_websy_slider_hs=='1'){
	if ( ! empty( $webique_websy_slider ) ) {
	$webique_websy_slider = json_decode( $webique_websy_slider );
?>	
<section id="slider-section" class="slider-wrapper style2">
	<div class="main-slider2 owl-carousel">
	<?php
			foreach ( $webique_websy_slider as $webique_websy_slide_item ) {
				$webique_websy_repeater_title = ! empty( $webique_websy_slide_item->title ) ? apply_filters( 'webique_translate_single_string', $webique_websy_slide_item->title, 'slider section' ) : '';
				$webique_websy_repeater_subtitle = ! empty( $webique_websy_slide_item->subtitle ) ? apply_filters( 'webique_translate_single_string', $webique_websy_slide_item->subtitle, 'slider section' ) : '';
				$webique_websy_repeater_subtitle2 = ! empty( $webique_websy_slide_item->subtitle2 ) ? apply_filters( 'webique_translate_single_string', $webique_websy_slide_item->subtitle2, 'slider section' ) : '';
				$webique_websy_repeater_description = ! empty( $webique_websy_slide_item->description ) ? apply_filters( 'webique_translate_single_string', $webique_websy_slide_item->description, 'slider section' ) : '';
				$webique_websy_repeater_button = ! empty( $webique_websy_slide_item->button) ? apply_filters( 'webique_translate_single_string', $webique_websy_slide_item->button,'slider section' ) : '';
				$webique_websy_repeater_button_link = ! empty( $webique_websy_slide_item->button_link ) ? apply_filters( 'webique_translate_single_string', $webique_websy_slide_item->button_link, 'slider section' ) : '';				
				$webique_websy_repeater_image2 = ! empty( $webique_websy_slide_item->image_url2 ) ? apply_filters( 'webique_translate_single_string', $webique_websy_slide_item->image_url2, 'slider section' ) : '';
				$webique_websy_repeater_newtab = ! empty( $webique_websy_slide_item->newtab ) ? apply_filters( 'webique_translate_single_string', $webique_websy_slide_item->newtab, 'slider section' ) : '';
				$webique_websy_repeater_nofollow = ! empty( $webique_websy_slide_item->nofollow ) ? apply_filters( 'webique_translate_single_string', $webique_websy_slide_item->nofollow, 'slider section' ) : '';				
		?>
		<div class="item">			
			<div class="theme-slider">
				<div class="theme-table">
					<div class="theme-table-cell">
						<div class="av-container">                                
							<div class="theme-content text-left">
							<?php if(!empty($webique_websy_repeater_title)){ ?>
								<div class="sub-title-box tilt" data-animation="fadeInUp" data-delay="150ms">		
									<div><h3><?php echo esc_html( $webique_websy_repeater_title ); ?></h3></div>									
								</div>
							<?php } ?>
							<?php if(!empty($webique_websy_repeater_subtitle)|| !empty($webique_websy_repeater_subtitle2)){ ?>
								<h1 data-animation="fadeInUp" data-delay="200ms"><?php echo esc_html( $webique_websy_repeater_subtitle ); ?> <span><?php echo esc_html( $webique_websy_repeater_subtitle2 ); ?></span></h1>
							<?php } ?>
							<?php if(!empty($webique_websy_repeater_description)){ ?>                                    
								<p data-animation="fadeInUp" data-delay="500ms"><?php echo esc_html( $webique_websy_repeater_description ); ?></p>
							<?php } ?>
								<div class="avatar-get-started">
								<?php if(!empty($webique_websy_repeater_button)) { ?>
									<a data-animation="fadeInUp" data-delay="800ms" href="<?php echo esc_url($webique_websy_repeater_button_link); ?>" <?php if($webique_websy_repeater_newtab =='yes') {echo 'target="_blank"'; } ?> rel="<?php if($webique_websy_repeater_newtab =='yes') {echo 'noreferrer noopener';} ?> <?php if($webique_websy_repeater_nofollow =='yes') {echo 'nofollow';} ?>" class="av-btn av-btn-primary av-btn-bubble"><?php echo esc_html( $webique_websy_repeater_button ); ?></a>
								<?php } ?>
					
								</div>
							</div>
							<div class="theme-content-offer aline-right" data-animation="fadeInUp" data-delay="200ms">
								<div class="award-badge side-img zig-zag2">
								<?php if(!empty($webique_websy_repeater_image2)): ?>
									<img src="<?php echo esc_url($webique_websy_repeater_image2); ?>" data-img-url="<?php echo esc_url($webique_websy_repeater_image2); ?>" alt="<?php echo esc_attr( $webique_websy_repeater_title ); ?>">
								<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php }  ?>	
	</div>
	<div class="thumb-box">
		<div class="av-container p-0">         
			<div class="owl-carousel owl-thumbs-main">
			<?php 
			foreach ( $webique_websy_slider as $webique_websy_index => $webique_websy_slide_item ) {
			$webique_websy_repeater_image2 = ! empty( $webique_websy_slide_item->image_url2 ) ? apply_filters( 'webique_translate_single_string', $webique_websy_slide_item->image_url2, 'slider section' ) : '';
		?><?php if(!empty($webique_websy_repeater_image2)): ?>
				<div class="item"><img src="<?php echo esc_url($webique_websy_repeater_image2); ?>" alt="<?php esc_attr_e('Thumb ' ,'clever-fox'). $webique_websy_index; ?>"></div>
			<?php endif; } ?>				
			</div>
		</div>
	</div>
</section>
	<?php } } ?>