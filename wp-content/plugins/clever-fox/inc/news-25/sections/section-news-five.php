<?php 
	$news25_articles_title = get_theme_mod('articles_title','Trending');
	$news25_articles_subtitle = get_theme_mod('articles_subtitle','Articles');
	$news25_articles_hs = get_theme_mod('articles_hs','1');
	if($news25_articles_hs == '1'):
?>
<!--===// Start: Post Slider Section
=================================--> 
<section class="post-slider-section st-py-default">
	<div class="container">
		<div class="heading-default wow fadeInUp">
			<div class="title-container">
				<h5><?php echo esc_html($news25_articles_title);?></h5>
				<h5><?php echo esc_html($news25_articles_subtitle);?></h5>
			</div>
		</div>
		<div class="post-slider owl-carousel">
		<?php 
			$news25_articles_tab_category_id = get_theme_mod('articles_tab_category_id','5'); 
			$news25_news5_post_count = get_theme_mod('news5_post_count','6');
				// Get posts for main tile rows
				if(!empty($news25_articles_tab_category_id)) {
					$news25_main_args = array( 'post_type' => 'post', 'category__in' => $news25_articles_tab_category_id,'posts_per_page'=>$news25_news5_post_count) ;
				} else {
					$news25_main_args = array( 'post_type' => 'post', 'category_name' => 'Uncategorized') ;
				}
				$news25_main_query = new WP_Query($news25_main_args);
				$news25_format = get_post_format() ? : 'standard';
				if ($news25_main_query->have_posts()) {
					while ($news25_main_query->have_posts()) {
						$news25_main_query->the_post();
				?>
			<article class="post-list wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
				<figure class="post-thumbnail">
					<a class="img-block" href="javascript:void(0);">
						 <?php default_blog_image('90','90'); ?>
					</a>
					<!--<span class="count-badge"></span> -->
				</figure>
				<div class="post-content">
					<span class="category">
						<?php the_category(' ');?>
					</span>
					<h5 class="post-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title();?></a></h5>
					<div class="post-meta">
						<a href="<?php echo esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))); ?>" class="blog-date"><i class="fa fa-calendar"></i> <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date();?></time></a>
					</div>
				</div>
			</article>		
			<?php }} ?>
		</div>
	</div>
</section>
<?php  endif; ?>