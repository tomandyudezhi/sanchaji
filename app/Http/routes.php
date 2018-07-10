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



















//查看屏蔽词
Route::get('/admin/shieldwords/index','ShieldwordsController@index');
//屏蔽词添加处理页面
Route::post('/admin/shieldwords/store','ShieldwordsController@store');
//分类管理首页
Route::get('/admin/parts/index','PartsController@index');
//分类管理添加
Route::get('/admin/parts/create','PartsController@create');
//分类添加处理
Route::post('/admin/parts/store','PartsController@store');
//分类修改
Route::get('/admin/parts/edit/{id}','PartsController@edit');
//执行分类修改
Route::post('/admin/parts/update/{id}','PartsController@update');















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
//文章添加页面
Route::get('/admin/article/create', 'Admin\ArticleController@create');
//执行文章添加操作
Route::post('/admin/article/store', 'Admin\ArticleController@store');
//文章列表页
Route::get('/admin/article/index', 'Admin\ArticleController@index');
//文章修改页面
Route::get('/admin/article/edit/{id}', 'Admin\ArticleController@edit');
//文章修改操作
Route::post('/admin/article/update/{id}', 'Admin\ArticleController@update');
//文章删除操作
Route::get('/admin/article/del/{id}', 'Admin\ArticleController@del');
//文章回收站页面
Route::get('/admin/article/recycle', 'Admin\ArticleController@recycles');
//回收站文章恢复
Route::get('/admin/article/recover/{id}', 'Admin\ArticleController@recover');
//回收站文章永久删除
Route::get('/admin/article/delever/{id}', 'Admin\ArticleController@delever');
