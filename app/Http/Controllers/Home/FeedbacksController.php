<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\FeedBacks;
use App\Models\ShieldWords;

class FeedbacksController extends Controller
{
    /**
     * 显示反馈页面
     *
     * @return 模板
     */
    public function index(Request $request)
    {
        $id = session() -> get('homeUser') -> id;
        $search = $request -> input('search','');
        $feedbacks_data = Feedbacks::where('uid','=',$id) -> where('content','like',"%{$search}%") -> paginate(2);
        //dump($feedbacks_data);
        return view('home.feedbacks.index',['feedbacks_data'=>$feedbacks_data,'search'=>$search]);
    }

    /**
     * 加载反馈发送页面
     *
     * @return 模板
     */
    public function create()
    {
        return view('home.feedbacks.create');
    }

    /**
     * 执行反馈发送
     *
     * @param  \Illuminate\Http\Request  $request
     * @return boll
     */
    public function store(Request $request)
    {
        $data = $request -> except('_token');
        if(strlen($data['content']) == 0){
             return back() -> with('error', '反馈内容不能为空');
        }
        // 获取屏蔽字段
        $shieldwords = ShieldWords::find(1);
        // 处理屏蔽词
        $str = explode('|',$shieldwords -> content);
        // 完成处理
        foreach($str as $v)
        {
            $length = strlen($v);
            $replace = '';
            for($i = 0; $i < $length; $i++){
            $replace .= '*';
            }
            $data['content'] = str_replace($v,$replace,$data['content']);
        }
        $feedbacks = new FeedBacks;
        $feedbacks -> content = $data['content'];
        $feedbacks -> uid = session()->get('homeUser')->id;
        $res = $feedbacks -> save();
        if($res){
            return redirect('/user/feedbacks/index') -> with('success', '添加成功');
        } else {
            return back() -> with('error', '添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
