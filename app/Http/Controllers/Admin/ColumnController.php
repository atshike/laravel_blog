<?php

namespace App\Http\Controllers\Admin;

use App\Models\Columns;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ColumnController extends ApiController
{
    //
    public function columnadd()
    {
        $data = Columns::columnshow(Columns::get(), 'title', 'id', 'type_id');
        return view('admin.addcolumn', compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ], [
            'title.required' => '标题不能为空',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $article = new Columns($request->except('_token'));
        $article->save();
        if (!$article->save()) {
            return back()->with('errors', '添加失败！');
        }
        return redirect('admin/listcolumn');
    }

    public function columnlist()
    {
        $data = Columns::columnshow(Columns::get(), 'title', 'id', 'type_id');
        $lists = Columns::orderBy('id', 'desc')->get();
        return view('admin.listcolumn', compact('lists', 'data'));
    }

    public function destroy(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ], [
            'id.required' => '非法操作',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $column = Columns::where('id', $id)->first();
        if ($column->delete()) {
            $data = [
                'status' => 0,
                'msg' => '删除成功！'
            ];

        } else {
            $data = [
                'status' => 1,
                'msg' => '删除失败！'
            ];
        }
        return $data;
    }
}
