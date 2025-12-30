<?php 
	$nexcraft_features_hs						= get_theme_mod('feature_hs','1');
	$nexcraft_features_title 			= get_theme_mod('features_title',__('Features','clever-fox'));
	$nexcraft_features_desc				= get_theme_mod('features_desc',__('Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur quisquam saepe eveniet, cumque tempore veritatis!','clever-fox')); 
	$nexcraft_features_contents			= get_theme_mod('features_contents',nexcraft_get_features_default());
	$nexcraft_features_sec_column		= get_theme_mod('features_sec_column','4'); 	
	if($nexcraft_features_hs=='1'){
?>	
	<!-- features -->
<section class="feature-section features-home">
    <div class="container">
		<?php if(!empty($nexcraft_features_title)  || !empty($nexcraft_features_subtitle) || !empty($nexcraft_features_desc)): ?>
			<div class="section-title col-lg-6 mx-auto">
					
				<?php if(!empty($nexcraft_features_title)): ?>
					<h2 class="maintitle">
						<svg xmlns="http://www.w3.org/2000/svg" width="54" height="27" viewBox="0 0 54 27" style="fill: var(--primary-color);" class="desg1"><path id="Rectangle_2_copy_3" data-name="Rectangle 2 copy 3" class="cls-1" d="M1156 147h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1A2 2 0 0 1 1156 147Zm7 0h5a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-5a2 2 0 0 1-2-2v-1A2 2 0 0 1 1163 147Zm3 13h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1A2 2 0 0 1 1166 160Zm7 0h8a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-8a2 2 0 0 1-2-2v-1A2 2 0 0 1 1173 160Zm-11.5 11a1.5 1.5 0 1 1-1.5 1.5A1.5 1.5 0 0 1 1161.5 171Zm4 0h3a1.5 1.5 0 0 1 0 3h-3A1.5 1.5 0 0 1 1165.5 171Zm7 0h7a1.5 1.5 0 0 1 0 3h-7A1.5 1.5 0 0 1 1172.5 171Zm16.5-11h17a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-17a2 2 0 0 1-2-2v-1A2 2 0 0 1 1189 160Z" transform="translate(-1154 -147)"/></svg>
						
							<span><?php echo wp_kses_post($nexcraft_features_title); ?></span>
						
						<svg xmlns="http://www.w3.org/2000/svg" width="54" height="27" viewBox="0 0 54 27" style="fill: var(--primary-color);"><path id="Rectangle_2_copy_3" data-name="Rectangle 2 copy 3" class="cls-1" d="M1156 147h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1A2 2 0 0 1 1156 147Zm7 0h5a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-5a2 2 0 0 1-2-2v-1A2 2 0 0 1 1163 147Zm3 13h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1A2 2 0 0 1 1166 160Zm7 0h8a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-8a2 2 0 0 1-2-2v-1A2 2 0 0 1 1173 160Zm-11.5 11a1.5 1.5 0 1 1-1.5 1.5A1.5 1.5 0 0 1 1161.5 171Zm4 0h3a1.5 1.5 0 0 1 0 3h-3A1.5 1.5 0 0 1 1165.5 171Zm7 0h7a1.5 1.5 0 0 1 0 3h-7A1.5 1.5 0 0 1 1172.5 171Zm16.5-11h17a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-17a2 2 0 0 1-2-2v-1A2 2 0 0 1 1189 160Z" transform="translate(-1154 -147)"/></svg>
					</h2>
				<?php endif; ?>
				
				<?php if(!empty($nexcraft_features_desc)): ?>
					<p>
						<?php echo wp_kses_post($nexcraft_features_desc); ?>
					</p>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		
        <div class="row">
			<?php
				if ( ! empty( $nexcraft_features_contents ) ) {
				$nexcraft_features_contents = json_decode( $nexcraft_features_contents );
				foreach ( $nexcraft_features_contents as $nexcraft_features_item ) {
					$nexcraft_repeater_title = ! empty( $nexcraft_features_item->title ) ? apply_filters( 'nexcraft_translate_single_string', $nexcraft_features_item->title, 'Features section' ) : '';
					$nexcraft_repeater_subtitle = ! empty( $nexcraft_features_item->subtitle ) ? apply_filters( 'nexcraft_translate_single_string', $nexcraft_features_item->subtitle, 'Features section' ) : '';
					$nexcraft_repeater_desc = ! empty( $nexcraft_features_item->text ) ? apply_filters( 'nexcraft_translate_single_string', $nexcraft_features_item->text, 'Features section' ) : '';
					$nexcraft_repeater_text2 = ! empty( $nexcraft_features_item->text2 ) ? apply_filters( 'nexcraft_translate_single_string', $nexcraft_features_item->text2, 'Features section' ) : '';
					$nexcraft_repeater_link = ! empty( $nexcraft_features_item->link ) ? apply_filters( 'nexcraft_translate_single_string', $nexcraft_features_item->link, 'Features section' ) : '';
					$nexcraft_repeater_image = ! empty( $nexcraft_features_item->image_url2 ) ? apply_filters( 'nexcraft_translate_single_string', $nexcraft_features_item->image_url2, 'Features section' ) : '';
					$nexcraft_repeater_icon = ! empty( $nexcraft_features_item->icon_value ) ? apply_filters( 'nexcraft_translate_single_string', $nexcraft_features_item->icon_value, 'Features section' ) : '';
					$nexcraft_repeater_choice = ! empty( $nexcraft_features_item->choice ) ? apply_filters( 'nexcraft_translate_single_string', $nexcraft_features_item->choice, 'Features section' ) : '';
			?>	
				<div class="col-lg-<?php echo esc_attr($nexcraft_features_sec_column); ?> col-sm-6">
					<div class="feature-item">
						<div class="feature-image"><img src="<?php echo esc_url($nexcraft_repeater_image); ?>" alt=""></div>
						<div class="content-area">
							<?php if(!empty($nexcraft_repeater_icon)): ?>
								<div class="icon">
									<i class="fa <?php echo esc_attr($nexcraft_repeater_icon); ?>"></i>
								</div>
							<?php endif; ?>
							<?php if(!empty($nexcraft_repeater_subtitle)): ?>
								<span><?php if($nexcraft_repeater_subtitle): echo esc_html($nexcraft_repeater_subtitle); endif; ?></span>
							<?php endif; ?>
							<div class="feature-body">
								<?php if(!empty($nexcraft_repeater_title)): ?>
									<h2><?php if($nexcraft_repeater_title): echo esc_html($nexcraft_repeater_title); endif; ?></h2>
								<?php endif; ?>
								
								<?php if(!empty($nexcraft_repeater_desc)): ?>
									<p><?php echo wp_kses_post($nexcraft_repeater_desc); ?></p>
								<?php endif; ?>
									<a href="<?php echo esc_url($nexcraft_repeater_link); ?>" class="main-btn"><span><?php echo esc_html($nexcraft_repeater_text2); ?></span> <i class="fas fa-angle-double-right"></i></a>
							</div>
						</div>	
					</div>
				</div>
            <?php } } ?>
        </div>
    </div>
</section>
<!-- features end -->
<?php } ?>