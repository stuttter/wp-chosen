<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class PluginBehaviorTest extends TestCase {
	protected function setUp(): void {
		wpc_test_reset();
	}

	public function test_plugin_url_points_to_runtime_directory(): void {
		$this->assertSame( 'https://example.test/plugins/wp-chosen/', wp_chosen_get_plugin_url() );
	}

	public function test_production_asset_version_is_stable(): void {
		$this->assertSame( 202609140001, wp_chosen_get_asset_version() );
	}

	public function test_assets_preserve_handles_dependencies_and_footer_loading(): void {
		$GLOBALS['wpc_test']['callbacks']['apply_filters:wp_chosen_enqueue_handle'] = static function () {
			return 'custom-chosen';
		};

		wp_chosen_enqueue_assets();

		$this->assertSame(
			array(
				array( 'custom-chosen', 'https://example.test/plugins/wp-chosen/assets/css/chosen.min.css', array(), 202609140001 ),
				array( 'wp-chosen', 'https://example.test/plugins/wp-chosen/assets/css/wp-chosen.css', array( 'custom-chosen' ), 202609140001 ),
			),
			$GLOBALS['wpc_test']['calls']['wp_enqueue_style']
		);
		$this->assertSame(
			array(
				array( 'custom-chosen', 'https://example.test/plugins/wp-chosen/assets/js/chosen.jquery.min.js', array( 'jquery' ), 202609140001, true ),
				array( 'wp-chosen', 'https://example.test/plugins/wp-chosen/assets/js/wp-chosen.js', array( 'custom-chosen' ), 202609140001, true ),
			),
			$GLOBALS['wpc_test']['calls']['wp_enqueue_script']
		);
	}

	public function test_reading_screen_replaces_core_script_at_the_same_hook(): void {
		wp_chosen_options_reading_juggle();
		wp_chosen_options_reading_enqueue();

		$this->assertSame(
			array( array( 'admin_head', 'options_reading_add_js' ) ),
			$GLOBALS['wpc_test']['calls']['remove_action']
		);
		$this->assertContains(
			array( 'admin_head', 'wp_chosen_options_reading_add_js', 10, 1 ),
			$GLOBALS['wpc_test']['actions']
		);
	}

	public function test_reading_screen_script_updates_chosen_after_disabling_selects(): void {
		ob_start();
		wp_chosen_options_reading_add_js();
		$output = (string) ob_get_clean();

		$this->assertStringContainsString( "#front-static-pages", $output );
		$this->assertStringContainsString( ".prop( 'disabled', ! staticPage.prop( 'checked' ) )", $output );
		$this->assertStringContainsString( ".trigger( 'chosen:updated' )", $output );
	}
}
