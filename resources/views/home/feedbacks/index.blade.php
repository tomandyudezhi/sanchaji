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
                        <li><a title="我的关注" href="/user/feedbacks/index" draggable="false">反馈与建议</a></li>
                        
                    </ul>
                </div>
            </div>

            <div class="content" style="min-height: 800px;">
                    <h1 class="article-title text-left" style="color:#009688;">反馈与建议</h1>
                    <hr>
                <div class="container">
                  <ul class="layui-nav layui-bg-blue" style="" lay-filter="demo">
                    <li class="layui-nav-item layui-this"><a href="/user/feedbacks/index">查看</a></li>
                    <li class="layui-nav-item layui-this"><a href="/user/feedbacks/create">发表建议</a></li>
                  </ul>
                  <div class="row" style="position: relative;right:0;">
                  <div class="col-md-3 offset-md-9">
                  <li class="layui-nav-item layui-hide-xs" lay-unselect="">
                    <input type="text" placeholder="搜索..." autocomplete="off" class="layui-input layui-input-search" layadmin-event="serach" lay-action="template/search.html?keywords="> 
                  </li>
                  </div>
                  </div>
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

                </div>
         </div>
    </section>

 

@endsection

@section('header')

@endsection