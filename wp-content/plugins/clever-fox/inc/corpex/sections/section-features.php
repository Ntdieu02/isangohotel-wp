<?php 
	$corpex_features_hs					= get_theme_mod('feature_hs','1');
	$corpex_features_title 				= get_theme_mod('features_title',__('Our <span>Feature</span>','clever-fox'));
	$corpex_features_desc				= get_theme_mod('features_desc',__('There are many variations of passages of Lorem Ipsum available.','clever-fox')); 
	$corpex_features_contents			= get_theme_mod('features_contents',corpex_get_features_default());
	$corpex_features_image				= get_theme_mod('features_image',esc_url(CLEVERFOX_PLUGIN_URL .'inc/corpex/images/feature.png'));
	if($corpex_features_hs=='1'){
?>	
	<!-- our feature  -->
<section class="feature-section features-home">
	<div class="container">
		<?php if(!empty($corpex_features_title) || !empty($corpex_features_desc)): ?>
			<div class="section-title">
				<?php if(!empty($corpex_features_title)): ?>
					<h2>
						<?php echo wp_kses_post($corpex_features_title); ?>
					</h2>
				<?php endif; ?>
				
				<?php if(!empty($corpex_features_desc)): ?>
					<p>
						<?php echo esc_html($corpex_features_desc); ?>
					</p>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<ul class="feature-list left">
					<?php 
					if ( ! empty( $corpex_features_contents ) ) {
						$corpex_features_contents = json_decode( $corpex_features_contents );
						foreach ( $corpex_features_contents as $corpex_index => $corpex_feature_item ) {
							$corpex_id1 = $corpex_index % 2;
							if($corpex_id1 == 0){
							$corpex_repeater_title = ! empty( $corpex_feature_item->title ) ? apply_filters( 'corpex_translate_single_string', $corpex_feature_item->title, 'feature section' ) : '';
							$corpex_repeater_text = ! empty( $corpex_feature_item->text ) ? apply_filters( 'corpex_translate_single_string', $corpex_feature_item->text, 'feature section' ) : '';
							$corpex_repeater_link = ! empty( $corpex_feature_item->link ) ? apply_filters( 'corpex_translate_single_string', $corpex_feature_item->link, 'feature section' ) : '';
							$corpex_repeater_icon = ! empty( $corpex_feature_item->icon_value) ? apply_filters( 'corpex_translate_single_string', $corpex_feature_item->icon_value,'feature section' ) : '';
					?>
						<li>
							<?php if ( ! empty( $corpex_repeater_icon ) ) {?>
								<i class="fa fab fas <?php echo esc_attr( $corpex_repeater_icon ); ?>"></i>
							<?php } ?>
							
							<?php if ( ! empty( $corpex_repeater_title ) ) : ?>
								<h5>
									<?php echo esc_html( $corpex_repeater_title ); ?>
								</h5>
							<?php endif; ?>
							
							<a href="<?php echo esc_url($corpex_repeater_link); ?>" class="main-btn"><i class="fas fa-angle-double-right"></i></a>
						</li>
					<?php } } } ?>
				</ul>
			</div>
			<div class="col-lg-4 col-md-6 d-none d-lg-block">
				<?php if(!empty($corpex_features_image)){ ?>
					<div class="feature-image">
						<img src="<?php echo esc_url($corpex_features_image); ?>" alt="<?php echo esc_attr__('Image','clever-fox'); ?>">
					</div>
				<?php } ?>
			</div>
			
			<div class="col-lg-4 col-md-6">
				<ul class="feature-list right">
					<?php
						if ( ! empty( $corpex_features_contents ) ) {					
							foreach ( $corpex_features_contents as $corpex_index => $corpex_feature_item ) {
							$corpex_id1 = $corpex_index % 2;
							if($corpex_id1 == 1){
							$corpex_repeater_title = ! empty( $corpex_feature_item->title ) ? apply_filters( 'corpex_translate_single_string', $corpex_feature_item->title, 'feature section' ) : '';
							$corpex_repeater_text = ! empty( $corpex_feature_item->text ) ? apply_filters( 'corpex_translate_single_string', $corpex_feature_item->text, 'feature section' ) : '';
							$corpex_repeater_link = ! empty( $corpex_feature_item->link ) ? apply_filters( 'corpex_translate_single_string', $corpex_feature_item->link, 'feature section' ) : '';
							$corpex_repeater_icon = ! empty( $corpex_feature_item->icon_value) ? apply_filters( 'corpex_translate_single_string', $corpex_feature_item->icon_value,'feature section' ) : '';
					?>
						<li>
							<?php if ( ! empty( $corpex_repeater_icon ) ) { ?>
								<i class="fa fab fas <?php echo esc_attr( $corpex_repeater_icon ); ?>"></i>
							<?php } ?>
							
							<?php if ( ! empty( $corpex_repeater_title ) ) : ?>
								<h5>
									<?php echo esc_html( $corpex_repeater_title ); ?>
								</h5>
							<?php endif; ?>
							
							<a href="<?php echo esc_url($corpex_repeater_link); ?>" class="main-btn"><i class="fas fa-angle-double-right"></i></a>
						</li>
					<?php } } } ?>
				</ul>
			</div>
		</div>
	</div>
</section>
<!-- our feature End  -->
<?php } ?>