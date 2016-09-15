<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends BaseModel
{
    /**
     * 表名
     */
    protected $table = "comments";

    /**
     * 设置主键
     */
    protected $primaryKey = 'id';

    public $timestamps = true;

    /**
     * 软删除
     * @var boolean
     */
    protected $softDelete = true;
}
