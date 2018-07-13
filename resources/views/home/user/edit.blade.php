<link rel="stylesheet" type="text/css" href="/layui/css/layui.css">
<script type="text/javascript" src="/layui/layui.all.js"></script>
<form class="layui-form" action="/user/detail/update/{{$user_data -> id}}" method="post">
  {{csrf_field()}}
  <div class="layui-form-item">
    <label class="layui-form-label">昵称</label>
    <div class="layui-input-inline">
      <input type="text" name="pet_name" value="{{$user_data -> users_details -> pet_name or $user_data -> username}}" placeholder="请输入你的昵称" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">职业</label>
    <div class="layui-input-inline">
      <input type="text" name="profession" value="{{$user_data -> users_details -> profession or null}}" placeholder="请输入你的职业" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">行业</label>
    <div class="layui-input-inline">
      <input type="text" name="industry"  value="{{$user_data -> users_details -> industry or null}}" placeholder="请输入你的行业" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">生日</label>
    <div class="layui-input-inline">
      <input type="text" name="birthday" value="{{$user_data -> users_details -> birthday or null}}" placeholder="请输入你的生日" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">地址</label>
    <div class="layui-input-block">
      <input type="text" name="addr"  value="{{$user_data -> users_details -> addr or null}}" placeholder="请输入地址" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">性别</label>
    <div class="layui-input-block">
      <input type="radio" name="sex" value="unknown" title="未知" {{($user_data -> sex == 'unknown')?'checked':''}}>
      <input type="radio" name="sex" value="m" title="男" {{($user_data -> sex == 'm')?'checked':''}}>
      <input type="radio" name="sex" value="w" title="女" {{($user_data -> sex == 'w')?'checked':''}}>
    </div>
  </div>
  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">自我描述</label>
    <div class="layui-input-block">
      <textarea name="descript"  value="{{$user_data -> users_details -> descript or null}}"  placeholder="请输入内容" class="layui-textarea"></textarea>
    </div>
  </div>
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
</form>
<script>
    
    layui.use('form', function () {
        var form = layui.form;
        form.render();
    });
    
</script>
