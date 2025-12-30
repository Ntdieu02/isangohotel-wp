 <!--===// Start: Slider
    =================================--> 
<?php  
if ( ! function_exists( 'cleverfox_boostify_lite_slider' ) ) :
	function cleverfox_boostify_lite_slider() {
	$boostify_slider 			= get_theme_mod('slider',boostify_get_slider_default());	
	$boostify_slider_opacity		= get_theme_mod('slider_opacity','0.75');
?>	
<section id="main-sliders" class="main-sliders">
	<div class="row">
		<div class="col-md-12">
			<div class="header-slider">
				<?php
				if ( ! empty( $boostify_slider ) ) {
				$boostify_slider = json_decode( $boostify_slider );
				foreach ( $boostify_slider as $boostify_slide_item ) {
					$boostify_repeater_title = ! empty( $boostify_slide_item->title ) ? apply_filters( 'boostify_translate_single_string', $boostify_slide_item->title, 'slider section' ) : '';
					$boostify_repeater_subtitle = ! empty( $boostify_slide_item->subtitle ) ? apply_filters( 'boostify_translate_single_string', $boostify_slide_item->subtitle, 'slider section' ) : '';
					$boostify_repeater_text = ! empty( $boostify_slide_item->text ) ? apply_filters( 'boostify_translate_single_string', $boostify_slide_item->text, 'slider section' ) : '';
					$boostify_repeater_button = ! empty( $boostify_slide_item->text2) ? apply_filters( 'boostify_translate_single_string', $boostify_slide_item->text2,'slider section' ) : '';
					$boostify_repeater_link = ! empty( $boostify_slide_item->link ) ? apply_filters( 'boostify_translate_single_string', $boostify_slide_item->link, 'slider section' ) : '';
					$boostify_repeater_image = ! empty( $boostify_slide_item->image_url ) ? apply_filters( 'boostify_translate_single_string', $boostify_slide_item->image_url, 'slider section' ) : '';
					$boostify_repeater_image2 = ! empty( $boostify_slide_item->image_url2 ) ? apply_filters( 'boostify_translate_single_string', $boostify_slide_item->image_url2, 'slider section' ) : '';
					$boostify_repeater_open_new_tab = ! empty( $boostify_slide_item->open_new_tab ) ? apply_filters( 'boostify_translate_single_string', $boostify_slide_item->open_new_tab, 'slider section' ) : '';
					$boostify_repeater_align = ! empty( $boostify_slide_item->slide_align ) ? apply_filters( 'boostify_translate_single_string', $boostify_slide_item->slide_align, 'slider section' ) : '';
			?>
				<div class="header-single-slider">
					<figure>
						<?php if ( ! empty( $boostify_repeater_image ) ) : ?>
							<img src="<?php echo esc_url( $boostify_repeater_image ); ?>" alt="">
						<?php endif; ?>
						<div class="content" style="background:rgb(<?php echo "24 25 27 /". esc_attr($boostify_slider_opacity) ;?>)">
							<div class="slide-table">
								<div class="slide-table-cell">
									<div class="container">
										<div class="row slide-<?php echo esc_attr($boostify_repeater_align); ?>">
											<div class="col-md-7 my-auto">
												<div class="slide-content" style="<?php if ( empty( $boostify_repeater_image ) ) : ?>margin-top: 40px;<?php endif; ?>">
													<?php if ( ! empty( $boostify_repeater_title ) || ! empty( $boostify_repeater_subtitle )) : ?>
														<h1 data-animation="fadeInUp" data-delay="200ms"><b><?php echo esc_html( $boostify_repeater_title ); ?></b> <br> <?php echo esc_html( $boostify_repeater_subtitle ); ?></h1>
													<?php endif; ?>
													
													<?php if ( ! empty( $boostify_repeater_text ) ) : ?>
														<p data-animation="fadeInUp" data-delay="500ms"><?php echo esc_html( $boostify_repeater_text ); ?></p>
													<?php endif; ?>
													
													<?php if ( ! empty( $boostify_repeater_button ) ) : ?>
														<a data-animation="fadeInUp" data-delay="800ms" href="<?php echo esc_url( $boostify_repeater_link ); ?>" <?php if($boostify_repeater_open_new_tab== 'yes' || $boostify_repeater_open_new_tab== '1') { echo "target='_blank'"; } ?> class="boxed-btn"><?php echo esc_html( $boostify_repeater_button ); ?></a>
													<?php endif; ?>
													
												</div>
											</div>
											<?php if ( ! empty( $boostify_repeater_image2 ) ) : ?>
												<div class="col-md-5 my-auto mx-auto">
													<div class="boostify-img" data-animation="flipInY" data-delay="1000ms">
														<img src="<?php echo esc_url( $boostify_repeater_image2 ); ?>">
													</div>
												</div>
											<?php endif; ?>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</figure>
				</div>
			<?php } } ?>
			</div>
		</div>
	</div>
	<div class="element-circle">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element/bg-circle2.png" alt="image" class="img-out img-fluid">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element/bg-circle1.png" alt="image" class="img-in2 img-fluid">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element/bg-circle3.png" alt="image" class="img-in3 img-fluid">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element/animation-boll2.png" alt="image" class="img-in4 img-fluid">
	</div>
	<div class="element-circle2">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element/bg-circle2.png" alt="image" class="img-out img-fluid">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element/bg-circle1.png" alt="image" class="img-in2 img-fluid">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element/bg-circle3.png" alt="image" class="img-in3 img-fluid">
	</div>
	<div class="animation-roated">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element/roted-animated.png">
	</div>
	<div class="animation-dotted">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element/animation-dotted.png">
	</div>
	<div class="animation-boll">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element/animation-boll.png">
	</div>
	<div class="animation-dot-div">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element/dots-div.png" class="dots-div1">  
	</div>
	<div class="animation-dotted-div">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element/dots-div2.png" class="dots-div2">
	</div>
	<div class="animation-cricle">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element/cricle-boll.png">
	</div>
</section>    

<?php	
	}
endif;
if ( function_exists( 'cleverfox_boostify_lite_slider' ) ) {
$cleverfox_section_priority = apply_filters( 'boostify_section_priority', 11, 'cleverfox_boostify_lite_slider' );
add_action( 'boostify_sections', 'cleverfox_boostify_lite_slider', absint( $cleverfox_section_priority ) );
}