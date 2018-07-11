@extends('home.commit.commit')


@section('content')
<div class="content-wrap">
    <div class="content">
   
      <div id="focusslide" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#focusslide" data-slide-to="0" class="active"></li>
          <li data-target="#focusslide" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="item active">
          <a href="http://www.muzhuangnet.com/show/269.html" target="_blank" title="木庄网络博客源码" >
          <img src="http://www.muzhuangnet.com/upload/201610/18/201610181557196870.jpg" alt="木庄网络博客源码" class="img-responsive"></a>
          </div>
          <div class="item">
          <a href="http://web.muzhuangnet.com/" target="_blank" title="专业网站建设" >
          <img src="http://www.muzhuangnet.com/upload/201610/24/201610241227558789.jpg" alt="专业网站建设" class="img-responsive"></a>
          </div>
        </div>
        <a class="left carousel-control" href="#focusslide" role="button" data-slide="prev" rel="nofollow"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">上一个</span> </a> <a class="right carousel-control" href="#focusslide" role="button" data-slide="next" rel="nofollow"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">下一个</span> </a> </div>
     
      <div class="title">
        <h3>最新发布</h3>
        <div class="more">                
                <a href="http://www.muzhuangnet.com/list/mznetblog/" title="MZ-NetBlog主题" >MZ-NetBlog主题</a>                
                <a href="http://www.muzhuangnet.com/list/code/" title="IT技术笔记" >IT技术笔记</a>                
                <a href="http://www.muzhuangnet.com/list/share/" title="源码分享" >源码分享</a>                
                <a href="http://www.muzhuangnet.com/list/money/" title="靠谱网赚" >靠谱网赚</a>                
                <a href="http://www.muzhuangnet.com/list/news/" title="资讯分享" >资讯分享</a>                
            </div>
      </div>
      @foreach ($list_data as $k => $v)
      <article class="excerpt excerpt-{{$k}}" style="">
      <a class="focus text-center" href="#"  target="_blank" ><img class="thumb"  src="/default.jpg""  style="display: inline;width:140px;height:140px;"></a>
            <header><a class="cat" href="http://www.muzhuangnet.com/list/mznetblog/" title="{{$v->parts->part_name}}" >{{$v->parts->part_name}}<i></i></a>
                <h2><a href="#" title="{{$v->title}}" target="_blank" >{{$v->title}}</a>
                </h2>
            </header>
            <p class="meta">
                <time class="time"><i class="glyphicon glyphicon-time"></i> {{$v->created_at}}</time>
                <span class="views"><i class="glyphicon glyphicon-eye-open"></i>{{$v->reading}}</span> <a class="comment" href="#" title="评论" target="_blank" ><i class="glyphicon glyphicon-comment"></i>{{count($v->reviews)}}</a>
            </p>
            <p class="note" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;">{{$v->content}}</p>
        </article>
        @endforeach
      <nav class="pagination" style="display: none;">
        <ul>
          <li class="prev-page"></li>
          <li class="active"><span>1</span></li>
          <li><a href="?page=2">2</a></li>
          <li class="next-page"><a href="?page=2">下一页</a></li>
          <li><span>共 2 页</span></li>
        </ul>
      </nav>
    </div>
  </div>

@endsection