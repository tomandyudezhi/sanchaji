@extends('admin.commit.commit')

<!-- 搜索开始 -->
@section('search')
		<form action="/admin/feedbacks/index" method="get">
			<input type="text" name="search" placeholder="搜索反馈..." >	
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
		<h2 class="text-primary">反馈列表</h2>
		<hr>
		<table class="table table-bordered">
			<tr class="bg-warning text-center">
				<th class="text-white text-center">ID</th>
				<th class="text-white text-center">反馈人</th>
				<th class="text-white text-center">反馈内容</th>
				<th class="text-white text-center">添加时间</th>
				<th class="text-white text-center">更新时间</th>
				<th class="text-white text-center">是否回复</th>
				<th class="text-white text-center">操作</th>
			</tr>
			@foreach($data as $v)
			<tr>
				<td>{{$v->id}}</td>
				<td>{{$v->users->username}}</td>
				<td>{{$v->content}}</td>
				<td>{{$v->created_at}}</td>
				<td>{{$v->updated_at}}</td>
				<td class="text-center">
				@if($v-> replyed == 'y')
				<a href="#" class="btn btn-success">已回复</a>
				@else
				<a href="#" class="btn btn-danger">未回复</a>
				</td>
				@endif
				<td class="text-center">
					<a href="/admin/feedbacks/delete/{{$v->id}}" class="bg-danger btn btn-danger">删除</a>
					<a href="" class="btn btn-primary">回复</a>
				</td>
			</tr>
			@endforeach
		</table>
		<div style="text-align:center">{!! $data->appends(['search'=>$search])->render() !!}</div>
	</div>
@endsection
<!-- 内容结束 -->