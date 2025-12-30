<?php 
/**
Template Name: Room simple 4 Column
*/

get_header();
$pg_room_ttl 	= get_theme_mod( 'pg_room_ttl','Explore'); 
$pg_room_sub 	= get_theme_mod( 'pg_room_sub','Rooms & Suits'); 
$pg_room_desc 	= get_theme_mod( 'pg_room_desc',"Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry's standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book."); 
?>
<section id="rooms_suits_inner" class="rooms_suits_inner sec-default room-page">
	<div class="container">
		<?php if(!empty($pg_room_ttl) || !empty($pg_room_sub) || !empty($pg_room_desc)): ?>
			<div class="row">
				<div class="col-12">
					<div class="heading-default wow fadeInUp">
					
						<?php if(!empty($pg_room_ttl)): ?>
							<h6><?php echo wp_kses_post($pg_room_ttl); ?></h6>
						<?php endif; ?>	
						
						<?php if(!empty($pg_room_sub)): ?>
							<h3><?php echo wp_kses_post($pg_room_sub); ?><span class="line-circle"></span></h3>      
						<?php endif; ?>		
						
						<?php if(!empty($pg_room_desc)): ?>				
							<p> <?php echo esc_html($pg_room_desc); ?></p>
						<?php endif; ?>		
						
					</div>
				</div>
			</div>
		<?php endif; ?>	
		<div class="row">
			<?php 
				$args = array( 'post_type' => 'aravalli_room','posts_per_page' =>100);  
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
				<div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
					<?php get_template_part('template-parts/room/room','content'); ?>
				</div>
			<?php 	
			endwhile; 
			}
		  ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>