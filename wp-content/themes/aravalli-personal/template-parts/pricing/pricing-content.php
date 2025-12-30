<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aravalli
 */
$plans_currency 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_currency', true ));
$plans_price 			= sanitize_text_field( get_post_meta( get_the_ID(),'plans_price', true ));
$plans_duration 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_duration', true ));
$price_recomended 		= sanitize_text_field( get_post_meta( get_the_ID(),'price_recomended', true ));
$price_content			=   get_post_meta(get_the_ID(), 'price_content', true);
$plans_button_label 	= sanitize_text_field( get_post_meta( get_the_ID(),'plans_button_label', true ));
$plans_button_link 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_button_link', true ));
$plans_button_link_target 	= sanitize_text_field( get_post_meta( get_the_ID(),'plans_button_link_target', true ));
?>
<div class="single-pricing <?php if(!empty($price_recomended)){ ?>featured-plan<?php } ?>">
	<?php if(!empty($price_recomended)){ ?>
		<div class="featured-text yellow"><span><?php echo esc_html($price_recomended); ?></span></div>
	<?php } ?>
	<h5><?php echo the_title(); ?></h5>
	<div class="pricing"><sup class="dollar"><?php echo esc_html($plans_currency); ?></sup><span class="price"><?php echo esc_html($plans_price); ?></span><span class="month"><?php echo esc_html($plans_duration); ?></span></div>

	<?php  
		 if(isset($price_content) && is_array($price_content)) {
			 echo '<ul>';
			foreach($price_content as $price_content){
				echo '<li><i class="icofont icofont-tick-mark"></i>'.wp_kses_post($price_content).'</li>';
			}
			echo '</ul>';
		}
	?>
	<?php if(!empty($plans_button_label)){ ?>
		<a href="<?php echo esc_url($plans_button_link); ?>" <?php  if($plans_button_link_target) { echo "target='_blank'"; } ?> class="btn btn-border-primary btn-like-icon"><?php echo esc_html($plans_button_label); ?> <span class="bticn"><i class="fa fa-angle-right"></i></span></a>
	<?php } ?>
</div>