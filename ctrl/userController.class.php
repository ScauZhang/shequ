<?php
	class userController{
		public function login(){
			if(!empty($_POST)){
				//POST
				//var_dump($_POST);
				$this->checklogin();
			}else{
				//GET
				//获取model
				$act = M('acticle');
				$loginModel = $act->login_act();

				VIEW::assign('model',$loginModel);
				VIEW::display('login.php');
			}
		}

		private function checklogin(){
			if(empty($_POST['verify'])){
				$this->showmessage('请输入验证码！', 'index.php?ctrl=user&method=login');
			}
			if(empty($_POST['name'])||empty($_POST['password'])){
				$this->showmessage('请输入账号或密码！', 'index.php?ctrl=user&method=login');
			}
			$verify = strtolower($_SESSION['verify']);
			if($verify != strtolower(daddslashes($_POST['verify']))){
				$this->showmessage('验证码错误！', 'index.php?ctrl=user&method=login');
			}
			
			$name = daddslashes($_POST['name']);
			$password = daddslashes($_POST['password']);
			$authModel = M('auth');
			$auth = $authModel->check_auth($name,$password);
			if($auth){
				$_SESSION['auth'] = $auth;
				$this->showmessage('登录成功！', 'index.php?ctrl=user&method=index');
			}else{
				$this->showmessage('登陆失败，账号或密码错误！', 'index.php?ctrl=user&method=login');
			}
		}

		//show
		private function showmessage($info, $url){
			echo "<script>alert('$info');window.location.href='$url'</script>";
			exit;
		}
	}
?>