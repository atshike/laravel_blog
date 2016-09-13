<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Columns
 * @package App\Models
 * @see https://laravel.com/docs/master/hashing
 */
class Columns extends Model
{
    /**
     * 表名
     */
    protected $table = "columns";

    /**
     * 主键
     */
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentColumns()
    {
        return $this->belongsTo('App\Models\Columns', 'type_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function childrenColumns()
    {
        return $this->hasMany('App\Models\Columns', 'type_id', 'id');
    }

    /**
     * @param $datas
     * @param $fName
     * @param $fId
     * @param $fType
     * @param $type
     * 一级/二级栏目列表
     * return _$fName
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
