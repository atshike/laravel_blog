@extends('admin.admin')
@section('content')
    <div class="main">
        <h3>管理文章</h3>
        <div class="mainlist">
            <a href="{{url('admin/addarticle')}}" title="">[添加文章]</a>
        </div>
        <div class="columnlist">
            <ul>
                @foreach($lists as $key => $li)
                    <li>
                        <a href="{{url('/admin/updatecolumn?id='.$li->id)}}" title="{{$li->title}}">{{$li->title}}</a>
                            <span class="columnlistright">
                            <a href="{{url('/admin/updatecolumn/'.$li->id)}}" title="{{$li->title}}">[修改]</a>
                                <form method="post" action="{{url('/admin/deltarticle/'.$li->id)}}"
                                      style="float: inherit">
                                    <input name="_method" type="hidden" value="delete">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input name="id" type="hidden" value="{{$li->id}}">
                                    <button type="submit">删除</button>
                                </form>
                            </span>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="pages">
            {!! $lists->links() !!}
        </div>
    </div>
@endsection
