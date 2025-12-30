<?php  
if ( ! function_exists( 'cleverfox_boostify_lite_service' ) ) :
	function cleverfox_boostify_lite_service() {
	$boostify_hs_service 			= get_theme_mod('hs_service','1');	
	$boostify_boostify_service_title			= get_theme_mod('boostify_service_title',__('Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Services</b><b>Services</b><b>Services</b></span></span>','clever-fox'));
	$boostify_boostify_service_description	= get_theme_mod('boostify_service_description',__('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','clever-fox'));
	$boostify_boostify_service_contents 		= get_theme_mod('boostify_service_contents',boostify_get_service_default());
	if($boostify_hs_service == '1'){
?>
<section id="our-service" class="themes-bottom section-padding service-home">
	<div class="container">
		<?php if ( ! empty( $boostify_boostify_service_title )  || ! empty( $boostify_boostify_service_description )) : ?>
			<div class="row">
				<div class="col-lg-6 offset-lg-3">                    
					<div class="section-header text-center">
						<?php if ( ! empty( $boostify_boostify_service_title ) ) : ?>
							<h2><?php echo wp_kses_post($boostify_boostify_service_title); ?></h2>
						<?php endif; ?>	
						
						<?php if ( ! empty( $boostify_boostify_service_description ) ) : ?>		
							<p><?php echo wp_kses_post($boostify_boostify_service_description); ?></p>    
						<?php endif; ?>	
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="row" id="services">
			<?php
				if ( ! empty( $boostify_service_contents ) ) {
				$boostify_service_contents = json_decode( $boostify_service_contents );
				foreach ( $boostify_service_contents as $boostify_service_item ) {
					$boostify_repeater_title = ! empty( $boostify_service_item->title ) ? apply_filters( 'boostify_translate_single_string', $boostify_service_item->title, 'Service section' ) : '';
					$boostify_repeater_text = ! empty( $boostify_service_item->text ) ? apply_filters( 'boostify_translate_single_string', $boostify_service_item->text, 'Service section' ) : '';
					$boostify_repeater_button = ! empty( $boostify_service_item->text2 ) ? apply_filters( 'boostify_translate_single_string', $boostify_service_item->text2, 'Service section' ) : '';
					$boostify_repeater_link = ! empty( $boostify_service_item->link ) ? apply_filters( 'boostify_translate_single_string', $boostify_service_item->link, 'Service section' ) : '';
					$boostify_repeater_icon = ! empty( $boostify_service_item->icon_value) ? apply_filters( 'boostify_translate_single_string', $boostify_service_item->icon_value,'Service section' ) : '';
					$boostify_repeater_image = ! empty( $boostify_service_item->image_url ) ? apply_filters( 'boostify_translate_single_string', $boostify_service_item->image_url, 'Service section' ) : '';
			?>
				<div class="col-lg-4 col-md-6">
					<div class="service-box">
						<?php if(!empty($boostify_repeater_image)):?>
							<img src="<?php echo esc_url($boostify_repeater_image); ?>" />
						<?php else: ?>
							<i class="fa <?php echo esc_attr($boostify_repeater_icon); ?>"></i>
						<?php endif; ?>	
						
						<?php if(!empty($boostify_repeater_title)):?>
							<h4><?php echo esc_html($boostify_repeater_title); ?></h4>
						<?php endif; ?>
						
						<?php if(!empty($boostify_repeater_text)):?>
							<p><?php echo esc_html($boostify_repeater_text); ?></p>
						<?php endif; ?>
						
						<?php if(!empty($boostify_repeater_button)):?>
							<a href="<?php echo esc_url($boostify_repeater_link); ?>"><?php echo esc_html($boostify_repeater_button); ?></a>
						<?php endif; ?>
					</div>
				</div>
			<?php } } ?>
		</div>
	</div>
</section>
<?php	
	}}
endif;
if ( function_exists( 'cleverfox_boostify_lite_service' ) ) {
$cleverfox_section_priority = apply_filters( 'boostify_section_priority', 14, 'cleverfox_boostify_lite_service' );
add_action( 'boostify_sections', 'cleverfox_boostify_lite_service', absint( $cleverfox_section_priority ) );
}