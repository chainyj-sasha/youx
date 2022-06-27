@extends('layouts.admin')

@section('title', $title)

@section('content')

    <h3>Все категории</h3>

    <table border="1">
        <tr>
            <th>Заголовок</th>
            <th>Сортировка</th>
            <th>Дата создания</th>
            <th>Дата обновления</th>
            <th>Редактировать</th>
        </tr>

        @foreach($categories as $category)
            <tr>
                <td><a href="??????">{{ $category->title }}</a></td>
                <td>{{ $category->sort }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td><a href="{{ route('category_edit', ['id' => $category->id]) }}">редактировать</a></td>
            </tr>
        @endforeach

    </table>

    <h3>Создать новую категорию</h3>

    <form action="{{ route('category_store') }}" method="post">
        @csrf
        <input name="title" type="text"> Название категории<br><br>
        <input name="sort" type="number"> Сортировка<br><br>
        <input name="button" type="submit" value="Создать">
    </form>

    <h3>Создать новую статью</h3>

    <form action="{{ route('article_store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <select name="categories_id[]" multiple>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select> Выбрать категорию<br><br>
        <input name="is_active" type="radio" value="1"> Статья активна<br>
        <input name="is_active" type="radio" value=""> Статья НЕ активна<br><br>
        <input name="small_pic" type="file"> Превью кантинка<br><br>
        <input name="big_pic" type="file"> Детальная кантинка<br><br>
        <input name="title" type="text"> Заголовок статьи<br><br>
        <textarea name="editor" id="editor" cols=" 30" rows="55" ></textarea>
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
