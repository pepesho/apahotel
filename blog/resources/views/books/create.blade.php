@extends('layouts.app')

@section('content')
<h1>書籍新規登録</h1>
@include('commons/flash')
<form action="{{ route('catalogs.store') }}" method="post">
    @csrf
    <dl>
        <dt>ISBN番号</dt>
        <dd><input type="text" name="ISBN_id"></dd>
        <dt> タイトル</dt>
        <dd><input type="text" name="title"></dd>
        <dt>著者</dt>
        <dd><input type="text" name="author"></dd>
        <dt>ジャンル</dt>
        <dd><input type="text" name="genre_id"></dd>
        <dt>出版社</dt>
        <dd><input type="text" name="publisher"></dd>
        <dt>出版日</dt>
        <dd><input type="date" name="publisher_date"></dd>
    </dl>
    <button type="submit">登録する</button>
</form>
@endsection