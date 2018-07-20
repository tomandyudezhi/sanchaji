<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Frilinks;
use App\Models\Reviews;
use App\Models\Parts;
use App\Models\TurnImage;
use Cache;
class IndexController extends Controller
{
    /**
     * $list_data:文章列表数据
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //文章列表数据
        $list_data = Articles::where('hidd','=','n') -> orderBy('created_at','desc') -> paginate(5);
        if($request -> ajax()){
            $view = view('home.commit.data',compact('list_data'))->render();
            return response()->json(['html'=>$view]);
        }
        
        //分类列表数据
	if(Cache::has('part_data')){
		$part_data = Cache::get('part_data');
	}else{
        	$part_data = Parts::get();
		Cache::put('part_data',$part_data,40);
	}
        //轮播图数据
	if(Cache::has('turnimage')){
		$turnimage = Cache::get('turnimage');
	}else{
        	$turnimage = TurnImage::all();
		Cache::put('turnimage',$turnimage,40);
	}
        //加载模板
	if(Cache::has('view_index')){
		$view = Cache::get('view_index');
	}else{
        	$view = view('home.commit.index',['list_data'=>$list_data,'part_data'=>$part_data,'turnimage' => $turnimage]);
		
	}
	return $view;
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
