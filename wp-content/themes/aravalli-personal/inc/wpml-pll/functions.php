<?php
/**
 * WPML and Polylang compatibility functions.
 *
 * @package Aravalli
 * @since 1.0
 */

/**
 * Filter to translate strings
 */
function aravalli_translate_single_string( $original_value, $domain ) {
	if ( is_customize_preview() ) {
		$wpml_translation = $original_value;
	} else {
		$wpml_translation = apply_filters( 'wpml_translate_single_string', $original_value, $domain, $original_value );
		if ( $wpml_translation === $original_value && function_exists( 'pll__' ) ) {
			return pll__( $original_value );
		}
	}
	return $wpml_translation;
}
add_filter( 'aravalli_translate_single_string', 'aravalli_translate_single_string', 10, 2 );

/**
 * Helper to register pll string.
 *
 * @param String    $theme_mod Theme mod name.
 * @param bool/json $default Default value.
 * @param String    $name Name for polylang backend.
 */
function aravalli_pll_string_register_helper( $theme_mod ) {
	if ( ! function_exists( 'pll_register_string' ) ) {
		return;
	}
	
	$repeater_content = get_theme_mod( $theme_mod );
	$repeater_content = json_decode( $repeater_content );
	if ( ! empty( $repeater_content ) ) {
		foreach ( $repeater_content as $repeater_item ) {
			foreach ( $repeater_item as $field_name => $field_value ) {
				if ( $field_value !== 'undefined' ) {
					if ( $field_name !== 'id' ) {
						$f_n = ucfirst( $field_name );
						pll_register_string( $f_n, $field_value);
					}
				}
			}
		}
	}
}


/**
 * Header Above Social
 */
 
function aravalli_header_social_register_strings() {
	$default = aravalli_get_social_icon_default();
	aravalli_pll_string_register_helper( 'social_icons', $default, 'Header Social section' );
}

/**
 * Slider Section
 */
 
function aravalli_slider_register_strings() {
	$default = aravalli_get_slider_default();
	aravalli_pll_string_register_helper( 'slider', $default, 'Slider section' );
}

/**
 * Features Section
 */
 
function aravalli_features_register_strings() {
	$default = aravalli_get_features_default();
	aravalli_pll_string_register_helper( 'features_contents', $default, 'Features section' );
}

/**
 * Gallery Section
 */
 
function aravalli_gallery_register_strings() {
	$default = aravalli_get_gallery_default();
	aravalli_pll_string_register_helper( 'gallery_content', $default, 'Gallery section' );
}

/**
 * Event Section
 */
 
function aravalli_event_register_strings() {
	$default = aravalli_get_event_default();
	aravalli_pll_string_register_helper( 'events_content', $default, 'Event section' );
}


/**
 * Testimonial Section
 */
 
function aravalli_testimonial_register_strings() {
	$default = aravalli_get_testimonial_default();
	aravalli_pll_string_register_helper( 'testimonials_content', $default, 'Testimonial section' );
}

/**
 * Funfact Section
 */
 
function aravalli_funfact_register_strings() {
	$default = aravalli_get_funfact_default();
	aravalli_pll_string_register_helper( 'funfact_contents', $default, 'Funfact section' );
}

/**
 * Promotional Section
 */
 
function aravalli_promotional_register_strings() {
	$default = aravalli_get_promotional_default();
	aravalli_pll_string_register_helper( 'promotional_contents', $default, 'Promotional section' );
}

/**
 * Newsletter Section
 */
 
function aravalli_newsletter_btn_register_strings() {
	$default = aravalli_get_news_btn_default();
	aravalli_pll_string_register_helper( 'newsletter_btn', $default, 'Newsletter section' );
}

/**
 * FAQ Section
 */
 
function aravalli_faq_register_strings() {
	$default = aravalli_get_abt_faq_default();
	aravalli_pll_string_register_helper( 'pg_about_why_content', $default, 'FAQ section' );
}

/**
 * Amenities Section
 */
 
function aravalli_amenities_register_strings() {
	$default = aravalli_get_amenities_default();
	aravalli_pll_string_register_helper( 'pg_about_amenities_content', $default, 'Amenities section' );
}

/**
 * Team Section
 */
 
function aravalli_team_register_strings() {
	$default = aravalli_get_team_default();
	aravalli_pll_string_register_helper( 'pg_about_team_contents', $default, 'Team section' );
}

/**
 * Certificates Section
 */
 
function aravalli_certificates_register_strings() {
	$default = aravalli_get_certificates_default();
	aravalli_pll_string_register_helper( 'pg_about_certificates', $default, 'Certificates section' );
}

/**
 * Page Gallery Section
 */
 
function aravalli_pg_gallery_register_strings() {
	$default = aravalli_get_gallery_default();
	aravalli_pll_string_register_helper( 'pg_gallery_content', $default, 'Page Gallery section' );
}

/**
 * Contact Section
 */
 
function aravalli_contact_register_strings() {
	$default = aravalli_get_contact_pg_info_default();
	aravalli_pll_string_register_helper( 'contact_pg_ct_contents', $default, 'Contact section' );
}

/**
 * Coming Soon Social Section
 */
 
function aravalli_coming_soon_social_register_strings() {
	$default = aravalli_get_social_icon_default();
	aravalli_pll_string_register_helper( 'comming_soon_social_icons', $default, 'Coming Soon Social section' );
}

/**
 * Footer Above Section
 */
 
function aravalli_footer_above_register_strings() {
	$default = aravalli_get_footer_above_default();
	aravalli_pll_string_register_helper( 'footer_above_content', $default, 'Footer Above section' );
}


if ( function_exists( 'pll_register_string' ) ) {
	add_action( 'after_setup_theme', 'aravalli_header_social_register_strings', 11 );
	add_action( 'after_setup_theme', 'aravalli_slider_register_strings', 11 );
	add_action( 'after_setup_theme', 'aravalli_features_register_strings', 11 );
	add_action( 'after_setup_theme', 'aravalli_gallery_register_strings', 11 );
	add_action( 'after_setup_theme', 'aravalli_event_register_strings', 11 );
	add_action( 'after_setup_theme', 'aravalli_testimonial_register_strings', 11 );
	add_action( 'after_setup_theme', 'aravalli_funfact_register_strings', 11 );
	add_action( 'after_setup_theme', 'aravalli_promotional_register_strings', 11 );
	add_action( 'after_setup_theme', 'aravalli_newsletter_btn_register_strings', 11 );
	add_action( 'after_setup_theme', 'aravalli_faq_register_strings', 11 );
	add_action( 'after_setup_theme', 'aravalli_amenities_register_strings', 11 );
	add_action( 'after_setup_theme', 'aravalli_team_register_strings', 11 );
	add_action( 'after_setup_theme', 'aravalli_certificates_register_strings', 11 );
	add_action( 'after_setup_theme', 'aravalli_pg_gallery_register_strings', 11 );
	add_action( 'after_setup_theme', 'aravalli_contact_register_strings', 11 );
	add_action( 'after_setup_theme', 'aravalli_coming_soon_social_register_strings', 11 );
	add_action( 'after_setup_theme', 'aravalli_footer_above_register_strings', 11 );
}


