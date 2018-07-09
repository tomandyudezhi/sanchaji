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
		<h2 class="text-primary">屏蔽词管理</h2>
		<form action="/admin/shieldwords/store"  method="post">
		{{ csrf_field() }}
		<textarea class="form-control" rows="15" name="mytextarea"  style="resize:none;outline:none;">{{$data->content}}</textarea>
		<input type="submit" name="" value="修改屏蔽词" class="btn btn-primary">
		</form>
	</div>
@endsection
<!-- 内容结束 -->