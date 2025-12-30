<?php  
if ( ! function_exists( 'cleverfox_aravalli_lite_info' ) ) :
	function cleverfox_aravalli_lite_info() {
	$aravalli_villapress_info_hs 		= get_theme_mod('info_hs','1');	
	$aravalli_villapress_info_contents 			= get_theme_mod('info_contents',aravalli_get_info_default());
	$aravalli_villapress_info_sec_column			= get_theme_mod('info_sec_column');
	if($aravalli_villapress_info_hs =='1'){
?>
<section id="info-fact" class="info-fact">
	<div class="container">
		<div class="row info-content wow fadeInUp">
			<?php
				if ( ! empty( $aravalli_villapress_info_contents ) ) {
				$aravalli_villapress_info_contents = json_decode( $aravalli_villapress_info_contents );
				foreach ( $aravalli_villapress_info_contents as $aravalli_villapress_info_item ) {
					$aravalli_villapress_repeater_title = ! empty( $aravalli_villapress_info_item->title ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_villapress_info_item->title, 'info section' ) : '';
					
					$aravalli_villapress_repeater_icon = ! empty( $aravalli_villapress_info_item->icon_value ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_villapress_info_item->icon_value, 'info section' ) : '';
					$aravalli_villapress_repeater_image = ! empty( $aravalli_villapress_info_item->image_url ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_villapress_info_item->image_url, 'info section' ) : '';
			?>
			<div class="col-lg<?php echo esc_attr($aravalli_villapress_info_sec_column); ?> col-md-4 col-sm-6 col-12 mb-4">
				<div class="info-box">
					<?php if(!empty($aravalli_villapress_repeater_image)): ?>
						<div class="nt-circle"><img src="<?php echo esc_url($aravalli_villapress_repeater_image); ?>"></div>
					<?php else: ?>	
						<div class="nt-circle"><i class="fa <?php echo esc_attr($aravalli_villapress_repeater_icon); ?>"></i></div>
					<?php endif; ?>	
					<div class="singlefact">  
					<?php if(!empty($aravalli_villapress_repeater_title)): ?>
						<h5><span class="counter"><?php echo esc_html($aravalli_villapress_repeater_title); ?></h5>
					<?php endif; ?>				
					</div>
				</div>
			</div>
			<?php } } ?>
		</div>
	</div>
</section>

<?php
}}

endif;
if ( function_exists( 'cleverfox_aravalli_lite_info' ) ) {
	$cleverfox_section_priority = apply_filters( 'aravalli_section_priority', 12, 'cleverfox_aravalli_lite_info' );
	add_action( 'aravalli_sections', 'cleverfox_aravalli_lite_info', absint( $cleverfox_section_priority ) );
	}