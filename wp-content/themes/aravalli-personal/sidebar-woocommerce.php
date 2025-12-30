<?php
/**
 * side bar template
 *
 * @package WordPress
 * @subpackage spasalon
 */
?>
<?php if ( ! is_active_sidebar( 'aravalli-woocommerce-sidebar' ) ) {	return; } ?>
<div id="ms-secondary-content" class="av-column-4 mb-6 mb-av-0 wow fadeInUp">
	<section class="sidebar">
		<?php dynamic_sidebar('aravalli-woocommerce-sidebar'); ?>
	</section>
</div>