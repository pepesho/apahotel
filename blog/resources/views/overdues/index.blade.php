@extends('layouts.app')

@section('content')
    <h1>延滞リスト</h1>
    
    <form action="{{ route('overdues.index') }}" method="post">
        @csrf
        @method('get')
        <input type="search" name="id" value="" placeholder="IDで検索" id="sbox">
        <input type="search" name="name" value="" placeholder="名前で検索" id="sbox">
        <input type="search" name="email" value="" placeholder="メールアドレスで検索" id="sbox">
        <input type="submit" value="検索" id="sbtn">
    </form>
    <form action="{{ route('overdues.index') }}" method="post">
        @csrf
        @method('get')
        <select name="sort" onchange="submit(this.form)">
            <option value="">並べ替え</option>
            <option value="asc">昇順（会員ID）</option>
            <option value="desc">降順（会員ID）</option>
        </select>
    </form>

    <table border="1">
        <tr>
            <th>会員ID</th>
            <th>延滞者</th>
            <th>メールアドレス</th>
            <th>返却日</th>
        </tr>
        @foreach ($overdues as $overdue)
            <tr>
                <th>{{ $overdue->member_id}}</th>
                <th>{{ $overdue->member->name }}</th>
                <th>{{ $overdue->member->email}}</th>
                <th>{{ $overdue->return_date }}</th>
            </tr>
        @endforeach
    </table>
    {{-- {{ $overdues->appends(Request::all())->links() }} --}}
@endsection