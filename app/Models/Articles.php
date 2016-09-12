<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    /*
     * 表名
     */
    protected $table = "articles";
    public $timestamps=false;
    protected $guarded=[];

    /*
     * @see https://laravel.com/docs/5.3/eloquent-relationships
     * 关联作者
     * @author lishike<atshike@foxmail.com>
     */

    public function users()
    {
        return $this->belongsTo('App\Models\Users','users_id');
    }
    /*
     * 关联栏目
     */
    public function columns()
    {
        return $this->belongsTo('App\Models\Columns','columns_id');
    }
    /*
     * 评论
     */
    public function Comment()
    {
        return $this->belongsTo('App\Models\comment','comment_id');
    }
    
}
