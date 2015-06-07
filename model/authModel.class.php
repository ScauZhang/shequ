<?php
	class authModel {
		function check_auth($name,$password){
			$user = M('user');
			$name = strtolower($name);
			$auth =$user->findone_in_username($name);
			var_dump($auth);
			var_dump(md5($password));
			if((!empty($auth))&&$auth['password']==md5($password)){
				return $auth;
			}else{
				return false;
			}
		}

	}
?>