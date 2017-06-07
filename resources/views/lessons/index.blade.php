@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
<ul>
    @foreach ($lessons as $lesson)
        <li>This is lesson {{ $lesson->id }}</li>
    @endforeach
</ul>
@endsection