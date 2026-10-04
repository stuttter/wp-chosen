<?php
/**
 * Style contract tests.
 *
 * @package WP_Chosen
 */

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Tests that source styles remain compatible with Chosen's generated markup.
 */
final class StyleContractTest extends TestCase {
	/**
	 * Chosen search inputs must remain styled when their input type changes.
	 */
	public function test_chosen_search_inputs_remain_styled_independent_of_input_type(): void {
		// phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- Test reads a local source fixture.
		$scss = (string) file_get_contents( dirname( __DIR__ ) . '/wp-chosen/assets/css/scss/general.scss' );

		// phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- Test reads a local source fixture.
		$no_background_images = (string) file_get_contents( dirname( __DIR__ ) . '/wp-chosen/assets/css/scss/no-bg-images.scss' );

		$this->assertStringContainsString( 'input.chosen-search-input', $scss );
		$this->assertStringContainsString( 'input.chosen-search-input', $no_background_images );
		$this->assertStringNotContainsString( 'input[type=text]', $scss );
		$this->assertStringNotContainsString( 'input[type=text]', $no_background_images );
	}
}
