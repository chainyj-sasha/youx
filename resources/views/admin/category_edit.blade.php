@extends('layouts.admin')

@section('title', $title)

@section('content')

    <form action="{{ route('category_update', ['id' => $category->id]) }}" method="post">
        @csrf
        <input name="title" type="text" value="{{ $category->title }}">
        <input name="sort" type="number" value="{{ $category->sort }}">
        <input type="submit" value="Сохранить">
    </form>

    <form action="{{ route('category_destroy', ['id' => $category->id]) }}" method="post">
        @csrf
        <input type="submit" value="Удалить">
    </form>

@endsection
