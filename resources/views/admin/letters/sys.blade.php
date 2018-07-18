@extends('admin.commit.commit')

@section('title')
系统消息列表页
@endsection

@section('search')
		<form action="" method="get">
			<input type="text" name="search" value="" placeholder="搜索系统消息标题..." >	
			<input type="submit" value="">					
		</form>
@endsection

<!-- 内容开始 -->
@section('content')
		<div class="agile-tables">
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
		<h2 class="text-primary">系统消息列表</h2>
		<hr>
  	<table class="table table-bordered">
			<tr class="bg-warning text-center">
				<th class="text-white">标题</th>
				<th class="text-white">内容</th>
				<th class="text-white">详细信息</th>
				<th class="text-white">发布人</th>
				<th class="text-white">收信人</th>
				<th class="text-white">发信时间</th>
				<th class="text-white text-center">操作</th>
			</tr>
			@foreach($letters as $v)
				<tr>
					<td>{{$v -> title}}</td>
					<td><li style="list-style:none;max-width: 110px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$v -> content}}</li></td>
					<td class="text-center"><a href="#" class="saw layui-btn layui-btn-normal layui-btn-xs">查看</a></td>
					<td>{{$v -> users -> username}}</td>
					<td>{{$v -> rec_users -> username}}</td>
					<td>{{$v -> created_at}}</td>
					<td>
					<a value="{{$v -> id}}" class="bg-danger btn btn-xs btn-danger" onclick="confirm('确认删除吗？')">删除</a>
					</td>
				</tr>

			@endforeach
		</table>
		<div class="pages text-center">{!!$letters ->appends(['search'=>$search]) -> render()!!}</div>
		</div>
	<script type="text/javascript">
		//收入回收站的ajax
		$('.bg-danger').click(function(){
			var id = $(this).attr('value');
			$.get('/admin/letters/del/'+id,function(msg){
				if(msg == 'true'){
					layer.msg('已删除');
				}else{
					layer.msg('删除失败');
				}
			});
			$(this).parent().parent().remove();
		});
		//查看文章详情
		$('.saw').click(function(){
			var contents = $(this).parent().parent().find('li').eq(0).text();
			layer.open({
				type:1,
				title:'信件内容',
				area: ['600px', '360px'],
      			shadeClose: true, 
				content:contents
			})
		});
	</script>
@endsection
<!-- 内容结束 -->