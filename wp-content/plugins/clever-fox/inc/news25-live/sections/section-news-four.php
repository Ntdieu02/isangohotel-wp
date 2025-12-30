<?php
$news25_business_title = get_theme_mod('business_title','Business');
$news25_business_subtitle = get_theme_mod('business_subtitle','News');
$news25_news4_post_count = get_theme_mod('news4_post_count','4');
$news25_business_tab_category_id = get_theme_mod('business_tab_category_id',array('6','5'));				
if(!empty($news25_business_tab_category_id)) {
	$news25_args_col_two = array( 'category__in' => $news25_business_tab_category_id, 'posts_per_page' => -1, 'post_status' => 'publish') ;
} else {
	$news25_args_col_two = array( 'category_name' => 'Uncategorized') ;
}
$news25_args_col_two = new WP_Query( $news25_args_col_two );
$news25_post_count = $news25_args_col_two->found_posts;
?>

<!--===// Start: Business News Section -->
<section class="business-news-section st-py-default filter-group">
	<div class="container">
		<div class="heading-default wow fadeInUp">
			<div class="title-container">
				<h5><?php echo esc_html($news25_business_title); ?></h5>
				<h5><?php echo esc_html($news25_business_subtitle); ?></h5>
			</div>
			<?php if($news25_post_count > $news25_news4_post_count) { ?>
				<div class="custom-owl-nav">
					<button type="button" class="custom-prev"><i class="fa fa-chevron-down"></i></button>
					<button type="button" class="custom-next"><i class="fa fa-chevron-up"></i></button>
				</div>
			<?php } ?>
		</div>

		<div class="vertical-wrapper row gy-3">
			<!-- Left Column (Big Posts) -->
			<div class="col-md-8 col-12 wow fadeInUp">
				<?php 
				$news25_viral_video_url = get_theme_mod('business_video_url','https://www.youtube.com/watch?v=bTqVqk7FSmY'); 
				$news25_video_id = get_theme_mod( 'business_background_video' );
				?>
				<article class="post-card overlay-area">
					<figure class="post-thumbnail">
						<div class="plyrMasterVideo btn66">
							<?php news25_media_player_video($news25_viral_video_url, $news25_video_id); ?>
						</div>
					</figure>                                
				 </article>
			</div>

			<!-- Right Column (List Posts) -->
			<div class="col-md-4 col-12">
				<div class="post-list-vertical" data-items="<?php echo esc_attr($news25_news4_post_count); ?>">
					<?php	
					
					if( $news25_args_col_two -> have_posts() ){	
					while( $news25_args_col_two->have_posts() ){
					$news25_args_col_two->the_post(); 
					$news25_format = get_post_format() ? : 'standard';								
					?>
						<article class="post-list">
							<figure class="post-thumbnail">
								<a class="img-block" href="<?php the_permalink(); ?>">
									<?php default_blog_image('90','90'); ?>
								</a>
							</figure>
							<div class="post-content">
								<span class="category"><?php the_category(' '); ?></span>
								<h5 class="post-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title();?></a></h5>
								<div class="post-meta">
									<a href="<?php echo esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))); ?>" class="blog-date"><i class="fa fa-calendar"></i> <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date();?></time></a>
								</div>
							</div>
						</article>
					<?php }
						wp_reset_postdata();
					} ?>
				</div>
			</div>
		</div>
    </div>
</section>
<!--===// End: Business News Section -->
