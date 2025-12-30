<?php 
	$news25_newsbreaking_news_ten_hs = get_theme_mod('news_ten_hs','1');
	$news25_newsbreaking_webstory_title = get_theme_mod('webstory_title','Web');
	$news25_newsbreaking_webstory_subtitle = get_theme_mod('webstory_subtitle','Stories');
	$news25_newsbreaking_webstory_tab_category_id = get_theme_mod('webstory_tab_category_id', array('6'));
	$news25_newsbreaking_news10_post_count = get_theme_mod('news10_post_count','4');

	if(!empty($news25_newsbreaking_webstory_tab_category_id)) {
		$news25_newsbreaking_args_col_one = array( 'category__in' => $news25_newsbreaking_webstory_tab_category_id,'posts_per_page'=>$news25_newsbreaking_news10_post_count, 'post_status' => 'publish') ;
	} else {
	$news25_newsbreaking_args_col_one = array( 'category_name' => 'Uncategorized') ;
	}
	$news25_newsbreaking_args_col_one = new WP_Query( $news25_newsbreaking_args_col_one );
	$news25_newsbreaking_post_count = $news25_newsbreaking_args_col_one->found_posts;
	
	if($news25_newsbreaking_news_ten_hs == '1' ) :
?>
<section class="web-store-section st-py-default">
	<div class="heading-default wow fadeInUp">
		<div class="title-container">
			<h5><?php echo esc_html($news25_newsbreaking_webstory_title);?></h5>
			<h5><?php echo esc_html($news25_newsbreaking_webstory_subtitle);?></h5>
		</div>
		<?php if($news25_newsbreaking_news10_post_count > 1) { ?>
		<div class="custom-owl-nav">
			<button type="button" class="custom-prev"><i class="fa fa-chevron-left"></i></button>
			<button type="button" class="custom-next"><i class="fa fa-chevron-right"></i></button>
		</div>
		<?php } ?>
	</div>
	<div class="slider-wrapper">
		<div class="web-store-slider owl-carousel">
		<?php 
			
			if( $news25_newsbreaking_args_col_one -> have_posts() ) :	
			while( $news25_newsbreaking_args_col_one->have_posts() ): $news25_newsbreaking_args_col_one->the_post();
			?>
			<div class="web-item wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
				<div class="web-store-img overlay-area">
					<?php default_section_image(''); ?>
				</div>
				<div class="inner-content">
					<h6 class="title">
						<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
					</h6>
					<div class="time"><a href="<?php echo esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))); ?>" class="blog-date"><i class="fa fa-calendar"></i> <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date();?></time></a></div>
				</div>
			</div>
			<?php endwhile; wp_reset_postdata();  endif; ?>
		</div>
	</div>
</section>
<?php endif; ?>