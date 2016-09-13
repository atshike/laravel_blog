<?php

namespace App\Http\Controllers\Admin;

use App\Models\Articles;
use App\Models\Columns;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ArticleController extends ApiController
{
    //
    public function articleadd()
    {
        $data = Columns::columnshow(Columns::get(), 'title', 'id', 'type_id');
        return view('admin.addarticle', compact('data'));
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
        $article = new Articles($request->except('_token'));
        $article->create_time = time();
        $article->save();
        if (!$article->save()) {
            return back()->with('errors', '添加失败！');
        }
        return redirect('admin/listarticle');
    }

    public function articlelist()
    {
        $lists = Articles::orderBy('id', 'desc')->paginate(10);
        return view('admin.listarticle', compact('lists'));
    }

    public function destroy(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ], [
            'id.required' => '非法操作',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $article = Articles::where('id',$id)->first();
        if(!$article->delete()){
            return back()->with('errors', '删除失败！');
        }
        return redirect('admin/listarticle');
    }
}
