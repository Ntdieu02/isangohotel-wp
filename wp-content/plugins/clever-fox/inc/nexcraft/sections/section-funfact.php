<?php  
	$nexcraft_funfact_hs				= get_theme_mod('funfact_hs','1');
	$nexcraft_funfact_title 			= get_theme_mod('funfact_title',__('Our Funfact','clever-fox'));
	$nexcraft_funfact_subtitle		= get_theme_mod('funfact_subtitle',__('Funfact','clever-fox'));
	$nexcraft_funfact_contents		= get_theme_mod('funfact_contents',nexcraft_get_funfact_default());
	$nexcraft_funfact_sec_column		= get_theme_mod('funfact_sec_column','3');  	
	if($nexcraft_funfact_hs == '1'){
?>	
	<!-- funfact section -->
<section class="funfact-section" style="background: var(--primary-color);" >
    <div class="container">
        <div class="row">
			<?php
				if ( ! empty( $nexcraft_funfact_contents ) ) {
				$nexcraft_funfact_contents = json_decode( $nexcraft_funfact_contents );
				foreach ( $nexcraft_funfact_contents as $nexcraft_funfact_item ) {
					$nexcraft_repeater_title = ! empty( $nexcraft_funfact_item->title ) ? apply_filters( 'nexcraft_pro_translate_single_string', $nexcraft_funfact_item->title, 'Funfact section' ) : '';
					$nexcraft_repeater_subtitle = ! empty( $nexcraft_funfact_item->subtitle ) ? apply_filters( 'nexcraft_pro_translate_single_string', $nexcraft_funfact_item->subtitle, 'Funfact section' ) : '';
					$nexcraft_repeater_text = ! empty( $nexcraft_funfact_item->text ) ? apply_filters( 'nexcraft_pro_translate_single_string', $nexcraft_funfact_item->text, 'Funfact section' ) : '';
					$nexcraft_repeater_icon = ! empty( $nexcraft_funfact_item->icon_value ) ? apply_filters( 'nexcraft_pro_translate_single_string', $nexcraft_funfact_item->icon_value, 'Funfact section' ) : '';
					$nexcraft_repeater_choice = ! empty( $nexcraft_funfact_item->choice ) ? apply_filters( 'nexcraft_pro_translate_single_string', $nexcraft_funfact_item->choice, 'Funfact section' ) : '';
			?>
				<div class="col-lg-3 col-sm-6">
					<div class="funfact">
						<div class="funfact-icon">
							<?php if(!empty($nexcraft_repeater_icon)): ?>
								<i class="fas <?php echo esc_attr($nexcraft_repeater_icon); ?>"></i>
							<?php endif; ?>
						</div>
						
						<div class="funfact-content">
							<?php if(!empty($nexcraft_repeater_title)  || !empty($nexcraft_repeater_subtitle)): ?>
								<h2><span class="counter"><?php if($nexcraft_repeater_title): echo esc_html($nexcraft_repeater_title); endif; ?></span><?php if($nexcraft_repeater_subtitle): echo esc_html($nexcraft_repeater_subtitle); endif; ?></h2>
							<?php endif; ?>
							
							<?php if(!empty($nexcraft_repeater_text)): ?>
								<p>
									<?php echo esc_html($nexcraft_repeater_text); ?>
								</p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php } } ?>
        </div>
    </div>
</section>
<?php } ?>
<!-- funfact section end -->