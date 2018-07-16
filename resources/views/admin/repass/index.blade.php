<!DOCTYPE HTML>
<html>
<head>
<title>修改密码</title>
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
<link rel="stylesheet" type="text/css" href="/layui/css/layui.css">
<script type="text/javascript" src="/layui/layui.all.js"></script>
</head> 
<body>
	<div class="main-wthree">
	<div class="container">
	<div class="sin-w3-agile">
		<h2>修 改 密 码</h2>
		<form action="/admin/repass/check" method="post">
		{{ csrf_field() }}
			<div class="username">
				<span class="username">旧密码：</span>
				<input type="password" name="oldpassword" class="name" placeholder="请输入旧密码" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">新密码：</span>
				<input type="password" name="newpassword" class="name" placeholder="请输入新密码，以数字字母下划线组合至少8位" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">重复密码：</span>
				<input type="password" name="repassword" class="name" placeholder="输入相同密码" required="">
				<input type="hidden" name="id" value="{{ session()->get('adminUser')->id }}">
				<div class="clearfix"></div>
			</div>
			<div class="login-w3">
				<input type="submit" class="login" value="点击修改">
			</div>
			<div class="clearfix"></div>
		</form>
		<div class="back">
			<a href="javascript:history.back(-1)">返回</a>
		</div>
		<div class="footer">
		<p>&copy; 2018 Pooled . All Rights Reserved | Design by <a href="" onclick="confirm('本后台由三叉戟项目小组倾力制作')">三叉戟</a></p>
		</div>
	</div>
	</div>
	</div>
	<!-- 提示信息开始 -->
        @if(session('error'))
            <input type="hidden" value="{{session('error')}}" id="error1">
            <script type="text/javascript">
              var msg = document.getElementById('error1');
              layer.msg(msg.value);
            </script>
         @endif
         @if(count($errors) >0)
        	<input type="hidden" value="{{$errors -> all()[0]}}" id="hidd" >
			<script type="text/javascript">
				var msg = document.getElementById('hidd');
				layer.msg(msg.value);
			</script>
        @endif
	<!-- 提示信息结束 -->
</body>
</html>