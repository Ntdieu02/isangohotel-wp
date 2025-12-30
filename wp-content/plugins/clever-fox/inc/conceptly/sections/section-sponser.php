<?php
if ( ! function_exists( 'conceptly_lite_sponsors' ) ) :
function conceptly_lite_sponsors() {
	$conceptly_default_content 			= conceptly_get_sponsers_default();
	$conceptly_hide_show_sponser			= get_theme_mod('hide_show_sponser','1');
	$conceptly_sponser_contents			= get_theme_mod('sponser_contents',$conceptly_default_content);
	$conceptly_sponsers_background_setting= get_theme_mod('sponsers_background_setting',CLEVERFOX_PLUGIN_URL .'inc/conceptly/images/bg/partner-bg.jpg');
	$conceptly_sponsers_background_position= get_theme_mod('sponsers_background_position','scroll');	
 if($conceptly_hide_show_sponser == '1') { 
?>
<!-- Start: Our Client
    ============================= -->
<section id="our-partners" style="background-image:url('<?php echo esc_url($conceptly_sponsers_background_setting); ?>');background-attachment:<?php echo esc_attr($conceptly_sponsers_background_position); ?>;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="partner-carousel">
					<?php
						if ( ! empty( $conceptly_sponser_contents ) ) {
						$conceptly_allowed_html = array(
						'br'     => array(),
						'em'     => array(),
						'strong' => array(),
						'b'      => array(),
						'i'      => array(),
						);
						$conceptly_sponser_contents = json_decode( $conceptly_sponser_contents );
						foreach ( $conceptly_sponser_contents as $conceptly_sponser_item ) {
							$conceptly_repeater_link = ! empty( $conceptly_sponser_item->link ) ? apply_filters( 'conceptly_translate_single_string', $conceptly_sponser_item->link, 'sponser section' ) : '';
							$conceptly_repeater_image = ! empty( $conceptly_sponser_item->image_url ) ? apply_filters( 'conceptly_translate_single_string', $conceptly_sponser_item->image_url, 'sponser section' ) : '';
					?>	
                    <div class="single-partner">
                        <div class="inner-partner">
							<?php if ( ! empty( $conceptly_repeater_image ) ) : ?>
									<a href="<?php echo esc_url($conceptly_repeater_link); ?>"><img src="<?php echo esc_url( $conceptly_repeater_image ); ?>" <?php if ( ! empty( $conceptly_repeater_title ) ) : ?> alt="<?php echo esc_attr( $conceptly_repeater_title ); ?>" title="<?php echo esc_attr( $conceptly_repeater_title ); ?>" <?php endif; ?> /></a>
							<?php endif; ?>
                            
                        </div>
                    </div>
					<?php } } ?>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- End: Our Client
============================= -->
<?php } 
 }
endif;
if ( function_exists( 'conceptly_lite_sponsors' ) ) {
	$cleverfox_theme = wp_get_theme();
	if('Convo' == $cleverfox_theme->name){
		$cleverfox_section_priority = apply_filters( 'conceptly_section_priority', 11, 'conceptly_lite_sponsors' );
		}else{
		$cleverfox_section_priority = apply_filters( 'conceptly_section_priority', 32, 'conceptly_lite_sponsors' );
	}
	add_action( 'conceptly_sections', 'conceptly_lite_sponsors', absint( $cleverfox_section_priority ) );
}