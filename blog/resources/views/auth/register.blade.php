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
            <h1>職員登録</h1>
            @include('commons/flash')
            <div class="register_form_wrapper">
                <div class="register_form">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <p>
                            <label>名前<br>
                            <input class="register_form_input" type="text" name="name"
                                            value="{{ old('name') }}"></label>
                        </p>
                        <p>
                            <label>メールアドレス<br>
                            <input class="register_form_input" type="email" name="email"
                                            value="{{ old('email') }}"></label>
                        </p>
                        <p>
                            <label>パスワード<br>
                            <input class="register_form_input" type="password" name="password" value=""></label>
                        </p>
                        <p>
                            <label>パスワード確認<br>
                            <input class="register_form_input" type="password"
                                name="password_confirmation" value=""></label>
                        </p>
                        <p>
                            <button type="submit" class="btn btn-primary">職員登録</button>
                        </p>
                    </form>
                </div>
            </div>
            <p>または</p>
            <p>
                <a href="{{ route('login') }}">ログイン</a>
            </p>
        </main>
    </body>
</html>
