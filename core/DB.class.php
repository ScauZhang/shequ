<?php

	require_once 'include.php';
	require_once ROOT.'/lib/mysql.func.php';
	
	class DB{
		public static $_host;
		public static $_user;
		public static $_pwd;
		public static $_charset;
		public static $_dbName;
		private static $_link;
		public static function init(){
			$_link=connect(self::$_host,self::$_user,self::$_pwd,self::$_charset,self::$_dbName);
		}
		public static function insert($table,$array){
			return insert($table,$array);
		}

		public static function update($table,$array,$where=null){
			return update($table,$array,$where);
		}

		public static function delete($table,$where=null){
			return delete($table,$where);
		}

		public static function fetchOne($sql,$result_type=MYSQL_ASSOC){
			return fetchOne($sql,$result_type);
		}

		public static function fetchAll($sql,$result_type=MYSQL_ASSOC){
			return fetchAll($sql,$result_type);
		}

		public static function getResultNum($sql){
			return getResultNum($sql);
		}
		public static function getInsertId(){
			return getInsertId();
		}
	}

?>