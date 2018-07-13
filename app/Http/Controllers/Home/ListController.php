<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Reviews;
use App\Models\Parts;
use App\Models\Articles;
use App\Models\Tags;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = $request -> input('search', '');
        //dump($search);
        $tag_data1 = Tags::get();
        $arr = [];
        foreach ($tag_data1 as $key => $val) {
           $arr[] =  $val ->id;
        }
        if(count($arr) <= 8){
             $a = $arr;
             $tag_data1 = Tags::whereIn('id',$a) -> get();
        }else{
            $a = array_rand($arr,8);
            $tag_data1 = [];
            for($i=0;$i<8;$i++){
                $tag_data1[] = Tags::find($arr[$a[$i]]);
            }
        }
        
        //获取id
        $part_id = $request->input('part_name','');
        $tag_content = $request ->input('tag_content','');
        //根据ID取数据
        if($part_id != ''){
            $data = Articles::where('pid','=',$part_id)->paginate(3) or [];
        } elseif($search != '') {
            $data = Articles::where('title','like',"%$search%")->paginate(3);
            //dump($data);
        } elseif($tag_content != '') {
            $tag_data = Tags::where('content','=',$tag_content)->get();
            $data = [];
            foreach($tag_data as $k => $v){
                $data[] = $v->articles;
            }
            //dump($data);
        } else {
            $data = [];
        }
       $part_data = Parts::get();
        //加载模板
        $review_data = Reviews::orderBy('created_at','desc')->distinct('aid')->limit(10)->get();
        return view('home.list.index',['data'=>$data,'search'=>$search,'review_data'=>$review_data,'tag_data1'=>$tag_data1,'part_data'=>$part_data]);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
