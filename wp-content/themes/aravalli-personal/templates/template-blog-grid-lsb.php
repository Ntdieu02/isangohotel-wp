<?php
/**
Template Name:  Blog Grid Left Sidebar
**/

get_header();
?>
<div id="blog-grid-l-s" class="blog-section sec-default">
	<div class="container">
		<div class="row">
			<?php get_sidebar(); ?>
			<div id="ms-primary-content" class="col-lg-8 col-md-12 mb-5 mb-lg-0">
				<div class="side-grid d-flex flex-wrap">
					<?php 
						$aravalli_paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
						$args = array( 'post_type' => 'post','paged'=>$aravalli_paged );	
						$loop = new WP_Query( $args );
					?>
					<?php if( $loop->have_posts() ): ?>
					<?php while( $loop->have_posts() ): $loop->the_post(); ?>
						<?php get_template_part('template-parts/content/content','page'); ?>
					<?php 
							endwhile;
						endif;
					?>
				</div>
				<!-- Pagination Start -->
				<div class="pagination-nav mx-auto">
					<?php
					$GLOBALS['wp_query']->max_num_pages = $loop->max_num_pages;				
					// Previous/next page navigation.
					the_posts_pagination( array(
					'prev_text'			=> '<i class="fa fa-angle-double-left"></i>',
					'next_text'			=> '<i class="fa fa-angle-double-right"></i>',
					) ); ?>
				</div>
				<!-- Pagination End -->
			</div>            
		</div>
	</div>
</div>
<?php get_footer(); ?>

