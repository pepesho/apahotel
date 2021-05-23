@extends('layouts.app')

@section('content')

<a href="{{ route('users.edit',$user->id) }}">変更する</a>
<form action="{{ route('users.destroy', $user->id) }}" method="POST">
@csrf
@method('delete')
<button type="submit">削除する</button>
</form>
<h1>職員詳細</h1>
<table>
    <tr>
        <th id="table1">職員番号</th>
        <th id="table1">名前</th>
        <th id="table1">メールアドレス</th></tr>
    <tr>
        <td id="table1">{{ $user->id }}</td>
        <td>{{ $user->name }}</a></td>
        <td>{{ $user->email }}</td>
    </tr>
</table>
<p class="new_button"><a href="{{ route('users.index') }}" class="text">一覧ページに戻る</a></p>
@endsection