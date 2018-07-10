<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Configs;
use App\Http\Requests\ConfigRequest;

class ConfigController extends Controller
{
    /**
     * 网站配置修改
     *
     * @return 模板加载
     */
    public function index()
    {
        //查找对应数据
        $data = Configs::find(1);
        $str = $data->logo;
        $logolink=substr($str,1);
        //加载模板
        return view('admin.config.index',['data' => $data,'title' => '网站配置','logolink' => $logolink]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ConfigRequest $request,$id)
    {
        //获取修改对应数据
        $data = $request -> except('_token');
        $configs = Configs::find($id);
        $configs -> title = $data['title'];
        $configs -> keywords = $data['keywords'];
        $configs -> copyright = $data['copyright'];
        $configs -> switch = $data['switch'];
        

        if($request -> hasFile('logo')){

            // 使用request 创建文件上传对象
            $profile = $request -> file('logo');
            $ext = $profile->getClientOriginalExtension();
            // 处理文件名称
            $temp_name = str_random(20);
            $name =  $temp_name.'.'.$ext;
            $dirname = date('Ymd',time());
            $configs -> logo = $profile -> move('./uploads/'.$dirname,$name);
        }

       $res = $configs -> save();

        if ($res) {
            return redirect('/admin/config/index') -> with('success','修改成功');
        } else {
            return back() -> with('error','修改失败');
        }   
    }

    
}
