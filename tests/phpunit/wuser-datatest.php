<?php 

use Brain\Monkey\Functions;
require __DIR__ . "/../../inc/wuser-data.php";

class WuserDataTest extends \PluginTestCase {
	public function test_init() {
		( $clsRouter = new WuserData() )->init();
		self::assertTrue( 10 == has_action('wp_ajax_get_user_list', [ WuserData::class, 'w_get_user_list' ]) );
		self::assertTrue( 10 == has_action('wp_ajax_nopriv_get_user_list', [ WuserData::class, 'w_get_user_list' ]) );
		self::assertTrue( 10 == has_action('wp_ajax_get_user_details', [ WuserData::class, 'w_get_user_details' ]) );
		self::assertTrue( 10 == has_action('wp_ajax_nopriv_get_user_details', [ WuserData::class, 'w_get_user_details' ]) );
	}

	public function test_w_get_user_list() {
		$result = ( $clsRouter = new WuserData() )->w_get_user_list();
		$result = (json_decode($result));
		self::assertTrue(json_last_error() === JSON_ERROR_NONE);
		self::assertTrue(is_array($result));
	}

	public function test_w_get_user_details() {
		// no userid
		$result = ( $clsRouter = new WuserData() )->w_get_user_details();
		$result = (json_decode($result));
		self::assertTrue(json_last_error() === JSON_ERROR_NONE);
		self::assertTrue(isset($result->error));

		// test user id not found
		$_POST['userID'] = 11;
		$result = ( $clsRouter = new WuserData() )->w_get_user_details();
		$result = (json_decode($result));
		self::assertTrue(json_last_error() === JSON_ERROR_NONE);
		self::assertTrue(isset($result->error));

		 // test get sucess
		$_POST['userID'] = 2;
		$result = ( $clsRouter = new WuserData() )->w_get_user_details();
		$result = (json_decode($result));
		self::assertTrue(json_last_error() === JSON_ERROR_NONE);
		self::assertTrue(isset($result->id));
	}
}
