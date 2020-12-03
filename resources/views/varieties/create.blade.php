@extends('app')
@section('title', '這是狗狗品種新增')
@section('title_h1', '這是狗狗品種新增')

@section('dog_content')
    {{--<h1 align="center">這是狗狗品種新增</h1>--}}
    <p align="center"><a href="{{ route('varieties.index', 1) }}">返回狗狗品種首頁</a></p>
    {!! Form::open(['url' => route('varieties.store')]) !!}
    <table border="1" align="center">
        <tr>
            <th>欄位</th>
            <th>資料</th>
        </tr>
        <tr>
            <td>狗狗名稱</td>
            <td>{!! Form::text('name', null, ['onfocus' => 'this.select()']) !!}</td>
        </tr>
        <tr>
            <td>體型編號</td>
            <td>
                <select name="somatotype_id" id="somatotype_id" style="width: 100%">
                    @foreach($somatotypes as $somatotype)
                        <option value="{{ $somatotype->somatotype_id }}">{{ $somatotype->somatotype }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>原產地</td>
            <td>{!! Form::text('source', null, ['onfocus' => 'this.select()']) !!}</td>
        </tr>
        <tr>
            <td>平均壽命</td>
            <td>{!! Form::text('avg_life', null, ['onfocus' => 'this.select()']) !!}</td>
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
