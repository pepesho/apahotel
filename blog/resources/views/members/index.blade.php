@extends('layouts.app')

@section('content')
<h1>会員一覧</h1>
<p class="new_button"><a href="{{ route('members.create')}}" class="text">新規登録</a></p>

<form action="{{ route('members.index')}}" method="post">
    @csrf
    @method('get')
    <input type="search" name="id" value="" placeholder="IDで検索" id="sbox">
    <input type="search" name="email" value="" placeholder="メールアドレスで検索" id="sbox">
    <input type="submit" value="検索" id="sbtn">
    <br>
    <select name="sort">
        <option value="asc">昇順（カタログID）</option>
        <option value="desc">降順（カタログID）</option>
    </select>
</form>
<table>
    <tr>
        <th>会員ID</th>
        <th>名前</th>
        <th>メールアドレス</th>
        <th>貸出冊数</th>
    </tr>
@foreach ($members as $member)
    <tr>
        <td>{{ $member->id }}</td>
        <td><a href="{{ route('members.show', $member->id )}}">{{ $member->name }}</td>
        <td>{{ $member->email }}</td>
        <td>{{ $member->borrows_count }}</td>
    </tr>
@endforeach
</table>
{{-- {{ $members->appends(Request::all())->links() }} --}}
@endsection