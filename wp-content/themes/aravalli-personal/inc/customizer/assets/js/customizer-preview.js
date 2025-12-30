/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	/**
     * Outputs custom css for responsive controls
     * @param  {[string]} setting customizer setting
     * @param  {[string]} css_selector
     * @param  {[array]} css_prop css property to write
     * @param  {String} ext css value extension eg: px, in
     * @return {[string]} css output
     */
    function range_live_media_load( setting, css_selector, css_prop, ext = '' ) {
        wp.customize(
            setting, function( value ) {
                'use strict';
                value.bind(
                    function( to ){
                        var values          = JSON.parse( to );
                        var desktop_value   = JSON.parse( values.desktop );
                        var tablet_value    = JSON.parse( values.tablet );
                        var mobile_value    = JSON.parse( values.mobile );

                        var class_name      = 'customizer-' + setting;
                        var css_class       = $( '.' + class_name );
                        var selector_name   = css_selector;
                        var property_name   = css_prop;

                        var desktop_css     = '';
                        var tablet_css      = '';
                        var mobile_css      = '';

                        if ( property_name.length == 1 ) {
                            var desktop_css     = property_name[0] + ': ' + desktop_value + ext + ';';
                            var tablet_css      = property_name[0] + ': ' + tablet_value + ext + ';';
                            var mobile_css      = property_name[0] + ': ' + mobile_value + ext + ';';
                        } else if ( property_name.length == 2 ) {
                            var desktop_css     = property_name[0] + ': ' + desktop_value + ext + ';';
                            var desktop_css     = desktop_css + property_name[1] + ': ' + desktop_value + ext + ';';

                            var tablet_css      = property_name[0] + ': ' + tablet_value + ext + ';';
                            var tablet_css      = tablet_css + property_name[1] + ': ' + tablet_value + ext + ';';

                            var mobile_css      = property_name[0] + ': ' + mobile_value + ext + ';';
                            var mobile_css      = mobile_css + property_name[1] + ': ' + mobile_value + ext + ';';
                        }

                        var head_append     = '<style class="' + class_name + '">@media (min-width: 320px){ ' + selector_name + ' { ' + mobile_css + ' } } @media (min-width: 720px){ ' + selector_name + ' { ' + tablet_css + ' } } @media (min-width: 960px){ ' + selector_name + ' { ' + desktop_css + ' } }</style>';

                        if ( css_class.length ) {
                            css_class.replaceWith( head_append );
                        } else {
                            $( "head" ).append( head_append );
                        }
                    }
                );
            }
        );
    }
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
	
	$(document).ready(function ($) {
        $('input[data-input-type]').on('input change', function () {
            var val = $(this).val();
            $(this).prev('.cs-range-value').html(val);
            $(this).val(val);
        });
    })
	
	
	/**
	 * logo_width
	 */
	range_live_media_load( 'logo_width', '.logo img, .mobile-logo img', [ 'max-width' ], 'px !important' );
	
	/**
	 * btn_brdr_radius
	 */
	range_live_media_load( 'btn_brdr_radius', '[class*="btn-"], input[type="button"], input[type="reset"], input[type="submit"], .bt-primary, .bt-secondary', [ 'border-radius' ], 'px !important' );
	
	/**
	 * site_ttl_size
	 */
	 
	range_live_media_load( 'site_ttl_size', 'h4.site-title', [ 'font-size' ], 'px !important' );
	
	/**
	 * site_desc_size
	 */
	 
	range_live_media_load( 'site_desc_size', '.site-description', [ 'font-size' ], 'px !important' );
	
	
	//tlh_contact_title
	wp.customize(
		'tlh_contact_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.header-top-info .phone span' ).text( newval );
				}
			);
		}
	);
	
	//tlh_email_title
	wp.customize(
		'tlh_email_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.header-top-info .email span' ).text( newval );
				}
			);
		}
	);
	
	
	//nav_info_left_ttl
	wp.customize(
		'nav_info_left_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.header-widget-info .header-info.left h6' ).text( newval );
				}
			);
		}
	);
	
	//nav_info_left_subttl
	wp.customize(
		'nav_info_left_subttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.header-widget-info .header-info.left .info-sub-title' ).text( newval );
				}
			);
		}
	);
	
	
	
	//nav_info_right_ttl
	wp.customize(
		'nav_info_right_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.header-widget-info .header-info.right h6' ).text( newval );
				}
			);
		}
	);
	
	//nav_info_right_subttl
	wp.customize(
		'nav_info_right_subttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.header-widget-info .header-info.right .info-sub-title' ).text( newval );
				}
			);
		}
	);
	
	//checkin_title
	wp.customize(
		'checkin_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-checkin .checkin-text h3' ).text( newval );
				}
			);
		}
	);
	
	
	//checkin_desc
	wp.customize(
		'checkin_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-checkin .checkin-text p' ).text( newval );
				}
			);
		}
	);
	
	
	
	//room_title
	wp.customize(
		'room_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.room-home .heading-default h6' ).text( newval );
				}
			);
		}
	);
	
	
	//room_subtitle
	wp.customize(
		'room_subtitle', function( value ) {
			value.bind(
				function( newval ) {
					$( '.room-home .heading-default h3' ).text( newval );
				}
			);
		}
	);
	
	//room_desc
	wp.customize(
		'room_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.room-home .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	
	
	
	//features_title
	wp.customize(
		'features_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.features-home .heading-default h6' ).text( newval );
				}
			);
		}
	);
	
	
	//features_subtitle
	wp.customize(
		'features_subtitle', function( value ) {
			value.bind(
				function( newval ) {
					$( '.features-home .heading-default h3' ).text( newval );
				}
			);
		}
	);
	
	//features_description
	wp.customize(
		'features_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '.features-home .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	
	
	//testimonial_title
	wp.customize(
		'testimonial_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-testimonial .heading-default h6' ).text( newval );
				}
			);
		}
	);
	
	
	//testimonial_subtitle
	wp.customize(
		'testimonial_subtitle', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-testimonial .heading-default h3' ).text( newval );
				}
			);
		}
	);
	
	//testimonial_description
	wp.customize(
		'testimonial_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-testimonial .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	
	
	//event_title
	wp.customize(
		'event_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-event .heading-default h6' ).text( newval );
				}
			);
		}
	);
	
	
	//event_subtitle
	wp.customize(
		'event_subtitle', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-event .heading-default h3' ).text( newval );
				}
			);
		}
	);
	
	//event_description
	wp.customize(
		'event_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-event .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	
	
	//newsletter_title
	wp.customize(
		'newsletter_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.news-home .news-info h4' ).text( newval );
				}
			);
		}
	);
	
	
	//newsletter_desc
	wp.customize(
		'newsletter_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.news-home .news-info p' ).text( newval );
				}
			);
		}
	);
	
	//newsletter_app_title
	wp.customize(
		'newsletter_app_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.news-home .news-info h2' ).text( newval );
				}
			);
		}
	);
	
	
	
	
	
	//pg_about_title
	wp.customize(
		'pg_about_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.about-section .heading-default h6' ).text( newval );
				}
			);
		}
	);
	
	
	//pg_about_subtitle
	wp.customize(
		'pg_about_subtitle', function( value ) {
			value.bind(
				function( newval ) {
					$( '.about-section .heading-default h3' ).text( newval );
				}
			);
		}
	);
	
	//pg_about_desc
	wp.customize(
		'pg_about_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.about-section .about-panel .content' ).text( newval );
				}
			);
		}
	);
	
	
	//pg_about_btn_lbl
	wp.customize(
		'pg_about_btn_lbl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.about-section .about-panel a' ).text( newval );
				}
			);
		}
	);
	
	
	
	//pg_about_why_ttl
	wp.customize(
		'pg_about_why_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.about-faq .heading-default h6' ).text( newval );
				}
			);
		}
	);
	
	
	//pg_about_why_sub
	wp.customize(
		'pg_about_why_sub', function( value ) {
			value.bind(
				function( newval ) {
					$( '.about-faq .heading-default h3' ).text( newval );
				}
			);
		}
	);
	
	//pg_about_why_desc
	wp.customize(
		'pg_about_why_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.about-faq .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	
	//pg_about_amenities_ttl
	wp.customize(
		'pg_about_amenities_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.amenities .heading-default h6' ).text( newval );
				}
			);
		}
	);
	
	
	//pg_about_amenities_sub
	wp.customize(
		'pg_about_amenities_sub', function( value ) {
			value.bind(
				function( newval ) {
					$( '.amenities .heading-default h3' ).text( newval );
				}
			);
		}
	);
	
	//pg_about_amenities_desc
	wp.customize(
		'pg_about_amenities_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.amenities .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	
	//pg_about_team_ttl
	wp.customize(
		'pg_about_team_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.team-wrapper .heading-default h6' ).text( newval );
				}
			);
		}
	);
	
	
	//pg_about_team_sub
	wp.customize(
		'pg_about_team_sub', function( value ) {
			value.bind(
				function( newval ) {
					$( '.team-wrapper .heading-default h3' ).text( newval );
				}
			);
		}
	);
	
	//pg_about_team_desc
	wp.customize(
		'pg_about_team_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.team-wrapper .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	
	//pg_about_certificates_ttl
	wp.customize(
		'pg_about_certificates_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.certificates .heading-default h6' ).text( newval );
				}
			);
		}
	);
	
	
	//pg_about_certificates_sub
	wp.customize(
		'pg_about_certificates_sub', function( value ) {
			value.bind(
				function( newval ) {
					$( '.certificates .heading-default h3' ).text( newval );
				}
			);
		}
	);
	
	//pg_about_certificates_desc
	wp.customize(
		'pg_about_certificates_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.certificates .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	
	//cta_ttl
	wp.customize(
		'cta_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.call_action .ttl' ).text( newval );
				}
			);
		}
	);
	
	
	//cta_email
	wp.customize(
		'cta_email', function( value ) {
			value.bind(
				function( newval ) {
					$( '.call_action .text' ).text( newval );
				}
			);
		}
	);
	
	//cta_btn_lbl
	wp.customize(
		'cta_btn_lbl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.call_action .button a' ).text( newval );
				}
			);
		}
	);
	
	
	
	
	//custom_title
	wp.customize(
		'custom_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.custom-wrapper .heading-default h6' ).text( newval );
				}
			);
		}
	);
	
	
	//custom_subtitle
	wp.customize(
		'custom_subtitle', function( value ) {
			value.bind(
				function( newval ) {
					$( '.custom-wrapper .heading-default h3' ).text( newval );
				}
			);
		}
	);
	
	//custom_description
	wp.customize(
		'custom_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '.custom-wrapper .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	
	
	//blog_title
	wp.customize(
		'blog_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-blog .heading-default h6' ).text( newval );
				}
			);
		}
	);
	
	
	//blog_subtitle
	wp.customize(
		'blog_subtitle', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-blog .heading-default h3' ).text( newval );
				}
			);
		}
	);
	
	//blog_description
	wp.customize(
		'blog_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-blog .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	
	
	//pg_packages_ttl
	wp.customize(
		'pg_packages_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.pg-packages-offers .heading-default h6' ).text( newval );
				}
			);
		}
	);
	
	
	//pg_packages_sub
	wp.customize(
		'pg_packages_sub', function( value ) {
			value.bind(
				function( newval ) {
					$( '.pg-packages-offers .heading-default h3' ).text( newval );
				}
			);
		}
	);
	
	//pg_packages_desc
	wp.customize(
		'pg_packages_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.pg-packages-offers .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	
	//pg_packages_offer_ttl
	wp.customize(
		'pg_packages_offer_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.pg-packages-soffers .heading-default h6' ).text( newval );
				}
			);
		}
	);
	
	
	//pg_packages_offer_sub
	wp.customize(
		'pg_packages_offer_sub', function( value ) {
			value.bind(
				function( newval ) {
					$( '.pg-packages-soffers .heading-default h3' ).text( newval );
				}
			);
		}
	);
	
	//pg_packages_offer_desc
	wp.customize(
		'pg_packages_offer_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.pg-packages-soffers .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	
	
	
	//pg_gallery_ttl
	wp.customize(
		'pg_gallery_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.gallery-page .heading-default h6' ).text( newval );
				}
			);
		}
	);
	
	
	//pg_gallery_sub
	wp.customize(
		'pg_gallery_sub', function( value ) {
			value.bind(
				function( newval ) {
					$( '.gallery-page .heading-default h3' ).text( newval );
				}
			);
		}
	);
	
	//pg_gallery_desc
	wp.customize(
		'pg_gallery_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.gallery-page .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	
	//pg_room_ttl
	wp.customize(
		'pg_room_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.room-page .heading-default h6' ).text( newval );
				}
			);
		}
	);
	
	
	//pg_room_sub
	wp.customize(
		'pg_room_sub', function( value ) {
			value.bind(
				function( newval ) {
					$( '.room-page .heading-default h3' ).text( newval );
				}
			);
		}
	);
	
	//pg_room_desc
	wp.customize(
		'pg_room_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.room-page .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	
	
	//contact_pg_ct_ttl
	wp.customize(
		'contact_pg_ct_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.contact-section .heading-default h6' ).text( newval );
				}
			);
		}
	);
	
	
	//contact_pg_ct_subttl
	wp.customize(
		'contact_pg_ct_subttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.contact-section .heading-default h3' ).text( newval );
				}
			);
		}
	);
	
	//contact_pg_ct_desc
	wp.customize(
		'contact_pg_ct_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.contact-section .heading-default p' ).text( newval );
				}
			);
		}
	);
	
	//contact_pg_form_ttl
	wp.customize(
		'contact_pg_form_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.contact-form .heading-form h3' ).text( newval );
				}
			);
		}
	);
	/**
	 * Container Width
	 */
	wp.customize( 'aravalli_site_cntnr_width', function( value ) {
		
		value.bind( function( aravalli_site_cntnr_width ) {
			var class_name      = 'aravalli_site_cntnr_width'; // Used as id in gfont link
			var css_class       = $( '.' + class_name );			
			
			if (aravalli_site_cntnr_width >= 768 && aravalli_site_cntnr_width < 2000){
				var head_append     = '<style class="' + class_name + '">.container{ max-width: ' + aravalli_site_cntnr_width + 'px;}</style>';
			}

			if ( css_class.length ) {
				css_class.replaceWith( head_append );
			} else {
				$( 'head' ).append( head_append );
			}
			
		});
		
	} );
	
	/**
	 * aravalli_cntnr_tb_padding
	 */
	wp.customize( 'aravalli_cntnr_tb_padding', function( value ) {
		value.bind( function( margin ) {
			jQuery( '.bs-py-default' ).css( 'padding', margin+ 'px 0' );
		} );
	} );
	
	range_live_media_load( 'aravalli_cntnr_tb_padding', '.bs-py-default', [ 'padding' ], 'px 0' );
	
	/**
	 * Breadcrumb Typography
	 */
	range_live_media_load( 'breadcrumb_title_size', '.breadcrumbs .page-title h2', [ 'font-size' ], 'px' );
	range_live_media_load( 'breadcrumb_content_size', '.breadcrumbs li', [ 'font-size' ], 'px' );
	
	range_live_media_load( 'breadcrumb_min_height', '.breadcrumbs', [ 'min-height' ], 'px' );
	
	
	/**
	 * Sidebar width.
	 */
	wp.customize( 'aravalli_sidebar_width', function( value ) {		
            'use strict';
            value.bind(
                function( to ){
                    var class_name      = 'customizer-sidebar-width'; // Used as id in gfont link
                    var css_class       = $( '.' + class_name );

                    var sidebar_width   = to;
                    var content_width   = ( 100 - to );

                    var head_append     = '<style class="' + class_name + '">@media (min-width: 992px){#ms-secondary-content { max-width: ' + sidebar_width + '%;flex-basis: ' + sidebar_width + '%; } #ms-primary-content { max-width: ' + content_width + '%;flex-basis: ' + content_width + '%; }}</style>';

                    if ( css_class.length ) {
                        css_class.replaceWith( head_append );
                    } else {
                        $( 'head' ).append( head_append );
                    }
                }
            );
        }
    );
	
	/**
	 * sidebar_wid_ttl_size
	 */
	range_live_media_load( 'sidebar_wid_ttl_size', '.sidebar .widget .widget-title', [ 'font-size' ], 'px' );
	
	/**
	 * Body font family
	 */
	wp.customize( 'aravalli_body_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'body' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * Body font size
	 */
	
	range_live_media_load( 'aravalli_body_font_size', 'body', [ 'font-size' ], 'px' );
	
	/**
	 * Body Letter Spacing
	 */
	
	range_live_media_load( 'aravalli_body_ltr_space', 'body', [ 'letter-spacing' ], 'px' );
	
	/**
	 * Body font weight
	 */
	wp.customize( 'aravalli_body_font_weight', function( value ) {
		value.bind( function( font_weight ) {
			jQuery( 'body' ).css( 'font-weight', font_weight );
		} );
	} );
	
	/**
	 * Body font style
	 */
	wp.customize( 'aravalli_body_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'body' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * Body Text Decoration
	 */
	wp.customize( 'aravalli_body_txt_decoration', function( value ) {
		value.bind( function( decoration ) {
			jQuery( 'body, a' ).css( 'text-decoration', decoration );
		} );
	} );
	/**
	 * Body text tranform
	 */
	wp.customize( 'aravalli_body_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'body' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * aravalli_body_line_height
	 */
	range_live_media_load( 'aravalli_body_line_height', 'body', [ 'line-height' ] );
	
	/**
	 * H1 font family
	 */
	wp.customize( 'aravalli_h1_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'h1' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * H1 font size
	 */
	range_live_media_load( 'aravalli_h1_font_size', 'h1', [ 'font-size' ], 'px' );
	
	/**
	 * H1 font style
	 */
	wp.customize( 'aravalli_h1_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'h1' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * H1 Text Decoration
	 */
	wp.customize( 'aravalli_h1_text_decoration', function( value ) {
		value.bind( function( decoration ) {
			jQuery( 'h1' ).css( 'text-decoration', decoration );
		} );
	} );
	
	/**
	 * H1 font weight
	 */
	wp.customize( 'aravalli_h1_font_weight', function( value ) {
		value.bind( function( font_weight ) {
			jQuery( 'h1' ).css( 'font-weight', font_weight );
		} );
	} );
	
	/**
	 * H1 text tranform
	 */
	wp.customize( 'aravalli_h1_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'h1' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * H1 line height
	 */
	range_live_media_load( 'aravalli_h1_line_height', 'h1', [ 'line-height' ] );
	
	/**
	 * H1 Letter Spacing
	 */
	 
	range_live_media_load( 'aravalli_h1_ltr_spacing', 'h1', [ 'letter-spacing' ], 'px' );
	
	/**
	 * H2 font family
	 */
	wp.customize( 'aravalli_h2_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'h2' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * H2 font size
	 */
	range_live_media_load( 'aravalli_h2_font_size', 'h2', [ 'font-size' ], 'px' );
	
	/**
	 * H2 font style
	 */
	wp.customize( 'aravalli_h2_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'h2' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * H2 Text Decoration
	 */
	wp.customize( 'aravalli_h2_text_decoration', function( value ) {
		value.bind( function( decoration ) {
			jQuery( 'h2' ).css( 'text-decoration', decoration );
		} );
	} );
	
	/**
	 * H2 font weight
	 */
	wp.customize( 'aravalli_h2_font_weight', function( value ) {
		value.bind( function( font_weight ) {
			jQuery( 'h2' ).css( 'font-weight', font_weight );
		} );
	} );
	
	/**
	 * H2 text tranform
	 */
	wp.customize( 'aravalli_h2_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'h2' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * H2 line height
	 */
	range_live_media_load( 'aravalli_h2_line_height', 'h2', [ 'line-height' ]);
	
	/**
	 * H2 Letter Spacing
	 */
	
	range_live_media_load( 'aravalli_h2_ltr_spacing', 'h2', [ 'letter-spacing' ], 'px' );
	/**
	 * H3 font family
	 */
	wp.customize( 'aravalli_h3_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'h3' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * H3 font size
	 */
	range_live_media_load( 'aravalli_h3_font_size', 'h3', [ 'font-size' ], 'px' );
	
	/**
	 * H3 font style
	 */
	wp.customize( 'aravalli_h3_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'h3' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * H3 Text Decoration
	 */
	wp.customize( 'aravalli_h3_text_decoration', function( value ) {
		value.bind( function( decoration ) {
			jQuery( 'h3' ).css( 'text-decoration', decoration );
		} );
	} );
	
	/**
	 * H3 font weight
	 */
	wp.customize( 'aravalli_h3_font_weight', function( value ) {
		value.bind( function( font_weight ) {
			jQuery( 'h3' ).css( 'font-weight', font_weight );
		} );
	} );
	
	/**
	 * H3 text tranform
	 */
	wp.customize( 'aravalli_h3_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'h3' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * H3 line height
	 */
	range_live_media_load( 'aravalli_h3_line_height', 'h3', [ 'line-height' ]);
	
	/**
	 * H3 Letter Spacing
	 */
	
	range_live_media_load( 'aravalli_h3_ltr_spacing', 'h3', [ 'letter-spacing' ], 'px' );
	
	
	/**
	 * H4 font family
	 */
	wp.customize( 'aravalli_h4_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'h4' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * H4 font size
	 */
	range_live_media_load( 'aravalli_h4_font_size', 'h4', [ 'font-size' ], 'px' );
	
	/**
	 * H4 font style
	 */
	wp.customize( 'aravalli_h4_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'h4' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * H4 Text Decoration
	 */
	wp.customize( 'aravalli_h4_text_decoration', function( value ) {
		value.bind( function( decoration ) {
			jQuery( 'h4' ).css( 'text-decoration', decoration );
		} );
	} );
	
	/**
	 * H4 font weight
	 */
	wp.customize( 'aravalli_h4_font_weight', function( value ) {
		value.bind( function( font_weight ) {
			jQuery( 'h4' ).css( 'font-weight', font_weight );
		} );
	} );
	
	/**
	 * H4 text tranform
	 */
	wp.customize( 'aravalli_h4_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'h4' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * H4 line height
	 */
	range_live_media_load( 'aravalli_h4_line_height', 'h4', [ 'line-height' ]);
	
	/**
	 * H4 Letter Spacing
	 */
	
		range_live_media_load( 'aravalli_h4_ltr_spacing', 'h4', [ 'letter-spacing' ], 'px' );
	
	/**
	 * H5 font family
	 */
	wp.customize( 'aravalli_h5_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'h5' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * H5 font size
	 */
	range_live_media_load( 'aravalli_h5_font_size', 'h5', [ 'font-size' ], 'px' );
	
	/**
	 * H5 font style
	 */
	wp.customize( 'aravalli_h5_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'h5' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * H5 Text Decoration
	 */
	wp.customize( 'aravalli_h5_text_decoration', function( value ) {
		value.bind( function( decoration ) {
			jQuery( 'h5' ).css( 'text-decoration', decoration );
		} );
	} );
	
	
	/**
	 * H5 font weight
	 */
	wp.customize( 'aravalli_h5_font_weight', function( value ) {
		value.bind( function( font_weight ) {
			jQuery( 'h5' ).css( 'font-weight', font_weight );
		} );
	} );
	
	/**
	 * H5 text tranform
	 */
	wp.customize( 'aravalli_h5_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'h5' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * H5 line height
	 */
	range_live_media_load( 'aravalli_h5_line_height', 'h5', [ 'line-height' ]);
	
	/**
	 * H5 Letter Spacing
	 */
	
	range_live_media_load( 'aravalli_h5_ltr_spacing', 'h5', [ 'letter-spacing' ], 'px' );
	
	/**
	 * H6 font family
	 */
	wp.customize( 'aravalli_h6_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'h6' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * H6 font size
	 */
	range_live_media_load( 'aravalli_h6_font_size', 'h6', [ 'font-size' ], 'px' );
	
	/**
	 * H6 font style
	 */
	wp.customize( 'aravalli_h6_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'h6' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * H6 Text Decoration
	 */
	wp.customize( 'aravalli_h6_text_decoration', function( value ) {
		value.bind( function( decoration ) {
			jQuery( 'h6' ).css( 'text-decoration', decoration );
		} );
	} );
	
	
	/**
	 * H6 font weight
	 */
	wp.customize( 'aravalli_h6_font_weight', function( value ) {
		value.bind( function( font_weight ) {
			jQuery( 'h6' ).css( 'font-weight', font_weight );
		} );
	} );
	
	/**
	 * H6 text tranform
	 */
	wp.customize( 'aravalli_h6_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'h6' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * H6 line height
	 */
	range_live_media_load( 'aravalli_h6_line_height', 'h6', [ 'line-height' ]);
	
	/**
	 * H6 Letter Spacing
	 */
	
	range_live_media_load( 'aravalli_h6_ltr_spacing', 'h6', [ 'letter-spacing' ], 'px' );
	
} )( jQuery );