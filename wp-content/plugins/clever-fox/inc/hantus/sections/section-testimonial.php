<?php
  if ( ! function_exists( 'hantus_lite_testimonial' ) ) :
	function hantus_lite_testimonial() {
			function hantus_get_testimonial_default() {
			return apply_filters(
				'hantus_get_testimonial_default', wp_json_encode(
					array(
						array(
							'title'           => esc_html__( 'Eric Matision', 'clever-fox' ),
							'designation'        => esc_html__( 'Forest Hills. NY', 'clever-fox' ),
							'text'            => esc_html__( 'I am very impressed by the efficiency of your service and your excellent returns policy. It is so pleasant to deal with such a customer focussed website.', 'clever-fox' ),
							'image_url'		  =>  CLEVERFOX_PLUGIN_URL . 'inc/hantus/images/testimonial/testimonial01.png',
							'id'              => 'customizer_repeater_testimonial_001',
						),
						array(
							'title'           => esc_html__( 'Jennifer Lopez', 'clever-fox' ),
							'designation'        => esc_html__( 'Forest Hills. NY', 'clever-fox' ),
							'text'            => esc_html__( 'I am very impressed by the efficiency of your service and your excellent returns policy. It is so pleasant to deal with such a customer focussed website.', 'clever-fox' ),
							'image_url'		  =>  CLEVERFOX_PLUGIN_URL . 'inc/hantus/images/testimonial/testimonial01.png',
							'id'              => 'customizer_repeater_testimonial_002',
						),
						array(
							'title'           => esc_html__( 'Betty Ross', 'clever-fox' ),
							'designation'        => esc_html__( 'Developer', 'clever-fox' ),
							'text'            => esc_html__( 'I am very impressed by the efficiency of your service and your excellent returns policy. It is so pleasant to deal with such a customer focussed website.', 'clever-fox' ),
							'image_url'		  =>  CLEVERFOX_PLUGIN_URL . 'inc/hantus/images/testimonial/testimonial01.png',
							'id'              => 'customizer_repeater_testimonial_003',
						),
					)
				)
			);
		}
	$hantus_default_content = hantus_get_testimonial_default();				
	$hantus_hide_show_testimonial= get_theme_mod('hide_show_testimonial','1'); 
	$hantus_testimonial_contents= get_theme_mod('testimonial_contents',$hantus_default_content);
	$hantus_testimonial_background_setting= get_theme_mod('testimonial_background_setting',CLEVERFOX_PLUGIN_URL .'inc/hantus/images/testimonial/testimonial-bg.jpg');
?>
<?php if($hantus_hide_show_testimonial == '1') { ?>
<?php if ( ! empty( $hantus_testimonial_background_setting ) ) { ?>
 <section id="testimonial" class="section-padding" style="background: url('<?php echo esc_url($hantus_testimonial_background_setting); ?>') no-repeat center / 100% 100%; ">
 <?php }else{ ?>
<section id="testimonial" class="section-padding" style="background:#f7f7f7;">
<?php } ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonial-carousel text-center">                    	
						<div class="testimonial-content owl-carousel owl-theme">
							<?php if ( ! empty( $hantus_testimonial_contents ) ) {
								$hantus_allowed_html = array(
								'br'     => array(),
								'em'     => array(),
								'strong' => array(),
								'b'      => array(),
								'i'      => array(),
								);
								$hantus_testimonial_contents = json_decode( $hantus_testimonial_contents );
								foreach ( $hantus_testimonial_contents as $hantus_testimonial_item ) { 

									$hantus_repeater_title = ! empty( $hantus_testimonial_item->title ) ? apply_filters( 'hantus_translate_single_string', $hantus_testimonial_item->title, 'testimonial section' ) : '';
									$hantus_repeater_designation = ! empty( $hantus_testimonial_item->designation ) ? apply_filters( 'hantus_translate_single_string', $hantus_testimonial_item->designation, 'testimonial section' ) : '';
									$hantus_repeater_text = ! empty( $hantus_testimonial_item->text ) ? apply_filters( 'hantus_translate_single_string', $hantus_testimonial_item->text, 'testimonial section' ) : '';
									$hantus_repeater_image = ! empty( $hantus_testimonial_item->image_url ) ? apply_filters( 'hantus_translate_single_string', $hantus_testimonial_item->image_url, 'testimonial section' ) : '';

								?>
		                        <div class="single-testimonial">
									<?php if ( ! empty( $hantus_repeater_text ) ) : ?>
										<p>“<?php echo esc_attr( $hantus_repeater_text ); ?>”</p>
									<?php endif; ?>		
									<?php if ( ! empty( $hantus_repeater_title ) ) : ?>
										<h5><?php echo esc_attr( $hantus_repeater_title ); ?></h5>
									<?php endif; ?>	
									<?php if ( ! empty( $hantus_repeater_designation ) ) : ?>
										<p class="title"><?php echo esc_attr( $hantus_repeater_designation ); ?></p>
									<?php endif; ?>	
		                        </div>
	                        <?php 
									}
								} 
							?>
						</div>
						<div class="testimonial-thumb owl-carousel owl-theme text-center">
							<?php
								if ( ! empty( $hantus_testimonial_contents ) ) {								
									foreach ( $hantus_testimonial_contents as $hantus_testimonial_item ) {
										$hantus_repeater_image = ! empty( $hantus_testimonial_item->image_url ) ? apply_filters( 'hantus_translate_single_string', $hantus_testimonial_item->image_url, 'testimonial section' ) : '';
										echo '<img src='.esc_url( $hantus_repeater_image ).' data-dots="1"  class="item" />';
									}
								}
							?>
						</div>
                    </div>
                </div>
            </div>
        </div>
		</section>
    </section>
<?php
	} }
endif;
if ( function_exists( 'hantus_lite_testimonial' ) ) {
$cleverfox_section_priority = apply_filters( 'hantus_section_priority', 37, 'hantus_lite_testimonial' );
add_action( 'hantus_sections', 'hantus_lite_testimonial', absint( $cleverfox_section_priority ) );
}
?>	