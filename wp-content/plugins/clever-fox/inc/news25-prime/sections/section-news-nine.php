<?php
	$news25_news25prime_news_nine_hs = get_theme_mod('news_nine_hs','1');
	$news25_news25prime_editor_title = get_theme_mod('editor_title','Editor');
	$news25_news25prime_editor_subtitle = get_theme_mod('editor_subtitle','Choice');
	$news25_news25prime_editor_tab_category_id = get_theme_mod('editor_tab_category_id', array('6'));
	$news25_news25prime_news9_post_count = get_theme_mod('news9_post_count','4');
	if(!empty($news25_news25prime_editor_tab_category_id)) {
		$news25_news25prime_args_col_one = array( 'category__in' => $news25_news25prime_editor_tab_category_id,'posts_per_page'=>$news25_news25prime_news9_post_count, 'post_status' => 'publish') ;
	} else {
		$news25_news25prime_args_col_one = array( 'category_name' => 'Uncategorized') ;
	}
	$news25_news25prime_args_col_one = new WP_Query( $news25_news25prime_args_col_one );
	$news25_news25prime_post_count = $news25_news25prime_args_col_one->found_posts;
	
	if($news25_news25prime_news_nine_hs == '1' ) :
?>
<section class="editors-section st-py-default">
	<div class="heading-default wow fadeInUp">
		<div class="title-container">
			<h5><?php echo esc_html($news25_news25prime_editor_title); ?></h5>
			<h5><?php echo esc_html($news25_news25prime_editor_subtitle); ?></h5>
		</div>
		<?php if($news25_news25prime_news9_post_count > 1) { ?>
		<div class="custom-owl-nav">
			<button type="button" class="custom-prev"><i class="fa fa-chevron-left"></i></button>
			<button type="button" class="custom-next"><i class="fa fa-chevron-right"></i></button>
		</div>
		<?php } ?>
	</div>
	<div class="slider-wrapper">
		<div class="editorz-slider owl-carousel">
			<?php 				
				if( $news25_news25prime_args_col_one -> have_posts() ) {	
				while( $news25_news25prime_args_col_one->have_posts() ): $news25_news25prime_args_col_one->the_post(); ?>
			
				<article class="post-card overlay-area">
					<figure class="post-thumbnail">
						<a class="img-block" href="javascript:void(0);">
						<?php default_section_image('301'); ?>
						</a>
					</figure>
					<div class="post-content">
						<div class="inner-content">
							<h5 class="post-title">
								<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
							</h5>
							<span class="news-category">
								<?php the_category(' '); ?>
							</span>
							<div class="post-meta">
								<ul>
										<li><i class="fa fa-hourglass-start"></i> <?php echo wp_kses_post(news25_get_estimated_reading_time()); ?></li>
										<li class="sepa"></li>
										<li><i class="fa fa-eye"></i> <?php echo wp_kses_post(news25_get_post_views(get_the_ID())); ?></li>
										<li class="sepa"></li>
										<li><i class="fa fa-clock-o"></i> <?php echo wp_kses_post(human_time_diff(get_the_time('U'), current_time('timestamp')) . __(' ago','clever-fox')); ?></li>
									</ul>
							</div>
						</div>
					</div>
				</article>
			<?php endwhile; wp_reset_postdata(); } ?>
		</div>
	</div>
</section>
<?php endif; ?>