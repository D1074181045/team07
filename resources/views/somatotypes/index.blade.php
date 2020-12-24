@extends('app')
@section('title', '這是狗狗全部體型')
@section('title_h1', '這是狗狗全部體型')
@section('dog_content')
    <table border="1" align="center">
        <tr>
            <td>目前狗狗體型數目：<div style="color: red;display:inline;font-weight:bold;">{{ $total_records }}</div></td>
            <td><button onclick=location.href="{{ route('somatotypes.create') }}">新增狗狗體型</button></td>
        </tr>
        <tr>
            <td>查詢指定體型</td>
            <td><button style="width: 100%" onclick=location.href="{{ route('somatotypes.show') }}">前往查詢</button></td>
        </tr>
    </table>

    </br>

    <table border="1" align="center">
        <tr>
            <th>體型編號</th>
            <th>體型</th>
            <th>平均身高</th>
            <th>平均體重</th>
            <th colspan="3">操作</th>
        </tr>

        </form>
        @foreach($somatotypes as $somatotype)
            <tr align="center">
                <td>{{ $somatotype->somatotype_id }}</td>
                <td>{{ $somatotype->somatotype }}</td>
                <td>{{ $somatotype->avg_height }}</td>
                <td>{{ $somatotype->avg_weight }}</td>


                <td>
                    <button onclick=location.href="{{ route('somatotypes.show2', $somatotype->somatotype_id) }}">顯示</button>
                </td>
                <td>
                    <button onclick=location.href="{{ route('somatotypes.edit', $somatotype->somatotype_id) }}">修改</button>
                </td>
                {!! Form::open(['url' => route('somatotypes.destroy', $somatotype->somatotype_id), 'method' => 'delete']) !!}
                    <td>
                        <input type="submit" value="刪除"/>
                    </td>
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
