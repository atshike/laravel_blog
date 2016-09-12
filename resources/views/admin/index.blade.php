@extends('admin.admin')
@section('content')

    <header class="header">
        <h2 class="headh">后台管理</h2>
        <div class="headright">
            欢迎登录：{{session('user')->name}} <a href="{{url('/admin/updatepwd')}}" target="main">[修改密码]</a> <a
                    href="{{url('/admin/quite')}}">[退出]</a>
        </div>
    </header>
    <div class="adminbod">
        <div class="admleft">
            <div class="admleftshow">
                <ul>
                    <a href="{{url('/admin/addarticle')}}" target="main">
                        <li>添加文章</li>
                    </a>
                    <a href="{{url('/admin/listarticle')}}" target="main">
                        <li>管理文章</li>
                    </a>
                    <a href="{{url('/admin/addcolumn')}}" target="main">
                        <li>添加栏目</li>
                    </a>
                    <a href="{{url('/admin/listcolumn')}}" target="main">
                        <li>管理栏目</li>
                    </a>
                </ul>
            </div>
        </div>
        <iframe id="main" name="main" width="100%" onload="this.height=main.document.body.scrollHeight" frameborder="0" src="{{url('/admin/info')}}"></iframe>
    </div>

@endsection
