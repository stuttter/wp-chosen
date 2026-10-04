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
 *
 * @return void
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
	wp_enqueue_script( $handle,     $url . 'assets/js/chosen.jquery.min.js', array( 'jquery' ), $ver, true );

	/*
	 * Chosen 4 ships an AMD-aware browser bundle. WordPress plugins can expose
	 * an AMD loader globally, but WP Chosen loads this file as a normal script
	 * and needs it to register directly on the global jQuery instance.
	 */
	wp_add_inline_script(
		$handle,
		'( function() { window.wpChosenAmdDefineStack = window.wpChosenAmdDefineStack || []; window.wpChosenAmdDefineStack.push( { hadOwn: Object.prototype.hasOwnProperty.call( window, \'define\' ), value: window.define } ); window.define = undefined; }() );',
		'before'
	);

	wp_add_inline_script(
		$handle,
		'( function() { var state = window.wpChosenAmdDefineStack.pop(); if ( state.hadOwn ) { window.define = state.value; } else { delete window.define; } if ( ! window.wpChosenAmdDefineStack.length ) { delete window.wpChosenAmdDefineStack; } }() );',
		'after'
	);

	wp_enqueue_script( 'wp-chosen', $url . 'assets/js/wp-chosen.js',         array( $handle  ), $ver, true );
}

/**
 * Juggle the options reading JS
 *
 * @link https://github.com/stuttter/wp-chosen/issues/2 Bugfix
 * @since 0.4.0
 *
 * @return void
 */
function wp_chosen_options_reading_juggle() {
	remove_action( 'admin_head', 'options_reading_add_js' );
}

/**
 * Add the new options-reading.php JavaScript
 *
 * @link https://github.com/stuttter/wp-chosen/issues/2 Bugfix
 * @since 0.4.0
 *
 * @return void
 */
function wp_chosen_options_reading_enqueue() {
	add_action( 'admin_head', 'wp_chosen_options_reading_add_js' );
}

/**
 * Output custom JavaScript for options-reading.php
 *
 * @link https://github.com/stuttter/wp-chosen/issues/2 Bugfix
 * @since 0.4.0
 *
 * @return void
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
