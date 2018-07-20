@extends('home.commit.commit')


@section('title')
    站内信管理
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
            @if(session('success'))
            <input type="hidden" value="{{session('success')}}" id="success1">
            <script type="text/javascript">
              var msg = document.getElementById('success1');
              layer.msg(msg.value);
            </script>
              @endif
            <div class="content" style="min-height: 800px;">
                    <h1 class="article-title text-left" style="color:#009688;">站内信管理</h1>
                    <hr>
                <div class="container">
                  <ul class="layui-nav layui-bg-blue" style="" lay-filter="demo">
                    <li class="layui-nav-item "><a href="/letters/index">发件箱</a></li>
                    <li class="layui-nav-item"><a href="/letters/noread">未读信件</a></li>\
                    <li class="layui-nav-item"><a href="/letters/readed">已读信件</a></li>\
                    <li class="layui-nav-item layui-this"><a href="/leters/sys">系统消息</a></li>
                  </ul>
                  <form action="" class="form-inline text-right" style="margin-top: 5px;">
                    <div class="form-group">
                      <input type="text" class="form-control" name="search" id="title" placeholder="请输入标题关键字...">
                    </div>
                    <button type="submit" class="layui-btn">搜索</button>
                  </form>
                  @if(!empty($data[0]))
                  @foreach($data as $k => $v)
                    <div class="row" style="padding-left:20px;padding-top:20px;font-size: 22px;">
                      <div style=""><strong>{{$v -> title}}</strong></div>
                    </div>
                    <div class="row" style="padding-left:5px;padding-top:10px;color:#999;">
                      <div class="col-md-3 text-right">发送时间：{{ $v -> created_at}}</div>
                      <div class="col-md-2 text-right" style="color:#999;"><i class="layui-icon layui-icon-read"></i> {{ ($v -> read_status == '2')?'未读':'已读'}}</div>
                      <div class="col-md-3" style="color:#999;">发信人：系统</div>
                      <div class="col-md-4 text-right" >
                        <input type="hidden" id="content" value="{{$v -> content}}">
                        <a href="javascript:;" value="{{$v->id}}" class="layui-btn layui-btn-xs layui-btn-normal">查看</a>
                         <a href="javascript:;" value="{{$v->id}}" class="layui-btn layui-btn-xs layui-btn-danger layui-btn-warm">删除</a>
                      </div>
                      <br>
                      <hr>
                    </div>
                  @endforeach
                  @else
                    <h2 style="color:#FF5722;font-size:20px;">暂时还没有来自系统的通知哦！</h2>
                  @endif
                  <div class="page text-center">
                    {!! $data -> appends(['search'=>$search]) -> render() !!}
                  </div>
                  
                  <script type="text/javascript">
                      $(function(){
                        $('.page ul').css('display','block');
                      });
                  </script>
                </div>
         </div>
    </section>

 
<script>
  //注意：导航 依赖 element 模块，否则无法进行功能性操作
  layui.use('element', function(){
    var element = layui.element;
    element.render();
  });

  $('.layui-btn-normal').click(function(){
      var content = $(this).prev().attr('value');
      var id = $(this).attr('value');
      //ajax
      $.get('/letters/read_status/'+id);
      
      layer.open({
        type:1,
        title:'通知内容内容',
        area: ['600px', '360px'],
        shadeClose: true, 
        content:content
      })
  });

  $('.layui-btn-danger').click(function(){
    var id = $(this).attr('value');
    var ele = $(this);
    layer.confirm('确认删除吗',function(index){
        $.get('/letters/del/'+id,function(msg){
          if(msg == 'error'){
            layer.msg('删除失败');
          }else{
            layer.msg('删除成功');
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
