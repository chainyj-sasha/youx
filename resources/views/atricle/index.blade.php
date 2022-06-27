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

<h3>{{ $article->title }}</h3>

<p>Изображение</p>

<p>{{ $article->text }}</p>

<form action="{{ route('main_page') }}" method="">
    <button style="width: 110px; height: 20px">Назад</button>
</form>



</body>
</html>
