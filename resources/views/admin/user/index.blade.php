@extends('admin.commit.commit')

<!-- 搜索开始 -->
@section('search')
		<form action="" method="get">
			<input type="text" placeholder="搜索用户名..." >	
			<input type="submit" value="">					
		</form>


@endsection
<!-- 搜索结束 -->

<!-- 内容开始 -->
@section('content')
	<div class="agile-tables">
		<h2 class="text-primary">用户列表</h2>
		<table class="table table-bordered">
			<tr class="bg-warning text-center">
				<th class="text-white">ID</th>
				<th class="text-white">用户名</th>
				<th class="text-white">邮箱</th>
				<th class="text-white">手机号</th>
				<th class="text-white">性别</th>
				<th class="text-white">注册时间</th>
				<th class="text-white">注册IP</th>
				<th class="text-white">是否屏蔽</th>
				<th class="text-white text-center">操作</th>
			</tr>
			@foreach($data as $v)
				<tr>
					<td>{{$v -> id}}</td>
					<td>{{$v -> username}}</td>
					<td>{{$v -> email}}</td>
					<td>{{$v -> phone}}</td>
					<td>
					@if($v->sex == 'm')
					男
					@elseif($v->sex == 'w')
					女
					@else
					未知
					@endif
					</td>
					<td>{{date($v->created_at)}}</td>
					<td>{{long2ip($v->create_ip)}}</td>
					<td><span class="text-center btn-sm btn-success">未屏蔽</span></td>
					<td class="text-center">
					<a href="" class="btn btn-warning">屏蔽</a>
					<a href="" class="btn btn-info">修改</a>
					<a href="" class="bg-danger btn btn-danger">删除</a>
					</td>
				</tr>

			@endforeach
		</table>
	</div>
@endsection
<!-- 内容结束 -->