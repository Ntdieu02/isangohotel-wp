<?php 
if ( ! function_exists( 'metasoft_lite_info' ) ) :
	function metasoft_lite_info() {
	$metasoft_info_hs		= get_theme_mod('info_hs','1');	
	$metasoft_info_contents	= get_theme_mod('info_contents',metasoft_get_info_default());
if(!empty($metasoft_info_hs)){
?> 
<!-- Info Section -->
<section id="info-section" class="info-section">
	<div class="container">
		<div class="row g-lg-4 g-5 wow fadeInUp">
			<?php
			if ( ! empty( $metasoft_info_contents ) ) {
			$metasoft_info_contents = json_decode( $metasoft_info_contents );
			foreach ( $metasoft_info_contents as $metasoft_info_item ) {
				$metasoft_repeater_title = ! empty( $metasoft_info_item->title ) ? apply_filters( 'metasoft_translate_single_string', $metasoft_info_item->title, 'slider section' ) : '';
				$metasoft_repeater_text = ! empty( $metasoft_info_item->text ) ? apply_filters( 'metasoft_translate_single_string', $metasoft_info_item->text, 'slider section' ) : '';
				$metasoft_repeater_button = ! empty( $metasoft_info_item->text2) ? apply_filters( 'metasoft_translate_single_string', $metasoft_info_item->text2,'slider section' ) : '';
				$metasoft_repeater_link = ! empty( $metasoft_info_item->link ) ? apply_filters( 'metasoft_translate_single_string', $metasoft_info_item->link, 'slider section' ) : '';
				$metasoft_repeater_icon = ! empty( $metasoft_info_item->icon_value ) ? apply_filters( 'metasoft_translate_single_string', $metasoft_info_item->icon_value, 'slider section' ) : '';
		?>
			<div class="col-lg-3 col-sm-6">
				<div class="info-box">
					<div class="info-box-icon">
						<?php if ( ! empty( $metasoft_repeater_icon ) ) {?>
							<i class="fa <?php echo esc_attr( $metasoft_repeater_icon ); ?>"></i>
						<?php } ?>
					</div>
					
					<?php if ( ! empty( $metasoft_repeater_title ) ) {?>
						<h5><?php echo esc_html( $metasoft_repeater_title ); ?></h5>
					<?php } ?>	
					
					<?php if ( ! empty( $metasoft_repeater_text ) ) {?>
						<p><?php echo esc_html( $metasoft_repeater_text ); ?></p>
					<?php } ?>
					
					<?php if ( ! empty( $metasoft_repeater_button ) ) {?>
						<div class="theme-link"><a href="<?php echo esc_url( $metasoft_repeater_link ); ?>" class="read-link"><?php echo esc_html( $metasoft_repeater_button ); ?></a></div>
					<?php } ?>
				</div>
			</div>
			<?php } } ?>
		</div>
	</div>
</section>
<?php	
}}
endif;
if ( function_exists( 'metasoft_lite_info' ) ) {
$cleverfox_section_priority = apply_filters( 'metasoft_section_priority', 12, 'metasoft_lite_info' );
add_action( 'metasoft_sections', 'metasoft_lite_info', absint( $cleverfox_section_priority ) );
}
?>
<!-- Info Section -->