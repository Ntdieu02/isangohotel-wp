<?php
get_template_part( 'inc/customizer/control-function/functions-style' );
get_template_part( 'inc/customizer/control-function/typography-functions' );
if( ! function_exists( 'aravalli_dynamic_style' ) ):
    function aravalli_dynamic_style() {

		$output_css = '';
		
		 /**
		 *  Button Style
		 */
		 $output_css   .= aravalli_customizer_value( 'btn_brdr_radius', '[class*="btn-"], input[type="button"], input[type="reset"], input[type="submit"], .bt-primary, .bt-secondary', array( 'border-radius' ), array( 1, 1, 1 ), 'px' );
		 
		 /**
		 *  Breadcrumb Style
		 */
		 
		$output_css   .= aravalli_customizer_value( 'breadcrumb_min_height', '.breadcrumbs', array( 'min-height' ), array( 236, 236, 236 ), 'px' );
		 $output_css   .=  aravalli_customizer_value( 'breadcrumb_title_size', '.breadcrumbs .page-title h2', array( 'font-size' ), array( 36, 36, 36 ), 'px' );
		  $output_css   .=  aravalli_customizer_value( 'breadcrumb_content_size', '.breadcrumbs li', array( 'font-size' ), array( 13, 13, 13 ), 'px' );
		
		$breadcrumb_align				= get_theme_mod('breadcrumb_align','center');
		
		if($breadcrumb_align !== '') { 
				$output_css .=".breadcrumb-area {
					text-align: " .esc_attr($breadcrumb_align). ";
				}\n";
			}
		 
		$breadcrumb_bg_img_opacity	= get_theme_mod('breadcrumb_bg_img_opacity','0.5');
		$breadcrumb_overlay_color	= get_theme_mod('breadcrumb_overlay_color','#000000');
		list($br, $bg, $bb) = sscanf($breadcrumb_overlay_color, "#%02x%02x%02x");
		
		$output_css .=".breadcrumbs:before {
				background: rgba($br, $bg, $bb, $breadcrumb_bg_img_opacity);

			}\n";
		
		/**
		 * Logo Width 
		 */
		$output_css   .= aravalli_customizer_value( 'logo_width', '.logo img, .mobile-logo img', array( 'max-width' ), array( 140, 140, 140 ), 'px !important' );
		$output_css   .= aravalli_customizer_value( 'site_ttl_size', '.site-title', array( 'font-size' ), array( 30, 30, 30 ), 'px !important' );
		$output_css   .= aravalli_customizer_value( 'site_desc_size', '.site-description', array( 'font-size' ), array( 16, 16, 16 ), 'px !important' );
		
		/**
		 * Slider
		 */
		$slider_overlay_enable 		 = get_theme_mod('slider_overlay_enable','1');
		$slide_overlay_color 		 = get_theme_mod('slide_overlay_color','#000000');
		$slider_opacity				 = get_theme_mod('slider_opacity','0.5');
		list($r, $g, $b) = sscanf($slide_overlay_color, "#%02x%02x%02x");
		if($slider_overlay_enable == '1') { 
				$output_css .=".theme-slider {
				    background: rgba($r, $g, $b, $slider_opacity);
				}\n";
			}
		
		/**
		 *  Sidebar Width
		 */
		$aravalli_sidebar_width = get_theme_mod('aravalli_sidebar_width',35);
		if($aravalli_sidebar_width !== '') { 
			$aravalli_primary_width   = absint( 100 - $aravalli_sidebar_width );
				$output_css .="	@media (min-width: 992px) {#ms-primary-content {
					max-width:" .esc_attr($aravalli_primary_width). "%;
					flex-basis:" .esc_attr($aravalli_primary_width). "%;
				}\n";
				$output_css .="#ms-secondary-content {
					max-width:" .esc_attr($aravalli_sidebar_width). "%;
					flex-basis:" .esc_attr($aravalli_sidebar_width). "%;
				}}\n";
        }
		$output_css   .= aravalli_customizer_value( 'sidebar_wid_ttl_size', '.sidebar .widget .widget-title', array( 'font-size' ), array( 20, 20, 20 ), 'px' );
		
			$theme_color_enable	= get_theme_mod('theme_color_enable');
			$theme_color 	= get_theme_mod('theme_color','#b39148');
			if($theme_color_enable !== '1') {
			$output_css .=":root {
						--bs-primary: " .esc_attr($theme_color). ";
					}\n";
			
			}	
			
			$primary_color 		= get_theme_mod('primary_color','#b39148');
			$secondary_color 	= get_theme_mod('secondary_color','#3b3a3a');
			 
			if($theme_color_enable == '1') { 
				$output_css .=":root {
						--bs-primary: " .esc_attr($primary_color). ";
						--bs-secondary: " .esc_attr($secondary_color). ";
					}\n";
			}
			
		$aravalli_site_cntnr_width 			 = get_theme_mod('aravalli_site_cntnr_width');
			if($aravalli_site_cntnr_width >=768 && $aravalli_site_cntnr_width <=2000){
				$output_css .=".container {
						max-width: " .esc_attr($aravalli_site_cntnr_width). "px;
					}\n";
			}

		
		 $output_css   .= aravalli_customizer_value( 'aravalli_cntnr_tb_padding', '.bs-py-default', array( 'padding' ), array( 100, 100, 100 ), 'px' );
		 

		/**
		 *  Typography Body
		 */
		 $aravalli_body_font_family		 = get_theme_mod('aravalli_body_font_family','');
		 $aravalli_body_font_weight	 	 = get_theme_mod('aravalli_body_font_weight','inherit');
		 $aravalli_body_text_transform	 = get_theme_mod('aravalli_body_text_transform','inherit');
		 $aravalli_body_font_style	 	 = get_theme_mod('aravalli_body_font_style','inherit');
		 $aravalli_body_txt_decoration	 = get_theme_mod('aravalli_body_txt_decoration','none');
		
		 $output_css   .= aravalli_customizer_value( 'aravalli_body_font_size', 'body', array( 'font-size' ), array( 16, 16, 16 ), 'px' );
		 $output_css   .= aravalli_customizer_value( 'aravalli_body_line_height', 'body', array( 'line-height' ), array( 1.6, 1.6, 1.6 ) );
		 $output_css   .= aravalli_customizer_value( 'aravalli_body_ltr_space', 'body', array( 'letter-spacing' ), array( 0, 0, 0 ), 'px' );
		 if($aravalli_body_font_family !== '') { 
			if ( $aravalli_body_font_family && ( strpos( $aravalli_body_font_family, ',' ) != true ) ) {
				aravalli_enqueue_google_font($aravalli_body_font_family);
			}	
			 $output_css .=" body{ font-family: " .esc_attr($aravalli_body_font_family). ";	}\n";
		 }
		 $output_css .=" body{ 
			font-weight: " .esc_attr($aravalli_body_font_weight). ";
			text-transform: " .esc_attr($aravalli_body_text_transform). ";
			font-style: " .esc_attr($aravalli_body_font_style). ";
			text-decoration: " .esc_attr($aravalli_body_txt_decoration). ";
		} a {text-decoration: " .esc_attr($aravalli_body_txt_decoration). ";
		}\n";		 
		
		/**
		 *  Typography Heading
		 */
		 for ( $i = 1; $i <= 6; $i++ ) {
			 $aravalli_heading_font_family	    = get_theme_mod('aravalli_h' . $i . '_font_family','');	
			 $aravalli_heading_font_weight	 	= get_theme_mod('aravalli_h' . $i . '_font_weight','700');
			 $aravalli_heading_text_transform 	= get_theme_mod('aravalli_h' . $i . '_text_transform','inherit');
			 $aravalli_heading_font_style	 	= get_theme_mod('aravalli_h' . $i . '_font_style','inherit');
			 $aravalli_heading_txt_decoration	= get_theme_mod('aravalli_h' . $i . '_text_decoration','inherit');
			 
			 $output_css   .= aravalli_customizer_value( 'aravalli_h' . $i . '_font_size', 'h' . $i .'', array( 'font-size' ), array( 36, 36, 36 ), 'px' );
			 $output_css   .= aravalli_customizer_value( 'aravalli_h' . $i . '_line_height', 'h' . $i . '', array( 'line-height' ), array( 1.2, 1.2, 1.2 ) );
			 $output_css   .= aravalli_customizer_value( 'aravalli_h' . $i . '_ltr_spacing', 'h' . $i . '', array( 'letter-spacing' ), array( 0, 0, 0 ), 'px' );
			  if($aravalli_heading_font_family !== '') {
				  if ( $aravalli_heading_font_family && ( strpos( $aravalli_heading_font_family, ',' ) != true ) ) {
					aravalli_enqueue_google_font($aravalli_heading_font_family);
				  }
			  }	
			 $output_css .=" h" . $i . "{ 
				font-family: " .esc_attr($aravalli_heading_font_family). ";
				font-weight: " .esc_attr($aravalli_heading_font_weight). ";
				text-transform: " .esc_attr($aravalli_heading_text_transform). ";
				font-style: " .esc_attr($aravalli_heading_font_style). ";
				text-decoration: " .esc_attr($aravalli_heading_txt_decoration). ";
			}\n";
		 }				
		
		$footer_bg	   				= get_theme_mod('footer_bg','image');
		$footer_bg_img	   			= get_theme_mod('footer_bg_img',esc_url(get_template_directory_uri() .'/assets/images/bg/footer-bg.jpg'));
		$footer_bg_img_opacity	    = get_theme_mod('footer_bg_img_opacity','0.75');
		$footer_overlay_color	    = get_theme_mod('footer_overlay_color','#000000');
		$footer_bg_color	   		= get_theme_mod('footer_bg_color','#3b3a3a');
		$footer_text_color	   		= get_theme_mod('footer_text_color','#ffffff');
		if($footer_bg =='image' && !empty($footer_bg_img)){
			$output_css .=".footer-wrapper {
						background-image: url(".esc_url($footer_bg_img).");
						color: " .esc_attr($footer_text_color). ";
					}.footer-wrapper:after {
						opacity: ".esc_attr($footer_bg_img_opacity).";
						background-color: ".esc_attr($footer_overlay_color).";
					}\n";
		}
		
		if($footer_bg =='color' && !empty($footer_bg_color)){
			$output_css .=".footer-wrapper {
						background: " .esc_attr($footer_bg_color). ";
						color: " .esc_attr($footer_text_color). ";
					}\n";
		}
		
		
		
		/**
		 *  Funfact
		 */
		$funfact_bg_img 			= get_theme_mod('funfact_bg_img',esc_url(get_template_directory_uri() .'/assets/images/bg/fun-fact-bg.jpg'));
		$funfact_back_attach 		= get_theme_mod('funfact_back_attach','scroll');	
		if(!empty($funfact_bg_img)){
			$output_css .=".fun-fact {
						 background-image: url(".esc_url($funfact_bg_img).");
						background-attachment: " .esc_attr($funfact_back_attach). ";
					}\n";
		}else{
			$output_css .=".fun-fact {
							background: #3b3a3a;
						}\n";
		}
		
		
		/**
		 *  Newsletter
		 */
		$newsletter_bg_img 		= get_theme_mod('newsletter_bg_img',esc_url(get_template_directory_uri() .'/assets/images/newsLetter/pattern-bg.png'));
		$newsletter_back_attach = get_theme_mod('newsletter_back_attach','scroll');	
		if(!empty($newsletter_bg_img)){
			$output_css .=".newsletter {
						 background: url(".esc_url($newsletter_bg_img).") no-repeat center center;
						 background-attachment: " .esc_attr($newsletter_back_attach). ";
						 background-color: var(--bs-primary);
						 background-blend-mode: lighten;
					}\n";
		}else{
			$output_css .="..newsletter {
							background: #3b3a3a;
						}\n";
		}
        wp_add_inline_style( 'aravalli-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'aravalli_dynamic_style' );
?>