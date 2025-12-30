<?php 
if ( ! function_exists( 'avril_lite_features' ) ) :
	function avril_lite_features() {
	$avril_avenza_features_title				= get_theme_mod('feature_title','Technology from tomorrow');
	$avril_avenza_features_subtitle			= get_theme_mod('feature_subtitle','Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Features</b>                                   <b>Features</b><b>Features</b></span></span>');
	$avril_avenza_feature_description		= get_theme_mod('feature_description','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.');
	$avril_avenza_features_contents			= get_theme_mod('features_contents',avril_get_features_default());
	$avril_avenza_features_image 			= get_theme_mod('features_bg_setting',CLEVERFOX_PLUGIN_URL .'inc/avenza/images/feature-img.png');
	$avril_avenza_hs_features					= get_theme_mod('hs_feature','1');
if($avril_avenza_hs_features == '1') {	
?>
 <section id="features-section" class="features-section bg-primary av-py-default">
        <div class="av-container">
			<?php if(! empty( $avril_avenza_features_title ) || ! empty( $avril_avenza_features_subtitle ) || ! empty( $avril_avenza_feature_description )) { ?> 
				<div class="av-columns-area">
					<div class="av-column-12">
						<div class="heading-default heading-white wow fadeInUp">
						   <?php if ( ! empty( $avril_avenza_features_title ) ) : ?>
								<span class='ttl'><?php echo wp_kses_post($avril_avenza_features_title); ?></span>
							<?php endif; ?>
						   <?php if ( ! empty( $avril_avenza_features_subtitle ) ) : ?>		
								<h3><?php echo wp_kses_post($avril_avenza_features_subtitle); ?></h3>    
							<?php endif; ?>	                   
							<?php if ( ! empty( $avril_avenza_feature_description ) ) : ?>		
								<p><?php echo wp_kses_post($avril_avenza_feature_description); ?></p>    
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php } ?>	
            <div class="av-columns-area features-area wow fadeInUp">				
				<div class="av-column-4 av-md-column-6 mb-6">
					
					<?php 
					if ( ! empty( $avril_avenza_features_contents ) ) {
						$avril_avenza_features_contents = json_decode( $avril_avenza_features_contents );
						foreach ( $avril_avenza_features_contents as $avril_avenza_index => $avril_avenza_feature_item ) {
							$avril_avenza_id1 = $avril_avenza_index % 2;
							if($avril_avenza_id1 == 0){
							$avril_avenza_repeater_title = ! empty( $avril_avenza_feature_item->title ) ? apply_filters( 'avril_translate_single_string', $avril_avenza_feature_item->title, 'feature section' ) : '';
							$avril_avenza_repeater_text = ! empty( $avril_avenza_feature_item->text ) ? apply_filters( 'avril_translate_single_string', $avril_avenza_feature_item->text, 'feature section' ) : '';
							$avril_avenza_repeater_icon = ! empty( $avril_avenza_feature_item->icon_value) ? apply_filters( 'avril_translate_single_string', $avril_avenza_feature_item->icon_value,'feature section' ) : '';
					
					
					?>
						<div class="features-item">
							<div class="features-icon">
								<?php if ( ! empty( $avril_avenza_repeater_icon ) ) {?>
									<i class="fa <?php echo esc_attr( $avril_avenza_repeater_icon ); ?> txt-pink"></i>
								<?php } ?>
							</div>
							<div class="features-content">
								<?php if ( ! empty( $avril_avenza_repeater_title ) ) : ?>
									<h5 class="features-title"><a href="javascript:void(0)"><?php echo esc_html( $avril_avenza_repeater_title ); ?></a></h5>
								<?php endif; ?>
								<?php if ( ! empty( $avril_avenza_repeater_text ) ) : ?>
									<p><?php echo esc_html( $avril_avenza_repeater_text ); ?></p>
								<?php endif; ?>
							</div>
						</div>
					<?php }}}?>
				</div>
				<div class="av-column-4 av-md-column-6 mb-6">
					<?php 
					if(!$avril_avenza_features_image) {
						echo '<p class = "insert-image">Please Insert Feature Background Image</p>';
					}else {	?>					
						<div class="feature-image"><img src="<?php echo esc_url($avril_avenza_features_image); ?>" alt="image">
						</div>
					<?Php }			 
					?>
					
				</div>
				<div class="av-column-4 av-md-column-6 mb-6">
					<?php
						if ( ! empty( $avril_avenza_features_contents ) ) {					
							foreach ( $avril_avenza_features_contents as $avril_avenza_index => $avril_avenza_feature_item ) {
							$avril_avenza_id1 = $avril_avenza_index % 2;
							if($avril_avenza_id1 == 1){
							$avril_avenza_repeater_title = ! empty( $avril_avenza_feature_item->title ) ? apply_filters( 'avril_translate_single_string', $avril_avenza_feature_item->title, 'feature section' ) : '';
							$avril_avenza_repeater_text = ! empty( $avril_avenza_feature_item->text ) ? apply_filters( 'avril_translate_single_string', $avril_avenza_feature_item->text, 'feature section' ) : '';
							$avril_avenza_repeater_icon = ! empty( $avril_avenza_feature_item->icon_value) ? apply_filters( 'avril_translate_single_string', $avril_avenza_feature_item->icon_value,'feature section' ) : '';
					?>
						<div class="features-item">
							<div class="features-icon">
								<?php if ( ! empty( $avril_avenza_repeater_icon ) ) {?>
									<i class="fa <?php echo esc_attr( $avril_avenza_repeater_icon ); ?> txt-pink"></i>
								<?php } ?>
							</div>
							<div class="features-content">
								<?php if ( ! empty( $avril_avenza_repeater_title ) ) : ?>
									<h5 class="features-title"><a href="javascript:void(0)"><?php echo esc_html( $avril_avenza_repeater_title ); ?></a></h5>
								<?php endif; ?>
								<?php if ( ! empty( $avril_avenza_repeater_text ) ) : ?>
									<p><?php echo esc_html( $avril_avenza_repeater_text ); ?></p>
								<?php endif; ?>
							</div>
						</div>
					<?php }}}?>
				</div>
			
            </div>
        </div>
    </section>
	
<?php	
	}} endif; 
	if ( function_exists( 'avril_lite_features' ) ) {
		$cleverfox_section_priority = apply_filters( 'avril_section_priority', 14, 'avril_lite_service' );
		add_action( 'avril_sections', 'avril_lite_features', absint( $cleverfox_section_priority ) );
	}