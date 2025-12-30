<?php  
	$pg_about_title 	= get_theme_mod( 'pg_about_title','Luxury Rooms & Resorts'); 
	$pg_about_subtitle 	= get_theme_mod( 'pg_about_subtitle','Welcome To Aravalli'); 
	$pg_about_desc 	= get_theme_mod( 'pg_about_desc','Duis vel nisl lacinia, facilisis in, consectetur leon vestibulum et ullamcorper tortor<br>
                            leon placerat mauris.fringilla est sodales dui, non mattis tortor volutpat vitae. as<br>
                            leon placerat mauris. fringilla est sodales dui, non mattis tortor volutpat vitae. as</p>
                        <p>faucibus nam a pretium sapien nunc quis congue purus nunc feugiat nec purus a ultricies suspendisse in fringilla est sodales dui, non mattis tortor volutpat vitae.a<br>
                        leon placerat mauris'); 
	$pg_about_btn_lbl 	= get_theme_mod( 'pg_about_btn_lbl','Book Now'); 
	$pg_about_btn_url 	= get_theme_mod( 'pg_about_btn_url'); 	
	$pg_about_img 	= get_theme_mod( 'pg_about_img',esc_url(get_template_directory_uri() .'/assets/images/about/welcome-bg.jpg'));
	$pg_about_video_link 	= get_theme_mod( 'pg_about_video_link','https://www.youtube.com/watch?v=abmKeAgdR2M&list=PLLoQ2d0Iz2fOri-fMIL6pzjb_a5ekvj2M&index=8');
?>		
<section id="about-inner" class="sec-default about-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<?php if(!empty($pg_about_title) || !empty($pg_about_subtitle)): ?>
					<div class="heading-default head-sm">
						<?php if(!empty($pg_about_title)): ?>
							<h6><?php echo wp_kses_post($pg_about_title); ?></h6>
						<?php endif; ?>		
						<?php if(!empty($pg_about_subtitle)): ?>
							<h3> <?php echo wp_kses_post($pg_about_subtitle); ?> <span class="line-circle"></span></h3>
						<?php endif; ?>	
					</div>
				<?php endif; ?>
				<div class="about-panel">
					<?php if(!empty($pg_about_desc)): ?><p class="content"><?php echo wp_kses_post($pg_about_desc); ?></p><?php endif; ?>	
					<?php if(!empty($pg_about_btn_lbl)): ?>
						<a href="<?php echo esc_url($pg_about_btn_url); ?>" class="btn-shape btn-line-secondary" data-text="Book Now"><?php echo esc_html($pg_about_btn_lbl); ?></a>
					<?php endif; ?>	
				</div>
			</div>
			<div class="col-lg-6">
				<div class="video-content">
					<div class="video-section" style="background-image:url('<?php echo esc_url($pg_about_img); ?>');">
						<?php if(!empty($pg_about_video_link)): ?>
						<a class="play-icon" href="<?php echo esc_url($pg_about_video_link); ?>">
							<i class="fa fa-play"></i>
						</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>            
	</div>
</section>