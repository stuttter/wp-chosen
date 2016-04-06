<?php

/**
 * Chosen Hooks
 *
 * @package Plugins/Chosen/Hooks
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

// Enqueue admin assets
add_action( 'admin_enqueue_scripts',              'wp_chosen_enqueue_assets', -99 );
add_action( 'customize_controls_enqueue_scripts', 'wp_chosen_enqueue_assets', -99 );

// options-reading.php juggle
add_action( 'admin_head',               'wp_options_reading_juggle', -99 );
add_action( 'load-options-reading.php', 'wp_options_reading_enqueue'     );
