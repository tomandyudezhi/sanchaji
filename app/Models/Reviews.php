<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    //配置表名
    public $table = 'blog_reviews';

    /**
     * 
     * 数据模型关联
     * 
     */
    
    //配置发表人的从属关系
    public function users()
    {
    	return $this -> belongsTo('App\Models\Users', 'uid');
    }

    //配置被评论文章的从属关系
    public function articles()
    {
    	return $this -> belongsTo('App\Models\Articles', 'aid');
    }
}
