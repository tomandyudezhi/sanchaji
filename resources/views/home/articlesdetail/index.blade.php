@extends('home.commit.commit')

<!-- 文章作者信息开始 -->
@section('head')
<div class="widget widget-tabs">
    <h3 class="aside-title">个人资料</h3>
        <div class="text-left">
            <p class="text-left">
                <a href=""><img src="/{{ $articles -> users -> head_pic }}" alt="用户头像" width="80" style="margin:5px"></a>
                <a href="" target="_blank" class="text-left" id="uid">{{ $articles -> users -> username }}</a>
                <a class="btn btn-danger text-right" href="" style="float:right;margin:25px 5px;">关注</a>
            </p>
        </div>
    <div class="table text-center">
        <table class="table table-hover table-child" title="277">
            <tr class="active">
                <td><a href="">发表</a></td> 
                <td>粉丝</td>
                <td>关注</td>
                <td>评论</td>
            </tr>
            <tr>
                <td><a href=""><span class="count">{{ count($articles -> users -> articles) }}</span></a></td>
                <td><span class="count" id="fan">{{ count($articles -> users -> users_usersed) }}</span></td>
                <td><span class="count">{{ count($articles -> users -> users_users) }}</span></td>
                <td><span class="count">{{ count($articles -> reviews) }}</span></td>
            </tr>
        </table>
    </div>
</div>
@endsection
<!-- 文章作者信息结束 -->


<!-- 文章内容开始 -->
@section('content')
<div class="content-wrap single">
    <div class="content">
      <header class="article-header">
        <h1 class="article-title"><a href="javascript:;" title="{{ $articles -> title }}" draggable="false">{{ $articles -> title }}</a></h1>
        <div class="article-meta">
          <span class="item article-meta-time">
          <time class="time" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="发表时间：{{ $articles -> created_at }}"><i class="glyphicon glyphicon-time"></i> {{ $articles -> created_at }}</time>
          </span> 
          <span class="item article-meta-source" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="作者：{{ $articles -> users -> username }}"><i class="glyphicon glyphicon-globe"></i> {{ $articles -> users -> username }}</span> 
          <span class="item article-meta-category" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="文章分类：{{ $articles -> parts -> part_name }}"><i class="glyphicon glyphicon-list"></i> {{ $articles -> parts -> part_name }}<a href="javascript:;" title="{{ $articles -> parts -> part_name }}" draggable="false"></a></span> 
          <span class="item article-meta-views" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="浏览量：219"><i class="glyphicon glyphicon-eye-open"></i> {{ $articles -> reading }}</span> 
          <span class="item article-meta-comment" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="评论量"><i class="glyphicon glyphicon-comment"></i> {{ count($articles -> reviews) }}</span> 
        </div>
      </header>
      <!-- 收藏 -->
      <div id="respond">
        <form action="/collect/{{ $articles -> id }}">
            <input type="hidden" value="{{ session()->get('id') }}" name="uid">
            <button type="submit" class="btn btn-success">收藏</button>
        </form>
      </div>
      <!-- 收藏结束 -->
      <article class="article-content">
        <p><img src="/home/images/sanchaji.jpg" alt="" draggable="false" style="display: block;"></p>
        <hr>
        <p>
            
			    {!! $articles -> content !!}
            
        </p>
      </article>
      <hr>
      <div class="article-tags">
	      标签：<a href="">{{ $articles -> tags -> content }}</a>
      </div>
      <div class="article-header">
        <form action="/detail/likes/{{ $articles -> id }}">
            <input type="hidden" value="{{ session()->get('id') }}" name="uid">
            <button type="submit" class="btn btn-danger">好评 +{{ $articles -> likes }}</button>
        </form>
      </div>
      <div class="title" id="comment">
        <h3>评论</h3>
      </div>
      <div id="respond">
            <form id="comment-form" name="comment-form" action="/detail/review/{{ $articles -> id }}" method="POST">
            {{ csrf_field() }}
                    <div class="comment-box">
                        <textarea placeholder="您的评论或留言（必填）" name="content" id="comment-textarea" cols="100%" rows="3" tabindex="3"></textarea>
                        <input type="hidden" value="{{ session()->get('id') }}" name="uid">
                        <div class="comment-ctrl text-right">
                            <button type="submit" id="comment-f" class="btn btn-primary" tabindex="5" style="margin-right:0;"">评论</button>
                        </div>
                    </div>
            </form>
      </div>
	        <div id="postcomments">
	        @foreach($articles -> reviews as $k => $v)
	        <ol id="comment_list" class="commentlist">        
	        	<li class="comment-content">
	        		<span class="comment-f">
	        		#{{ $k+1 }}
	        		</span>
	        		<div class="comment-main">
	        			<p><a class="address" href="javascript:void(0)" rel="nofollow" target="_blank" draggable="false">{{  $v -> users -> username}}</a>
	        			<span class="time">({{ $v -> create_at }})</span><br>{{ $v -> content }}</p>
	        		</div>
	        	</li>
	        </ol>
	        @endforeach
	      </div>
    </div>
    <!-- 消息提示开始 -->
    @if (session('error'))
    <script type="text/javascript">
    layer.msg("{{session('error')}}")
    </script>
    @endif
    @if (session('success'))
    <script type="text/javascript">
    layer.msg("{{session('success')}}")
    </script>
    @endif
    <!-- 消息提示结束 -->
</div>
@endsection
<!-- 文章内容结束 -->