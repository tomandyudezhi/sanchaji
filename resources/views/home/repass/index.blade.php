@extends('home.commit.commit')

@section('title')
    修改密码
@endsection

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
    <h1 class="article-title text-left" style="color:#009688;">修改密码</h1>
    <hr>
    <br>
    <div class="readers">
        <form class="layui-form" action="/repass/check" method="post">
            {{csrf_field()}}
            <div class="layui-form-item">
                <label class="layui-form-label">旧密码</label>
                <div class="layui-input-block">
                    <input type="password" name="oldpassword" placeholder="请输入旧密码"  class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">新密码</label>
                <div class="layui-input-block">
                    <input type="password" name="newpassword" placeholder="请输入新密码，以数字字母下划线组合至少8位"  class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">确认密码</label>
                <div class="layui-input-block">
                    <input type="password" name="repassword" placeholder="输入相同密码"  class="layui-input">
                    <input type="hidden" name="id" value="{{ session()->get('homeUser')->id }}">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn"  lay-filter="formDemo">点击修改</button>
                </div>
            </div>
        </form>
    </div>
</div>
</section>
<!-- 消息提示开始 -->
@if(count($errors) >0)
    <input type="hidden" value="{{$errors -> all()[0]}}" id="hidd" >
    <script type="text/javascript">
        var msg = document.getElementById('hidd');
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
<!-- 消息提示结束 -->
@endsection

@section('header')

@endsection