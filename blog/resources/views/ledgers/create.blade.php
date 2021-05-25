@extends('layouts.app')

@section('content')

<h1>書籍在庫の追加</h1>
@include('commons/flash')
<form action="{{ route('ledgers.store') }}" method="POST">
@csrf
<dl>
    <dt>書籍番号</dt>
    <dd><input type="text" name="catalog_id" class="form_input"></dd>
</dl>
<button type="submit" class="btn btn-primary">登録する</button>
</form>
<a href="{{ route('ledgers.index') }}">一覧画面に戻る</a>

@endsection