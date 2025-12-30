<?php
/**
 * Slider section for the homepage.
 */
if ( ! function_exists( 'startkit_slider_start' ) ) :
	function startkit_slider_start() {
		
	$startkit_startweb_slider					= get_theme_mod('slider',startkit_startweb_get_slider_default()); 
	$startkit_startweb_slider_opacity			= get_theme_mod('slider_opacity','0.6'); 
	$startkit_startweb_hide_show_slider		= get_theme_mod('hide_show_slider','1'); 
	
	if($startkit_startweb_hide_show_slider == '1') {
		if ( ! empty( $startkit_startweb_slider ) ) {
			$startkit_startweb_slider = json_decode( $startkit_startweb_slider );
?>
	  	<div id="slider" class="main-sliders startweb-slider">
			<div class="row">
				<div class="col-md-12">
					<div class="header-slider owl-carousel owl-theme">
						<?php
							foreach ( $startkit_startweb_slider as $startkit_startweb_slide_item ) {
								$startkit_startweb_repeater_title = ! empty( $startkit_startweb_slide_item->title ) ? apply_filters( 'startkit_translate_single_string', $startkit_startweb_slide_item->title, 'slider section' ) : '';
								$startkit_startweb_repeater_subtitle = ! empty( $startkit_startweb_slide_item->subtitle ) ? apply_filters( 'startkit_translate_single_string', $startkit_startweb_slide_item->subtitle, 'slider section' ) : '';
								$startkit_startweb_repeater_subtitle2 = ! empty( $startkit_startweb_slide_item->subtitle2 ) ? apply_filters( 'startkit_translate_single_string', $startkit_startweb_slide_item->subtitle2, 'slider section' ) : '';
								$startkit_startweb_repeater_text = ! empty( $startkit_startweb_slide_item->text ) ? apply_filters( 'startkit_translate_single_string', $startkit_startweb_slide_item->text, 'slider section' ) : '';
								$startkit_startweb_repeater_button = ! empty( $startkit_startweb_slide_item->text2) ? apply_filters( 'startkit_translate_single_string', $startkit_startweb_slide_item->text2,'slider section' ) : '';
								$startkit_startweb_repeater_link = ! empty( $startkit_startweb_slide_item->link ) ? apply_filters( 'startkit_translate_single_string', $startkit_startweb_slide_item->link, 'slider section' ) : '';
								$startkit_startweb_repeater_image = ! empty( $startkit_startweb_slide_item->image_url ) ? apply_filters( 'startkit_translate_single_string', $startkit_startweb_slide_item->image_url, 'slider section' ) : '';
								$startkit_startweb_repeater_image2 = ! empty( $startkit_startweb_slide_item->image_url2 ) ? apply_filters( 'startkit_translate_single_string', $startkit_startweb_slide_item->image_url2, 'slider section' ) : '';
								$startkit_startweb_repeater_align = ! empty( $startkit_startweb_slide_item->slide_align ) ? apply_filters( 'startkit_translate_single_string', $startkit_startweb_slide_item->slide_align, 'slider section' ) : '';
						?>
						<div class="header-single-slider">
							<figure>
								<?php if ( ! empty( $startkit_startweb_repeater_image ) ) : ?>
								<img src="<?php echo esc_url( $startkit_startweb_repeater_image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $startkit_startweb_repeater_title ); ?>" title="<?php echo esc_attr( $startkit_startweb_repeater_title ); ?>" <?php endif; ?> />
								<?php endif; ?>
								<div class="content" style="background: rgba(20, 20, 20,<?php echo esc_html($startkit_startweb_slider_opacity); ?>);">
									<div class="slide-table">
										<div class="slide-table-cell">                                        
											<div class="container">
												<div class="row slide-<?php echo esc_attr($startkit_startweb_repeater_align); ?>" >
													<?php if ( ! empty( $startkit_startweb_repeater_image2 ) ) : ?>
													<div class="col-md-7 my-auto">
													<?php else : ?>
													<div class="col-md-12 my-auto">
													<?php endif; ?>
														<div class="slide-content startkit">
															<?php if ( ! empty( $startkit_startweb_repeater_subtitle ) ) : ?>
																<h1 class="fadeInUp delay-1 animated"><?php echo esc_html( $startkit_startweb_repeater_subtitle ); ?></h1>
															<?php endif; ?>
															
															<?php if ( ! empty( $startkit_startweb_repeater_subtitle2 ) ) : ?>
																<h4 class="fadeInUp delay-2 animated"><?php echo esc_html( $startkit_startweb_repeater_subtitle2 ); ?></h4>
															<?php endif; ?>
															<?php if ( ! empty( $startkit_startweb_repeater_text ) ) : ?>
																<p class="fadeInUp delay-3 animated"><?php echo esc_html( $startkit_startweb_repeater_text ); ?></p>
															<?php endif; ?>
															<?php if ( ! empty( $startkit_startweb_repeater_button ) ) : ?>
																<a href="<?php echo esc_url( $startkit_startweb_repeater_link ); ?>" class="boxed-btn fadeInUp delay-4 animated"><?php echo esc_html( $startkit_startweb_repeater_button ); ?><i class="fa fa-long-arrow-right"></i></a>
															<?php endif; ?>	
														</div>
													</div>
													
													<?php if ( ! empty( $startkit_startweb_repeater_image2 ) ) : ?>
														<div class="col-md-5 my-auto mx-auto">
															<div class="startkit-img flipInY delay-2 animated">
																<img src="<?php echo esc_url( $startkit_startweb_repeater_image2 ); ?>" <?php if ( ! empty( $startkit_startweb_repeater_title ) ) : ?> alt="<?php echo esc_attr( $startkit_startweb_repeater_title ); ?>" title="<?php echo esc_attr( $startkit_startweb_repeater_title ); ?>" <?php endif; ?> />
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
						<?php } ?>
                    </div>
                </div>
				<ul id="carousel-custom-indicator" class="owl-dots list-inline text-center custom-indicators position-absolute bottom-0 w-100 mb-0 d-none d-sm-none d-md-block d-lg-block">
					<?php
						foreach ( $startkit_startweb_slider as $startkit_startweb_slide_item ) {
							$startkit_startweb_repeater_title = ! empty( $startkit_startweb_slide_item->title ) ? apply_filters( 'startkit_translate_single_string', $startkit_startweb_slide_item->title, 'slider section' ) : '';
							$startkit_startweb_repeater_icon = ! empty( $startkit_startweb_slide_item->icon_value ) ? apply_filters( 'startkit_translate_single_string', $startkit_startweb_slide_item->icon_value, 'slider section' ) : '';
					?>
						<li class="list-inline-item">
							<button class="border-0 font-weight-bold d-flex align-items-center"><span class="fa <?php echo esc_attr( $startkit_startweb_repeater_icon ); ?> icon icon-xs mr-2"></span> <?php echo esc_html( $startkit_startweb_repeater_title ); ?>
							</button>
						</li>
					<?php } ?>
				</ul>
            </div>
        </div>
		<?php } ?>
		<?php 
	}}
	endif;
if ( function_exists( 'startkit_slider_start' ) ) {
$cleverfox_section_priority = apply_filters( 'startkit_section_priority', 11, 'startkit_slider_start' );
add_action( 'startkit_sections', 'startkit_slider_start', absint( $cleverfox_section_priority ) );

}