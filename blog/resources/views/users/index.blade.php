@extends('layouts.app')

@section('content')
<h1>職員一覧</h1>
<table>
    <tr>
        <th id="table1">職員番号</th>
        <th id="table1">名前</th>
        <th id="table1">メールアドレス</th></tr>
@foreach ($users as $user)

    <tr>
        <td id="table1">{{ $user->id }}</td>
        <td><a href="{{ route('users.show', $user->id )}}">{{ $user->name }}</a></td>
        <td>{{ $user->email }}</td>
    </tr>
@endforeach
</table>
    <a href="/">ホーム画面に移動</a>
@endsection