@extends('layouts.app')

@section('content')

<h1>書籍在庫一覧</h1>
<p><a href="{{ route('ledgers.create') }}">新規入荷</a></p>
@foreach ($ledgers as $ledger)
    <p>
        <a href="{{ route('ledgers.show', $ledger->id) }}">書籍ID{{ $ledger->catalog_id }}
            {{ $ledger->arrival_day }}</a>
    </p>
@endforeach
@endsection