<?php

/*
 * Plugin Name:       WP Chosen
 * Plugin URI:        https://wordpress.org/plugins/wp-chosen/
 * Author:            John James Jacoby
 * Author URI:        https://jjj.blog
 * Description:       Makes unwieldy select boxes more user-friendly
 * License:           GPLv2 or later
 * Requires at least: 5.3
 * Requires PHP:      7.0
 * Version:           5.1.0
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

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
	return 202007300001;
}
