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
    /*
     * 文章列表
     * /listarticle
     */
    public function articlelist()
    {
        $lists = Articles::orderBy('id', 'desc')->paginate(10);
        return view('admin.listarticle', compact('lists'));
    }

    /*
     * 文章添加
     * /addarticle
     */
    public function articleadd()
    {
        $data = Columns::columnshow(Columns::get(), 'title', 'id', 'type_id');
        return view('admin.addarticle', compact('data'));
    }

    /*
     * @param Request $request $id
     * 文章添加
     * /store
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
        $article = new Articles($request->except('_token'));
        $article->create_time = time();
        $article->save();
        if (!$article->save()) {
            return back()->with('errors', '添加失败！');
        }
        return redirect('admin/listarticle');
    }


    /*
     * @param Request $request $id
     * 文章删除
     * deltarticle/{id}
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

        $article = Articles::where('id', $id)->first();
        if (!$article->delete()) {
            return back()->with('errors', '删除失败！');
        }
        return redirect('admin/listarticle');
    }

    /*
     * 文章修改
     * /editarticle
     */
    public function edit($requestId)
    {
        $articles = Articles::find($requestId);
        $data = Columns::columnshow(Columns::get(), 'title', 'id', 'type_id');
        return view('admin.editarticle', compact('articles','data'));
    }

    /*
     * @param Request $request
     * 文章修改
     * /updatearticle/{id}
     */
    public function update(Request $request)
    {
        $article = Articles::findOrFail($request->id);
        $article->fill($request->all());
        if (!$article->save()) {
            return back()->with('errors', '删除失败！');
        }
        return redirect('admin/listarticle');
    }
}
