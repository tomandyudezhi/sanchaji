<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    //配置表名
    public $table = 'blog_tags';

    /**
     * 
     * 数据模型的关联
     * 
     */
    
    //对于发布人的从属关系
    public function users()
    {
    	return $this -> belongsTo('App\Models\Users', 'uid');
    }

    //对于标签文章的从属关系
    public function articles()
    {
    	return $this -> belongsTo('App\Models\Articles', 'aid');
    }
}
