@extends('admin.commit.commit')

<!-- 搜索开始 -->
@section('search')
		<form action="" method="get">
			<input type="text" name="searchname" value="" placeholder="搜索评论内容..." >	
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
	
	<!-- 表单验证 -->
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	<!-- 验证结束 -->

	<div class="agile-tables">
		<h2 class="text-primary">评论列表</h2>
		<table class="table table-bordered">
			<tr class="bg-warning text-center">
				<th class="text-white">ID</th>
				<th class="text-white">发布人</th>
				<th class="text-white">所属文章</th>
				<th class="text-white">评论内容</th>
				<th class="text-white text-center">操作</th>
			</tr>
			@foreach($data as $k => $v)
			<tr>
				<td>{{ $v -> id }}</td>
				<td>{{ $v -> users -> username}}</td>
				<td>{{ $v -> articles -> title}}</td>
				<td>{{ $v -> content }}</td>
				<th style="text-align:center;">
					<a href="/admin/review/delete/{{$v->id}}" class="bg-danger btn">删除</a>
				</th>
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