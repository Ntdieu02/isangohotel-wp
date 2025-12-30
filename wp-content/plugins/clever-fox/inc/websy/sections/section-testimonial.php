<?php 
	$webique_websy_testimonial_hs 				= get_theme_mod('testimonial_hs','1');
	$webique_websy_testimonial_ttl 				= get_theme_mod('testimonial_ttl','Our <span class="primary-color">Testimonial</span>');
	$webique_websy_testimonial_desc				= get_theme_mod('testimonial_desc','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'); 
	$webique_websy_testimonial_contents			= get_theme_mod('testimonial_contents',websy_get_testimonial_default());
	if($webique_websy_testimonial_hs=='1'){	
?>	
<section id="testimonial-section" class="testimonial-section av-py-default testimonial-home">
	<div class="av-container">
		<?php if(!empty($webique_websy_testimonial_ttl)  || !empty($webique_websy_testimonial_desc)): ?>
			<div class="av-columns-area">
				<div class="av-column-12">
					<div class="heading-default text-center">
						<div class="title-container animation-style2">
							<div class="arrow-left"></div>
								<?php if(!empty($webique_websy_testimonial_ttl)): ?>
									<h1 class="title"><?php echo wp_kses_post($webique_websy_testimonial_ttl); ?></h1>				
								<?php endif; ?>
							<div class="arrow-right"></div>
						</div>
						<?php if(!empty($webique_websy_testimonial_desc)): ?>
							<p><?php echo wp_kses_post($webique_websy_testimonial_desc); ?></p>
						<?php endif; ?>	
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="av-columns-area">
			<div class="av-column-8">
				<div class="testimonial-slider owl-carousel owl-theme testimonial-carousel">
				<?php
					if ( ! empty( $webique_websy_testimonial_contents ) ) {
					$webique_websy_testimonial_contents = json_decode( $webique_websy_testimonial_contents );
					foreach ( $webique_websy_testimonial_contents as $webique_websy_testimonial_item ) {
						$webique_websy_repeater_title = ! empty( $webique_websy_testimonial_item->title ) ? apply_filters( 'webique_translate_single_string', $webique_websy_testimonial_item->title, 'Testimonial section' ) : '';
						$webique_websy_repeater_subtitle = ! empty( $webique_websy_testimonial_item->subtitle ) ? apply_filters( 'webique_translate_single_string', $webique_websy_testimonial_item->subtitle, 'Testimonial section' ) : '';
						$webique_websy_repeater_subtitle2 = ! empty( $webique_websy_testimonial_item->subtitle2 ) ? apply_filters( 'webique_translate_single_string', $webique_websy_testimonial_item->subtitle2, 'Testimonial section' ) : '';
						$webique_websy_repeater_subtitle3 = ! empty( $webique_websy_testimonial_item->text3 ) ? apply_filters( 'webique_translate_single_string', $webique_websy_testimonial_item->text3, 'Testimonial section' ) : '';
						$webique_websy_repeater_image = ! empty( $webique_websy_testimonial_item->image_url ) ? apply_filters( 'webique_translate_single_string', $webique_websy_testimonial_item->image_url, 'Testimonial section' ) : '';
						$webique_websy_repeater_text2 = ! empty( $webique_websy_testimonial_item->text2 ) ? apply_filters( 'webique_translate_single_string', $webique_websy_testimonial_item->text2, 'Testimonial section' ) : '';
					
				?>
				 <div class="testimonial-item wow fadeInUp" data-cursor-type="text" data-wow-delay="0ms" data-wow-duration="1500ms">
					<div class="testimonial-content">
					
					<div class="testimonial-text p-2 pt-4">
						<div class="quote-right-box">
							<span>
								<i class="fa fa-quote-right"></i>
							</span>
						</div>
						<?php if(!empty($webique_websy_repeater_title)){ ?><h3>“ <?php echo esc_html( $webique_websy_repeater_title ); ?> ”</h3><?php } ?>
						<?php if(!empty($webique_websy_repeater_subtitle)){ ?><p class="ellipsis"><?php esc_html( $webique_websy_repeater_subtitle ); ?></p><?php } ?>
					</div>
					<div class="testimonial-footer">
						<div class="d-flex">
							 <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/testimonial/contex.jpg' ); ?>" alt="Context img">
							<span class="brand"><?php echo esc_html__('Context','clever-fox'); ?></span>
						</div>
						<?php if(!empty($webique_websy_repeater_text2)){ ?>
						<div class="rating">
							<?php for($webique_websy_i=1;$webique_websy_i<=$webique_websy_repeater_text2;$webique_websy_i++){ ?>
								<i class="fa fa-star"></i>
							<?php } ?>
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="testimonial-author">
					<div class="me-2">
						<img src="<?php echo esc_url($webique_websy_repeater_image); ?>" alt="Jessica Brown">
					</div>
					<div class="ms-1 mt-1">
						<?php if(!empty($webique_websy_repeater_subtitle2)){ ?><h4 class="primary-color"><?php echo esc_html( $webique_websy_repeater_subtitle2 ); ?></h4><?php } ?>
						<?php if(!empty($webique_websy_repeater_subtitle3)){ ?><p><?php echo esc_html( $webique_websy_repeater_subtitle3 ); ?></p><?php } ?>
					</div>
				</div>						
					</div>
			<?php } } ?>	
				</div>
			</div>
			<div class="av-column-4 ps-lg-1">
				<div class="testimonial-box">
				<?php
					$webique_websy_funfacts_contents  = get_theme_mod('funfacts_contents', webique_get_funfact_default());
					if ( ! empty( $webique_websy_funfacts_contents ) ) {
					$webique_websy_funfacts_contents = json_decode( $webique_websy_funfacts_contents );
					foreach ( $webique_websy_funfacts_contents as $webique_websy_index => $webique_websy_funfacts_content ) {
						$webique_websy_repeater_count = ! empty( $webique_websy_funfacts_content->subtitle ) ? apply_filters( 'webique_translate_single_string', $webique_websy_funfacts_content->subtitle, 'Testimonial section' ) : '';
						$webique_websy_repeater_text = ! empty( $webique_websy_funfacts_content->text ) ? apply_filters( 'webique_translate_single_string', $webique_websy_funfacts_content->text, 'Testimonial section' ) : '';
						$webique_websy_repeater_title = ! empty( $webique_websy_funfacts_content->title ) ? apply_filters( 'webique_translate_single_string', $webique_websy_funfacts_content->title, 'Testimonial section' ) : '';
						$webique_websy_repeater_background = ($webique_websy_index%3 == '0' ) ? 'bg-gradient1' : (( $webique_websy_index%3 == '1') ? 'bg-gradient2' : 'bg-primary-light');
				?>
					<div class="testimonial-inner <?php echo esc_attr($webique_websy_repeater_background); ?> wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
						<?php if(!empty($webique_websy_repeater_count)){ ?><h1 class="<?php echo ($webique_websy_index%3 == '2') ? 'primary-color' : ''; ?>"><span class="counter"><?php echo esc_html($webique_websy_repeater_count); ?></span>+</h1><?php } ?>
						<?php if(!empty($webique_websy_repeater_title)){ ?><span><?php echo esc_html( $webique_websy_repeater_title ); ?></span><?php } ?>
					</div>					
					<?php }} ?>					
				</div>
			</div>
		</div>
	</div>	
</section>
<?php } ?>