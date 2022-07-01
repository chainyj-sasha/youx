@extends('layouts.app')

@section('title', $title)

@section('content')

    <h3>{{ $article->title }}</h3>

    @if($article->big_pic)
        <img src="{{ asset('storage/' . $article->big_pic) }}" alt="">
    @else
        <img src="{{ asset('storage/' . $article->small_pic) }}" alt="">
    @endif

    <p>{{ $article->text }}</p>

    <a href="{{ route('category_index') }}">Назад</a>

@endsection
