@extends('admin.commit.commit')

<!-- 标签设置开始 -->
@section('title')
{{ $title }}
@endsection
<!-- 标签设置结束 -->

<!-- 内容开始 -->
@section('content')
	<div class="grid-form1">
	<h2 id="h2.-bootstrap-heading">标签修改<a class="anchorjs-link" href="#h2.-bootstrap-heading"><span class="anchorjs-icon"></span></a></h2>

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
		<form role="form" class="form-horizontal" action="/admin/tag/update/{{$data -> id}}" method="post">
		{{csrf_field()}}
			<div class="form-group">
				<label class="col-md-2 control-label">标签</label>
				<div class="col-md-8">
					<div class="input-group">							
						<span class="input-group-addon">
							<i class="fa fa-tags"></i>
						</span>
						<input type="text" class="form-control1" placeholder="标签内容" value="{{ $data -> content }}" name="content">
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