<?php 
if ( ! function_exists( 'metasoft_lite_expertise' ) ) :
	function metasoft_lite_expertise() {
	$metasoft_expertise_home_hs		= get_theme_mod('expertise_home_hs','1');
	$metasoft_expertise_title  = get_theme_mod('expertise_title',__('Our <span class="text-primary">Core Expertise</span>','clever-fox'));
	$metasoft_expertise_description   = get_theme_mod('expertise_description',__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text.','clever-fox'));
	$metasoft_expertise_hs	= get_theme_mod('expertise_hs','1');
	$metasoft_expt_success_hs	= get_theme_mod('expt_success_hs','1');
if(!empty($metasoft_expertise_home_hs)){	
?> 
<!-- Our Core Expertise Start -->
<section id="expertise-wrapper" class="expertise-wrapper bs-py-default expertise-home">
	<div class="container">
		<?php if ( ! empty( $metasoft_expertise_title ) || ! empty( $metasoft_expertise_description )) : ?>
			<div class="row">
				<div class="col-lg-7 col-12 mx-lg-auto mb-5 text-center">
					<div class="heading-seprator wow fadeInUp">
						<?php if ( ! empty( $metasoft_expertise_title ) ) : ?>
							<h1><?php echo wp_kses_post($metasoft_expertise_title); ?></h1>
						<?php endif; ?>
						
						<?php if ( ! empty( $metasoft_expertise_description ) ) : ?>
							<p><?php echo esc_html($metasoft_expertise_description); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>	
		<div class="row g-4">
			<?php if($metasoft_expt_success_hs !=='1'): ?>
				<div class="col-md-12 col-lg-12">
			<?php else: ?>	
				<div class="col-md-12 col-lg-8">
			<?php endif; ?>	
				<?php 
					$metasoft_expertise_contents	= get_theme_mod('expertise_contents',metasoft_get_expertise_default());
				if($metasoft_expertise_hs =='1'): ?>
					<div class="row g-4 expertise-content">
						<?php
						if ( ! empty( $metasoft_expertise_contents ) ) {
						$metasoft_expertise_contents = json_decode( $metasoft_expertise_contents );
						foreach ( $metasoft_expertise_contents as $metasoft_expertise_item ) {
							$metasoft_repeater_title = ! empty( $metasoft_expertise_item->title ) ? apply_filters( 'metasoft_translate_single_string', $metasoft_expertise_item->title, 'Expertise section' ) : '';
							$metasoft_repeater_text = ! empty( $metasoft_expertise_item->text ) ? apply_filters( 'metasoft_translate_single_string', $metasoft_expertise_item->text, 'Expertise section' ) : '';
							$metasoft_repeater_icon = ! empty( $metasoft_expertise_item->icon_value ) ? apply_filters( 'metasoft_translate_single_string', $metasoft_expertise_item->icon_value, 'Expertise section' ) : '';
					?>
						<div class="col-sm-6 ?>">
							<div class="expertise-item">
								<div class="expertise-icon">
									<?php if ( ! empty( $metasoft_repeater_icon ) ) {?>
										<span class="icon"><i class="fa <?php echo esc_attr( $metasoft_repeater_icon ); ?>"></i></span>
									<?php } ?>
								</div>
								<div class="expertise-card">
									<?php if(!empty($metasoft_repeater_title)): ?>
										<h5><a href="javascript:void(0);"><?php echo esc_html($metasoft_repeater_title); ?></a></h5>
									<?php endif; ?>	
									<?php if(!empty($metasoft_repeater_text)): ?>
										<p><?php echo esc_html($metasoft_repeater_text); ?></p>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php } } ?>
					</div>
				<?php endif; ?>
			</div>
			<?php if($metasoft_expertise_hs !=='1'): ?>
				<div class="col-md-6 col-lg-12">
			<?php else: ?>	
				<div class="col-md-6 col-lg-4">
			<?php endif; ?>	
			<?php 
				$metasoft_expt_success_img	= get_theme_mod('expt_success_img',CLEVERFOX_PLUGIN_URL .'inc/metasoft/images/thumbsup.png');
				$metasoft_expt_success_ttl	= get_theme_mod('expt_success_ttl',__('We deliver success to our traders','clever-fox'));
				$metasoft_expt_success_desc	= get_theme_mod('expt_success_desc',__('Need guidance in creating and managing successful investment portfolio?','clever-fox'));
				$metasoft_expt_success_btn_icon	= get_theme_mod('expt_success_btn_icon','fa-angle-right');
				$metasoft_expt_success_btn_lbl	= get_theme_mod('expt_success_btn_lbl',__('Contact Us','clever-fox'));
				$metasoft_expt_success_btn_url	= get_theme_mod('expt_success_btn_url');
				if($metasoft_expt_success_hs =='1'): ?>
					<div class="success-info">
						<div class="success-inner">
							<?php if(!empty($metasoft_expt_success_img)): ?>
								<img src="<?php echo esc_url($metasoft_expt_success_img); ?>" alt="">
							<?php endif; ?>	
							
							<?php if(!empty($metasoft_expt_success_ttl)): ?>
								<h5><?php echo esc_html($metasoft_expt_success_ttl); ?></h5>
							<?php endif; ?>	
							
							<?php if(!empty($metasoft_expt_success_desc)): ?>
								<p><?php echo esc_html($metasoft_expt_success_desc); ?></p>
							<?php endif; ?>
							
							<?php if(!empty($metasoft_expt_success_btn_lbl) || !empty($metasoft_expt_success_btn_icon)): ?>
								<a href="<?php echo esc_url($metasoft_expt_success_btn_url); ?>" class="btn btn-border-primary btn-like-icon"><?php echo esc_html($metasoft_expt_success_btn_lbl); ?> <span class="bticn"><i class="fa <?php echo esc_attr($metasoft_expt_success_btn_icon); ?>"></i></span></a>
							<?php endif; ?>
							
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php	
}}
endif;
if ( function_exists( 'metasoft_lite_expertise' ) ) {
$cleverfox_section_priority = apply_filters( 'metasoft_section_priority', 14, 'metasoft_lite_expertise' );
add_action( 'metasoft_sections', 'metasoft_lite_expertise', absint( $cleverfox_section_priority ) );
}
?>
<!-- Our Core Expertise End -->
	