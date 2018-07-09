<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articles extends Model
{
	use SoftDeletes;
    //配置表名
    public $table = 'blog_articles';

    /**
     * 
     * 数据模型关联
     * 
     */
    

    //对于用户表的从属关系
    public function users()
    {
    	return $this -> belongsTo('App\Models\Users', 'uid');
    }

    //对于分类管理的从属关系
    public function parts()
    {
    	return $this -> belongsTo('App\Models\Parts', 'pid');
    }

    //对于该文章下的评论的关系
    public function reviews()
    {
    	return $this -> hasMany('App\Models\Reviews', 'aid');
    }

    //对于收藏用户的多对多关系
    public function users_articles()
    {
    	return $this -> belongsToMany('App\Models\Users', 'blog_users_articles', 'aid', 'uid');
    }

    //对于文章标签的一对一关系
    public function tags()
    {
    	return $this -> hasOne('App\Models\Tags', 'aid');
    }
}
