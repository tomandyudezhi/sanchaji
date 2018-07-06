<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parts extends Model
{
    //配置表名
    public $table = 'blog_parts';

    /**
     * 
     * 数据模型关联
     * 
     */
    
    //配置该分类下文章的一对多关系
    public function articles()
    {
    	return $this -> hasMany('App\Models\Articles', 'pid');
    }

}
