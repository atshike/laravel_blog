<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    //

    public function __construct()
    {

    }

    /*
     * 图片上传
     */
    public function upload(Request $request)
    {
        $file = $request->file('Filedata');
        if ($file->isValid()) {
            $entension = $file->getClientOriginalExtension();
            $newName = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path = $file->move(base_path() . '/uploads/images', $newName);
            $filepath = 'uploads/images/'.$newName;
            return $filepath;
        }
    }












}
