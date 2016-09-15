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
                            <a href="{{url('/admin/editcolumn/'.$k->id)}}">[修改]</a>
                            <a href="javascript:;" onclick="del('{{$k->id}}')">[删除]</a>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <script>
        function del(id) {
            if(window.confirm('你确定要删除吗？')){
                $.post("{{url('/admin/deltcolumn')}}/" + id, {
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
