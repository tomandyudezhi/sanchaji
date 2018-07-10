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




//后台评论路由
Route::get('/admin/review/index','Admin\ReviewController@index');
//后台评论删除路由
Route::get('/admin/review/delete/{id}','Admin\ReviewController@delete');

//后台标签路由
Route::get('/admin/tag/index','Admin\TagController@index');
//后台标签修改页面路由
Route::get('/admin/tag/edit/{id}','Admin\TagController@edit');
//后台标签修改路由
Route::post('/admin/tag/update/{id}','Admin\TagController@update');
//后台标签删除路由
Route::get('/admin/tag/delete/{id}','Admin\TagController@delete');

//后台网站配置路由
Route::get('/admin/config/index','Admin\ConfigController@index');
//后台网站配置修改路由
Route::post('/admin/config/update/{id}','Admin\ConfigController@update');












//查看屏蔽词
Route::get('/admin/shieldwords/index','ShieldwordsController@index');
//执行屏蔽词修改操作
Route::post('/admin/shieldwords/store','ShieldwordsController@store');

























//后台首页
Route::get('/admin','Admin\AdminController@index');
//用户添加页面
Route::get('/admin/user/create', 'Admin\UserController@create');
//用户查看页面
Route::get('/admin/user/index', 'Admin\UserController@index');
//执行用户添加操作
Route::post('/admin/user/store', 'Admin\UserController@store');
//执行用户屏蔽操作
Route::get('/admin/user/shield/{id}','Admin\UserController@shield');
//执行用户启用操作
Route::get('/admin/user/unshield/{id}','Admin\UserController@unshield');
//用户修改页面
Route::get('/admin/user/edit/{id}', 'Admin\UserController@edit');
//执行修改操作
Route::post('/admin/user/update/{id}', 'Admin\UserController@update');
//执行删除操作
Route::get('/admin/user/del/{id}', 'Admin\UserController@del');
