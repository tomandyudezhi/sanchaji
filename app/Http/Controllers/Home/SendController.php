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
        $code =mt_rand(10000,99999);
        session()->put('mailcode',$code);
        session()->put('phone',$data);
        Mail::send('home.emails.test',['email'=>$data,'code'=>$code],function($message){
		
            $to = session()->get('phone');
            $message->to($to)->subject('[三叉戟博客验证码]三叉戟博客验证码');
	   
        });
   }
}
