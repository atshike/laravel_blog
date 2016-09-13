<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
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

    protected $timestamps = false;
}
