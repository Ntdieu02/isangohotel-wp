<?php 

if ( ! function_exists( 'cleverfox_evita_lite_service' ) ) :
	function cleverfox_evita_lite_service() {
	$evita_service_hs				= get_theme_mod('service_hs','1');
	$evita_service_title 			= get_theme_mod('service_title',__('What I am Doing','clever-fox'));
	$evita_service_subtitle		= get_theme_mod('service_subtitle',__('<span class="primary_color">Service</span> For You','clever-fox'));
	$evita_service_desc			= get_theme_mod('service_desc',__('There are many variations of passages of Lorem Ipsum available but the majority have suffered injected humour dummy now.','clever-fox'));
	$evita_service_contents		= get_theme_mod('service_contents',evita_get_service_default());
	$evita_service_sec_column		= get_theme_mod('service_sec_column','4');  	
	if($evita_service_hs=='1'):
?>	
	<!--===// start: Service
	=================================-->
	<section class="service-section service_page service-home">
		<div class="nt-container">
			<?php if(!empty($evita_service_title) || !empty($evita_service_subtitle) || !empty($evita_service_desc)){ ?>
				<div class="section-title full">
					<?php if(!empty($evita_service_subtitle)){ ?>
						<h5>
							<?php echo wp_kses_post($evita_service_subtitle); ?>
						</h5>
					<?php } ?>
					
					<?php if(!empty($evita_service_title)){ ?>
						<h2>
							<?php echo esc_html($evita_service_title); ?>
						</h2>
					<?php } ?>
					
					<?php if(!empty($evita_service_desc)){ ?>
						<p>
							<?php echo esc_html($evita_service_desc); ?>
						</p>
					<?php } ?>
				</div>
			<?php } ?>
			
			<div class="nt-columns-area">
				<?php
					if ( ! empty( $evita_service_contents ) ) {
					$evita_service_contents = json_decode( $evita_service_contents );
					$evita_count = 1;
					foreach ( $evita_service_contents as $evita_service_item ) { 
						$evita_repeater_image = ! empty( $evita_service_item->image_url ) ? apply_filters( 'evita_translate_single_string', $evita_service_item->image_url, 'Service section' ) : '';
						$evita_repeater_icon = ! empty( $evita_service_item->icon_value) ? apply_filters( 'evita_translate_single_string', $evita_service_item->icon_value,'Service section' ) : '';
						$evita_repeater_title = ! empty( $evita_service_item->title ) ? apply_filters( 'evita_translate_single_string', $evita_service_item->title, 'Service section' ) : '';
						$evita_repeater_text = ! empty( $evita_service_item->text ) ? apply_filters( 'evita_translate_single_string', $evita_service_item->text, 'Service section' ) : '';
						$evita_repeater_button = ! empty( $evita_service_item->text2) ? apply_filters( 'evita_translate_single_string', $evita_service_item->text2,'Service section' ) : '';
						$evita_repeater_link = ! empty( $evita_service_item->link ) ? apply_filters( 'evita_translate_single_string', $evita_service_item->link, 'Service section' ) : '';
						$evita_repeater_choice = ! empty( $evita_service_item->choice ) ? apply_filters( 'evita_translate_single_string', $evita_service_item->choice, 'Service section' ) : '';
				?>			
					<div class="nt-column-<?php echo esc_attr($evita_service_sec_column); ?> nt-sm-column-6">
						<div class="service">
							<div class="bg-elements">
								<div class="element17">
									<svg viewBox="0 0 256 256">
										<path
											d="M219.87305,66.73828l-84-47.478a16.08654,16.08654,0,0,0-15.7461,0l-84,47.47852A16.0255,16.0255,0,0,0,28,80.668V175.332a16.02688,16.02688,0,0,0,8.127,13.92969l84,47.478a16.08782,16.08782,0,0,0,15.7461,0l84-47.47852A16.0255,16.0255,0,0,0,228,175.332V80.668A16.02688,16.02688,0,0,0,219.87305,66.73828Z">
										</path>
									</svg>
								</div>
								<div class="element18">
									<svg viewBox="0 0 256 256">
										<path
											d="M219.87305,66.73828l-84-47.478a16.08654,16.08654,0,0,0-15.7461,0l-84,47.47852A16.0255,16.0255,0,0,0,28,80.668V175.332a16.02688,16.02688,0,0,0,8.127,13.92969l84,47.478a16.08782,16.08782,0,0,0,15.7461,0l84-47.47852A16.0255,16.0255,0,0,0,228,175.332V80.668A16.02688,16.02688,0,0,0,219.87305,66.73828Z">
										</path>
									</svg>
								</div>
							</div>
							
							<?php if ( $evita_repeater_choice =='customizer_repeater_image' ) { ?>
								<div class="service-icon">
									<svg viewBox="0 0 256 256">
										<path
											d="M219.87305,66.73828l-84-47.478a16.08654,16.08654,0,0,0-15.7461,0l-84,47.47852A16.0255,16.0255,0,0,0,28,80.668V175.332a16.02688,16.02688,0,0,0,8.127,13.92969l84,47.478a16.08782,16.08782,0,0,0,15.7461,0l84-47.47852A16.0255,16.0255,0,0,0,228,175.332V80.668A16.02688,16.02688,0,0,0,219.87305,66.73828Z">
										</path>
									</svg>
									<img src="<?php echo esc_url($evita_repeater_image); ?>" />
								</div>
							<?php } elseif ( ! empty( $evita_repeater_icon ) ) { ?>
								<div class="service-icon">
									<svg viewBox="0 0 256 256">
										<path
											d="M219.87305,66.73828l-84-47.478a16.08654,16.08654,0,0,0-15.7461,0l-84,47.47852A16.0255,16.0255,0,0,0,28,80.668V175.332a16.02688,16.02688,0,0,0,8.127,13.92969l84,47.478a16.08782,16.08782,0,0,0,15.7461,0l84-47.47852A16.0255,16.0255,0,0,0,228,175.332V80.668A16.02688,16.02688,0,0,0,219.87305,66.73828Z">
										</path>
									</svg>
									<i class="fa <?php echo esc_attr($evita_repeater_icon); ?>"></i>
								</div>
							<?php } ?>  
							
							<div class="service-content">
								<?php if ( ! empty( $evita_repeater_title ) ) : ?>
									<h4>
										<?php echo esc_html( $evita_repeater_title ); ?>
									</h4>
								<?php endif; ?>
								
								<?php if ( ! empty( $evita_repeater_text ) ) : ?>
									<p>
										<?php echo esc_html( $evita_repeater_text ); ?>
									</p>
								<?php endif; ?>	
								
								<?php if ( ! empty( $evita_repeater_button ) && ! empty( $evita_repeater_link ) ) : ?>
									<a href="<?php echo esc_url( $evita_repeater_link ); ?>" class="main-btn">
										<?php echo esc_html( $evita_repeater_button ); ?> <i class="fa fa-arrow-right"></i>
									</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php } } ?>
			</div>
		</div>
	</section>
	<!--===// end: Service
	=================================-->

<?php	
	endif;	}
endif;
if ( function_exists( 'cleverfox_evita_lite_service' ) ) {
$cleverfox_section_priority = apply_filters( 'evita_section_priority', 16, 'cleverfox_evita_lite_service' );
add_action( 'evita_sections', 'cleverfox_evita_lite_service', absint( $cleverfox_section_priority ) );
}