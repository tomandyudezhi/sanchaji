<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\UsersDetails;
use Hash;
use App\Http\Requests\UserInsertRequest;

class UserController extends Controller
{
    /**
     * 用户查看页面
     *
     * @return 模板
     */
    public function index(Request $request)
    {
        $search = $request -> input('search', '');
        $data = Users::where('username', 'like', "%$search%") -> where('qx','<>','1') ->paginate(3);
        return view('admin.user.index',['data'=>$data,'search'=>$search]);
    }

    /**
     * 用户添加页面
     *
     * @return 模板
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * 执行添加操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @return  response
     */
    public function store(UserInsertRequest $request)
    {
        $data = $request -> except('_token');
        $user = new Users;
        $user -> username = $data['username'];
        $user -> password = Hash::make($data['password']);
        $user -> sex = $data['sex'];
        $user -> phone = $data['phone'];
        $user -> email = $data['email'];
        $user -> qx = $data['qx'];
        $user -> create_ip = ip2long($_SERVER['REMOTE_ADDR']);
        $res = $user -> save();
        if($res){
            return redirect('/admin/user/index') -> with('success', '添加成功');
        }else{
            return back() -> with('error', '添加失败');
        }
    }

    /**
     * 
     * 屏蔽用户操作
     * @param  $id
     * @return  response
     */
    
    public function shield($id)
    {
        $user = Users::find($id);
        $user -> shield = 'y';
        $res = $user -> save();
        if($res){
            return redirect('/admin/user/index') -> with('success', '屏蔽成功');
        }else{
            return back() -> with('error', '屏蔽失败');
        }
    }

    /**
     * 
     * 启用用户操作
     * @param  $id
     * @return  response
     */
    
    public function unshield($id)
    {
        $user = Users::find($id);
        $user -> shield = 'n';
        $res = $user -> save();
        if($res){
            return redirect('/admin/user/index') -> with('success', '启用成功');
        }else{
            return back() -> with('error', '启用失败');
        }
    }

    

    /**
     * 用户修改页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Users::find($id);

        return view('admin.user.edit', ['data' => $data]);
    }

    /**
     * 执行用户修改操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserInsertRequest $request, $id)
    {
        $data = $request -> except('_token');
        $user = Users::find($id);
        $user -> username = $data['username'];
        $user -> phone = $data['phone'];
        $user -> sex = $data['sex'];
        $user -> email = $data['email'];
        $res = $user -> save();
        if($res){
            return redirect('/admin/user/index') -> with('success', '修改成功');
        }else{
            return back() -> with('error', '修改失败');
        }
    }

    /**
     * 执行删除操作
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del($id)
    {
        $res = Users::find($id) -> delete();
        if($res){
            return redirect('/admin/user/index') -> with('success', '删除成功');
        }else{
            return back() -> with('error', '修改失败');
        }
    }

    /**
     * 
     * 加载用户详情页面
     * 
     */
    
    public function detail($id)
    {
        $user = Users::find($id);

        return view('admin.user.edit2',['user'=>$user]);
    }

    /**
     * 
     * 执行用户详情添加操作
     * 
     */
    
    public function details_store(Request $request,$id)
    {
        $data = $request -> except('_token');
        if(empty($data)){
            return '<script>var index = parent.layer.getFrameIndex(window.name);parent.layer.msg("修改成功");parent.layer.close(index);</script>';
        }
        if(empty($user_detail = Users::find($id) -> users_details)){
            $new_detail = new UsersDetails;
            $new_detail -> uid = $id;
            $new_detail -> pet_name = $data['pet_name'];
            $new_detail -> profession = $data['profession'];
            $new_detail -> birthday = $data['birthday'];
            $new_detail -> industry = $data['industry'];
            $new_detail -> addr = $data['addr'];
            $new_detail -> descript = $data['descript'];
            $res = $new_detail -> save();
        }else{
            $detail_id = Users::find($id) -> users_details -> id;
            $new_detail = UsersDetails::find($detail_id);
            $new_detail -> pet_name = $data['pet_name'];
            $new_detail -> profession = $data['profession'];
            $new_detail -> birthday = $data['birthday'];
            $new_detail -> industry = $data['industry'];
            $new_detail -> addr = $data['addr'];
            $new_detail -> descript = $data['descript'];
            $res = $new_detail -> save();
        }

        if($res){
            return '<script>var index = parent.layer.getFrameIndex(window.name);parent.layer.msg("修改成功");parent.layer.close(index);</script>';
        }else{
            return '<script>var index = parent.layer.getFrameIndex(window.name);parent.layer.msg("修改失败");parent.layer.close(index);</script>';
        }
    }
}
