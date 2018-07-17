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
                        
                        <li><a title="我的关注" href="/user/follows" draggable="false">我的关注</a></li>
                        <li><a title="修改密码" href="/repass" draggable="false">修改密码</a></li>
                      <li><a title="反馈与建议" href="/user/feedbacks/index" draggable="false">反馈与建议</a></li>
                </ul>
            </div>
        </div>
        <div class="content" style="min-height: 800px;">
            <h1 class="article-title text-left" style="color:#009688;">我的关注</h1>
            <hr>
            <div class="readers">
                @if(count($data -> users_users) == 0)
                  <h3 style="color:#FF5722;font-size:20px;">很抱歉！你暂时还没有关注的人</h3>
                @endif
                @foreach($data -> users_users as $k => $v)
                <a class="item-readers item-readers-1" target="_blank" href="javascript:;" rel="nofollow" draggable="false">
                <h4 style="display: inline;"><img style="width:25px;height:25px;" src="/{{$v -> head_pic}}" title="用户头像" alt="用户头像">{{$v -> users_details -> pet_name or $v -> username}} <small> [评论：{{count($v -> reviews)}}]</small></span></h4> <span value="{{$v -> id}}" class="layui-btn layui-btn-normal layui-btn-xs">取关</span><span  style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">{{$v -> users_details -> descript or '自我描述....'}}</span></a>
                    
                @endforeach
                    
            </div>
  </div>
</section>
<script type="text/javascript">
    //点击事件
  $('.layui-btn-xs').click(function(){
    var id = $(this).attr('value');
    var ele = $(this);
    layer.confirm('确定取消关注吗?',function(index){
        $.get('/user/follows/del/'+id,function(msg){
          if(msg == 'error'){
            layer.msg('取消失败');
          }else{
            layer.msg('取消成功');
            ele.parent().remove();
          }
        });
      layer.close(index);
    });
  });
</script> 
@endsection

@section('header')

@endsection