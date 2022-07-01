@extends('layouts.app')

@section('title', $title)

@section('content')

    <h3>Результат поиска:</h3>
    <ul>
        @foreach($articles as $article)
            <li><a href="{{ route('article_show_one', ['id' => $article->id]) }}">{{ $article->title }}</a></li>
        @endforeach
    </ul>

@endsection
