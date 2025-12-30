<?php
/**
 * Slider section for the homepage.
 */
if ( ! function_exists( 'hantus_lite_slider' ) ) :

	function hantus_lite_slider() {
		function hantus_get_slider_default() {
			return apply_filters(
				'hantus_get_slider_default', wp_json_encode(
				array(
					array("image_url" => CLEVERFOX_PLUGIN_URL.'inc/hantus/images/slider/slider01.jpg' ,"link" => "#", "title" => __('Welcome To Hantus Spa','clever-fox'),"subtitle" => __('Beauty & Spa Wellness','clever-fox'), "text" => __('The Spa at Sun Valley is a serene oasis amid all the exciting  activities our iconic valley has delivered for decades.','clever-fox'), "text2" => __('Make an Appoinment','clever-fox'),"slide_align" => "left","id" => "customizer_repeater_000101" ), 
					
					array("image_url" => CLEVERFOX_PLUGIN_URL.'inc/hantus/images/slider/slider02.jpg' ,"link" => "#", "title" => __('Welcome To Hantus Spa','clever-fox'),"subtitle" => __('Beauty & Spa Wellness','clever-fox'), "text" => __('The Spa at Sun Valley is a serene oasis amid all the exciting  activities our iconic valley has delivered for decades.','clever-fox'), "text2" => __('Make an Appoinment','clever-fox'),"slide_align" => "center","id" => "customizer_repeater_000102" ), 
					
					array("image_url" => CLEVERFOX_PLUGIN_URL.'inc/hantus/images/slider/slider03.jpg' ,"link" => "#", "title" => __('Welcome To Hantus Spa','clever-fox'),"subtitle" => __('Beauty & Spa Wellness','clever-fox'), "text" => __('The Spa at Sun Valley is a serene oasis amid all the exciting  activities our iconic valley has delivered for decades.','clever-fox'), "text2" => __('Make an Appoinment','clever-fox'),"slide_align" => "right","id" => "customizer_repeater_000103" ), 
				))
			);
		}
		$hantus_default_content 	= hantus_get_slider_default();
		$hantus_slider 			= get_theme_mod('slider',$hantus_default_content);
		$hantus_hide_show_slider	= get_theme_mod('hide_show_slider','1'); 
		
		if($hantus_hide_show_slider == '1') {
		?>
		<section id="slider">
			<div class="header-slider owl-carousel owl-theme">
				<?php

				if ( ! empty( $hantus_slider ) ) {
				$hantus_allowed_html = array(
				'br'     => array(),
				'em'     => array(),
				'strong' => array(),
				'b'      => array(),
				'i'      => array(),
				);
				$hantus_slider = json_decode( $hantus_slider );
				foreach ( $hantus_slider as $hantus_slide_item ) {
					$hantus_repeater_title = ! empty( $hantus_slide_item->title ) ? apply_filters( 'hantus_translate_single_string', $hantus_slide_item->title, 'slider section' ) : '';
					$hantus_repeater_subtitle = ! empty( $hantus_slide_item->subtitle ) ? apply_filters( 'hantus_translate_single_string', $hantus_slide_item->subtitle, 'slider section' ) : '';
					$hantus_repeater_text = ! empty( $hantus_slide_item->text ) ? apply_filters( 'hantus_translate_single_string', $hantus_slide_item->text, 'slider section' ) : '';
					$hantus_repeater_button = ! empty( $hantus_slide_item->text2) ? apply_filters( 'hantus_translate_single_string', $hantus_slide_item->text2,'Learn More' ) : '';
					$hantus_repeater_link = ! empty( $hantus_slide_item->link ) ? apply_filters( 'hantus_translate_single_string', $hantus_slide_item->link, 'slider section' ) : '';
					$hantus_repeater_image = ! empty( $hantus_slide_item->image_url ) ? apply_filters( 'hantus_translate_single_string', $hantus_slide_item->image_url, 'slider section' ) : '';
					$hantus_repeater_align = ! empty( $hantus_slide_item->slide_align ) ? apply_filters( 'hantus_translate_single_string', $hantus_slide_item->slide_align, 'slider section' ) : '';
				?>
				<div class="item">
					<?php if ( ! empty( $hantus_repeater_image ) ) : ?>
						<img src="<?php echo esc_url( $hantus_repeater_image ); ?>" <?php if ( ! empty( $hantus_repeater_title ) ) : ?> alt="<?php echo esc_attr( $hantus_repeater_title ); ?>" title="<?php echo esc_attr( $hantus_repeater_title ); ?>" <?php endif; ?> />
					<?php endif; ?>
					<div class="header-single-slider theme-slider">
						<div class="theme-table">
							<div class="theme-table-cell">
	                            <div class="container">
									<div class="theme-content text-<?php echo esc_attr($hantus_repeater_align); ?>">
										<?php if ( ! empty( $hantus_repeater_title ) ) : ?>
											<h3><?php echo esc_attr( $hantus_repeater_title ); ?></h3>
										<?php endif; ?>
										
										<?php if ( ! empty( $hantus_repeater_subtitle ) ) : ?>
											<h1><?php echo esc_attr( $hantus_repeater_subtitle ); ?></h1>
										<?php endif; ?>
										
										<?php if ( ! empty( $hantus_repeater_text ) ) : ?>
											<p><?php echo esc_attr( $hantus_repeater_text ); ?></p>
										<?php endif; ?>
										
										<?php if ( ! empty( $hantus_repeater_button ) ) : ?>
											<a href="<?php echo esc_url( $hantus_repeater_link ); ?>" class="boxed-btn"><?php echo esc_attr( $hantus_repeater_button ); ?></a>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php }} ?>
			</div>
		</section>
		<?php
		}
	}

endif;

if ( function_exists( 'hantus_lite_slider' ) ) {
$hantus_cleverfox_section_priority = apply_filters( 'hantus_section_priority', 11, 'hantus_lite_slider' );
add_action( 'hantus_sections', 'hantus_lite_slider', absint( $hantus_cleverfox_section_priority ) );

}