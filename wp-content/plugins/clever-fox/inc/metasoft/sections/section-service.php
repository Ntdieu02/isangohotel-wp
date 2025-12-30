<?php 
if ( ! function_exists( 'metasoft_lite_service' ) ) :
	function metasoft_lite_service() {
	$metasoft_service_hs		= get_theme_mod('service_hs','1');	
	$metasoft_service_title  = get_theme_mod('service_title',__('Quality <span class="text-primary">Services</span>','clever-fox'));
	$metasoft_service_description   = get_theme_mod('service_description',__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text.','clever-fox'));
	$metasoft_service_contents	= get_theme_mod('service_contents',metasoft_get_service_default());
if(!empty($metasoft_service_hs)){	
?> 
<!-- Quality Services -->
<section id="services-wrapper" class="services-wrapper bs-py-default service-home">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-12 mx-lg-auto mb-5 text-center">
				<div class="heading-seprator wow fadeInUp">
					<?php if ( ! empty( $metasoft_service_title ) ) : ?>
						<h1><?php echo wp_kses_post($metasoft_service_title); ?></h1>
					<?php endif; ?>
					
					<?php if ( ! empty( $metasoft_service_description ) ) : ?>
						<p><?php echo esc_html($metasoft_service_description); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="row wow fadeInUp">
			<div class="col-12">
				<div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 g-4 wow fadeInUp content-service">
					<?php
						if ( ! empty( $metasoft_service_contents ) ) {
						$metasoft_service_contents = json_decode( $metasoft_service_contents );
						foreach ( $metasoft_service_contents as $metasoft_service_item ) {
							$metasoft_repeater_title = ! empty( $metasoft_service_item->title ) ? apply_filters( 'metasoft_translate_single_string', $metasoft_service_item->title, 'Service section' ) : '';
							$metasoft_repeater_text = ! empty( $metasoft_service_item->text ) ? apply_filters( 'metasoft_translate_single_string', $metasoft_service_item->text, 'Service section' ) : '';
							$metasoft_repeater_link = ! empty( $metasoft_service_item->link ) ? apply_filters( 'metasoft_translate_single_string', $metasoft_service_item->link, 'Service section' ) : '';
							$metasoft_repeater_icon = ! empty( $metasoft_service_item->icon_value ) ? apply_filters( 'metasoft_translate_single_string', $metasoft_service_item->icon_value, 'Service section' ) : '';
					?>
						<div class="col">
							<div class="single-seriveces">
								<div class="services-icons yellow">
									<?php if ( ! empty( $metasoft_repeater_icon ) ) {?>
										<i class="fa <?php echo esc_attr( $metasoft_repeater_icon ); ?>"></i>
									<?php } ?>
								</div>
								<?php if ( ! empty( $metasoft_repeater_title ) ) {?>
									<h5><a href="<?php echo esc_url( $metasoft_repeater_link ); ?>"><?php echo esc_html( $metasoft_repeater_title ); ?></a></h5>
								<?php } ?>	
								
								<?php if ( ! empty( $metasoft_repeater_text ) ) {?>
									<p><?php echo esc_html( $metasoft_repeater_text ); ?></p>
								<?php } ?>
							</div>
						</div>
					<?php } } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php	
}}
endif;
if ( function_exists( 'metasoft_lite_service' ) ) {
$cleverfox_section_priority = apply_filters( 'metasoft_section_priority', 13, 'metasoft_lite_service' );
add_action( 'metasoft_sections', 'metasoft_lite_service', absint( $cleverfox_section_priority ) );
}
?>
<!-- Quality Services End -->
	