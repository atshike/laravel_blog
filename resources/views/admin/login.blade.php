<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>后台登录</title>
    <link rel="stylesheet" href="{{asset('resources/views/style/obadmin.css')}}">
    <style>
        body{
            background-color: #3e6aaa;
        }
    </style>
</head>
<body>
<table width="100%" border="0">
    <tr>
        <td height="116">&nbsp;</td>
    </tr>
    <tr bgcolor="#ffffff">
        <td>
            <form name="form1" method="post" action="">
                {{csrf_field()}}
                <table width="300" border="0" align="center" cellspacing="2">
                    <tr>
                        <td height="20" colspan="2"></td>
                    </tr>
                    <tr>
                        <td height="20" colspan="2" valign="middle">
                            <h2>用户登录</h2>
                        </td>
                    </tr>
                    <tr>
                        <td width="80" height="20" align="right" valign="middle">用户名：</td>
                        <td width="210"><input type="text" name="name" id="name" value=""></td>
                    </tr>
                    <tr>
                        <td height="20" align="right" valign="middle">密&nbsp;&nbsp;&nbsp;码：</td>
                        <td><input type="password" name="password" id="password" value=""></td>
                    </tr>
                    <tr>
                        <td height="30" align="right" valign="middle">验证码：</td>
                        <td><input type="text" name="code" id="code" class="code" value="">
                            <img src="{{url('/code')}}" title="换张" onclick="this.src='{{url('/code')}}?'+Math.random()">
                        </td>
                    </tr>
                    <tr>
                        <td height="20">&nbsp;</td>
                        <td>
                            <button name="login" type="submit" id="login" class="login">登录</button>
                        </td>
                    </tr>
                    <tr>
                        <td height="15">&nbsp;</td>
                        <td>
                            @if(session('msg'))
                                <p style="color: red; font-size: 12px;">{{session('msg')}}</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td height="20" colspan="2">
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
</table>
</body>
</html>
