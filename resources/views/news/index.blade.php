<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>

<header>
    <h1>Новости</h1>
</header>


<article>

    <ul>
        @foreach($news as $item)
            <li>
                <h3>{{ $item->title }}</h3>
                <p>{{ $item->text }}</p>
                <hr>
            </li>
        @endforeach
    </ul>

</article>

<footer>
    <h6>Новости вымышлены. Все совпадения случайны.</h6>
</footer>

</body>
</html>
