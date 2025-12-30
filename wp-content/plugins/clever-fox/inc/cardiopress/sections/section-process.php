<?php  
	$medazin_cardiopress_process_title					= get_theme_mod('process_title',__('Our Work Process','clever-fox')); 
	$medazin_cardiopress_process_subtitle				= get_theme_mod('process_subtitle',__('Process','clever-fox')); 
	$medazin_cardiopress_process_contents				= get_theme_mod('process_contents',medazin_get_process_default());
	$medazin_cardiopress_process_bg_img				= get_theme_mod('process_bg_img', esc_url(CLEVERFOX_PLUGIN_URL . '/inc/medazin/images/work-process/bg.jpg')); 
?>
	 <!-- =================================== Work Process Section ======================== -->
    <section class="work-process-section home-process" <?php if(!empty($medazin_cardiopress_process_bg_img)){ ?> style="background:url('<?php echo esc_url($medazin_cardiopress_process_bg_img); ?>') center center; background-repeat: no-repeat;background-size: cover;"<?php } ?>>
        <div class="container ">
            <?php if(!empty($medazin_cardiopress_process_title)  || !empty($medazin_cardiopress_process_subtitle)): ?>
				<div class="section-title text-center wow slideInDown">
					<?php if(!empty($medazin_cardiopress_process_subtitle)): ?>
						<span class="subtitle">
							<?php echo wp_kses_post($medazin_cardiopress_process_subtitle); ?>
						</span>
						<span class="title-element"> <i class="fa fa-heartbeat"></i></span>
					<?php endif; ?>
					
					<?php if(!empty($medazin_cardiopress_process_title)): ?>
						<h5>
							<?php echo wp_kses_post($medazin_cardiopress_process_title); ?>
						</h5>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			
            <div class="row row-cols-2 justify-content-center text-center align-items-center ">
				<?php
					if ( ! empty( $medazin_cardiopress_process_contents ) ) {
					$medazin_cardiopress_process_contents = json_decode( $medazin_cardiopress_process_contents );
					$medazin_cardiopress_count = 1;
					foreach ( $medazin_cardiopress_process_contents as $medazin_cardiopress_process_item ) {
						$medazin_cardiopress_repeater_title = ! empty( $medazin_cardiopress_process_item->title ) ? apply_filters( 'medazin_translate_single_string', $medazin_cardiopress_process_item->title, 'Process section' ) : '';
				?>
					<div class="col-lg-3 col-md-6 col-sm-12 mt-4 wow zoomIn main-item ">
						<div class="item-wrap ">
							<span class="animte-border "></span>
							<div class="count ">
								<span>0<?php echo esc_html($medazin_cardiopress_count); ?></span>
							</div>
							<?php if( !empty($medazin_cardiopress_repeater_title) ): ?>
								<div class="title">
									<span><?php echo esc_html($medazin_cardiopress_repeater_title); ?></span>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<?php ++$medazin_cardiopress_count; } } ?>
            </div>
        </div>
    </section>
    <!-- =================================== End ======================== -->