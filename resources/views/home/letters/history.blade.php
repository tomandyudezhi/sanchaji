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
                    <h1 class="article-title text-left" style="color:#009688;">发信件</h1>
                    <hr>
                <div class="container">
                  <ul class="layui-nav layui-bg-blue" style="" lay-filter="demo">
                    <li class="layui-nav-item"><a href="/letters/searchusers">搜索用户</a></li>
                    <li class="layui-nav-item layui-this "><a href="/letters/history">最近的收信人</a></li>
                  </ul>
                  <form action="" class="form-inline text-right" style="margin-top: 5px;">
                    <div class="form-group">
                      <input type="text" class="form-control" name="search" id="title" placeholder="请输入用户用户名...">
                    </div>
                    <button type="submit" class="layui-btn">搜索</button>
                  </form>
                  @if(!empty($data))
                  @foreach($data as $k => $v)
                    <div class="row" style="padding-left:20px;padding-top:20px;font-size: 22px;">
                      
                      <div style=""><img style="width:45px;height:45px;display: inline-block;" src="/{{$v->head_pic}}" alt="{{$v -> username}}"><strong style="margin-left: 5px;">{{$v -> username}}</strong></div>
                    </div>
                    <div class="row" style="padding-left:5px;padding-top:10px;color:#999;">
                      <div class="col-md-11" style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">
                        {{$v -> users_details -> descript or '自我描述'}}
                      </div>
                      <div class="col-md-1 text-right" >
                        <a href="#" value="{{$v -> id}}" class="layui-btn layui-btn-xs send_letters layui-btn-normal">发信</a>
                      </div>
                      <br>
                      <hr>
                    </div>
                  @endforeach

                  <div class="page text-center">
                    {!! $data -> appends(['search'=>$search]) -> render() !!}
                  </div>
                  
                  <script type="text/javascript">
                      $(function(){
                        $('.page ul').css('display','block');
                      });
                  </script>
                  @else
                  <h2 style="color:#FF5722;font-size:20px;">请先搜索用户！</h2>
                  @endif
                </div>
         </div>
    </section>

 
<script>
    $(function(){
      $('.send_letters').click(function(){
        var id = $(this).attr('value');
        var ele = $(this);
        layer.open({
          type:2,
          title:'发送信件',
          area: ['900px', '500px'],
              shadeClose: true, 
          content:'/letters/create/'+id
        });
      });
    });
</script>
@endsection

@section('header')

@endsection