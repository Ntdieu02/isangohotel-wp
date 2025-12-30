<?php 
if ( ! function_exists( 'conceptly_lite_cta' ) ) :
	function conceptly_lite_cta() {
		$conceptly_hide_show_cta			= get_theme_mod('hide_show_cta','1'); 
		$conceptly_call_to_action_title	= get_theme_mod('call_to_action_title',__('Become a Part of Community !','clever-fox')); 
		$conceptly_call_to_action_description	= get_theme_mod('call_to_action_description',__('Get in touch with us and send some basic info for a quick quote','clever-fox'));
		$conceptly_cta_icon		= get_theme_mod('cta_icon','fa-shopping-cart');
		$conceptly_call_action_button_label			= get_theme_mod('call_action_button_label',__('Purchase Now','clever-fox'));
		$conceptly_call_action_button_link			= get_theme_mod('call_action_button_link','');
		$conceptly_call_action_button_target= get_theme_mod('call_action_button_target');
		$conceptly_call_action_background_setting= get_theme_mod('call_action_background_setting',esc_url(CLEVERFOX_PLUGIN_URL .'inc/conceptly/images/bg/cta-bg.jpg'));
		$conceptly_cta_background_position= get_theme_mod('cta_background_position','scroll');
		 if($conceptly_hide_show_cta == '1') { 
?>

<!-- Start: Call to action
    ============================= -->
<section id="cta"  class="section-padding" style="background-image:url('<?php echo esc_url($conceptly_call_action_background_setting); ?>');background-attachment:<?php echo esc_attr($conceptly_cta_background_position); ?>;">
    <div class="container">
        <div class="row cta">
            <div id="cta-header" class="col-lg-9 col-md-12 col-12 text-lg-left text-center mb-lg-0 mb-4">
				<?php if ( ! empty( $conceptly_call_to_action_title ) ) : ?>
					<h3><?php echo esc_html( $conceptly_call_to_action_title ); ?></h3>	
				<?php endif; ?>	
				<?php if ( ! empty( $conceptly_call_to_action_description ) ) : ?>
					<p><?php echo esc_html( $conceptly_call_to_action_description ); ?></p>
				<?php endif; ?>	
            </div>
            <div id="cta-btn" class="col-lg-3 col-md-12 col-12 text-lg-right text-center">
                <a href="<?php echo esc_url( $conceptly_call_action_button_link ); ?>" <?php if($conceptly_call_action_button_target== 'yes' || $conceptly_call_action_button_target== '1') { echo "target='_blank'"; } ?> class="boxed-btn purchase-btn"><i class="fa <?php echo esc_attr( $conceptly_cta_icon ); ?>"></i><?php echo esc_html( $conceptly_call_action_button_label ); ?></a>
            </div>
        </div>
    </div>
</section>  

<!-- End: Call to action
============================= -->
<?php
	}
}
	endif;
	if ( function_exists( 'conceptly_lite_cta' ) ) {
		$cleverfox_section_priority = apply_filters( 'conceptly_section_priority', 29, 'conceptly_lite_cta' );
		add_action( 'conceptly_sections', 'conceptly_lite_cta', absint( $cleverfox_section_priority ) );
	}