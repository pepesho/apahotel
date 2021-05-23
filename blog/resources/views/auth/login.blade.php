@extends('layouts.app')

@section('content')
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
@endsection
