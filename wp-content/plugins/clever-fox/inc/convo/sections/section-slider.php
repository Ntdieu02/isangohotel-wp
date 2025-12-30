<?php
if ( ! function_exists( 'conceptly_lite_slider' ) ) :
	function conceptly_lite_slider() {
	$conceptly_convo_default_content 				= conceptly_get_slides_default();
	$conceptly_convo_slider 						= get_theme_mod('slider',$conceptly_convo_default_content);
	$conceptly_hide_show_slider				= get_theme_mod('hide_show_slider','1'); 

if($conceptly_hide_show_slider == '1') { ?>
    <section id="slider">
        <div class="header-slider owl-carousel owl-theme">
			<?php

				if ( ! empty( $conceptly_slider ) ) {
				$conceptly_allowed_html = array(
				'br'     => array(),
				'em'     => array(),
				'strong' => array(),
				'b'      => array(),
				'i'      => array(),
				);
				$conceptly_slider = json_decode( $conceptly_slider );
				foreach ( $conceptly_slider as $conceptly_slide_item ) {
					//$icon = ! empty( $service_item->icon_value ) ? apply_filters( 'conceptly_translate_single_string', $service_item->icon_value, 'service section' ) : '';
					$conceptly_convo_repeater_title = ! empty( $conceptly_slide_item->title ) ? apply_filters( 'conceptly_translate_single_string', $conceptly_slide_item->title, 'slider section' ) : '';
					$conceptly_convo_repeater_subtitle = ! empty( $conceptly_slide_item->subtitle ) ? apply_filters( 'conceptly_translate_single_string', $conceptly_slide_item->subtitle, 'slider section' ) : '';
					$conceptly_convo_repeater_text = ! empty( $conceptly_slide_item->text ) ? apply_filters( 'conceptly_translate_single_string', $conceptly_slide_item->text, 'slider section' ) : '';
					$conceptly_convo_repeater_button = ! empty( $conceptly_slide_item->text2) ? apply_filters( 'conceptly_translate_single_string', $conceptly_slide_item->text2,'slider section' ) : '';
					$conceptly_convo_repeater_link = ! empty( $conceptly_slide_item->link ) ? apply_filters( 'conceptly_translate_single_string', $conceptly_slide_item->link, 'slider section' ) : '';
					$conceptly_convo_repeater_image = ! empty( $conceptly_slide_item->image_url ) ? apply_filters( 'conceptly_translate_single_string', $conceptly_slide_item->image_url, 'slider section' ) : '';
					$conceptly_convo_repeater_open_new_tab = ! empty( $conceptly_slide_item->open_new_tab ) ? apply_filters( 'conceptly_translate_single_string', $conceptly_slide_item->open_new_tab, 'slider section' ) : '';
					$conceptly_convo_repeater_align = $conceptly_slide_item->slide_align;
			?>
            <div class="item">
				<?php if ( ! empty( $conceptly_convo_repeater_image ) ) : ?>
					<img src="<?php echo esc_url( $conceptly_convo_repeater_image ); ?>" <?php if ( ! empty( $conceptly_convo_repeater_title ) ) : ?> alt="<?php echo esc_attr( $conceptly_convo_repeater_title ); ?>"  <?php endif; ?> />
				<?php endif; ?>
                <div class="header-single-slider theme-slider">
                	<div class="theme-table">
						<div class="theme-table-cell">
                            <div class="container">
			                    <div class="theme-content text-<?php echo esc_attr($conceptly_convo_repeater_align); ?>">
									<?php if ( ! empty( $conceptly_convo_repeater_title ) ) : ?>
			                            <h1><?php echo esc_html( $conceptly_convo_repeater_title ); ?><br><span><?php echo esc_html( $conceptly_convo_repeater_subtitle ); ?></span></h1>
									<?php endif; ?>
									<?php if ( ! empty( $conceptly_convo_repeater_text ) ) : ?>
			                            <p><?php echo esc_html( $conceptly_convo_repeater_text ); ?></p>
									<?php endif; ?>
									<?php if ( ! empty( $conceptly_convo_repeater_button ) ) : ?>
			                            <a href="<?php echo esc_url( $conceptly_convo_repeater_link ); ?>" <?php if($conceptly_convo_repeater_open_new_tab== 'yes' || $conceptly_convo_repeater_open_new_tab== '1') { echo "target='_blank'"; } ?> class="boxed-btn"><span class="white-bg"><i class="fa fa-chevron-right"></i></span><?php echo esc_html( $conceptly_convo_repeater_button ); ?></a>
									<?php endif; ?>
			                    </div>
			                </div>
			            </div>
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