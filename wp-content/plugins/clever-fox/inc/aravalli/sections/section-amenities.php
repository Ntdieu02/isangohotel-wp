<?php
if ( ! function_exists( 'cleverfox_aravalli_lite_amenities' ) ) :
	function cleverfox_aravalli_lite_amenities() {
$aravalli_hs_pg_about_amenities 		= get_theme_mod( 'hs_pg_about_amenities','1'); 
$aravalli_pg_about_amenities_ttl 	= get_theme_mod( 'pg_about_amenities_ttl',__('Hotel','clever-fox')); 
$aravalli_pg_about_amenities_sub 	= get_theme_mod( 'pg_about_amenities_sub',__('Amenities','clever-fox')); 
$aravalli_pg_about_amenities_desc 	= get_theme_mod( 'pg_about_amenities_desc',__('Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book.','clever-fox')); 
$aravalli_pg_about_amenities_content 		= get_theme_mod( 'pg_about_amenities_content',aravalli_get_amenities_default());
$aravalli_pg_about_amenities_bg_img 			= get_theme_mod( 'pg_about_amenities_bg_img',esc_url(CLEVERFOX_PLUGIN_URL .'inc/aravalli/images/amenities-bg.jpg'));
$aravalli_pg_about_amenities_back_attach 	= get_theme_mod( 'pg_about_amenities_back_attach','scroll');
if($aravalli_hs_pg_about_amenities=='1'){
?>
<section id="amenities" class="amenities" style="background-image:url('<?php echo esc_url($aravalli_pg_about_amenities_bg_img); ?>');background-attachment:<?php echo esc_attr($aravalli_pg_about_amenities_back_attach); ?>">
	<div class="container">
		<?php if(!empty($aravalli_pg_about_amenities_ttl) || !empty($aravalli_pg_about_amenities_sub) || !empty($aravalli_pg_about_amenities_desc)): ?>
			<div class="row">
				<div class="col-12">
					<div class="heading-default wow fadeInUp">
					
						<?php if(!empty($aravalli_pg_about_amenities_ttl)): ?>
							<h6><?php echo wp_kses_post($aravalli_pg_about_amenities_ttl); ?></h6>
						<?php endif; ?>	
						
						<?php if(!empty($aravalli_pg_about_amenities_sub)): ?>
							<h3><?php echo wp_kses_post($aravalli_pg_about_amenities_sub); ?><span class="line-circle"></span></h3>      
						<?php endif; ?>		
						
						<?php if(!empty($aravalli_pg_about_amenities_desc)): ?>				
							<p> <?php echo esc_html($aravalli_pg_about_amenities_desc); ?></p>
						<?php endif; ?>		
						
					</div>
				</div>
			</div>
		<?php endif; ?>	
		<div class="row">
			<div class="col-12">
				<div class="d-flex flex-wrap amenities-content">
					<?php
						if ( ! empty( $aravalli_pg_about_amenities_content ) ) {
						$aravalli_pg_about_amenities_content = json_decode( $aravalli_pg_about_amenities_content );
						foreach ( $aravalli_pg_about_amenities_content as  $aravalli_amenities_item ) {
							$aravalli_repeater_title = ! empty( $aravalli_amenities_item->title ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_amenities_item->title, 'Amenities section' ) : '';
							$aravalli_repeater_icon = ! empty( $aravalli_amenities_item->icon_value ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_amenities_item->icon_value, 'Amenities section' ) : '';
					?>
					<div class="amenities-item"><i class="fa <?php echo esc_attr($aravalli_repeater_icon); ?>"></i> <a href="javascript:void(0)"><?php echo esc_html($aravalli_repeater_title); ?></a></div>
					<?php } } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
	}}
endif;
if ( function_exists( 'cleverfox_aravalli_lite_amenities' ) ) {
$cleverfox_section_priority = apply_filters( 'aravalli_section_priority', 14, 'cleverfox_aravalli_lite_amenities' );
add_action( 'aravalli_sections', 'cleverfox_aravalli_lite_amenities', absint( $cleverfox_section_priority ) );
}