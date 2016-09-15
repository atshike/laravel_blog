<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends BaseModel
{
    /**
     * 表名
     * @see https://laravel.com/docs/5.3/eloquent
     */
    protected $table = "users";

    /**
     * 设置主键
     */
    protected $primaryKey = 'id';

    public $timestamps = true;

    /**
     *
     * @var array
     */
    protected $hidden = ['password'];

    /**
     * 软删除
     * @var boolean
     */
    protected $softDelete = true;
}
