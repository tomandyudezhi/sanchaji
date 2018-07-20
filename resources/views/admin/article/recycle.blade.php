@extends('admin.commit.commit')

@section('title')
回收站
@endsection

@section('search')
		<form action="" method="get">
			<input type="text" name="search" value="" placeholder="搜索文章标题..." >	
			<input type="submit" value="">					
		</form>
@endsection

<!-- 内容开始 -->
@section('content')
		<div class="agile-tables">
		@if (session('error'))
				<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			   {{session('error')}}
			</div>
		@endif
		<h2 class="text-primary">回收站</h2>
		<hr>
  		<table class="table table-bordered">
			<tr class="bg-warning text-center">
				<th class="text-white">标题</th>
				<th class="text-white">内容</th>
				<th class="text-white">详细信息</th>
				<th class="text-white">发布人</th>
				<th class="text-white">分类</th>
				<th class="text-white">是否私密</th>
				<th class="text-white">阅读量</th>
				<th class="text-white">好评</th>
				<th class="text-white text-center">操作</th>
			</tr>
			@foreach($data as $v)
				<tr>
					<td>{{$v -> title}}</td>
					<td><li style="list-style:none;max-width: 110px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$v -> content}}</li></td>
					<td><span><a href="#">查看</a></span></td>
					<td>{{$v -> users -> username}}</td>
					<td>{{$v -> parts -> part_name}}</td>
					<td>
					@if($v->hidd == 'n')
					<span class="text-center btn-xs btn-success">公开</span>
					@else
					<span class="text-center btn-xs btn-success">私密</span>
					@endif
					</td>
					<td>{{$v->reading}}</td>
					<td>{{$v->likes}}</td>
					<td>
					<a href="/admin/article/recover/{{$v -> id}}" class="btn btn-xs btn-success">恢复</a>
					<a href="/admin/article/delever/{{$v -> id}}" class="bg-danger btn btn-xs btn-danger">删除</a>
					</td>
				</tr>

			@endforeach
		</table>
		<div class="pages text-center">{!!$data ->appends(['search'=>$search]) -> render()!!}</div>
		</div>

@endsection
<!-- 内容结束 -->
