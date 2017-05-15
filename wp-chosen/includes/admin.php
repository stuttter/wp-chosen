<?php

/**
 * Chosen Admin
 *
 * @package Plugins/Chosen/Admin
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * Enqueue chosen
 *
 * @since 0.1.0
 */
function wp_chosen_enqueue_assets() {

	/*
	 * Filterable handle to help purposely avoid conflicts
	 *
	 * @since 0.6.0
	 */
	$handle = apply_filters( 'wp_chosen_enqueue_handle', 'jquery-chosen' );

	// Vars
	$url = wp_chosen_get_plugin_url();
	$ver = wp_chosen_get_asset_version();

	// Styles
	wp_enqueue_style( $handle,     $url . 'assets/css/chosen.min.css', array(),          $ver );
	wp_enqueue_style( 'wp-chosen', $url . 'assets/css/wp-chosen.css',  array( $handle ), $ver );

	// Scripts
	wp_enqueue_script( $handle,     $url . 'assets/js/chosen.jquery.min.js', array( 'jquery' ), $ver );
	wp_enqueue_script( 'wp-chosen', $url . 'assets/js/wp-chosen.js',         array( $handle  ), $ver );
}

/**
 * Juggle the options reading JS
 *
 * @link https://github.com/stuttter/wp-chosen/issues/2 Bugfix
 * @since 0.4.0
 */
function wp_options_reading_juggle() {
	remove_action( 'admin_head', 'options_reading_add_js' );
}

/**
 * Add the new options-reading.php JavaScript
 *
 * @link https://github.com/stuttter/wp-chosen/issues/2 Bugfix
 * @since 0.4.0
 */
function wp_options_reading_enqueue() {
	add_action( 'admin_head', 'wp_chosen_options_reading_add_js' );
}

/**
 * Output custom JavaScript for options-reading.php
 *
 * @link https://github.com/stuttter/wp-chosen/issues/2 Bugfix
 * @since 0.4.0
 */
function wp_chosen_options_reading_add_js() {
?>
<script type="text/javascript">
	jQuery( document ).ready( function( $ ) {
		var section    = $( '#front-static-pages' ),
			staticPage = section.find( 'input:radio[value="page"]' ),
			selects    = section.find( 'select' ),
			check_disabled = function() {
				selects
					.prop( 'disabled', ! staticPage.prop( 'checked' ) )
					.trigger( 'chosen:updated' );
			};

		check_disabled();

		section
			.find( 'input:radio' )
			.change( check_disabled );
	} );
</script>
<?php
}
