@extends('home.commit.commit')

@section('content')
<!-- 配置文件 -->
<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/ueditor/ueditor.all.js"></script>
<section class="container container-page">
  <div class="pageside">
    <div class="pagemenus">
      <ul class="pagemenu">
                        <li><a href="/user/index" title="个人信息页面" draggable="false">个人信息</a></li>
                        <li><a href="/article/index" rel="nofollow" title="我的博客" draggable="false">文章管理</a></li>
                        <li><a href="/article/create" rel="nofollow" title="写博客" draggable="false">写博客</a></li>
                        
                        <li><a title="我的收藏" href="/user/article/index" draggable="false">我的收藏</a></li>
                        
                        <li><a title="我的关注" href="/user/follows" draggable="false">我的关注</a></li>
                    	<li><a title="我的关注" href="/user/feedbacks/index" draggable="false">反馈与建议</a></li>
                </ul>
            </div>
        </div>
        @if(count($errors) >0)
        	<input type="hidden" value="{{$errors -> all()[0]}}" id="hidd" >
			<script type="text/javascript">
				var msg = document.getElementById('hidd');
				layer.msg(msg.value);
			</script>
        @endif
        @if(session('error'))
        	<input type="hidden" value="{{session('error')}}" id="error1">
			<script type="text/javascript">
				var msg = document.getElementById('error1');
				layer.msg(msg.value);
			</script>
        @endif
        <div class="content" style="min-height: 800px;">
            <header class="article-header">
                <h1 class="article-title" style="color:#01AAED;">写博客</h1>
            </header>
            <div class="container">
				<form class="layui-form" action="/article/store" method="post">
					  {{csrf_field()}}
					 <div class="layui-form-item">
					    <label class="layui-form-label">标题</label>
					    <div class="layui-input-block">
					      <input type="text" name="title" placeholder="请输入标题..."  class="layui-input">
					    </div>
					  </div>
					  
					  <div class="layui-form-item layui-form-text">
					    <label class="layui-form-label">内容</label>
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
					    <label class="layui-form-label">类型</label>
					    <div class="layui-input-block">
					      <input type="radio" name="a_type" value="原创" title="原创" checked>
					      <input type="radio" name="a_type" value="翻译" title="翻译">
					      <input type="radio" name="a_type" value="转载" title="转载">
					    </div>
					    <div class="layui-form-item">
					    <label class="layui-form-label">分类</label>
					    <div class="layui-input-block">
					       	<select name="pid" lay-verify="">
						  		<option value="">--请选择--</option>
						  		@foreach($data as $v)
								<option value="{{$v->id}}">{{$v->part_name}}</option>
						  		@endforeach
							</select>
					    </div>
					   
					    </div>
					    <div class="layui-form-item">
					    <label class="layui-form-label">私密</label>
					    <div class="layui-input-block">
					    	<input type="checkbox" name="hidd" value="n" id="switch-hidd" lay-filter="switch-hidd" lay-skin="switch" lay-text="是|否">
					    </div>
					    </div>
					    <div class="layui-form-item">
						    <label class="layui-form-label">标签</label>
						    <div class="layui-input-block">
						      <input type="text" name="tags" placeholder="请输入标签" class="layui-input">
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
</section>
@endsection

@section('header')

@endsection 