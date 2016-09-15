<?php

namespace App\Models;

use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Articles
 * @package App\Models
 * @see https://laravel.com/docs/master/eloquent
 */
class Articles extends BaseModel
{
    /**
     * 表名
     */
    protected $table = "articles";

    public $timestamps = true;

    /**
     * 软删除
     * @var boolean
     */
    protected $softDelete = true;

    /**
     * @see https://laravel.com/docs/5.3/eloquent-relationships
     * 关联作者
     * 一对多逆向
     * @return object users
     */
    public function users()
    {
        return $this->belongsTo('App\Models\Users', 'users_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * 关联栏目
     * 一对多逆向
     * @return object columns
     */
    public function columns()
    {
        return $this->belongsTo('App\Models\Columns', 'columns_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * 评论
     * 一对多逆向
     * @return object Comment
     */
    public function comment()
    {
        return $this->belongsTo('App\Models\comment', 'comment_id');
    }

    /**
     * 文章内容（原始）
     * @return string
     */
    public function getContentAttribute($value)
    {
        return strip($value);
    }


}
