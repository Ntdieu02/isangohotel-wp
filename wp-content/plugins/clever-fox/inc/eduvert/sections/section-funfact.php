<?php  
if ( ! function_exists( 'cleverfox_eduvert_lite_funfact' ) ) :
	function cleverfox_eduvert_lite_funfact() {
$eduvert_funfact_hs			= get_theme_mod('funfact_hs','1'); 	
$eduvert_funfact_title 		= get_theme_mod('funfact_title',__('Why Choose us','clever-fox'));
$eduvert_funfact_subttl 	= get_theme_mod('funfact_subttl',__('we bring new developing idea & design','clever-fox'));
$eduvert_funfact_description= get_theme_mod('funfact_description',__('There are many variations of passages of Lorem Ipsum available There are many variations of passages of Lorem Ipsum available are many variations of passages of Lorem Ipsum available There are many variations of passages of Lorem Ipsum available','clever-fox')); 
$eduvert_funfact_btn_lbl	= get_theme_mod('funfact_btn_lbl',__('Choose Plan','clever-fox'));
$eduvert_funfact_btn_link	= get_theme_mod('funfact_btn_link','#'); 
$eduvert_funfact_contents	= get_theme_mod('funfact_contents',eduvert_get_funfact_default()); 
if($eduvert_funfact_hs=='1'):
?>
<section class="section-funfact ptb-80 home1-funfact" id="funfact-one" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/elements/Shape9.png);">
	<div class="nt-container">
		<div class="nt-columns-area">
			<div class="nt-column-7 nt-sm-column-6 mb-4 mb-nt-0">
				<?php if(!empty($eduvert_funfact_title) || !empty($eduvert_funfact_subttl) || !empty($eduvert_funfact_description)): ?>
					<div class="section-title">
						<?php if(!empty($eduvert_funfact_title)): ?>
							<h5><?php echo wp_kses_post($eduvert_funfact_title); ?></h5>
						<?php endif; ?>
						
						<?php if(!empty($eduvert_funfact_subttl)): ?>
							<h3><?php echo wp_kses_post($eduvert_funfact_subttl); ?></h3>
						<?php endif; ?>	
						
						<?php if(!empty($eduvert_funfact_description)): ?>
							<p><?php echo wp_kses_post($eduvert_funfact_description); ?></p>
						<?php endif; ?>	
					</div>
				<?php endif; ?>
				
				<?php if(!empty($eduvert_funfact_btn_lbl)): ?>
					<a href="<?php echo esc_url($eduvert_funfact_btn_link); ?>" class="text-btn"><?php echo wp_kses_post($eduvert_funfact_btn_lbl); ?></a>
				<?php endif; ?>
			</div>
			<div class="nt-column-5 nt-sm-column-6">
				<div class="nt-columns-area">
					<?php
						if ( ! empty( $eduvert_funfact_contents ) ) {
						$eduvert_funfact_contents = json_decode( $eduvert_funfact_contents );
						foreach ( $eduvert_funfact_contents as $eduvert_funfact_item ) {
							$eduvert_repeater_title = ! empty( $eduvert_funfact_item->title ) ? apply_filters( 'eduvert_translate_single_string', $eduvert_funfact_item->title, 'Funfact section' ) : '';
							$eduvert_repeater_subtitle = ! empty( $eduvert_funfact_item->subtitle ) ? apply_filters( 'eduvert_translate_single_string', $eduvert_funfact_item->subtitle, 'Funfact section' ) : '';
							$eduvert_repeater_text = ! empty( $eduvert_funfact_item->text ) ? apply_filters( 'eduvert_translate_single_string', $eduvert_funfact_item->text, 'Funfact section' ) : '';
							$eduvert_repeater_icon = ! empty( $eduvert_funfact_item->icon_value ) ? apply_filters( 'eduvert_translate_single_string', $eduvert_funfact_item->icon_value, 'Funfact section' ) : '';
					?>
						<div class="nt-column-6 nt-md-column-6">
							<div class="funfact-item">
								<div class="funfact-icon">
									<?php if(!empty($eduvert_repeater_icon)): ?>
										<i class="fa <?php echo esc_attr($eduvert_repeater_icon); ?>"></i>
									<?php endif;  ?>	
								</div>
								
								<?php if(!empty($eduvert_repeater_title) || !empty($eduvert_repeater_subtitle)): ?>
									<h1><span class="counter"><?php echo esc_html($eduvert_repeater_title); ?></span><span><?php echo esc_html($eduvert_repeater_subtitle); ?></span></h1>     <?php endif;  ?>	  

								<?php if(!empty($eduvert_repeater_text)): ?>
									<p><?php echo esc_html($eduvert_repeater_text); ?></p>
								<?php endif;  ?>		
							</div>
						</div>
					<?php } } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php	
endif;	}
endif;
if ( function_exists( 'cleverfox_eduvert_lite_funfact' ) ) {
$cleverfox_section_priority = apply_filters( 'eduvert_section_priority', 14, 'cleverfox_eduvert_lite_funfact' );
add_action( 'eduvert_sections', 'cleverfox_eduvert_lite_funfact', absint( $cleverfox_section_priority ) );
}