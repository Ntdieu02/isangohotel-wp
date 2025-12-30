<?php
 if ( ! function_exists( 'startkit_service_plu' ) ) :
	function startkit_service_plu() {
	$startkit_startbiz_hide_show_service	= get_theme_mod('hide_show_service','1'); 
	$startkit_startbiz_service_title		= get_theme_mod('service_title',__('Services','clever-fox'));
	$startkit_startbiz_service_subttl		= get_theme_mod('service_subttl',__('<span>Service</span> <h6>Lorem is dummy text.</h6>','clever-fox'));
	$startkit_startbiz_service_description= get_theme_mod('service_description',__('Publishing packages and web page editors now use Lorem Ipsum as their default model text','clever-fox'));
	$startkit_startbiz_service_contents	= get_theme_mod('service_contents',startkit_get_service_default());	
if($startkit_startbiz_hide_show_service == '1') {?>
<section id="services" class="section-padding">
	<div class="container">
	<?php  
	if( ($startkit_startbiz_service_title) || ($startkit_startbiz_service_subttl)!='' || ($startkit_startbiz_service_description)!='' ) { ?>
	    <!-- Section Title -->
		<div class="row">
			<div class="col-md-6 offset-md-3 text-center">
				<div class="section-header">
					<?php if ( ! empty( $startkit_startbiz_service_subttl ) ) : ?>
					<div class="subtitle"><?php echo wp_kses_post( $startkit_startbiz_service_subttl ); ?></div>
					<?php endif; ?>
					<?php if ( ! empty( $startkit_startbiz_service_title ) || is_customize_preview() ) : ?>
					<h2>
					<?php echo esc_html($startkit_startbiz_service_title); ?>
					</h2>
					<?php endif; ?>
					<hr class="liner">
					<?php if($startkit_startbiz_service_description) { ?>					
					<p class="wow fadeInUp" data-wow-delay="0.1s">
					<?php echo esc_html($startkit_startbiz_service_description); ?>
					</p>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- /Section Title -->
		<?php } ?>
	<div class="row text-center servicesss">
		<?php
	
		if ( ! empty( $startkit_startbiz_service_contents ) ) {
		$startkit_startbiz_allowed_html = array(
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'b'      => array(),
		'i'      => array(),
		);
		$startkit_startbiz_service_contents = json_decode( $startkit_startbiz_service_contents );
		foreach ( $startkit_startbiz_service_contents as $startkit_startbiz_service_item ) {
			$startkit_startbiz_repeater_icon = ! empty( $startkit_startbiz_service_item->icon_value ) ? apply_filters( 'startkit_translate_single_string', $startkit_startbiz_service_item->icon_value, 'service section' ) : '';
			$startkit_startbiz_repeater_title = ! empty( $startkit_startbiz_service_item->title ) ? apply_filters( 'startkit_translate_single_string', $startkit_startbiz_service_item->title, 'service section' ) : '';
			$startkit_startbiz_repeater_text = ! empty( $startkit_startbiz_service_item->text ) ? apply_filters( 'startkit_translate_single_string', $startkit_startbiz_service_item->text, 'service section' ) : '';
			$startkit_startbiz_repeater_text2 = ! empty( $startkit_startbiz_service_item->text2) ? apply_filters( 'startkit_translate_single_string', $startkit_startbiz_service_item->text2,'service section' ) : '';
			$startkit_startbiz_repeater_link = ! empty( $startkit_startbiz_service_item->link ) ? apply_filters( 'startkit_translate_single_string', $startkit_startbiz_service_item->link, 'service section' ) : '';
			$startkit_startbiz_repeater_image = ! empty( $startkit_startbiz_service_item->image_url ) ? apply_filters( 'startkit_translate_single_string', $startkit_startbiz_service_item->image_url, 'service section' ) : '';
			?>
			<div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-lg-0 mb-4">
				<div class="features-startbiz wow fadeInUp" data-wow-delay="0.4s">
  					<div class="features-contented">
    					<div class="features-icon">
							<?php if ( ! empty( $startkit_startbiz_repeater_icon ) ) :?>
								<i class="fa <?php echo esc_html( $startkit_startbiz_repeater_icon ); ?> txt-pink"></i>
							<?php endif; ?>
						</div>
						<?php if ( ! empty( $startkit_startbiz_repeater_title ) ) : ?>
							<h5><a href="#"><?php echo esc_html( $startkit_startbiz_repeater_title ); ?></a></h5>
						<?php endif; ?>
						<?php if ( ! empty( $startkit_startbiz_repeater_text ) ) : ?>
							<p class="features-desc"><?php echo wp_kses( html_entity_decode( $startkit_startbiz_repeater_text ), $startkit_startbiz_allowed_html ); ?></p>
						<?php endif; ?>
						
						<?php if ( ! empty( $startkit_startbiz_repeater_text2 ) ) : ?>
							<a href="<?php echo esc_url( $startkit_startbiz_repeater_link ); ?>" class="features-link">
								<span><?php echo esc_html( $startkit_startbiz_repeater_text2 ); ?></span>
								<i class="fa fa-arrow-right "></i>
							</a>
						<?php endif; ?>
					</div>
					<?php if(!empty($startkit_startbiz_repeater_image)): ?>
						<div class="features-overlay" style="background-image: url(<?php echo esc_url($startkit_startbiz_repeater_image); ?>); background-size: cover; background-position: center center;"></div>
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
	}}
endif;
if ( function_exists( 'startkit_service_plu' ) ) {
$cleverfox_section_priority = apply_filters( 'startkit_section_priority', 13, 'startkit_service_plu' );
add_action( 'startkit_sections', 'startkit_service_plu', absint( $cleverfox_section_priority ) );

}
	?>
