<?php  
	$funfact_contents 			= get_theme_mod('funfact_contents',aravalli_get_funfact_default());
	$funfact_sec_column			= get_theme_mod('funfact_sec_column','3');
?>
<section id="fun-fact" class="fun-fact">
	<div class="container">
		<div class="row funfact-content wow fadeInUp">
			<?php
				if ( ! empty( $funfact_contents ) ) {
				$funfact_contents = json_decode( $funfact_contents );
				foreach ( $funfact_contents as $funfact_item ) {
					$title = ! empty( $funfact_item->title ) ? apply_filters( 'aravalli_translate_single_string', $funfact_item->title, 'Funfact section' ) : '';
					$subtitle = ! empty( $funfact_item->subtitle ) ? apply_filters( 'aravalli_translate_single_string', $funfact_item->subtitle, 'Funfact section' ) : '';
					$text = ! empty( $funfact_item->text ) ? apply_filters( 'aravalli_translate_single_string', $funfact_item->text, 'Funfact section' ) : '';
					$icon = ! empty( $funfact_item->icon_value ) ? apply_filters( 'aravalli_translate_single_string', $funfact_item->icon_value, 'Funfact section' ) : '';
					$image = ! empty( $funfact_item->image_url ) ? apply_filters( 'aravalli_translate_single_string', $funfact_item->image_url, 'Funfact section' ) : '';
			?>
			<div class="col-lg-<?php echo esc_attr($funfact_sec_column); ?> col-md-6 col-12 mb-4">
				<div class="fun-box">
					<?php if(!empty($image)): ?>
						<div class="nt-circle"><img src="<?php echo esc_url($image); ?>"></div>
					<?php else: ?>	
						<div class="nt-circle"><i class="fa <?php echo esc_attr($icon); ?>"></i></div>
					<?php endif; ?>	
					<div class="singlefact">  
					<?php if(!empty($title) || !empty($subtitle)): ?>
						<h2><span class="counter"><?php echo esc_html($title); ?></span><?php echo esc_html($subtitle); ?></h2>
					<?php endif; ?>		
					
					<?php if(!empty($text)): ?>	
						<p><?php echo esc_html($text); ?></p>
					<?php endif; ?>		
					</div>
				</div>
			</div>
			<?php } } ?>
		</div>
	</div>
</section>