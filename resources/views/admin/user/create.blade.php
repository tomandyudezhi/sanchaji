@extends('admin.commit.commit')

@section('title')
用户添加
@endsection

@section('content')

<!-- 内容开始 -->


  <div class="grid-form1">
  	      
  <div class="panel-body">
  					<h2 id="h2.-bootstrap-heading">用户添加<a class="anchorjs-link" href="#h2.-bootstrap-heading"><span class="anchorjs-icon"></span></a></h2>
  					@if (count($errors) > 0)
  						<div class="alert alert-warning alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						    @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					        @endforeach
						</div>
					@endif
					@if (session('error'))
  						<div class="alert alert-danger alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						   {{session('error')}}
						</div>
					@endif
					<form role="form" class="form-horizontal" action="/admin/user/store" method="post">
						{{csrf_field()}}
						<div class="form-group ">
							<label class="col-md-2 control-label">用户名</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									<input type="text" name="username" class="form-control1" placeholder="用户名为8-16位以字母开头的字母数字下划线组合">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">密码</label>
							<div class="col-md-8">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-key"></i>
									</span>
									<input type="password" class="form-control1" name="password" placeholder="请输入至少8位密码">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">确认密码</label>
							<div class="col-md-8">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-key"></i>
									</span>
									<input type="password" class="form-control1" name="repass" placeholder="请再输入一次密码">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">性别</label>
							<div class="col-md-8">
								<div class="input-group">
									<input type="radio" name="sex" value="unknown" checked><span>未知</span>
									<input type="radio" name="sex" value="m"><span>男</span>
									<input type="radio" name="sex" value="w"><span>女</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">权限</label>
							<div class="col-md-8">
								<div class="input-group">
									<input type="radio" name="qx" value="2" checked><span>博客站主</span>
									<input type="radio" name="qx" value="1"><span>管理员</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">电话</label>
							<div class="col-md-8">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-phone"></i>
									</span>
									<input type="text" class="form-control1" name="phone" placeholder="请输入您的电话号码">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">邮箱</label>
							<div class="col-md-8">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-envelope-o"></i>
									</span>
									<input type="text" class="form-control1" name="email" placeholder="请输入您的邮箱">
								</div>
							</div>
						</div>
						 <div class="panel-footer">
							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									<button class="btn-primary btn">提交</button>
								</div>
							</div>
						 </div>
					</form>
	</div>
 	</div>
 	<!--//grid-->


<!-- 内容结束 -->

@endsection