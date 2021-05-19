@extends('layouts.app')

@section('content')

<a href="{{ route('users.edit') }}">編集する</a>
<form action="{{ route('users.destroy', $users->id) }}" method="POST">
@csrf
@method('delete')
<button type="submit">削除する</button>
</form>
<h1>職員詳細</h1>
<p>ID： {{ $user->id }} </p>
<p>名前： {{ $user->name }} </p>
<p>メールアドレス： {{ $user->name }} </p>
<a href="..">一覧ページに戻る</a> 
@endsection