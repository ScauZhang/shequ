<?php
	header("content-type:text/html;charset=utf-8");

	define("DB_HOST","192.168.8.132");
	define("DB_USER","scauzhang");
	define("DB_PWD","123");
	define("DB_DBNAME","geekcs_res");
	define("DB_CHARSET","utf8");

	define('URL_CTRL','ctrl');
	define('URL_METHOD','method');

	require_once('include.php');
	require_once(ROOT.'/core/mvcCore.php');
	require_once(ROOT.'/core/filter.php');
	require_once(ROOT.'/core/DB.class.php');


	class PC{
		private static $ctrl;
		private static $method;
		private static $ctrlBan = array();
		private static $methodBan = array();
		public static function init_db(){
			DB::$_host = DB_HOST;
			DB::$_user = DB_USER;
			DB::$_pwd = DB_PWD;
			DB::$_dbName = DB_DBNAME;
			DB::$_charset = DB_CHARSET;
			DB::init();
		}
		public static function init_ctrl(){
			self::$ctrl = isset($_GET[URL_CTRL])?daddslashes($_GET[URL_CTRL]):'index';
			self::$ctrl = (!in_array(self::$ctrl,$ctrlBan))?self::$ctrl:'ban';
		}
		public static function init_method(){
			self::$method = isset($_GET[URL_METHOD])?daddslashes($_GET[URL_METHOD]):'index';
		}
		public static function init_view(){
			VIEW::init();
		}
		public static function start(){
			C(self::$ctrl,self::$method);
		}
	}


	PC::init_db();

	PC::init_ctrl();
	PC::init_method();
	//初始视图
	PC::init_view();
	PC::start();
?>