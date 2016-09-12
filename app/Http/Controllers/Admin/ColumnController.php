<?php

namespace App\Http\Controllers\Admin;

use App\Models\Columns;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ColumnController extends ApiController
{
    //
    public function columnadd()
    {
        return view('admin.addcolumn');
    }

    public function columnlist()
    {
        $data = Columns::columnshow(Columns::get(), 'title', 'id', 'type_id');
        $lists = Columns::orderBy('id', 'desc')->get();
        return view('admin.listcolumn', compact('lists','data'));
    }
}
