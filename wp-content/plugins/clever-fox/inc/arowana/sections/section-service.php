<?php
 if ( ! function_exists( 'startkit_service_plu' ) ) :
	function startkit_service_plu() {
	$startkit_arowana_hide_show_service	= get_theme_mod('hide_show_service','1'); 
	$startkit_arowana_service_title		= get_theme_mod('service_title',__('Services','clever-fox'));
	$startkit_arowana_service_subttl		= get_theme_mod('service_subttl',__('<span>Service</span> <h6>Lorem is dummy text.</h6>','clever-fox'));
	$startkit_arowana_service_description= get_theme_mod('service_description',__('Publishing packages and web page editors now use Lorem Ipsum as their default model text','clever-fox'));
	$startkit_arowana_service_contents	= get_theme_mod('service_contents',startkit_get_service_default());	
if($startkit_arowana_hide_show_service == '1') {?>
<section id="services" class="section-padding">
	<div class="container">
	<?php  
	if( ($startkit_arowana_service_title) || ($startkit_arowana_service_description)!='' ) { ?>
	    <!-- Section Title -->
	
		<div class="row">
			<div class="col-md-6 offset-md-3 text-center">
				<div class="section-header">
					<?php if ( ! empty( $startkit_arowana_service_subttl ) ) : ?>
					<div class="subtitle"><?php echo wp_kses_post( $startkit_arowana_service_subttl ); ?></div>
					<?php endif; ?>
					<?php if ( ! empty( $startkit_arowana_service_title ) || is_customize_preview() ) : ?>
					<h2>
					<?php echo wp_kses_post($startkit_arowana_service_title); ?>
					</h2>
					<hr class="liner">
					<?php endif; ?>					
					<?php if($startkit_arowana_service_description) { ?>					
					<p class="wow fadeInUp" data-wow-delay="0.1s">
					<?php echo wp_kses_post($startkit_arowana_service_description); ?>
					</p>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- /Section Title -->
		<?php } ?>
	<div class="row text-center servicesss">
		<?php
	
		if ( ! empty( $startkit_arowana_service_contents ) ) {
		$startkit_arowana_allowed_html = array(
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'b'      => array(),
		'i'      => array(),
		);
		$startkit_arowana_service_contents = json_decode( $startkit_arowana_service_contents );
		foreach ( $startkit_arowana_service_contents as $startkit_arowana_i => $startkit_arowana_service_item ) {
			$startkit_arowana_repeater_icon = ! empty( $startkit_arowana_service_item->icon_value ) ? apply_filters( 'startkit_translate_single_string', $startkit_arowana_service_item->icon_value, 'service section' ) : '';
			$startkit_arowana_repeater_title = ! empty( $startkit_arowana_service_item->title ) ? apply_filters( 'startkit_translate_single_string', $startkit_arowana_service_item->title, 'service section' ) : '';
			$startkit_arowana_repeater_text = ! empty( $startkit_arowana_service_item->text ) ? apply_filters( 'startkit_translate_single_string', $startkit_arowana_service_item->text, 'service section' ) : '';
			$startkit_arowana_repeater_text2 = ! empty( $startkit_arowana_service_item->text2) ? apply_filters( 'startkit_translate_single_string', $startkit_arowana_service_item->text2,'service section' ) : '';
			$startkit_arowana_repeater_link = ! empty( $startkit_arowana_service_item->link ) ? apply_filters( 'startkit_translate_single_string', $startkit_arowana_service_item->link, 'service section' ) : '';
			?>
			<div class="col-lg-4 col-md-4 col-sm-6 col-12 text-center mb-5">
				<div class="features-arowana wow fadeInUp" data-wow-delay="0.4s">
					<div class="icon">
						<span class="count">0<?php echo esc_html( $startkit_arowana_i + 1 ); ?></span>
						<?php if ( ! empty( $startkit_arowana_repeater_icon ) ) :?>
						<i class="fa <?php echo esc_html( $startkit_arowana_repeater_icon ); ?> txt-pink"></i>
						<?php endif; ?>
					</div>
					<div class="content">
						<?php if ( ! empty( $startkit_arowana_repeater_title ) ) : ?>
						<h5><a href="<?php echo esc_url( $startkit_arowana_repeater_link ); ?>"><?php echo esc_html( $startkit_arowana_repeater_title ); ?></a></h5>
						<?php endif; ?>
						<?php if ( ! empty( $startkit_arowana_repeater_text ) ) : ?>
						<div class="text"><?php echo wp_kses( html_entity_decode( $startkit_arowana_repeater_text ), $startkit_arowana_allowed_html ); ?></div>
						<?php endif; ?>
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
	}}
endif;
if ( function_exists( 'startkit_service_plu' ) ) {
$cleverfox_section_priority = apply_filters( 'startkit_section_priority', 13, 'startkit_service_plu' );
add_action( 'startkit_sections', 'startkit_service_plu', absint( $cleverfox_section_priority ) );
}
