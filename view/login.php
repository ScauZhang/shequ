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
			{foreach item=actItem from=$model.fav}
			<li>
				<div class="comt-upic">
					<a class="u-user-pic-sd" href="#"><img src="{$actItem.photo}" alt="ScauZhang"></a>
				</div>
				<div class="found-act">
					<p class="found-header">
						<a href="#">{$actItem.title}</a><span>{$actItem.author}</span>
					</p>
					<div class="found-cont">
						<a href="#">{$actItem.content}</a>
					</div>
				</div>
			</li>
			{foreachelse}
			当前还没有内容
			{/foreach}
			
		</ul>

	</div>


</body>
</html>