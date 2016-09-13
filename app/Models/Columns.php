<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Columns extends Model
{
    //
    protected $table = "columns";
    public $timestamps=false;
    protected $guarded=[];

    public function parentColumns()
    {

        return $this->belongsTo('App\Models\Columns', 'type_id', 'id');
    }

    public function childrenColumns()
    {

        return $this->hasMany('App\Models\Columns', 'type_id', 'id');
    }

    /*
    * 一级/二级栏目列表
    */
    public static function columnshow($datas, $fName, $fId = 'id', $fType = 'typeId', $type = 0)
    {
        $arr = array();
        foreach ($datas as $num => $data) {
            if ($data->$fType == $type) {
                $datas[$num]['_' . $fName] = $datas[$num][$fName];
                $arr[] = $datas[$num];
                foreach ($datas as $num1 => $data1) {
                    if ($data1->$fType == $data->$fId) {
                        $datas[$num1]['_' . $fName] = '├─' . $datas[$num1][$fName];
                        $arr[] = $datas[$num1];
                    }
                }
            }
        }
        return $arr;
    }
}
