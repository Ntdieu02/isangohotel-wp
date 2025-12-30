<?php
	$webique_cta_hs 			= get_theme_mod('cta_hs','1');
	$webique_cta_call_icon 		= get_theme_mod('cta_call_icon','fa-phone');
	$webique_cta_call_title		= get_theme_mod('cta_call_title','Available 24/7'); 
	$webique_cta_call_text		= get_theme_mod('cta_call_text','+91 246 2365'); 
	$webique_cta_email_icon 	= get_theme_mod('cta_email_icon','fa-envelope');
	$webique_cta_email_title	= get_theme_mod('cta_email_title','Email Us:'); 
	$webique_cta_email_text		= get_theme_mod('cta_email_text','info@company.com');
	$webique_cta_title			= get_theme_mod('cta_title','Get A Free Consultation');
	$webique_cta_subtitle		= get_theme_mod('cta_subtitle','99% Satisfy Clients');
	$webique_cta_btn_lbl		= get_theme_mod('cta_btn_lbl','Contact Us'); 	
	$webique_cta_btn_link		= get_theme_mod('cta_btn_link');
	$webique_cta_btn_newtab		= get_theme_mod('cta_btn_newtab','1');
	$webique_cta_btn_nofollow	= get_theme_mod('cta_btn_nofollow','1');
	$webique_cta_contents		= get_theme_mod('cta_contents',webique_get_cta_default());
	$webique_cta_rating			= get_theme_mod('cta_rating','5');
	$webique_cta_bg_setting		= get_theme_mod('cta_bg_setting',CLEVERFOX_PLUGIN_URL.'inc/webique/images/cta_bg.jpg'); 
	if($webique_cta_hs=='1'){
?>
<section id="cta-section" class="cta-section av-py-default ripple-area" style="background: url( <?php echo esc_url($webique_cta_bg_setting); ?>) center center no-repeat; background-size: cover; background-attachment: fixed">
	<div class="av-container">
		<div class="row align-items-center justify-content-center">
			<div class="col-lg-12">
				<div class="cta-content text-center my-4">
					<div class="row align-items-center justify-content-center wow fadeInUp" data-wow-duration="1500ms">
						<div class="col-md-4 p-0">
							<div class="cta-text top">
								<span class="cta_tittle"><?php echo wp_kses_post($webique_cta_title); ?></span>
							</div>
						</div>
					</div>
					<div class="row align-items-center cta-box">
						<div class="col-md-4 text-md-left text-center wow zoomIn" data-wow-duration="1500ms">
							<div class="info-box d-flex align-items-center justify-content-md-start justify-content-center ps-lg-3 ps-xl-4">
								<div class="icon-circle">
									<i class="fa <?php echo esc_attr($webique_cta_call_icon); ?> primary-color"></i>
								</div>
								<div class="text-left ms-2">
								<?php if(!empty($webique_cta_call_title)){ ?>
									<h5 class="call-title"><?php echo wp_kses_post($webique_cta_call_title); ?></h5>
								<?php } ?>
								<?php if(!empty($webique_cta_call_text)){ ?>
									<a href="tel:<?php echo esc_attr(str_replace(' ','',$webique_cta_call_text)); ?>" class="contact-info">
										<span class="title call-text"><?php echo wp_kses_post($webique_cta_call_text); ?></span>
									</a>
								<?php } ?>
								</div>
							</div>
						</div>
						<div class="col-md-4 text-center wow zoomIn" data-wow-duration="1500ms">
							<div class="info-box">
								<div class="rating">
								<?php for ( $webique_rating = 1; $webique_rating <= $webique_cta_rating; $webique_rating++ ) { ?>
									<span class="fa fa-star"></span>
								<?php } ?>
								</div>
								<h4><?php echo wp_kses_post($webique_cta_subtitle); ?></h4>
								<div class="client-images">
								<?php 
									if ( ! empty( $webique_cta_contents ) ) {
									$webique_cta_contents = json_decode( $webique_cta_contents );	
									foreach ( $webique_cta_contents as $webique_index => $webique_cta_item ) {	
									$webique_repeater_image = ! empty( $webique_cta_item->image_url ) ? apply_filters( 'webique_translate_single_string', $webique_cta_item->image_url, 'cta section' ) : '';
								?>
									<img src="<?php echo esc_url($webique_repeater_image); ?>" alt="<?php echo esc_attr__('Client ', 'clever-fox'). esc_attr($webique_index) ; ?>">
									<?php } } ?>									
								</div>
							</div>
						</div>
						<div class="col-md-4 text-md-end text-center wow zoomIn" data-wow-duration="1500ms"> 
							<div class="info-box d-flex align-items-center justify-content-md-end justify-content-center pe-lg-3 pe-xl-4">
								<div class="text-end me-2">
									<?php if(!empty($webique_cta_email_title)){ ?>
										<h5 class="email-title"><?php echo wp_kses_post($webique_cta_email_title); ?></h5>
									<?php } ?>
									<?php if(!empty($webique_cta_email_text)){ ?>
										<a href="mailto:<?php echo esc_attr(str_replace(' ','',$webique_cta_email_text)); ?>" class="contact-info">
											<span class="title email-text"><?php echo wp_kses_post($webique_cta_email_text); ?></span>
										</a>
									<?php } ?>
								</div>
								<div class="icon-circle">
									<i class="fa <?php echo esc_attr($webique_cta_email_icon); ?> primary-color"></i>
								</div>
							</div>
						</div>
					</div>
					<?php if(!empty($webique_cta_btn_lbl)){ ?>
					<div class="row align-items-center justify-content-center wow fadeInDown" data-wow-duration="1500ms">
						<div class="col-md-4 p-0">
							<div class="cta-text bottom">
								<a href="<?php echo esc_url($webique_cta_btn_link); ?>"  target="<?php if($webique_cta_btn_newtab == '1' ) { echo '_blank'; } ?>" rel="<?php if($webique_cta_btn_newtab == '1' ) { echo 'noreferrer noopener';} ?> <?php if($webique_cta_btn_nofollow == '1' ) { echo 'nofollow';} ?>" class="fw-bold">
									<span class="cta_btn_lbl"><?php echo wp_kses_post($webique_cta_btn_lbl); ?></span>
								</a>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php } ?>