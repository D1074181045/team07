@extends('app')
@section('title', '這是狗狗品種編輯')
@section('title_h1', '這是狗狗品種編輯')

@section('dog_content')

    <p align="center"><a href="{{ route('varieties.index', 1) }}">返回狗狗品種首頁</a></p>
    {!! Form::model($varietie, ['action' => ['\App\Http\Controllers\VarietiesController@update', $varietie->id], 'method' => 'patch']) !!}
    @include('varieties.form', ['submitButtonText' => '更新資料'])
    {!! Form::close() !!}

@endsection
