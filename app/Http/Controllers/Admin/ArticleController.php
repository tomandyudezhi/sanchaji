<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Parts;
use App\Models\Tags;
use App\Http\Requests\ArticleInsertRequest;
use App\Models\ShieldWords;

class ArticleController extends Controller
{
    /**
     * 文章列表页
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request -> input('search', '');
        $data = Articles::where('title', 'like', "%$search%") -> paginate(3);

        return view('admin.article.index', ['data' => $data,'search' => $search]); 
        
    }

    /**
     * 加载文章添加页
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $part_data = Parts::get();
        return view('admin.article.create',['part_data' => $part_data]);
    }

    /**
     * 执行文章添加操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleInsertRequest $request)
    {
        $data = $request -> except('_token');
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
            $data['tags'] = str_replace($v,$replace,$data['tags']);
        }
        //添加文章
        $article = new Articles;
        $article -> title = $data['title'];
        $article -> content = $data['content'];
        $article -> a_type = $data['a_type'];
        $article -> hidd = $data['hidd'];
        $article -> pid = $data['pid'];
        $article -> uid = session() -> get('adminUser') -> id;
        $res1 = $article -> save();
        //添加文章标签
        $tag = new Tags;
        $tag -> aid = $article -> id;
        $tag -> uid = session() -> get('adminUser') -> id;
        //处理标签
        $tag -> content = $data['tags'];
        $res2 = $tag -> save();
        if($res1 && $res2){
            return redirect('/admin/article/index') -> with('success', '添加成功');
        }else{
            return back() -> with('error', '添加失败');
        }
    }


    /**
     * 加载用户修改页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Articles::find($id);
        $part_data = Parts::get();
        return view('admin.article.edit',['data' => $data,'part_data' => $part_data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleInsertRequest $request, $id)
    {
        //文章修改
        $article = Articles::find($id);
        $data = $request -> except('_token');
        $article -> title = $data['title'];
        $article -> content = $data['content'];
        $article -> a_type = $data['a_type'];
        $article -> hidd = $data['hidd'];
        $article -> pid = $data['pid'];
        $res1 = $article -> save();
        //标签修改
        $tag = Tags::where('aid', $id) -> first();
        $tag -> content = $data['tags'];
        $res2 = $tag -> save();
        if($res1 && $res2){
            return redirect('/admin/article/index') -> with('success', '修改成功');
        }else{
            return back() -> with('error', '修改失败');
        }


    }

    /**
     * 删除文章
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del($id)
    {
        $res = Articles::find($id) -> delete();
        if($res){
            // return redirect('/admin/article/index') -> with('success', '已收入回收站');
            echo 'true';
        }else{
            // return back() -> with('error', '删除失败');
            echo 'false';
        }
    }

    /**
     * 
     * 回收站列表页
     * 
     * @return   response
     */
    
    public function recycles(Request $request)
    {
        $search = $request -> input('search', '');
        $data = Articles::onlyTrashed() -> where('title', 'like', "%$search%") -> paginate(3);

        return view('admin.article.recycle', ['data' => $data,'search' => $search]);
    }

    /**
     * 
     * 恢复回收站里的文章
     * 
     * @param   $id 获取的回收站文章id
     * @return   response
     */
    
    public function recover($id)
    {
        $res = Articles::withTrashed() -> where('id', $id) -> restore();
        if($res){
            return redirect('/admin/article/recycle') -> with('success', '恢复成功');
        }else{
            return back() -> with('error', '恢复失败');
        }
    }

    /**
     * 
     * 永久删除回收站里的文章
     *
     *  @param   $id 获取的回收站文章id
     *  @return  response
     * 
     */
    
    public function delever($id)
    {
        $res = Articles::onlyTrashed() -> where('id', $id) -> forceDelete();
        if($res){
            return redirect('/admin/article/recycle') -> with('success', '删除成功');
        }else{
            return back() -> with('error', '删除失败');
        }
    }
}
