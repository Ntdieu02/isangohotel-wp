<?php  
	$blog_title 		= get_theme_mod( 'blog_title','Explore'); 
	$blog_subtitle 		= get_theme_mod( 'blog_subtitle','Blogs'); 
	$blog_description 	= get_theme_mod( 'blog_description',"Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry's standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book."); 
	$blog_category_id 	= get_theme_mod( 'blog_category_id'); 
	$blog_column 		= get_theme_mod( 'blog_column','4'); 
	$blog_display_num 	= get_theme_mod( 'blog_display_num','3'); 			
?>		
<div id="blog-grid" class="blog-section sec-default home-blog">
	<div class="container">
		<?php if(!empty($blog_title) || !empty($blog_subtitle) || !empty($blog_description)): ?>
			<div class="row">
				<div class="col-12">
					<div class="heading-default wow fadeInUp">
					
						<?php if(!empty($blog_title)): ?>
							<h6><?php echo wp_kses_post($blog_title); ?></h6>
						<?php endif; ?>	
						
						<?php if(!empty($blog_subtitle)): ?>
							<h3><?php echo wp_kses_post($blog_subtitle); ?><span class="line-circle"></span></h3>      
						<?php endif; ?>		
						
						<?php if(!empty($blog_description)): ?>				
							<p> <?php echo esc_html($blog_description); ?></p>
						<?php endif; ?>		
						
					</div>
				</div>
			</div>
		<?php endif; ?>	
		<div class="row">
			<?php 	
				$args = array( 'post_type' => 'post', 'category__in' => $blog_category_id, 'posts_per_page' => $blog_display_num,'post__not_in'=>get_option("sticky_posts")) ; 	
					query_posts( $args );
					if(query_posts( $args ))
					{	
					while(have_posts()):the_post(); 
				?>
					<div class="col-lg-<?php echo esc_attr($blog_column); ?> col-md-6 col-12 load-item load-blog">
						<?php get_template_part('template-parts/content/content','page'); ?>
					</div>
			<?php 
				endwhile; 
				}
			?>
		</div>
	</div>
</div>