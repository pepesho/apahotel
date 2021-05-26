@extends('layouts.app')

@section('content')
<h1>職員一覧</h1>
<table class="users_index_table">
    <tr>
        <th>職員番号</th>
        <th>名前</th>
        <th>メールアドレス</th>
    </tr>
@foreach ($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td><a href="{{ route('users.show', $user->id )}}">{{ $user->name }}</a></td>
        <td>{{ $user->email }}</td>
    </tr>
@endforeach
</table>
@endsection