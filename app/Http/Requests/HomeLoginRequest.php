<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class HomeLoginRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|regex:/^[a-zA-Z]{1}[a-zA-Z0-9_]{7,15}$/|unique:blog_users,username',
            'password' => 'required|regex:/^[a-zA-Z0-9_]{8,}$/',
            'repass' => 'same:password',
            'phone' => 'required|regex:/^[1][3-8][0-9]{9}$/',
            'email' => 'required|email',
        ];
    }

    /**
     * 
     * 定义错误验证的消息
     * 
     */
    public function messages()
    {
        return [
            'username.required' => '用户名不能为空！',
            'username.regex' => '用户名必须为8-16位以字母开头的字母数字下划线组合！',
            'username.unique' => '用户名已存在',
            'password.required' => '密码不能为空',
            'password.regex' => '密码必须为8位以上的数字字母下划线组合',
            'phone.required' => '电话号码不能为空',
            'phone.regex' => '请输入正确的电话格式',
            'repass.same' => '请与密码一致',
            'email.email' => '请输入正确邮箱',
            'email.required' => '邮箱不能为空'
        ];
    }
}
