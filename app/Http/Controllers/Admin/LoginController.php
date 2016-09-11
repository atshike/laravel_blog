<?php

namespace App\Http\Controllers\Admin;

use App\Models\Users;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

require_once 'resources/code/Code.class.php';

class LoginController extends ApiController
{
    //
    public function index(Request $request)
    {
        if ($request->all()) {
            //验证码
            $code = new \Code();
            if (strtoupper($request->code) !== $code->get()) {
                return back()->with('msg', '验证码错误');
            }
            $relsut = Users::where('name', $request->name)->first();
            if ($relsut && $request->password == Crypt::decrypt($relsut->password)) {
                session(['user' => $relsut]);
               return redirect('/admin/index');
            } else {
                return back()->with('msg', '用户名密码错误');
            }
        } else {
            return view('admin.login');
        }
    }

    public function code()
    {
        $code = new \Code();
        $code->make();

    }

    /*
     * 无用
     * 获取code：入口开启session
     *
     */
    public function getcode()
    {
        $code = new \Code();
        echo $code->get();
    }
}
