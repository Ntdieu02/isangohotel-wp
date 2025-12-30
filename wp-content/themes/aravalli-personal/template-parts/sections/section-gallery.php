<?php  
	$gallery_content 	= get_theme_mod('gallery_content',aravalli_get_gallery_default());
	$gallery_column		= get_theme_mod('gallery_column','5'); 
?>	
<section id="gallery-section" class="our-gallery wow fadeInUp homepage">
	<div class="row">
	   <div class="col-lg-12">
			<div class="galleries">
				<?php
					if ( ! empty( $gallery_content ) ) {
					$gallery_content = json_decode( $gallery_content );
					foreach ( $gallery_content as $gallery_item ) {
						$title = ! empty( $gallery_item->title ) ? apply_filters( 'aravalli_translate_single_string', $gallery_item->title, 'Gallery section' ) : '';
						$text = ! empty( $gallery_item->text ) ? apply_filters( 'aravalli_translate_single_string', $gallery_item->text, 'Gallery section' ) : '';
						$image = ! empty( $gallery_item->image_url ) ? apply_filters( 'aravalli_translate_single_string', $gallery_item->image_url, 'Gallery section' ) : '';
				?>
					<div class="gallery-item gallery-item-lg-<?php echo esc_attr($gallery_column); ?> gallery-item-md-2 gallery-item-1">       
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
				<?php }} ?>
			</div>
	   </div>
	</div>
</section>