<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});




//后台首页
Route::get('/admin','Admin\AdminController@index');
//用户添加页面
Route::get('/admin/user/create', 'Admin\UserController@create');
//用户添加页面
Route::get('/admin/user/index', 'Admin\UserController@index');