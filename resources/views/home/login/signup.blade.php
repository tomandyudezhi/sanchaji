
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>三叉戟博客注册</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	

  

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">
	
	<link rel="stylesheet" href="/homelogin/css/bootstrap.min.css">
	<link rel="stylesheet" href="/homelogin/css/animate.css">
	<link rel="stylesheet" href="/homelogin/css/style.css">
	<link rel="stylesheet" type="text/css" href="/layui/css/layui.css">
    <script type="text/javascript" src="/layui/layui.all.js"></script>

	<!-- Modernizr JS -->
	<script src="/homelogin/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body class="style-3">

		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-push-8">
					<!-- 注册表单开始 -->
					<form action="/signup/check" method="post" class="fh5co-form animate-box" data-animate-effect="fadeInRight">
					{{ csrf_field() }}
						<h2>注 册</h2>
						<div class="form-group">
							<label for="name" class="sr-only">姓名</label>
							<input type="text" class="form-control" id="username" title="" placeholder="用户名"  name="username">
						</div>
						<div class="form-group">
							<label for="email" class="sr-only">邮箱</label>
							<input type="text" class="form-control" id="email" placeholder="邮箱" name="email">
						</div>
						<div class="form-group">
							<label for="phone" class="sr-only">电话</label>
							<input type="text" class="form-control" id="phone" placeholder="电话" name="phone">
						</div>
						<div class="form-group">
							<label for="password" class="sr-only">密码</label>
							<input type="password" class="form-control" id="password" placeholder="密码"  name="password">
						</div>
						<div class="form-group">
							<label for="re-password" class="sr-only">重复密码</label>
							<input type="password" class="form-control" id="repass" placeholder="重复密码"  name="repass">
							<input type="hidden" value="2" name="qx">
						</div>
						<div class="form-group">
							<p>有账号？ <a href="/login">立即登陆</a></p>
						</div>
						<div class="form-group">
							<input type="submit" value="立即注册" class="btn btn-primary">
						</div>
					</form>
					<!-- 注册表单结束 -->


				</div>
			</div>
			<div class="row" style="padding-top: 60px; clear: both;">
				<div class="col-md-12 text-center"><p><small>&copy; All Rights Reserved. More Templates <a href="javascript:void(0);" target="_blank" title="三叉戟小组" onclick="confirm('本项目由三叉戟小组倾力之作')">三叉戟小组</a> - Collect from <a href="javascript:void(0);" title="三叉戟" target="_blank" onclick="confirm('赞美万能的三叉戟小组')">三叉戟</a></small></p></div>
			</div>
		</div>

		<!-- 消息提示开始 -->
		@if(count($errors) >0)
        	<input type="hidden" value="{{$errors -> all()[0]}}" id="hidd" >
			<script type="text/javascript">
				var msg = document.getElementById('hidd');
				layer.msg(msg.value);
			</script>
        @endif
		<!-- 消息提示结束 -->
	
	<!-- jQuery -->
	<script src="/homelogin/js/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="/homelogin/js/bootstrap.min.js"></script>
	<!-- Placeholder -->
	<script src="/homelogin/js/jquery.placeholder.min.js"></script>
	<!-- Waypoints -->
	<script src="/homelogin/js/jquery.waypoints.min.js"></script>
	<!-- Main JS -->
	<script src="/homelogin/js/main.js"></script>

	<script type="text/javascript">
		$('input').eq(1).focus(function(){
		layer.msg('以字母开头由下划线和数字组成的6-16位名字');
		});
		$('input').eq(2).focus(function(){
		layer.msg('请注意邮箱格式');
		});
		$('input').eq(3).focus(function(){
		layer.msg('至少8位');
		});
		$('input').eq(4).focus(function(){
		layer.msg('重复以确认密码');
		});
	</script>
	</body>
</html>

