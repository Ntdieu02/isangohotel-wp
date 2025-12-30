<?php 
$event_title 				= get_theme_mod('event_title','Explore');
$event_subtitle 			= get_theme_mod('event_subtitle','News & Events');
$event_description 			= get_theme_mod('event_description','Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem');
$events_content 			= get_theme_mod('events_content',aravalli_get_event_default());
?>
<section id="testimonial-section" class="testimonial-events sec-default">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mb-lg-0 mb-5 home-testimonial">
				<?php get_template_part('template-parts/sections/section','testimonial-content'); ?>
			</div>
			<div class="col-lg-6 mb-lg-0 mb-0 home-event">
				<?php if(!empty($event_title) || !empty($event_subtitle) || !empty($event_description)): ?>
					<div class="row">
						<div class="col-12">
							<div class="heading-default wow fadeInUp">
							
								<?php if(!empty($event_title)): ?>
									<h6><?php echo wp_kses_post($event_title); ?></h6>
								<?php endif; ?>	
								
								<?php if(!empty($event_subtitle)): ?>
									<h3><?php echo wp_kses_post($event_subtitle); ?><span class="line-circle"></span></h3>      
								<?php endif; ?>		
								
								<?php if(!empty($event_description)): ?>				
									<p> <?php echo esc_html($event_description); ?></p>
								<?php endif; ?>		
								
							</div>
						</div>
					</div>
				<?php endif; ?>	
				<div class="row">
					<div class="col-12">
						<div class="news-events owl-carousel owl-theme wow fadeInUp">
							<!-- Grid row-->
							<?php
								if ( ! empty( $events_content ) ) {
								$events_content = json_decode( $events_content );
								foreach ( $events_content as $event_item ) {
									$title = ! empty( $event_item->title ) ? apply_filters( 'aravalli_translate_single_string', $event_item->title, 'Event section' ) : '';
									$subtitle = ! empty( $event_item->subtitle ) ? apply_filters( 'aravalli_translate_single_string', $event_item->subtitle, 'Event section' ) : '';
									$text = ! empty( $event_item->text ) ? apply_filters( 'aravalli_translate_single_string', $event_item->text, 'Event section' ) : '';
									$text2 = ! empty( $event_item->text2) ? apply_filters( 'aravalli_translate_single_string', $event_item->text2,'Event section' ) : '';
									$button = ! empty( $event_item->button_second ) ? apply_filters( 'aravalli_translate_single_string', $event_item->button_second, 'Event section' ) : '';
									$link = ! empty( $event_item->link ) ? apply_filters( 'aravalli_translate_single_string', $event_item->link, 'Event section' ) : '';
									$time = ! empty( $event_item->shortcode ) ? apply_filters( 'aravalli_translate_single_string', $event_item->shortcode, 'Event section' ) : '';
							?>
								<div class="row">
									<div class="col-lg-12 col-12 mb-30">
										<div class="client-box">
											<?php if(!empty($title) || !empty($subtitle)): ?>
												<div class="avatar mb-md-0">
													<div class="cal">
														<?php if(!empty($title)): ?>
															<h2><?php echo esc_html($title); ?></h2>
														<?php endif; ?>		
														
														<?php if(!empty($subtitle)): ?>
															<h3><?php echo esc_html($subtitle); ?></h3>
														<?php endif; ?>
													</div>
												</div>
											<?php endif; ?>	
											<div class="news-text">
												<?php if(!empty($text2)): ?>
													<h3><?php echo esc_html($text2); ?></h3>
												<?php endif; ?>
												
												<?php if(!empty($text)): ?>
													<p><?php echo esc_html($text); ?></p>
												<?php endif; ?>
												
												<?php if(!empty($button)): ?>
													<a href="<?php echo esc_url($link); ?>" class="btn-shape btn-line-primary"><?php echo esc_html($button); ?></a>
												<?php endif; ?>	
												<?php if(!empty($time)): ?>
													<p><i class="fa  fa-clock-o"></i> <span><?php echo esc_html($time); ?></span></p>
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
			</div>
		</div>
	</div>
</section>