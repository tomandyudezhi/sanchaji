<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RepassRequest extends Request
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
            'oldpassword' => 'required',
            'newpassword' => 'required|regex:/^[a-zA-Z0-9_]{8,}$/',
            'repassword' => 'same:newpassword'
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
            'oldpassword.required' => '旧密码不能为空',
            'newpassword.required' => '新密码不能为空',
            'newpassword.regex' => '密码必须为8位以上的数字字母下划线组合',
            'repassword.same' => '请与上次密码一致'
        ];
    }
}
