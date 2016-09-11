@extends('admin.admin')
@section('content')
    <div class="main">
        <h3>修改密码</h3>
        <div class="updatepwd">
            <div class="msg">
            @if(count($errors))
                    @foreach($errors->all() as $error)
                        {{$error}}<br />
                    @endforeach
                @endif
            </div>
            <ul>
                <form name="form1" method="post" action="">
                    {{csrf_field()}}
                    <li><span>原始密码：</span><input type="password" name="pwd_o" id="pwd_o"></li>
                    <li><span>新&nbsp;&nbsp;密&nbsp;码：</span><input type="password" name="pwd" id="pwd"></li>
                    <li><span>确认密码：</span><input type="password" name="pwd_confirmation" id="pwd_c"></li>
                    <li><input type="submit" name="button" id="button" value="提交"/>
                    </li>
                </form>
            </ul>
        </div>
    </div>
@endsection