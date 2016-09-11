<div class="obona">
    <h4>目录分类</h4>
    <ul>
        @foreach($column as $key => $li)
            @if($li->type_id == 0)
                <li><a href="/list?id={{$li->id}}" title="{{$li->title}}">{{$li->title}}</a></li>
                @foreach($li->childrenColumns as $li2)
                    <li>&nbsp&nbsp --<a href="/list?id={{$li2->id}}" title="{{$li2->title}}">{{$li2->title}}</a></li>
                @endforeach
            @endif
        @endforeach
    </ul>
</div>
