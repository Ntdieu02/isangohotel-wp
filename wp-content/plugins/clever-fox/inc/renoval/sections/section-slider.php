 <!--===// Start: Slider
    =================================--> 
<?php  
	$renoval_slider 						= get_theme_mod('slider',renoval_get_slider_default());
	$renoval_slider_animation_speed			= get_theme_mod('slider_animation_speed','9000');
	$renoval_slider_autoplay				= get_theme_mod('slider_autoplay', 'true');
	$renoval_slider_loop					= get_theme_mod('slider_loop', 'true');
	$renoval_hs_slider						= get_theme_mod('hs_slider', '1');
	$renoval_settings=array('animationSpeed'=>$renoval_slider_animation_speed,'autoplay'=>$renoval_slider_autoplay,'slider_loop'=>$renoval_slider_loop);	
	
	wp_register_script('renoval-slider',get_template_directory_uri().'/assets/js/homepage/slider.js',array('jquery'),'0.0',true);
	wp_localize_script('renoval-slider','slider_settings',$renoval_settings);
	wp_enqueue_script('renoval-slider',get_template_directory_uri().'/assets/js/homepage/slider.js',array('jquery'),'0.0',true); 	
	if($renoval_hs_slider=='1'):
?>	
<!--===// Start: Slider
=====================-->
<section id="main-slider" class="main-slider-1 slider-style-2">
	<div class="row">
		<div class="col-md-12">
			<div class="home-slider owl-carousel">
				
				<?php
				if ( ! empty( $renoval_slider ) ) {
				$renoval_slider = json_decode( $renoval_slider );
				foreach ( $renoval_slider as $renoval_slide_item ) {
					$renoval_repeater_title = ! empty( $renoval_slide_item->title ) ? apply_filters( 'renoval_translate_single_string', $renoval_slide_item->title, 'slider section' ) : '';
					$renoval_repeater_subtitle = ! empty( $renoval_slide_item->subtitle ) ? apply_filters( 'renoval_translate_single_string', $renoval_slide_item->subtitle, 'slider section' ) : '';
					$renoval_repeater_subtitle2 = ! empty( $renoval_slide_item->subtitle2 ) ? apply_filters( 'renoval_translate_single_string', $renoval_slide_item->subtitle2, 'slider section' ) : '';
					$renoval_repeater_button = ! empty( $renoval_slide_item->text2) ? apply_filters( 'renoval_translate_single_string', $renoval_slide_item->text2,'slider section' ) : '';
					$renoval_repeater_link = ! empty( $renoval_slide_item->link ) ? apply_filters( 'renoval_translate_single_string', $renoval_slide_item->link, 'slider section' ) : '';
					$renoval_repeater_image = ! empty( $renoval_slide_item->image_url ) ? apply_filters( 'renoval_translate_single_string', $renoval_slide_item->image_url, 'slider section' ) : '';
					$renoval_repeater_open_new_tab = ! empty( $renoval_slide_item->open_new_tab ) ? apply_filters( 'renoval_translate_single_string',$renoval_slide_item->open_new_tab, 'slider section' ) : 'yes';
				?>
				
				<div class="item <?php if(!empty($renoval_repeater_image2)): echo esc_attr__('side-image','clever-fox'); endif; ?>">
					<?php if ( ! empty( $renoval_repeater_image ) ) : ?>
					<img src="<?php echo esc_url($renoval_repeater_image); ?>" data-img-url="<?php echo esc_url($renoval_repeater_image); ?>" alt="<?php echo esc_attr__('Image','clever-fox'); ?>" data-animation-in="zoomInImage">
					<?php endif; ?>	
					<div class="cover">
						<div class="container">
							<div class="slider-content">
								<?php if ( ! empty( $renoval_repeater_title ) ) : ?>
									<h1>
										<?php echo esc_html($renoval_repeater_title); ?> 
										<span class="slider-title">
											<?php echo esc_html($renoval_repeater_subtitle); ?>
										</span> 
									</h1>
								<?php endif; ?>
								
								<?php if ( ! empty( $renoval_repeater_subtitle2 ) ) : ?>
									<h2>
										<span class="slider-sub-title"><?php echo esc_html($renoval_repeater_subtitle2); ?></span>
									</h2> 
								<?php endif; ?>
								
								<?php if ( ! empty( $renoval_repeater_button ) ) : ?>
									<a href="<?php echo esc_url( $renoval_repeater_link ); ?>" <?php if($renoval_repeater_open_new_tab== 'yes' || $renoval_repeater_open_new_tab== '1') { echo "target='_blank'"; } ?> class="main-button"> <span><?php echo esc_html( $renoval_repeater_button ); ?></span> <i class="fa fa-angle-double-right"></i> </a>
								<?php endif; ?>
								
							</div>
						</div>
					</div>
				</div>  
				<?php } } ?>
			</div>
		</div>
	</div>
</section>
<!-- End: Slider
=======================-->
<?php endif;  ?>


<?php  
	$renoval_slider_info_contents	= get_theme_mod('slider_info_contents',renoval_get_slider_info_default());
	if ( ! empty( $renoval_slider_info_contents ) ) {
		$renoval_slider_info_contents = json_decode( $renoval_slider_info_contents );
		$renoval_hs_slider_info 			= get_theme_mod('hs_slider_info','1');
		if($renoval_hs_slider_info=='1'):
				
?>
		<!-- Start: info-section
		=======================-->
		<section id="info-section" class="info-section slider-1-info">
			<div class="container">
				<div class="info-item wow fadeInUp">
					<div class="row">
						<?php
							foreach ( $renoval_slider_info_contents as $renoval_slider_item ) {
								$renoval_repeater_icon = ! empty( $renoval_slider_item->icon_value) ? apply_filters( 'renoval_translate_single_string', $renoval_slider_item->icon_value,'slider info section' ) : '';
								$renoval_repeater_title = ! empty( $renoval_slider_item->title ) ? apply_filters( 'renoval_translate_single_string', $renoval_slider_item->title, 'slider info section' ) : '';
								$renoval_repeater_text = ! empty( $renoval_slider_item->text ) ? apply_filters( 'renoval_translate_single_string', $renoval_slider_item->text, 'slider info section' ) : '';
								$renoval_repeater_link = ! empty( $renoval_slider_item->link ) ? apply_filters( 'renoval_translate_single_string', $renoval_slider_item->link, 'slider info section' ) : '';
						?>
						<div class="col-lg-3 col-md-6">
							<div class="info-box info-effect" >
								<?php if ( ! empty( $renoval_repeater_icon ) ) { ?>
									<div class="info-icon">
										<a href="<?php echo esc_url($renoval_repeater_link); ?>">
											<i class="fa <?php echo esc_html( $renoval_repeater_icon ); ?>"></i>
										</a>
									</div>
								<?php } ?>
								
								<?php if ( ! empty( $renoval_repeater_title ) || ! empty( $renoval_repeater_text ) ) : ?>
									<div class="info-content">
										<?php if ( ! empty( $renoval_repeater_title ) ) : ?>
											<h5>
												<a href="<?php echo esc_url($renoval_repeater_link); ?>">
													<?php echo esc_html( $renoval_repeater_title ); ?>
												</a>
											</h5>
										<?php endif; ?>
										
										<?php if ( ! empty( $renoval_repeater_text ) ) : ?>
											<p>
												<?php echo esc_html( $renoval_repeater_text ); ?>
											</p>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							</div>							
						</div>
					<?php } ?>
					</div>
				</div>
			</div>
	</section>
		<!-- End: info-section
		=======================-->
	<?php endif; } ?>