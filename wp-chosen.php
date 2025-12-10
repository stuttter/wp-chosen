<?php

/**
 * Plugin Name:       WP Chosen
 * Description:       Makes unwieldy select boxes more user-friendly
 * Plugin URI:        https://wordpress.org/plugins/wp-chosen
 * Author:            Triple J Software, Inc.
 * Author URI:        https://jjj.software
 * License:           GNU General Public License v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wp-chosen
 * Domain Path:       /wp-chosen/assets/lang/
 * Requires at least: 6.0
 * Requires PHP:      7.2
 * Tested up to:      7.0
 * Version:           6.1.2
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * Include the required files
 *
 * @since 0.1.0
 */
function _wp_chosen() {

	// Get the plugin path
	$plugin_path = plugin_dir_path( __FILE__ ) . 'wp-chosen/';

	// Common files
	require_once $plugin_path . 'includes/admin.php';
	require_once $plugin_path . 'includes/sponsor.php';
	require_once $plugin_path . 'includes/hooks.php';
}
add_action( 'plugins_loaded', '_wp_chosen' );

/**
 * Return the plugin URL
 *
 * @since 0.1.0
 *
 * @return string
 */
function wp_chosen_get_plugin_url() {
	return plugin_dir_url( __FILE__ ) . 'wp-chosen/';
}

/**
 * Return the asset version
 *
 * @since 0.1.0
 *
 * @return int
 */
function wp_chosen_get_asset_version() {
	return defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG
		? time()
		: 202512100001;
}
