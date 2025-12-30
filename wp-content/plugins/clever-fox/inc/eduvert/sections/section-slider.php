<?php  
if ( ! function_exists( 'cleverfox_eduvert_lite_slider' ) ) :
	function cleverfox_eduvert_lite_slider() {
	$eduvert_slider 					= get_theme_mod('slider',eduvert_get_slider_default());
	$eduvert_slider_bg_element_enable	= get_theme_mod('slider_bg_element_enable','1'); 	
?>	
<section id="slider-section" class="slider-wrapper slider-home">
	<?php if($eduvert_slider_bg_element_enable=='1'): ?>
		<div class="bg-shape1"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Group-2.png" alt=""></div>
		<div class="bg-shape2"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-2.png" alt=""></div>
		<div class="bg-shape3"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-9.png" alt=""></div>
		<div class="bg-shape4"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-9.png" alt=""></div>
		<div class="bg-shape5"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-9.png" alt=""></div>
		<div class="bg-shape6"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-9.png" alt=""></div>
		<div class="bg-shape7"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-9.png" alt=""></div>
		<div class="bg-shape8"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-9.png" alt=""></div>
		<div class="bg-shape9"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-9.png" alt=""></div>
		<div class="bg-shape10"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector.png" alt=""></div>
		<div class="bg-shape11"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Group-6.png" alt=""></div>
		<div class="bg-shape12"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Group-3.png" alt=""></div>
		<div class="bg-shape13"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Group.png" alt=""></div>
		<div class="bg-shape14"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Group-1.png" alt=""></div>
		<div class="bg-shape15"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Shape.png" alt=""></div>
		<div class="bg-shape16"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Group-5.png" alt=""></div>
		<div class="bg-shape17"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-9.png" alt=""></div>
	<?php endif; ?>
	<div class="main-slider owl-carousel owl-theme">
		<?php
			if ( ! empty( $eduvert_slider ) ) {
			$eduvert_slider = json_decode( $eduvert_slider );
			foreach ( $eduvert_slider as $eduvert_slide_item ) {
				$eduvert_repeater_title = ! empty( $eduvert_slide_item->title ) ? apply_filters( 'eduvert_translate_single_string', $eduvert_slide_item->title, 'slider section' ) : '';
				$eduvert_repeater_subtitle = ! empty( $eduvert_slide_item->subtitle ) ? apply_filters( 'eduvert_translate_single_string', $eduvert_slide_item->subtitle, 'slider section' ) : '';
				$eduvert_repeater_subtitle2 = ! empty( $eduvert_slide_item->subtitle2 ) ? apply_filters( 'eduvert_translate_single_string', $eduvert_slide_item->subtitle2, 'slider section' ) : '';
				$eduvert_repeater_text = ! empty( $eduvert_slide_item->text ) ? apply_filters( 'eduvert_translate_single_string', $eduvert_slide_item->text, 'slider section' ) : '';
				$eduvert_repeater_button = ! empty( $eduvert_slide_item->text2) ? apply_filters( 'eduvert_translate_single_string', $eduvert_slide_item->text2,'slider section' ) : '';
				$eduvert_repeater_link = ! empty( $eduvert_slide_item->link ) ? apply_filters( 'eduvert_translate_single_string', $eduvert_slide_item->link, 'slider section' ) : '';
				$eduvert_repeater_image = ! empty( $eduvert_slide_item->image_url ) ? apply_filters( 'eduvert_translate_single_string', $eduvert_slide_item->image_url, 'slider section' ) : '';
		?>
			<div class="slider">
				<div class="nt-container"> 
					<div class="nt-columns-area"> 
						<div class="nt-column-6 nt-sm-column-6">                          
							<div class="theme-content  wow zoomIn">
								<?php if(!empty($eduvert_repeater_title)): ?>
									<h3 data-animation="fadeInUp" data-delay="150ms"><?php echo esc_html($eduvert_repeater_title); ?></h3>
								<?php endif; ?>
								<?php if(!empty($eduvert_repeater_subtitle)  || !empty($eduvert_repeater_subtitle2)): ?>
									<h1 data-animation="fadeInUp" data-delay="200ms"><?php echo esc_html($eduvert_repeater_subtitle); ?> <span> <?php echo esc_html($eduvert_repeater_subtitle2); ?></span></h1>
								<?php endif; ?>
								
								<?php if(!empty($eduvert_repeater_text)): ?>
									<p data-animation="fadeInUp" data-delay="500ms"><?php echo esc_html($eduvert_repeater_text); ?></p>
								<?php endif; ?>
								
								<?php if(!empty($eduvert_repeater_button)): ?>
									<a data-animation="fadeInUp" data-delay="800ms" href=<?php echo esc_url($eduvert_repeater_link); ?>
								 class="text-btn"><span><?php echo esc_html($eduvert_repeater_button); ?></span></a>
								 <?php endif; ?>
							</div>
						</div>
						<div class="nt-column-6 nt-sm-column-6"> 
							<div class="side-img" data-delay="800ms">   
								<?php if(!empty($eduvert_repeater_image)): ?>
									<img src="<?php echo esc_url($eduvert_repeater_image); ?>" data-img-url="<?php echo esc_url($eduvert_repeater_image); ?>" alt="">
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } } ?>
	</div>
</section>
<?php	
	}
endif;
if ( function_exists( 'cleverfox_eduvert_lite_slider' ) ) {
$cleverfox_section_priority = apply_filters( 'eduvert_section_priority', 11, 'cleverfox_eduvert_lite_slider' );
add_action( 'eduvert_sections', 'cleverfox_eduvert_lite_slider', absint( $cleverfox_section_priority ) );
}