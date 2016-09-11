<?php

namespace App\Http\Controllers\Web;

use App\Models\Columns;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;


class ApiController extends Controller
{
    //
    public function __construct()
    {
        $menu = Columns::where('type_id', 0)->get();

        View::share('menu',$menu);

    }
}
