<?php
$custom_title 			= get_theme_mod( 'custom_title','Explore'); 
$custom_subtitle 		= get_theme_mod( 'custom_subtitle','Custom'); 
$custom_description 	= get_theme_mod( 'custom_description',"Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry's standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book."); 
$aravalli_custom_editor = get_theme_mod( 'aravalli_custom_editor','Custom Section Description');
?>
<section id="custom" class="custom-wrapper sec-default">
	<div class="container">
		<?php if(!empty($custom_title) || !empty($custom_subtitle) || !empty($custom_description)): ?>
			<div class="row">
				<div class="col-12">
					<div class="heading-default wow fadeInUp">
					
						<?php if(!empty($custom_title)): ?>
							<h6><?php echo wp_kses_post($custom_title); ?></h6>
						<?php endif; ?>	
						
						<?php if(!empty($custom_subtitle)): ?>
							<h3><?php echo wp_kses_post($custom_subtitle); ?><span class="line-circle"></span></h3>      
						<?php endif; ?>		
						
						<?php if(!empty($custom_description)): ?>				
							<p> <?php echo esc_html($custom_description); ?></p>
						<?php endif; ?>		
						
					</div>
				</div>
			</div>
		<?php endif; ?>	
		<div class="row">
			<div class="col-lg-12 col-md-12 col-12">
				<?php echo do_shortcode($aravalli_custom_editor); ?>
			</div>
		</div>
	</div>
</section>