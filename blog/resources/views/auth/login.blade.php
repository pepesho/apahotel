<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/css/top.css">
        <script src="https://kit.fontawesome.com/fd663eae39.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <div class="header_wrapper">
                <i class="fas fa-book"></i><span class="header_text">図書管理システム</span>
            </div>
        </header>
        <main>
            @include('commons/flash')
            <div class="login_form_wrapper">
                <div class="login_form">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <p>
                            <label>メールアドレス</label><br>
                            <input class="form_input" type="email" name="email" value="{{ old('email') }}">
                        </p>
                        <p>
                            <label>パスワード</label><br>
                            <input class="form_input" type="password" name="password" value="">
                        </p>
                        <button type="submit" class="btn btn-primary">ログイン</button>
                    </form>
                </div>
            </div>
            <p>または<a href="{{ route('register') }}">職員登録</a></p>
        </main>
    </body>
</html>
