@extends('admin.commit.commit')

<!-- 搜索开始 -->
@section('search')
		<form action="/admin/frilinks/index" method="get">
			<input type="text" name="search" placeholder="搜索网站标题..." >	
			<input type="submit" value="">					
		</form>


@endsection
<!-- 搜索结束 -->

<!-- 内容开始 -->
@section('content')
	<div class="agile-tables">
	@if(session('error'))
	<div class="alert alert-warning alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  {{session('error')}}
	</div>
	@endif
	@if(session('success'))
	<div class="alert alert-success alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  {{session('success')}}
	</div>
	@endif
		<h2 class="text-primary">友情链接列表</h2>
		<hr>
		<table class="table table-bordered">
			<tr class="bg-warning text-center">
				<th class="text-white">ID</th>
				<th class="text-white">网站标题</th>
				<th class="text-white">网站描述</th>
				<th class="text-white">网站地址</th>
				<th class="text-white">添加时间</th>
				<th class="text-white">更新时间</th>
				<th class="text-white">操作</th>
			</tr>
			@foreach($data as $v)
			<tr>
				<td>{{$v->id}}</td>
				<td>{{$v->title}}</td>
				<td>{{$v->descript}}</td>
				<td>{{$v->url}}</td>
				<td>{{$v->created_at}}</td>
				<td>{{$v->updated_at}}</td>
				<td class="text-center">
					<a href="/admin/frilinks/edit/{{$v->id}}" class="btn btn-xs btn-info">修改</a>
					<a href="/admin/frilinks/delete/{{$v->id}}" class="btn bg-danger btn-xs btn-danger">删除</a>
				</td>
			</tr>
			@endforeach
		</table>
		<div style="text-align:center">{!! $data->appends(['search'=>$search])->render() !!}</div>
	</div>
@endsection
<!-- 内容结束 -->