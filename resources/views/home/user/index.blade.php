@extends('home.commit.commit')

@section('content')
	<section class="container container-page">
		  <div class="pageside">
		    <div class="pagemenus">
		      <ul class="pagemenu">
		                    <li><a href="/user/index" title="个人信息页面" draggable="false">个人信息</a></li>
		                    <li><a href="/article/index" rel="nofollow" title="我的博客" draggable="false">文章管理</a></li>
		                    <li><a href="/article/create" rel="nofollow" title="写博客" draggable="false">写博客</a></li>
		                    
		                    <li><a title="我的收藏" href="/user/article/index" draggable="false">我的收藏</a></li>
		                    
		                    <li><a title="我的关注" href="/user/follows" draggable="false">我的关注</a></li> <li><a title="站内信管理" href="/letters/index" draggable="false">站内信管理</a></li>
                        	<li><a title="写信件" href="/letters/searchusers" draggable="false">写信件</a></li>
		                    <li><a title="修改密码" href="/repass" draggable="false">修改密码</a></li>
		                    <li><a title="反馈与建议" href="/user/feedbacks/index" draggable="false">反馈与建议</a></li>
		                </ul>
		            </div>
		        </div>
		        <div class="content" style="min-height: 800px;">
		                <h1 class="article-title text-left" style="color:#009688;">个人信息</h1>
		                <hr>
		           	<div class="container">
		           		<div class="row">
							<div class="col-md-3 text-center">
								<a href="javascript:;" id="pic" value="{{$user_data -> id}}"><img style="width:150px;height:150px;" src="/{{$user_data -> head_pic}}" title="点击修改头像" alt="个人头像"></a>
								<br>
								<div style="width:200px;" class="text-center">
									<span style="margin-right: 20px;font-size: 15px;"><b>{{count($user_data -> users_users)}}</b></span>
									<span style="margin-left: 20px;font-size: 15px;"><b>{{count($user_data -> users_usersed)}}</b></span><br>
									<span style="margin-right: 12px;color:#999;">关注</span>
									<span style="margin-left: 12px;color:#999;">粉丝</span>
								</div>
								
							</div>
							<div class="col-md-9" style="height:150px">
								<div style="padding:10px;height:150px">
									<div class="row text-right">
										<a id="details" value="{{$user_data -> id}}" href="javascript:;" style="color:#01AAED; "><i class="layui-icon layui-icon-edit"></i>修改个人信息</a>
									</div>
									
									<h3><span>{{$user_data -> users_details -> pet_name or $user_data -> username}}</span></h3>
									<br>
									<span style="margin-top: 100px;padding:20px;">
									  <span style="color: #FF5722;margin-right: 20px">
									  @if($user_data -> users_details -> industry == null)
										未知行业
										@else
										{{ $user_data -> users_details -> industry}}
										@endif
									  </span>	|
									  <span style="color: #FF5722;margin:0px 20px 0px 20px;">
									  @if($user_data -> users_details -> profession == null)
										未知职业
										@else
										{{ $user_data -> users_details -> profession}}
										@endif
									  </span>	|
									  <span style="color: #FF5722;margin:0px 20px 0px 20px;">
										@if($user_data -> sex == 'm')
										男
										@elseif($user_data -> sex == 'w')
										女
										@elseif($user_data -> sex == 'unknown')
										未知性别
										@endif
									  </span>	|
									  <span style="color: #FF5722;margin:0px 20px 0px 20px;">
									  	@if($user_data -> users_details -> birthday == null)
										未知生日
										@else
										{{ $user_data -> users_details -> birthday}}
										@endif
										</span>	
									</span>
									<hr>
									<div style="color:#999;">
										@if($user_data -> users_details -> descript == null)
										自我描述
										@else
										{{ $user_data -> users_details -> descript}}
										@endif
									</div>
								</div>
								
							</div>
		           		</div>
		           		<br>
		           		<br>
		           		<h2>我的博客</h2>
		           		<hr>
		           		<div class="row text-right">
							<a href="/article/index" class="layui-btn layui-btn-normal" style="font-size: 20px;">文章管理</a>
		           		</div>
		           		
		           			@if((empty($user_data -> articles[0])))
		           				<div class="text-center" style="width:800px;">
									<h3>你还没有写博客哦~<a href="/article/create" class="layui-btn layui-btn-danger">写博客</a></h3>
									
		           				</div>
		           			@else	
		           				<div class="readers">
			           			@foreach($user_data -> articles as $k => $v)
								<a class="item-readers item-readers-1" target="_blank" href="/detail/{{$v -> id}}" rel="nofollow" draggable="false">
				                <h4>{{str_limit($v -> title,15,'....')}}<small>[评论：{{count($v -> reviews)}}]</small></h4>发布时间：{{ $v->created_at }}</a>
				                @endforeach
				                </div>
				            @endif
		           	</div>
		 		 </div>
		</section>
		<script type="text/javascript">
		//修改个人信息
			$('#details').click(function(){
				var id = $(this).attr('value');
				layer.open({
					type:2,
					title:'用户详细信息',
					area: ['600px', '360px'],
	      			shadeClose: true, 
					content:'/user/edit/'+id,
					end:function(){
						location.reload(true);
					}
				});
			});

			//修改头像
			$('#pic').click(function(){
				var id = $(this).attr('value');
				var ele = $(this);
				layer.open({
					type:2,
					title:'头像上传',
					area: ['600px', '360px'],
	      			shadeClose: true, 
					content:'/user/pic/'+id,
					end:function(){
						location.reload(true);
					}
				});
			});
		</script>
		<!-- 信息提示 -->
		@if(session('success'))
            <input type="hidden" value="{{session('success')}}" id="success1">
            <script type="text/javascript">
				var msg = document.getElementById('success1');
				layer.msg(msg.value);
            </script>
        @endif
@endsection


@section('header')

@endsection