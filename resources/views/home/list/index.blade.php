@extends('home.commit.commit')





@section('message')
  </style>
      <div class="widget widget_search">
        <form class="navbar-form" action="/list/index" method="get">
          <div class="input-group">
            <input type="text" name="search" class="form-control" size="35" placeholder="请输入文章标题搜索" maxlength="15" autocomplete="off">
            <span class="input-group-btn">
            <button class="btn btn-default btn-search"  type="submit">搜索</button>
            </span> </div>
        </form>
      </div>
      <div class="widget widget_sentence">
        <h3>标签云</h3>
        <div class="widget-sentence">
            <ul class="plinks ptags">
            	@foreach($tag_data1 as $k=>$v)           
                <li><a href="/list/index?tag_content={{$v->content}}" title="{{$v->content}}" draggable="false">{{$v->content}}</a></li> 
                @endforeach                            
            </ul>
        </div>
      </div>
@endsection


@section('content')
  <div class="content-wrap">
    <div class="content">
   
	 
          @foreach ($part_data as $v)     
                <a href="/list/index?part_name={{$v->id}}" title="{{$v->part_name}}" class="layui-btn layui-btn-primary">{{$v->part_name}}</a>    
                @endforeach     
        <hr>

 
      <div class="title">
       <ul class="plinks ptags"> 
       <li>
        @if(!empty($_GET['part_name']))
   				@if(empty($data[0]))
				<h3 style="line-height: 1.3">很抱歉!分区下没有数据</h3>
				@else
				<h3 style="line-height: 1.3">{{$data[0]->parts ->part_name}}</h3>
       			 @endif
        

        @elseif(!empty($_GET['search']))
        <h3 style="line-height: 1.3">搜索标题"{{$_GET['search']}}"</h3>
        @elseif(!empty($_GET['tag_content']))
				<h3 style="line-height: 1.3">标签:"{{$tag_content}}"</h3>
        @elseif(!empty($_GET['user_id']))
        <h3 style="line-height: 1.3">发表人:"{{$data[0]->users->username}}"</h3>
   
        @endif
        <br>
        <br>
		@if(empty($data[0]))
		<h3 style="line-height: 1.3"><strong>很抱歉!没有该数据</strong></h3>
        @endif
        
        </li>


        </ul>
      </div>
    @if(!empty($data))
    @if(!empty($tag_content))
		@foreach($data as $k => $v)
         <article class="excerpt excerpt-5"><a class="focus" href="/detail/{{$v -> articles -> id}}" title="{{$v -> articles->title}}" target="_blank" ><img class="thumb" data-original="/{{$v -> articles -> users -> head_pic}}" src="/{{$v -> articles -> users -> head_pic}}" alt="{{$v -> articles->title}}"  style="display: inline;width:150px;height:150px;"></a>
        <header><a class="cat" href="/list/index?part_name={{ $v -> articles ->parts ->id}}" title="{{$v -> articles->parts->part_name}}" >{{$v -> articles->parts->part_name}}<i></i></a>
          <h2><a href="/detail/{{$v -> articles -> id}}" title="{{$v -> articles->title}}" target="_blank" >{{$v -> articles->title}}</a></h2>
        </header>
        <p class="meta">
          <time class="time"><i class="glyphicon glyphicon-time"></i> {{$v -> articles->created_at}}</time>
          <span class="views"><i class="glyphicon glyphicon-eye-open"></i> {{$v -> articles->reading}}</span> <a class="comment" href="#" title="评论" target="_blank" ><i class="glyphicon glyphicon-comment"></i>{{count($v -> articles->reviews)}}</a></p>
        <p class="note" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;">{{$v -> articles->content}}</p>
      </article>
      @endforeach
      <div class="page" >
        {!! $data -> appends(['tag_content' => $tag_content]) -> render() !!}
      </div>
      @else
      @foreach($data as $k => $v)
         <article class="excerpt excerpt-5"><a class="focus" href="/detail/{{$v -> id}}" title="{{$v->title}}" target="_blank" ><img class="thumb" data-original="/{{$v -> users -> head_pic}}" src="/{{$v -> users -> head_pic}}" alt="{{$v->title}}"  style="display: inline;width:150px;height:150px;"></a>
        <header><a class="cat" href="/list/index?part_name={{ $v ->parts ->id}}" title="{{$v->parts->part_name}}" >{{$v->parts->part_name}}<i></i></a>
          <h2><a href="/detail/{{$v -> id}}" title="{{$v->title}}" target="_blank" >{{$v->title}}</a></h2>
        </header>
        <p class="meta">
          <time class="time"><i class="glyphicon glyphicon-time"></i> {{$v->created_at}}</time>
          <span class="views"><i class="glyphicon glyphicon-eye-open"></i> {{$v->reading}}</span> <a class="comment" href="#" title="评论" target="_blank" ><i class="glyphicon glyphicon-comment"></i>{{count($v->reviews)}}</a></p>
        <p class="note" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;">{{$v->content}}</p>
      </article>
      @endforeach
      <div class="page" >
        {!! $data ->appends(['search'=>$search,'part_name'=> $part_name,'tag_content'=>$tag_content,'user_id'=>$user_id]) -> render() !!}
      </div>
      @endif
      @endif
    </div>
  </div>
<script type="text/javascript">
$(function(){
  $('.page ul').css('display','block');
});
</script> 

@endsection