<!DOCTYPE HTML>
<html>
<head>
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
<!-- jQuery -->
<script src="/admins/js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='http://fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="/admins/css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<link rel="stylesheet" type="text/css" href="/layui/css/layui.css">
<script type="text/javascript" src="/layui/layui.all.js"></script>
</head>
<body>
	<div class="container">
		<form id="form" role="form" class="form-inline" action="/admin/user/detail/details_store/{{$user ->id}}" method="post">
			{{csrf_field()}}
			<div class="form-inline ">
				<label class="col-md-2 control-label">昵称</label>
				<div class="col-md-4">
					<div class="input-group">
						<input type="text" name="pet_name" value="{{$user -> users_details -> pet_name or ''}}" class="form-control1" placeholder="请输入你的昵称...">
					</div>
				</div>
			</div>
			<div class="form-inline ">
				<label class="col-md-2 control-label">职业</label>
				<div class="col-md-4">
					<div class="input-group">
						<input type="text" name="profession" value="{{$user -> users_details -> profession or ''}}" class="form-control1" placeholder="请输入你的职业...">
					</div>
				</div>
			</div>
			<div class="form-inline ">
				<label class="col-md-2 control-label">生日</label>
				<div class="col-md-8">
					<div class="input-group">
						<input type="text" name="birthday" value="{{$user -> users_details -> birthday or ''}}" class="form-control1" placeholder="请输入你的生日...">
					</div>
				</div>
			</div>
			<div class="form-inline ">
				<label class="col-md-2 control-label">行业</label>
				<div class="col-md-8">
					<div class="input-group">
						<input type="text" name="industry" value="{{$user -> users_details -> industry or ''}}" class="form-control1" placeholder="请输入你的行业...">
					</div>
				</div>
			</div>
			<div class="form-inline ">
				<label class="col-md-2 control-label">地址</label>
				<div class="col-md-8">
					<div class="input-group">
						<input type="text" name="addr" value="{{$user -> users_details -> addr or ''}}" class="form-control1" placeholder="请输入你的地址...">
					</div>
				</div>
			</div>
			<div class="form-inline ">
				<label class="col-md-2 control-label">自我描述</label>
				<div class="col-md-8">
					<div class="input-group">
						<textarea class="form-control1"  name="descript" style="height:100px;" placeholder="请输入你的描述,不多于300字符....">{{$user -> users_details -> descript or ''}}</textarea>
					</div>
				</div>
			</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-sm-8 col-sm-offset-2">
							<button class="btn-primary btn">修改</button>
						</div>
					</div>
				 </div>
		</form>
	</div>
</body>
