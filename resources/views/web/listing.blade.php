@extends('common.layouts')
@section('info')
    <title>{{$listcolumn}}-博客</title>
@endsection
@section('content')
    <div class="indexshow">
        <div class="indexleftshow">
            <h4>{{$listcolumn}}</h4>
            <ul>
                @foreach( $list as $v)
                    <li>[<a href="/list?id={{$v->columns->id}}" title="{{$v->columns->title}}" class="ilsa">{{$v->columns->title}}</a>]
                        <a href="/show?id={{$v->id}}" title="{{$v->title}}" class="ilsb">{{$v->title}}</a>
                        <span class="ilsc">时间：{{$v->created_at}} 浏览：{{$v->hit}}次</span>
                        <p>{{mb_substr($v->description,0,200)}}</p>
                    </li>
                @endforeach
            </ul>
            <div class="pages">
                {!! $list->links() !!}
            </div>
        </div>

        <div class="indexrightshow">
            @include('common.column')
            @include('common.ranking')
        </div>
    </div>

@endsection
