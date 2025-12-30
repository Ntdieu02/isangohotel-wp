 <!--===// Start: Slider
    =================================--> 
<?php  
if ( ! function_exists( 'avril_lite_slider' ) ) :
	function avril_lite_slider() {
	$avril_avail_slider 						= get_theme_mod('slider',avril_get_slider_default());
?>	
    <section id="slider-section" class="slider-wrapper">
        <div class="main-slider owl-carousel owl-theme">
			<?php
				if ( ! empty( $avril_avail_slider ) ) {
				$avril_avail_slider = json_decode( $avril_avail_slider );
				foreach ( $avril_avail_slider as $avril_avail_slide_item ) {
					$avril_avail_repeater_title = ! empty( $avril_avail_slide_item->title ) ? apply_filters( 'avril_translate_single_string', $avril_avail_slide_item->title, 'slider section' ) : '';
					$avril_avail_repeater_subtitle = ! empty( $avril_avail_slide_item->subtitle ) ? apply_filters( 'avril_translate_single_string', $avril_avail_slide_item->subtitle, 'slider section' ) : '';
					$avril_avail_repeater_text = ! empty( $avril_avail_slide_item->text ) ? apply_filters( 'avril_translate_single_string', $avril_avail_slide_item->text, 'slider section' ) : '';
					$avril_avail_repeater_button = ! empty( $avril_avail_slide_item->text2) ? apply_filters( 'avril_translate_single_string', $avril_avail_slide_item->text2,'slider section' ) : '';
					$avril_avail_repeater_link = ! empty( $avril_avail_slide_item->link ) ? apply_filters( 'avril_translate_single_string', $avril_avail_slide_item->link, 'slider section' ) : '';
					$avril_avail_repeater_image = ! empty( $avril_avail_slide_item->image_url ) ? apply_filters( 'avril_translate_single_string', $avril_avail_slide_item->image_url, 'slider section' ) : '';
					$avril_avail_repeater_image2 = ! empty( $avril_avail_slide_item->image_url2 ) ? apply_filters( 'avril_translate_single_string', $avril_avail_slide_item->image_url2, 'slider section' ) : '';
					$avril_avail_repeater_open_new_tab = ! empty( $avril_avail_slide_item->open_new_tab ) ? apply_filters( 'avril_translate_single_string', $avril_avail_slide_item->open_new_tab, 'slider section' ) : '';
					//$align = $slide_item->slide_align;
					$avril_avail_repeater_align = ! empty( $avril_avail_slide_item->slide_align ) ? apply_filters( 'avril_translate_single_string', $avril_avail_slide_item->slide_align, 'slider section' ) : '';
			?>
			<?php if ( ! empty( $avril_avail_repeater_image ) ) : ?>
        	<div class="item" style="background-image:url('<?php echo esc_url( $avril_avail_repeater_image ); ?>')">
			<?php else : ?>
			<div class="item">
			<?php endif; ?>
                <div class="theme-slider">
                    <div class="theme-table">
                        <div class="theme-table-cell">
                            <div class="av-container">                                
                                <div class="av-columns-area theme-content text-<?php echo esc_attr($avril_avail_repeater_align); ?>">
                                	<?php if ( ! empty( $avril_avail_repeater_image2 ) ) { ?>
                                	<div class="av-column-7 my-auto">
                                	<?php } else { ?>
                            		<div class="av-column-12">
                            		<?php } ?>
										<?php if ( ! empty( $avril_avail_repeater_title ) ) : ?>
											<h3 data-animation="fadeInUp" data-delay="150ms"><?php echo esc_html( $avril_avail_repeater_title ); ?></h3>
										<?php endif; ?>
										
										<?php if ( ! empty( $avril_avail_repeater_subtitle ) ) : ?>
											<h1 data-animation="fadeInUp" data-delay="200ms"><span><?php echo esc_html( $avril_avail_repeater_subtitle ); ?></span></h1>
	                                    <?php endif; ?>
										
										<?php if ( ! empty( $avril_avail_repeater_text ) ) : ?>
											<p data-animation="fadeInUp" data-delay="500ms"><?php echo esc_html( $avril_avail_repeater_text ); ?></p>
										<?php endif; ?>	
										<?php if ( ! empty( $avril_avail_repeater_button ) ) : ?>
											<a data-animation="fadeInUp" data-delay="800ms" href="<?php echo esc_url( $avril_avail_repeater_link ); ?>" <?php if($avril_avail_repeater_open_new_tab== 'yes' || $avril_avail_repeater_open_new_tab== '1') { echo "target='_blank'"; } ?> class="av-btn av-btn-primary"><?php echo esc_html( $avril_avail_repeater_button ); ?></a>
										<?php endif; ?>
									</div>
									<?php if ( ! empty( $avril_avail_repeater_image2 ) ) : ?>
									<div class="av-column-5 mb-av-0 mx-auto my-auto">
										<div class="aera-img">
											<img src="<?php echo esc_url( $avril_avail_repeater_image2 ); ?>" data-img-url="<?php echo esc_url( $avril_avail_repeater_image2 ); ?>" <?php if ( ! empty( $avril_avail_repeater_title ) ) : ?> alt="<?php echo esc_attr( $avril_avail_repeater_title ); ?>" title="<?php echo esc_attr( $avril_avail_repeater_title ); ?>" <?php endif; ?> />
										</div>
									</div>
									<?php endif; ?>
                                </div>
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
if ( function_exists( 'avril_lite_slider' ) ) {
$cleverfox_section_priority = apply_filters( 'avril_section_priority', 11, 'avril_lite_slider' );
add_action( 'avril_sections', 'avril_lite_slider', absint( $cleverfox_section_priority ) );
}
?>
    <!-- End: Slider
    =================================-->