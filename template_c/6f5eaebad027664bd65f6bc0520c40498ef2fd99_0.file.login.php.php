<?php /* Smarty version 3.1.24, created on 2015-06-07 12:45:25
         compiled from "view/login.php" */ ?>
<?php
/*%%SmartyHeaderCode:247675573cc65190234_83354025%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f5eaebad027664bd65f6bc0520c40498ef2fd99' => 
    array (
      0 => 'view/login.php',
      1 => 1433652304,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '247675573cc65190234_83354025',
  'variables' => 
  array (
    'model' => 0,
    'actItem' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5573cc651ef0b5_46929955',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5573cc651ef0b5_46929955')) {
function content_5573cc651ef0b5_46929955 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '247675573cc65190234_83354025';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登陆</title>
	<link rel="stylesheet" href="static/css/neat.css">
	<link rel="stylesheet" href="static/css/grid.css">
	<link rel="stylesheet" href="static/css/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="static/css/function.css">
</head>
<body>
	<div class="form-bg">
		<div class="form-login">
			<h1>Comp</h1>
			<p>高质量资源汇聚</p>
			<form action="index.php?ctrl=user&method=login" method="post" id="regForm">
				<div class="form-group-login">
					<a href="register.html">注册账号</a>|
					<a href="#">使用邀请码</a>
				</div>
				<div class="form-group-login">
					<label for="">用户名</label>
					<div class="form-input-login"><input type="text" placeholder="邮箱地址" name="name"></div>
				</div>
				<div class="form-group-login">
					<label for="">密码</label>
					<div class="form-input-login"><input type="password" placeholder="密码" name="password"></div>
				</div>
				<div class="form-group-login">
					<label for="">验证码</label>
					<div class="form-input-login verify-image"><input type="text" placeholder="验证码" name="verify"><img src="api/getVerify.php" title="点击，刷新"></div>
				</div>
				<div class="form-group-login">
					<input type="checkbox" name="isRemember"><span>记住我</span>|
					<a href="#">忘记密码</a>|<a href="#">微博登录</a>
				</div>
				<div class="form-group-login">
					<div class="form-button"><input type="submit" value="提交"></div>
				</div>
			</form>
		</div>
	</div>
	<div class="found-wel">
		<div class="found-more">
			<a href="#" class="more-btn">更多专栏文章</a>
			<a href="#" class="more-btn">更多专栏文章</a>
		</div>

		<ul class="dtl-comt found-comt">
			<?php
$_from = $_smarty_tpl->tpl_vars['model']->value['fav'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['actItem'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['actItem']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['actItem']->value) {
$_smarty_tpl->tpl_vars['actItem']->_loop = true;
$foreach_actItem_Sav = $_smarty_tpl->tpl_vars['actItem'];
?>
			<li>
				<div class="comt-upic">
					<a class="u-user-pic-sd" href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['actItem']->value['photo'];?>
" alt="ScauZhang"></a>
				</div>
				<div class="found-act">
					<p class="found-header">
						<a href="#"><?php echo $_smarty_tpl->tpl_vars['actItem']->value['title'];?>
</a><span><?php echo $_smarty_tpl->tpl_vars['actItem']->value['author'];?>
</span>
					</p>
					<div class="found-cont">
						<a href="#"><?php echo $_smarty_tpl->tpl_vars['actItem']->value['content'];?>
</a>
					</div>
				</div>
			</li>
			<?php
$_smarty_tpl->tpl_vars['actItem'] = $foreach_actItem_Sav;
}
if (!$_smarty_tpl->tpl_vars['actItem']->_loop) {
?>
			当前还没有内容
			<?php
}
?>
			
		</ul>

	</div>


</body>
</html><?php }
}
?>