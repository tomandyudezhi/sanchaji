@extends('home.commit.commit')

@section('content')
<section class="container container-page">
      <div class="pageside">
        <div class="pagemenus">
          <ul class="pagemenu">
                        <li><a href="/user/index" title="个人信息页面" draggable="false">个人信息</a></li>
                        <li><a href="javascript:;" rel="nofollow" title="我的博客" draggable="false">文章管理</a></li>
                        <li><a href="/article/create" rel="nofollow" title="写博客" draggable="false">写博客</a></li>
                        <li><a title="我的收藏" href="/user/article/index" draggable="false">我的收藏</a></li>
                        
                        <li><a title="我的关注" href="/user/follows" draggable="false">我的关注</a></li>
                        <li><a title="我的关注" href="/repass" draggable="false">修改密码</a></li>
                    </ul>
                </div>
            </div>
            <div class="content" style="min-height: 800px;">
                    <h1 class="article-title text-left" style="color:#009688;">文章管理</h1>
                    <hr>
                <div class="container">
                  <ul class="layui-nav layui-bg-blue" style="" lay-filter="demo">
                    <li class="layui-nav-item"><a href="/article/index">查看所有</a></li>
                    <li class="layui-nav-item layui-this"><a href="/article/private">私密</a></li>\
                    <li class="layui-nav-item"><a href="/article/recycle">回收站</a></li>
                  </ul>
                  @foreach($data as $k => $v)
                    <div class="row" style="padding-left:20px;padding-top:20px;font-size: 22px;">
                      <div style=""><strong>{{$v -> title}}</strong></div>
                    </div>
                    <div class="row" style="padding-left:5px;padding-top:10px;color:#999;">
                      <div class="col-md-1">{{ $v -> a_type}}</div>
                      <div class="col-md-3 text-right">{{ $v -> created_at}}</div>
                      <div class="col-md-1 text-right" style="color:#999;"><i class="layui-icon layui-icon-read"></i> {{ $v -> reading}}</div>
                      <div class="col-md-1" style="color:#999;"><i class="layui-icon layui-icon-dialogue"></i>  {{ count($v -> reviews)}}</div>
                      <div class="col-md-6 text-right" >
                        <a href="" class="layui-btn layui-btn-xs layui-btn-normal">查看</a>
                        <a href="javascript:;" value="{{$v->id}}" class="layui-btn layui-btn-xs layui-btn-danger layui-btn-warm">删除</a>
                      </div>
                      <br>
                      <hr>
                    </div>
                  @endforeach
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
    layer.confirm('文章将被收入回收站',function(index){
        $.get('/article/del/'+id,function(msg){
          if(msg == 'error'){
            layer.msg('收入失败');
          }else{
            layer.msg('收入成功');
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