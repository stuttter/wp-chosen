<?php

declare(strict_types=1);

define( 'ABSPATH', dirname( __DIR__ ) . '/' );
define( 'SCRIPT_DEBUG', false );

$GLOBALS['wpc_test'] = array();

function wpc_test_reset() {
	$GLOBALS['wpc_test'] = array(
		'actions'   => array(),
		'calls'     => array(),
		'callbacks' => array(),
	);
}

function wpc_test_call( $name, $arguments ) {
	$GLOBALS['wpc_test']['calls'][ $name ][] = $arguments;

	if ( isset( $GLOBALS['wpc_test']['callbacks'][ $name ] ) ) {
		return $GLOBALS['wpc_test']['callbacks'][ $name ]( ...$arguments );
	}

	return null;
}

function add_action( $hook, $callback, $priority = 10, $accepted_args = 1 ) {
	$GLOBALS['wpc_test']['actions'][] = array( $hook, $callback, $priority, $accepted_args );
}

function remove_action( ...$arguments ) {
	return wpc_test_call( __FUNCTION__, $arguments );
}

function apply_filters( $hook, $value, ...$arguments ) {
	$result = wpc_test_call( __FUNCTION__ . ':' . $hook, array_merge( array( $value ), $arguments ) );

	return null === $result ? $value : $result;
}

function plugin_dir_path( $file ) {
	return dirname( $file ) . '/';
}

function plugin_dir_url( $file ) {
	return 'https://example.test/plugins/';
}

function wp_enqueue_style( ...$arguments ) {
	return wpc_test_call( __FUNCTION__, $arguments );
}

function wp_enqueue_script( ...$arguments ) {
	return wpc_test_call( __FUNCTION__, $arguments );
}

wpc_test_reset();

require_once dirname( __DIR__ ) . '/wp-chosen.php';
wp_chosen_start();

$GLOBALS['wpc_test_registered_actions'] = $GLOBALS['wpc_test']['actions'];
