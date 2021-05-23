@extends('layouts.app')

@section('content')

<h1>書籍在庫一覧</h1>
<p class="new_button"><a href="{{ route('ledgers.create') }}" class="text">新規入荷</a></p>
<table>
    <tr>
        <th>貸出No</th>
        <th id="table1">タイトル</th>
        <th>著者</th>
        <th id="table1">入荷日</th>
        <th>貸出状況</th>
    </tr>
@foreach ($ledgers as $ledger)
    <tr>
        <td id="table1"><a href="{{ route('ledgers.show', $ledger->id) }}">{{ $ledger->id }}</a></td>
        <td>{{ $ledger->catalog->title }}</td>
        <td id="table1">{{ $ledger->catalog->author }}</td>
        <td>{{ $ledger->arrival_day }}</td>
        <td>
            @isset($ledger->borrows)
                {{ "〇" }}               
            @else
                {{ "×" }}
            @endisset
        </td>
    </tr>
@endforeach
</table>
{{ $ledgers->appends(Request::all())->links() }}
@endsection