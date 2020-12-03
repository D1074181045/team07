@extends('app')
@section('title', '這是狗狗體型編輯')
@section('title_h1', '這是狗狗體型編輯')
@section('dog_content')
    <p align="center"><a href="{{ route('somatotypes.index', 1) }}">返回狗狗體型首頁</a></p>

    {!! Form::open(['url' => route('somatotypes.update', $id), 'method' => 'patch']) !!}
    <table border="1" align="center">
        <tr>W
            <th>欄位</th>
            <th>資料</th>
        </tr>
        <tr>
            <td>體型</td>
            <td>{!! Form::text('somatotype', $somatotype, ['onfocus' => 'this.select()']) !!}</td>
        </tr>
        <tr>
            <td>平均身高</td>
            <td>{!! Form::text('avg_height', $avg_height, ['onfocus' => 'this.select()']) !!}</td>
        </tr>
        <tr>
            <td>平均體重</td>
            <td>{!! Form::text('avg_weight', $avg_weight, ['onfocus' => 'this.select()']) !!}</td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                {!! Form::submit('更新資料') !!}
                {!! Form::reset('重新填寫') !!}
            </td>
        </tr>
    </table>
    {!! Form::close() !!}
@endsection
{{--</body>--}}
{{--</html>--}}
