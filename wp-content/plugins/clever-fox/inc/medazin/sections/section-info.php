<?php  
	$medazin_info_contents 		= get_theme_mod('info_contents',medazin_get_info_default());
	$medazin_info_title 		= get_theme_mod( 'info_title','Departments');
	
?>	
	<!-- ================ Info Section ================================- -->
    <section class="info-section wow slideInUp">
        <h2 class="d-none">-</h2>
        <!-- Ignore The  above h2 element -->
        <div class="container">
            <?php if(!empty($medazin_info_title)){ ?>
				<div class="toggle-btn">
					<button id="toggle-btn"><?php echo esc_html($medazin_info_title); ?><i class="fa fa-angle-down"></i></button>
				</div>
			<?php } ?>
			
            <div class="info-carousel" style="display: none;">
            <div class="row justify-content-center my-4">
				<?php
					if (  !empty( $medazin_info_contents ) ) {
					$medazin_info_contents = json_decode( $medazin_info_contents );
					foreach ( $medazin_info_contents as $medazin_info_item ) {
						$medazin_repeater_title = ! empty( $medazin_info_item->title ) ? apply_filters( 'medazin_translate_single_string', $medazin_info_item->title, 'Info section' ) : '';
						$medazin_repeater_icon = ! empty( $medazin_info_item->icon_value ) ? apply_filters( 'medazin_translate_single_string', $medazin_info_item->icon_value, 'Info section' ) : '';
						$medazin_repeater_image = ! empty( $medazin_info_item->image_url ) ? apply_filters( 'medazin_translate_single_string', $medazin_info_item->image_url, 'Info section' ) : '';
						$medazin_repeater_choice = ! empty( $medazin_info_item->choice ) ? apply_filters( 'medazin_translate_single_string', $medazin_info_item->choice, 'Info section' ) : '';
				?>
					<div class="item">
						<svg viewBox="0 0 100 100">
							<path d="M55,71Q26,92,28.5,55Q31,18,57.5,34Q84,50,55,71Z" stroke="none" stroke-width="0"
								fill="#4F46E5"></path>
						</svg>
						
						<?php if($medazin_repeater_choice =='customizer_repeater_image'): ?>
							<div class="icon-box">
								<img src="<?php echo esc_url($medazin_repeater_image); ?>" />
							</div>
						<?php else: ?>
							<?php if ( ! empty( $medazin_repeater_icon ) ) { ?>
								<div class="icon-box">
									<i class="fa <?php echo esc_attr($medazin_repeater_icon); ?> active"></i>
								</div>
							<?php } ?>
						<?php endif; ?>
						
						<?php if(!empty($medazin_repeater_title)): ?>
							<div class="title-box">
								<span>
									<?php echo esc_html($medazin_repeater_title); ?>
									
								</span>
							</div>
						<?php endif; ?>
					</div>
				<?php } } ?>
				</div>
            </div>
        </div>
    </section>