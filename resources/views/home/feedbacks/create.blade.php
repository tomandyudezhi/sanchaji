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
                    <ul class="layui-nav layui-bg-blue" style="" lay-filter="demo">
                    <li class="layui-nav-item"><a href="/user/feedbacks/index">查看</a></li>
                    <li class="layui-nav-item layui-this"><a href="/user/feedbacks/create">发表建议</a></li>
                  </ul>
                <div class="container" style="margin-top: 10px;">
                    <form action="/user/feedbacks/store" method="post">
                        {{ csrf_field() }}
                        <textarea class="form-control" rows="8" style="resize:none;" name="content"></textarea>
                        <hr>
                        <input type="submit" value="提交" class="btn btn-success" style="float:right">
                    </form>

                </div>
         </div>
    </section>

 

@endsection

@section('header')

@endsection