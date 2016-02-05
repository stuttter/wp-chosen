<?php

/*
 * Plugin Name: WP Chosen
 * Plugin URI:  http://wordpress.org/plugins/wp-chosen/
 * Author:      John James Jacoby
 * Author URI:  http://jjj.me
 * Version:     0.2.1
 * Description: Makes long, unwieldy select boxes much more user-friendly.
 * License:     GPLv2 or later
 */

/**
 * Enqueue chosen
 *
 * @since 0.1.0
 */
function _wp_chosen() {

	// Vars
	$url = wp_chosen_get_plugin_url();
	$ver = wp_chosen_get_asset_version();

	// Styles
	wp_enqueue_style( 'chosen',     $url . 'assets/css/chosen.min.css', array(),           $ver );
	wp_enqueue_style( 'wp-chosen',  $url . 'assets/css/wp-chosen.css',  array( 'chosen' ), $ver );

	// Scripts
	wp_enqueue_script( 'chosen',    $url . 'assets/js/chosen.jquery.min.js', array( 'jquery'           ), $ver, true );
	wp_enqueue_script( 'wp-chosen', $url . 'assets/js/wp-chosen.js',         array( 'chosen', 'jquery' ), $ver, true );
}
add_action( 'admin_enqueue_scripts', '_wp_chosen' );

/**
 * Return the plugin's URL
 *
 * @since 0.1.0
 *
 * @return string
 */
function wp_chosen_get_plugin_url() {
	return plugin_dir_url( __FILE__ );
}

/**
 * Return the asset version
 *
 * @since 0.1.0
 *
 * @return int
 */
function wp_chosen_get_asset_version() {
	return 201602050002;
}
