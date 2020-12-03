@extends('app')
@section('title', '這是狗狗體型新增')
@section('title_h1', '這是狗狗體型新增')
@section('dog_content')
    <p align="center"><a href="{{ route('somatotypes.index', 1) }}">返回狗狗體型首頁</a></p>

    {!! Form::open(['url' => route('somatotypes.store')]) !!}
    <table border="1" align="center">
        <tr>
            <th>欄位</th>
            <th>資料</th>
        </tr>
        <tr>
            <td>體型</td>
            <td>{!! Form::text('somatotype', null, ['onfocus' => 'this.select()']) !!}</td>
        </tr>
        <tr>
            <td>平均身高</td>
            <td>{!! Form::text('avg_height', null, ['onfocus' => 'this.select()']) !!}</td>
        </tr>
        <tr>
            <td>平均體重</td>
            <td>{!! Form::text('avg_weight', null, ['onfocus' => 'this.select()']) !!}</td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                {!! Form::submit('新增資料') !!}
                {!! Form::reset('重新填寫') !!}
            </td>
        </tr>
    </table>
    {!! Form::close() !!}
@endsection

