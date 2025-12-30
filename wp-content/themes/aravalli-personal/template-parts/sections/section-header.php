 <!--===// Start: Preloader
    =================================-->
	<?php  
		$hs_preloader 	= get_theme_mod( 'hs_preloader'); 
		if($hs_preloader == '1') { 
	?>
		<!-- Preloader Start -->
		<div class="preloader">
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>
		<!-- Preloader End -->
	<?php } ?>	
    <!-- End: Preloader
    =================================-->

    <!--===// Start: Header
    =================================-->
<?php 
	$header_above_layout =	get_theme_mod('header_above_layout','layout-2');	
?>	
<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="custom-header" rel="home">
		<img src="<?php esc_url(header_image()); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr(get_bloginfo( 'title' )); ?>">
	</a>	
<?php endif;  ?>	
		
<header id="header-section" class="header header-theme">
	<!--===// Start: Header Top
	=================================-->
	<?php if($header_above_layout !== 'disable') { ?>
	<div id="header-top" class="header-top-info d-lg-block d-sm-none d-none wow fadeInDown">
		<div class="header-widget">
			<div class="container">
				<div class="row">
					<?php if($header_above_layout == 'layout-1'): ?>
						<div class="col-lg-12 col-12">
							 <div id="header-top-left" class="text-center" style="text-align: center; display: block;">
								<?php do_action('aravalli_abv_hdr_data_first');	?>
							</div>
						</div>
						<div class="col-lg-12 col-12">
							 <div id="header-top-right" class="text-center" style="text-align: center; display: block;">
								<?php do_action('aravalli_abv_hdr_data_second');	?>
							</div>	
						</div>
					<?php endif; ?>
					
					<?php if($header_above_layout == 'layout-2'): ?>
						<div class="col-lg-6 col-12">
							 <div id="header-top-left" class="text-lg-left text-center">
								<?php do_action('aravalli_abv_hdr_data_first');	?>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							 <div id="header-top-right" class="text-lg-right text-center">
								<?php do_action('aravalli_abv_hdr_data_second');	?>
							</div>	
						</div>
					<?php endif; ?>	
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<!--===// End: Header Top
	=================================-->