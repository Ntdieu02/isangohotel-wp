<?php  
	$nexcraft_client_hs			= get_theme_mod('client_hs','1');
	$nexcraft_client_title			= get_theme_mod('client_title',__('Sponsor','clever-fox'));
	$nexcraft_client_description	= get_theme_mod('client_description',__('Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur quisquam saepe eveniet, cumque tempore veritatis!','clever-fox'));
	$nexcraft_client_contents		= get_theme_mod('client_contents',nexcraft_get_client_default());
	if($nexcraft_client_hs == '1'){
?>
	<!-- sponsors -->
<section class="sponsor-section pb-0">
    <div class="container">
		<?php if(!empty($nexcraft_client_title)  || !empty($nexcraft_client_description)): ?>
			<div class="section-title col-lg-6 mx-auto">
				<?php if(!empty($nexcraft_client_title)): ?>
				<h2 class="maintitle">
						<svg xmlns="http://www.w3.org/2000/svg" width="54" height="27" viewBox="0 0 54 27" style="fill: var(--primary-color);" class="desg1"><path id="Rectangle_2_copy_3" data-name="Rectangle 2 copy 3" class="cls-1" d="M1156 147h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1A2 2 0 0 1 1156 147Zm7 0h5a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-5a2 2 0 0 1-2-2v-1A2 2 0 0 1 1163 147Zm3 13h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1A2 2 0 0 1 1166 160Zm7 0h8a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-8a2 2 0 0 1-2-2v-1A2 2 0 0 1 1173 160Zm-11.5 11a1.5 1.5 0 1 1-1.5 1.5A1.5 1.5 0 0 1 1161.5 171Zm4 0h3a1.5 1.5 0 0 1 0 3h-3A1.5 1.5 0 0 1 1165.5 171Zm7 0h7a1.5 1.5 0 0 1 0 3h-7A1.5 1.5 0 0 1 1172.5 171Zm16.5-11h17a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-17a2 2 0 0 1-2-2v-1A2 2 0 0 1 1189 160Z" transform="translate(-1154 -147)"/></svg>
						
							<span><?php echo wp_kses_post($nexcraft_client_title); ?></span>
						
						<svg xmlns="http://www.w3.org/2000/svg" width="54" height="27" viewBox="0 0 54 27" style="fill: var(--primary-color);"><path id="Rectangle_2_copy_3" data-name="Rectangle 2 copy 3" class="cls-1" d="M1156 147h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1A2 2 0 0 1 1156 147Zm7 0h5a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-5a2 2 0 0 1-2-2v-1A2 2 0 0 1 1163 147Zm3 13h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1A2 2 0 0 1 1166 160Zm7 0h8a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-8a2 2 0 0 1-2-2v-1A2 2 0 0 1 1173 160Zm-11.5 11a1.5 1.5 0 1 1-1.5 1.5A1.5 1.5 0 0 1 1161.5 171Zm4 0h3a1.5 1.5 0 0 1 0 3h-3A1.5 1.5 0 0 1 1165.5 171Zm7 0h7a1.5 1.5 0 0 1 0 3h-7A1.5 1.5 0 0 1 1172.5 171Zm16.5-11h17a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-17a2 2 0 0 1-2-2v-1A2 2 0 0 1 1189 160Z" transform="translate(-1154 -147)"/></svg>
					</h2>
					
				<?php endif; ?>
				
				<?php if(!empty($nexcraft_client_description)): ?>
					<p>
						<?php if($nexcraft_client_description): echo esc_html($nexcraft_client_description); endif; ?>
					</p>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		
		<div class="row">				
	
			<?php
				if ( ! empty( $nexcraft_client_contents ) ) {
				$nexcraft_client_contents = json_decode( $nexcraft_client_contents );
			
				foreach ( $nexcraft_client_contents as $nexcraft_client_item ) {
					$nexcraft_repeater_link = ! empty( $nexcraft_client_item->link ) ? apply_filters( 'nexcraft_pro_translate_single_string', $nexcraft_client_item->link, 'Client section' ) : '';
					$nexcraft_repeater_image = ! empty( $nexcraft_client_item->image_url ) ? apply_filters( 'nexcraft_pro_translate_single_string', $nexcraft_client_item->image_url, 'Client section' ) : '';
					
				if(!empty($nexcraft_repeater_image) || !empty($nexcraft_repeater_link)):
			?>
				<div class="col-lg-3 col-6">
					<div class="sponsor">
						 <div class="sponsor-image">
							<a href="<?php echo esc_url($nexcraft_repeater_link); ?>">
								<img src="<?php echo esc_url($nexcraft_repeater_image); ?>" alt="<?php echo esc_attr__('Clients Image','clever-fox'); ?>">
							</a>
						</div>
					</div>
				</div>
				
			<?php endif; } } ?>
		</div>
    </div>
</section>
<?php } ?>
<!-- sponsors end -->