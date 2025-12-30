/**
 * Customizer controls toggles
 *
 * @package Aravalli
 */

( function( $ ) {

	/* Internal shorthand */
	var api = wp.customize;

	/**
	 * Trigger hooks
	 */
	ARAVALLIControlTrigger = {

	    /**
	     * Trigger a hook.
	     *
	     * @since 1.0.0
	     * @method triggerHook
	     * @param {String} hook The hook to trigger.
	     * @param {Array} args An array of args to pass to the hook.
		 */
	    triggerHook: function( hook, args )
	    {
	    	$( 'body' ).trigger( 'aravalli-control-trigger.' + hook, args );
	    },

	    /**
	     * Add a hook.
	     *
	     * @since 1.0.0
	     * @method addHook
	     * @param {String} hook The hook to add.
	     * @param {Function} callback A function to call when the hook is triggered.
	     */
	    addHook: function( hook, callback )
	    {
	    	$( 'body' ).on( 'aravalli-control-trigger.' + hook, callback );
	    },

	    /**
	     * Remove a hook.
	     *
	     * @since 1.0.0
	     * @method removeHook
	     * @param {String} hook The hook to remove.
	     * @param {Function} callback The callback function to remove.
	     */
	    removeHook: function( hook, callback )
	    {
		    $( 'body' ).off( 'aravalli-control-trigger.' + hook, callback );
	    },
	};

	/**
	 * Helper class that contains data for showing and hiding controls.
	 *
	 * @since 1.0.0
	 * @class ARAVALLICustomizerToggles
	 */
	ARAVALLICustomizerToggles = {
		
		/**
		 *  Mobile Logo
		 */
		'mobile_logo_on' :
		[
			{
				controls: [
					'mobile_logo'
				],
				callback: function( mobile_logo ) {

					var mobile_logo = api( 'mobile_logo_on' ).get();

					if ( '1' == mobile_logo ) {
						return true;
					}
					return false;
				}
			}
		],
		
		/**
		 *  hide_show_nav_btn
		 */
		'hide_show_nav_btn' :
		[
			{
				controls: [
					'nav_btn_lbl',
					'nav_btn_link',
					'nav_btn_icon'
				],
				callback: function( hide_show_nav_btn ) {

					var hide_show_nav_btn = api( 'hide_show_nav_btn' ).get();

					if ( '1' == hide_show_nav_btn ) {
						return true;
					}
					return false;
				}
			}
		],
		
		/**
		 *  hs_scroller
		 */
		'hs_scroller' :
		[
			{
				controls: [
					'scroller_icon'
				],
				callback: function( hs_scroller ) {

					var hs_scroller = api( 'hs_scroller' ).get();

					if ( '1' == hs_scroller ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  hs_breadcrumb
		 */
		'hs_breadcrumb' :
		[
			{
				controls: [
					'breadcrumb_title_enable',
					'breadcrumb_path_enable',
					'breadcrumb_contents',
					'breadcrumb_align',
					'breadcrumb_seprator',
					'breadcrumb_min_height',
					'breadcrumb_bg_head',
					'breadcrumb_bg_img',
					'breadcrumb_back_attach',
					'breadcrumb_bg_img_opacity',
					'breadcrumb_overlay_color',
					'breadcrumb_typography',
					'breadcrumb_title_size',
					'breadcrumb_content_size',
				],
				callback: function( hs_breadcrumb ) {

					var hs_breadcrumb = api( 'hs_breadcrumb' ).get();

					if ( '1' == hs_breadcrumb ) {
						return true;
					}
					return false;
				}
			}
		],
		
		/**
		 *  Slider
		 */
		'slider_overlay_enable' :
		[
			{
				controls: [
					'slide_overlay_color',
					'slider_opacity'
				],
				callback: function( slider_overlay_enable ) {

					var slider_overlay_enable = api( 'slider_overlay_enable' ).get();

					if ( '1' == slider_overlay_enable ) {
						return true;
					}
					return false;
				}
			}
		],
	
		/**
		 *  Color 
		 */
		'theme_color_enable' :
		[
			{
				controls: [
					'primary_color',
					'secondary_color'
				],
				callback: function( theme_color_enable ) {

					var theme_color_enable = api( 'theme_color_enable' ).get();

					if ( '1' == theme_color_enable ) {
						return true;
					}
					return false;
				}
			}
		],
		
		'footer_bottom_layout' :
		[
			{
				controls: [
					'footer_bottom_1',
					'footer_bottom_2'
				],
				callback: function( footer_bottom_layout ) {

					if ( 'disable' != footer_bottom_layout ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'footer_first_custom',
				],
				callback: function( footer_bottom_layout ) {

					var footer_section_1 = api( 'footer_bottom_1' ).get();

					if ( 'disable' != footer_bottom_layout && 'custom' == footer_section_1 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'footer_first_shortcode',
				],
				callback: function( footer_bottom_layout ) {

					var footer_section_1 = api( 'footer_bottom_1' ).get();

					if ( 'disable' != footer_bottom_layout && 'shortcode' == footer_section_1 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'footer_second_custom',
				],
				callback: function( footer_bottom_layout ) {

					var footer_section_2 = api( 'footer_bottom_2' ).get();

					if ( 'disable' != footer_bottom_layout && 'custom' == footer_section_2 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'footer_second_shortcode',
				],
				callback: function( footer_bottom_layout ) {

					var footer_section_1 = api( 'footer_bottom_2' ).get();

					if ( 'disable' != footer_bottom_layout && 'shortcode' == footer_section_1 ) {
						return true;
					}
					return false;
				}
			},
		],
		'footer_bottom_1' :
		[
			{
				controls: [
					'footer_first_custom',
				],
				callback: function( enabled_section_1 ) {

					var footer_layout = api( 'footer_bottom_layout' ).get();

					if ( 'custom' == enabled_section_1 && 'disable' != footer_layout ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'footer_first_shortcode',
				],
				callback: function( enabled_section_1 ) {

					var footer_layout = api( 'footer_bottom_layout' ).get();

					if ( 'shortcode' == enabled_section_1 && 'disable' != footer_layout ) {
						return true;
					}
					return false;
				}
			}
		],
		'footer_bottom_2' :
		[
			{
				controls: [
					'footer_second_custom',
				],
				callback: function( enabled_section_2 ) {

					var footer_layout = api( 'footer_bottom_layout' ).get();

					if ( 'custom' == enabled_section_2 && 'disable' != footer_layout ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'footer_icon',
				],
				callback: function( enabled_section_2 ) {

					var footer_layout = api( 'footer_bottom_layout' ).get();

					if ( 'icon' == enabled_section_2 && 'disable' != footer_layout ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'footer_second_shortcode',
				],
				callback: function( enabled_section_2 ) {

					var footer_layout = api( 'footer_bottom_layout' ).get();

					if ( 'shortcode' == enabled_section_2 && 'disable' != footer_layout ) {
						return true;
					}
					return false;
				}
			}
		],
		
		/**
		 * Above Header
		 */
		'header_above_layout' :
		[
			{
				controls: [
					'above_header_first',
					'above_header_second'
				],
				callback: function( header_above_layout ) {

					if ( 'disable' != header_above_layout ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'hdr_top_mobile',
					'hide_show_phone_details',
					'tlh_phone_icon',
					'tlh_phone_title',
					'hdr_top_email',
					'hide_show_email_details',
					'tlh_email_icon',
					'tlh_email_title',
				],
				callback: function( header_above_layout ) {

					var footer_section_1 = api( 'above_header_first' ).get();

					if ( 'disable' != header_above_layout && 'default' == footer_section_1 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'hide_show_social_icon',
					'social_icons',
				],
				callback: function( header_above_layout ) {

					var footer_section_2 = api( 'above_header_second' ).get();

					if ( 'disable' != header_above_layout && 'default' == footer_section_2 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'abv_hdr_first_shortcode',
				],
				callback: function( header_above_layout ) {

					var above_header_1 = api( 'above_header_first' ).get();

					if ( 'disable' != header_above_layout && 'shortcode' == above_header_1 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'abv_hdr_second_shortcode',
				],
				callback: function( header_above_layout ) {

					var above_header_2 = api( 'above_header_second' ).get();

					if ( 'disable' != header_above_layout && 'shortcode' == above_header_2 ) {
						return true;
					}
					return false;
				}
			},
		],
		'above_header_first' :
		[
			{
				controls: [
					'hdr_top_mobile',
					'hide_show_phone_details',
					'tlh_phone_icon',
					'tlh_phone_title',
					'hdr_top_email',
					'hide_show_email_details',
					'tlh_email_icon',
					'tlh_email_title',
				],
				callback: function( enabled_section_1 ) {

					var above_header_1 = api( 'header_above_layout' ).get();

					if ( 'default' == enabled_section_1 && 'disable' != above_header_1 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'abv_hdr_first_shortcode',
				],
				callback: function( enabled_section_1 ) {

					var above_header_1 = api( 'header_above_layout' ).get();

					if ( 'shortcode' == enabled_section_1 && 'disable' != above_header_1 ) {
						return true;
					}
					return false;
				}
			}
		],
		'above_header_second' :
		[
			{
				controls: [
					'hide_show_social_icon',
					'social_icons',
				],
				callback: function( enabled_section_2 ) {

					var above_header_2 = api( 'header_above_layout' ).get();

					if ( 'default' == enabled_section_2 && 'disable' != above_header_2 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'abv_hdr_second_shortcode',
				],
				callback: function( enabled_section_2 ) {

					var above_header_2 = api( 'header_above_layout' ).get();

					if ( 'shortcode' == enabled_section_2 && 'disable' != above_header_2 ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		
		/**
		 *  hs_pg_about
		 */
		'hs_pg_about' :
		[
			{
				controls: [
					'pg_about_title',
					'pg_about_subtitle',
					'pg_about_desc',
					'pg_about_btn_lbl',
					'pg_about_btn_url',
					'pg_about_img',
					'pg_about_video_link',
				],
				callback: function( hs_pg_about ) {

					var hs_pg_about = api( 'hs_pg_about' ).get();

					if ( '1' == hs_pg_about ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  hs_pg_about_why
		 */
		'hs_pg_about_why' :
		[
			{
				controls: [
					'pg_about_why_ttl',
					'pg_about_why_sub',
					'pg_about_why_desc',
					'pg_about_why_content',
				],
				callback: function( hs_pg_about_why ) {

					var hs_pg_about_why = api( 'hs_pg_about_why' ).get();

					if ( '1' == hs_pg_about_why ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		
		/**
		 *  hs_pg_about_amenities
		 */
		'hs_pg_about_amenities' :
		[
			{
				controls: [
					'pg_about_amenities_ttl',
					'pg_about_amenities_sub',
					'pg_about_amenities_desc',
					'pg_about_amenities_content',
					'pg_about_amenities_bg_img',
					'pg_about_amenities_back_attach',
				],
				callback: function( hs_pg_about_amenities ) {

					var hs_pg_about_amenities = api( 'hs_pg_about_amenities' ).get();

					if ( '1' == hs_pg_about_amenities ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  hs_pg_about_team
		 */
		'hs_pg_about_team' :
		[
			{
				controls: [
					'pg_about_team_ttl',
					'pg_about_team_sub',
					'pg_about_team_desc',
					'pg_about_team_contents',
					'pg_about_team_column'
				],
				callback: function( hs_pg_about_team ) {

					var hs_pg_about_team = api( 'hs_pg_about_team' ).get();

					if ( '1' == hs_pg_about_team ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  hs_pg_about_certificates
		 */
		'hs_pg_about_certificates' :
		[
			{
				controls: [
					'pg_about_certificates_ttl',
					'pg_about_certificates_sub',
					'pg_about_certificates_desc',
					'pg_about_certificates'
				],
				callback: function( hs_pg_about_certificates ) {

					var hs_pg_about_certificates = api( 'hs_pg_about_certificates' ).get();

					if ( '1' == hs_pg_about_certificates ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		
		
		/**
		 *  hs_pg_about_cta
		 */
		'hs_pg_about_cta' :
		[
			{
				controls: [
					'cta_ttl',
					'cta_email',
					'cta_btn_lbl',
					'cta_btn_url',
				],
				callback: function( hs_pg_about_cta ) {

					var hs_pg_about_cta = api( 'hs_pg_about_cta' ).get();

					if ( '1' == hs_pg_about_cta ) {
						return true;
					}
					return false;
				}
			}
		],		
		
		
		/**
		 *  hs_pg_packages
		 */
		'hs_pg_packages' :
		[
			{
				controls: [
					'pg_packages_ttl',
					'pg_packages_sub',
					'pg_packages_desc',
					'pg_packages_category_id',
					'pg_packages_column',
					'pg_packages_display_num',
				],
				callback: function( hs_pg_packages ) {

					var hs_pg_packages = api( 'hs_pg_packages' ).get();

					if ( '1' == hs_pg_packages ) {
						return true;
					}
					return false;
				}
			}
		],	
		
		
		
		/**
		 *  hs_pg_packages_offer
		 */
		'hs_pg_packages_offer' :
		[
			{
				controls: [
					'pg_packages_offer_ttl',
					'pg_packages_offer_sub',
					'pg_packages_offer_desc',
					'pg_packages_offer_category_id',
					'pg_packages_offer_column',
					'pg_packages_offer_display_num',
				],
				callback: function( hs_pg_packages_offer ) {

					var hs_pg_packages_offer = api( 'hs_pg_packages_offer' ).get();

					if ( '1' == hs_pg_packages_offer ) {
						return true;
					}
					return false;
				}
			}
		],	
		
		
		/**
		 *  enable_comming_soon
		 */
		'enable_comming_soon' :
		[
			{
				controls: [
					'enable_comming_soon_form',
					'enable_comming_soon_social',
					'comming_soon_head',
					'comming_soon_logo',
					'comming_soon_pg_ttl',
					'comming_soon_pg_desc',
					'comming_soon_time_head',
					'comming_soon_pg_time',
					'comming_soon_form',
					'comming_soon_shortcode',
					'comming_soon_social',
					'comming_soon_social_icons'
				],
				callback: function( enable_comming_soon ) {

					var enable_comming_soon = api( 'enable_comming_soon' ).get();

					if ( '1' == enable_comming_soon ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		'footer_bg' :
		[
			{
				controls: [
					'footer_bg_img',
					'footer_bg_img_opacity',
					'footer_overlay_color',
				],
				callback: function( enabled_section_1 ) {

					if ( 'image' == enabled_section_1 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'footer_bg_color',
				],
				callback: function( enabled_section_1 ) {

					if ( 'color' == enabled_section_1 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'footer_text_color',
				],
				callback: function( enabled_section_1 ) {

					if ( 'none' !== enabled_section_1 ) {
						return true;
					}
					return false;
				}
			},
		],
		
	};

} )( jQuery );
