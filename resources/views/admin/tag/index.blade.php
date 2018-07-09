@extends('admin.commit.commit')

<!-- 搜索开始 -->
@section('search')
		<form action="" method="get">
			{{ csrf_field() }}
			<input type="text" name="searchname" value="" placeholder="搜索标签所属文章..." >	
			<input type="submit" value="">					
		</form>
@endsection
<!-- 搜索结束 -->

<!-- 标签设置开始 -->
@section('title')
{{ $title }}
@endsection
<!-- 标签设置结束 -->

<!-- 内容开始 -->
@section('content')
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


	<div class="agile-tables">
		<h2 class="text-primary">标签列表</h2>
		<table class="table table-bordered">
			<tr class="text-center" style="background:#6852B2;">
				<th class="text-white">ID</th>
				<th class="text-white">添加人</th>
				<th class="text-white">所属文章</th>
				<th class="text-white">内容</th>
				<th class="text-white">添加时间</th>
				<th class="text-white text-center">操作</th>
			</tr>
			@foreach($data as $v)
			<tr>
				<td>{{ $v -> id }}</td>
				<td>{{ $v -> users -> username }}</td>
				<td>{{ $v -> articles -> title }}</td>
				<td>{{ $v -> content }}</td>
				<td>{{ $v -> created_at }}</td>
				<td style="text-align:center;">
					<a href="/admin/tag/edit/{{$v -> id}}" class="bg-warning btn">修改</a>
					<a href="/admin/tag/delete/{{ $v -> id }}" class="bg-danger btn">删除</a>
				</td>
			</tr>
			@endforeach
		</table>
		<!-- 分页 -->
		<div style="text-align:center;">
		{!! $data->appends(['searchname' => $searchname])->render() !!}
		</div>
	</div>
@endsection
<!-- 内容结束 -->