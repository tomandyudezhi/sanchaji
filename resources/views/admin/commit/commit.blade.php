
<!DOCTYPE HTML>
<html>
<head>
<title>
@section('title')
首页
@show
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="/admins/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="/admins/css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="/admins/css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="/admins/css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="/admins/js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='http://fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="/admins/css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<link rel="stylesheet" type="text/css" href="/layui/css/layui.css">
<script type="text/javascript" src="/layui/layui.all.js"></script>
<link rel="icon" href="/title.png" type="image/x-icon"/>
</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
             <!--header start here-->
				<div class="header-main">
					<div class="logo-w3-agile">
								<h1><a href="/admin">三叉戟</a></h1>
							</div>
					<div class="w3layouts-left">
							
							<!--search-box-->

								<div class="w3-search-box">
									@section('search')
									<form action="">
										<input type="text" placeholder="本页不能搜索..." required="">	
										<input type="submit" value="">					
									</form>
									@show
								</div><!--//end-search-box-->
							<div class="clearfix"> </div>
						 </div>
						 <div class="w3layouts-right">
							<div class="profile_details_left"><!--notifications of menu start -->
								<ul class="nofitications-dropdown" style="height:45px;">
									
									
									<div class="clearfix"> </div>
								</ul>
								<div class="clearfix"> </div>
							</div>
							<!--notification menu end -->
							
							<div class="clearfix"> </div>				
						</div>
						<div class="profile_details w3l">		
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<span class="prfil-img"><img src="/{{ session() ->get('adminUser') ->head_pic}}" alt=""> </span> 
												<div class="user-name">
													<p>{{ session()-> get('adminUser')->username }}</p>
													<span>管理员</span>
												</div>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
												<div class="clearfix"></div>	
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> <a href="/admin/repass"><i class="fa fa-cog"></i><b>修改密码</b></a></li>
											<li> <a href="/admin/login/out"><i class="fa fa-sign-out"></i><b>退出</b></a></li>
										</ul>
									</li>
								</ul>
							</div>
							
				     <div class="clearfix"> </div>	
				</div>
	<!-- 内容开始 -->
	@section('content')
		<div class="four-grids">
					<div class="col-md-3 four-grid">
						<div class="four-agileits">
							<div class="icon">
								<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>注册用户</h3>
								<h4> {{$user_count}}  </h4>
								
							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-agileinfo">
							<div class="icon">
								<i class="glyphicon glyphicon glyphicon-send" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>评论总数</h3>
								<h4>{{$review_count}}</h4>

							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-w3ls">
							<div class="icon">
								<i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3 title="当月新增博客">新增博客</h3>
								<h4>{{$article_month_count}}</h4>
								
							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-wthree">
							<div class="icon">
								<i class="glyphicon glyphicon-briefcase" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>博客总数</h3>
								<h4>{{$article_count}}</h4>
								
							</div>
							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
<!--//four-grids here-->


<!--photoday-section-->	
			
                        
                    	<div class="col-sm-4 wthree-crd">
                            <div class="card">
                                <div class="card-body">
                                    <div class="widget widget-report-table">
                                        <header class="widget-header m-b-15">
                                        </header>
                                        
                                        <div class="row m-0 md-bg-grey-100 p-l-20 p-r-20">
                                            <div class="col-md-6 col-sm-6 col-xs-6 w3layouts-aug">
                                                <h3>管理员</h3>
                                                <p>列表</p>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 ">
                                                <h2 class="text-right c-teal f-300 m-t-20">{{count($man)}}</h2>
                                            </div>
                                        </div>
                                        
                                        <div class="widget-body p-15">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>用户名</th>
                                                        <th>身份</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                	@foreach($man as $k => $v)
                                                		@if($k <= 5)
                                                    <tr>
                                                        <td>{{$v -> id}}</td>
                                                        <td>{{$v -> username}}</td>
                                                        <td>管理员</td>
                                                    </tr>
                                                    	@endif
                                                    @endforeach
                                                </tbody>
                                            </table>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-4 w3-agileits-crd">
						
                            <div class="card card-contact-list">
							<div class="agileinfo-cdr">
                                <div class="card-header">
                                    <h3>开发人员</h3>
                                </div>
                                <div class="card-body p-b-20">
                                    <div class="list-group">
                                        <a class="list-group-item media" href="">
                                             <div class="pull-left">
                                                <img class="lg-item-img" src="/admins/images/in1.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="pull-left">
                                                	<div class="lg-item-heading">余德智</div>
                                                	<small class="lg-item-text">zuzhang@qq.com</small>
                                                </div>
                                                <div class="pull-right">
                                                	<div class="lg-item-heading">组长</div>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="list-group-item media" href="">
                                            <div class="pull-left">
                                                <img class="lg-item-img" src="/admins/images/in2.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="pull-left">
                                                	<div class="lg-item-heading">石佳</div>
                                                	<small class="lg-item-text">zuyuan1@qq.com</small>
                                                </div>
                                                <div class="pull-right">
                                                	<div class="lg-item-heading">组员</div>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="list-group-item media" href="">
                                            <div class="pull-left">
                                                <img class="lg-item-img" src="/admins/images/in3.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="pull-left">
                                                	<div class="lg-item-heading">胡涛</div>
                                                	<small class="lg-item-text">zuyuan2@qq.com</small>
                                                </div>
                                                <div class="pull-right">
                                                	<div class="lg-item-heading">组员</div>
                                                </div>
                                            </div>
                                        </a>
                                   	</div>
                                </div>
                            </div>
							</div>
                      	</div>
                    	<div class="col-sm-4 w3-agile-crd">
                            <div class="card">
                                <div class="card-body card-padding">
                                    <div class="widget">
                                        <header class="widget-header">
                                            <h4 class="widget-title">最新博客</h4>
                                        </header>
                                        <hr class="widget-separator">
                                        <div class="widget-body">
                                            <div class="streamline">
                                            	@foreach($new_data as $v)
                                                <div class="sl-item sl-primary">
                                                    <div class="sl-content">
                                                        <small class="text-muted">{{$v -> created_at}}</small>
                                                        <p>{{$v -> title}}</p>
                                                    </div>
                                                </div>
                                                
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="clearfix"></div>
                   
		@show
<!-- 内容结束 -->
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>Copyright &copy; 2018.Company name All rights reserved.More Templates <a href="#">php204三叉戟小组</a> - Collect from 三叉戟</p>
</div>	
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo1">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
									<ul id="menu" >
									<li><a href="/admin"><i class="fa fa-home"></i>  <span>首页</span><div class="clearfix"></div></a></li>
									<li id="menu-academico" ><a href="#"><i class="fa fa-user" aria-hidden="true"></i><span> 用户管理</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="/admin/user/index">查看用户</a></li>
											<li id="menu-academico-avaliacoes" ><a href="/admin/user/create">添加用户</a></li>
										  </ul>
									</li>
									<li id="menu-academico" ><a href="#"><i class="fa fa-sitemap" aria-hidden="true"></i><span> 分类管理</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="/admin/parts/index">查看分类</a></li>
											<li id="menu-academico-avaliacoes" ><a href="/admin/parts/create">添加分类</a></li>
										  </ul>
									</li>
									<li id="menu-academico" ><a href="#"><i class="fa fa-book" aria-hidden="true"></i><span> 文章管理</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="/admin/article/index">查看文章</a></li>
											<li id="menu-academico-avaliacoes" ><a href="/admin/article/create">添加文章</a></li>
											<li id="menu-academico-avaliacoes" ><a href="/admin/article/recycle">回收站</a></li>
										  </ul>
									</li>
									<li id="menu-academico" ><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i><span> 站内信管理</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="/admin/letters/index">查看站内信</a></li>
										   <li id="menu-academico-avaliacoes" ><a href="/admin/letters/sys">查看系统消息</a></li>
										  </ul>
									</li>
									<li><a href="/admin/review/index"><i class="fa fa-comments"></i><span>评论管理</span><div class="clearfix"></div></a></li>
									<li><a href="/admin/shieldwords/index"><i class="fa fa-lock"></i><span>屏蔽词管理</span><div class="clearfix"></div></a></li>
									<li id="menu-academico" ><a href="/admin/turnimage/index"><i class="fa fa-picture-o" aria-hidden="true"></i><span> 轮播图管理</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										<ul id="menu-academico-sub" >
										    <li id="menu-academico-avaliacoes" ><a href="/admin/turnimage/index">查看轮播图</a></li>
											<li id="menu-academico-avaliacoes" ><a href="/admin/turnimage/create">添加轮播图</a></li>
										</ul>
									</li>
									<li><a href="/admin/tag/index"><i class="fa fa-tag"></i><span>标签管理</span><div class="clearfix"></div></a></li>
									<li id="menu-academico" ><a href="#"><i class="fa fa-chain" aria-hidden="true"></i><span> 友情链接</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="/admin/frilinks/index">查看链接</a></li>
											<li id="menu-academico-avaliacoes" ><a href="/admin/frilinks/create">添加链接</a></li>
										  </ul>
									</li>
									<li><a href="/admin/feedbacks/index"><i class="fa fa-comment"></i><span>反馈管理</span><div class="clearfix"></div></a></li>
									<li id="menu-academico" ><a href="/admin/adverts/index"><i class="fa  fa-scissors" aria-hidden="true"></i><span> 广告管理</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="/admin/adverts/index">查看广告</a></li>
											<li id="menu-academico-avaliacoes" ><a href="/admin/adverts/create">添加广告</a></li>
										  </ul>
									</li>
									<li><a href="/admin/config/index"><i class="fa fa-gear"></i><span>网站配置</span><div class="clearfix"></div></a></li>
								  </ul>
								</div>
							  </div>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="/admins/js/jquery.nicescroll.js"></script>
<script src="/admins/js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="/admins/js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   
<!-- morris JavaScript -->	
<script src="/admins/js/raphael-min.js"></script>
<script src="/admins/js/morris.js"></script>
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2014 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2014 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2014 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2014 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2015 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2015 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2015 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2015 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2016 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
				{period: '2016 Q2', iphone: 8442, ipad: 5723, itouch: 1801}
			],
			lineColors:['#ff4a43','#a2d200','#22beef'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
	<!-- 信息提示 -->
		@if(session('success'))
            <input type="hidden" value="{{session('success')}}" id="success1">
            <script type="text/javascript">
				var msg = document.getElementById('success1');
				layer.msg(msg.value);
            </script>
        @endif
        @if(session('error'))
            <input type="hidden" value="{{session('error')}}" id="error1">
            <script type="text/javascript">
				var msg = document.getElementById('error1');
				layer.msg(msg.value);
            </script>
        @endif
</body>
</html>