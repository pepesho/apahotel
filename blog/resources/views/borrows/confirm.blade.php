@extends('layouts.app')
@section('content')
<h1>貸出確認</h1>
@include('commons/flash')
<div class="edit_create_form_wrapper">
    <div class="lend_form">
        <form action="{{ route('borrows.store') }}" method="post">
        @csrf
        <input type="hidden" name="ledger_id" value="{{ $borrow->ledger_id }}" class="form_input">
        <input type="hidden" name="member_id" value="{{ $borrow->member_id }}" class="form_input">
        <table class="index_table">
        <tr>
            <th>貸し出す人</th>
            <th>本の名前</th>
        </tr>
        <tr>
            <td>{{ $member->name }}</td>
            <td>{{ $ledger->catalog->title }}</td>
        </tr>
        </table>
        <button id="borrow" class="btn btn-primary">貸出</button>
        </form>
    </div>
</div>
<a href="{{route('members.index')}}">一覧ページに戻る</a>
@endsection