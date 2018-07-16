<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>三叉戟博客</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="/home/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/home/css/nprogress.css">
    <link rel="stylesheet" type="text/css" href="/home/css/style.css">
    <link rel="stylesheet" type="text/css" href="/home/css/font-awesome.min.css">
    <link rel="apple-touch-icon-precomposed" href="/home/images/icon.png">
    <link rel="shortcut icon" href="/home/images/favicon.ico">
    <script src="/home/js/jquery-2.1.4.min.js"></script>
    <script src="/home/js/nprogress.js"></script>
    <script src="/home/js/jquery.lazyload.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/layui/css/layui.css">
    <script type="text/javascript" src="/layui/layui.all.js"></script>
    <!--[if gte IE 9]>
      <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
      <script src="js/html5shiv.min.js" type="text/javascript"></script>
      <script src="js/respond.min.js" type="text/javascript"></script>
      <script src="js/selectivizr-min.js" type="text/javascript"></script>
    <![endif]-->
    <!--[if lt IE 9]>
      <script>window.location.href='upgrade-browser.html';</script>
    <![endif]-->
<link rel="stylesheet" type="text/css" href="/layui/css/layui.css">
<script type="text/javascript" src="/layui/layui.all.js"></script>
</head>
<body class="user-select">
    <header class="header">
  <nav class="navbar navbar-default" id="navbar">
    <div class="container">
      <div class="navbar-header">
        <h1 class="logo hvr-bounce-in"><a href="/" title="三叉戟博客"><img src="http://www.muzhuangnet.com/upload/201610/17/201610171329086541.png" alt="三叉戟博客"></a></h1>
      </div>
      <div class="collapse navbar-collapse" id="header-navbar">

        
        <ul class="nav navbar-nav navbar-right">
          <li><a data-cont="三叉戟博客首页" title="三叉戟博客首页" href="/">首页</a></li>
          <li><a data-cont="三叉戟小组" title="三叉戟小组" href="#">关于我们</a></li>
          @if(session() -> has('homeUser'))
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="/{{session() -> get('homeUser')->head_pic}}" class="img-circle" style="width:40;height:40px"><span class="caret"></span></a>
          
          <ul class="dropdown-menu">
            <li class="text-center"><a href="/user/index">个人中心</a></li>
            @if (session()->get('homeUser') -> qx == 1)
            <li class="text-center"><a href="/admin">后台管理</a></li>
            @endif

            <li class="text-center"><a href="/repass">修改密码</a></li>
            <li role="separator" class="divider"></li>
            <li class="text-center"><a href="/logout">注销</a></li>
          </ul>
        </li>
        @else
        <ul class="nav navbar-nav navbar-right " >
          <li><a data-cont="三叉戟博客登录" title="三叉戟博客登录" href="/login">登录</a></li>
          <li><a data-cont="三叉戟博客注册" title="三叉戟博客注册" href="/signup">注册</a></li>
        </ul>
        @endif

        
    </div>
  </nav>
</header>
    <section class="container">
    @section('content')
  
  @show
  @section('header')
  <aside class="sidebar">
    @section('message')
    <div class="fixed">
    @section('head')
      <div class="widget widget-tabs">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#notice" aria-controls="notice" role="tab" data-toggle="tab" >统计信息</a></li>
          <li role="presentation"><a href="#contact" aria-controls="contact" role="tab" data-toggle="tab" >联系站长</a></li>
        </ul>
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane contact active" id="notice">
            <h2>日志总数:
                  888篇
              </h2>
              <h2>网站运行:
              <span id="sitetime">88天 </span></h2>
          </div>
            <div role="tabpanel" class="tab-pane contact" id="contact">
              <h2>QQ:
                  <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=577211782&amp;site=qq&amp;menu=yes" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="bottom" title=""  data-original-title="QQ:577211782">577211782</a>
              </h2>
              <h2>Email:
              <a href="mailto:577211782@qq.com" target="_blank" data-toggle="tooltip" rel="nofollow" data-placement="bottom" title=""  data-original-title="Email:577211782@qq.com">577211782@qq.com</a></h2>
          </div>
        </div>
      </div>
      @show
      <div class="widget widget_search">
        <form class="navbar-form" action="/list/index" method="get">
          <div class="input-group">
            <input type="text" name="search" class="form-control" size="35" placeholder="请输入文章标题搜索" maxlength="15" autocomplete="off">
            <span class="input-group-btn">
            <button class="btn btn-default btn-search"  type="submit">搜索</button>
            </span> </div>
        </form>
      </div>
    </div>
    @show
    <div class="widget widget_hot">
          <h3>最新评论文章</h3>
          <ul>            
              @foreach($review_data as $v)
                @if(!$v -> articles == null)
                <li><a title="{{$v->users->username}}" href="/detail/{{$v -> articles -> id}}" ><span class="thumbnail">
                    <img class="thumb"  src="/{{$v -> articles -> users -> head_pic}}" alt="{{$v->articles->content}}"  style="display: block;width:90px;height:90px;">
                </span><span class="text">{{$v->articles->title}}</span><span class="muted"><i class="glyphicon glyphicon-time"></i>
                    {{$v-> articles -> updated_at}}
                </span><span class="muted"><i class="glyphicon glyphicon-eye-open"></i>{{$v->articles->reading}}</span></a>
                
                </li>
                @endif
              @endforeach
          </ul>
     </div>
     <div class="widget widget_sentence">    
        <a href="http://web.muzhuangnet.com/" target="_blank" rel="nofollow" title="专业网站建设" >
        <img style="width: 100%" src="http://www.muzhuangnet.com/upload/201610/24/201610241224221511.jpg" alt="专业网站建设" ></a>    
     </div>
     <div class="widget widget_sentence">    
        <a href="http://www.muzhuangnet.com/show/269.html" target="_blank" rel="nofollow" title="MZ-NetBlog主题" >
        <img style="width: 100%" src="images/ad.jpg" alt="MZ-NetBlog主题" ></a>    
     </div>
    <div class="widget widget_sentence">
      <h3>友情链接</h3>
      <div class="widget-sentence">
        @foreach ($frilink_data as $v)
        <a href="{{$v->url}}" title="{{$v->descript}}" target="_blank" style="float:left;margin-left:10px;">{{$v->title}}</a>&nbsp;&nbsp;&nbsp;
        @endforeach
      </div>
    </div>
  </aside>
  @show
</section>
    <footer class="footer">
  <div class="container">
    <p>本站[<a href="/" >三叉戟博客</a>]的部分内容来源于网络，若侵犯到您的利益，请联系站长删除！谢谢！Powered By [<a href="http://www.dtcms.net/" target="_blank" rel="nofollow" >DTcms</a>] Version 4.0 &nbsp;<a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow" >闽ICP备00000000号-1</a> &nbsp; <a href="/" target="_blank" class="sitemap" >网站地图</a></p>
  </div>
  <div id="gotop"><a class="gotop"></a></div>
</footer>
    <script src="/home/js/bootstrap.min.js"></script>
    <script src="/home/js/jquery.ias.js"></script>
    <script src="/home/js/scripts.js"></script>
</body>
</html>
