<?php

namespace App\Http\Controllers\web;

use App\Models\Articles;
use App\Models\Columns;
use Illuminate\Http\Request;


class IndexController extends ApiController
{
    //
    public function index()
    {
        $list = Articles::orderBy('id', 'desc')->paginate(10);
        $column = $this->columns();
        $hits = $this->hits();
        return view('web.index', compact('list', 'column', 'hits'));
    }

    public function listing(Request $request)
    {
        $columnall = Columns::where('id', $request->id);
        $listcolumn = $columnall->value('title');
        $typeId = $columnall->value('type_id');
        if ($typeId == 0) {
            $columnId = Columns::where('type_id', $request->id)->get();
            foreach ($columnId as $columnIds) {
                $list = Articles::whereIn('columns_id', $columnIds)->orderBy('id', 'desc')->paginate(10);
            }
        } else {
            $list = Articles::where('columns_id', $request->id)->orderBy('id', 'desc')->paginate(10);
        }
        $column = $this->columns();
        $hits = $this->hits();
        return view('web.listing', compact('listcolumn', 'list', 'column', 'hits'));
    }

    public function show(Request $request)
    {
        $shows = Articles::where('id', $request->id)->first();
        $column = $this->columns();
        $hits = $this->hits();
        $article['pre'] = Articles::where('id', '<', $request->id)->orderBy('id', 'desc')->first();
        $article['next'] = Articles::where('id', '>', $request->id)->orderBy('id', 'asc')->first();
        Articles::where('id', $request->id)->increment('hit');
        return view('web.show', compact('shows', 'column', 'hits', 'article'));

    }

    public function columns()
    {
        return $column = Columns::with('childrenColumns')->get();
    }

    public function hits()
    {
        return Articles::take(10)->orderBy('hit', 'desc')->get();
    }


}
