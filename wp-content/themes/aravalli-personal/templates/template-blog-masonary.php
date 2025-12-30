<?php
/**
Template Name:  Blog Grid Masonary
**/

get_header();
$blog_pg_masonary_cat_id 	= get_theme_mod( 'blog_pg_masonary_cat_id'); 
?>
<div id="blog-grid-masonry" class="blog-section sec-default">
	<div class="container">
		<div class="row">
			<?php 
				$aravalli_paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				$args = array( 'post_type' => 'post', 'category__in' => $blog_pg_masonary_cat_id,'paged'=>$aravalli_paged );	
				$loop = new WP_Query( $args );
			?>
			<?php if( $loop->have_posts() ): ?>
			<?php while( $loop->have_posts() ): $loop->the_post(); ?>
			<div class="col-lg-4 load-item load-blog-masonry">
				<?php get_template_part('template-parts/content/content','page'); ?>
			</div>
			<?php 
					endwhile;
				endif;
			?>
		</div>
		<?php 
			$blog_pg_grid_load_btn 		= get_theme_mod( 'blog_pg_grid_load_btn','Load More'); 
			if(!empty($blog_pg_grid_load_btn)):
		?>
			<div class="row">
				<div class="col-12 load-more mb-5">
					<a href="javascript:void(0)" class="btn-shape btn-black load-btn">
						<span><i class="fa fa-spinner"></i></span><?php echo esc_html($blog_pg_grid_load_btn); ?>
					</a>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>

