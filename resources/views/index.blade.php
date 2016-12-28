{{--наследуем родительских шаблон--}}
@extends('layouts.layout')

{{--переопределяем родительскую сексию--}}
@section('navbar')
    {{--добавляем что-то своё в эту сексию--}}
    <h1 style="color: red;position: absolute;z-index: 99999;">Мой код</h1>
    {{--подгружаем родительскую сессию--}}
    @parent
@endsection

{{--определяем секцию с контентом, которую выводим в родительском шаблоне--}}
@section('content')
    {{--подгружаем внешний файл--}}
    @include('layouts.content')
@endsection