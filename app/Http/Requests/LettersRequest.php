<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LettersRequest extends Request
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
            'title' => 'required',
            'content' => 'required'
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
            'title.required' => '信件标题不能为空！',
            'content.required' => '信件内容不能为空！'
        ];
    }
}
