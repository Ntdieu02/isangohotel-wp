<?php  
	$newsletter_title 		= get_theme_mod('newsletter_title','Vivanta Work With All Devices');
	$newsletter_desc 		= get_theme_mod('newsletter_desc',"Lorem Ipsum is simply dummy text of the printing and typese industry. Lorem Ipsum has been the industry's standard mytext ever since the 1500s, when an unknown printer took");
	$newsletter_shortcode 	= get_theme_mod('newsletter_shortcode');
	$newsletter_app_title 	= get_theme_mod('newsletter_app_title','Give A Miss Call To Get An App Link');
	$newsletter_btn 		= get_theme_mod('newsletter_btn',aravalli_get_news_btn_default());
	$newsletter_right_img 	= get_theme_mod('newsletter_right_img',esc_url(get_template_directory_uri() .'/assets/images/newsLetter/mobi_mock.png'));
?>	
<section id="newsletter-section" class="newsletter news-home">
	<div class="container">
		<div class="row">
			<?php if(empty($newsletter_right_img)): ?>
			<div class="col-lg-12">
			<?php else: ?>
			<div class="col-lg-6">
			<?php endif; ?>
				<div class="news-info wow fadeInLeft">
					<?php if(!empty($newsletter_title)): ?>
						<h4><?php echo wp_kses_post($newsletter_title); ?></h4>
					<?php endif; ?>	
					<?php if(!empty($newsletter_desc)): ?>
						<p><?php echo wp_kses_post($newsletter_desc); ?></p>
					<?php endif; ?>	
					
					<?php if(!empty($newsletter_shortcode)): echo do_shortcode($newsletter_shortcode); else: ?>
						<form action="#">
							<div class="input-group">
								<input class="form-control" name="subscribe_email" id="subscribe_email" type="text" placeholder="Subscribe Your Email Here">
								<button class="btn btn-info" type="submit"><i class="fa fa-arrow-right"></i></button>
							</div>
						</form>
					<?php endif; ?>		
					
					<?php if(!empty($newsletter_app_title)): ?>
						<h2><?php echo wp_kses_post($newsletter_app_title); ?></h2>
					<?php endif; ?>	
					
					<div class="news-btns">
						<?php
							if ( ! empty( $newsletter_btn ) ) {
							$newsletter_btn = json_decode( $newsletter_btn );
							foreach ( $newsletter_btn as $news_btn_item ) {
								$link = ! empty( $news_btn_item->link ) ? apply_filters( 'aravalli_translate_single_string', $news_btn_item->link, 'Newsletter section' ) : '';
								$image = ! empty( $news_btn_item->image_url ) ? apply_filters( 'aravalli_translate_single_string', $news_btn_item->image_url, 'Newsletter section' ) : '';
								if(!empty($image)):
						?>
							<a class="rounded" href="<?php echo esc_url($link); ?>"><img src="<?php echo esc_url($image); ?>" alt=""></a>
						<?php endif; } } ?>
					</div>
				</div>
			</div>
			<?php if(!empty($newsletter_right_img)): ?>
				<div class="col-lg-5 offset-lg-1">
						<div class="android wow fadeInRight" data-wow-delay="0.2s"><img src="<?php echo esc_url($newsletter_right_img); ?>" alt="App"></div>
				</div>
			<?php endif; ?>	
		</div>
	</div>
</section>