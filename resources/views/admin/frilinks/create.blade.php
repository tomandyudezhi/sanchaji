@extends('admin.commit.commit')

<!-- 搜索开始 -->
@section('search')
		<form action="" method="get">
			<input type="text" placeholder="搜索用户名..." >	
			<input type="submit" value="">					
		</form>


@endsection
<!-- 搜索结束 -->

<!-- 内容开始 -->
@section('content')
	<div class="grid-form1">
		<div class="panel-body">
			<h2 id="h2.-bootstrap-heading">友情链接添加<a class="anchorjs-link" href="#h2.-bootstrap-heading"><span class="anchorjs-icon"></span></a></h2>
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
			<form role="form" class="form-horizontal" action="/admin/frilinks/store" method="post">
				{{csrf_field()}}
				<div class="form-group ">
					<label class="col-md-2 control-label">标题:</label>
					<div class="col-md-8">
						<div class="input-group">
							<input type="text" name="title" class="form-control1" placeholder="请输入网站标题...">
						</div>
					</div>
				</div>

				<div class="form-group ">
					<label class="col-md-2 control-label">网站描述:</label>
					<div class="col-md-8">
						<div class="input-group">
							<input type="text" name="descript" class="form-control1" placeholder="请输入网站描述...">
						</div>
					</div>
				</div>

				<div class="form-group ">
					<label class="col-md-2 control-label">网站地址:</label>
					<div class="col-md-8">
						<div class="input-group">
							<input type="text" name="url" class="form-control1" placeholder="请输入网站地址...">
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
	
@endsection
<!-- 内容结束 -->