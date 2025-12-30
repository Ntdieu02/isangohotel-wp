<?php

/**
 * Fired during plugin activation
 *
 * @package    Clever-fox
 */

/**
 * This class defines all code necessary to run during the plugin's activation.
 *
 */
class Cleverfox_Activator {

	public static function activate() {

        $item_details_page = get_option('item_details_page'); 
		$cleverfox_theme = wp_get_theme(); // gets the current theme
		if(!$item_details_page){
			if ( 'StartKit' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/default-widgets/default-widget.php';
			}
			
			if ( 'StartBiz' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/startbiz/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/startbiz/default-widgets/default-widget.php';
			}
			
			if ( 'Arowana' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/arowana/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/arowana/default-widgets/default-widget.php';
			}
			if ( 'Envira' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/envira/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/envira/default-widgets/default-widget.php';
			}	
			
			if ( 'StartWeb' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/startweb/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/startweb/default-widgets/default-widget.php';
			}
			
			if ( 'Hantus' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/hantus/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/hantus/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/hantus/default-widgets/default-widget.php';
			}

			if ( 'Thai Spa' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/thai-spa/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/thai-spa/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/thai-spa/default-widgets/default-widget.php';
			}

			if ( 'Conceptly' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/conceptly/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/conceptly/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/conceptly/default-widgets/default-widget.php';
			}	
			
			if ( 'Ameya' == $cleverfox_theme->name ){
				require CLEVERFOX_PLUGIN_DIR . 'inc/ameya/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/ameya/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/ameya/default-widgets/default-widget.php';
			}
			
			if ( 'Convo' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/convo/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/convo/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/convo/default-widgets/default-widget.php';
			}
			
			if ( 'Azwa' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/azwa/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/azwa/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/azwa/default-widgets/default-widget.php';
			}
			
			if ( 'Techine' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/techine/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/techine/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/techine/default-widgets/default-widget.php';
			}
			
			if ( 'Avril' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/avril/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/avril/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/avril/default-widgets/default-widget.php';
			}
			
			if ( 'Aera' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/aera/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/aera/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/aera/default-widgets/default-widget.php';
			}
			
			if ( 'Avail' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/avail/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/avail/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/avail/default-widgets/default-widget.php';
			}
			
			if ( 'Axtia' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/axtria/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/axtria/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/axtria/default-widgets/default-widget.php';
			}
			
			if ( 'Avtari' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/avtari/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/avtari/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/avtari/default-widgets/default-widget.php';
			}
			
			if ( 'Aviser' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/aviser/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/aviser/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/aviser/default-widgets/default-widget.php';
			}
			
			if ( 'Avitech' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/avitech/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/avitech/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/avitech/default-widgets/default-widget.php';
			}
			
			if ( 'Ampark' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/ampark/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/ampark/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/ampark/default-widgets/default-widget.php';
			}
			
			if ( 'Varuda' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/varuda/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/varuda/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/varuda/default-widgets/default-widget.php';
			}			
			
			if ( 'Avenza' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/avenza/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/avenza/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/avenza/default-widgets/default-widget.php';
			}			
			
			if ( 'Fiona Blog' == $cleverfox_theme->name || 'Fiona Food' == $cleverfox_theme->name || 'Fiona News' == $cleverfox_theme->name || 'TimeBlog' == $cleverfox_theme->name ){
				require CLEVERFOX_PLUGIN_DIR . 'inc/fiona-blog/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/fiona-blog/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/fiona-blog/default-widgets/default-widget.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/fiona-blog/default-widgets/default-post.php';
			}
			
			if ( 'MetaSoft' == $cleverfox_theme->name  || 'Belltech' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/metasoft/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/metasoft/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/metasoft/default-widgets/default-widget.php';
			}
			
			if ( 'Aravalli' == $cleverfox_theme->name  || 'Arbuda' == $cleverfox_theme->name  || 'VillaPress' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/default-widgets/default-widget.php';
			}
			
			if ( 'Boostify' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/boostify/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/boostify/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/boostify/default-widgets/default-widget.php';
			}
			
			if ( 'Gradiant' == $cleverfox_theme->name  || 'Comoxa' == $cleverfox_theme->name  || 'ColorPress' == $cleverfox_theme->name  || 'Flavita' == $cleverfox_theme->name  || 'Colorsy' == $cleverfox_theme->name  || 'Appointo' == $cleverfox_theme->name || 'GradiantX' == $cleverfox_theme->name || 'ColorFlow' == $cleverfox_theme->name || 'Shadiant' == $cleverfox_theme->name ){
				require CLEVERFOX_PLUGIN_DIR . 'inc/gradiant/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/gradiant/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/gradiant/default-widgets/default-widget.php';
			}
			
			if ( 'Eduvert' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/eduvert/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/eduvert/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/eduvert/default-widgets/default-widget.php';
			}
			
			if ( 'Cosmics' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/cosmics/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/cosmics/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/cosmics/default-widgets/default-widget.php';
			}
			
			if ( 'Renoval' == $cleverfox_theme->name || 'Builderse' == $cleverfox_theme->name || 'Eractor' == $cleverfox_theme->name  ){
				require CLEVERFOX_PLUGIN_DIR . 'inc/renoval/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/renoval/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/renoval/default-widgets/default-widget.php';
			}
			
			if ( 'Medazin' == $cleverfox_theme->name || 'CardioPress' == $cleverfox_theme->name || 'DoctorHub' == $cleverfox_theme->name || 'Medisafe' == $cleverfox_theme->name ){
				require CLEVERFOX_PLUGIN_DIR . 'inc/medazin/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/medazin/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/medazin/default-widgets/default-widget.php';
			}
			
			if ( 'Accron' == $cleverfox_theme->name || 'Acronix' == $cleverfox_theme->name ){
				require CLEVERFOX_PLUGIN_DIR . 'inc/accron/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/accron/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/accron/default-widgets/default-widget.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/accron/default-pages/default-pages.php';
			}			
			
			if ( 'Evita' == $cleverfox_theme->name  ){
				require CLEVERFOX_PLUGIN_DIR . 'inc/evita/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/evita/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/evita/default-widgets/default-widget.php';
			}
			
			if ( 'Corpex' == $cleverfox_theme->name || 'Cormex' == $cleverfox_theme->name|| 'Profolio' == $cleverfox_theme->name ){
				require CLEVERFOX_PLUGIN_DIR . 'inc/corpex/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/corpex/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/corpex/default-widgets/default-widget.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/corpex/default-pages/default-pages.php';
			}
			
			if ( 'NexCraft' == $cleverfox_theme->name || 'Nexcraft BPO' == $cleverfox_theme->name ){
				require CLEVERFOX_PLUGIN_DIR . 'inc/nexcraft/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/nexcraft/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/nexcraft/default-widgets/default-widget.php';
			}
			
			if ( 'Evion' == $cleverfox_theme->name){
				require CLEVERFOX_PLUGIN_DIR . 'inc/evion/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/evion/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/evion/default-widgets/default-widget.php';
			}
			
			if ( 'Webique' == $cleverfox_theme->name || 'Websy' == $cleverfox_theme->name || 'Webora' == $cleverfox_theme->name || 'WebAura' == $cleverfox_theme->name ){
				require CLEVERFOX_PLUGIN_DIR . 'inc/webique/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/webique/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/webique/default-widgets/default-widget.php';
			}
			
			if ( 'News 25' == $cleverfox_theme->name || 'News25 Live' == ($cleverfox_theme->name) || ($cleverfox_theme->name) == "News25 Prime" || ($cleverfox_theme->name) == "News25 Breaking" ){
				require CLEVERFOX_PLUGIN_DIR . 'inc/news-25/default-pages/upload-media.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/news-25/default-pages/home-page.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/news-25/default-widgets/default-widget.php';
				require CLEVERFOX_PLUGIN_DIR . 'inc/news-25/default-widgets/default-post.php';
			}
			
			update_option( 'item_details_page', 'Done' );
		}
	}

}