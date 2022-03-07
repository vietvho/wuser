<?php 

use Brain\Monkey\Functions;
require __DIR__ . "/../../inc/Wuser.php";

class WuserTest extends \PluginTestCase {
	public function test_initialize() {
		( new Wuser() )->initialize();
		self::assertTrue(method_exists('WuserData','init'));
		self::assertTrue(method_exists('Wrouter','register_routers'));
		self::assertTrue( 10 == has_action('wp_enqueue_scripts', [ Wuser::class, 'wuser_enqueuescripts' ]) );

	}

	public function test_enqueue() {
		
		Functions\expect( 'wp_enqueue_script' )
			->with( 'wuser_script', \Mockery::type( 'string' ), \Mockery::type( 'array' ), \Mockery::type( 'bool' ) )
			->andReturn( true );

		Functions\expect( 'wp_enqueue_style' )
		->with( 'wuser_style', \Mockery::type( 'string' ), \Mockery::type( 'array' ), \Mockery::type( 'bool' ) )
		->andReturn( true );

		Functions\expect( 'wp_localize_script' )
		->with( 'wuser_script', \Mockery::type( 'string' ), \Mockery::type( 'array' ) )
		->andReturn(  \Mockery::type( 'array' ) );
		
		Functions\expect( 'admin_url' )
		->with(  \Mockery::type( 'string' ) )
		->andReturn(  \Mockery::type( 'string' ) );

		( new Wuser() )->wuser_enqueuescripts();
		
	}
}

