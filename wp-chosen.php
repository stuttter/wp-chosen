<?php

/*
 * Plugin Name: WP Chosen
 * Plugin URI:  http://wordpress.org/plugins/wp-chosen/
 * Author:      John James Jacoby
 * Author URI:  https://jjj.blog
 * Version:     2.1.0
 * Description: Makes long, unwieldy select boxes much more user-friendly.
 * License:     GPLv2 or later
 */

/**
 * Enqueue chosen
 *
 * @since 0.1.0
 */
function _wp_chosen() {

	// Get the plugin path
	$plugin_path = plugin_dir_path( __FILE__ ) . 'wp-chosen/';

	// Common files
	require_once $plugin_path . 'includes/admin.php';
	require_once $plugin_path . 'includes/hooks.php';
}
add_action( 'plugins_loaded', '_wp_chosen' );

/**
 * Return the plugin's URL
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
	return 201611190001;
}
