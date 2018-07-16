@extends('admin.commit.commit')

@section('title')
广告管理
@endsection
<!-- 搜索开始 -->
@section('search')
		<form action="/admin/adverts/index" method="get">
			<input type="text" name="search" placeholder="搜索广告..." >	
			<input type="submit" value="">					
		</form>


@endsection
<!-- 搜索结束 -->

<!-- 内容开始 -->
@section('content')
	<div class="agile-tables">
		<h2 class="text-primary">广告列表</h2>
		<hr>
		<table class="table table-bordered">
			<tr class="bg-warning text-center">
				<th class="text-white">ID</th>
				<th class="text-white">广告图片</th>
				<th class="text-white">广告描述</th>
				<th class="text-white">添加时间</th>
				<th class="text-white">更新时间</th>
				<th class="text-white">操作</th>
			</tr>
			@foreach($data as $v)
			<tr>
				<td class="text-center">{{$v->id}}</td>
				<td class="text-center"><img src="{{$v -> pic}}" alt="{{$v->descript}}" style="width:50px;height:50px;"></td>
				<td>{{$v->descript}}</td>
				<td>{{$v->created_at}}</td>
				<td>{{$v->updated_at}}</td>
				<td class="text-center">
					<a href="/admin/adverts/edit/{{$v->id}}" class="btn btn-xs btn-info">修改</a>
					<a href="/admin/adverts/delete/{{$v->id}}" class="btn bg-danger btn-xs btn-danger">删除</a>
				</td>
			</tr>
			@endforeach
		</table>
		<div style="text-align:center">{!! $data->appends(['search'=>$search])->render() !!}</div>
	</div>
@endsection
<!-- 内容结束 -->