<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Users;
use App\Models\Parts;
use App\Models\Tags;
use App\Models\UsersUsers;
use App\Http\Requests\ArticleInsertRequest;

class ArticleManageController extends Controller
{
    /**
     * 显示前台文章管理页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request -> input('search','');
        $id = session()->get('homeUser') ->id;
        $data = Articles::where('uid','=',$id) -> where('title','like',"%{$search}%") ->paginate(2);
        return view('home.article.index',['data'=> $data,'search'=>$search]);
    }

    /**
     * 执行文章收入回收站操作
     *
     * @return \Illuminate\Http\Response
     */
    public function del($id)
    {
        $res = Articles::find($id) -> delete();
        if($res){
            echo 'success';
        }else{
            echo 'error';
        }
    }

    /**
     * 显示文章管理回收站页面
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function recycle(Request $request)
    {
        $id = session() -> get('homeUser') -> id;
        $search = $request -> input('search','');
        $data = Articles::onlyTrashed() -> where('uid','=',$id) -> where('title','like',"%{$search}%") -> paginate(2);

        return view('home.article.recycle',['data' => $data,'search'=>$search]);
    }

    /**
     * 执行彻底删除操作
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delever($id)
    {
        $res = Articles::onlyTrashed() -> where('id',$id) -> forceDelete();
        if($res){
            echo 'success';
        }else{
            echo 'error';
        }
    }

    /**
     * 执行回收站恢复操作
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function recover($id)
    {
        $res = Articles::withTrashed() -> where('id',$id) -> restore();
        if($res){
            echo 'success';
        }else{
            echo 'error';
        }
    }

    /**
     * 加载私密文章页面
     *
     * 
     * 
     * @return \Illuminate\Http\Response
     */
    public function pri(Request $request)
    {
        $id = session() ->get('homeUser') ->id;
        $search = $request -> input('search','');
        $data = Articles::where('hidd','=','y') -> where('uid',$id) -> where('title','like',"%{$search}%") -> paginate(2);
        return view('home.article.private',['data'=>$data,'search'=>$search]);
    }

    /**
     * 加载我的关注
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function follows()
    {
        $id = session() ->get('homeUser') ->id;
        $data = Users::find($id);
        return view('home.article.follows',['data' => $data]);
    }

    /**
     *  取消关注操作
     *
     *  
     */
    
    public function follows_del($id)
    {
        $user_id = session() ->get('homeUser') ->id;
        $res = UsersUsers::where('uid',$user_id) -> where('idol_id',$id) -> delete();
        if($res){
            echo 'success';
        }else{
            echo 'error';
        }
    }

    /**
     *  加载写博客页面
     * 
     */
    
    public function create()
    {
        $data = Parts::get();
        return view('home.article.create',['data'=>$data]);
    }

    /**
     *  执行写博客操作
     * 
     */
    
    public function store(ArticleInsertRequest $request)
    {
        $data = $request -> except('_token');
        $id = session() ->get('homeUser') -> id;
        $article = new Articles;
        $article -> title = $data['title'];
        $article -> content = $data['content'];
        $article -> a_type = $data['a_type'];
        $article -> pid = $data['pid'];
        if(isset($data['hidd'])){
            $article -> hidd = $data['hidd'];
        }
        
        $article -> uid = $id; //session uid
        $res1 =  $article -> save();
        //添加文章标签
        $tag = new Tags;
        $tag -> aid = $article -> id;
        $tag -> uid = $id; //session uid
        $tag -> content = $data['tags'];
        $res2 = $tag -> save();

        if($res1 && $res2 ){
            return redirect('/article/index') -> with('success','成功');
        }else{
            return back() -> with('error','失败');
        }

    }

}
