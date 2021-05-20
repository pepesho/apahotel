@extends('layouts.app')

@section('content')

<h1>職員情報の変更</h1>
<form action="{{ route('users.update', $user->id) }}" method="POST">
@csrf
@method('put')
<dl>
<dt>名前</dt>
<dd><input type="text" name="name" value="{{ $user->name }}"></dd>
<dt> メールアドレス</dt>
<dd><input type="text" name="email" value="{{ $user->email }} "></dd>
</dl>

 <button type="submit">変更する</button>
</form>
<a href="/">一覧ページに戻る</a>
@endsection