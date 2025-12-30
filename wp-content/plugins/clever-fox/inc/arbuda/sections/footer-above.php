<?php 
if ( ! function_exists( 'aravalli_above_footer' ) ) :
	function aravalli_above_footer() {
	$aravalli_arbuda_hs_above_footer		= get_theme_mod('hs_above_footer','1'); 
	$aravalli_arbuda_footer_above_content	= get_theme_mod('footer_above_content',aravalli_get_footer_above_default());
	if ($aravalli_arbuda_hs_above_footer == '1') {
?>
	<div class="row">
		<div class="col-12">
			<div class="social-box wow fadeInUp">
				<?php
					if ( ! empty( $aravalli_arbuda_footer_above_content ) ) {
					$aravalli_arbuda_footer_above_content = json_decode( $aravalli_arbuda_footer_above_content );
					foreach ( $aravalli_arbuda_footer_above_content as $aravalli_arbuda_footer_item ) {
						$aravalli_arbuda_repeater_title = ! empty( $aravalli_arbuda_footer_item->title ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_arbuda_footer_item->title, 'footer section' ) : '';
						$aravalli_arbuda_repeater_subtitle = ! empty( $aravalli_arbuda_footer_item->subtitle ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_arbuda_footer_item->subtitle, 'footer section' ) : '';
						$aravalli_arbuda_repeater_icon = ! empty( $aravalli_arbuda_footer_item->icon_value ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_arbuda_footer_item->icon_value, 'footer section' ) : '';
						$aravalli_arbuda_repeater_link = ! empty( $aravalli_arbuda_footer_item->link ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_arbuda_footer_item->link, 'footer section' ) : '';
				?>
					<div class="info-item">
						<div class="info-icon">
							<a href="<?php echo esc_url( $aravalli_arbuda_repeater_link ); ?>">
								<?php if ( ! empty( $aravalli_arbuda_repeater_icon )){ ?>
									<i class="fa <?php echo esc_attr( $aravalli_arbuda_repeater_icon ); ?>"></i>
								<?php } ?>	
							</a>	
						</div>
						<div class="info-content">
							<?php if ( ! empty( $aravalli_arbuda_repeater_title )){ ?>
								<h6 class="info-title"><?php echo esc_html( $aravalli_arbuda_repeater_title ); ?></h6>
							<?php } ?>	
							<?php if ( ! empty( $aravalli_arbuda_repeater_subtitle )){ ?>
							<div class="info-sub-title"><?php echo esc_html( $aravalli_arbuda_repeater_subtitle ); ?></div>
							<?php } ?>	
						</div>
					</div>
				<?php }}?>
			</div>
		</div>
	</div>
<?php } 
} endif;
add_action('aravalli_above_footer', 'aravalli_above_footer');