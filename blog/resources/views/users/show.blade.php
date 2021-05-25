@extends('layouts.app')

@section('content')
<h1>職員詳細</h1>
<div class="edit_delete_wrapper">
    <a href="{{ route('users.edit',$user->id) }}">変更する</a>
    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit">削除する</button>
    </form>
</div>
<table class="users_show_table">
    <tr>
        <th>職員番号</th>
        <th>名前</th>
        <th>メールアドレス</th></tr>
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</a></td>
        <td>{{ $user->email }}</td>
    </tr>
</table>
<p><a href="{{ route('users.index') }}">一覧ページに戻る</a></p>
@endsection