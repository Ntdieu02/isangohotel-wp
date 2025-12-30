<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Aravalli
 */

get_header();
$aravalli_search_pg_layout 				= get_theme_mod('search_pg_layout', 'aravalli_rsb');
?>
<section class="blog-content bs-py-default">
	<div class="container">
		<div class="row g-5">
			<!-- Blog Posts -->
			<?php if($aravalli_search_pg_layout == 'aravalli_lsb'):  get_sidebar(); endif; ?>
			<?php if($aravalli_search_pg_layout == 'aravalli_fullwidth'): ?>
				<div class="col-lg-12 col-12">
			<?php else: ?>	
				<div id="ms-primary-content" class="col-lg-8 col-12">
			<?php endif; ?>	
				<div class="row row-cols-1 gy-4">
					<?php if( have_posts() ): ?>
						<?php while( have_posts() ) : the_post(); ?>
							<div class="col">
								<?php get_template_part('template-parts/content/content','page'); ?>
							</div>
						<?php 
							endwhile;
							the_posts_navigation();
						else: 
						 get_template_part('template-parts/content/content','none'); 
					 endif; ?>
				</div>                  
			</div>
			<?php if($aravalli_search_pg_layout == 'aravalli_rsb'): get_sidebar(); endif; ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
