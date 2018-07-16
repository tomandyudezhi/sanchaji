<link rel="stylesheet" type="text/css" href="/home/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/layui/css/layui.css">
<script type="text/javascript" src="/layui/layui.all.js"></script>
<div class="container">
	<form action="/user/uploads" method="post" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="form-group">
	    	<label for="pic">上传头像</label>
	    	<input type="file" name="head_pic" id="pic">
	    	<p class="help-block">请上传长宽比1:1的头像</p>
	  	</div>
		<div style="width:150px;height:150px;">
			旧头像：<br><img src="/{{$data -> head_pic}}" alt="旧头像" style="width:150px;height:150px;">
		</div>
		<br>
		<hr>
		<div class="layui-form-item">
		    <div class="layui-input-block">
		      <button class="layui-btn" lay-submit lay-filter="formDemo">上传头像</button>
		    </div>
		</div>
	</form>
</div>
