<?php
define( 'PLUGIN_PHPUNIT', true );
if ( ! defined( 'ABSPATH' ) ) {define( 'ABSPATH', sys_get_temp_dir() );}
if ( ! defined( 'PLUGIN_ABSPATH' ) ) {define( 'PLUGIN_ABSPATH', sys_get_temp_dir() . '/wp-content/plugins/wuser' );}
if (! defined('WUSER_PATH')) { define('WUSER_PATH',dirname(dirname(__DIR__)));}
if (! defined('WUSER_URL')) { define('WUSER_URL','anyurl'); }

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/inc/PluginTestCase.php';

