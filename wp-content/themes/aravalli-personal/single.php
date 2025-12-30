<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aravalli
 */

get_header();
$aravalli_blog_single_layout 			= get_theme_mod('blog_single_layout', 'aravalli_rsb'); 
?>
<div id="blog-single" class="blog-section sec-default">
	<div class="container">
		<div class="row">
			<?php if($aravalli_blog_single_layout == 'aravalli_lsb'): get_sidebar(); endif; ?>	
			<?php if($aravalli_blog_single_layout == 'aravalli_fullwidth'): ?>
				<div class="col-lg-12 col-md-12 mb-5 mb-lg-0">
			<?php else: ?>	
				<div id="ms-primary-content" class="col-lg-8 col-md-12 mb-5 mb-lg-0">
			<?php endif; ?>	
			   <?php if( have_posts() ): ?>
					<?php while( have_posts() ): the_post(); ?>
						<?php get_template_part('template-parts/content/content','page-list'); ?> 
					<?php endwhile; ?>
				<?php endif; ?>

				<!-- Author Profile Start-->
					<?php 
						$aravalli_enable_author_box		= get_theme_mod('enable_author_box','1');
						if($aravalli_enable_author_box == '1'){
							get_template_part('template-parts/content/content-author','meta'); 
						}
					?>
				<!-- Author Profile Start-->

				<!-- Comment List Start -->
					<?php comments_template( '', true ); // show comments  ?>
				<!-- Comment List End -->
			</div>
			<?php if($aravalli_blog_single_layout == 'aravalli_rsb'): get_sidebar(); endif; ?>
		</div>
	</div>
</div>
	
	
<?php get_footer(); ?>
