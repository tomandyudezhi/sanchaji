<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use Mail;

class SendController extends Controller
{
    //发送邮件方法
   public function sendmail(Request $request)
   {

        $data = $request -> input('email');
        $name = '余德智';
        Mail::send('home.emails.test',['name'=>$name],function($message){
            $to = '861065609@qq.com';
            $message->to($to)->subject('测试邮件');
        });
   }
}
