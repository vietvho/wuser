<?php 

use Brain\Monkey\Functions;
require __DIR__ . "/../../inc/router.php";

class WrouterTest extends \PluginTestCase {
	
	public function test_register_router() {
		( $clsRouter = new Wrouter() )->register_routers(['t'=>'short.php','te st'=>'sample.php']);
		global $wrouter;
		self::assertTrue($wrouter === ['t'=>'short.php','te-st'=>'sample.php']);
		self::assertTrue(method_exists($clsRouter,'init'));
	}

	public function test_init() {
		( $clsRouter = new Wrouter() )->init();
		self::assertTrue( 10 == has_filter('template_include', [ Wrouter::class, 'wuser_register_template' ]) );
	}

	public function test_wuser_register_template() {
		global $wp;
		global $wrouter;
		$wrouter = ['t'=>'short.php','te-st'=>'sample.php'];
		$wp = (object) ['request'=>'t/page'];

		// active on current slug
		$result = ( new Wrouter() )->wuser_register_template('default.php');
		self::assertTrue( 10 == has_filter('document_title_parts', [ Wrouter::class, 'wuser_modify_404_page_title' ]) );
		self::assertTrue( 10 == has_filter('redirect_canonical',  '__return_false') );
		self::assertTrue( $result === "short.php" );

		//load default template for the other slugs
		$wp = (object) ['request'=>'other/page'];
		$result = ( new Wrouter() )->wuser_register_template('default.php');
		self::assertTrue($result === 'default.php');
	}

}
