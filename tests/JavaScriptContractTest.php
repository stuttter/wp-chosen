<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class JavaScriptContractTest extends TestCase {
	/** @var string */
	private $script;

	protected function setUp(): void {
		$this->script = (string) file_get_contents( dirname( __DIR__ ) . '/wp-chosen/assets/js/wp-chosen.js' );
	}

	public function test_search_behavior_remains_conservative_and_contains_matches(): void {
		$this->assertStringContainsString( 'disable_search_threshold: 13', $this->script );
		$this->assertStringContainsString( 'search_contains: true', $this->script );
	}

	public function test_known_enhanced_select_implementations_remain_excluded(): void {
		$this->assertStringContainsString( '[class*=chosen]', $this->script );
		$this->assertStringContainsString( '[class*=select2]', $this->script );
		$this->assertStringContainsString( '[class*=wc-enhanced-select]', $this->script );
	}

	public function test_dynamic_wordpress_interfaces_continue_to_refresh_chosen(): void {
		$this->assertStringContainsString( "postbox-toggled", $this->script );
		$this->assertStringContainsString( "bp-xprofile-show-options", $this->script );
		$this->assertStringContainsString( "#display_name' ).trigger( 'chosen:updated'", $this->script );
	}
}
