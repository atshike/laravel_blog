<div class="obona">
    <h4>点击排行</h4>
    <ul>
        @foreach($hits as $hit)
            <li><a href="/show?id={{$hit->id}}">{{$hit->title}}</a></li>
        @endforeach
    </ul>
</div>