@extends('app')
@section('title', '這是狗狗體型單一顯示')
@section('title_h1', '這是狗狗體型單一顯示')

@section('dog_content')
    <p align="center"><a href="{{ route('varieties.index', 1) }}">返回狗狗品種首頁</a></p>

    <table border="1" align="center">
        <tr>
            <th>欄位</th>
            <th>資料</th>
        </tr>
        <tr>
            <td>狗狗ID</td>
            <td>{{ $varietie->id }}</td>
        </tr>
        <tr>
            <td>狗狗名稱</td>
            <td>{{ $varietie->name }}</td>
        </tr>
        <tr>
            <td>體型</td>
            <td>{{ $varietie->Somatotype->somatotype }}</td>
        </tr>
        <tr>
            <td>原產地</td>
            <td>{{ $varietie->source }}</td>
        </tr>
        <tr>
            <td>平均壽命</td>
            <td>{{ $varietie->avg_life }}</td>
        </tr>
        <tr>
            <td>發現日期</td>
            <td>{{ $varietie->find_date }}</td>
        </tr>
        <tr>
            <td>登陸日期</td>
            <td>{{ $varietie->land_date }}</td>
        </tr>
    </table>
@endsection
