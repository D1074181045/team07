@extends('app')
@section('title', '這是狗狗全部品種')
@section('title_h1', '這是狗狗全部品種')
@section('dog_content')
<table border="1" align="center">
    <tr>
        <td>目前狗狗品種數目：<div style="color: red;display:inline;font-weight:bold;">{{ $total_records }}</div></td>
        <td>
            <button onclick=location.href="{{ route('varieties.create') }}">新增狗狗品種</button>
        </td>
    </tr>
    <tr>
        <td>查詢指定品種ID</td>
        <td>
            <button style="width: 100%" onclick=location.href="{{ route('varieties.show') }}">前往查詢</button>
        </td>
    </tr>
</table>
</body>
</br>

<table border="1" align="center">
    <tr>
        <th>狗狗ID</th>
        <th>狗狗名稱</th>
        <th>體型</th>
        <th>原產地</th>
        <th>平均壽命</th>
        <th colspan="2">操作</th>
    </tr>

    @foreach($varieties as $varietie)
        <tr align="center">
            <td>{{ $varietie->id }}</td>
            <td>{{ $varietie->name }}</td>
            {{--            <td>{{ $varietie->somatotype_id }}</td>--}}
            <td>{{ $varietie->somatotype }}</td>
            <td>{{ $varietie->source }}</td>
            <td>{{ $varietie->avg_life }}</td>

            <td>
{{--                <a href="{{ route('varieties.edit', $varietie->id) }}">修改</a>--}}
                <button onclick=location.href="{{ route('varieties.edit', $varietie->id) }}">修改</button>
            </td>
            {!! Form::open(['url' => route('varieties.destroy', $varietie->id), 'method' => 'delete']) !!}
{{--            <form action="{{ route('varieties.destroy', $varietie->id) }}" method="POST">--}}
                <td>
{{--                    <td><a href="{{ route('varieties.destroy', $varietie->id) }}">刪除</a>--}}
                    <input type="submit" value="刪除"/>
                </td>
{{--                @method('delete')--}}
{{--                @csrf--}}
{{--            </form>--}}
            {!! Form::close() !!}
        </tr>
    @endforeach

</table>

<table border="0" align="center">
    @if ($num_pages > 1)
        <td><a href="page=1">第一頁</a></td>
        <td><a href="page={{ ($num_pages-1) }}">上一頁</a></td>
    @endif
    @if ($num_pages < $total_pages)
        <td><a href="page={{ ($num_pages+1) }}">下一頁</a></td>
        <td><a href="page={{ $total_pages }}">最後頁</a></td>
    @endif
</table>

<table border="0" align="center">
    <tr>
        <td>
            頁數：
            @for ($i = 1; $i <= $total_pages; $i++)
                @if ($i == $num_pages)
                    {{ $i . " " }}
                @else
                    <a href="page={{ $i }}">{{ $i }}</a>
                @endif
            @endfor
        </td>
    </tr>
</table>
@endsection
