<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/css/homeIndex.css">
        <script src="https://kit.fontawesome.com/fd663eae39.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
                @include('commons/nav')
        </header>
        <main>
                @yield('content')
        </main>
    </body>
</html>
