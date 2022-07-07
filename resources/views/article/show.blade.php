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

        <h4>Комментарии к статье:</h4>

        @foreach($article->comments as $comment)
            <p>
                Имя: {{ $comment->name }}<br>
                Комментарий: {{ $comment->text }}
            </p>
        @endforeach

    <h5>Комментировать статью</h5>
    <form id="commentForm" method="post">
        <input name="hidden_id" id="hidden_id" type="hidden" value="{{ $article->id }}">
        <input name="name" id="name" type="text" placeholder="Ваше имя"><br>
        <textarea name="text" id="text" cols="30" rows="10" placeholder="Текст кометария"></textarea><br>
        <input type="submit" name="submit" class="button" id="submit">
    </form>

    <script>
        $("#commentForm").validate();
    </script>


    <a href="{{ route('category_index') }}">Назад</a>

@endsection
