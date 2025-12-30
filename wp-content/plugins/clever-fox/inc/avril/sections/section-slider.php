 <!--===// Start: Slider
    =================================--> 
<?php  
if ( ! function_exists( 'avril_lite_slider' ) ) :
	function avril_lite_slider() {
	$avril_slider 						= get_theme_mod('slider',avril_get_slider_default());
?>	
    <section id="slider-section" class="slider-wrapper">
        <div class="main-slider owl-carousel owl-theme">
			<?php
				if ( ! empty( $avril_slider ) ) {
				$avril_slider = json_decode( $avril_slider );
				foreach ( $avril_slider as $avril_slide_item ) {
					$avril_repeater_title = ! empty( $avril_slide_item->title ) ? apply_filters( 'avril_translate_single_string', $avril_slide_item->title, 'slider section' ) : '';
					$avril_repeater_subtitle = ! empty( $avril_slide_item->subtitle ) ? apply_filters( 'avril_translate_single_string', $avril_slide_item->subtitle, 'slider section' ) : '';
					$avril_repeater_text = ! empty( $avril_slide_item->text ) ? apply_filters( 'avril_translate_single_string', $avril_slide_item->text, 'slider section' ) : '';
					$avril_repeater_button = ! empty( $avril_slide_item->text2) ? apply_filters( 'avril_translate_single_string', $avril_slide_item->text2,'slider section' ) : '';
					$avril_repeater_link = ! empty( $avril_slide_item->link ) ? apply_filters( 'avril_translate_single_string', $avril_slide_item->link, 'slider section' ) : '';
					$avril_repeater_image = ! empty( $avril_slide_item->image_url ) ? apply_filters( 'avril_translate_single_string', $avril_slide_item->image_url, 'slider section' ) : '';
					$avril_repeater_open_new_tab = ! empty( $avril_slide_item->open_new_tab ) ? apply_filters( 'avril_translate_single_string', $avril_slide_item->open_new_tab, 'slider section' ) : '';
					//$align = $avril_slide_item->slide_align;
					$avril_repeater_align = ! empty( $avril_slide_item->slide_align ) ? apply_filters( 'avril_translate_single_string', $avril_slide_item->slide_align, 'slider section' ) : '';
			?>
        	<?php if ( ! empty( $avril_repeater_image ) ) : ?>
        	<div class="item" style="background-image:url('<?php echo esc_url( $avril_repeater_image ); ?>')">
			<?php else : ?>
			<div class="item">
			<?php endif; ?>
                <div class="theme-slider">
                    <div class="theme-table">
                        <div class="theme-table-cell">
                            <div class="av-container">                                
                                <div class="theme-content text-<?php echo esc_attr($avril_repeater_align); ?>">
									<?php if ( ! empty( $avril_repeater_title ) ) : ?>
										<h3 data-animation="fadeInUp" data-delay="150ms"><?php echo esc_html( $avril_repeater_title ); ?></h3>
									<?php endif; ?>
									
									<?php if ( ! empty( $avril_repeater_subtitle ) ) : ?>
										<h1 data-animation="fadeInLeft" data-delay="200ms"><span class="primary-color"><?php echo esc_html( $avril_repeater_subtitle ); ?></span></h1>
                                    <?php endif; ?>
									
									<?php if ( ! empty( $avril_repeater_text ) ) : ?>
										<p data-animation="fadeInLeft" data-delay="500ms"><?php echo esc_html( $avril_repeater_text ); ?></p>
									<?php endif; ?>	
									<?php if ( ! empty( $avril_repeater_button ) ) : ?>
										<a data-animation="fadeInUp" data-delay="800ms" href="<?php echo esc_url( $avril_repeater_link ); ?>" <?php if($avril_repeater_open_new_tab== 'yes' || $avril_repeater_open_new_tab== '1') { echo "target='_blank'"; } ?> class="av-btn av-btn-primary"><?php echo esc_html( $avril_repeater_button ); ?></a>
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