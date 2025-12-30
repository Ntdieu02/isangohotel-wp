<?php
	if ( ! function_exists( 'webique_premium_links' ) ) :
	function webique_premium_links() {
		
		$theme = wp_get_theme(); // gets the current theme
		if( 'WebAura' == $theme->name){
			$webique_premium_url= 'https://www.nayrathemes.com/webaura-pro/';
		}elseif( 'Webora' == $theme->name){
			$webique_premium_url= 'https://www.nayrathemes.com/webaura-pro';	
		}elseif( 'Websy' == $theme->name){
			$webique_premium_url= 'https://www.nayrathemes.com/websy-pro';	
		}else{
			$webique_premium_url= 'https://www.nayrathemes.com/webique-pro';
		}	
		return $webique_premium_url;
	}
endif;