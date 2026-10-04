<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class StyleContractTest extends TestCase {
	public function test_chosen_search_inputs_remain_styled_independent_of_input_type(): void {
		$scss = (string) file_get_contents( dirname( __DIR__ ) . '/wp-chosen/assets/css/scss/general.scss' );
		$no_background_images = (string) file_get_contents( dirname( __DIR__ ) . '/wp-chosen/assets/css/scss/no-bg-images.scss' );

		$this->assertStringContainsString( 'input.chosen-search-input', $scss );
		$this->assertStringContainsString( 'input.chosen-search-input', $no_background_images );
		$this->assertStringNotContainsString( 'input[type=text]', $scss );
		$this->assertStringNotContainsString( 'input[type=text]', $no_background_images );
	}
}
