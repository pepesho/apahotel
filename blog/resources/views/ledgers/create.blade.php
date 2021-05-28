@extends('layouts.app')

@section('content')

<h1>書籍在庫の追加</h1>
@include('commons/flash')
<div class="edit_create_form_wrapper">
    <form action="{{ route('ledger.confirm') }}" method="get">
    @csrf
    <dl>
        <dt>カタログID</dt>
        <dd><input type="text" name="catalog_id" class="form_input"></dd>
    </dl>
    <button type="submit" class="btn btn-primary">登録する</button>
    </form>
</div>
<a href="{{ route('ledgers.index') }}">一覧画面に戻る</a>

@endsection