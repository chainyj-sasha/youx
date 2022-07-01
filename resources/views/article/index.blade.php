@extends('layouts.app')

@section('title', $title)

@section('content')

    <h3>{{ $article->title }}</h3>

    <p>Изображение</p>

    <p>{{ $article->text }}</p>

    <form action="{{ route('main_page') }}" method="">
        <button style="width: 110px; height: 20px">Назад</button>
    </form>

@endsection
