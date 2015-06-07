<?php


	define('CTRL_DIR', 'ctrl');
	define('MODEL_DIR', 'model');
	define('VIEW_DIR', 'view');

	function C($name,$method){
		require_once(ROOT.'/'.CTRL_DIR.'/'.$name.'Controller.class.php');
		eval('$ctrl = new '.$name.'Controller();$ctrl->'.$method.'();');
	}

	function M($name){
		require_once(ROOT.'/'.MODEL_DIR.'/'.$name.'Model.class.php');
		eval('$model = new '.$name.'Model();');
		return $model;
	}

	//视图层
	class VIEW{
		private static $v;

		public static function init(){
			//smarty配置
			require(ROOT.'/core/smarty/Smarty.class.php');
			$smarty = new Smarty();
			$smarty->left_delimiter = '{';
			$smarty->right_delimiter = '}';
			$smarty->template_dir = 'view';
			$smarty->compile_dir = 'template_c';
			$smarty->cache_dir ='cache';
			$smarty->cacheing = true;
			$smarty->cache_lifetime = 120;
			self::$v = $smarty;
		}

		public static function assign($modelName,$model){
			self::$v->assign($modelName,$model);
		}
		public static function display($tpl){
			self::$v->display($tpl);
		}
	}
?>