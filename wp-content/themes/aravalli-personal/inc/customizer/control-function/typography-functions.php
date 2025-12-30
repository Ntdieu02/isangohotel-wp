<?php
/**
 * Enqueues a Google Font
 *
 */
function aravalli_enqueue_google_font( $font ) {

	// Sanitize handle
	$handle = trim( $font );
	$handle = strtolower( $handle );
	$handle = str_replace( ' ', '-', $handle );

	// Sanitize font name
	$font = trim( $font );

	$base_url = '//fonts.googleapis.com/css';

	// Edit this to add more subsets
	$subsets = apply_filters( 'aravalli_font_subsets', array( 'latin' ) );
	if ( ! empty( $subsets ) ) {
		$font_subsets = array();
		foreach ( $subsets as $get_subset ) {
			$font_subsets[] = $get_subset;
		}
		$subsets = implode( ',', $font_subsets );
	}

	$weights = apply_filters( 'aravalli_font_weights', array( '300', '400', '500', '700' ) );
	
	// Add weights to URL
	if ( ! empty( $weights ) ) {
		$font .= ':' . implode( ',', $weights );
	}

	$query_args = array(
		'family' => urlencode( $font ),
	);
	if ( ! empty( $subsets ) ) {
		$query_args['subset'] = urlencode( $subsets );
	}
	$url = add_query_arg( $query_args, $base_url );
	
	// Enqueue style
	wp_enqueue_style( 'aravalli-font-selector-google-font-' . $handle, esc_url( $url ), array(), false );
	
}