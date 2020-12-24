@extends('app')
@section('title', '這是狗狗體型單一顯示')
@section('title_h1', '這是狗狗體型單一顯示')
@section('dog_content')
    <p align="center"><a href="{{ route('somatotypes.index', 1) }}">返回狗狗體型首頁</a></p>

    <table border="1" align="center">
        <tr>
            <th>欄位</th>
            <th>資料</th>
        </tr>
        <tr>
            <td>體型編號</td>
            <td>{{ $somatotype->somatotype_id }}</td>
        </tr>
        <tr>
            <td>體型</td>
            <td>{{ $somatotype->somatotype }}</td>
        </tr>
        <tr>
            <td>平均身高</td>
            <td>{{ $somatotype->avg_height }}</td>
        </tr>
        <tr>
            <td>平均體重</td>
            <td>{{ $somatotype->avg_weight }}</td>
        </tr>
    </table>
    </br>
    <table border="1" align="center">
        <tr>
            <th>狗狗ID</th>
            <th>狗狗名稱</th>
            <th>體型</th>
            <th>原產地</th>
            <th>平均壽命</th>
            <th>發現日期</th>
            <th>登陸日期</th>
        </tr>
        @foreach($varieties as $varietie)
            <tr align="center">
                <td>{{ $varietie->id }}</td>
                <td>{{ $varietie->name }}</td>
                {{--            <td>{{ $varietie->somatotype_id }}</td>--}}
                <td>{{ $varietie->somatotype }}</td>
                <td>{{ $varietie->source }}</td>
                <td>{{ $varietie->avg_life }}</td>
                <td>{{ $varietie->find_date }}</td>
                <td>{{ $varietie->land_date }}</td>
            </tr>
        @endforeach
    </table>
@endsection
