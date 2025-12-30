<?php
/**
 * Get default values for service section.
 *
 * @since 1.1.0
 * @access public
 */
 if ( ! function_exists( 'startkit_service_plu' ) ) :
	function startkit_service_plu() {
	$startkit_hide_show_service	= get_theme_mod('hide_show_service','1'); 
	$startkit_service_title		= get_theme_mod('service_title',__('Services','clever-fox'));
	$startkit_service_subttl		= get_theme_mod('service_subttl',__('<span>Service</span> <h6>Lorem is dummy text.</h6>','clever-fox'));
	$startkit_service_description= get_theme_mod('service_description',__('Publishing packages and web page editors now use Lorem Ipsum as their default model text','clever-fox'));
	$startkit_service_contents	= get_theme_mod('service_contents',startkit_get_service_default());	
?>
<?php if($startkit_hide_show_service == '1') {?>
<section id="services" class="section-padding">
	<div class="container">
	<?php  
	if( ($startkit_service_title) || ($startkit_service_subttl)!='' || ($startkit_service_description)!='' ) { ?>
	    <!-- Section Title -->
		<div class="row">
			<div class="col-md-6 offset-md-3 text-center">
				<div class="section-header">
					<?php if ( ! empty( $startkit_service_subttl ) ) : ?>
						<div class="subtitle"><?php echo wp_kses_post( $startkit_service_subttl ); ?></div>
					<?php endif; ?>
					<?php if ( ! empty( $startkit_service_title ) || is_customize_preview() ) : ?>
					<h2>
					<?php echo esc_html($startkit_service_title); ?>
					</h2>
					<?php endif; ?>
					<hr class="liner">
					<?php if($startkit_service_description) {?>					
					<p class="wow fadeInUp" data-wow-delay="0.1s">
					<?php echo esc_html($startkit_service_description); ?>
					</p>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- /Section Title -->
		<?php } ?>
	<div class="row text-center servicesss">
		<?php
	
		if ( ! empty( $startkit_service_contents ) ) {
		$startkit_allowed_html = array(
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'b'      => array(),
		'i'      => array(),
		);
		$startkit_service_contents = json_decode( $startkit_service_contents );
		foreach ( $startkit_service_contents as $i => $startkit_service_item ) {
			$startkit_repeater_icon = ! empty( $startkit_service_item->icon_value ) ? apply_filters( 'startkit_translate_single_string', $startkit_service_item->icon_value, 'service section' ) : '';
			$startkit_repeater_title = ! empty( $startkit_service_item->title ) ? apply_filters( 'startkit_translate_single_string', $startkit_service_item->title, 'service section' ) : '';
			$startkit_repeater_text = ! empty( $startkit_service_item->text ) ? apply_filters( 'startkit_translate_single_string', $startkit_service_item->text, 'service section' ) : '';
			$startkit_repeater_text2 = ! empty( $startkit_service_item->text2) ? apply_filters( 'startkit_translate_single_string', $startkit_service_item->text2,'service section' ) : '';
			$startkit_repeater_link = ! empty( $startkit_service_item->link ) ? apply_filters( 'startkit_translate_single_string', $startkit_service_item->link, 'service section' ) : '';
			$startkit_repeater_image = ! empty( $startkit_service_item->image_url ) ? apply_filters( 'startkit_translate_single_string', $startkit_service_item->image_url, 'service section' ) : '';
			?>
			<div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-lg-0 mb-5 ">
				<div class="features-eight wow fadeInUp" data-wow-delay="0.4s">
					<?php if(!empty($startkit_repeater_image)){?>
						<div class="features-image">
							<img class="image" src="<?php echo esc_url($startkit_repeater_image); ?>" <?php if ( ! empty( $startkit_repeater_title ) ) : ?> alt="<?php echo esc_attr( $startkit_repeater_title ); ?>" title="<?php echo esc_attr( $startkit_repeater_title ); ?>" <?php endif; ?> />
						</div>
					<?php } ?>
					<div class="features-contented">
						<?php if ( ! empty( $startkit_repeater_icon ) ) :?>
						<div class="icon">
							<i class="fa <?php echo esc_attr( $startkit_repeater_icon ); ?> txt-pink"></i>
							<span class="count">0<?php echo esc_html( $i + 1 ); ?></span>
						</div>
						<?php endif; ?>
						<div class="featured-text">
							<?php if ( ! empty( $startkit_repeater_title ) ) : ?>
							<h5>
								<?php if ( ! empty( $startkit_repeater_link ) ) : ?>
									<a href="<?php echo esc_url( $startkit_repeater_link ); ?>"><?php echo esc_html( $startkit_repeater_title ); ?></a>
								<?php else : ?>
									<?php echo esc_html( $startkit_repeater_title ); ?>
								<?php endif; ?>
							</h5>
							<?php endif; ?>
							<?php if ( ! empty( $startkit_repeater_text ) ) : ?>
							<p class="features-desc"><?php echo wp_kses( html_entity_decode( $startkit_repeater_text ), $startkit_allowed_html ); ?></p>
							<?php endif; ?>
							<?php //if ( ! empty( $link ) ) : ?>
							<a href="<?php echo esc_url( $startkit_repeater_link ); ?>" class="view-more">
								<span><?php echo esc_html( $startkit_repeater_text2 ); ?></span>
							</a>
							<?php //endif; ?>
						</div>
					</div>
				</div>
			</div>
			<?php
			} }
			?>
			
		</div>
	</div>
	</section>		
<?php 
	}
	}

endif;
if ( function_exists( 'startkit_service_plu' ) ) {
$cleverfox_section_priority = apply_filters( 'startkit_section_priority', 13, 'startkit_service_plu' );
add_action( 'startkit_sections', 'startkit_service_plu', absint( $cleverfox_section_priority ) );
}
