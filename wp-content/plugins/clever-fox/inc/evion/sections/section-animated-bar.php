<?php 
if ( ! function_exists( 'cleverfox_evion_lite_animate' ) ) :
	function cleverfox_evion_lite_animate() {
	$avril_evion_animate_contents			= get_theme_mod('animate_contents',avril_get_animate_default());
	$avril_evion_hs_animate					= get_theme_mod('hs_animate','1');		
	if($avril_evion_hs_animate=='1'){
?>
    <section id="animate-section" class="animate-section animate-section-hover animate-home">
    	<div class="av-container ">
            <div class="animates-carousel owl-carousel owl-theme wow fadeInUp">
				<?php
					if ( ! empty( $avril_evion_animate_contents ) ) {
					$avril_evion_animate_contents = json_decode( $avril_evion_animate_contents );
					foreach ( $avril_evion_animate_contents as $avril_evion_animate_item ) {
						$avril_evion_repeater_title = ! empty( $avril_evion_animate_item->title ) ? apply_filters( 'avril_translate_single_string', $avril_evion_animate_item->title, 'animate section' ) : '';
						$avril_evion_repeater_icon = ! empty( $avril_evion_animate_item->icon_value) ? apply_filters( 'avril_translate_single_string', $avril_evion_animate_item->icon_value,'animate section' ) : '';
						$avril_evion_repeater_link = ! empty( $avril_evion_animate_item->link ) ? apply_filters( 'avril_translate_single_string', $avril_evion_animate_item->link, 'animate section' ) : '';
				?>
					<div class="animate-item">
						<div class="animate-icon">
							<?php if ( ! empty( $avril_evion_repeater_icon ) ) {?>
								<i class="fa <?php echo esc_html( $avril_evion_repeater_icon ); ?> txt-pink"></i>
							<?php } ?>
						</div>
						<div class="animate-content">
							<?php if ( ! empty( $avril_evion_repeater_title ) ) : ?>
								<h5 class="animate-title"><a href="<?php echo esc_url( $avril_evion_repeater_link ); ?>"><?php echo esc_html( $avril_evion_repeater_title ); ?></a></h5>
							<?php endif; ?>
							
						</div>
					</div>
				<?php }}?>
            </div>
    	</div>
    </section>
	<?php  
	}} endif; 
	if ( function_exists( 'cleverfox_evion_lite_animate' ) ) {
		$cleverfox_section_priority = apply_filters( 'avril_section_priority', 11, 'avril_lite_animate' );
		add_action( 'avril_sections', 'cleverfox_evion_lite_animate', absint( $cleverfox_section_priority ) );
	} ?>