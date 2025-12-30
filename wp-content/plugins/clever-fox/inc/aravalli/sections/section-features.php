<?php  
if ( ! function_exists( 'cleverfox_aravalli_lite_features' ) ) :
	function cleverfox_aravalli_lite_features() {
	$aravalli_features_hs 			= get_theme_mod('features_hs','1');		
	$aravalli_features_title 		= get_theme_mod('features_title',__('Explore','clever-fox'));
	$aravalli_features_subtitle		= get_theme_mod('features_subtitle',__('theme Features','clever-fox')); 
	$aravalli_features_description	= get_theme_mod('features_description',__('Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book.','clever-fox'));
	$aravalli_features_contents			= get_theme_mod('features_contents',aravalli_get_features_default());
	if($aravalli_features_hs =='1'){
?>
<section id="features" class="features sec-default features-home">
	<div class="container">
		<?php if(!empty($aravalli_features_title) || !empty($aravalli_features_subtitle) || !empty($aravalli_features_description)): ?>
			<div class="row">
				<div class="col-12">
					<div class="heading-default wow fadeInUp">
					
						<?php if(!empty($aravalli_features_title)): ?>
							<h6><?php echo wp_kses_post($aravalli_features_title); ?></h6>
						<?php endif; ?>	
						
						<?php if(!empty($aravalli_features_subtitle)): ?>
							<h3><?php echo wp_kses_post($aravalli_features_subtitle); ?><span class="line-circle"></span></h3>      
						<?php endif; ?>		
						
						<?php if(!empty($aravalli_features_description)): ?>				
							<p> <?php echo esc_html($aravalli_features_description); ?></p>
						<?php endif; ?>		
						
					</div>
				</div>
			</div>
		<?php endif; ?>	
		<div class="row featuress-contents wow fadeInUp">
			<?php
				if ( ! empty( $aravalli_features_contents ) ) {
				$aravalli_features_contents = json_decode( $aravalli_features_contents );
				foreach ( $aravalli_features_contents as $aravalli_features_item ) {
					$aravalli_repeater_title = ! empty( $aravalli_features_item->title ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_features_item->title, 'Features section' ) : '';
					$aravalli_repeater_text = ! empty( $aravalli_features_item->text ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_features_item->text, 'Features section' ) : '';
					$aravalli_repeater_button = ! empty( $aravalli_features_item->text2) ? apply_filters( 'aravalli_translate_single_string', $aravalli_features_item->text2,'Features section' ) : '';
					$aravalli_repeater_link = ! empty( $aravalli_features_item->link ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_features_item->link, 'Features section' ) : '';
					$aravalli_repeater_icon = ! empty( $aravalli_features_item->icon_value ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_features_item->icon_value, 'Features section' ) : '';
					$aravalli_repeater_image = ! empty( $aravalli_features_item->image_url ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_features_item->image_url, 'Features section' ) : '';
			?>
				<div class="col-lg-3 col-sm-6 col-12">
					<div class="feat-grid">
						<div class="inner-grid">
							<?php if ( ! empty( $aravalli_repeater_image ) ) : ?>
								<img src="<?php echo esc_url( $aravalli_repeater_image ); ?>" alt="">
						   <?php endif; ?>
							<div class="grid-text">
								<?php if ( ! empty( $aravalli_repeater_icon ) ) : ?>
									<i class="fa <?php echo esc_attr( $aravalli_repeater_icon ); ?>"></i>
								  <?php endif; ?>
								   
								<?php if ( ! empty( $aravalli_repeater_title )) : ?>
									<h2><?php echo esc_html( $aravalli_repeater_title ); ?></h2>
								<?php endif; ?>	
								
								<?php if ( ! empty( $aravalli_repeater_text ) ) : ?>
									<p><?php echo esc_html( $aravalli_repeater_text ); ?></p>
								<?php endif; ?>
								<?php if ( ! empty( $aravalli_repeater_button ) ) : ?>				
									<a href="<?php echo esc_url( $aravalli_repeater_link ); ?>" class="btn-line"><?php echo esc_html( $aravalli_repeater_button ); ?></a>
								<?php endif; ?>
							</div>
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
if ( function_exists( 'cleverfox_aravalli_lite_features' ) ) {
$cleverfox_section_priority = apply_filters( 'aravalli_section_priority', 15, 'cleverfox_aravalli_lite_features' );
add_action( 'aravalli_sections', 'cleverfox_aravalli_lite_features', absint( $cleverfox_section_priority ) );
}