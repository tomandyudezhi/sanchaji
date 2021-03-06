@extends('admin.commit.commit')

@section('title')
用户修改
@endsection

@section('search')
<form action="">
	<input type="text" name="search" placeholder="搜索用户名..." required="">	
	<input type="submit" value="">					
</form>
@endsection


@section('content')
		<div class="agile-tables">
		<h2 class="text-primary">用户列表</h2>
  	<table class="table table-bordered">
			<tr class="bg-warning text-center">
				<th class="text-white">用户名</th>
				<th class="text-white">邮箱</th>
				<th class="text-white">手机号</th>
				<th class="text-white">性别</th>
				<th class="text-white">详情</th>
				<th class="text-white">注册时间</th>
				<th class="text-white">注册IP</th>
				<th class="text-white">是否屏蔽</th>
				<th class="text-white text-center">操作</th>
			</tr>
			@foreach($data as $v)
				<tr>
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
					<td><a href="#" class="saw layui-btn layui-btn-normal layui-btn-xs" details_id="{{$v -> id}}">查看</a></td>
					<td>{{date($v->created_at)}}</td>
					<td>{{long2ip($v->create_ip)}}</td>
					<td>
					@if($v -> shield == 'n')
					<span class="text-center btn-xs btn-success">未屏蔽</span>
					@else
					<span class="text-center btn-xs btn-danger">屏蔽</span>
					@endif
					</td>
					<td>
					@if($v -> shield == 'n')
					<a href="/admin/user/shield/{{$v -> id}}" class="btn btn-xs btn-warning">屏蔽</a>
					<a href="javascript:;" class="btn btn-xs btn-primary send" value="{{$v -> id}}">通知</a>
					@else
					<a href="/admin/user/unshield/{{$v -> id}}" class="btn btn-xs btn-success">启用</a>
					@endif
					<a href="/admin/user/del/{{$v -> id}}" class="bg-danger btn btn-xs btn-danger">删除</a>
					</td>
				</tr>

			@endforeach
		</table>
		<div class="pages text-center">{!!$data ->appends(['search'=>$search]) -> render()!!}</div>
		</div>
		<script type="text/javascript">
			$('.saw').click(function(){
				var contents = $(this).attr('details_id');
				layer.open({
					type:2,
					title:'用户详细信息',
					area: ['600px', '360px'],
	      			shadeClose: true, 
					content:'/admin/user/detail/'+contents
				});
			});
			//发送系统通知
			$('.send').click(function(){
				var id = $(this).attr('value');
				layer.open({
					type:2,
					title:'发送系统消息',
					area: ['900px', '500px'],
	      			shadeClose: true, 
					content:'/admin/letters/create/'+id
				});
			});
		</script>
@endsection
