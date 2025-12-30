<?php
$pg_about_amenities_ttl 			= get_theme_mod( 'pg_about_amenities_ttl','Hotel'); 
$pg_about_amenities_sub 			= get_theme_mod( 'pg_about_amenities_sub','Amenities'); 
$pg_about_amenities_desc 			= get_theme_mod( 'pg_about_amenities_desc',"Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry's standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book."); 
$pg_about_amenities_content 		= get_theme_mod( 'pg_about_amenities_content',aravalli_get_amenities_default());
$pg_about_amenities_bg_img 			= get_theme_mod( 'pg_about_amenities_bg_img',esc_url(get_template_directory_uri() .'/assets/images/about/amenities-bg.jpg'));
$pg_about_amenities_back_attach 	= get_theme_mod( 'pg_about_amenities_back_attach','scroll');
?>
<section id="amenities" class="amenities" style="background-image:url('<?php echo esc_url($pg_about_amenities_bg_img); ?>');background-attachment:<?php echo esc_attr($pg_about_amenities_back_attach); ?>">
	<div class="container">
		<?php if(!empty($pg_about_amenities_ttl) || !empty($pg_about_amenities_sub) || !empty($pg_about_amenities_desc)): ?>
			<div class="row">
				<div class="col-12">
					<div class="heading-default wow fadeInUp">
					
						<?php if(!empty($pg_about_amenities_ttl)): ?>
							<h6><?php echo wp_kses_post($pg_about_amenities_ttl); ?></h6>
						<?php endif; ?>	
						
						<?php if(!empty($pg_about_amenities_sub)): ?>
							<h3><?php echo wp_kses_post($pg_about_amenities_sub); ?><span class="line-circle"></span></h3>      
						<?php endif; ?>		
						
						<?php if(!empty($pg_about_amenities_desc)): ?>				
							<p> <?php echo esc_html($pg_about_amenities_desc); ?></p>
						<?php endif; ?>		
						
					</div>
				</div>
			</div>
		<?php endif; ?>	
		<div class="row">
			<div class="col-12">
				<div class="d-flex flex-wrap amenities-content">
					<?php
						if ( ! empty( $pg_about_amenities_content ) ) {
						$pg_about_amenities_content = json_decode( $pg_about_amenities_content );
						foreach ( $pg_about_amenities_content as  $amenities_item ) {
							$title = ! empty( $amenities_item->title ) ? apply_filters( 'aravalli_translate_single_string', $amenities_item->title, 'Amenities section' ) : '';
							$link = ! empty( $amenities_item->link ) ? apply_filters( 'aravalli_translate_single_string', $amenities_item->link, 'Amenities section' ) : '';
							$icon = ! empty( $amenities_item->icon_value ) ? apply_filters( 'aravalli_translate_single_string', $amenities_item->icon_value, 'Amenities section' ) : '';
					?>
					<div class="amenities-item"><i class="fa <?php echo esc_attr($icon); ?>"></i> <a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></div>
					<?php } } ?>
				</div>
			</div>
		</div>
	</div>
</section>