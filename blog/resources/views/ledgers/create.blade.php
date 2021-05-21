@extends('layouts.app')

@section('content')

<h1>書籍在庫の追加</h1>
<form action="{{ route('ledgers.store') }}" method="POST">
@csrf
<dl>
    <dt>カタログID</dt>
    <dd><input type="text" name="catalog_id"></dd>
    <dt>到着日</dt>
    <dd><input type="date" name="arrival_day"></dd>
</dl>
<button type="submit">登録する</button>
</form>
<a href="{{ route('ledgers.index') }}">一覧画面</a>

@endsection