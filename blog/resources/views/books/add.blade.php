@extends('layouts.app')

@section('content')

<h1>書籍情報の変更</h1>
<form action="{{ route('ledgers.update', $book->id) }}" method="POST">
@csrf
@method('put')
<dl>
<dt>ISBN番号</dt>
<dd><input type="text" name="ISBN_id" value="{{ $book->ISBN_id }}"></dd>
<dt> タイトル</dt>
<dd><input type="text" name="title" value="{{ $book->title }}"></dd>
<dt>著者</dt>
<dd><input type="text" name="author" value="{{ $book->author }}"></dd>
<dt>ジャンル</dt>
<dd><input type="text" name="genre_id" value="{{ $book->genre_id }}"></dd>
<dt>出版社</dt>
<dd><input type="text" name="publisher" value="{{ $book->publisher }}"></dd>
<dt>出版日</dt>
<dd><input type="date" name="publisher_date" value="{{ $book->publisher_date }}"></dd>
</dl>

 <button type="submit">変更する</button>
</form>
<a href="{{ route('catalogs.index') }}">一覧ページに戻る</a>
@endsection