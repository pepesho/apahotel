<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="/css/main.css">
    </head>
    <body>
        <header>
            <div class="container">
                <a class="brand" href="/">{{ config('app.name') }}</a>
                @include('commons/nav')
            </div>
        </header>
        <main>
            <div class="container">
                @yield('content')
            </div>
        </main>
    </body>
</html>
