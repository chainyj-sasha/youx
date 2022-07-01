@extends('layouts.admin')

@section('title', $title)

@section('content')

    <h3>Редактирование категории</h3>

    <form action="{{ route('category.update', ['category' => $category])}}" method="post">
        @csrf
        @method('PUT')
        <input name="title" type="text" value="{{ $category->title }}"> Название категории<br><br>
        <input name="sort" type="number" value="{{ $category->sort }}"> Сортировка<br><br>
        <input type="submit" value="Сохранить"><br><br>
    </form>

    <form action="{{ route('category.destroy', ['category' => $category]) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Удалить">
    </form>
    <br>
    <form action="{{ route('category.index') }}" method="">
        <button style="width: 110px; height: 20px">Назад</button>
    </form>

@endsection
