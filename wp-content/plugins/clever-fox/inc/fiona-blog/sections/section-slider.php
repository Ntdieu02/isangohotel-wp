<?php  
	if ( ! function_exists( 'fiona_blog_slider' ) ) :
	function fiona_blog_slider() {
	$fionablog_slider_hs 				= get_theme_mod('slider_hs','1');	
	$fionablog_slider_category_id 	= get_theme_mod('slider_category_id');
	if($fionablog_slider_hs == '1'){
?>	     
   <section id="slider-section" class="slider-wrapper section-9">
        <div class="main02 main-slider">
            <?php 	
				$fionablog_args = array( 'post_type' => 'post', 'category_name' => $fionablog_slider_category_id,'posts_per_page' => 3,'ignore_sticky_posts' => true) ; 	
					$fionablog_qry_one = new WP_Query( $fionablog_args );
					if($fionablog_qry_one->have_posts())
					{	
					while($fionablog_qry_one->have_posts()):$fionablog_qry_one->the_post(); 
					$fionablog_category = get_the_category();
					$fionablog_firstCategory = $fionablog_category[0]->cat_name;
?>
            <div class="item">
                 <?php do_action( 'fiona_blog_post_format_img_video' ); ?>
                <div class="theme-slider">
                    <div class="theme-table">
                        <div class="theme-table-cell">
                            <div class="av-container">                                
                                <div class="theme-content text-center">
                                	<ul class="post-categories"><li><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html($fionablog_firstCategory); ?></a></li></ul>
                                	<?php     
										if ( is_single() ) :
										
										the_title('<h1 class="post-title">', '</h1>' );
										
										else:
										
										the_title( sprintf( '<h1 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );
										
										endif; 
									?>
                                    <div class="author-sub-date">
										<span class="author-name">
											<?php  $fionablog_user = wp_get_current_user(); ?>
											<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>" title="Author: <?php esc_html(the_author()); ?>" class="author meta-info hide-on-mobile"> <span class="author-image" style="background-image: url('<?php echo esc_url( get_avatar_url( $fionablog_user->ID ) ); ?>');"></span><?php esc_html(the_author()); ?></a>
										</span>
										<span class="post-date">
											<a href="<?php echo esc_url(get_month_link(get_post_time('Y'),get_post_time('m'))); ?>"><span><?php echo esc_html(get_the_date('j')); ?></span> <?php echo esc_html(get_the_date('M'));  echo esc_html(get_the_date(' Y')); ?></a>
										</span>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
				endwhile; 
				}
			?>
        </div>
        <div class="controls slider-nav" id="customize-controls" aria-label="Carousel Navigation" tabindex="0">
	        <button type="button" class="prev" data-controls="prev" aria-controls="customize" tabindex="-1"><i class="fa fa-arrow-left"></i></button>
	        <button type="button" class="next" data-controls="next" aria-controls="customize" tabindex="-1"><i class="fa fa-arrow-right"></i></button>
	    </div>
		<div class="customize-tools">
          <ul class="main-slider-thumbnails" id="customize-thumbnails">
		  	<?php 	
				$fionablog_args = array( 'post_type' => 'post', 'category_name' => $fionablog_slider_category_id,'posts_per_page' => 3,'ignore_sticky_posts' => true) ; 	
					$fionablog_qry_two = new WP_Query( $fionablog_args );
					if($fionablog_qry_two->have_posts())
					{	
					while($fionablog_qry_two->have_posts()):$fionablog_qry_two->the_post(); 
					
			?>
            <li>
				<?php the_post_thumbnail(); ?>
            </li>
			<?php 
				endwhile; 
				}
			?>
          </ul>
		</div>
    </section>
<?php	
}} endif;
add_action('fiona_blog_slider', 'fiona_blog_slider');	