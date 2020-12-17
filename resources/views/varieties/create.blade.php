@extends('app')
@section('title', '這是狗狗品種新增')
@section('title_h1', '這是狗狗品種新增')

@section('dog_content')

    <p align="center"><a href="{{ route('varieties.index', 1) }}">返回狗狗品種首頁</a></p>
    @include('message.list')
    {!! Form::open(['action' => ['\App\Http\Controllers\VarietiesController@store']]) !!}
    @include('varieties.form', ['submitButtonText' => '新增資料']);
    {!! Form::close() !!}

@endsection
