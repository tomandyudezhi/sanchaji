<!DOCTYPE HTML>
<html>
<head>
<title>三叉戟博客登陆</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="/admins/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="/admins/css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="/admins/css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="/admins/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="/admins/css/jquery-ui.css"> 
<!-- jQuery -->
<script src="/admins/js/jquery-2.1.4.min.js"></script>
<link rel="stylesheet" href="/admins/css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
</head> 
<body>
	<div class="main-wthree">
	<div class="container">
	<h1 class="text-center text-white">三叉戟博客后台管理站</h1>
	<div class="sin-w3-agile">
		<h2>登陆</h2>
		<form action="/admin/login/check" method="post">
		{{ csrf_field() }}
			<div class="username">
				<span class="username">用户名：</span>
				<input type="text" name="username" class="name" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">密	码：</span>
				<input type="password" name="password" class="password" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="login-w3">
				<input type="submit" class="login" value="登 陆">
			</div>
			<div class="clearfix"></div>
		</form>
			<div class="back">
				<a href="" onclick="confirm('返回啥啊，都到头了，不是管理员就别瞎进')">Back to home</a>
			</div>
			<div class="footer">
				<p>&copy; 2018 Pooled . All Rights Reserved | Design by <a href="" onclick="confirm('本后台由三叉戟项目小组倾力制作')">三叉戟</a></p>
			</div>
	</div>
	</div>
	</div>
	<!-- 提示信息开始 -->
		@if(session('success'))
            <input type="hidden" value="{{session('success')}}" id="success1">
            <script type="text/javascript">
              var msg = document.getElementById('success1');
              layer.msg(msg.value);
            </script>
        @endif
        @if(session('error'))
            <input type="hidden" value="{{session('error')}}" id="error1">
            <script type="text/javascript">
              var msg = document.getElementById('error1');
              layer.msg(msg.value);
            </script>
         @endif
	<!-- 提示信息结束 -->
</body>
</html>