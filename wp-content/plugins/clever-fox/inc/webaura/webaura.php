<?php
/**
 * @package   Webique
 */
 
require CLEVERFOX_PLUGIN_DIR . 'inc/webique/extras.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/webique/dynamic-style.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/webique/sections/header-animation-bar.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/webique/sections/above-footer.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/webique/features/webique-header.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/websy/features/websy-header.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/webique/features/webique-footer.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/webique/features/webique-slider.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/webique/features/webique-service.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/webique/features/webique-cta.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/webora/features/webora-team.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/webique/features/webique-typography.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/webaura/features/webaura-animation-bar.php';

if ( ! function_exists( 'cleverfox_webique_frontpage_sections' ) ) :
	function cleverfox_webique_frontpage_sections() {
		require CLEVERFOX_PLUGIN_DIR . 'inc/webaura/sections/section-slider.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/webaura/sections/anim-bars/section-animation-bar-left.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/webaura/sections/anim-bars/section-animation-bar-right.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/webique/sections/section-service.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/webique/sections/section-cta.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/webora/sections/section-team.php';
    }
	add_action( 'webique_sections', 'cleverfox_webique_frontpage_sections' );
endif;

function cleverfox_webique_webaura_customize_remove( $wp_customize ) {
	 $wp_customize->remove_control('hdr_social_head');
	 	 $wp_customize->remove_control('hide_show_social_icon');
		 $wp_customize->remove_control('social_icons');
		 $wp_customize->remove_control('hdr_nav_btn');
	 	 $wp_customize->remove_control('hide_show_nav_btn');
		 $wp_customize->remove_control('nav_btn_lbl');
		 $wp_customize->remove_control('nav_btn_link');
		 $wp_customize->remove_control('hdr_nav_toggle');
		 $wp_customize->remove_control('hs_nav_toggle');
		 
}
add_action( 'customize_register', 'cleverfox_webique_webaura_customize_remove' );