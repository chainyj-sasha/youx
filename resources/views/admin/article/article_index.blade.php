@extends('layouts.admin')

@section('title', $title)

@section('content')

    <h3>Все статьи</h3>

    <table border="1">
        <tr>
            <th>Заголовок</th>
            <th>Дата создания</th>
            <th>Дата обновления</th>
            <th>Редактировать</th>
        </tr>

        @foreach($articles as $article)
            <tr>
                <td><a href="{{ route('article.edit', ['article' => $article]) }}">{{ $article->title }}</a></td>
                <td>{{ $article->created_at }}</td>
                <td>{{ $article->updated_at }}</td>
                <td><a href="{{ route('article.edit', ['article' => $article]) }}">редактировать</a></td>
            </tr>
        @endforeach

    </table>

    <h3>Создать новую статью</h3>

    <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <p>Выберите катекорию из списка</p>
        @foreach($categories as $category)
            <input name="category[]" type="checkbox" value="{{ $category->id }}">{{ $category->title }}<br>
        @endforeach<br>
        <input name="is_active" type="radio" value="1"> Статья активна<br>
        <input name="is_active" type="radio" value="0"> Статья НЕ активна<br><br>
        <input name="small_pic" type="file"> Превью кантинка<br><br>
        <input name="big_pic" type="file"> Детальная кантинка<br><br>
        <input name="title" type="text"> Заголовок статьи<br><br>
        <textarea name="editor" id="editor" cols=" 30" rows="5" ></textarea>
        <input type="submit" value="сохранить">
    </form>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

@endsection
