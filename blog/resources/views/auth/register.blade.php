@extends('layouts.app')

@section('content')
<h1>職員登録</h1>
@include('commons/flash')
<form action="{{ route('register') }}" method="post">
    @csrf
    <p>
        <label>名前<br>
        <input type="text" name="name"s
                        value="{{ old('name') }}"></label>
    </p>
    <p>
        <label>メールアドレス<br>
        <input type="email" name="email"
                        value="{{ old('email') }}"></label>
    </p>
    <p>
        <label>パスワード<br>
        <input type="password" name="password" value=""></label>
    </p>
    <p>
        <label>パスワード確認<br>
        <input type="password"
            name="password_confirmation" value=""></label>
    </p>
    <p>
        <button type="submit">職員登録</button>
    </p>
    <p>または</p>
    <p>
        <a href="{{ route('login') }}">ログイン</a>
    </p>
</form>
@endsection
