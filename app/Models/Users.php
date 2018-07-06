<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
	//配置表名
    public $table = 'blog_users';

    /**
     * 
     *  数据模型关联
     * 
     */
    
    //对文章管理的一对多关系
    public function articles()
    {
    	return $this -> hasMany('App\Models\Articles', 'uid');
    }

    //对评论管理的一对多关系
    public function reviews()
    {
    	return $this -> hasMany('App\Models\Reviews', 'uid');
    }

    //对反馈管理的一对多关系
    public function feedbacks()
    {
    	return $this -> hasMany('App\Models\FeedBacks', 'uid');
    }

    //对关注的多对多关系
    public function users_users()
    {
    	return $this -> belongsToMany('App\Models\Users', 'blog_users_users', 'uid', 'idol_id');
    }

    //对被关注的多对多关系
    public function users_usersed()
    {
        return $this -> belongsToMany('App\Models\Users', 'blog_users_users', 'idol_id', 'uid');
    }

    //对收藏文章的多对多关系
    public function users_articles()
    {
    	return $this -> belongsToMany('App\Models\Articles', 'blog_users_articles', 'uid', 'aid');
    }

    //对于文章标签的一对多关系
    public function tags()
    {
    	return $this -> hasMany('App\Models\Tags', 'uid');
    }
}
