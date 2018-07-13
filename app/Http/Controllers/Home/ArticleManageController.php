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
    public function index()
    {
        $data = Users::find(14);
        return view('home.article.index',['data'=> $data]);
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
    public function recycle()
    {
        $data = Articles::onlyTrashed() -> where('uid','=','14') -> get();

        return view('home.article.recycle',['data' => $data]);
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
    public function pri()
    {
        $data = Articles::where('hidd','=','y') -> where('id',14) -> get();
        return view('home.article.private',['data'=>$data]);
    }

    /**
     * 加载我的关注
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function follows()
    {
        $data = Users::find(14);
        return view('home.article.follows',['data' => $data]);
    }

    /**
     *  取消关注操作
     *
     *  
     */
    
    public function follows_del($id)
    {
        $res = UsersUsers::where('uid',14) -> where('idol_id',$id) -> delete();
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
        $article = new Articles;
        $article -> title = $data['title'];
        $article -> content = $data['content'];
        $article -> a_type = $data['a_type'];
        $article -> pid = $data['pid'];
        $article -> hidd = $data['hidd'];
        $article -> uid = 14; //session uid
        $res1 =  $article -> save();
        //添加文章标签
        $tag = new Tags;
        $tag -> aid = $article -> id;
        $tag -> uid = 14; //session uid
        $tag -> content = $data['tags'];
        $res2 = $tag -> save();

        if($res1 && $res2 ){
            return redirect('/article/index') -> with('success','成功');
        }else{
            return back() -> with('error','失败');
        }

    }

}
