<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tags;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    /**
     * 标签显示页面
     * 
     * @return  模板
     */
    public function index(Request $request)
    {
        //接收查询字段
        $searchname = $request -> input('searchname');
        //查询所有评论
        $data = Tags::where('content','like',"%{$searchname}%" )->paginate(5);
        //加载模板
        return view('admin.tag.index',['title' => '标签管理','data' => $data,'searchname' => $searchname]);
    }

    /**
     * 标签修改页面
     * 
     * @param  int  $id
     * @return 模板
     */
    public function edit($id)
    {
        //查找对应数据
        $data = Tags::find($id);
        //加载模板
        return view('admin.tag.edit',['title' => '标签修改','data' => $data]);
    }

    /**
     * 标签修改执行
     * 
     * @param  int  $id
     * @return bool
     */
    public function update(TagRequest $request,$id)
    {
        //获取修改对应数据
        $data = $request -> except('_token');
        $tags = Tags::find($id);
        $tags -> content = $data['content'];
        $res = $tags -> save();
        
        if ($res) {
            return redirect('/admin/tag/index') -> with('success','修改成功');
        } else {
            return back() -> with('error','修改失败');
        }   
    }

    /**
     * 标签删除执行
     * 
     * @param  int  $id
     * @return bool
     */
    public function delete($id)
    {
        //获取删除对应数据
        $res = Tags::find($id) -> delete();
        
        if ($res) {
            return redirect('/admin/tag/index') -> with('success','删除成功');
        } else {
            return back() -> with('error','删除失败');
        }   
    }

    
}
