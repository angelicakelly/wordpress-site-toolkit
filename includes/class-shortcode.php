<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Return escaped HTML for the shortcode. */
function ak_wst_render_checklist() {
	$items = ak_wst_sanitize_checklist( get_option( AK_WST_OPTION, '' ) );

	if ( '' === $items ) {
		return '';
	}

	$output = '<ul class="site-toolkit-checklist">';

	foreach ( explode( "\n", $items ) as $item ) {
		$output .= '<li>' . esc_html( $item ) . '</li>';
	}

	return $output . '</ul>';
}

add_shortcode( 'site_toolkit_checklist', 'ak_wst_render_checklist' );
