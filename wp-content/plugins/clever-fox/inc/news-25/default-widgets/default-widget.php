<?php
	$cleverfox_theme = wp_get_theme();
	$cleverfox_name = strtolower(str_replace(' ', '-', $cleverfox_theme));
	if($cleverfox_name == 'news25-live') {
		$news_25_logo_url = CLEVERFOX_PLUGIN_URL .'inc/'.$cleverfox_name.'/images/logo.png';
	} else {
		$news_25_logo_url = CLEVERFOX_PLUGIN_URL .'inc/'.$cleverfox_name.'/images/footer-logo.png';
	}
	
$cleverfox_blocks = array(
    '<!-- wp:html -->
	<div class="logo mb-3">
		<a href="javascript:void(0);"><img decoding="async" src="'.$news_25_logo_url.'" alt="image"></a>
	</div>
	<div class="textwidget ">
		<p>It is a long established fact that reader will be distracted by the readable content of a page when looking at its layout.</p>
		<div class="footer-badge">
			<img decoding="async" src="'.CLEVERFOX_PLUGIN_URL .'inc/news-25/images/footer/2.png" alt="">
			<img decoding="async" src="'.CLEVERFOX_PLUGIN_URL .'inc/news-25/images/footer/3.png" alt="">
			<img decoding="async" src="'.CLEVERFOX_PLUGIN_URL .'inc/news-25/images/footer/4.png" alt="">		   
		</div>
	</div>
	<!-- wp:html /-->', // Correspond to block-1
    '<!-- wp:group -->
		<div class="wp-block-group">
		<!-- wp:heading --><h2 class="wp-block-heading">Company</h2><!-- /wp:heading -->
		<!-- wp:html -->
			<ul class="wp-block-page-list">
				<li class="wp-block-pages-list__item"><a class="wp-block-pages-list__item__link" href="#">About</a></li>
				<li class="wp-block-pages-list__item"><a class="wp-block-pages-list__item__link" href="#">Account</a></li>
				<li class="wp-block-pages-list__item"><a class="wp-block-pages-list__item__link" href="#">Career</a></li>
				<li class="wp-block-pages-list__item"><a class="wp-block-pages-list__item__link" href="#">Privacy Policy</a></li>
				<li class="wp-block-pages-list__item"><a class="wp-block-pages-list__item__link" href="#">Terms &amp; Conditions</a></li>
			</ul>
		<!-- /wp:html -->
		</div>
	<!-- /wp:group -->', // Correspond to block-2
	'<!-- wp:group -->
		<div class="wp-block-group">
		<!-- wp:heading --><h2 class="wp-block-heading">Account</h2><!-- /wp:heading -->
		<!-- wp:html -->
			<ul class="wp-block-page-list">
				<li class="wp-block-pages-list__item"><a class="wp-block-pages-list__item__link" href="#">Help Ticket</a></li>
				<li class="wp-block-pages-list__item"><a class="wp-block-pages-list__item__link" href="#">Track My Order</a></li>
				<li class="wp-block-pages-list__item"><a class="wp-block-pages-list__item__link" href="#">View Cart</a></li>
				<li class="wp-block-pages-list__item"><a class="wp-block-pages-list__item__link" href="#">Wishlist</a></li>
			</ul>
		<!-- /wp:html -->
		</div>
	<!-- /wp:group -->',
	'<!-- wp:group -->
		<div class="wp-block-group">
		<!-- wp:heading --><h2 class="wp-block-heading">Install Apps</h2><!-- /wp:heading -->
		<!-- wp:html -->
			<div class="textwidget ">
				<p class="mb-0">Download App on Mobile :</p>
				<span class="secondary-color2">15% Discount</span>
			</div>
			<div class="brand mt-3 d-flex flex-column gap-2">
				<a href="javascript:void(0);"><img decoding="async" src="'.CLEVERFOX_PLUGIN_URL .'inc/news-25/images/footer/playstore.png" alt="image"></a>
				<a href="javascript:void(0);"><img decoding="async" src="'.CLEVERFOX_PLUGIN_URL .'inc/news-25/images/footer/appstore.png" alt="image"></a>
			</div>
		<!-- /wp:html -->
		</div>
	<!-- /wp:group -->',
    '<!-- wp:search /-->', 
    '<!-- wp:group --><!-- wp:heading --><h2 class="wp-block-heading">Categories</h2><!-- /wp:heading --><!-- wp:categories /--><!-- /wp:group -->', 
    '<!-- wp:group --><!-- wp:heading --><h2 class="wp-block-heading">Latest Posts</h2><!-- /wp:heading --><!-- wp:latest-posts /--><!-- /wp:group -->', 
    '<!-- wp:group --><!-- wp:heading --><h2 class="wp-block-heading">Calendar</h2><!-- /wp:heading --><!-- wp:calendar /--><!-- /wp:group -->', 
);
$cleverfox_activate = array(
		'news25-footer-widget-area-1' => array(
			'block-1'
        ),
		'news25-footer-widget-area-2' => array(
            'block-6'
        ),
		'news25-footer-widget-area-3' => array(
            'block-7'
        ),
		'news25-footer-widget-area-4' => array(
			'block-8'
        ),
        'news25-sidebar-primary' => array(
            'block-5',
            'block-6',
            'block-7',
            'block-8',
        ),
    );
    	
	update_option('widget_block', array(
		1 => array('content' => $cleverfox_blocks[0]), // 1 Represent block-1
		2 => array('content' => $cleverfox_blocks[1]), //2 Represent block-2
		3 => array('content' => $cleverfox_blocks[2]), 
		4 => array('content' => $cleverfox_blocks[3]), 
		5 => array('content' => $cleverfox_blocks[4]), 
		6 => array('content' => $cleverfox_blocks[5]), 
		7 => array('content' => $cleverfox_blocks[6]), 
		8 => array('content' => $cleverfox_blocks[7]), 
	));
		
    update_option('sidebars_widgets',  $cleverfox_activate);
	$cleverfox_MediaId = get_option('news_25_media_id');
	set_theme_mod( 'custom_logo', $cleverfox_MediaId[0] );
?>