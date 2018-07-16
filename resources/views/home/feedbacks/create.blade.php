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