@extends('app')
@section('title', '這是狗狗體型編輯')
@section('title_h1', '這是狗狗體型編輯')
@section('dog_content')

    <p align="center"><a href="{{ route('somatotypes.index', 1) }}">返回狗狗體型首頁</a></p>
    @include('message.list')
    {!! Form::model($somatotype, ['action' => ['\App\Http\Controllers\SomatotypesController@update', $id], 'method' => 'patch']) !!}
    @include('somatotypes.form', ['submitButtonText' => '更新資料'])
    {!! Form::close() !!}

@endsection
