<?php 
if ( ! function_exists( 'cleverfox_axtria_lite_funfact' ) ) :
	function cleverfox_axtria_lite_funfact() {
	$avril_axtria_hs_funfact					= get_theme_mod('hs_funfact','1');	
	$avril_axtria_funfact_contents			= get_theme_mod('funfact_contents',avril_get_funfact_default());
	$avril_axtria_funfact_sec_column			= get_theme_mod('funfact_sec_column','3');
	$avril_axtria_funfact_bg_setting			= get_theme_mod('funfact_bg_setting',CLEVERFOX_PLUGIN_URL .'inc/axtria/images/fun-fact-bg.jpg');
	$avril_axtria_funfact_bg_position		= get_theme_mod('funfact_bg_position','fixed');
	if($avril_axtria_hs_funfact=='1'){
?>
    <section id="funfact-section" class="funfact-section layout-overlay" style="background-image:url('<?php echo esc_url($avril_axtria_funfact_bg_setting); ?>');background-attachment:<?php echo esc_attr($avril_axtria_funfact_bg_position); ?>">
        <div class="av-container">
            <div class="av-columns-area">
				<?php
					if ( ! empty( $avril_axtria_funfact_contents ) ) {
					$avril_axtria_funfact_contents = json_decode( $avril_axtria_funfact_contents );
					foreach ( $avril_axtria_funfact_contents as $avril_axtria_funfact_item ) {
						$avril_axtria_repeater_title = ! empty( $avril_axtria_funfact_item->title ) ? apply_filters( 'avril_translate_single_string', $avril_axtria_funfact_item->title, 'Funfact section' ) : '';
						$avril_axtria_repeater_text = ! empty( $avril_axtria_funfact_item->text ) ? apply_filters( 'avril_translate_single_string', $avril_axtria_funfact_item->text, 'Funfact section' ) : '';
						$avril_axtria_repeater_avril_axtria_repeater_icon = ! empty( $avril_axtria_funfact_item->icon_value) ? apply_filters( 'avril_translate_single_string', $avril_axtria_funfact_item->icon_value,'Funfact section' ) : '';
						$avril_axtria_repeater_image = ! empty( $avril_axtria_funfact_item->image_url ) ? apply_filters( 'avril_translate_single_string', $avril_axtria_funfact_item->image_url, 'Funfact section' ) : '';
				?>
					<div class="av-column-<?php echo esc_attr( $avril_axtria_funfact_sec_column ); ?> av-md-column-6 mb-4 mb-av-0">
						<div class="funfact-item">
							<?php if ( ! empty( $avril_axtria_repeater_image )  &&  ! empty( $avril_axtria_repeater_icon )){ ?>
								<img class="services_cols_mn_icon" src="<?php echo esc_url( $avril_axtria_repeater_image ); ?>" <?php if ( ! empty( $avril_axtria_repeater_title ) ) : ?> alt="<?php echo esc_attr( $avril_axtria_repeater_title ); ?>" title="<?php echo esc_attr( $avril_axtria_repeater_title ); ?>" <?php endif; ?> />
							<?php }elseif ( ! empty( $avril_axtria_repeater_image ) ) { ?>
								<img class="services_cols_mn_icon" src="<?php echo esc_url( $avril_axtria_repeater_image ); ?>" <?php if ( ! empty( $avril_axtria_repeater_title ) ) : ?> alt="<?php echo esc_attr( $avril_axtria_repeater_title ); ?>" title="<?php echo esc_attr( $avril_axtria_repeater_title ); ?>" <?php endif; ?> />
							<?php }elseif ( ! empty( $avril_axtria_repeater_icon ) ) {?>
								<i class="fa <?php echo esc_html( $avril_axtria_repeater_icon ); ?> txt-pink"></i>
							<?php } ?>
							<?php if ( ! empty( $avril_axtria_repeater_title ) ) : ?>
								<h1 class="counter"><?php echo esc_html( $avril_axtria_repeater_title ); ?></h1>
							<?php endif; ?>                            
							<?php if ( ! empty( $avril_axtria_repeater_text ) ) : ?>
								<p><?php echo esc_html( $avril_axtria_repeater_text ); ?></p>
							<?php endif; ?>
						</div>
					</div>
				<?php } } ?>
            </div>
        </div>
    </section>
<?php
}} endif; 
	if ( function_exists( 'cleverfox_axtria_lite_funfact' ) ) {
		$cleverfox_section_priority = apply_filters( 'avril_section_priority', 14, 'avril_lite_funfact' );
		add_action( 'avril_sections', 'cleverfox_axtria_lite_funfact', absint( $cleverfox_section_priority ) );
	}		