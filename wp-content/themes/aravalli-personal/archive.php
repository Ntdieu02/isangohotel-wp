<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aravalli
 */

get_header();
$aravalli_archive_pg_layout = get_theme_mod('archive_pg_layout', 'aravalli_rsb'); 
?>
<div id="blog-grid-r-s" class="blog-section sec-default">
	<div class="container">
		<div class="row">
			<?php if($aravalli_archive_pg_layout == 'aravalli_lsb'):  get_sidebar(); endif; ?>
			<?php if($aravalli_archive_pg_layout == 'aravalli_fullwidth'): ?>
				<div class="col-lg-12 col-md-12 mb-5 mb-lg-0">
			<?php else: ?>	
				<div id="ms-primary-content" class="col-lg-8 col-md-12 mb-5 mb-lg-0">
			<?php endif; ?>	
				<div class="side-grid d-flex flex-wrap">
					<?php if( have_posts() ): ?>
						<?php while( have_posts() ) : the_post(); ?>
							<?php get_template_part('template-parts/content/content','page'); ?>
					<?php 
						endwhile;
						else: 
							get_template_part('template-parts/content/content','none'); 
					 endif; ?>
				</div>
			</div>
			<?php if($aravalli_archive_pg_layout == 'aravalli_rsb'): get_sidebar(); endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
