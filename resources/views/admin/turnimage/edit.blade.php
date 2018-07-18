@extends('admin.commit.commit')

<!-- 标签设置开始 -->
@section('title')
轮播图修改
@endsection
<!-- 标签设置结束 -->

<!-- 内容开始 -->
@section('content')
	<div class="grid-form1">
		<div class="panel-body">
			<h2 id="h2.-bootstrap-heading">轮播图修改<a class="anchorjs-link" href="#h2.-bootstrap-heading"><span class="anchorjs-icon"></span></a></h2>
	<!-- 消息提示开始 -->
	@if(session('error'))
            <input type="hidden" value="{{session('error')}}" id="error1">
            <script type="text/javascript">
	            var msg = document.getElementById('error1');
	            layer.msg(msg.value);
            </script>
     @endif
	<!-- 消息提示结束 -->
			<form role="form" class="form-horizontal" action="/admin/turnimage/update/{{ $data -> id }}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="form-group ">
					<label class="col-md-2 control-label">轮播图标题:</label>
					<div class="col-md-8">
						<div class="input-group">
							<input type="text" name="title" class="form-control1" placeholder="请轮播图标题..." value="{{ $data -> title }}">
						</div>
					</div>
				</div>

				<div class="form-group ">
					<label class="col-md-2 control-label">上传轮播图:</label>
					<div class="col-md-8">
						<div class="input-group">
							<input type="file" name="pic" class="form-control1" placeholder="">
							<img src="{{ $data -> pic }}" alt="" width="164">
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
			<hr>
			<p style="float:right;color:red;font-size:20px;">Tips:至多提交4个轮播图，且规格为820px × 200px</p>
		</div>
	</div>
	
@endsection
<!-- 内容结束 -->