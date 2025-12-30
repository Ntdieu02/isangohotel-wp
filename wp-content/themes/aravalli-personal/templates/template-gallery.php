<?php 
/**
Template Name: Gallery Page
*/

get_header();
$pg_gallery_ttl 	= get_theme_mod( 'pg_gallery_ttl','Our'); 
$pg_gallery_sub 	= get_theme_mod( 'pg_gallery_sub','Gallery'); 
$pg_gallery_desc 	= get_theme_mod( 'pg_gallery_desc',"Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry's standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book."); 
$pg_gallery_content 	= get_theme_mod( 'pg_gallery_content',aravalli_get_gallery_default()); 
$pg_gallery_column 	= get_theme_mod( 'pg_gallery_column','4');
?>
<section id="gallery-page" class="gallery-page sec-default">
	<div class="container">
		<?php if(!empty($pg_gallery_ttl) || !empty($pg_gallery_sub) || !empty($pg_gallery_desc)): ?>
			<div class="row">
				<div class="col-12">
					<div class="heading-default wow fadeInUp">
					
						<?php if(!empty($pg_gallery_ttl)): ?>
							<h6><?php echo wp_kses_post($pg_gallery_ttl); ?></h6>
						<?php endif; ?>	
						
						<?php if(!empty($pg_gallery_sub)): ?>
							<h3><?php echo wp_kses_post($pg_gallery_sub); ?><span class="line-circle"></span></h3>      
						<?php endif; ?>		
						
						<?php if(!empty($pg_gallery_desc)): ?>				
							<p> <?php echo esc_html($pg_gallery_desc); ?></p>
						<?php endif; ?>		
						
					</div>
				</div>
			</div>
		<?php endif; ?>	
		<div class="row galleries">
			<?php
				if ( ! empty( $pg_gallery_content ) ) {
				$pg_gallery_content = json_decode( $pg_gallery_content );
				foreach ( $pg_gallery_content as $gallery_item ) {
					$title = ! empty( $gallery_item->title ) ? apply_filters( 'aravalli_translate_single_string', $gallery_item->title, 'Gallery section' ) : '';
					$text = ! empty( $gallery_item->text ) ? apply_filters( 'aravalli_translate_single_string', $gallery_item->text, 'Gallery section' ) : '';
					$image = ! empty( $gallery_item->image_url ) ? apply_filters( 'aravalli_translate_single_string', $gallery_item->image_url, 'Gallery section' ) : '';
			?>
				<div class="col-lg-<?php echo esc_attr($pg_gallery_column); ?> col-md-6 col-12">      	   <div class="gallery-item">
					<?php if ( ! empty( $image ) ) : ?>
						<a href="<?php echo esc_url( $image ); ?>" class="popup">
					<?php endif; ?>	
						<div class="single-item">
							<?php if ( ! empty( $image ) ) : ?>
								<img src="<?php echo esc_url( $image ); ?>" data-img-url="<?php echo esc_url( $image ); ?>"  alt="">
						   <?php endif; ?>
							<div class="gallery-text">
								<?php if ( ! empty( $title )) : ?>
									<h3><?php echo esc_html( $title ); ?></h3>
								<?php endif; ?>	
								
								<?php if ( ! empty( $text ) ) : ?>
									<p><?php echo esc_html( $text ); ?></p>
								<?php endif; ?>
							</div>
						</div>
						</a>
					</div>
				</div>
			<?php }} ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>