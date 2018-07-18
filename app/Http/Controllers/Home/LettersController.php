<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LettersRequest;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Letters;

class LettersController extends Controller
{
    /**
     * 	加载站内信列表页
     *
     * 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function searchusers(Request $request)
    {
        $search = $request -> input('search','');
        if($search != ''){
        	$id = session() -> get('homeUser') -> id;
        	$data = Users::where('username','like',"%{$search}%") -> where('id','<>',$id) ->paginate(1);
        }else{
        	$data = [];
        }
       

        return view('home.letters.search',['data'=>$data,'search'=>$search]);
    }

    /**
     * 	加载最近收信人列表页
     *
     * 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function historyusers(Request $request)
    {
        $search = $request -> input('search','');
        $user_id = session() -> get('homeUser') -> id;
        	$arr = [];
        	$letters = Letters::where('send_id','=',$user_id) ->get();
        	foreach($letters as $v){
        		$arr[] = $v -> rec_id;
        	}
        	$data = Users::where('username','like',"%{$search}%") -> whereIn('id',$arr)->paginate(1);
       

        return view('home.letters.history',['data'=>$data,'search'=>$search]);
    }


    /**
     * 	加载发信页面
     * 
     */
    public function create($id)
    {

    	return view('home.letters.create',['id'=>$id]);
    }

    /**
     * 	执行发信操作
     * 
     */
    public function store(LettersRequest $request,$id)
    {
    	$user_id = session() -> get('homeUser') -> id;
    	$data = $request -> except('_token');
    	$letters = new Letters;
    	$letters -> title = $data['title'];
    	$letters -> content = $data['content'];
    	$letters -> send_id = $user_id;
    	$letters -> rec_id = $id;
    	$letters -> sys = 2;
    	$res = $letters -> save();
    	if($res){
    		return '<script>var index = parent.layer.getFrameIndex(window.name);parent.layer.msg("发送成功");parent.layer.close(index);</script>';
    	}else{
    		return '<script>var index = parent.layer.getFrameIndex(window.name);parent.layer.msg("发送失败");parent.layer.close(index);</script>';
    	}
    }

    /**
     *  加载站内信前台页面
     *  加载发件箱页面
     * 
     */
    public function index(Request $request)
    {
        $id = session() -> get('homeUser') -> id;
        $search = $request -> input('search','');
        $data = Letters::where('send_id','=',$id) -> where('title','like',"%{$search}%") -> paginate(2);

        return view('home.letters.index',['data' => $data,'search'=>$search]);
    }

    /**
     *  加载未读信件页面
     *
     * 
     */
    public function noread(Request $request)
    {
        $id = session() -> get('homeUser') -> id;
        $search = $request-> input('search','');
        $letters = Letters::where('read_status','=',2) -> where('rec_id','=',$id) -> where('title','like',"%{$search}%") -> paginate(2);

        return view('home.letters.noread',['data'=>$letters,'search'=>$search]);
    }

    /**
     *  修改信件状态
     *
     * 
     */
    public function read_status($id)
    {
        $letters = Letters::find($id);
        $letters -> read_status = 1;
        $letters -> save();
    }

    /**
     *  已读信件列表页
     *
     * 
     */
    
    public function readed(Request $request)
    {
        $id = session() -> get('homeUser') -> id;
        $search = $request -> input('search','');
        $data = Letters::where('read_status','=',1) -> where('rec_id','=',$id) -> where('title','like',"%{$search}%") -> paginate(2);

        return view('home.letters.readed',['data'=>$data,'search'=>$search]);
    }

    /**
     *  信件删除操作
     * 
     */
    public function del($id)
    {
        $res = Letters::find($id) -> delete();
        if($res){
            return 'success';
        }else{
            return 'error';
        }
    }

    /**
     *  系统通知列表页
     *
     * 
     */
    
    public function sys(Request $request)
    {
        $id = session() -> get('homeUser') -> id;
        $search = $request -> input('search','');
        $data = Letters::where('sys','=',1) -> where('rec_id','=',$id) -> where('title','like',"%{$search}%") -> paginate(2);

        return view('home.letters.sys',['data'=>$data,'search'=>$search]);
    }
}
