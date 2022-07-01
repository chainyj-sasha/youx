@extends('layouts.app')

@section('title', $title)

@section('content')

    <h1>мы здесь</h1>
    @if(auth()->check() && auth()->user()->admin)
        <a href="/admin/category/">на админку</a>
    @endif


    <form action="{{ route('show_search_article') }}" method="get">
        <input name="search" type="text" placeholder="Поиск по заголвку статьи">
        <input type="submit" hidden>
    </form>

    @foreach($categories as $category)
        Категория - {{ $category->title }}<br>

        @foreach($category->articles as $article)
            <img src="{{ asset('storage/' . $article->small_pic) }}" alt=""><br>
            {{ date('Y-m-d', strtotime($article->created_at)) }}<br>
            @if($article->text)
                <a href="{{ route('article_show_one', ['id' => $article->id]) }}">{{ $article->title }}</a><br><br>
            @else
                {{ $article->title }}<br><br>
            @endif
        @endforeach

    @endforeach

@endsection
