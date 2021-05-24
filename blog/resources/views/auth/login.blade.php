<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/main.css">
        <script src="https://kit.fontawesome.com/fd663eae39.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <i class="fas fa-book"></i><span class="nav_top_text">図書管理システム</span>
        </header>
        <main>
            <h1>ログイン</h1>
            @include('commons/flash')
            <form action="{{ route('login') }}" method="post">
                @csrf
                <p>
                    <label>メールアドレス</label><br>
                    <input type="email" name="email" value="{{ old('email') }}">
                </p>
                <p>
                    <label class="visually-hidden">パスワード</label><br>
                    <input type="password" name="password" value="">
                </p>
                <p>
                    <button type="submit" class="btn btn-primary">ログイン</button>
                </p>
                <p>または</p>
                <p>
                    <a href="{{ route('register') }}">職員登録</a>
                </p>
            </form>
        </main>
    </body>
</html>
