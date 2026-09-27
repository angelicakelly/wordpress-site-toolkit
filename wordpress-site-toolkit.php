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


/** Keep the input as plain text with one item per line. */
function ak_wst_sanitize_checklist( $value ) {
	if ( ! is_string( $value ) ) {
		return '';
	}
	$lines = preg_split( '/\r\n|\r|\n/', $value );
	$lines = array_map( 'sanitize_text_field', $lines );
	$lines = array_filter( array_map( 'trim', $lines ), 'strlen' );
	return implode( "\n", $lines );
}

/** Add a small page under Settings. */
function ak_wst_add_settings_page() {
	add_options_page( __( 'Site Toolkit', 'wordpress-site-toolkit' ), __( 'Site Toolkit', 'wordpress-site-toolkit' ), 'manage_options', 'ak-site-toolkit', 'ak_wst_render_settings_page' );
}
add_action( 'admin_menu', 'ak_wst_add_settings_page' );

/** Render the Settings API form; WordPress handles its nonce and permissions. */
function ak_wst_render_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	?>
	<div class="wrap">
		<h1><?php echo esc_html__( 'Site Toolkit', 'wordpress-site-toolkit' ); ?></h1>
		<p><?php echo esc_html__( 'Add one maintenance item per line. Display the list on any page with [site_toolkit_checklist].', 'wordpress-site-toolkit' ); ?></p>
		<form action="options.php" method="post">
			<?php settings_fields( 'ak_wst_settings' ); ?>
			<label for="ak-wst-checklist"><strong><?php echo esc_html__( 'Maintenance checklist', 'wordpress-site-toolkit' ); ?></strong></label>
			<p><textarea id="ak-wst-checklist" name="<?php echo esc_attr( AK_WST_OPTION ); ?>" rows="8" cols="70" class="large-text code"><?php echo esc_textarea( get_option( AK_WST_OPTION, '' ) ); ?></textarea></p>
			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}


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
require_once plugin_dir_path( __FILE__ ) . 'includes/class-shortcode.php';
