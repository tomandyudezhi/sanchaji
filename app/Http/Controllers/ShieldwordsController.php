<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ShieldWords;
class ShieldwordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shield = New ShieldWords;
        $data = $shield::find(1);
        //dump($data);
        return view('admin.shieldwords.index',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shield = ShieldWords::find(1);
        $data = $request->except('_token');
        $shield -> content = $data['mytextarea'];
        $res = $shield ->save();
        if($res){
            return redirect('/admin/shieldwords/index')->with('success','添加成功!');
        } else {
            return back()->with('error','添加失败!');
        }
    }

}
