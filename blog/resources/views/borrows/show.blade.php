@extends('layout.app');

@section('content')
<h1>貸出</h1>
<form action="{{ route('borrows.create') }}" method="post">
    <input type="text" name="book_id">
    <button type="submit">貸出</button>
</form>

<h1>返却</h1>
<form action="{{ route('borrows.destroy') }}">
@foreach ($borrows as $borrow)
    <input type="checkbox" name="checkbox" value="{{ $borrows->id }}">
@endforeach
    <button type="submit">返却</button>
</form>

<a href="/">会員ID入力画面へ</a>

@endsection