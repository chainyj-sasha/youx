<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная страница</title>
</head>
<body>

<header>
    <h1>Добро пожаловать на главную страницу сайта!</h1>
</header>


<article>
    <a href="{{ route('news.index') }}">На страницу новостей</a>
</article>

<footer>
    <h3>
        Тестовое задание для компании <a href="https://you-x.ru/">YOUX</a>
    </h3>
</footer>

</body>
</html>
