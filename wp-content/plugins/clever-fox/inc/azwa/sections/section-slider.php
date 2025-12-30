<?php
if ( ! function_exists( 'conceptly_lite_slider' ) ) :
	function conceptly_lite_slider() {
	$conceptly_azwa_default_content 				= conceptly_get_slides_default();
	$conceptly_azwa_slider 						= get_theme_mod('slider',$conceptly_azwa_default_content);
	$conceptly_azwa_hide_show_slider				= get_theme_mod('hide_show_slider','1'); 

if($conceptly_azwa_hide_show_slider == '1') { ?>
    <section id="slider" class="azwa-header-slider">
        <div class="header-slider owl-carousel owl-theme">
			<?php

				if ( ! empty( $conceptly_azwa_slider ) ) {
				$conceptly_azwa_allowed_html = array(
				'br'     => array(),
				'em'     => array(),
				'strong' => array(),
				'b'      => array(),
				'i'      => array(),
				);
				$conceptly_azwa_slider = json_decode( $conceptly_azwa_slider );
				foreach ( $conceptly_azwa_slider as $conceptly_azwa_slide_item ) {
					//$icon = ! empty( $service_item->icon_value ) ? apply_filters( 'conceptly_translate_single_string', $service_item->icon_value, 'service section' ) : '';
					$conceptly_azwa_repeater_title = ! empty( $conceptly_azwa_slide_item->title ) ? apply_filters( 'conceptly_translate_single_string', $conceptly_azwa_slide_item->title, 'slider section' ) : '';
					$conceptly_azwa_repeater_subtitle = ! empty( $conceptly_azwa_slide_item->subtitle ) ? apply_filters( 'conceptly_translate_single_string', $conceptly_azwa_slide_item->subtitle, 'slider section' ) : '';
					$conceptly_azwa_repeater_text = ! empty( $conceptly_azwa_slide_item->text ) ? apply_filters( 'conceptly_translate_single_string', $conceptly_azwa_slide_item->text, 'slider section' ) : '';
					$conceptly_azwa_repeater_button = ! empty( $conceptly_azwa_slide_item->text2) ? apply_filters( 'conceptly_translate_single_string', $conceptly_azwa_slide_item->text2,'slider section' ) : '';
					$conceptly_azwa_repeater_link = ! empty( $conceptly_azwa_slide_item->link ) ? apply_filters( 'conceptly_translate_single_string', $conceptly_azwa_slide_item->link, 'slider section' ) : '';
					$conceptly_azwa_repeater_image = ! empty( $conceptly_azwa_slide_item->image_url ) ? apply_filters( 'conceptly_translate_single_string', $conceptly_azwa_slide_item->image_url, 'slider section' ) : '';
					$conceptly_azwa_repeater_image2 = ! empty( $conceptly_azwa_slide_item->image_url2 ) ? apply_filters( 'conceptly_translate_single_string', $conceptly_azwa_slide_item->image_url2, 'slider section' ) : '';
					$conceptly_azwa_repeater_open_new_tab = ! empty( $conceptly_azwa_slide_item->open_new_tab ) ? apply_filters( 'conceptly_translate_single_string', $conceptly_azwa_slide_item->open_new_tab, 'slider section' ) : '';
					$conceptly_azwa_repeater_align = $conceptly_azwa_slide_item->slide_align;
			?>
			<?php if ( ! empty( $conceptly_azwa_repeater_image ) ) : ?>
				<?php if ( ! empty( $conceptly_azwa_repeater_image2 ) ) : ?>
        		<div class="header-single-slider theme-slider azwa-slider slider-mobi-image" style="background-image:url('<?php echo esc_url( $conceptly_azwa_repeater_image ); ?>')">
        		<?php else : ?>
        		<div class="header-single-slider theme-slider azwa-slider" style="background-image:url('<?php echo esc_url( $conceptly_azwa_repeater_image ); ?>')">
        		<?php endif; ?>
			<?php else : ?>
			<div class="header-single-slider theme-slider azwa-slider">
			<?php endif; ?>
                <div class="container">
                	<?php if ( ! empty( $conceptly_azwa_repeater_image2 ) ) : ?>
                	<div class="row theme-content text-<?php echo esc_html($conceptly_azwa_repeater_align); ?>">
                    	<div class="col-md-7 col-8 my-auto">
                    <?php else : ?>
                    <div class="theme-content text-<?php echo esc_attr($conceptly_azwa_repeater_align); ?>">
                    	<?php endif; ?>
							<?php if ( ! empty( $conceptly_azwa_repeater_title ) ) : ?>
	                            <h1><?php echo esc_html( $conceptly_azwa_repeater_title ); ?><br><span class="typewrite" data-period="2000" data-type='[ "<?php echo esc_attr( $conceptly_azwa_repeater_subtitle ); ?>"]'></span><span class="wrap"></span></h1>
							<?php endif; ?>
							<?php if ( ! empty( $conceptly_azwa_repeater_text ) ) : ?>
	                            <p><?php echo esc_attr( $conceptly_azwa_repeater_text ); ?></p>
							<?php endif; ?>
							<?php if ( ! empty( $conceptly_azwa_repeater_button ) ) : ?>
	                            <a href="<?php echo esc_url( $conceptly_azwa_repeater_link ); ?>" <?php if($conceptly_azwa_repeater_open_new_tab== 'yes' || $conceptly_azwa_repeater_open_new_tab== '1') { echo "target='_blank'"; } ?> class="boxed-btn"><?php echo esc_html( $conceptly_azwa_repeater_button ); ?><i class="fa fa-arrow-right"></i></a>
							<?php endif; ?>

						<?php if ( ! empty( $conceptly_azwa_repeater_image2 ) ) : ?>
						</div>
						<div class="col-md-5 col-4 m-auto">
							<div class="azwa-img">
								<img src="<?php echo esc_url( $conceptly_azwa_repeater_image2 ); ?>" <?php if ( ! empty( $conceptly_azwa_repeater_title ) ) : ?> alt="<?php echo esc_attr( $conceptly_azwa_repeater_title ); ?>"  <?php endif; ?> />
							</div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
	        </div>
          <?php } ?>
        </div>
		<?php } ?>
    </section>
	<?php } 
		}
endif;
if ( function_exists( 'conceptly_lite_slider' ) ) {
$cleverfox_section_priority = apply_filters( 'conceptly_section_priority', 11, 'conceptly_lite_slider' );
add_action( 'conceptly_sections', 'conceptly_lite_slider', absint( $cleverfox_section_priority ) );
}