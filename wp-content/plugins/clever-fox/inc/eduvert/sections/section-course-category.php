<?php  
if ( ! function_exists( 'cleverfox_eduvert_lite_course_cat' ) ) :
	function cleverfox_eduvert_lite_course_cat() {
$eduvert_course_cat_hs				= get_theme_mod('course_cat_hs','1'); 		
$eduvert_course_category_title 		= get_theme_mod('course_category_title',__('course categories','clever-fox'));
$eduvert_course_category_description= get_theme_mod('course_category_description',__('popular topics to learn','clever-fox')); 
$eduvert_course_category			= get_theme_mod('course_category',eduvert_get_course_cat_default()); 
$eduvert_course_category_column		= get_theme_mod('course_category_column','3');
$eduvert_course_category_btn_lbl 	= get_theme_mod('course_category_btn_lbl',__('All Categories','clever-fox'));
$eduvert_course_category_btn_link 	= get_theme_mod('course_category_btn_link','#');
if($eduvert_course_cat_hs=='1'):
?>
<section class="section-category wow fadeInUp ptb-80 home1-cat" id="category_one">
	<div class="nt-container">
		<?php if(!empty($eduvert_course_category_title) || !empty($eduvert_course_category_description)): ?>
			<div class="section-title">
				<?php if(!empty($eduvert_course_category_title)): ?>
					<h5><?php echo wp_kses_post($eduvert_course_category_title); ?></h5>
				<?php endif; ?>
				
				<?php if(!empty($eduvert_course_category_description)): ?>
					<h3><?php echo wp_kses_post($eduvert_course_category_description); ?></h3>
				<?php endif; ?>	
			</div>
		<?php endif; ?>
		<div class="nt-columns-area">
			<?php
				if ( ! empty( $eduvert_course_category ) ) {
				$eduvert_course_category = json_decode( $eduvert_course_category );
				foreach ( $eduvert_course_category as $eduvert_cat_item ) {
					$eduvert_repeater_title = ! empty( $eduvert_cat_item->title ) ? apply_filters( 'eduvert_translate_single_string', $eduvert_cat_item->title, 'Course Category section' ) : '';
					$eduvert_repeater_subtitle = ! empty( $eduvert_cat_item->subtitle ) ? apply_filters( 'eduvert_translate_single_string', $eduvert_cat_item->subtitle, 'Course Category section' ) : '';
					$eduvert_repeater_text = ! empty( $eduvert_cat_item->text ) ? apply_filters( 'eduvert_translate_single_string', $eduvert_cat_item->text, 'Course Category section' ) : '';
					$eduvert_repeater_link = ! empty( $eduvert_cat_item->link ) ? apply_filters( 'eduvert_translate_single_string', $eduvert_cat_item->link, 'Course Category section' ) : '';
					$eduvert_repeater_image = ! empty( $eduvert_cat_item->image_url ) ? apply_filters( 'eduvert_translate_single_string', $eduvert_cat_item->image_url, 'Course Category section' ) : '';
			?>
				<div class="nt-column-3 nt-sm-column-6">
					<div class="categorie-item">
						<div class="categorie-img">
							<img src="<?php echo esc_url($eduvert_repeater_image); ?>" alt="">
						</div>
						<div class="categorie-content">
							<?php if(!empty($eduvert_repeater_subtitle)): ?>
								<span><?php  echo esc_html($eduvert_repeater_subtitle); ?></span>
							<?php endif; ?>	
							
							<?php if(!empty($eduvert_repeater_title)): ?>
								<h2><a href="<?php echo esc_url($eduvert_repeater_link); ?>"><?php  echo esc_html($eduvert_repeater_title); ?></a></h2>
							<?php endif; ?>	
							
							<?php if(!empty($eduvert_repeater_text)): ?>
								<p><?php  echo esc_html($eduvert_repeater_text); ?></p>
							<?php endif; ?>	
						</div>
					</div>
				</div>
			<?php }} ?>
		</div>
		<?php if(!empty($eduvert_course_category_btn_lbl)): ?>
			<div class="nt-columns-area">
				<div class="nt-column-12 nt-sm-column-12 text-center">
					<div class="categorie-btn">
						<a href="<?php echo esc_url($eduvert_course_category_btn_link); ?>" class="text-btn"><?php echo wp_kses_post($eduvert_course_category_btn_lbl); ?></a>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php	
endif;	}
endif;
if ( function_exists( 'cleverfox_eduvert_lite_course_cat' ) ) {
$cleverfox_section_priority = apply_filters( 'eduvert_section_priority', 12, 'cleverfox_eduvert_lite_course_cat' );
add_action( 'eduvert_sections', 'cleverfox_eduvert_lite_course_cat', absint( $cleverfox_section_priority ) );
}