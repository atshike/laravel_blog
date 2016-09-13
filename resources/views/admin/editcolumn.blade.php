@extends('admin.admin')
@section('content')

    <div class="main">
        <h3>修改栏目</h3>
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
            <form action="{{url('admin/updatecolumn/'.$column->id)}}" method="post">
                <input name="_method" type="hidden" value="put">
                {{csrf_field()}}
                <table class="gridtable">
                    <tr>
                        <td>分类：</td>
                        <td><input type="text" name="title" id="title" class="input" value="{{$column->title}}"></td>
                    </tr>
                    <tr>
                        <td>上级分类：</td>
                        <td>
                            <select name="type_id">
                                <option value="0"> 一级分类</option>
                                @foreach($data as $k)
                                    <option value="{{$k->id}}"
                                            @if($column->type_id == $k->id)
                                            selected
                                            @endif
                                    >{{$k->_title}}</option>
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
