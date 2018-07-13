<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Reviews;
use App\Models\UsersArticles;
use App\Models\ArticlesLikes;

class ArticleController extends Controller
{
    /**
     * 前台文章显示
     *
     * @return 模板
     */
    public function index($id)
    {
        // 根据id查找文章数据
        $articles = Articles::find($id);
        if($articles == null){
            return back() -> with('error','很抱歉。该文章已被删除');
        }
        // 根据id查找回复数据
        $reviews = Reviews::find($id);
        // 显示模板
        return view('home.articlesdetail.index',['articles' => $articles,'reviews' => $reviews]);
    }

    /**
     * 前台文章回复
     *
     * @param int $id
     * @return bool
     */
    public function create(Request $request,$id)
    {
        $data = $request -> except('_token');
        $review = new Reviews;
        $review -> uid = $data['uid'];
        $review -> aid = $id;
        $review -> content = $data['content'];
        $res = $review -> save();
        if($res){
            return redirect('/detail/'.$id) -> with('success', '回复成功');
        }else{
            return back() -> with('error', '回复失败');
        }
    }

    /**
     * 文章收藏
     *
     * @param int $id
     */
    public function collect(Request $request,$id)
    {
        $data = $request -> all();
        $articles = UsersArticles::where('aid',$id)->first();
        if (session()->get('homeUser') -> id == null) {
            return back() -> with('error', '很抱歉，您还没有登录');
        } else {
            if ($articles  == null) {
                $usersarticles = new UsersArticles;
                $usersarticles -> uid = $data['uid'];
                $usersarticles -> aid = $id;
                $res = $usersarticles -> save();
                if($res){
                    return redirect('/detail/'.$id) -> with('success', '收藏成功');
                }else{
                    return back() -> with('error', '收藏失败');
                }
            } else {
                if ($articles -> aid = $id) {
                return back() -> with('error', '很抱歉，您已收藏此文章');
                }
            }   
        }
    }

    /**
     * 文章好评
     *
     * @param  int  $id
     */
    public function likes(Request $request,$id)
    {
        $data = $request -> all();
        // 根据id具体查找文章
        $user_id = session() -> get('homeUser') -> id;
        $articles = Articles::where('id',$id)->first();
        $like = ArticlesLikes::where('aid',$id) ->where('uid',$user_id) ->first();
        if (session()->get('homeUser') -> id == null) {
            return back() -> with('error', '很抱歉，您还没有登录');
        } else {
            if ($like  == null) {
                // 写入点赞关系表
                $like = new ArticlesLikes;
                $like -> uid = $data['uid'];
                $like -> aid = $id;
                $res = $like -> save();
                // 写入文章表
                $articles -> likes = ($articles -> likes)+1;
                $res2 = $articles -> save();
                if($res && $res2){
                    return redirect('/detail/'.$id) -> with('success', '点赞成功');
                }else{
                    return back() -> with('error', '点赞失败');
                }
            } else {
                if ($like -> uid == $user_id) {
                    return back() -> with('error', '很抱歉，您已点赞此文章');
                }
            }   
        }
    }
}
