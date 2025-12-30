<?php  
	if ( ! function_exists( 'fiona_blog_lite_weekend_top' ) ) :
	function fiona_blog_lite_weekend_top() {
	$fionablog_section7_hs 				= get_theme_mod('section7_hs','1');	
	$fionablog_section7_category_id 		= get_theme_mod('section7_category_id');
	$fionablog_section7_title				= get_theme_mod('section7_title',__('Weekend Top','clever-fox')); 
	$fionablog_section7_display_num		= get_theme_mod('section7_display_num','4');
	if($fionablog_section7_hs == '1'){
?>	

<!--===// Start: Section 2 
=================================-->
<div id="section-7" class="post-section post-shadow av-py-default home-blog">
	<?php if(!empty($fionablog_section7_title)):?>
		<div class="av-columns-area wow fadeInUp">
			<div class="av-column-12 mb-5">
				<div class="heading-default wow fadeInUp">
					<h3><?php echo esc_html($fionablog_section7_title); ?></h3>
				</div>
			</div>
		</div>
	<?php endif; ?>	
    <div class="av-columns-area wow fadeInUp">
    	<?php
			$fionablog_fiona_blog_blog_args = array( 'post_type' => 'post', 'orderby' => 'date', 'order' => 'ASC','category_name' => $fionablog_section7_category_id,'posts_per_page' => $fionablog_section7_display_num,'ignore_sticky_posts' => true); 	
			$fionablog_fiona_blog_wp_query = new WP_Query($fionablog_fiona_blog_blog_args);
			if($fionablog_fiona_blog_wp_query)
			{	
			while($fionablog_fiona_blog_wp_query->have_posts()):$fionablog_fiona_blog_wp_query->the_post();
			$fionablog_post_id = get_the_ID();
			$fionablog_format = get_post_format() ? : 'standard';
			$fionablog_post_number= $fionablog_fiona_blog_wp_query->current_post + 1;
		?>
		<div class="av-column-3 mb-6">
			<article id="post-<?php the_ID(); ?>" <?php post_class('post-weekend'); ?>>
				<?php if ( has_post_thumbnail() || $fionablog_format == 'video' ) : ?>
				<figure class="post-image-figure">
					<div class="post-image">
						<?php do_action( 'fiona_blog_post_format_img_video' ); ?>
					</div>
					<span class="post-format">
						<div class="post-shape">
							<div class="post-icon">
						   		<?php echo esc_html($fionablog_post_number); ?>
						   </div>
						</div>
					</span>
				</figure>
				<?php endif; ?>
				<?php if ( ! has_post_thumbnail() && $fionablog_format !== 'video') : ?>
				<div class="post-content post-padding">
				<?php else : ?>
				<div class="post-content">
				<?php endif; ?>
				<div class="post-meta">								
					<span class="post-list">
						<ul class="post-categories">
							<li><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_category(', '); ?></a></li>
						</ul>
					</span>
					<?php if ( ! has_post_thumbnail() && $fionablog_format !== 'video') : ?>
					<span class="post-format">
						<div class="post-shape">
							<div class="post-icon">
						   		<?php echo esc_html($fionablog_post_number); ?>
						   </div>
						</div>
					</span>
					<?php endif; ?>
				</div>
				<?php
					//title
					if ( is_single() ) :
										
					the_title('<h1 class="post-title">', '</h1>' );
					
					else:
					
					the_title( sprintf( '<h1 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );
					
					endif; 
							
					//content
					do_action( 'fiona_blog_post_format_img_video_content' );
				?>
			</article>
		</div>
		<?php endwhile;	} wp_reset_postdata(); ?>
    </div>
</div>
<?php
}}
endif;
if ( function_exists( 'fiona_blog_lite_weekend_top' ) ) {
$cleverfox_section_priority = apply_filters( 'fiona_blog_section_priority', 11, 'fiona_blog_lite_weekend_top' );
add_action( 'fiona_blog_sections', 'fiona_blog_lite_weekend_top', absint( $cleverfox_section_priority ) );
}
	