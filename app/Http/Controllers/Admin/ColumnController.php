<?php

namespace App\Http\Controllers\Admin;

use App\Models\Columns;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ColumnController extends ApiController
{
    /*
     * 栏目列表
     * /listcolumn
     */
    public function columnlist()
    {
        $data = Columns::columnshow(Columns::get(), 'title', 'id', 'type_id');
        $lists = Columns::orderBy('id', 'desc')->get();
        return view('admin.listcolumn', compact('lists', 'data'));
    }

    /*
     * 栏目添加
     * /addcolumn
     */
    public function columnadd()
    {
        $data = Columns::columnshow(Columns::get(), 'title', 'id', 'type_id');
        return view('admin.addcolumn', compact('data'));
    }

    /*
     * @param Request $request
     * 栏目添加
     * /columnstore
     */
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

    /*
     * @param Request $request $id
     * 栏目删除
     * /deltarticle/{id}
     */
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

    /*
     * @param Request $requestId
     * 栏目修改
     * /editcolumn/{id}
     */
    public function edit($requestId)
    {
        $column = Columns::find($requestId);
        $data = Columns::columnshow(Columns::get(), 'title', 'id', 'type_id');
        return view('admin.editcolumn', compact('data', 'column'));
    }

    /*
     * @param Request $request
     * 栏目修改
     * /updatecolumn/{id}
     */
    public function update(Request $request)
    {
        $columns = Columns::findOrFail($request->id);
        $columns->fill($request->all());
        if (!$columns->save()) {
            return back()->with('errors', '删除失败！');
        }
        return redirect('admin/listcolumn');
    }
}
