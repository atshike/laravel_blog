<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('info')
    <link rel="stylesheet" href="{{asset('resources/views/style/obthink.css')}}">
    <script type="text/javascript" src="{{asset('resources/views/style/js/jquery.js')}}"></script>
</head>
<body>
<header class="head">
    <div class="header">
        <h2>乄無时博客</h2>
        <div class="menu">
            <ul>
                <li><a href="{{url('/')}}">网站首页</a></li>
                @foreach($menu as $menus)
                    <li><a href="{{url('/list?id='.$menus->id)}}">{{$menus->title}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="reg">
            <form class="navbar-form navbar-left" role="form" action="" method="get">
                <div class="form-group">
                    <input type="text" class="form-control" name="keywords" placeholder="Search" value="">
                </div>
                <button type="submit" class="btn btn-primary">搜索</button>
            </form>
        </div></div>
</header>
@yield('content')
<footer class="footer">
    <div class="foot">
        Copyright 2015-2015 ObO1com <br/>
        本站保留内容版权，但允许进行转载，如涉版权问题请发邮件删除atshike#163.com
    </div>
</footer>
</body>
</html>
