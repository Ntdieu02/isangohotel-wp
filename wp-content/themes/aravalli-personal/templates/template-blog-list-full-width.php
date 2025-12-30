<?php
/**
Template Name:  Blog List Full Width
**/

get_header();
?>
<div id="blog-full-width" class="blog-section sec-default">
	<div class="container">
		<div class="row">
			<?php 
				$aravalli_paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				$args = array( 'post_type' => 'post','paged'=>$aravalli_paged );	
				$loop = new WP_Query( $args );
			?>
			<?php if( $loop->have_posts() ): ?>
			<?php while( $loop->have_posts() ): $loop->the_post(); ?>
				<div class="col-lg-9 mx-lg-auto">
					<?php get_template_part('template-parts/content/content','page-list'); ?>
				</div>
			<?php 
					endwhile;
				endif;
			?>
			<!-- Pagination Start -->
			<div class="col-lg-12 pagination-nav mx-auto">
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
<?php get_footer(); ?>

