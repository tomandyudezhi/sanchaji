<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FrilinksInsertReuqest extends Request
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
     * 验证规则
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'descript' => 'required',
            'url' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '请输入网站标题',
            'descript.required' => '请输入网站描述',
            'url.required' => '请输入网站地址',
        ];
    }
}
