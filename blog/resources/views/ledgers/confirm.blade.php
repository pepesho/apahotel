@extends('layouts.app')
@section('content')
<h1>書籍在庫追加確認</h1>
@include('commons.flash')
<div class="edit_create_form_wrapper">
    <form action="{{route('ledgers.store')}}" method="post" class="form">
        @csrf
        <input type="hidden" name="catalog_id" value="{{ $ledger->catalog_id }}" class="form_input">

        <dl>
            <dt>カタログID</dt>
            <dd>{{ $ledger->catalog_id }}</dd>
            <dt>書籍名</dt>
            <dd>{{ $catalog->title }}</dd>
            <dt>入荷日</dt>
            <dd>{{ $date }}</dd>
        </dl>

        <button type="submit" class="btn btn-primary">登録する</button>
    </form>
</div>
<a href="{{route('ledgers.index')}}">一覧ページに戻る</a>
@endsection