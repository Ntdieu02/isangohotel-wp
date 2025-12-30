<?php 
if ( ! function_exists( 'avril_lite_features' ) ) :
	function avril_lite_features() {
	$avril_aviser_features_title		= get_theme_mod('feature_title',__('Technology from tomorrow','clever-fox'));
	$avril_aviser_features_subtitle		= get_theme_mod('feature_subtitle',__('Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Features</b>                                   <b>Features</b><b>Features</b></span></span>','clever-fox'));
	$avril_aviser_feature_description				= get_theme_mod('feature_description',__('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','clever-fox'));
	$avril_aviser_features_contents		= get_theme_mod('features_contents',avril_get_features_default());
	$avril_aviser_hs_feature							= get_theme_mod('hs_feature','1');
	if($avril_aviser_hs_feature == '1') {	
?>
 <section id="features-section" class="features-section av-py-default">
        <div class="av-container">
			<?php if(! empty( $avril_aviser_features_title ) || ! empty( $avril_aviser_features_subtitle ) || ! empty( $avril_aviser_feature_description )) { ?> 
				<div class="av-columns-area">
					<div class="av-column-12">
						<div class="heading-default wow fadeInUp">
						   <?php if ( ! empty( $avril_aviser_features_title ) ) : ?>
								<span class='ttl'><?php echo wp_kses_post($avril_aviser_features_title); ?></span>
							<?php endif; ?>
						   <?php if ( ! empty( $avril_aviser_features_subtitle ) ) : ?>		
								<h3><?php echo wp_kses_post($avril_aviser_features_subtitle); ?></h3>    
							<?php endif; ?>	                   
							<?php if ( ! empty( $avril_aviser_feature_description ) ) : ?>		
								<p><?php echo wp_kses_post($avril_aviser_feature_description); ?></p>    
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php } ?>	
            <div class="av-columns-area features-area wow fadeInUp">
				<?php
					if ( ! empty( $avril_aviser_features_contents ) ) {
					$avril_aviser_features_contents = json_decode( $avril_aviser_features_contents );
					foreach ( $avril_aviser_features_contents as $avril_aviser_feature_item ) {
						$avril_aviser_repeater_title = ! empty( $avril_aviser_feature_item->title ) ? apply_filters( 'avril_translate_single_string', $avril_aviser_feature_item->title, 'feature section' ) : '';
						$avril_aviser_repeater_text = ! empty( $avril_aviser_feature_item->text ) ? apply_filters( 'avril_translate_single_string', $avril_aviser_feature_item->text, 'feature section' ) : '';
						$avril_aviser_repeater_icon = ! empty( $avril_aviser_feature_item->icon_value) ? apply_filters( 'avril_translate_single_string', $avril_aviser_feature_item->icon_value,'feature section' ) : '';
				?>
					<div class="av-column-4 av-md-column-6 mb-6">
						<div class="features-item">
							<div class="features-icon">
								<?php if ( ! empty( $avril_aviser_repeater_icon ) ) {?>
									<i class="fa <?php echo esc_html( $avril_aviser_repeater_icon ); ?> txt-pink"></i>
								<?php } ?>
							</div>
							<div class="features-content">
								<?php if ( ! empty( $avril_aviser_repeater_title ) ) : ?>
									<h5 class="features-title"><a href="javascript:void(0)"><?php echo esc_html( $avril_aviser_repeater_title ); ?></a></h5>
								<?php endif; ?>
								<?php if ( ! empty( $avril_aviser_repeater_text ) ) : ?>
									<p><?php echo esc_html( $avril_aviser_repeater_text ); ?></p>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php }}?>
            </div>
        </div>
    </section>
	
<?php	
	}} endif; 
	if ( function_exists( 'avril_lite_features' ) ) {
		$cleverfox_section_priority = apply_filters( 'avril_section_priority', 14, 'avril_lite_service' );
		add_action( 'avril_sections', 'avril_lite_features', absint( $cleverfox_section_priority ) );
	}