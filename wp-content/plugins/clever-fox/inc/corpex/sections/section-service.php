<?php 
	$corpex_service_hs 			= get_theme_mod('service_hs','1'); 
	$corpex_service_title 			= get_theme_mod('service_title',__('Our <span>Service</span>','clever-fox'));
	$corpex_service_description	= get_theme_mod('service_description',__('There are many variations of passages of Lorem Ipsum available.','clever-fox'));
	$corpex_service_contents		= get_theme_mod('service_contents',corpex_get_service_default());
	$corpex_service_sec_column		= get_theme_mod('service_sec_column','3');  	
	
	if($corpex_service_hs=='1'){
?>	
	<!-- service -->
    <section class="service-home service-section">
        <div class="container">
			<?php if(!empty($corpex_service_title)  || !empty($corpex_service_description)): ?>
				<div class="section-title">
					<?php if(!empty($corpex_service_title)): ?>
						<h2>
							<?php echo wp_kses_post($corpex_service_title); ?>
						</h2>
					<?php endif; ?>
					
					<?php if(!empty($corpex_service_description)): ?>
						<p>
							<?php echo wp_kses_post($corpex_service_description); ?>
						</p>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			
            <div class="row ">
				<?php
					if ( ! empty( $corpex_service_contents ) ) {
					$corpex_service_contents = json_decode( $corpex_service_contents );
					foreach ( $corpex_service_contents as $corpex_service_item ) { 
						$corpex_repeater_image2 = ! empty( $corpex_service_item->image_url2 ) ? apply_filters( 'corpex_translate_single_string', $corpex_service_item->image_url2, 'Service section' ) : '';
						$corpex_repeater_image = ! empty( $corpex_service_item->image_url ) ? apply_filters( 'corpex_translate_single_string', $corpex_service_item->image_url, 'Service section' ) : '';
						$corpex_repeater_icon = ! empty( $corpex_service_item->icon_value) ? apply_filters( 'corpex_translate_single_string', $corpex_service_item->icon_value,'Service section' ) : '';
						$corpex_repeater_title = ! empty( $corpex_service_item->title ) ? apply_filters( 'corpex_translate_single_string', $corpex_service_item->title, 'Service section' ) : '';
						$corpex_repeater_text = ! empty( $corpex_service_item->text ) ? apply_filters( 'corpex_translate_single_string', $corpex_service_item->text, 'Service section' ) : '';
						$corpex_repeater_link = ! empty( $corpex_service_item->link ) ? apply_filters( 'corpex_translate_single_string', $corpex_service_item->link, 'Service section' ) : '';
						$corpex_repeater_choice = ! empty( $corpex_service_item->choice ) ? apply_filters( 'corpex_translate_single_string', $corpex_service_item->choice, 'Service section' ) : '';
				?>
					<div class="col-lg-<?php echo esc_attr($corpex_service_sec_column); ?> col-md-6 col-sm-6">
						<div class="card">
							<div class="card-front">
								<img src="<?php echo esc_url($corpex_repeater_image2); ?>" class="card-img-top" alt="<?php echo esc_attr__('Image','clever-fox'); ?>">
								<div class="card-body">
									<?php if ( ! empty( $corpex_repeater_title ) ) : ?>
										<h5 class="card-title">											
											<?php echo esc_html( $corpex_repeater_title ); ?>
										</h5>
									<?php endif; ?>
									
									<?php if ( ! empty( $corpex_repeater_icon ) ) : ?>
										<a href="<?php echo esc_url( $corpex_repeater_link ); ?>" class="main-btn"><i class="fa fa-angle-double-right"></i></a>
									<?php endif; ?>
								</div>
							</div>
							<div class="card-back">
								<div class="card-body">
									<?php if($corpex_repeater_choice =='customizer_repeater_image'): ?>
										<div class="icon-item">
											<img src="<?php echo esc_url($corpex_repeater_image); ?>" />
										</div>
									<?php else: ?>
										<div class="icon-item">
											<i class="fa <?php echo esc_attr($corpex_repeater_icon); ?>"></i>
										</div>
									<?php endif; ?>
									
									<?php if ( ! empty( $corpex_repeater_text ) ) : ?>
										<p class="card-text">
											<?php echo esc_html( $corpex_repeater_text ); ?>
										</p>
									<?php endif; ?>	
									<a href="<?php echo esc_url( $corpex_repeater_link ); ?>" class="main-btn"><i class="fa fa-angle-double-right"></i></a>
								</div>
							</div>
						</div>
					</div>
                <?php } }?>
            </div>
        </div>
    </section>
    <!-- service end  -->
<?php } ?>