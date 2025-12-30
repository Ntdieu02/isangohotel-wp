<?php   
	$contact_pg_form_ttl		= get_theme_mod('contact_pg_form_ttl','Get In Touch'); 
	$contact_pg_form_shortcode	= get_theme_mod('contact_pg_form_shortcode'); 
?>	
<section id="contact-form" class="contact-form">
	<div class="container">
		<?php if(!empty($contact_pg_form_ttl)): ?>
			<div class="row">
				<div class="col-12">
					<div class="heading-form">
						<h3><?php echo esc_html($contact_pg_form_ttl); ?></h3>
					</div>
				</div>
			</div>
		<?php endif; ?>	
		<div class="row">
			<div class="col-12">
				<?php if(!empty($contact_pg_form_shortcode)): echo do_shortcode($contact_pg_form_shortcode); else: ?>
					<form action="#">                        
						<div class="row">
							<div class="col-md-4">
								<div class="input-form">
									<input class="form-control" name="name" id="name" type="text" placeholder="Name">
								</div>
							</div>
							<div class="col-md-4">
								<div class="input-form">
									<input class="form-control" name="email2" id="email2" type="email" placeholder="E-mail">
								</div>
							</div>
							<div class="col-md-4">
								<div class="input-form">
									<input class="form-control" name="subject" id="subject" type="text" placeholder="Subject">
								</div>
							</div>
							<div class="col-md-12 mt-5">
								<div class="input message">
									<textarea name="your-message" class="form-control" placeholder="Your Message"></textarea>
								</div>
							</div>
							<div class="col-md-12 mt-5 text-center">
								<button class="btn-shape btn-black" type="submit">Send Message</button>
							</div>
						</div>
					</form>
				<?php endif; ?>	
			</div>
		</div>
	</div>
</section>