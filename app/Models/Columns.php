<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Columns extends Model
{
    //
    protected $table = "columns";

    public function parentColumns()
    {

        return $this->belongsTo('App\Models\Columns', 'type_id', 'id');
    }

    public function childrenColumns()
    {

        return $this->hasMany('App\Models\Columns', 'type_id', 'id');
    }
}
