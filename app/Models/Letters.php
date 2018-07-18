<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Letters extends Model
{
    //设置表名
    public $table = 'blog_letters';

    /**
     * 	数据模型关联
     * 
     */
    
    //该信件的发表人
    public function users()
    {
    	return $this -> belongsTo('App\Models\Users','send_id');
    }

    //该信件的接收人
    public function rec_users()
    {
        return $this -> belongsTo('App\Models\Users','rec_id');
    }
}
