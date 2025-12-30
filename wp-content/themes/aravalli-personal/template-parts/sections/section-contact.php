<?php  
	$contact_pg_ct_ttl 		= get_theme_mod( 'contact_pg_ct_ttl','Let’s Talk'); 
	$contact_pg_ct_subttl 	= get_theme_mod( 'contact_pg_ct_subttl','Contact Us'); 
	$contact_pg_ct_desc 	= get_theme_mod( 'contact_pg_ct_desc','We are here when you need us.'); 
	$contact_pg_ct_contents 	= get_theme_mod( 'contact_pg_ct_contents',aravalli_get_contact_pg_info_default()); 
?>	
<section id="contact-section" class="contact-section">
	<div class="container">
		<?php if(!empty($contact_pg_ct_ttl) || !empty($contact_pg_ct_subttl) || !empty($contact_pg_ct_desc)): ?>
			<div class="row">
				<div class="col-12">
					<div class="heading-default">
						<?php if(!empty($contact_pg_ct_ttl)): ?>
							<h6><?php echo wp_kses_post($contact_pg_ct_ttl); ?></h6>
						<?php endif; ?>	
						
						<?php if(!empty($contact_pg_ct_subttl)): ?>
							<h3><?php echo wp_kses_post($contact_pg_ct_subttl); ?><span class="line-circle"></span></h3>      
						<?php endif; ?>		
						
						<?php if(!empty($contact_pg_ct_desc)): ?>				
							<p><?php echo esc_html($contact_pg_ct_desc); ?></p>
						<?php endif; ?>		
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="row contents">
			<?php
				if ( ! empty( $contact_pg_ct_contents ) ) {
				$contact_pg_ct_contents = json_decode( $contact_pg_ct_contents );
				foreach ( $contact_pg_ct_contents as $contact_item ) {
					$title = ! empty( $contact_item->title ) ? apply_filters( 'aravalli_translate_single_string', $contact_item->title, 'Contact section' ) : '';
					$subtitle = ! empty( $contact_item->subtitle ) ? apply_filters( 'aravalli_translate_single_string', $contact_item->subtitle, 'Contact section' ) : '';
					$text2 = ! empty( $contact_item->text2) ? apply_filters( 'aravalli_translate_single_string', $contact_item->text2,'Contact section' ) : '';
					$icon = ! empty( $contact_item->icon_value ) ? apply_filters( 'aravalli_translate_single_string', $contact_item->icon_value, 'Contact section' ) : '';
					$image = ! empty( $contact_item->image_url ) ? apply_filters( 'aravalli_translate_single_string', $contact_item->image_url, 'Contact section' ) : '';
			?>
			<div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
				<div class="infobox">
					<?php if(!empty($image)): ?>
						<div class="infobox-icon"><img src="<?php echo esc_url($image); ?>" /></div>
					<?php else: ?>	
						<div class="infobox-icon"><i class="fa <?php echo esc_attr($icon); ?>"></i></div>
					<?php endif; ?>	
					
					<?php if(!empty($title)): ?>
						<h3><?php echo wp_kses_post($title); ?></h3>
					<?php endif; ?>	
					
					<?php if(!empty($subtitle)): ?>
						<p><?php echo wp_kses_post($subtitle); ?></p>
					<?php endif; ?>	
					
					<?php if(!empty($text2)): ?>
						<p><?php echo wp_kses_post($text2); ?></p>
					<?php endif; ?>	
				</div>
			</div>
			<?php } } ?>
		</div>      
	</div>
</section>