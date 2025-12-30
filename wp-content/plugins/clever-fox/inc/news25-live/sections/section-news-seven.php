<?php	
	$news25_fashion_title 				= get_theme_mod('fashion_title','Latest');
	$news25_fashion_subtitle 			= get_theme_mod('fashion_subtitle','Fashion');
	$news25_fashion_tab_category_id 	= get_theme_mod('fashion_tab_category_id');
	$news25_fashion_tab_category_id2 	= get_theme_mod('fashion_tab_category_id2');
	$news25_news7_post_count 			= get_theme_mod('news7_post_count','1');
	if(!empty($news25_fashion_tab_category_id2)) {
		$news25_args_col_two = array( 'category__in' => $news25_fashion_tab_category_id2,'posts_per_page' => -1, 'post_status' => 'publish') ;
	} else {
		$news25_args_col_two = array( 'category_name' => 'Uncategorized') ;
	}
	$news25_args_col_two = new WP_Query( $news25_args_col_two );
	$news25_post_count = $news25_args_col_two->found_posts;
	$news25_news_seven_hs = get_theme_mod('news_seven_hs','1');
	if($news25_news_seven_hs == '1'):
?>
<section class="latest-fashion-section st-py-default">
	<div class="heading-default wow fadeInUp">
		<div class="title-container">
			<h5><?php echo esc_html($news25_fashion_title); ?></h5>
			<h5><?php echo esc_html($news25_fashion_subtitle); ?></h5>
		</div>
		<?php if($news25_post_count > $news25_news7_post_count) { ?>
		<div class="custom-owl-nav">
			<button type="button" class="custom-prev"><i class="fa fa-chevron-down"></i></button>
			<button type="button" class="custom-next"><i class="fa fa-chevron-up"></i></button>
		</div>
		<?php } ?>
	</div>
	<div class="vertical-wrapper row gy-3">
		<div class="col-sm-6 col-12 wow fadeInUp">
			<div class="news-slider owl-carousel">
			<?php 				
				if(!empty($news25_fashion_tab_category_id)) {
						$news25_args_col_one = array( 'category__in' => $news25_fashion_tab_category_id,'posts_per_page' => -1, 'post_status' => 'publish') ;
					} else {
						$news25_args_col_one = array( 'category_name' => 'Uncategorized') ;
					}
					$news25_args_col_one = new WP_Query( $news25_args_col_one );
					if( $news25_args_col_one -> have_posts() ){	
					while( $news25_args_col_one->have_posts() ): $news25_args_col_one->the_post();
				?>
				<div class="news-item">
					<article class="post-card overlay-area">
						<figure class="post-thumbnail">
							<a class="img-block" href="javascript:void(0);">
								<?php default_section_image('624'); ?>
							</a>
						</figure>
						<div class="post-content">
							<div class="inner-content">
								<h5 class="post-title">
									<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
								</h5>
								<span class="news-category">
									<?php the_category(' ');?>
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
				</div>
				<?php 
			endwhile; 
			}
		?>
			</div>
		</div>
		<div class="col-sm-6 col-12">
			<div class="post-list-vertical" data-items="<?php echo esc_attr($news25_news7_post_count); ?>">
			<?php				
				if( $news25_args_col_two -> have_posts() ){	
				while( $news25_args_col_two->have_posts() ): $news25_args_col_two->the_post();
			?>
					<article class="post-card overlay-area">
						<figure class="post-thumbnail">
							<a class="img-block" href="<?php the_permalink(); ?>">
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
	</div>
</section>
<?php endif; ?>