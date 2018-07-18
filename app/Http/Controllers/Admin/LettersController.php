<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LettersRequest;
use App\Http\Controllers\Controller;
use App\Models\Letters;
use App\Models\FeedBacks;

class LettersController extends Controller
{
    /**
     * 加载站内信列表页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request -> input('search','');
        $letters = Letters::where('sys','=','2') -> where('title','like',"%{$search}%") -> paginate(3);
        return view('admin.letters.index',['letters'=>$letters,'search' => $search]);
    }

    /**
     *  加载系统消息列表页面
     *
     * @return \Illuminate\Http\Response
     */
    
    public function sys(Request $request)
    {
        $search = $request -> input('search','');
        $letters = Letters::where('sys','=','1') -> where('title','like',"%{$search}%") -> paginate(3);
        return view('admin.letters.index',['letters'=>$letters,'search' => $search]);
    }

    /**
     * 站内信删除操作
     *
     * @return \Illuminate\Http\Response
     */
    public function del($id)
    {
        $res = Letters::find($id) -> delete();
        if($res){
            return 'true';
        }else{
            return 'false';
        }
    }

    /**
     * 
     * 加载系统通知页面
     * 
     * @return \Illuminate\Http\Response
     */
    
    public function create($id)
    {

        return view('admin.letters.create',['id'=>$id]);
    }

    /**
     *  执行发送系统通知操作
     *
     * 
     */
    
    public function store(LettersRequest $request,$id)
    {
        $user_id = session() ->get('adminUser') ->id;
        $data = $request -> except('_token');
        $letters = new Letters;
        $letters -> send_id = $user_id;
        $letters -> rec_id = $id;
        $letters -> title = $data['title'];
        $letters -> content = $data['content'];
        $letters -> sys = 1;
        $res = $letters -> save();
        if($res){
            return '<script>var index = parent.layer.getFrameIndex(window.name);parent.layer.msg("发送成功");parent.layer.close(index);</script>';
        }else{
            return '<script>var index = parent.layer.getFrameIndex(window.name);parent.layer.msg("发送失败");parent.layer.close(index);</script>';
        }
    }

    /**
     * 
     * 加载反馈回复页面
     * 
     * @return \Illuminate\Http\Response
     */
    
    public function creates($id,$feed_id)
    {

        return view('admin.letters.creates',['id'=>$id,'feed_id'=>$feed_id]);
    }

    /**
     *  执行反馈恢复操作
     *
     * 
     */
    
    public function replyed(LettersRequest $request,$id,$feed_id)
    {
        $user_id = session() ->get('adminUser') ->id;
        $data = $request -> except('_token');
        $letters = new Letters;
        $letters -> send_id = $user_id;
        $letters -> rec_id = $id;
        $letters -> title = $data['title'];
        $letters -> content = $data['content'];
        $letters -> sys = 1;
        $res = $letters -> save();
        $feed = FeedBacks::find($feed_id);
        $feed -> replyed = 'y';
        $res2 = $feed -> save();
        if($res && $res2){
            return '<script>var index = parent.layer.getFrameIndex(window.name);parent.layer.msg("发送成功");parent.layer.close(index);</script>';
        }else{
            return '<script>var index = parent.layer.getFrameIndex(window.name);parent.layer.msg("发送失败");parent.layer.close(index);</script>';
        }
    }
}
