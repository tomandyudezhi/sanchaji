<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Adverts;

class AdvertsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request -> input('search');
        //获取数据
        $data = Adverts::where('descript','like',"%{$search}%")-> paginate(3);
        //dump($data);
        //加载模板
        return view('admin.adverts.index',['data'=>$data,'search'=>$search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板
        return view('admin.adverts.create');
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
        $adverts = new Adverts;
        $adverts -> descript = $data['descript'];
        //dump($data);
        if($request -> hasFile('pic')){

            // 使用request 创建文件上传对象
            $profile = $request -> file('pic');
            $ext = $profile->getClientOriginalExtension();
            // 处理文件名称
            $temp_name = str_random(20);
            $name =  $temp_name.'.'.$ext;
            $dirname = date('Ymd',time());
            
            $str = $profile -> move('./uploads/'.$dirname,$name);
            $src = substr($str,1);
            $adverts -> pic = $src;
        }

        $res = $adverts -> save();

        if ($res) {
            return redirect('/admin/adverts/index') -> with('success','添加成功');
        } else {
            return back() -> with('error','添加失败');
        }   
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Adverts::find($id);
        //dump($data);
        //加载模板
        return view('admin.adverts.edit',['data'=>$data]);
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
        $data = $request -> except('_token');
        $adverts = Adverts::find($id);
        $adverts -> descript = $data['descript'];
        //dump($data);
        if($request -> hasFile('pic')){

            // 使用request 创建文件上传对象
            $profile = $request -> file('pic');
            $ext = $profile->getClientOriginalExtension();
            // 处理文件名称
            $temp_name = str_random(20);
            $name =  $temp_name.'.'.$ext;
            $dirname = date('Ymd',time());
            
            $str = $profile -> move('./uploads/'.$dirname,$name);
            $src = substr($str,1);
            $adverts -> pic = $src;
        }

        $res = $adverts -> save();

        if ($res) {
            return redirect('/admin/adverts/index') -> with('success','修改成功');
        } else {
            return back() -> with('error','修改失败');
        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $adverts = Adverts::find($id);
        $res = $adverts  -> delete();
        if($res){
            return redirect('/admin/adverts/index')->with('success','删除成功!');
        } else {
            return back() -> with('error','删除失败');
        }
    }
}
