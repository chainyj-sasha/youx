@extends('layouts.app')

@section('title', $title)

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h3>{{ $article->title }}</h3>

    @if($article->big_pic)
        <img src="{{ asset('storage/' . $article->big_pic) }}" alt="" width="200" height="200">
    @else
        <img src="{{ asset('storage/' . $article->small_pic) }}" alt="" width="200" height="200">
    @endif

    <p>{!! $article->text !!}</p>

    <h5>Комментировать статью</h5>
    <form id="commentForm" method="post">

        <input name="hidden_id" type="hidden" value="{{ $article->id }}">
        <input name="name" type="text" placeholder="Ваше имя"><br><br>
        <input name="comment" type="text" placeholder="Текст кометария"><br><br>
        <input type="submit" id="submit">
    </form>


    <a href="{{ route('category_index') }}">Назад</a>

@endsection
