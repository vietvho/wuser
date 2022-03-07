<?php
/**
 * Plugin Name: Wuser
 * Plugin URI: 
 * Description: warren is playing with fetch and showing users.
 * Version: 1.0
 * Author: Warren Nguyen
 * Author URI: https://www.linkedin.com/in/warren-nguyen-471b28a6/
 * Text Domain: wuser
 */
defined( 'ABSPATH' ) || exit;
define('WUSER_PATH', plugin_dir_path( __FILE__ ) );
define('WUSER_URL', plugins_url('',__FILE__) );
define('WUSER_VERSION', '1.0');

include WUSER_PATH.'/inc/Wuser.php';

/*
 * wuser
 * @date	3/3/2022
 * @since	1.0
 * load Wuser and the other library
 * @param	void
 * @return	WUSER
 */
function wuser() {
	global $wuser;
	
	// Instantiate only once.
	if( !isset($wuser) ) {
		$wuser = new Wuser();
		$wuser->initialize();
	}
	return $wuser;
}

// Instantiate.
wuser();
?>