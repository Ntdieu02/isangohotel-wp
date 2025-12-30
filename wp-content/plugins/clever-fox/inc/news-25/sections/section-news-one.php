<?php
			
$news25_slider_category_id 			= get_theme_mod('slider_category_id','2');
$news25_middle_top_news_cats 	= get_theme_mod('middle_top_news_cats','2');
$news25_middle_top_news_title 	= get_theme_mod('middle_top_news_title','Top 10 News');
$news25_news_one_hs = get_theme_mod('news_one_hs','1');
if($news25_news_one_hs == '1'):
?>

<section class="latest-news-section st-py-default">
	<div class="container">
		<div class="row gy-3">
			<div class="col-12 col-sm-6 col-lg-3 order-lg-1 order-2 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
				<div class="news-slider owl-carousel">
				<?php 
				if(!empty($news25_slider_category_id)) {
					$news25_args_col_one = array( 'post_type' => 'post', 'category__in' => $news25_slider_category_id) ;
				} else {
					$news25_args_col_one = array( 'post_type' => 'post', 'category_name' => 'Uncategorized') ;
				}
					$news25_col_one = new WP_Query( $news25_args_col_one );
					if( $news25_col_one -> have_posts() )
					{	
					while( $news25_col_one->have_posts() ): $news25_col_one->the_post(); 
			?>
					<div class="news-item">
						<article class="post-card overlay-area">
							<figure class="post-thumbnail">
								<a class="img-block" href="javascript:void(0);">							 
								 <?php 
									 default_section_image('418'); ?>
								</a>
							</figure>
							<div class="post-content">
								<div class="inner-content">
									<h6 class="post-title">
										<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
									</h6>
									<span class="news-category">
										<?php the_category(' '); ?>									
									</span>
									<div class="post-meta">
										<ul>
											<li><i class="fa fa-hourglass-start"></i> <?php echo esc_html(news25_get_estimated_reading_time()); ?></li>
											<li class="sepa"></li>
											<li><i class="fa fa-eye"></i> <?php echo wp_kses_post(news25_get_post_views(get_the_ID())); ?>	</li>
											<li class="sepa"></li>
											<li><i class="fa fa-clock-o"></i> <?php echo wp_kses_post(human_time_diff(get_the_time('U'), current_time('timestamp'))) . esc_html__(' ago','clever-fox'); ?></li>
										</ul>
									</div>
								</div>
							</div>
						</article>
					</div>
				<?php endwhile; } 	?>				
				</div>
			</div>
			<div class="col-12 col-lg-6 order-lg-2 order-1 wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
				<div class="video-box">
				<?php 
					$news25_viral_video_url = get_theme_mod('slider_video_url','https://www.youtube.com/watch?v=bTqVqk7FSmY'); 
					$news25_video_id = get_theme_mod( 'slider_background_video' );
						
					news25_media_player_video($news25_viral_video_url, $news25_video_id); 
				?>
					<div class="video-box-footer">
						<h6><?php echo esc_html($news25_middle_top_news_title); ?></h6>
						<div class="owl-carousel news-slider">
						<?php 
							if(!empty($news25_middle_top_news_cats)) {
								$news25_col_two = array( 'post_type' => 'post', 'category__in' => $news25_middle_top_news_cats) ;
							} else {
								$news25_col_two = news25_empty_post_select_msg();					
							} 	
							$news25_col_two = new WP_Query( $news25_col_two );
							if( $news25_col_two -> have_posts() )
							{	
							while( $news25_col_two->have_posts() ): $news25_col_two->the_post();
						?>
						<p><a href="<?php the_permalink(); ?>"><?php the_title();?></a></p>
								<?php endwhile; } ?>
						</div>
					</div>
				</div>
			</div>
			<!-- Slider Right Tab Filter Section -->		
			<div class="col-12 col-sm-6 col-lg-3 order-3 wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
				<div class="popular-trending-sidebar">
					<div class="news-top-btn flex">
					<?php 
						$news25_slider_right_tab1_id = get_theme_mod('slider_right_tab1_id','Popular');
						$news25_slider_right_tab2_id = get_theme_mod('slider_right_tab2_id','Featured');					
					?>
						<button class="w-100 active" data-tab="All"><i class="fa fa-bolt"></i> <?php echo esc_html($news25_slider_right_tab1_id); ?></button>					
						<button class="w-100" data-tab="1"><i class="fa fa-fire"></i> <?php echo esc_html($news25_slider_right_tab2_id); ?></button>
					</div>
						
					<div id="popular-1" class="popular-trending-list p-2">
					<?php				
						$news25_slider_post_count = get_theme_mod('slider_post_count','3');
						
						if(!empty($news25_slider_right_tab1_id)) {
								$news25_col_three_one = array( 'post_type' => 'post', 'category_name' => $news25_slider_right_tab1_id,'posts_per_page' => $news25_slider_post_count) ;
							} else {
								$news25_col_three_one = news25_empty_post_select_msg();						
							} 	
							$news25_col_three_one = new WP_Query( $news25_col_three_one );
							if( $news25_col_three_one -> have_posts() ):	
							while( $news25_col_three_one->have_posts() ): $news25_col_three_one->the_post();
							
							$news25_format = get_post_format() ? : 'standard';?>
							<article class="post-list">
								<figure class="post-thumbnail">									
									<?php default_blog_image('90','90'); ?>
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
							
							<?php endwhile;
								wp_reset_postdata();
								endif; 
							?>
					</div>
					<div id="popular-2" class="popular-trending-list p-2 d-none">
						<?php
						
						if(!empty($news25_slider_right_tab2_id)) {
								$news25_col_three_two = array( 'post_type' => 'post', 'category_name' => $news25_slider_right_tab2_id,'posts_per_page' => $news25_slider_post_count) ;
							} else {
								$news25_col_three_two = news25_empty_post_select_msg();							
							} 	
							$news25_col_three_two = new WP_Query( $news25_col_three_two );
							if( $news25_col_three_two -> have_posts() ):	
							while( $news25_col_three_two->have_posts() ): $news25_col_three_two->the_post(); 
							$news25_format = get_post_format() ? : 'standard';
						?>
						<article class="post-list">
							<figure class="post-thumbnail">
								<?php default_blog_image('90','90'); ?>
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
						
						<?php endwhile;
							wp_reset_postdata();
						endif; 
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>