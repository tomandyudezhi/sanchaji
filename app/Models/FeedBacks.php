<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedBacks extends Model
{
    //配置表名
    public $table = 'blog_feedbacks';

    /**
     * 
     * 数据模型关联
     * 
     */
    
    //对于发送人的从属关系
    public function users()
    {
    	return $this -> belongsTo('App\Models\Users', 'uid');
    }
}
