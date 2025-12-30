<?php  
	$promotional_contents 	= get_theme_mod('promotional_contents',aravalli_get_promotional_default());
	$promotional_sec_column = get_theme_mod('promotional_sec_column','4');
?>	
 <section id="promostional-section" class="promostional sec-default wow fadeInUp">
	<div class="container">
		<div class="row promostional-wrapper">
			<?php
				if ( ! empty( $promotional_contents ) ) {
				$promotional_contents = json_decode( $promotional_contents );
				foreach ( $promotional_contents as $promotional_item ) {
					$title = ! empty( $promotional_item->title ) ? apply_filters( 'aravalli_translate_single_string', $promotional_item->title, 'Funfact section' ) : '';
					$subtitle = ! empty( $promotional_item->subtitle ) ? apply_filters( 'aravalli_translate_single_string', $promotional_item->subtitle, 'Funfact section' ) : '';
					$text = ! empty( $promotional_item->text ) ? apply_filters( 'aravalli_translate_single_string', $promotional_item->text, 'Funfact section' ) : '';
					$button = ! empty( $promotional_item->text2 ) ? apply_filters( 'aravalli_translate_single_string', $promotional_item->text2, 'Funfact section' ) : '';
					$link = ! empty( $promotional_item->link ) ? apply_filters( 'aravalli_translate_single_string', $promotional_item->link, 'Funfact section' ) : '';
					$image = ! empty( $promotional_item->image_url ) ? apply_filters( 'aravalli_translate_single_string', $promotional_item->image_url, 'Funfact section' ) : '';
			?>
				<div class="col-lg-<?php echo esc_attr($promotional_sec_column); ?> col-md-6 col-12 mb-2">
					<div class="promostional-item">
						<?php if(!empty($image)): ?>
							<img src="<?php echo esc_url($image); ?>">
						<?php endif; ?>	
						<div class="inner-text">
							<?php if(!empty($title) || !empty($subtitle)): ?>
								<h3><?php echo esc_html($title); ?><span><?php echo esc_html($subtitle); ?></span></h3>
							<?php endif; ?>		
							
							<?php if(!empty($text)): ?>	
								<p><?php echo esc_html($text); ?></p>
							<?php endif; ?>	
							
							<?php if(!empty($button)): ?>	
								<a href="<?php echo esc_url($link); ?>" class="btn-promo"><?php echo esc_html($button); ?></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php } } ?>
		</div>
	</div>
</section>