<?php  
	$aravalli_pg_packages_ttl			= get_theme_mod('pg_packages_ttl',__('Explore','clever-fox')); 
	$aravalli_pg_packages_sub		= get_theme_mod('pg_packages_sub',__('Aravalli Packages','clever-fox'));
	$aravalli_pg_packages_desc		    = get_theme_mod('pg_packages_desc',__('Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book.','clever-fox'));
	$aravalli_pg_packages_column	= get_theme_mod('pg_packages_column','6');
	$aravalli_pg_packages_display_num	= get_theme_mod('pg_packages_display_num','4');
	$aravalli_pg_packages_category_id	= get_theme_mod('pg_packages_category_id');
	$aravalli_post_type = 'aravalli_packages';
	$aravalli_tax = 'packages_categories'; 
	$aravalli_tax_terms = get_terms($tax);
?>		
<section id="packages-offers" class="packages-offers pg-packages-offers">
        <div class="container">
           <?php if(!empty($aravalli_pg_packages_ttl) || !empty($aravalli_pg_packages_sub) || !empty($aravalli_pg_packages_desc)): ?>
				<div class="row">
					<div class="col-12">
						<div class="heading-default wow fadeInUp">
						
							<?php if(!empty($aravalli_pg_packages_ttl)): ?>
								<h6><?php echo wp_kses_post($aravalli_pg_packages_ttl); ?></h6>
							<?php endif; ?>	
							
							<?php if(!empty($aravalli_pg_packages_sub)): ?>
								<h3><?php echo wp_kses_post($aravalli_pg_packages_sub); ?><span class="line-circle"></span></h3>      
							<?php endif; ?>		
							
							<?php if(!empty($aravalli_pg_packages_desc)): ?>				
								<p> <?php echo esc_html($aravalli_pg_packages_desc); ?></p>
							<?php endif; ?>		
							
						</div>
					</div>
				</div>
			<?php endif; ?>	
            <div class="row">
				<?php 
					//$args = array( 'post_type' => 'aravalli_packages','posts_per_page' => $pg_packages_display_num);  
					$aravalli_args = array('post_type' => 'aravalli_packages','posts_per_page' => $aravalli_pg_packages_display_num,
						  // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
						  'tax_query' => array(
								array(
								  'taxonomy' => 'packages_categories',
								  'field' => 'slug',
								  'terms' => $aravalli_pg_packages_category_id,
								),
						  ),
						);
					$aravalli_room = new WP_Query( $aravalli_args ); 
					if( $aravalli_room->have_posts() )
					{
						while ( $aravalli_room->have_posts() ) : $aravalli_room->the_post();
						
						$aravalli_popular_badge = sanitize_text_field( get_post_meta( get_the_ID(),'popular_badge', true ));
						$aravalli_packages_ribbon_text = sanitize_text_field( get_post_meta( get_the_ID(),'packages_ribbon_text', true ));
						$aravalli_packages_price_badge 	= sanitize_text_field( get_post_meta( get_the_ID(),'packages_price_badge', true ));
						$aravalli_packages_price 		= sanitize_text_field( get_post_meta( get_the_ID(),'packages_price', true ));
						$aravalli_packages_button_link = sanitize_text_field( get_post_meta( get_the_ID(),'packages_button_link', true ));
						$aravalli_packages_button_link_target = sanitize_text_field( get_post_meta( get_the_ID(),'packages_button_link_target', true ));
						$aravalli_packages_star = sanitize_text_field( get_post_meta( get_the_ID(),'packages_star', true ));

					if($aravalli_packages_button_link) { 
						$aravalli_packages_button_link; 
					}	
					else { 
						$aravalli_packages_button_link = get_post_permalink(); 
					} 
					
					$aravalli_terms = get_the_terms( $post->ID, 'packages_categories' );
										
					if ( $aravalli_terms && ! is_wp_error( $aravalli_terms ) ) : 
						$aravalli_links = array();

						foreach ( $aravalli_terms as $aravalli_term ) 
						{
							$aravalli_links[] = $aravalli_term->slug;
						}
						
						$aravalli_tax = join( ' ', $aravalli_links );		
					else :	
						$aravalli_tax = '';	
					endif;
				?>
                <div class="col-lg-<?php echo esc_attr($aravalli_pg_packages_column); ?> col-md-6 mb-5">
                    <div class="packages-box">
                        <div class="thumbnail">
							<?php if ( has_post_thumbnail() ) {  ?>	
								<div class="packages-img"><?php the_post_thumbnail(); ?></div>
								<?php if (!empty($aravalli_popular_badge) ){  ?>
									<div class="corner-ribbon"><span class="banget banget-red"><?php echo esc_html($aravalli_popular_badge); ?></span></div>
								<?php } ?>
							<?php } ?>
							
							<?php if (!empty($aravalli_packages_ribbon_text) ){  ?>
								<div class="balloon-container"><span class="balloon balloon-theme"><?php echo esc_html($aravalli_packages_ribbon_text); ?></span></div>
							<?php } ?>
							
							<?php if (!empty($aravalli_packages_price_badge) ){  ?>
								<div class="price-bedge"> <?php echo esc_html($aravalli_packages_price_badge); ?></div>
							<?php } ?>
                        </div>
                        <div class="packages-panel">
                            <div class="packages-details">
                                <a href="<?php echo esc_url($aravalli_packages_button_link); ?>" <?php  if($aravalli_packages_button_link_target) { echo "target='_blank'"; } ?>><?php echo esc_html(the_title()); ?></a>
                                <i class="fa fa-heart"></i>
                            </div>
                            <div class="post-content-bottom">
								<?php if (!empty($aravalli_packages_star) ){  ?>
									<ul class="star-rating star-black">
										<?php for ($aravalli_i=1; $aravalli_i<=$aravalli_packages_star; $aravalli_i++) { ?>
											<li><i class="fa fa-star"></i></li>
										<?php } ?>
										<li><span class="review">/ <?php  echo esc_html($aravalli_packages_star); ?> <?php echo esc_html_e('Review','clever-fox'); ?></span></li>
									</ul>
								<?php } ?>
								
								<?php if (!empty($aravalli_packages_price) ){  ?>
                                <div class="comment-box">
                                    <span><?php echo esc_html_e('From','clever-fox'); ?></span>
                                    <strong><?php  echo esc_html($aravalli_packages_price); ?></strong>
                                </div>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>     
				<?php 	
					endwhile; 
					}
				?>
            </div>
        </div>
    </section>