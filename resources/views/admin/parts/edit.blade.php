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
		<h2 class="text-primary">分类修改</h2>
		<hr>
		<form action="/admin/parts/update/{{$data->id}}" method="post">
		{{csrf_field()}}
		<div class="form-group">
    		<label for="part_name"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">分类添加:</font></font></label>
    		<input type="text" class="form-control" name="part_name" id="part_name" placeholder="请输入分类名" value="{{$data->part_name}}">
  		</div>
  		<input type="submit" value="点击修改分类" class="btn btn-primary">
  		</form>
	</div>
@endsection
<!-- 内容结束 -->