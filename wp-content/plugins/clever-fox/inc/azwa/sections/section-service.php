<?php 
if ( ! function_exists( 'conceptly_lite_service' ) ) :
	function conceptly_lite_service() {
	 $conceptly_azwa_default_content 		= conceptly_get_service_default();
	 $conceptly_azwa_hide_show_service		= get_theme_mod('hide_show_service','1'); 
	 $conceptly_azwa_service_title			= get_theme_mod('service_title',__('Our Services','clever-fox'));
	 $conceptly_azwa_service_description	= get_theme_mod('service_description',__('There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by injected humour.','clever-fox'));
	 $conceptly_azwa_service_contents		= get_theme_mod('service_contents',$conceptly_azwa_default_content);
if($conceptly_azwa_hide_show_service == '1') {?>
<section id="our-service" class="section-padding home-service service-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 col-12">                    
                    <div class="section-title">
                    <?php if ( ! empty( $conceptly_azwa_service_title ) || is_customize_preview() ) : ?>
						<h2><?php echo wp_kses_post( $conceptly_azwa_service_title ); ?><span></span></h2>
					<?php endif; ?>
					<?php if($conceptly_azwa_service_description) {?>
                        <p><?php echo wp_kses_post( $conceptly_azwa_service_description ); ?></p>
					<?php 
						}
					?>
                    </div>
                </div>
            </div>

            <div class="row" id="service-contents">
			<?php
					if ( ! empty( $conceptly_azwa_service_contents ) ) {
					$conceptly_azwa_allowed_html = array(
					'br'     => array(),
					'em'     => array(),
					'strong' => array(),
					'b'      => array(),
					'i'      => array(),
					);
					$conceptly_azwa_service_contents = json_decode( $conceptly_azwa_service_contents );
					foreach ( $conceptly_azwa_service_contents as $conceptly_azwa_service_item ) {
						$conceptly_azwa_repeater_icon = ! empty( $conceptly_azwa_service_item->icon_value ) ? apply_filters( 'conceptly_translate_single_string', $conceptly_azwa_service_item->icon_value, 'service section' ) : '';
						$conceptly_azwa_repeater_title = ! empty( $conceptly_azwa_service_item->title ) ? apply_filters( 'conceptly_translate_single_string', $conceptly_azwa_service_item->title, 'service section' ) : '';
						$conceptly_azwa_repeater_subtitle = ! empty( $conceptly_azwa_service_item->subtitle ) ? apply_filters( 'conceptly_translate_single_string', $conceptly_azwa_service_item->subtitle, 'service section' ) : '';
						$conceptly_azwa_repeater_text = ! empty( $conceptly_azwa_service_item->text ) ? apply_filters( 'conceptly_translate_single_string', $conceptly_azwa_service_item->text, 'service section' ) : '';
						$conceptly_azwa_repeater_text2 = ! empty( $conceptly_azwa_service_item->text2) ? apply_filters( 'conceptly_translate_single_string', $conceptly_azwa_service_item->text2,'service section' ) : '';
						$conceptly_azwa_repeater_link = ! empty( $conceptly_azwa_service_item->link ) ? apply_filters( 'conceptly_translate_single_string', $conceptly_azwa_service_item->link, 'service section' ) : '';
						$conceptly_azwa_repeater_image = ! empty( $conceptly_azwa_service_item->image_url ) ? apply_filters( 'conceptly_translate_single_string', $conceptly_azwa_service_item->image_url, 'service section' ) : '';
				?>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4 mb-lg-0 single_serv">
                    <div class="service-azwa">
					    <div class="service-azwa-over">
					        <div class="item-featured">
					            <?php if ( ! empty( $conceptly_azwa_repeater_image ) ) : ?>
									<img src="<?php echo esc_url( $conceptly_azwa_repeater_image ); ?>" <?php if ( ! empty( $conceptly_azwa_repeater_title ) ) : ?> alt="<?php echo esc_attr( $conceptly_azwa_repeater_title ); ?>" title="<?php echo esc_attr( $conceptly_azwa_repeater_title ); ?>" <?php endif; ?> />
								<?php endif; ?>
					        </div>
					        <div class="item-holder">
					            <div class="item-holder-inner">
					                <div class="item-icon"><i class="fa <?php echo esc_attr( $conceptly_azwa_repeater_icon ); ?>"></i></div>
					                <?php if ( ! empty( $conceptly_azwa_repeater_title ) ) : ?>
									<h3 class="item-title"><?php echo esc_html( $conceptly_azwa_repeater_title );?><br><?php echo esc_html( $conceptly_azwa_repeater_subtitle ); ?></h3>									
									<?php endif; ?>
					                <div class="item-gap"></div>
					                <div class="item-content">
					                    <p><?php echo esc_html( $conceptly_azwa_repeater_text ); ?></p>
					                </div>
					                <?php if ( ! empty( $conceptly_azwa_repeater_text2 ) ) : ?>
					                <div class="item-btn"><a href="<?php echo esc_url( $conceptly_azwa_repeater_link ); ?>" class="boxed-btn"><?php echo esc_html($conceptly_azwa_repeater_text2); ?><i class="fa fa-arrow-right"></i></a></div>
					                <?php endif; ?>
					            </div>
					        </div>
					        <div class="item-meta">
					        	<div class="item-icon"><i class="fa <?php echo esc_attr( $conceptly_azwa_repeater_icon ); ?>"></i></div>
					            <?php if ( ! empty( $conceptly_azwa_repeater_title ) ) : ?>
								<h3 class="item-title"><?php echo esc_html( $conceptly_azwa_repeater_title );?><br><?php echo esc_html( $conceptly_azwa_repeater_subtitle ); ?></h3>									
								<?php endif; ?>
								<div class="item-gap"></div>
				                <div class="item-content">
				                    <p><?php echo esc_html( $conceptly_azwa_repeater_text ); ?></p>
				                </div>
				                <?php if ( ! empty( $conceptly_azwa_repeater_text2 ) ) : ?>
					            <div class="item-btn">
					                <a href="<?php echo esc_url( $conceptly_azwa_repeater_link ); ?>" class="boxed-btn"><?php echo esc_html($conceptly_azwa_repeater_text2); ?><i class="fa fa-arrow-right"></i></a>
					            </div>
					            <?php endif; ?>
					        </div>
					    </div>
					</div>
                </div>    
				<?php
					}
				}
				?>				
            </div>
        </div>
        <div class="shape2"><img src="<?php echo esc_url(plugin_dir_url( __DIR__ )); ?>images/shape/shape2.png" alt="image"></div>
		<div class="shape3"><img src="<?php echo esc_url(plugin_dir_url( __DIR__ )); ?>images/shape/shape3.png" alt="image"></div>
		<div class="shape5"><img src="<?php echo esc_url(plugin_dir_url( __DIR__ )); ?>images/shape/shape5.png" alt="image"></div>
		<div class="shape6"><img src="<?php echo esc_url(plugin_dir_url( __DIR__ )); ?>images/shape/shape6.png" alt="image"></div>
		<div class="shape7"><img src="<?php echo esc_url(plugin_dir_url( __DIR__ )); ?>images/shape/shape7.png" alt="image"></div>
		<div class="shape13"><img src="<?php echo esc_url(plugin_dir_url( __DIR__ )); ?>images/shape/shape13.png" alt="image"></div>
    </section>
<?php
}
}
	endif;
	if ( function_exists( 'conceptly_lite_service' ) ) {
		$cleverfox_section_priority = apply_filters( 'conceptly_section_priority', 25, 'conceptly_lite_service' );
		add_action( 'conceptly_sections', 'conceptly_lite_service', absint( $cleverfox_section_priority ) );
	}
           