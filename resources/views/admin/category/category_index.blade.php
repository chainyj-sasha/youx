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
                <td>{{ $category->title }}</td>
                <td>{{ $category->sort }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td><a href="{{ route('category.edit', ['category' => $category]) }}">редактировать</a></td>
            </tr>
        @endforeach

    </table>

    <h3>Создать новую категорию</h3>

    <form action="{{ route('category.store') }}" method="post">
        @csrf
        <input name="title" type="text"> Название категории<br><br>
        <input name="sort" type="number"> Сортировка<br><br>
        <input name="button" type="submit" value="Создать">
    </form>

    <p><a href="{{ route('article.index') }}">Создать статью</a></p>

@endsection
