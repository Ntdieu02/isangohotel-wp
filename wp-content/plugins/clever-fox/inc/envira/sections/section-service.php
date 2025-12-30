<?php
if ( ! function_exists( 'startkit_service_plu' ) ) :
	function startkit_service_plu() {
		$startkit_envira_hide_show_service	= get_theme_mod('hide_show_service','1'); 
		$startkit_envira_service_title		= get_theme_mod('service_title',__('Services','clever-fox'));
		$startkit_envira_service_subttl		= get_theme_mod('service_subttl',__('<span>Service</span> <h6>Lorem is dummy text.</h6>','clever-fox'));
		$startkit_envira_service_description= get_theme_mod('service_description',__('Publishing packages and web page editors now use Lorem Ipsum as their default model text','clever-fox'));
		$startkit_envira_service_contents	= get_theme_mod('service_contents',startkit_get_service_default());	
if($startkit_envira_hide_show_service == '1') {?>
<section id="services" class="section-padding">
	<div class="container">
	<?php  
	if( ($startkit_envira_service_title) || ($startkit_envira_service_subttl)!='' || ($startkit_envira_service_description)!='' ) { ?>
	    <!-- Section Title -->
		<div class="row">
			<div class="col-md-6 offset-md-3 text-center">
				<div class="section-header">
					<?php if ( ! empty( $startkit_envira_service_subttl ) ) : ?>
					<div class="subtitle"><?php echo wp_kses_post( $startkit_envira_service_subttl ); ?></div>
					<?php endif; ?>
					<?php if ( ! empty( $startkit_envira_service_title ) || is_customize_preview() ) : ?>
					<h2>
					<?php echo esc_html($startkit_envira_service_title); ?>
					</h2>
					<?php endif; ?>
					<hr class="liner">
					<?php if($startkit_envira_service_description) {?>					
					<p class="wow fadeInUp" data-wow-delay="0.1s">
					<?php echo esc_html($startkit_envira_service_description); ?>
					</p>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- /Section Title -->
		<?php } ?>
	<div class="row text-center servicesss">
		<?php
	
		if ( ! empty( $startkit_envira_service_contents ) ) {
		$startkit_envira_allowed_html = array(
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'b'      => array(),
		'i'      => array(),
		);
		$startkit_envira_service_contents = json_decode( $startkit_envira_service_contents );
		foreach ( $startkit_envira_service_contents as $startkit_envira_i => $startkit_envira_service_item ) {
			$startkit_envira_repeater_icon = ! empty( $startkit_envira_service_item->icon_value ) ? apply_filters( 'startkit_translate_single_string', $startkit_envira_service_item->icon_value, 'service section' ) : '';
			$startkit_envira_repeater_title = ! empty( $startkit_envira_service_item->title ) ? apply_filters( 'startkit_translate_single_string', $startkit_envira_service_item->title, 'service section' ) : '';
			$startkit_envira_repeater_text = ! empty( $startkit_envira_service_item->text ) ? apply_filters( 'startkit_translate_single_string', $startkit_envira_service_item->text, 'service section' ) : '';
			$startkit_envira_repeater_text2 = ! empty( $startkit_envira_service_item->text2) ? apply_filters( 'startkit_translate_single_string', $startkit_envira_service_item->text2,'service section' ) : '';
			$startkit_envira_repeater_link = ! empty( $startkit_envira_service_item->link ) ? apply_filters( 'startkit_translate_single_string', $startkit_envira_service_item->link, 'service section' ) : '';
			?>
			<div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-lg-0 mb-5 ">
				<div class="features-envira wow fadeInUp" data-wow-delay="0.4s">
					<?php if ( ! empty( $startkit_envira_repeater_icon ) ) :?>
					<div class="icon">
						<i class="fa <?php echo esc_attr( $startkit_envira_repeater_icon ); ?> txt-pink"></i>
					</div>
					<?php endif; ?>
					<?php if ( ! empty( $startkit_envira_repeater_title ) ) : ?>
					<h5>
						<?php if ( ! empty( $startkit_envira_repeater_link ) ) : ?>
							<a href="<?php echo esc_url( $startkit_envira_repeater_link ); ?>"><?php echo esc_html( $startkit_envira_repeater_title ); ?></a>
						<?php else : ?>
							<?php echo esc_html( $startkit_envira_repeater_title ); ?>
						<?php endif; ?>
					</h5>
					<?php endif; ?>
					<?php if ( ! empty( $startkit_envira_repeater_text ) ) : ?>
					<p class="features-desc"><?php echo wp_kses( html_entity_decode( $startkit_envira_repeater_text ), $startkit_envira_allowed_html ); ?></p>
					<?php endif; ?>
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
