<?php

namespace App\Http\Controllers\Admin;

use App\Models\Users;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class IndexController extends ApiController
{
    //
    public function index()
    {
        return view('admin.index');
    }

    public function info()
    {
        return view('admin.info');
    }

    public function articleadd()
    {
        return view('admin.addarticle');
    }

    public function articlelist()
    {
        return view('admin.listarticle');
    }

    public function columnadd()
    {
        return view('admin.addcolumn');
    }

    public function columnlist()
    {
        return view('admin.listcolumn');
    }

    public function quite()
    {
        session(['user' => null]);
        return redirect('login');
    }

    public function updatepwd(Request $request)
    {
        $rules = [
            'pwd' => 'required|between:6,20|confirmed',
        ];
        $message = [
            'pwd.required' => '密码不能为空！',
            'pwd.between' => '密码在6-20位！',
            'pwd.confirmed' => '两次输入密码不一致！',
        ];
        if ($request->all()) {
            $validator = Validator::make($request->all(), $rules, $message);
            if ($validator->passes()) {
                $user = Users::first();
                if ($request->pwd_o == Crypt::decrypt($user->password)) {
                    $user->password = Crypt::encrypt($request->pwd);
                    $user->update();
                    return redirect('admin/info');
                }
                return back()->with('errors', '原始密码错误！');
            }
            return back()->withErrors($validator);
        }
        return view('admin.updatepwd');
    }
}
