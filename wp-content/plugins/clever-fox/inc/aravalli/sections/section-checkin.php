<?php  
	if ( ! function_exists( 'cleverfox_aravalli_lite_home_checkin' ) ) :
	function cleverfox_aravalli_lite_home_checkin() {
		$aravalli_checkin_hs				= get_theme_mod('checkin_hs','1'); 
		if($aravalli_checkin_hs =='1'){
			do_action('cleverfox_aravalli_lite_checkin');
		}
	}
endif;
if ( function_exists( 'cleverfox_aravalli_lite_home_checkin' ) ) {
$cleverfox_section_priority = apply_filters( 'aravalli_section_priority', 12, 'cleverfox_aravalli_lite_home_checkin' );
add_action( 'aravalli_sections', 'cleverfox_aravalli_lite_home_checkin', absint( $cleverfox_section_priority ) );
}