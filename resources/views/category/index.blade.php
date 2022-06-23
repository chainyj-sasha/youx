<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>

<form action="" method="post">
    @csrf
    <input name="search" type="text" placeholder="Поиск по заголовку статьи">
</form>


@foreach($data as $categories)



    @foreach($categories as $article)

{{--        <p>{{ $article->title }}</p>--}}

    @endforeach

@endforeach



{{--@foreach($categories as $category)--}}

{{--    <h3>Категория - {{ $category->title }}</h3>--}}

{{--    @foreach($category->articles as $article)--}}
{{--        @if($article->is_active)--}}
{{--            <p>Картинка</p>--}}
{{--            <p>{{ date('y-m-d', strtotime($article->created_at)) }}</p>--}}
{{--            <p><a href="">{{ $article->title }}</a></p>--}}
{{--        @endif--}}
{{--    @endforeach--}}

{{--@endforeach--}}


</body>
</html>
