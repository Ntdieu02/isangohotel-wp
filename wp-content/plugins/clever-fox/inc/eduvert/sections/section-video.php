<?php  
if ( ! function_exists( 'cleverfox_eduvert_lite_video' ) ) :
	function cleverfox_eduvert_lite_video() {
$eduvert_video_hs		  = get_theme_mod('video_hs','1'); 		
$eduvert_video_title 	  = get_theme_mod('video_title',__('Live classes','clever-fox'));
$eduvert_video_description= get_theme_mod('video_description',__('high quality Live classes','clever-fox')); 
$eduvert_video_link		  = get_theme_mod('video_link','https://www.youtube.com/embed/cdfMgotGKIM');
if($eduvert_video_hs=='1'):
?>
<section class="section-video wow fadeInUp ptb-80 home1-video" id="home1-video">
	<div class="bg11-element"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/course/Vector-1.png" alt=""></div>
	<div class="bg12-element"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/course/Vector.png" alt=""></div>
	<div class="nt-container">
		<div class="nt-columns-area">
			<div class="nt-column-12 video_down">
				<?php if(!empty($eduvert_video_title) || !empty($eduvert_video_description)): ?>
					<div class="section-title">
						<?php if(!empty($eduvert_video_title)): ?>
							<h5><?php echo wp_kses_post($eduvert_video_title); ?></h5>
						<?php endif; ?>
						
						<?php if(!empty($eduvert_video_description)): ?>
							<h3><?php echo wp_kses_post($eduvert_video_description); ?></h3>
						<?php endif; ?>	
					</div>
				<?php endif; ?>
				<?php if(!empty($eduvert_video_link)): ?>
					<div class="live-video">
						<iframe src="<?php echo esc_url($eduvert_video_link); ?>" frameborder="0"></iframe>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php	
endif;	}
endif;
if ( function_exists( 'cleverfox_eduvert_lite_video' ) ) {
$cleverfox_section_priority = apply_filters( 'eduvert_section_priority', 13, 'cleverfox_eduvert_lite_video' );
add_action( 'eduvert_sections', 'cleverfox_eduvert_lite_video', absint( $cleverfox_section_priority ) );
}