<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;
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
        $data = Users::where('username', 'like', "%$search%") ->paginate(3);
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
}
