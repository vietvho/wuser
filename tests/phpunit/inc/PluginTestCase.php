

<?php
use PHPUnit\Framework\TestCase;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Brain\Monkey;

/**
 * An abstraction over WP_Mock to do things fast
 * It also uses the snapshot trait
 */
class PluginTestCase extends \PHPUnit\Framework\TestCase {
	use MockeryPHPUnitIntegration;

	/**
	 * Setup which calls \WP_Mock setup
	 *
	 * @return void
	 */
	public function setUp(): void {
		parent::setUp();
		Monkey\setUp();
		// A few common passthrough
		// 1. WordPress i18n functions
		Monkey\Functions\when( '__' )
			->returnArg( 1 );
		Monkey\Functions\when( '_e' )
			->returnArg( 1 );
		Monkey\Functions\when( '_n' )
			->returnArg( 1 );
			
		// A simple mock for `plugin_dir_path` to return a sample URL
		Monkey\Functions\when( 'plugin_dir_path' )
		->justReturn(PLUGIN_ABSPATH);

		// A simple mock for `plugins_url` to return a sample URL
		Monkey\Functions\when( 'plugins_url' )
		->justReturn( 'http://pluginurl.warrennguyen' );
		
		// A simple mock for `get_header` to return a sample string
		Monkey\Functions\when( 'get_header' )
		->justReturn( 'header' );
		
		// A simple mock for `get_header` to return a sample string
		Monkey\Functions\when( 'get_Footer' )
		->justReturn( 'footer' );
	}

	/**
	 * Teardown which calls \WP_Mock tearDown
	 *
	 * @return void
	 */
	public function tearDown(): void {
		Monkey\tearDown();
		parent::tearDown();
	}
}

