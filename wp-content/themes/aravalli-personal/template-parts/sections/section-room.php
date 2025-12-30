<?php  
	$room_title			= get_theme_mod('room_title','Explore'); 
	$room_subtitle		= get_theme_mod('room_subtitle','Rooms & Suits');
	$room_desc		    = get_theme_mod('room_desc',"Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry's standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book.");
	$room_display_num	= get_theme_mod('room_display_num','10');
	$room_sec_column	= get_theme_mod('room_sec_column','4');
	$post_type = 'aravalli_room';
	$tax = 'room_categories'; 
	$tax_terms = get_terms($tax);	
?>		
<section id="rooms-section" class="rooms_suits room-home sec-default">
	<div class="container">
		<?php if(!empty($room_title) || !empty($room_subtitle) || !empty($room_desc)): ?>
			<div class="row">
				<div class="col-12">
					<div class="heading-default wow fadeInUp">
					
						<?php if(!empty($room_title)): ?>
							<h6><?php echo wp_kses_post($room_title); ?></h6>
						<?php endif; ?>	
						
						<?php if(!empty($room_subtitle)): ?>
							<h3><?php echo wp_kses_post($room_subtitle); ?><span class="line-circle"></span></h3>      
						<?php endif; ?>		
						
						<?php if(!empty($room_desc)): ?>				
							<p> <?php echo esc_html($room_desc); ?></p>
						<?php endif; ?>		
						
					</div>
				</div>
			</div>
		<?php endif; ?>	
		<div class="row">
			<?php 
				$args = array( 'post_type' => 'aravalli_room','posts_per_page' => $room_display_num);  
				$room = new WP_Query( $args ); 
				if( $room->have_posts() )
				{
					while ( $room->have_posts() ) : $room->the_post();
					
					$terms = get_the_terms( $post->ID, 'room_categories' );
										
					if ( $terms && ! is_wp_error( $terms ) ) : 
						$links = array();

						foreach ( $terms as $term ) 
						{
							$links[] = $term->slug;
						}
						
						$tax = join( ' ', $links );		
					else :	
						$tax = '';	
					endif;
				?>
					<div class="col-md-6 col-lg-<?php echo esc_attr($room_sec_column); ?> mb-4">
						<?php get_template_part('template-parts/room/room','content'); ?>
					</div>
			<?php 	
			endwhile; 
			}
		?>
		</div>
	</div>
</section>