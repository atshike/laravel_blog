@extends('common.layouts')
@section('info')
    <title>{{$shows->title}}-博客</title>
@endsection
@section('content')
    <div class="oshow">
        <h2>{{$shows->title}}</h2>
        <div class="wri">
            {{$shows->columns->title}} |
            时间：{{$shows->created_at}} |
            浏览：{{$shows->hit}}
        </div>
        <div style="padding:20px; size:12px; border:1px solid #ccc; background:#ffeeee; margin:10px 0;">
            {{mb_substr($shows->description,0,200)}}
        </div>
        {!! $shows->description !!}

        <div class="nm" style="margin:20px 0;">
            <li>上一条：
                @if($article['pre'])
                    <a href="{{url('/show?id='.$article['pre']->id)}}">{{$article['pre']->title}}</a>
                @else
                    暂无信息
                @endif
            </li>

            <li>下一条：
                @if($article['next'])
                    <a href="{{url('/show?id='.$article['next']->id)}}">{{$article['next']->title}}</a>
                @else
                    暂无信息
                @endif
            </li>
        </div>
    </div>
@endsection
