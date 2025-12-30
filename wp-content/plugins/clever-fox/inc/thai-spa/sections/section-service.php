<?php
if ( ! function_exists( 'hantus_lite_service' ) ) :
	function hantus_lite_service() {
		 function hantus_get_service_default() {
			return apply_filters(
				'hantus_get_service_default', wp_json_encode(
						 array(
						array(
							'image_url'       => CLEVERFOX_PLUGIN_URL . 'inc/hantus/images/service/service01.png',
							'title'           => esc_html__( 'Oil Massage', 'clever-fox' ),
							'subtitle'            => esc_html__( '$57.99', 'clever-fox' ),
							'text'            => esc_html__( 'Lorem Ipsum is simply dummy text of  the printing and typesetting.', 'clever-fox' ),
							'text2'	  =>  esc_html__( 'Book now', 'clever-fox' ),
							'link'	  =>  esc_html__( '#', 'clever-fox' ),
							'id'              => 'customizer_repeater_service_001',
							
						),
						array(
							'image_url'       => CLEVERFOX_PLUGIN_URL . 'inc/hantus/images/service/service02.png',
							'title'           => esc_html__( 'Skin Care', 'clever-fox' ),
							'subtitle'            => esc_html__( '$57.99', 'clever-fox' ),
							'text'            => esc_html__( 'Lorem Ipsum is simply dummy text of  the printing and typesetting.', 'clever-fox' ),
							'text2'	  =>  esc_html__( 'Book now', 'clever-fox' ),
							'link'	  =>  esc_html__( '#', 'clever-fox' ),
							'id'              => 'customizer_repeater_service_002',
						
						),
						array(
							'image_url'       => CLEVERFOX_PLUGIN_URL . 'inc/hantus/images/service/service03.png',
							'title'           => esc_html__( 'Natural Care', 'clever-fox' ),
							'subtitle'            => esc_html__( '$57.99', 'clever-fox' ),
							'text'            => esc_html__( 'Lorem Ipsum is simply dummy text of  the printing and typesetting.', 'clever-fox' ),
							'text2'	  =>  esc_html__( 'Book now', 'clever-fox' ),
							'link'	  =>  esc_html__( '#', 'clever-fox' ),
							'id'              => 'customizer_repeater_service_003',
					
						),
						array(
							'image_url'       => CLEVERFOX_PLUGIN_URL . 'inc/hantus/images/service/service04.png',
							'title'           => esc_html__( 'Nails Design', 'clever-fox' ),
							'subtitle'            => esc_html__( '$57.99', 'clever-fox' ),
							'text'            => esc_html__( 'Lorem Ipsum is simply dummy text of  the printing and typesetting.', 'clever-fox' ),
							'text2'	  =>  esc_html__( 'Book now', 'clever-fox' ),
							'link'	  =>  esc_html__( '#', 'clever-fox' ),
							'id'              => 'customizer_repeater_service_004',
							
						),
					)
				)
			);
		}
?>
<?php 
	$hantus_thaispa_default_content 		= hantus_get_service_default();
	$hantus_thaispa_hide_show_service		= get_theme_mod('hide_show_service','1'); 
	$hantus_thaispa_service_title			= get_theme_mod('service_title',__('Our Services','clever-fox'));
	$hantus_thaispa_service_description	= get_theme_mod('service_description',__('These are the services we provide, these makes us stand apart.','clever-fox'));
	$hantus_thaispa_service_contents		= get_theme_mod('service_contents',$hantus_thaispa_default_content);
		
?>
<?php if($hantus_thaispa_hide_show_service == '1') {?>
   <section id="services" class="section-padding" style="background: url(http://themes.iamabdus.com/angel/1.2/img/home/pattern-1.jpg) center center / cover fixed;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-12 text-center">
                    <div class="section-title service-section">
                        <h2><?php /* translators: %s: Title */printf( esc_html__('%s.', 'clever-fox'), esc_html($hantus_thaispa_service_title)); ?></h2>
                        <!-- <hr style="background: url('<?php //echo get_template_directory_uri(); ?>/assets/images/section-icon.png') no-repeat center / cover;"> -->
                        <p><?php /* translators: %s: Description */printf( esc_html__('%s.', 'clever-fox'), esc_html($hantus_thaispa_service_description)); ?></p>
                    </div>
                </div>
            </div>
            <div class="row servicesss">
				<?php
					if ( ! empty( $hantus_thaispa_service_contents ) ) {
					$hantus_thaispa_allowed_html = array(
					'br'     => array(),
					'em'     => array(),
					'strong' => array(),
					'b'      => array(),
					'i'      => array(),
					);
					$hantus_thaispa_service_contents = json_decode( $hantus_thaispa_service_contents );
					foreach ( $hantus_thaispa_service_contents as $hantus_thaispa_service_item ) {
						$hantus_thaispa_repeater_title = ! empty( $hantus_thaispa_service_item->title ) ? apply_filters( 'hantus_translate_single_string', $hantus_thaispa_service_item->title, 'service section' ) : '';
						$hantus_thaispa_repeater_subtitle = ! empty( $hantus_thaispa_service_item->subtitle ) ? apply_filters( 'hantus_translate_single_string', $hantus_thaispa_service_item->subtitle, 'service section' ) : '';
						$hantus_thaispa_repeater_text = ! empty( $hantus_thaispa_service_item->text ) ? apply_filters( 'hantus_translate_single_string', $hantus_thaispa_service_item->text, 'service section' ) : '';
						$hantus_thaispa_repeater_text2 = ! empty( $hantus_thaispa_service_item->text2) ? apply_filters( 'hantus_translate_single_string', $hantus_thaispa_service_item->text2,'service section' ) : '';
						$hantus_thaispa_repeater_link = ! empty( $hantus_thaispa_service_item->link ) ? apply_filters( 'hantus_translate_single_string', $hantus_thaispa_service_item->link, 'service section' ) : '';
						$hantus_thaispa_repeater_image = ! empty( $hantus_thaispa_service_item->image_url ) ? apply_filters( 'hantus_translate_single_string', $hantus_thaispa_service_item->image_url, 'service section' ) : '';
				?>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-5 mb-lg-0 serv-cont">                    
                    <div class="service-thai-spa text-center strip-hover">
						<div class="strip-hover-wrap">
							<div class="strip-overlay">
								<?php if ( ! empty( $hantus_thaispa_repeater_image ) ) : ?>
								<img class="services_cols_mn_icon" src="<?php echo esc_url( $hantus_thaispa_repeater_image ); ?>" <?php if ( ! empty( $hantus_thaispa_repeater_title ) ) : ?> alt="<?php echo esc_attr( $hantus_thaispa_repeater_title ); ?>" title="<?php echo esc_attr( $hantus_thaispa_repeater_title ); ?>" <?php endif; ?> />
								<?php endif; ?>
								<div class="inner-thai-spa">
									<div class="inner-text-thai-spa">
										<div class="inner-overlay">
											<?php if ( ! empty( $hantus_thaispa_repeater_title ) ) : ?>
											<h4><?php echo esc_html( $hantus_thaispa_repeater_title ); ?></h4>
											<?php endif; ?>
											<?php if ( ! empty( $hantus_thaispa_repeater_text ) ) : ?>
											<p><?php echo esc_html( $hantus_thaispa_repeater_text ); ?></p>
											<?php endif; ?>
											<?php if ( ! empty( $hantus_thaispa_repeater_text2 ) ) : ?>
											<a href="<?php echo esc_html( $hantus_thaispa_repeater_link ); ?>" class="boxed-btn"><?php echo esc_html( $hantus_thaispa_repeater_text2 ); ?></a>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php if ( ! empty( $hantus_thaispa_repeater_subtitle ) ) : ?>							
						<div class="price-thai-spa"><h5><?php echo esc_html( $hantus_thaispa_repeater_subtitle ); ?></h5></div>
						<?php endif; ?>	
                    </div>
                </div>
					<?php }}?>
            </div>
        </div>
    </section>
<?php 
		} 
	}
	endif;
	if ( function_exists( 'hantus_lite_service' ) ) {
		$cleverfox_section_priority = apply_filters( 'hantus_section_priority', 25, 'hantus_lite_service' );
		add_action( 'hantus_sections', 'hantus_lite_service', absint( $cleverfox_section_priority ) );
	}
?>