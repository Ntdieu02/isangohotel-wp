<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Aravalli Pro
 */

get_header();
?>
<!-- Blog & Sidebar Section -->
 <section id="product" class="bs-py-default">
        <div class="container">
            <div class="row">
			<!--Blog Detail-->
			<div id="ms-primary-content" class="col-lg-8 wow fadeInUp">
				<?php woocommerce_content(); ?>
			</div>
			<!--/End of Blog Detail-->
			<?php get_sidebar('woocommerce'); ?>
		</div>	
	</div>
</section>
<!-- End of Blog & Sidebar Section -->

<?php get_footer(); ?>

