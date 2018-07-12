<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\UsersDetails;

class UserController extends Controller
{
    /**
     * 单个用户的信息页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user_data = Users::find($id);
        //记载个人信息页面
        return view('home.user.index',compact('user_data'));
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
     * 加载用户个人信息修改页
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_data = Users::find($id);

        return view('home.user.edit',['user_data'=>$user_data]);
    }

    /**
     * 执行用户修改信息操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request -> except('_token');
        //修改个人信息
        $user = Users::find($id);
        $user -> sex = $data['sex'];
        $res1 = $user -> save();
        if(empty($user_detail = Users::find($id) -> users_details)){
            $new_detail = new UsersDetails;
            $new_detail -> uid = $id;
            $new_detail -> pet_name = $data['pet_name'];
            $new_detail -> profession = $data['profession'];
            $new_detail -> birthday = $data['birthday'];
            $new_detail -> industry = $data['industry'];
            $new_detail -> addr = $data['addr'];
            $new_detail -> descript = $data['descript'];
            $res2 = $new_detail -> save();
        }else{
            $detail_id = Users::find($id) -> users_details -> id;
            $new_detail = UsersDetails::find($detail_id);
            $new_detail -> pet_name = $data['pet_name'];
            $new_detail -> profession = $data['profession'];
            $new_detail -> birthday = $data['birthday'];
            $new_detail -> industry = $data['industry'];
            $new_detail -> addr = $data['addr'];
            $new_detail -> descript = $data['descript'];
            $res2 = $new_detail -> save();
        }
        if($res1 && $res2){
            return '<script>var index = parent.layer.getFrameIndex(window.name);parent.layer.msg("修改成功");parent.layer.close(index);</script>';
        }else{
            return '<script>var index = parent.layer.getFrameIndex(window.name);parent.layer.msg("修改失败");parent.layer.close(index);</script>';
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
