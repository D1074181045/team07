@extends('app')
@section('title', '這是狗狗體型新增')
@section('title_h1', '這是狗狗體型新增')
@section('dog_content')

    <p align="center"><a href="{{ route('somatotypes.index', 1) }}">返回狗狗體型首頁</a></p>
    @include('message.list')
    {!! Form::open(['action' => ['\App\Http\Controllers\SomatotypesController@store']]) !!}
    @include('somatotypes.form', ['submitButtonText' => '新增資料'])
    {!! Form::close() !!}

@endsection

