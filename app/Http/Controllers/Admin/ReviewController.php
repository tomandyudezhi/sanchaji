<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Reviews;

class ReviewController extends Controller
{
    /**
     * 评论显示
     *
     * 
     */
    public function index(Request $request)
    {
        //接收查询字段
        $searchname = $request -> input('searchname');
        //查询所有评论
        $data = Reviews::where('content','like',"%{$searchname}%" )->paginate(10);
        //加载评论显示页面
        return view('admin.review.index',['title'=>'评论管理','data'=>$data,'searchname'=>$searchname]);
    }

    /**
     * 评论删除
     * 
     * @param  int  $id
     * @return bool
     */
    public function delete($id)
    {
        $review = Reviews::find($id);
        $res = $review -> delete();
        if ($res = true) {
            return redirect('/admin/review/index')->with('success','删除成功');
        } else {
            return back()->with('error','删除失败');
        }
                                                            
    }
}
