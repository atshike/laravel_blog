@extends('admin.admin')
@section('content')

    <div class="main">
        <h3>添加栏目</h3>
        <div class="infoadd">
            <div class="msg">
                @if(count($errors))
                    @if(is_object($errors))
                        @foreach($errors->all() as $error)
                            {{$error}}<br/>
                        @endforeach
                    @else
                        {{$errors}}
                    @endif
                @endif
            </div>
            <form action="{{url('admin/columnstore')}}" method="post">
                {{csrf_field()}}
                <table class="gridtable">
                    <tr>
                        <td>分类：</td>
                        <td><input type="text" name="title" id="title" class="input"></td>
                    </tr>
                    <tr>
                        <td>分类：</td>
                        <td>
                            <select name="type_id">
                                <option value="0"> 一级分类</option>
                                @foreach($data as $k)
                                    @if($k->type_id == 0)
                                        <option value="{{$k->id}}">{{$k->title}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="提交"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@endsection
