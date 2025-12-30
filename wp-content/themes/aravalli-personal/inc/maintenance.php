<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="MuAasifShah">

    <!-- Title -->
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>">
	<?php endif; ?>

    <link rel="stylesheet" href="<?php echo ARAVALLI_PARENT_URI.'/assets/css/fonts/font-awesome/css/font-awesome.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo ARAVALLI_PARENT_URI.'/assets/css/animate.css'; ?>">
    <link rel="stylesheet" href="<?php echo ARAVALLI_PARENT_URI.'/assets/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo ARAVALLI_PARENT_URI.'/assets/css/owl.carousel.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo ARAVALLI_PARENT_URI.'/assets/css/owl.theme.default.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo ARAVALLI_PARENT_URI.'/assets/css/magnific-popup.css'; ?>">
    <link rel="stylesheet" href="<?php echo ARAVALLI_PARENT_URI.'/assets/css/menu.css'; ?>">
    <link rel="stylesheet" href="<?php echo ARAVALLI_PARENT_URI.'/assets/css/typography/typography.css'; ?>">
    <link rel="stylesheet" href="<?php echo ARAVALLI_PARENT_URI.'/assets/css/color/default.css'; ?>">
    <link rel="stylesheet" href="<?php echo ARAVALLI_PARENT_URI.'/assets/css/main.css'; ?>">
    <link rel="stylesheet" href="<?php echo ARAVALLI_PARENT_URI.'/assets/css/widgets.css'; ?>">
	 <link rel="stylesheet" href="<?php echo ARAVALLI_PARENT_URI.'/assets/css/responsive.css'; ?>">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="header-transparent">

    <!-- Preloader Start -->
	<?php  
		$hs_preloader 	= get_theme_mod( 'hs_preloader'); 
		if($hs_preloader == '1') { 
	?>
		<div class="preloader">
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>
	<?php } ?>	
    <!-- Preloader End -->

    <!-- Comming Soon Start -->
		<?php get_template_part('template-parts/sections/section','coming-soon'); ?>
    <!-- Comming Soon End -->

    <!-- Scripts Start -->
    <script src="<?php echo ARAVALLI_PARENT_URI.'/assets/js/jquery.min.js'; ?>"></script>
    <script src="<?php echo ARAVALLI_PARENT_URI.'/assets/js/popper.min.js'; ?>"></script>
    <script src="<?php echo ARAVALLI_PARENT_URI.'/assets/js/bootstrap.min.js'; ?>"></script>
    <script src="<?php echo ARAVALLI_PARENT_URI.'/assets/js/owl.carousel.min.js'; ?>"></script>
    <script src="<?php echo ARAVALLI_PARENT_URI.'/assets/js/owl.carousel2.thumbs.min.js'; ?>"></script>
    <script src="<?php echo ARAVALLI_PARENT_URI.'/assets/js/jquery.easing.js'; ?>"></script>
    <script src="<?php echo ARAVALLI_PARENT_URI.'/assets/js/wow.min.js'; ?>"></script>
    <script src="<?php echo ARAVALLI_PARENT_URI.'/assets/js/jquery.magnific-popup.min.js'; ?>"></script>
    <script src="<?php echo ARAVALLI_PARENT_URI.'/assets/js/jquery.shuffle.min.js'; ?>"></script>
    <script src="<?php echo ARAVALLI_PARENT_URI.'/assets/js/particles.js'; ?>"></script>
    <script src="<?php echo ARAVALLI_PARENT_URI.'/assets/js/countdown.js'; ?>"></script>
    <script src="<?php echo ARAVALLI_PARENT_URI.'/assets/js/custom.js'; ?>"></script>
</body>

</html>