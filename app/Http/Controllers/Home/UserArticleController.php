<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Reviews;
use App\Models\Articles;
use App\Models\UsersArticles;

class UserArticleController extends Controller
{
    /**
     * 个人收藏页面首页
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = session() ->get('homeUser') -> id;
        $user_data = Users::find($id);

        return view('home.userarticle.index',['user_data'=>$user_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function delete($id)
    {
        $user_id = session() -> get('homeUser') -> id;
        $res=  UsersArticles::where('aid','=',$id)->where('uid','=',$user_id)->delete();
        if($res){
            echo 'success';
        } else {
            echo 'error';
        }
    }
}
