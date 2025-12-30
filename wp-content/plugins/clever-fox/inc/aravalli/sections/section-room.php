<?php  
	if ( ! function_exists( 'cleverfox_aravalli_lite_room' ) ) :
	function cleverfox_aravalli_lite_room() {
	$aravalli_room_hs			= get_theme_mod('room_hs','1'); 
	$aravalli_room_title			= get_theme_mod('room_title',__('Explore','clever-fox')); 
	$aravalli_room_subtitle		= get_theme_mod('room_subtitle',__('Rooms & Suits','clever-fox'));
	$aravalli_room_desc		    = get_theme_mod('room_desc',__('Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book.','clever-fox'));
	$aravalli_room_contents		= get_theme_mod('room_contents',aravalli_get_room_default());
	if($aravalli_room_hs == '1'){	
?>		
<section id="rooms-section" class="rooms_suits room-home sec-default">
	<div class="container">
		<?php if(!empty($aravalli_room_title) || !empty($aravalli_room_subtitle) || !empty($aravalli_room_desc)): ?>
			<div class="row">
				<div class="col-12">
					<div class="heading-default wow fadeInUp">
					
						<?php if(!empty($aravalli_room_title)): ?>
							<h6><?php echo wp_kses_post($aravalli_room_title); ?></h6>
						<?php endif; ?>	
						
						<?php if(!empty($aravalli_room_subtitle)): ?>
							<h3><?php echo wp_kses_post($aravalli_room_subtitle); ?><span class="line-circle"></span></h3>      
						<?php endif; ?>		
						
						<?php if(!empty($aravalli_room_desc)): ?>				
							<p> <?php echo esc_html($aravalli_room_desc); ?></p>
						<?php endif; ?>		
						
					</div>
				</div>
			</div>
		<?php endif; ?>	
		<div class="row">
			<?php
				if ( ! empty( $aravalli_room_contents ) ) {
				$aravalli_room_contents = json_decode( $aravalli_room_contents );
				foreach ( $aravalli_room_contents as $aravalli_room_item ) {
					$aravalli_repeater_title = ! empty( $aravalli_room_item->title ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_room_item->title, 'Room section' ) : '';
					$aravalli_repeater_subtitle = ! empty( $aravalli_room_item->subtitle ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_room_item->subtitle, 'Room section' ) : '';
					$aravalli_repeater_text = ! empty( $aravalli_room_item->text ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_room_item->text, 'Room section' ) : '';
					$aravalli_repeater_ribbon_text = ! empty( $aravalli_room_item->button) ? apply_filters( 'aravalli_translate_single_string', $aravalli_room_item->button,'Room section' ) : '';
					$aravalli_repeater_button = ! empty( $aravalli_room_item->text2) ? apply_filters( 'aravalli_translate_single_string', $aravalli_room_item->text2,'Room section' ) : '';
					$aravalli_repeater_link = ! empty( $aravalli_room_item->link ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_room_item->link, 'Room section' ) : '';
					$aravalli_repeater_image = ! empty( $aravalli_room_item->image_url ) ? apply_filters( 'aravalli_translate_single_string', $aravalli_room_item->image_url, 'Room section' ) : '';
			?>
					<div class="col-md-6 col-lg-4 mb-4">
						<article class="post-single wow fadeInUp">
							<?php if ( ! empty( $aravalli_repeater_image ) ) : ?>
								<div class="post-thumbnail">
									<div class="post-img"><img src="<?php echo esc_url( $aravalli_repeater_image ); ?>" alt=""></div>
									<div class="ribbon-container"><span class="ribbon ribbon-red"><?php echo esc_html($aravalli_repeater_ribbon_text); ?></span></div>
									<?php if (!empty($aravalli_repeater_title) ):  ?>
										<div class="price-bedge"><?php echo esc_html($aravalli_repeater_title); ?></div>
									<?php endif; ?>
								</div>
							<?php endif; ?>
							<div class="post-content">
								<div class="post-content-inner">
									<?php if (!empty($aravalli_repeater_subtitle) ):  ?>
									<h3 class="post-title"><a href="<?php echo esc_url($aravalli_repeater_link); ?>"><?php echo esc_html($aravalli_repeater_subtitle); ?></a></h3>
									<?php endif; ?>
									<p><?php echo esc_html($aravalli_repeater_text); ?></p>
									<?php if(!empty($aravalli_repeater_button)): ?>
										<a href="<?php echo esc_url($aravalli_repeater_link); ?>" class="btn-shape btn-line-primary"><?php echo esc_html($aravalli_repeater_button); ?></a>
									<?php endif; ?>
								</div>	
							</div>
						</article>
					</div>
			<?php } } ?>
		</div>
	</div>
</section>
<?php
	}}
endif;
if ( function_exists( 'cleverfox_aravalli_lite_room' ) ) {
$cleverfox_section_priority = apply_filters( 'aravalli_section_priority', 13, 'cleverfox_aravalli_lite_room' );
add_action( 'aravalli_sections', 'cleverfox_aravalli_lite_room', absint( $cleverfox_section_priority ) );
}