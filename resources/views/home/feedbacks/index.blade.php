@extends('home.commit.commit')

@section('title')
    反馈与建议
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
                    <h1 class="article-title text-left" style="color:#009688;">反馈与建议</h1>
                    <hr>
                <div class="container">
                  <ul class="layui-nav layui-bg-blue" style="" lay-filter="demo">
                    <li class="layui-nav-item layui-this"><a href="/user/feedbacks/index">查看</a></li>
                    <li class="layui-nav-item"><a href="/user/feedbacks/create">发表建议</a></li>
                  </ul>
                  <form action="" class="form-inline text-right" style="margin-top: 5px;">
                    <div class="form-group">
                      <input type="text" class="form-control" name="search" id="title" placeholder="请输入内容关键字...">
                    </div>
                    <button type="submit" class="layui-btn">搜索</button>
                  </form>
                    @foreach($feedbacks_data as $k => $v)
                    <div class="row" style="padding-left:20px;padding-top:20px;font-size: 22px;">
                      {{ $v -> content}}
                    </div>
                    <div class="row" style="padding-left:5px;padding-top:10px;color:#999;">
                      
                     
                      @if($v->replyed == 'n')
                      <div class="col-md-2 text-left" style="color:#999;"><i class="layui-icon layui-icon-read"></i> 未回复</div>
                      @else
                       <div class="col-md-2 text-left" style="color:#999;"><i class="layui-icon layui-icon-read"></i> 已回复</div>
                       @endif 
                       <div class="col-md-4 text-right"></div>
                      <div class="col-md-6 text-right" >
                          {{ $v -> created_at}}
                      </div>
                      <br>
                      <hr>
                    </div>
                  @endforeach
                <div class="page">
                  {!! $feedbacks_data -> appends(['search'=>$search]) -> render()  !!}
                </div>
                <script type="text/javascript">
                      $(function(){
                        $('.page ul').css('display','block');
                      });
                  </script>
                </div>
         </div>
    </section>

 

@endsection

@section('header')

@endsection