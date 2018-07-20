<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\UsersDetails;
use Hash;
use App\Http\Requests\HomeLoginRequest;
use App\Http\Requests\RepassRequest;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

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
        if ($login['code'] != session('code')) {
            return back()->with('error','登陆失败,验证码错误');
        }
        if ($user == null) {
            return back()->with('error','登陆失败,用户名错误');
        }
        // 用户输入密码
        $login_push = $login['password'];
        // 验证
        $res = Hash::check($login_push, $user -> password);
        if ($res) {
            if ($user -> shield == 'n') {
                session() -> put('homeUser',$user);
                session() -> put('homeFlag',true);
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
        // 查询数据
        $data = $request -> except('_token');
	if($data['mailcode'] != session()->get('mailcode')){
		return back() -> with('error','验证码错误');
	}
        $user = new Users;
        $user -> username = $data['username'];
        $user -> password = Hash::make($data['password']);
        $user -> email = $data['email'];
        $user -> qx = $data['qx'];
        $user -> phone = $data['phone'];
        $user -> create_ip = ip2long($_SERVER['REMOTE_ADDR']);
        $res1 = $user -> save();
        $detail = new UsersDetails;
        $detail -> uid = $user -> id;
        $res2 = $detail -> save();
        if($res1 && $res2){
            return redirect('/login') -> with('success', '注册成功');
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

    /**
     * 前台修改密码
     *
     * @return  模板
     */
    public function repass()
    {
        //显示模板
        return view('home.repass.index');
    }

    /*
     *前台修改密码检查
     */
    public function checkrepass(RepassRequest $request)
    {
        // 查询数据
        $data = $request -> except('_token');
        if($data['repassword'] != $data['newpassword']){
            return back() -> with('error', '请与上次密码一致');
        }
        $user = Users::find($data['id']);
        // 验证旧密码
        $res = Hash::check($data['oldpassword'],$user -> password);
        if ($res) {
            $user -> password = Hash::make($data['newpassword']);
            $user -> save();
            session() -> put('homeUser',$user);
            return redirect('/user/index') -> with('success', '修改成功');
        } else {
            return back() -> with('error', '修改失败');
        }
    }
    
    /*
     *生成验证码
     */
    public function yanzhengma()
    {
        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(123, 203, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 90, $height = 35, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        session(['code'=>$phrase]);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }
}
