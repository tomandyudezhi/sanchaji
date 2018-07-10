@extends('admin.commit.commit')

<!-- 标签设置开始 -->
@section('title')
{{ $title }}
@endsection
<!-- 标签设置结束 -->

<!-- 内容开始 -->
@section('content')

	<div class="grid-form1">
	<h2 id="h2.-bootstrap-heading">网站配置<a class="anchorjs-link" href="#h2.-bootstrap-heading"><span class="anchorjs-icon"></span></a></h2>

	<!-- 提示信息开始 -->
	@if (session('success'))
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	{{session('success')}}
	</div>
	@endif

	@if (session('error'))
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	{{session('error')}}
	</div>
	@endif
	<!-- 提示信息结束 -->
	<!-- 验证 -->
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
	<!-- 验证结束 -->

	<div class="panel-body">
		<form role="form" class="form-horizontal" action="/admin/config/update/{{$data -> id}}" method="post" enctype="multipart/form-data">
		{{csrf_field()}}
			<div class="form-group">
				<label class="col-md-2 control-label">网站首页标题</label>
				<div class="col-md-8">
					<div class="input-group">							
						<span class="input-group-addon">
							<i class="fa fa-tags"></i>
						</span>
						<input type="text" class="form-control1" placeholder="网站首页标题" value="{{ $data -> title }}" name="title">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">网站关键字</label>
				<div class="col-md-8">
					<div class="input-group">							
						<span class="input-group-addon">
							<i class="fa fa-tags"></i>
						</span>
						<input type="text" class="form-control1" placeholder="网站关键字" value="{{ $data -> keywords }}" name="keywords">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">版权信息</label>
				<div class="col-md-8">
					<div class="input-group">							
						<span class="input-group-addon">
							<i class="fa fa-tags"></i>
						</span>
						<input type="text" class="form-control1" placeholder="版权信息" value="{{ $data -> copyright }}" name="copyright">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">前台网页开关</label>
				<div class="col-md-8">
					<div class="input-group">							
						<span class="input-group-addon">
							<i class="fa fa-tags"></i>
						</span>
						<select name="switch" id="">
							<option value="y" {{($data -> switch == 'y')? 'selected':''}}>关闭</option>
							<option value="n" {{($data -> switch == 'n')? 'selected':''}}>开启</option>
						</select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">LOGO</label>
				<div class="col-md-8">
					<div class="input-group">
						<input type="file" class="form-control1" placeholder="LOGO" name="logo">
						<img width="120" src="{{$logolink}}">
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
	</div>
@endsection
<!-- 内容结束 -->
