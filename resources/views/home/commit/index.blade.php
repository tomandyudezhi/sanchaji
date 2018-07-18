@extends('home.commit.commit')



@section('content')
<div class="content-wrap">
    <div class="content">
   
      <div id="focusslide" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#focusslide" data-slide-to="0" class="active"></li>
          @for($i = 1;$i<=count($turnimage) ;$i++)
          <li data-target="#focusslide" data-slide-to="{{$i}}"></li>
          @endfor
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="item active">
          <a href="#" target="_blank" title="三叉戟博客源码" >
          <img src="/default_turn_image.jpg" alt="三叉戟博客源码" class="img-responsive"></a>
          </div>
        @foreach($turnimage as $k => $v)
          <div class="item ">
          <a href="#" target="_blank" title="三叉戟博客源码" >
          <img src="{{ $v -> pic }}" alt="三叉戟博客源码" class="img-responsive"></a>
          </div>
        @endforeach
        </div>
        <a class="left carousel-control" href="#focusslide" role="button" data-slide="prev" rel="nofollow"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">上一个</span> </a> 
        <a class="right carousel-control" href="#focusslide" role="button" data-slide="next" rel="nofollow"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">下一个</span> </a> 
      </div>
     
      <div class="title">
        <h3>最新发布</h3>
        <div class="more">        
                @for ($i=0;$i <= 3;$i++)     
                <a href="/list/index?part_name={{$part_data[$i]->id}}" title="{{$part_data[$i]->part_name}}" >{{$part_data[$i]->part_name}}</a>    
                @endfor    
                <a href="/list/index" title="更多分类" >更多...</a>
            </div>
      </div>
      <div class="article-load">
      
      @foreach ($list_data as $k => $v)
      <article class="excerpt excerpt-{{$k+1}}" style="">
      <a class="focus text-center" href="/detail/{{ $v -> id }}"  target="_blank" ><img class="thumb"  src="/{{ $v -> users -> head_pic}}"  style="display: inline;width:140px;height:140px;"></a>
            <header><a class="cat" href="/list/index?part_name={{ $v->parts->id }}" title="{{$v->parts->part_name}}" >{{$v->parts->part_name}}<i></i></a>
                <h2><a href="/detail/{{ $v -> id }}" title="{{$v->title}}" target="_blank" >{{$v->title}}</a>
                </h2>
            </header>
            <p class="meta">
                <time class="time"><i class="glyphicon glyphicon-time"> </i> {{$v->created_at}}</time>
                <span class="views"><i class="glyphicon glyphicon-eye-open"> </i> {{$v->reading}}</span> <a class="comment" href="/detail/{{ $v -> id }}" title="评论" target="_blank" ><i class="glyphicon glyphicon-comment"> </i> {{count($v->reviews)}}</a>
            </p>
            <p class="note" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;">{{$v->content}}</p>
        </article>
        @endforeach
        </div>
      <div class="ajax-load text-center" style="display:none">
        <img src="/home/images/loading.gif" alt="正在加载">
      </div>
    </div>
  </div>
  
  <!-- 登陆信息提示 -->
  @if (session('success'))
  <script type="text/javascript">
  layer.msg("{{session('success')}}")
  </script>
  @endif
  <script type="text/javascript">
  $(function(){
    var page = 1;
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() + 1>= $(document).height()) {
            page++;
            loadMoreData(page);
        }
    });

    function loadMoreData(page){
        $.ajax(
            {
                url: '?page=' + page,
                type: "get",
                beforeSend: function()
                {
                    $('.ajax-load').show();
                }
            }).done(function(data)
            {
                //console.log(data.html);
                if(data.html == " "){
                    $('.ajax-load').html("没有数据了……");
                    return;
                }
                $('.ajax-load').hide();
                $("article").last().after(data.html);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                alert('服务未响应……');
            });
            
    }

  });
  </script>
@endsection