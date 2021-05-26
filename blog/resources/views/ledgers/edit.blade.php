@extends('layouts.app')

@section('content')
    <h1>書籍情報の変更</h1>
    @include('commons.flash')
    <div class="edit_create_form_wrapper">
        <form action="{{ route('ledgers.update', $ledger->id) }}" method="POST">
            @csrf
            @method('put')
            <dl>
                <dt>書籍番号</dt>
                <dd><input type="text" name="catalog_id" value="{{ $ledger->catalog_id }}" class="form_input"></dd>
                <dt>到着日</dt>
                <dd><input type="date" name="arrival_day" value="{{ $ledger->arrival_day }}" class="form_input"></dd>
            </dl>
            <button type="submit" class="btn btn-primary">変更する</button>
        </form>
    </div>
    <a href="{{ route('ledgers.index') }}">一覧ページに戻る</a>
@endsection
