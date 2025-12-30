<?php  
	$pg_about_certificates_ttl 		= get_theme_mod('pg_about_certificates_ttl','Our');
	$pg_about_certificates_sub		= get_theme_mod('pg_about_certificates_sub','Certificates'); 
	$pg_about_certificates_desc		= get_theme_mod('pg_about_certificates_desc',"Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry's standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book.");
	$pg_about_certificates			= get_theme_mod('pg_about_certificates',aravalli_get_certificates_default());
?>		
<section id="certificates" class="certificates sec-default">
	<div class="container">
		<?php if(!empty($pg_about_certificates_ttl) || !empty($pg_about_certificates_sub) || !empty($pg_about_certificates_desc)): ?>
			<div class="row">
				<div class="col-12">
					<div class="heading-default wow fadeInUp">
					
						<?php if(!empty($pg_about_certificates_ttl)): ?>
							<h6><?php echo wp_kses_post($pg_about_certificates_ttl); ?></h6>
						<?php endif; ?>	
						
						<?php if(!empty($pg_about_certificates_sub)): ?>
							<h3><?php echo wp_kses_post($pg_about_certificates_sub); ?><span class="line-circle"></span></h3>      
						<?php endif; ?>		
						
						<?php if(!empty($pg_about_certificates_desc)): ?>				
							<p> <?php echo esc_html($pg_about_certificates_desc); ?></p>
						<?php endif; ?>		
						
					</div>
				</div>
			</div>
		<?php endif; ?>	
		<div class="row">
			<div class="col-12">
				<div class="partner-carousel owl-carousel owl-theme">
					<?php
						if ( ! empty( $pg_about_certificates ) ) {
						$pg_about_certificates = json_decode( $pg_about_certificates );
						foreach ( $pg_about_certificates as $certificates_item ) {
							$link = ! empty( $certificates_item->link ) ? apply_filters( 'aravalli_translate_single_string', $certificates_item->link, 'Certificates section' ) : '';
							$image = ! empty( $certificates_item->image_url ) ? apply_filters( 'aravalli_translate_single_string', $certificates_item->image_url, 'Certificates section' ) : '';
							
					?>
						<div class="certificate-img">
							<?php if ( ! empty( $image ) ) : ?>
								<a href="<?php echo esc_url( $link ); ?>"><img src="<?php echo esc_url( $image ); ?>"  alt=""></a>
						   <?php endif; ?>
						</div>
					<?php } } ?>
				</div>
			</div>
		</div>
	</div>
</section>