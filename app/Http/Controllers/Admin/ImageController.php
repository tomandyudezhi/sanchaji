<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\TurnImage;

class ImageController extends Controller
{
    /**
     * 显示轮播图
     *
     * @return 模板
     */
    public function index()
    {
        $data = TurnImage::all();
        //加载模板
        return view('admin.turnimage.index',['data' => $data]);
    }

    /**
     * 添加轮播图
     *
     * @return 模板
     */
    public function create()
    {
        // 加载添加页面
        return view('admin.turnimage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request -> except('_token');
        $turnimage = new TurnImage;
        $turnimage -> title = $data['title'];

        if($request -> hasFile('pic')){

            // 使用request 创建文件上传对象
            $profile = $request -> file('pic');
            $ext = $profile->getClientOriginalExtension();
            // 处理文件名称
            $temp_name = str_random(20);
            $name =  $temp_name.'.'.$ext;
            $dirname = date('Ymd',time());
            $str = $profile -> move('./uploads/'.$dirname,$name);
            $turnimage -> pic = substr($str,1);
        }

        $res = $turnimage -> save();

        if ($res) {
            return redirect('/admin/turnimage/index') -> with('success','添加成功');
        } else {
            return back() -> with('error','添加失败');
        }   
    }

    /**
     * 修改页面
     *
     * @return 模板
     */
    public function edit($id)
    {
        $data = turnimage::find($id);

        return view('admin.turnimage.edit', ['data' => $data]);
    }

    /**
     * 轮播图修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request -> except('_token');
        $turnimage = TurnImage::find($id);
        $turnimage -> title = $data['title'];

        if($request -> hasFile('pic')){

            // 使用request 创建文件上传对象
            $profile = $request -> file('pic');
            $ext = $profile->getClientOriginalExtension();
            // 处理文件名称
            $temp_name = str_random(20);
            $name =  $temp_name.'.'.$ext;
            $dirname = date('Ymd',time());
            $str = $profile -> move('./uploads/'.$dirname,$name);
            $turnimage -> pic = substr($str,1);
        }
        
        $res = $turnimage -> save();

        if ($res) {
            return redirect('/admin/turnimage/index') -> with('success','修改成功');
        } else {
            return back() -> with('error','修改失败');
        }
    }

    /**
     * 删除轮播图
     *
     * @return boll
     */
    public function delete($id)
    {
        $res = TurnImage::find($id) -> delete();
        if($res){
            return redirect('/admin/turnimage/index') -> with('success', '删除成功');
        }else{
            return back() -> with('error', '修改失败');
        }
    }
}
