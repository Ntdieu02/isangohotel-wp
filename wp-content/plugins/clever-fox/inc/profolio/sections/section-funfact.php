<?php  
	$corpex_profolio_hs_funfact = get_theme_mod('hs_funfact', '1');
	$corpex_profolio_funfact_contents		= get_theme_mod('funfact_contents',corpex_get_funfact_default());  
	$corpex_profolio_funfact_bg_img			= get_theme_mod('funfact_bg_img',esc_url(CLEVERFOX_PLUGIN_URL .'inc/corpex/images/shapes/shape-1.png')); 
	
	if($corpex_profolio_hs_funfact == '1') {
?>	
<!-- funfact -->
    <section class="funfact-section home-funfact" <?php if(!empty($corpex_profolio_funfact_bg_img)){ ?> style="background-image:url(<?php echo esc_url($corpex_profolio_funfact_bg_img) ?>);" <?php } ?>>
        <div class="container">
            <div class="row">
				<?php
					if ( ! empty( $corpex_profolio_funfact_contents ) ) {
					$corpex_profolio_funfact_contents = json_decode( $corpex_profolio_funfact_contents );
					foreach ( $corpex_profolio_funfact_contents as $corpex_profolio_funfact_item ) {
						$corpex_profolio_repeater_title = ! empty( $corpex_profolio_funfact_item->title ) ? apply_filters( 'corpex_translate_single_string', $corpex_profolio_funfact_item->title, 'Funfact section' ) : '';
						$corpex_profolio_repeater_text = ! empty( $corpex_profolio_funfact_item->text ) ? apply_filters( 'corpex_translate_single_string', $corpex_profolio_funfact_item->text, 'Funfact section' ) : '';
				?>
					<div class="col-lg-3 col-md-6">
						<div class="funfact">
							<h5><span class="counter-count"><?php echo esc_html($corpex_profolio_repeater_text); ?></span>+</h5>
							<p><?php echo esc_html($corpex_profolio_repeater_title); ?></p>
						</div>
					</div>
				<?php } } ?>
            </div>
        </div>
    </section>
	<?php } ?>
<!-- funfact end -->