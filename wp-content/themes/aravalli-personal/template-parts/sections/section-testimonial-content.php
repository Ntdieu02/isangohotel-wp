<?php
$testimonial_title 			= get_theme_mod('testimonial_title','Explore');
$testimonial_subtitle 		= get_theme_mod('testimonial_subtitle','Client’s Speak');
$testimonial_description    = get_theme_mod('testimonial_description','Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem');
$testimonials_content 		= get_theme_mod('testimonials_content',aravalli_get_testimonial_default());

if(!empty($testimonial_title) || !empty($testimonial_subtitle) || !empty($testimonial_description)): ?>
	<div class="row">
		<div class="col-12">
			<div class="heading-default wow fadeInUp">
			
				<?php if(!empty($testimonial_title)): ?>
					<h6><?php echo wp_kses_post($testimonial_title); ?></h6>
				<?php endif; ?>	
				
				<?php if(!empty($testimonial_subtitle)): ?>
					<h3><?php echo wp_kses_post($testimonial_subtitle); ?><span class="line-circle"></span></h3>      
				<?php endif; ?>		
				
				<?php if(!empty($testimonial_description)): ?>				
					<p> <?php echo esc_html($testimonial_description); ?></p>
				<?php endif; ?>		
				
			</div>
		</div>
	</div>
<?php endif; ?>	
<div class="row">
	<div class="col-12">
		<div class="team-section owl-carousel owl-theme wow fadeInUp">
			<!-- Grid row-->
			<?php
				if ( ! empty( $testimonials_content ) ) {
				$testimonials_content = json_decode( $testimonials_content );
				foreach ( $testimonials_content as $testimonial_item ) {
					$title = ! empty( $testimonial_item->title ) ? apply_filters( 'aravalli_translate_single_string', $testimonial_item->title, 'Testimonial section' ) : '';
					$subtitle = ! empty( $testimonial_item->subtitle ) ? apply_filters( 'aravalli_translate_single_string', $testimonial_item->subtitle, 'Testimonial section' ) : '';
					$text = ! empty( $testimonial_item->text ) ? apply_filters( 'aravalli_translate_single_string', $testimonial_item->text, 'Testimonial section' ) : '';
					$text2 = ! empty( $testimonial_item->text2) ? apply_filters( 'aravalli_translate_single_string', $testimonial_item->text2,'Testimonial section' ) : '';
					$image = ! empty( $testimonial_item->image_url ) ? apply_filters( 'aravalli_translate_single_string', $testimonial_item->image_url, 'Testimonial section' ) : '';
			?>
				<div class="row">
					<div class="col-lg-12 col-12 mb-30">
						<div class="client-box">
							<?php if(!empty($image)): ?>
							<div class="avatar mb-md-0">
								<img src="<?php echo esc_url($image); ?>" <?php if(!empty($title)): ?> alt="<?php echo esc_attr($title); ?>" <?php endif; ?>>
							</div>
							<?php endif; ?>		
							<div class="client-text">
								<blockquote>
								
									<?php if(!empty($text2)): ?>
										<h3><?php echo esc_html($text2); ?></h3>
									<?php endif; ?>		
									
									<?php if(!empty($text)): ?>
										<p><?php echo esc_html($text); ?></p>
									<?php endif; ?>
									
								</blockquote>
								<?php if(!empty($title) || !empty($subtitle)): ?>
									<p><?php echo esc_html($title); ?> <span><?php echo esc_html($subtitle); ?></span></p>
								<?php endif; ?>		
							</div>
						</div>
					</div>                                   
				</div>
			<?php } } ?>
			<!-- Grid row-->
		</div>
	</div>
</div>