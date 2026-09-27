<?php
/**
 * Plugin Name: WordPress Site Toolkit
 * Description: Publish a simple, editable website maintenance checklist.
 * Version: 1.0.0
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Author: Angelica Kelly
 * License: GPL-3.0-or-later
 * Text Domain: wordpress-site-toolkit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

const AK_WST_OPTION = 'ak_wst_checklist';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-settings.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-shortcode.php';





/** Load frontend styles. */
function ak_wst_enqueue_styles() {
	wp_enqueue_style(
		'ak-wst-frontend',
		plugin_dir_url( __FILE__ ) . 'assets/css/frontend.css',
		array(),
		'1.0.0'
	);
}
add_action( 'wp_enqueue_scripts', 'ak_wst_enqueue_styles' );

