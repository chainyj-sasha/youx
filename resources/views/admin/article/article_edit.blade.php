@extends('layouts.admin')

@section('title', $title)

@section('content')

    <form action="{{ route('article.update', ['article' => $article]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input name="is_active" type="radio" value="1"> Статья активна<br>
        <input name="is_active" type="radio" value="0"> Статья НЕ активна<br><br>
        <input name="small_pic" type="file"> Превью кантинка<br><br> {{-- так не работает из-за type="file" --}}
        <input name="big_pic" type="file"> Детальная кантинка<br><br>
        <input name="title" type="text" value="{{ $article->title }}"> Заголовок статьи<br><br>
        <textarea name="editor" id="editor" cols=" 30" rows="55" >{{ $article->text }}</textarea><br><br>
        <input type="submit" value="сохранить">
    </form>

    <form action="{{ route('article.destroy', ['article' => $article]) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Удалить">
    </form>

    <p><a href="{{ route('article.index') }}">Назад</a></p>

    <img src="{{ asset('storage/' . $article->small_pic) }}" alt="">
    <img src="{{ asset('storage/' . $article->big_pic) }}" alt="">

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

@endsection
