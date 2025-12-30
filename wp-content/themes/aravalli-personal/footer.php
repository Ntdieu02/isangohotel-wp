<!-- Footer Area Start -->
<?php
	$footer_bg	   				= get_theme_mod('footer_bg','none');
	$footer_bg_img	   			= get_theme_mod('footer_bg_img');
	$footer_widget_layout	    = get_theme_mod('footer_widget_layout','4');
	if ($footer_widget_layout == '4') {
		$cols = 'col-lg-3 col-md-6';
	} elseif ($footer_widget_layout == '3') {
		$cols = 'col-lg-4 col-md-6';
	} elseif ($footer_widget_layout == '2') {
		$cols = 'col-lg-6 col-md-6';
	} else {
		$cols = 'col-lg-12 col-md-12';
	}
?>
  <footer id="footer" class="footer-wrapper">
        <div class="container">
			<?php if($footer_widget_layout !== 'disable') { ?>
            <div class="row widgets-mb">
				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
					<div class="<?php echo esc_attr($cols); ?> mb-lg-0 mb-md-0 mb-4">
					   <?php dynamic_sidebar( 'footer-1'); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<div class="<?php echo esc_attr($cols); ?> mb-lg-0 mb-md-0 mb-4">
					   <?php dynamic_sidebar( 'footer-2'); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
					<div class="<?php echo esc_attr($cols); ?> mb-lg-0 mb-md-0 mb-4">
						<?php dynamic_sidebar( 'footer-3'); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
					<div class="<?php echo esc_attr($cols); ?> mb-lg-0 mb-md-0 mb-4">
						<?php dynamic_sidebar( 'footer-4'); ?>
					</div>
				<?php endif; ?>				
            </div>
			<?php } ?>
			<?php 
				$hs_above_footer		= get_theme_mod('hs_above_footer','1'); 
				$footer_above_content	= get_theme_mod('footer_above_content',aravalli_get_footer_above_default());
				if ($hs_above_footer == '1') {
			?>
				<div class="row">
					<div class="col-12">
						<div class="social-box wow fadeInUp">
							<?php
								if ( ! empty( $footer_above_content ) ) {
								$footer_above_content = json_decode( $footer_above_content );
								foreach ( $footer_above_content as $footer_item ) {
									$title = ! empty( $footer_item->title ) ? apply_filters( 'aravalli_translate_single_string', $footer_item->title, 'footer section' ) : '';
									$subtitle = ! empty( $footer_item->subtitle ) ? apply_filters( 'aravalli_translate_single_string', $footer_item->subtitle, 'footer section' ) : '';
									$icon = ! empty( $footer_item->icon_value ) ? apply_filters( 'aravalli_translate_single_string', $footer_item->icon_value, 'footer section' ) : '';
									$link = ! empty( $footer_item->link ) ? apply_filters( 'aravalli_translate_single_string', $footer_item->link, 'footer section' ) : '';
									$image = ! empty( $footer_item->image_url ) ? apply_filters( 'aravalli_translate_single_string', $footer_item->image_url, 'footer section' ) : '';
									$color = ! empty( $footer_item->color ) ? apply_filters( 'aravalli_translate_single_string', $footer_item->color, 'footer section' ) : '';
							?>
								<div class="info-item">
									<div class="info-icon">
										<a href="<?php echo esc_url( $link ); ?>">
											<?php if ( ! empty( $image )){ ?>
												<img  src="<?php echo esc_url( $image ); ?>" />
											<?php }else{ ?>	
												<i class="fa <?php echo esc_attr( $icon ); ?>" style="color:<?php echo esc_attr($color); ?>"></i>
											<?php } ?>	
										</a>	
									</div>
									<div class="info-content">
										<?php if ( ! empty( $title )){ ?>
											<h6 class="info-title"><?php echo esc_html( $title ); ?></h6>
										<?php } ?>	
										<?php if ( ! empty( $subtitle )){ ?>
										<div class="info-sub-title"><?php echo esc_html( $subtitle ); ?></div>
										<?php } ?>	
									</div>
								</div>
							<?php }}?>
						</div>
					</div>
				</div>
			<?php } ?>
        </div>
		<?php 
		$aravalli_foot_btm_lay 	= get_theme_mod('footer_bottom_layout','layout-1');	
		 if($aravalli_foot_btm_lay !== 'disable') { ?>		
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
					<?php if($aravalli_foot_btm_lay == 'layout-1'): ?>
						<div class="col-md-6 my-auto text-md-left text-center">
							<?php if ( function_exists( 'aravalli_footer_group_first' ) ) : aravalli_footer_group_first(); endif; ?>
						</div>
						<div class="col-md-6 my-auto text-md-right text-center">
							<?php if ( function_exists( 'aravalli_footer_group_second' ) ) : aravalli_footer_group_second(); endif; ?>
						</div>
					<?php endif; ?>	
					
					<?php if($aravalli_foot_btm_lay == 'layout-2'): ?>
						<div class="col-md-12 my-auto text-center">
							<?php if ( function_exists( 'aravalli_footer_group_first' ) ) : aravalli_footer_group_first(); endif; ?>
						</div>
						<div class="col-md-12 my-auto text-center">
							<?php if ( function_exists( 'aravalli_footer_group_second' ) ) : aravalli_footer_group_second(); endif; ?>
						</div>
					<?php endif; ?>	
                </div>
            </div>
        </div>
		<?php } ?>
    </footer>
	 <!-- ScrollUp -->
	 <?php 
		$hs_scroller 	= get_theme_mod('hs_scroller','1');	
		$scroller_icon 	= get_theme_mod('scroller_icon','fa-arrow-up');	
		if($hs_scroller == '1') :
	?>
		 <a href="javascript:void(0)" class="scrollup"><i class="fa <?php echo esc_attr($scroller_icon);?>"></i></a>
	<?php endif; ?>	
  <!-- / -->  
</div>
</div>
<?php 
$front_pallate_enable = get_theme_mod('front_pallate_enable');
	if($front_pallate_enable == '1') :
		get_template_part('index','switcher');
	endif;
wp_footer(); ?>
</body>
</html>
