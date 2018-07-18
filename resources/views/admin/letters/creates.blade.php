
<link rel="stylesheet" type="text/css" href="/layui/css/layui.css">
<script type="text/javascript" src="/layui/layui.all.js"></script>
	<!-- 配置文件 -->
    <script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/ueditor/ueditor.all.js"></script>
	<div class="grid-form1">
		<div class="panel-body">
				
			<form class="layui-form" action="/admin/letters/replyed/{{$id}}/{{$feed_id}}" method="post">
					  {{csrf_field()}}
					 <div class="layui-form-item">
					    <label class="layui-form-label">标题</label>
					    <div class="layui-input-block">
					      <input type="text" name="title" value="【系统通知】" placeholder="请输入标题..."  class="layui-input">
					    </div> 
					  </div>
					  
					  <div class="layui-form-item layui-form-text">
					    <label class="layui-form-label">通知内容</label>
					    <div class="layui-input-block">
					      <!-- 加载编辑器的容器 -->
						    <script id="container" name="content" type="text/plain" style="height:400px;">
						    </script>
						    <!-- 实例化编辑器 -->
						    <script type="text/javascript">
						        var ue = UE.getEditor('container');
						    </script>
					    </div>
					  </div>
					  <div class="layui-form-item">
					    <div class="layui-input-block">
					      <button class="layui-btn"  lay-filter="formDemo">立即提交</button>
					      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
					    </div>
					  </div>
					</form>
					<script>
					    layui.use('form', function () {
					        var form = layui.form;
					        form.render();

					        form.on('switch(switch-hidd)',function(data){
					        	var val = document.getElementById('switch-hidd');
					        	if(data.elem.checked){
					        		val.value = 'y';
					        	}else{
					        		val.value = 'n';
					        	}
					        })
					    });
					    
					</script>
		</div>
	</div>
	