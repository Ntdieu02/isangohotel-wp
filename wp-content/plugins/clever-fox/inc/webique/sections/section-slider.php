 <!--===// Start: Slider
    =================================--> 
<?php 
	$webique_slider_hs 						= get_theme_mod('slider_hs','1');
	$webique_slider 						= get_theme_mod('slider',webique_get_slider_default());
	$webique_slider_autoplay				= get_theme_mod('slider_autoplay','false');
	if($webique_slider_hs=='1'){
?>	
<section id="slider-section" class="slider-wrapper">
	<div class="main-slider owl-carousel">
	<?php
			if ( ! empty( $webique_slider ) ) {
			$webique_slider = json_decode( $webique_slider );
			foreach ( $webique_slider as $webique_slide_item ) {
				$webique_repeater_title = ! empty( $webique_slide_item->title ) ? apply_filters( 'webique_translate_single_string', $webique_slide_item->title, 'slider section' ) : '';
				$webique_repeater_subtitle = ! empty( $webique_slide_item->subtitle ) ? apply_filters( 'webique_translate_single_string', $webique_slide_item->subtitle, 'slider section' ) : '';
				$webique_repeater_subtitle2 = ! empty( $webique_slide_item->subtitle2 ) ? apply_filters( 'webique_translate_single_string', $webique_slide_item->subtitle2, 'slider section' ) : '';
				$webique_repeater_description = ! empty( $webique_slide_item->description ) ? apply_filters( 'webique_translate_single_string', $webique_slide_item->description, 'slider section' ) : '';
				$webique_repeater_button = ! empty( $webique_slide_item->button) ? apply_filters( 'webique_translate_single_string', $webique_slide_item->button,'slider section' ) : '';
				$webique_repeater_button_link = ! empty( $webique_slide_item->button_link ) ? apply_filters( 'webique_translate_single_string', $webique_slide_item->button_link, 'slider section' ) : '';				
				$webique_repeater_image = ! empty( $webique_slide_item->image_url ) ? apply_filters( 'webique_translate_single_string', $webique_slide_item->image_url, 'slider section' ) : '';
				$webique_repeater_newtab = ! empty( $webique_slide_item->newtab ) ? apply_filters( 'webique_translate_single_string', $webique_slide_item->newtab, 'slider section' ) : '';
				$webique_repeater_nofollow = ! empty( $webique_slide_item->nofollow ) ? apply_filters( 'webique_translate_single_string', $webique_slide_item->nofollow, 'slider section' ) : '';
		?>
		<div class="item">
			<img src="<?php echo esc_url($webique_repeater_image); ?>" data-img-url="<?php echo esc_url($webique_repeater_image); ?>" alt="<?php echo esc_attr( $webique_repeater_title ); ?>">
			<div class="theme-slider">
				<div class="theme-table">
					<div class="theme-table-cell">
						<div class="av-container">                                
							<div class="theme-content text-left">
								<div class="sub-title-box tilt" data-animation="fadeInUp" data-delay="150ms">		
									<div><h3><?php echo esc_html( $webique_repeater_title ); ?></h3></div>									
								</div>
								<h1 data-animation="fadeInUp" data-delay="200ms"><?php echo esc_html( $webique_repeater_subtitle ); ?> <span><?php echo esc_html( $webique_repeater_subtitle2 ); ?></span></h1>                                    
								<p data-animation="fadeInUp" data-delay="500ms"><?php echo esc_html( $webique_repeater_description ); ?></p>
								<div class="avatar-get-started">
									<a data-animation="fadeInUp" data-delay="800ms" href="<?php echo esc_url($webique_repeater_button_link); ?>" <?php if($webique_repeater_newtab =='yes') {echo 'target="_blank"'; } ?> rel="<?php if($webique_repeater_newtab =='yes') {echo esc_attr('noreferrer noopener');} ?> <?php if($webique_repeater_nofollow =='yes') {echo esc_attr('nofollow');} ?>" class="av-btn av-btn-primary av-btn-bubble"><?php echo esc_html( $webique_repeater_button ); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } } ?>
	</div>
</section>
<?php } ?>