@foreach ($list_data as $k => $v)
      <article class="excerpt " style="">
      <a class="focus text-center" href="/detail/{{ $v -> id }}"  target="_blank" ><img class="thumb"  src="/{{ $v -> users -> head_pic}}"  style="display: inline;width:140px;height:140px;"></a>
            <header><a class="cat" href="/list/index?part_name={{ $v->parts->id }}" title="{{$v->parts->part_name}}" >{{$v->parts->part_name}}<i></i></a>
                <h2><a href="/detail/{{ $v -> id }}" title="{{$v->title}}" target="_blank" >{{$v->title}}</a>
                </h2>
            </header>
            <p class="meta">
                <time class="time"><i class="glyphicon glyphicon-time"></i> {{$v->created_at}}</time>
                <span class="views"><i class="glyphicon glyphicon-eye-open"></i>{{$v->reading}}</span> <a class="comment" href="/detail/{{ $v -> id }}" title="评论" target="_blank" ><i class="glyphicon glyphicon-comment"></i>{{count($v->reviews)}}</a>
            </p>
            <span id="hidden_text-{{$v->id}}" style="display:none;">{!!$v->content!!}</span>
            <p id="note-{{$v->id}}" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;color:#999;"></p>
        </article>
    <script type="text/javascript">
        $(function(){
        $('#note-{{$v->id}}').text($('#hidden_text-{{$v->id}}').text());
    });
    </script>
        </article>
@endforeach