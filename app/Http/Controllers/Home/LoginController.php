<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Hash;
use App\Http\Requests\HomeLoginRequest;

class LoginController extends Controller
{
    /**
     * 前台登陆页面
     *
     * @return 模板
     */
    public function index()
    {
        // 加载登陆模板
        return view('home.login.index');
    }

    /**
     * 前台注册页面
     *
     * @return 模板
     */
    public function create()
    {
        // 加载注册模板
        return view('home.login.signup');
    }

    /**
     * 检测登陆信息
     *
     */
    public function check(Request $request)
    {
        //  查询数据
        $login = $request -> except('_token');
        $user = Users::where('username',$login['username'])->first();
        if ($user == null) {
            return back()->with('error','登陆失败,用户名错误');
        }
        // 用户输入密码
        $login_push = $login['password'];
        // 验证
        $res = Hash::check($login_push, $user -> password);
        if ($res) {
            if ($user -> shield == 'n') {
                session() -> put('username',$login['username']);
                session() -> put('head_pic',$user['head_pic']);
                session() -> put('id',$user['id']);
                session() -> put('qx',$user['qx']);
                return redirect('/')->with('success','登陆成功');
            } else {
                return back()->with('error','登陆失败,您是被屏蔽用户');
            }
        } else {
            return back()->with('error','登陆失败,密码错误');
        }
    }

    /**
     * 注册验证
     *
     */
    public function signupcheck(HomeLoginRequest $request)
    {
        echo 123;
        // 查询数据
        $data = $request -> except('_token');
        dump($data);
        $user = new Users;
        $user -> username = $data['username'];
        $user -> password = Hash::make($data['password']);
        $user -> email = $data['email'];
        $user -> qx = $data['qx'];
        $user -> create_ip = ip2long($_SERVER['REMOTE_ADDR']);
        $res = $user -> save();
        dump($res);
        if($res){
            return redirect('/') -> with('success', '注册成功');
        }else{
            return back() -> with('error', '注册失败');
        }
    }

    /**
     * 前台登出
     *
     */
    public function logout()
    {
        session() -> flush();
        return redirect('/')->with('success','退出成功');
    }
}
