<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Aravalli
 */

get_header();
$room_ribbon_text = sanitize_text_field( get_post_meta( get_the_ID(),'room_ribbon_text', true ));
$room_price_badge 	= sanitize_text_field( get_post_meta( get_the_ID(),'room_price_badge', true ));
$room_description 		= sanitize_text_field( get_post_meta( get_the_ID(),'room_description', true ));
$room_btn_lbl = sanitize_text_field( get_post_meta( get_the_ID(),'room_btn_lbl', true ));
$room_link = sanitize_text_field( get_post_meta( get_the_ID(),'room_button_link', true ));
$room_button_link_target = sanitize_text_field( get_post_meta( get_the_ID(),'room_button_link_target', true ));
$room_star = sanitize_text_field( get_post_meta( get_the_ID(),'room_star', true ));
?>
			
<section id="room_single" class="room_single sec-default">
	<div class="container">
		<div class="row">
			<div id="ms-primary-content" class="col-lg-8 col-md-12 mb-5 mb-lg-0">
				<div class="room_single_owl">
					<div class="owl-carousel owl-theme arrows-transparent owl-nav-radius" data-slider-id="1">
						<div class="item">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php 
							$images = get_post_gallery_images();
							foreach($images as $image){
						?>
								<div class="item">
									<img src="<?php echo esc_url($image); ?>" alt="">
								</div>
						<?php } ?>
					</div>
					<div class="owl-thumbs" data-slider-id="1"></div>
				</div>
				<div class="room-content">
					<div class="heading">
						<h3><?php echo the_title(); ?></h3>
						<p><strong><?php echo esc_html($room_price_badge); ?></strong></p>
					</div>
					<p><?php echo esc_html($room_description); ?></p>
				</div>
				<?php the_excerpt(); ?>
			</div>
			<?php get_sidebar(); ?>
		</div>   
	</div>
</section>

<?php get_footer(); ?>

