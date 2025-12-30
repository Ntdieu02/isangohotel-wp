<?php
/**
 * Get default values for testimonial section.
 *
 * @since 1.1.31
 * @access public
 */
  if ( ! function_exists( 'startkit_testimonial_plu' ) ) :
	function startkit_testimonial_plu() {
	$startkit_hide_show_testimonial	= get_theme_mod('hide_show_testimonial','1'); 
	$startkit_testimonial_title		= get_theme_mod('testimonial_title',__('Testimonial','clever-fox'));
	$startkit_testimonial_subttl		= get_theme_mod('testimonial_subttl',__('<span>Testimonial</span> <h6>Lorem is dummy text.</h6>','clever-fox'));
	$startkit_testimonial_description= get_theme_mod('testimonial_description',__('Publishing packages and web page editors now use Lorem Ipsum as their default model text','clever-fox'));
	$startkit_testimonial_contents	= get_theme_mod('testimonial_contents',startkit_get_testimonial_default());
?>
<?php if($startkit_hide_show_testimonial) {?>
<section id="testimonial" class="section-padding">
	<div class="container">
		<?php if( ($startkit_testimonial_title) || ($startkit_testimonial_subttl)!='' || ($startkit_testimonial_description)!='' ) { ?>
			<div class="row">
				<div class="col-md-6 offset-md-3 text-center">
					<div class="section-header">
						<?php if ( ! empty( $startkit_testimonial_subttl ) ) : ?>
							<div class="subtitle"><?php echo wp_kses_post( $startkit_testimonial_subttl ); ?></div>
						<?php endif; ?>
						<?php if ( ! empty( $startkit_testimonial_title ) ) { ?>
							<h2><?php echo esc_html( $startkit_testimonial_title ); ?></h2>
						<?php } ?>
						<hr class="liner">
						<?php if ( ! empty( $startkit_testimonial_description ) ) { ?>
							<p class="wow fadeInUp" data-wow-delay="0.1s"><?php echo esc_html( $startkit_testimonial_description ); ?></p>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php } ?>	
		<div class="row tst_contents testimonial-carousel text-center">
			<?php
		
			if ( ! empty( $startkit_testimonial_contents ) ) {
			$allowed_html = array(
			'br'     => array(),
			'em'     => array(),
			'strong' => array(),
			'b'      => array(),
			'i'      => array(),
			);
			$startkit_testimonial_contents = json_decode( $startkit_testimonial_contents );
			foreach ( $startkit_testimonial_contents as $startkit_testimonial_item ) {
				
				$startkit_repeater_title = ! empty( $startkit_testimonial_item->title ) ? apply_filters( 'startkit_translate_single_string', $startkit_testimonial_item->title, 'service section' ) : '';
				$startkit_repeater_subtitle = ! empty( $startkit_testimonial_item->subtitle ) ? apply_filters( 'startkit_translate_single_string', $startkit_testimonial_item->subtitle, 'service section' ) : '';
				$startkit_repeater_text = ! empty( $startkit_testimonial_item->text ) ? apply_filters( 'startkit_translate_single_string', $startkit_testimonial_item->text, 'service section' ) : '';
				$startkit_repeater_link = ! empty( $startkit_testimonial_item->link ) ? apply_filters( 'startkit_translate_single_string', $startkit_testimonial_item->link, 'service section' ) : '';
				$startkit_repeater_image = ! empty( $startkit_testimonial_item->image_url ) ? apply_filters( 'startkit_translate_single_string', $startkit_testimonial_item->image_url, 'service section' ) : '';
			?>
			<div class="col-md-4 mb-md-4 mb-5">
				<div class="single-testimonial">
					<?php if ( ! empty( $startkit_repeater_image ) ) : ?>
						<div class="image-qouts">
							<div class="img-rounded">
								<img src="<?php echo esc_url( $startkit_repeater_image ); ?>" <?php if ( ! empty( $startkit_repeater_title ) ) : ?> alt="<?php echo esc_attr( $startkit_repeater_title ); ?>" title="<?php echo esc_attr( $startkit_repeater_title ); ?>" <?php endif; ?> />
							</div>
							<div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
						</div>
					<?php endif; ?>
					<?php if ( ! empty( $startkit_repeater_text ) ) : ?>
						<p><?php echo esc_html( $startkit_repeater_text ); ?></p>
					<?php endif; ?>
					<div class="testimonial-text">
						<?php if ( ! empty( $startkit_repeater_title ) ) : ?>
							<h6><?php echo esc_html( $startkit_repeater_title ); ?>,</h6>
						<?php endif; ?>
						<?php if ( ! empty( $startkit_repeater_subtitle ) ) : ?>
							<span class="title"><?php echo esc_html( $startkit_repeater_subtitle ); ?></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php } } ?>
		</div>
	</div>
</section>
<?php 
	}}
	endif;
if ( function_exists( 'startkit_testimonial_plu' ) ) {
$cleverfox_section_priority = apply_filters( 'startkit_section_priority', 13, 'startkit_testimonial_plu' );
add_action( 'startkit_sections', 'startkit_testimonial_plu', absint( $cleverfox_section_priority ) );
}	