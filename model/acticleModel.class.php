<?php
	class acticleModel {
		function login_act(){
			$fav = array(
				array(
					'photo'=>'static/images/user/1801_s.jpg',     //作者头像路径
					'title'=>'前端性能优化28建议', //文章title
					'author'=>'ScauZhang', //文章作者
					'content'=>'赞，行业风向标就这篇了。
						其实我想知道为什么很多前端开发人员用一点点后端的知识就可以漂亮解决的问题，为什么会花N倍的时间非要在浏览器上用纯前端来解决。' //文章内容
				),
				array(
					'photo'=>'static/images/user/1801_s.jpg',     //作者头像路径
					'title'=>'前端性能优化28建议', //文章title
					'author'=>'ScauZhang', //文章作者
					'content'=>'赞，行业风向标就这篇了。
						其实我想知道为什么很多前端开发人员用一点点后端的知识就可以漂亮解决的问题，为什么会花N倍的时间非要在浏览器上用纯前端来解决。' //文章内容
				),
				array(
					'photo'=>'static/images/user/1801_s.jpg',     //作者头像路径
					'title'=>'前端性能优化28建议', //文章title
					'author'=>'ScauZhang', //文章作者
					'content'=>'赞，行业风向标就这篇了。
						其实我想知道为什么很多前端开发人员用一点点后端的知识就可以漂亮解决的问题，为什么会花N倍的时间非要在浏览器上用纯前端来解决。' //文章内容
				),
				array(
					'photo'=>'static/images/user/1801_s.jpg',     //作者头像路径
					'title'=>'前端性能优化28建议', //文章title
					'author'=>'ScauZhang', //文章作者
					'content'=>'赞，行业风向标就这篇了。
						其实我想知道为什么很多前端开发人员用一点点后端的知识就可以漂亮解决的问题，为什么会花N倍的时间非要在浏览器上用纯前端来解决。' //文章内容
				),
				array(
					'photo'=>'static/images/user/1801_s.jpg',     //作者头像路径
					'title'=>'前端性能优化28建议', //文章title
					'author'=>'ScauZhang', //文章作者
					'content'=>'赞，行业风向标就这篇了。
						其实我想知道为什么很多前端开发人员用一点点后端的知识就可以漂亮解决的问题，为什么会花N倍的时间非要在浏览器上用纯前端来解决。' //文章内容
				)
			);
			$model = array(
				'fav'=>$fav
			);

			return $model;
		}
	}

?>