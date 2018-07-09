@extends('admin.commit.commit')

<!-- 搜索开始 -->
@section('search')
		<form action="/admin/parts/index" method="get">
			<input type="text" name="search" placeholder="搜索用户名..." >	
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
		<h2 class="text-primary">分类列表</h2>
		<table class="table table-bordered">
			<tr class="bg-warning text-center">
				<th class="text-white">ID</th>
				<th class="text-white">分类名</th>
				<th class="text-white">创建时间</th>
				<th class="text-white">修改时间</th>
				<th class="text-white">操作</th>
			</tr>
			@foreach($data as $v)
			<tr>
				<td>{{$v->id}}</td>
				<td>{{$v->part_name}}</td>
				<td>{{$v->created_at}}</td>
				<td>{{$v->updated_at}}</td>
				<td class="text-center">
					<a href="/admin/parts/edit/{{$v->id}}" class="btn btn-xs btn-info">修改</a>
				</td>
			</tr>
			@endforeach
		</table>
		<div>{!! $data->appends(['search'=>$search])->render() !!}</div>
	</div>
@endsection
<!-- 内容结束 -->