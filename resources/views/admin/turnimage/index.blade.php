@extends('admin.commit.commit')

<!-- 标签设置开始 -->
@section('title')
轮播图列表
@endsection
<!-- 标签设置结束 -->

<!-- 内容开始 -->
@section('content')
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

	<div class="agile-tables">
		<h2 class="text-primary">轮播图列表</h2>
		<hr>
		<table class="table table-bordered">
			<tr class="bg-warning text-center">
				<th class="text-white">ID</th>
				<th class="text-white">轮播图标题</th>
				<th class="text-white">轮播图</th>
				<th class="text-white text-center">操作</th>
			</tr>
			@foreach($data as $k => $v)
			<tr>
				<td>{{ $v -> id }}</td>
				<td>{{ $v -> title}}</td>
				<td><img src="{{ $v -> pic}}" alt="" width="225"></td>
				<th style="text-align:center;">
					<a href="/admin/turnimage/edit/{{$v->id}}" class="bg-warning btn">修改</a>
					<a href="/admin/turnimage/delete/{{$v->id}}" class="bg-danger btn">删除</a>
				</th>
			</tr>
			@endforeach
		</table>
		<p style="float:right;color:red;font-size:20px;">Tips:至多提交4个轮播图</p>
	</div>
@endsection
<!-- 内容结束 -->
