<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\FeedBacks;

class FeedbacksController extends Controller
{
    /**
     * 反馈列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request -> input('search');
        //从数据库获取数据
        $data = Feedbacks::where('content','like',"%{$search}%")-> paginate(2);
        //dump($data);
        //加载模板
        return view('admin.feedbacks.index',['data'=>$data,'search'=>$search]);
    }

    /**
     * 删除反馈
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $res = FeedBacks::find($id)->delete();
        if($res){
            return redirect('/admin/feedbacks/index')->with('success','删除反馈成功!');
        } else {
            return back() -> with('error','删除反馈失败');
        }
    }
}
