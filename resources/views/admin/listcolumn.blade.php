@extends('admin.admin')
@section('content')

    <div class="main">
        <h3>管理栏目</h3>
        <div class="mainlist">
            <a href="" title="">[添加栏目]</a>
        </div>
        <div class="columnlist">
            <ul>
                @foreach($data as $k)
                    <li>
                        <a href="{{url('/admin/updatecolumn?id='.$k->id)}}" title="{{$k->title}}">{{$k->_title}}</a>
                        <span class="columnlistright">
                            <a href="{{url('/admin/updatecolumn?id='.$k->id)}}">[修改]</a>
                            <a href="{{url('/admin/deltarticle?id='.$k->id)}}">[删除]</a>
                        </span>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
@endsection
