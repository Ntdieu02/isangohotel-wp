<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aravalli
 */

get_header(); 
$aravalli_blog_pg_layout 			= get_theme_mod('blog_page_layout', 'aravalli_rsb'); 
?>
<div id="blog-grid-r-s" class="blog-section sec-default">
	<div class="container">
		<div class="row">
			<?php if($aravalli_blog_pg_layout == 'aravalli_lsb'):  get_sidebar(); endif; ?>
			<?php if($aravalli_blog_pg_layout == 'aravalli_fullwidth'): ?>
				<div class="col-lg-12 col-md-12 mb-5 mb-lg-0">
			<?php else: ?>	
				<div id="ms-primary-content" class="col-lg-8 col-md-12 mb-5 mb-lg-0">
			<?php endif; ?>	
				<div class="side-grid d-flex flex-wrap">
					<?php 
						$aravalli_paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
						$args = array( 'post_type' => 'post','paged'=>$aravalli_paged );	
					?>
					<?php if( have_posts() ): ?>
						<?php while( have_posts() ) : the_post(); ?>
							<?php get_template_part('template-parts/content/content','page'); ?> 
					<?php 
						endwhile;
					else: 
						 get_template_part('template-parts/content/content','none'); 
					 endif; ?>
				</div>
				<!-- Pagination Start -->
				<div class="pagination-nav mx-auto">
				   <?php								
						// Previous/next page navigation.
						the_posts_pagination( array(
						'prev_text'          => '<i class="fa fa-chevron-left"></i>',
						'next_text'          => '<i class="fa fa-chevron-right"></i>',
						) ); 
					?>
				</div>
				<!-- Pagination End -->
			</div>
			<?php if($aravalli_blog_pg_layout == 'aravalli_rsb'): get_sidebar(); endif; ?>
		</div>
	</div>
</div>
	
<?php get_footer(); ?>
