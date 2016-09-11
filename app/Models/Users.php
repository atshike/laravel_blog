<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    /*
     * @see https://laravel.com/docs/5.3/eloquent
     */
    protected $table = "users";
    protected $primaryKey = 'id';//设置主键
    //protected $timestamps = false;
    //protected $dateFormat = 'U';

}
