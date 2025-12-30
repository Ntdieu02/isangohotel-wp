<?php
/**
 * @package   News25
 */
 
require CLEVERFOX_PLUGIN_DIR . 'inc/news-25/extras.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/news-25/dynamic-style.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/news-25/sections/above-header.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/news-25/features/news25-header.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/news-25/features/news25-news-one.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/news-25/features/news25-advertise2.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/news-25/features/news25-news-five.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/news-25/features/news25-advertise5.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/news-25/features/news25-news-six.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/news-25/features/news25-typography.php';

if ( ! function_exists( 'cleverfox_news25_frontpage_sections1' ) ) :
	function cleverfox_news25_frontpage_sections1() {		
		require CLEVERFOX_PLUGIN_DIR . 'inc/news-25/sections/section-news-one.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/news-25/sections/section-advertise2.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/news-25/sections/section-news-five.php';
    }
endif;
add_action( 'news25_full_width_sections', 'cleverfox_news25_frontpage_sections1' );

if ( ! function_exists( 'cleverfox_news25_frontpage_sections2' ) ) :
	function cleverfox_news25_frontpage_sections2() {
		require CLEVERFOX_PLUGIN_DIR . 'inc/news-25/sections/section-advertise5.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/news-25/sections/section-news-six.php';
    }
endif;
add_action( 'news25_sections', 'cleverfox_news25_frontpage_sections2' );

function cleverfox_news25_enqueue_scripts() {
	wp_enqueue_style('animate',CLEVERFOX_PLUGIN_URL .'inc/assets/css/animate.css','','3.5.2');
}
add_action( 'wp_enqueue_scripts', 'cleverfox_news25_enqueue_scripts' );