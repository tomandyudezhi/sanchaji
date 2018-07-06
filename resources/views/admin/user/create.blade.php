@extends('admin.commit.commit')

@section('content')

<!-- 内容开始 -->


  <div class="grid-form1">
  	      
  <div class="panel-body">
  					<h2 id="h2.-bootstrap-heading">用户添加<a class="anchorjs-link" href="#h2.-bootstrap-heading"><span class="anchorjs-icon"></span></a></h2>
					<form role="form" class="form-horizontal">
						<div class="form-group ">
							<label class="col-md-2 control-label">用户名</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									<input type="text" class="form-control1" placeholder="Email Address">
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
									<input type="password" class="form-control1" id="exampleInputPassword1" placeholder="Password">
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
									<input type="password" class="form-control1" id="exampleInputPassword1" placeholder="Password">
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
									<input type="text" class="form-control1" id="exampleInputPassword1" placeholder="Password">
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
									<input type="text" class="form-control1" id="exampleInputPassword1" placeholder="Password">
								</div>
							</div>
						</div>
						 <div class="panel-footer">
							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									<button class="btn-primary btn">Submit</button>
								</div>
							</div>
						 </div>
					</form>
	</div>
 	</div>
 	<!--//grid-->


<!-- 内容结束 -->

@endsection