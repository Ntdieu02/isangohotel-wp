<?php
 if ( ! function_exists( 'startkit_funfact_plu' ) ) :
	function startkit_funfact_plu() {
	$startkit_envira_hide_show_funfact			= get_theme_mod('hide_show_funfact','1');
	$startkit_envira_funfact_contents			= get_theme_mod('funfact_contents',startkit_get_funfact_default());
	$startkit_envira_funfact_background_setting	= get_theme_mod('funfact_background_setting',esc_url(CLEVERFOX_PLUGIN_URL . 'inc/envira/images/factbg.jpg'));
	$startkit_envira_funfact_background_position= get_theme_mod('funfact_background_position','fixed');	
	if($startkit_envira_hide_show_funfact == '1') { 
if ( ! empty( $startkit_envira_funfact_background_setting ) ) { ?>
    <section id="fun-fact" class="startkitrips" style="background:url('<?php echo esc_url($startkit_envira_funfact_background_setting); ?>') no-repeat center / cover <?php echo esc_attr($startkit_envira_funfact_background_position); ?>;">
		<?php } else { ?>
		<section id="fun-fact" class="fun-background">
		<?php } ?>
			<div class="container">
				<div class="row text-center">
				<?php
		
					if ( ! empty( $startkit_envira_funfact_contents ) ) {
					$startkit_envira_allowed_html = array(
					'br'     => array(),
					'em'     => array(),
					'strong' => array(),
					'b'      => array(),
					'i'      => array(),
					);
					$startkit_envira_funfact_contents = json_decode( $startkit_envira_funfact_contents );
					foreach ( $startkit_envira_funfact_contents as $startkit_envira_funfact_item ) {
						$startkit_envira_repeater_icon = ! empty( $startkit_envira_funfact_item->icon_value ) ? apply_filters( 'startkit_translate_single_string', $startkit_envira_funfact_item->icon_value, 'funfact section' ) : '';
						$startkit_envira_repeater_title = ! empty( $startkit_envira_funfact_item->title ) ? apply_filters( 'startkit_translate_single_string', $startkit_envira_funfact_item->title, 'funfact section' ) : '';
						$startkit_envira_repeater_subtitle = ! empty( $startkit_envira_funfact_item->subtitle ) ? apply_filters( 'startkit_translate_single_string', $startkit_envira_funfact_item->subtitle, 'funfact section' ) : '';
						$startkit_envira_repeater_text = ! empty( $startkit_envira_funfact_item->text ) ? apply_filters( 'startkit_translate_single_string', $startkit_envira_funfact_item->text, 'funfact section' ) : '';
					?>
					<div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-lg-0 mb-4 home-fun">
						<div class="fact-item">	
							<?php if ( ! empty( $startkit_envira_repeater_icon ) ) :?>
							<div class="icon-overly">
								<i class="fa <?php echo esc_attr( $startkit_envira_repeater_icon ); ?>"></i>
								<span class="ripple ripple-1"></span>
								<span class="ripple ripple-2"></span>
								<span class="ripple ripple-3"></span>
							</div>
							<?php endif; ?>	
							<?php if ( ! empty( $startkit_envira_repeater_title ) ) :?>
							<div><strong><span class="counter"><?php echo esc_html( $startkit_envira_repeater_title ); ?></span> <?php echo esc_html($startkit_envira_repeater_subtitle); ?></strong></div>
							<?php endif; ?>
							<?php if ( ! empty( $startkit_envira_repeater_text ) ) :?>
								<p><?php echo esc_html( $startkit_envira_repeater_text ); ?></p>
							<?php endif; ?>
						</div>
					</div>
					<?php } } ?>
				</div>
			</div>
		</section>
    </section>	
<?php 
	}}
endif;
if ( function_exists( 'startkit_funfact_plu' ) ) {
$cleverfox_section_priority = apply_filters( 'startkit_section_priority', 13, 'startkit_funfact_plu' );
add_action( 'startkit_sections', 'startkit_funfact_plu', absint( $cleverfox_section_priority ) );
}
?>
