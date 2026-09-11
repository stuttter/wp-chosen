<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class HookRegistrationTest extends TestCase {
	public function test_runtime_hooks_remain_registered_with_their_existing_priorities(): void {
		$actions = array();
		$has_admin_initializer = false;

		foreach ( $GLOBALS['wpc_test_registered_actions'] as $action ) {
			if ( 'admin_init' === $action[0] && $action[1] instanceof Closure ) {
				$has_admin_initializer = true;
				continue;
			}

			$actions[ $action[0] . ':' . $action[1] ] = $action[2];
		}

		$this->assertSame( -99, $actions['admin_enqueue_scripts:wp_chosen_enqueue_assets'] );
		$this->assertSame( -99, $actions['customize_controls_enqueue_scripts:wp_chosen_enqueue_assets'] );
		$this->assertSame( -99, $actions['admin_head:wp_chosen_options_reading_juggle'] );
		$this->assertSame( 10, $actions['load-options-reading.php:wp_chosen_options_reading_enqueue'] );
		$this->assertSame( 10, $actions['plugins_loaded:wp_chosen_start'] );
		$this->assertTrue( $has_admin_initializer );
	}
}
