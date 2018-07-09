@extends('admin.commit.commit')

@section('title')
文章添加
@endsection

<!-- 内容开始 -->
@section('content')
	<!-- 配置文件 -->
    <script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/ueditor/ueditor.all.js"></script>
	<div class="grid-form1">
		<div class="panel-body">
			<h2 id="h2.-bootstrap-heading">文章添加<a class="anchorjs-link" href="#h2.-bootstrap-heading"><span class="anchorjs-icon"></span></a></h2>
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
			<form role="form" class="form-horizontal" action="/admin/article/store" method="post">
				{{csrf_field()}}
				<div class="form-group ">
					<label class="col-md-2 control-label">标题</label>
					<div class="col-md-8">
						<div class="input-group">
							<input type="text" name="title" class="form-control1" placeholder="请输入标题...">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">文章内容</label>
					<div class="col-md-8">
						<!-- 加载编辑器的容器 -->
					    <script id="container" name="content" type="text/plain" style="height:400px;">
					    </script>
					    <!-- 实例化编辑器 -->
					    <script type="text/javascript">
					        var ue = UE.getEditor('container');
					    </script>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">文章类型</label>
					<div class="col-md-8">
						<div class="form-control" >
							<input type="radio" name="a_type" value="未知" checked><span>未知</span>
							<input type="radio" name="a_type" value="原创"><span>原创</span>
							<input type="radio" name="a_type" value="转载"><span>转载</span>
							<input type="radio" name="a_type" value="翻译"><span>翻译</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">文章分类</label>
					<div class="col-md-8">
						<div class="input-group">
							<select name="pid" class="form-control">
								<option value="">--请选择--</option>
								@foreach($part_data as $v)
									<option value="{{$v -> id}}">{{ $v-> part_name }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">私密</label>
					<div class="col-md-8">
						<div class="form-control">
							<input type="radio" name="hidd" value="n" checked><span>否</span>
							<input type="radio" name="hidd" value="y"><span>是</span>
						</div>
					</div>
				</div>
				<div class="form-group ">
					<label class="col-md-2 control-label">文章标签</label>
					<div class="col-md-8">
						<div class="input-group">
							<input type="text" name="tags" class="form-control1" placeholder="请输入标签...">
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