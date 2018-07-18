<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\FriLinks;
use App\Http\Requests\FrilinksInsertReuqest;

class FrilinksController extends Controller
{
    /**
     * 友情链接首页
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request -> input('search');
        //获取数据
        $data = FriLinks::where('title','like',"%{$search}%")-> paginate(4);
        //dump($data);
        //加载模板
        return view('admin.frilinks.index',['data'=>$data,'search'=>$search]);
    }

    /**
     * 友情链接添加页
     *
     * @return 加载模板
     */
    public function create()
    {
        //加载模板
        return view('admin.frilinks.create');

    }

    /**
     * 处理添加 
     * $requset 接收数据
     * @param    $request
     * @return \Illuminate\Http\Response
     */
    public function store(FrilinksInsertReuqest $request)
    {
        //接收数据
        $data = $request->except('_token');
        //dump($data);
        $frilink = new FriLinks;
        $frilink -> title = $data['title'];
        $frilink -> descript = $data['descript'];
        $frilink -> url = $data['url'];
        $res = $frilink -> save();
        if($res){
            return redirect('/admin/frilinks/index')->with('success','添加链接成功!');
        } else {
            return back()->with('error','添加链接失败!');
        }        
    }


    /**
     * 友情链接修改
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //取数据
        $data = FriLinks::find($id);
        //dump($data);
        //加载模板
        return view('admin.frilinks.edit',['data'=>$data]);
    }

    /**
     * 执行修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //接收修改数据
        $data = $request->except('_token');
        //dump($data);
        $frilink = FriLinks::find($id);
        $frilink -> title = $data['title'];
        $frilink -> descript = $data['descript'];
        $frilink -> url = $data['url'];
        $res = $frilink -> save();
        if($res){
            return redirect('/admin/frilinks/index')->with('success','修改链接成功!');
        } else {
            return back()->with('error','修改链接失败!');
        }      
    }

    /**
     * 删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //根据ID获取要删除的数据
        $frilink = FriLinks::find($id);
        //dump($frilink);
        $res = $frilink -> delete();
        if($res){
            return redirect('/admin/frilinks/index')->with('success','删除链接成功!');
        } else {
            return back() -> with('error','删除链接失败');
        }
    }
}
