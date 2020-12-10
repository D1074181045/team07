@extends('app')
@section('title', '查詢指定體型')
@section('title_h1', '查詢指定體型')
@section('dog_content')

<p align="center"><a href="{{ route('varieties.index', 1) }}">返回狗狗品種首頁</a></p>
<table border="1" align="center">
    <tr>
        <td>目前狗狗數目：<div style="color: red;display:inline;font-weight:bold;">{{ $total_records }}</div></td>
    </tr>
    {!! Form::open(['action' => ['\App\Http\Controllers\VarietiesController@type', 1], 'method' => 'get']) !!}
    <tr>
        <td>體型</td>
        <td>
            {!! Form::select('somatotype_id', $somatotypes) !!}

        </td>
        <td>
            {!! Form::submit('查詢') !!}
        </td>
    </tr>
    {!! Form::close() !!}
</table>
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
    @if (isset($varieties))
        @foreach($varieties as $varietie)
            <tr align="center">
                <td>{{ $varietie->id }}</td>
                <td>{{ $varietie->name }}</td>
                <td>{{ $varietie->somatotype }}</td>
                <td>{{ $varietie->source }}</td>
                <td>{{ $varietie->avg_life }}</td>
                <td>
                    <button onclick=location.href="{{ route('varieties.edit', $varietie->id) }}">修改</button>
                </td>
                {!! Form::open(['url' => route('varieties.destroy', $varietie->id), 'method' => 'delete']) !!}
                    <td>
                        <input type="submit" value="刪除"/>
                    </td>
                {!! Form::close() !!}
            </tr>
        @endforeach
    @endif
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
</body>
@endsection
