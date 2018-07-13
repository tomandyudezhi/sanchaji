<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Users;
use Hash;

class LoginController extends Controller
{
    /**
     * 后台登录
     *
     * @return 模板
     */
    public function index()
    {
        // 加载模板
        return view('admin.login.index');
    }

    /**
     * 后台验证
     *
     */
    public function check(LoginRequest $request)
    {
        $login = $request -> except('_token');
        $user = Users::where('username',$login['username'])->first();
        if ($user == null) {
            return back()->with('error','登陆失败,用户名错误');
        }
        // 用户输入密码 加密
        $login_push = $login['password'];
        // 验证
        $res = Hash::check($login_push, $user -> password);
        if ($res) {
            if ($user -> shield == 'n') {
                if ($user -> qx == 1) {
                    session() -> put('adminFlag',true);
                    session() -> put('adminUser',$user);
                    return redirect('/admin')->with('success','登陆成功');
                } else {
                    return back()->with('error','登陆失败,您不是管理员');
                }
            } else {
                return back()->with('error','登陆失败,您是被屏蔽用户');
            }
        } else {
            return back()->with('error','登陆失败,密码错误');
        }
    }

    /**
     * 后台登出
     *
     * @return bool
     */
    public function loginout()
    {
        session() -> flush();
        session('adminFlag',false);
        return redirect('/admin/login')->with('success','退出成功');
    }
}
