<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Reviews;
use App\Models\UsersArticles;
use App\Models\ArticlesLikes;
use App\Models\UsersUsers;
use DB;
use App\Models\ShieldWords;
use Cache;
class ArticleController extends Controller
{
    /**
     * 前台文章显示
     *
     * @return 模板
     */
    public function index($id)
    {
	$str = $id.'-articles';
        // 根据id查找文章数据
	if(Cache::has($str)){
		$articles = Cache::get($str);
	}else{
		$articles = Articles::find($id);
	}
        $a = $articles -> reading;
        $articles -> reading = $a +1;
        $articles -> save();
        if($articles == null){
            return back() -> with('error','很抱歉。该文章已被删除');
        }
        $arr = [];
        foreach ($articles -> users -> users_usersed as $key => $v) {
            $arr[] = $v -> id;
        }
        //相关推荐
        $recommend_data = DB::select('select * from blog_articles where pid='.$articles->pid.' order by rand() limit 5');
        // 根据id查找回复数据
        $reviews = Reviews::find($id);
        // 显示模板
        return view('home.articlesdetail.index',['articles' => $articles,'reviews' => $reviews,'fensi'=> $arr,'recommend_data'=>$recommend_data]);
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
        if(!session()->has('homeUser')){
            return back() -> with('error','请登录后再试');
        }
        if(empty($data['content'])){
            return back() -> with('error','评论内容不能为空');
        }
        $user_id = session() -> get('homeUser') -> id;
        // 获取屏蔽字段
        $shieldwords = ShieldWords::find(1);
        // 处理屏蔽词
        $str = explode('|',$shieldwords -> content);
        // 完成处理
        foreach($str as $v)
        {
            $length = strlen($v);
            $replace = '';
            for($i = 0; $i < $length; $i++){
            $replace .= '*';
            }
            $data['content'] = str_replace($v,$replace,$data['content']);
        }

        $review = new Reviews;
        $review -> uid = $user_id;
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
        
        if (!session()->has('homeUser')) {
            return 'not login';
        } else {
            $user_id = session() ->get('homeUser') ->id;
            $articles = UsersArticles::where('aid',$id) ->where('uid',$user_id) ->first();
            if ($articles  == null) {
                $usersarticles = new UsersArticles;
                $usersarticles -> uid = $user_id;
                $usersarticles -> aid = $id;
                $res = $usersarticles -> save();
                if($res){
                    return 'success';
                }else{
                    return 'error';
                }
            } else {
                if ($articles -> aid = $id) {
                return 'collected';
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
        
        if (empty(session()->get('homeUser') -> id )) {
            return 'not login';
        } else {
            $user_id = session() -> get('homeUser') -> id;
            $articles = Articles::where('id',$id)->first();
            $like = ArticlesLikes::where('aid',$id) ->where('uid',$user_id) ->first();
            if ($like  == null) {
                // 写入点赞关系表
                $like = new ArticlesLikes;
                $like -> uid = $user_id;
                $like -> aid = $id;
                $res = $like -> save();
                // 写入文章表
                $articles -> likes = ($articles -> likes)+1;
                $res2 = $articles -> save();
                if($res && $res2){
                    return 'success';
                }else{
                    return 'error';
                }
            } else {
                if ($like -> uid == $user_id) {
                    return 'liked';
                }
            }   
        }
    }

    /**
     *  发布人关注操作
     *
     * 
     */
    public function follows($id)
    {

        if(empty(session() ->get('homeUser') -> id)){
            return 'not';
        }
        $user_id = session() ->get('homeUser') -> id;
        $guanzhu = new UsersUsers;
        $guanzhu -> uid = $user_id;
        $guanzhu -> idol_id = $id;
        $res = $guanzhu -> save();
        if($res){
            return 'success';
        }else{
            return 'error';
        }
    }
}
