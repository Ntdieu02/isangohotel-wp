<?php  
	$medazin_medisafe_features_title 			= get_theme_mod('features_title',__('What\'s Our Speciality','clever-fox'));
	$medazin_medisafe_features_desc				= get_theme_mod('features_desc',__('Feature','clever-fox')); 
	$medazin_medisafe_features_contents			= get_theme_mod('features_contents',medazin_get_features_default());
	$medazin_medisafe_features_sec_column		= get_theme_mod('features_sec_column','5'); 	
?>	
	<!-- Start : ================= Feature Section = ====================== -->
    <section class="feature-section features-home">
        <div class="bg-elements">
            <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/elements/element3.png'); ?>" alt="<?php	echo esc_attr__('Image','clever-fox') ?>" class="element1">
            <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/elements/element8.png'); ?>" alt="<?php	echo esc_attr__('Image','clever-fox') ?>" class="element2">
        </div>
        <div class="container">
			<?php if(!empty($medazin_medisafe_features_title)  || !empty($medazin_medisafe_features_desc)): ?>
				<div class="section-title text-center wow slideInDown">
					<?php if(!empty($medazin_medisafe_features_desc)): ?>
						<span class="subtitle">
							<?php echo wp_kses_post($medazin_medisafe_features_desc); ?>
						</span>
						<span class="title-element"> <i class="fa fa-heartbeat"></i></span>
					<?php endif; ?>
					
					<?php if(!empty($medazin_medisafe_features_title)): ?>
						<h5>
							<?php echo wp_kses_post($medazin_medisafe_features_title); ?>
						</h5>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			
            <div class="row row-cols-1 row-cols-lg-<?php echo esc_attr($medazin_medisafe_features_sec_column); ?> row-cols-md-2 row-cols-2">
                <?php
					if ( ! empty( $medazin_medisafe_features_contents ) ) {
					$medazin_medisafe_features_contents = json_decode( $medazin_medisafe_features_contents );
					foreach ( $medazin_medisafe_features_contents as $medazin_medisafe_features_item ) {
						$medazin_medisafe_repeater_title = ! empty( $medazin_medisafe_features_item->title ) ? apply_filters( 'medazin_translate_single_string', $medazin_medisafe_features_item->title, 'Features section' ) : '';
						$medazin_medisafe_repeater_link = ! empty( $medazin_medisafe_features_item->link ) ? apply_filters( 'medazin_translate_single_string', $medazin_medisafe_features_item->link, 'Features section' ) : '';
						$medazin_medisafe_repeater_image = ! empty( $medazin_medisafe_features_item->image_url ) ? apply_filters( 'medazin_translate_single_string', $medazin_medisafe_features_item->image_url, 'Features section' ) : '';
						$medazin_medisafe_repeater_icon = ! empty( $medazin_medisafe_features_item->icon_value ) ? apply_filters( 'medazin_translate_single_string', $medazin_medisafe_features_item->icon_value, 'Features section' ) : '';
						$medazin_medisafe_repeater_choice = ! empty( $medazin_medisafe_features_item->choice ) ? apply_filters( 'medazin_translate_single_string', $medazin_medisafe_features_item->choice, 'Features section' ) : '';
				?>				
					<div class="col mt-4 wow flipInX">
						<div class="feature-wrap">
							<div class="icon-wrap">
								<?php if ( $medazin_medisafe_repeater_choice =='customizer_repeater_image' ) { ?>
									<img src="<?php echo esc_url($medazin_medisafe_repeater_image); ?>" />
								<?php } elseif ( ! empty( $medazin_medisafe_repeater_icon ) ) { ?>
										<i class="fa <?php echo esc_attr($medazin_medisafe_repeater_icon); ?>"></i>
								
								<?php } ?>
							</div>
							
							<?php if(!empty($medazin_medisafe_repeater_title)): ?>
								<div class="text-wrap">
									<a href="<?php echo esc_url($medazin_medisafe_repeater_link); ?>" class="title"><?php echo esc_html($medazin_medisafe_repeater_title); ?></a>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php } } ?>
            </div>
        </div>
    </section>
    <!-- End : ================= Feature Section = ====================== -->