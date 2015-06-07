<?php
	class userModel{
		public $_table ='user';
		function findone_in_username($name){
			$sql = 'SELECT id,password FROM '.$this->_table.' where name=\''.$name.'\'';
			return DB::fetchOne($sql);
		}
	}
?>