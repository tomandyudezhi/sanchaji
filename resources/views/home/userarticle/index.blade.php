@extends('home.commit.commit')

@section('title')
    我的收藏
@endsection

@section('content')
<section class="container container-page">
      <div class="pageside">
        <div class="pagemenus">
          <ul class="pagemenu">
                        <li><a href="/user/index" title="个人信息页面" draggable="false">个人信息</a></li>
                        <li><a href="/article/index" rel="nofollow" title="我的博客" draggable="false">文章管理</a></li>
                        <li><a href="/article/create" rel="nofollow" title="写博客" draggable="false">写博客</a></li>
                        
                        <li><a title="我的收藏" href="/user/article/index" draggable="false">我的收藏</a></li>
                        
                        <li><a title="我的关注" href="/user/follows" draggable="false">我的关注</a></li>
                        <li><a title="站内信管理" href="/letters/index" draggable="false">站内信管理</a></li>
                        <li><a title="写信件" href="/letters/searchusers" draggable="false">写信件</a></li>
                        <li><a title="修改密码" href="/repass" draggable="false">修改密码</a></li>
                        <li><a title="反馈与建议" href="/user/feedbacks/index" draggable="false">反馈与建议</a></li>
                    </ul>
                </div>
            </div>
            <div class="content" style="min-height: 800px;">
                    <h1 class="article-title text-left" style="color:#009688;">收藏管理</h1>
                    <hr>
                <div class="container">
	                 @if(count($user_data -> users_articles) == 0)
                  <h3 style="color:#FF5722;font-size:20px;">很抱歉！你暂时还没有收藏的文章</h3>
                    @else
                   @foreach ($user_data -> users_articles as $k => $v)
                    <div class="row" style="padding-left:20px;padding-top:20px;font-size: 22px;">
                      <div style=""><strong>{{$v-> title}}</strong></div>
                    </div>
                    <div class="row" style="padding-left:5px;padding-top:10px;color:#999;">
                      <div class="col-md-1">{{$v -> a_type}}</div>
                      <div class="col-md-3 text-right">{{$v-> created_at}}</div>
                      <div class="col-md-1 text-right" style="color:#999;"><i class="layui-icon layui-icon-read"></i>{{$v -> reading}}</div>
                      <div class="col-md-1" style="color:#999;"><i class="layui-icon layui-icon-dialogue"></i> {{count($v -> reviews)}}</div>
                      <div class="col-md-6 text-right" >
                        <a href="/detail/{{$v->id}}" class="layui-btn layui-btn-xs layui-btn-normal">查看</a>
                        <a href="javascript:;" value="{{$v -> id}}" class="layui-btn layui-btn-xs layui-btn-danger layui-btn-warm">取消收藏</a>
                      </div>
                      <br>
                      <hr>
                    </div>
     				@endforeach
            @endif
                </div>
         </div>
    </section>

 
<script>
  //注意：导航 依赖 element 模块，否则无法进行功能性操作
  layui.use('element', function(){
    var element = layui.element;
    element.render();
  });
  //点击事件
  $('.layui-btn-danger').click(function(){
    var id = $(this).attr('value');
    var ele = $(this);
    layer.confirm('是否取消收藏?!',function(index){
        $.get('/user/article/delete/'+id,function(msg){
          if(msg == 'error'){
            layer.msg('取消失败');
          }else{
            layer.msg('取消成功');
            ele.parent().parent().prev().remove();
            ele.parent().parent().remove();
          }
        });
      layer.close(index);
    });
  });
</script>
@endsection

@section('header')

@endsection