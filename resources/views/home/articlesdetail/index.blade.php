@extends('home.commit.commit')

<!-- 文章作者信息开始 -->
@section('head')
<div class="widget widget-tabs">
    <h3 class="aside-title">个人资料</h3>
        <div class="text-left">
            <p class="text-left">
                <a href="/list/index?user_id={{$articles -> users -> id}}"><img src="/{{ $articles -> users -> head_pic }}" alt="用户头像" width="80" height="80" style="margin:5px"></a>
                <a href="/list/index?user_id={{$articles -> users -> id}}" target="_blank" class="text-left" id="uid"><b>{{ $articles -> users -> username }}</b></a>
                @if(session() -> has('homeUser'))
                  @if(session() ->get('homeUser')->id != $articles -> users -> id)
                    @if(in_array(session() ->get('homeUser')->id,$fensi))
                      <button class="layui-btn layui-btn-disabled text-right guanzhu" value="{{$articles -> users->id}}"  style="float:right;margin:25px 5px;">已关注</button>
                    @else
                    <button class="layui-btn layui-btn-normal text-right guanzhu" value="{{$articles -> users->id}}"  style="float:right;margin:25px 5px;">关注</button>
                    @endif
                  @endif
                @endif
            </p>
        </div>
    <div class="table text-center">
        <table class="table table-hover table-child" >
            <tr class="active">
                <td>发表</td> 
                <td>粉丝</td>
                <td>关注</td>
                <td>评论</td>
            </tr>
            <tr>
                <td><span style="height:25px;" class="count"><b>{{ count($articles -> users -> articles) }}</b></span></td>
                <td><span style="height:25px;" class="count"><b>{{ count($articles -> users -> users_usersed) }}</b></span></td>
                <td><span style="height:25px;" class="count"><b>{{ count($articles -> users -> users_users) }}</b></span></td>
                <td><span style="height:25px;" class="count"><b>{{ count($articles -> reviews) }}</b></span></td>
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
          <span class="item article-meta-views" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="浏览量"><i class="glyphicon glyphicon-eye-open"></i> {{ $articles -> reading }}</span> 
          <span class="item article-meta-comment" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="评论量"><i class="glyphicon glyphicon-comment"></i> {{ count($articles -> reviews) }}</span> 
        </div>
      </header>
      
      <article class="article-content">
        <p>
            
			    {!! $articles -> content !!}
            
        </p>
      </article>
      <hr>
      <div class="article-tags" style="margin-right: 40px;">
	      标签：<a href="/list/index?tag_content={{ $articles -> tags -> content }}">{{ $articles -> tags -> content }}</a>
      </div>
      <div class="article-header">
        <table width="100%">
          <tr>
            <td class="text-center">
              <button  value="{{ $articles -> id }}" class="btn btn-danger haopin" style="margin-left:90px;"><i class="layui-icon layui-icon-praise"></i>好评<span>{{ $articles -> likes }}</span> </button>
            </td>
            <td class="text-center">
                <button type="submit" value="{{ $articles -> id }}" class="btn btn-success shoucang" style="position: relative;right:260px;"><i class="layui-icon layui-icon-star"></i>收藏</button>
            </td>
          </tr>
        </table> 
        
       
      </div>
      <script type="text/javascript">
          $(function(){
            $('.article-tags a').last().remove();
          });
            
      </script> 
      <div class="relates">
        <div class="title">
          <h3>相关推荐</h3>
        </div>
        <ul>
        @foreach($recommend_data as $v)
          <li><a href="/detail/{{$v['id']}}" title="{{$v['title']}}" draggable="false">{{$v['title']}}</a></li>
        @endforeach
        </ul>
      </div>
      <div class="title" id="comment">
        <h3>评论</h3>
      </div>
      <div id="respond">
            <form id="comment-form" name="comment-form" action="/detail/review/{{ $articles -> id }}" method="post">
            {{ csrf_field() }}
                    <div class="comment-box">
                        <textarea placeholder="您的评论或留言（必填）" name="content" id="comment-textarea" cols="100%" rows="3" tabindex="3"></textarea>
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
	        			<p><a class="address" href="javascript:void(0)" rel="nofollow" target="_blank" draggable="false">{{  $v -> users -> users_details -> pet_name or $v -> users -> username}}</a>
	        			<span class="time">({{ $v -> created_at }})</span><br>{{ $v -> content }}</p>
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
    <script type="text/javascript">
    $(function(){
      //关注
      $('.guanzhu').click(function(){
          var id = $(this).attr('value');
          var ele = $(this);
          if(ele.hasClass('layui-btn-disabled') == false){
          $.get('/follows/'+id,function(msg){
              if(msg == 'success'){
                layer.msg('关注成功');
                ele.removeClass('layui-btn-normal');
                ele.addClass('layui-btn-disabled');
                ele.text('已关注');
              }else if(msg == 'not'){
                layer.msg('请登录后再试!');
              }else{
                layer.msg('关注失败');
              }
          });
            }
        });

      //点赞
      $('.haopin').click(function(){
          var id = $(this).attr('value');
          var ele = $(this);
          $.get('/detail/likes/'+id,function(msg){
            if(msg == 'not login'){
              layer.msg('请登录后再试！');
            }else if(msg == 'liked'){
              layer.msg('很抱歉，你已经点赞过！');
            }else if(msg == 'success'){
              layer.msg('点赞成功');
              ele.find('span').text(parseInt(ele.find('span').text()) + 1);
            }else if(msg == 'error'){
              layer.msg('点赞失败');
            }
          });
      });

      //收藏
      //点赞
      $('.shoucang').click(function(){
          var id = $(this).attr('value');
          var ele = $(this);
          $.get('/collect/'+id,function(msg){
            if(msg == 'not login'){
              layer.msg('请登录后再试！');
            }else if(msg == 'collected'){
              layer.msg('很抱歉，你已经收藏过！');
            }else if(msg == 'success'){
              layer.msg('收藏成功');
            }else if(msg == 'error'){
              layer.msg('收藏失败');
            }
          });
      });
    });
        
    </script>
</div>
@endsection
<!-- 文章内容结束 -->