<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Parts;
use App\Models\ShieldWords;

class PartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        //dump($search);
        $data = Parts::where('part_name','like',"%$search%")-> paginate(5);
        //dump($data);
        
        return view('admin.parts.index',['data'=>$data,'search'=>$search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.parts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
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
            $data['part_name'] = str_replace($v,$replace,$data['part_name']);
        }
        $parts = new Parts;
        $parts -> part_name = $data['part_name'];
        $res = $parts -> save();
        if($res){
            return redirect('/admin/parts/index')->with('success','添加分类成功!');
        } else {
            return back()->with('error','添加分类失败!');
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
        $data = Parts::find($id);
        //dump($data);
        return view('admin.parts.edit',['data'=>$data]);
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
        $parts = Parts::find($id);
        $data = $request->except('_token');
        //dump($data);
        $parts -> part_name = $data['part_name'];
        $res = $parts -> save();
        if($res){
            return redirect('/admin/parts/index')->with('success','修改分类成功!');
        } else {
            return back()->with('error','修改分类失败!');
        }
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
