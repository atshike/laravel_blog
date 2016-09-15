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
                            <a href="{{url('/admin/editarticle/'.$li->id)}}" title="{{$li->title}}">[修改]</a>
                            <a href="javascript:;" onclick="del('{{$li->id}}')">[删除]</a>
                            </span>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="pages">
            {!! $lists->links() !!}
        </div>
    </div>
    <script>
        function del(id) {
            if(window.confirm('你确定要删除吗？')){
                $.post("{{url('/admin/deltarticle')}}/" + id, {
                    '_method': 'delete',
                    '_token': "{{csrf_token()}}",
                    'id': id
                }, function (data) {
                    if (data.status == 0) {
                        location.href = location.href;
                        alert(data.msg);
                    } else {
                        alert(data.msg);
                    }
                });
            }else{
                return false;
            }
        }
    </script>
@endsection
