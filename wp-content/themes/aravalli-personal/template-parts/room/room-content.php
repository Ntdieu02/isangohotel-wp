<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aravalli
 */
$room_ribbon_text 	= sanitize_text_field( get_post_meta( get_the_ID(),'room_ribbon_text', true ));
$room_price_badge 	= sanitize_text_field( get_post_meta( get_the_ID(),'room_price_badge', true ));
$room_description 	= sanitize_text_field( get_post_meta( get_the_ID(),'room_description', true ));
$room_btn_lbl 		= sanitize_text_field( get_post_meta( get_the_ID(),'room_btn_lbl', true ));
$room_link 			= sanitize_text_field( get_post_meta( get_the_ID(),'room_button_link', true ));
$room_button_link_target = sanitize_text_field( get_post_meta( get_the_ID(),'room_button_link_target', true ));
$room_star 			= sanitize_text_field( get_post_meta( get_the_ID(),'room_star', true ));
if($room_link) { 
	$room_link; 
}	
else { 
	$room_link = get_post_permalink(); 
} 
?>
<article class="post-single wow fadeInUp">
	<?php if ( has_post_thumbnail() ) {  ?>	
		<div class="post-thumbnail">
			<div class="post-img"><?php the_post_thumbnail(); ?></div>
			<?php if (!empty($room_ribbon_text) ):  ?>
				<div class="ribbon-container"><span class="ribbon ribbon-red"><?php echo esc_html($room_ribbon_text); ?></span></div>
			<?php endif; ?>
			<?php if (!empty($room_price_badge) ):  ?>
				<div class="price-bedge"> <?php echo esc_html($room_price_badge); ?></div>
			<?php endif; ?>
		</div>
	<?php } ?>
	<div class="post-content">
		<div class="post-content-inner">
			<h3 class="post-title"><a href="javascript:void(0)"><?php echo the_title(); ?></a></h3>
			<p><?php echo esc_html($room_description); ?></p>
			<?php if(!empty($room_btn_lbl)): ?>
				<a href="<?php echo esc_url($room_link); ?>" <?php  if($room_button_link_target) { echo "target='_blank'"; } ?> class="btn-shape btn-line-primary"><?php echo esc_html($room_btn_lbl); ?></a>
			<?php endif; ?>
		</div>
		<?php if (!empty($room_star) ):  ?>
			<div class="post-content-bottom">
				<ul class="star-rating">
					<?php for ($i=1; $i<=$room_star; $i++) { ?>
					<li><i class="fa fa-star"></i></li>
					<?php } ?>
					<li><span class="rating"><?php echo esc_html($room_star); ?>.0</span></li>
				</ul>
				<div class="comment-box">
					<a href="javascript:void(0);" class="fa fa-comment"></a>
					<span class="">0<?php echo esc_html($room_star); ?></span>
				</div>
			</div>
		<?php endif; ?>	
	</div>
</article>