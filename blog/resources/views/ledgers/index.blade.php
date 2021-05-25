@extends('layouts.app')
@section('content')
<h1>書籍在庫一覧</h1>
<p class="new_button"><a href="{{ route('ledgers.create') }}" class="text">新規入荷</a></p>
<div class="serch_form">
        <form action="{{ route('ledgers.index')}}" method="post" id="form1">
        @csrf
        @method('get')
        <input type="search" name="title" value="" placeholder="タイトルで検索" id="sbox">
        <input type="search" name="author" value="" placeholder="著者名で検索" id="sbox">
        <input type="submit" value="検索" id="sbtn">
        </form>
        <form action="{{ route('ledgers.index') }}" method="post" id="sbox">
            @csrf
            @method('get')
            <select name="sort" onchange="submit(this.form)">
                <option value="">並べ替え</option>
                <option value="asc">昇順（書籍ID）</option>
                <option value="desc">降順（書籍ID）</option>
            </select>
        </form>
       
    </div>
<table>
    <tr>
        <th>書籍ID</th>
        <th id="table1">タイトル</th>
        <th>著者</th>
        <th id="table1">入荷日</th>
        <th>貸出可否</th>
    </tr>
@foreach ($ledgers as $ledger)
    <tr>
        <td id="table1"><a href="{{ route('ledgers.show', $ledger->id) }}">{{ $ledger->id }}</a></td>
        <td>{{ $ledger->catalog->title }}</td>
        <td id="table1">{{ $ledger->catalog->author }}</td>
        <td>{{ $ledger->arrival_day }}</td>
        <td>
            @isset($ledger->borrows)
                {{ "×" }}               
            @else
                {{ "〇" }}
            @endisset
        </td>
    </tr>
@endforeach
</table>
{{ $ledgers->appends(Request::all())->links() }}
@endsection