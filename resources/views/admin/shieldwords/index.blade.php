@extends('admin.commit.commit')
@section('title')
屏蔽词查看
@endsection

<!-- 内容开始 -->
@section('content')
	<div class="agile-tables">
		<h2 class="text-primary">屏蔽词管理</h2>
		<form action="/admin/shieldwords/store"  method="post">
		{{csrf_field()}}
		<textarea class="form-control" rows="15" name="mytextarea" value="" style="resize:none;outline:none;">{{$data->content}}</textarea>
		<hr>
		<input type="submit" value="点击修改屏蔽词" class="btn btn-primary">
		</form>
		<p style="float:left;color:red;font-size:20px;">Tips:屏蔽词之间用 "|" 隔开</p>
	</div>

@endsection
<!-- 内容结束 -->