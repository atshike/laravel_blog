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
            <iframe src="{{url('/admin/info')}}" width="100%" name="main" frameborder='0' onload="changeFrameHeight()" id="iframepage" scrolling="no"></iframe>
        <script type="text/javascript" language="javascript">
            function changeFrameHeight(){
                var ifm= document.getElementById("iframepage");
                ifm.height=document.documentElement.clientHeight;
            }
            window.onresize=function(){
                changeFrameHeight();
            }
        </script>
    </div>

@endsection
