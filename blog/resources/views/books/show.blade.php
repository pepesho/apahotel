@extends('layouts.app')

@section('content')

<a href="{{ route('catalogs.edit',$book->id) }}">変更する</a>
<form action="{{ route('catalogs.destroy', $book->id) }}" method="POST">
@csrf
@method('delete')
<button type="submit">削除する</button>
</form>
<h1>書籍詳細</h1>
<p>ID： {{ $book->id }} </p>
<p>ISBN番号： {{ $book->ISBN_id }} </p>
<p>タイトル： {{ $book->title }} </p>
<p>著者： {{ $book->author }} </p>
<p>ジャンル： {{ $book->genre_id }} </p>
<p>出版社： {{ $book->publisher }} </p>
<p>出版日： {{ $book->publisher_date }} </p>
<a href="{{ route('catalogs.index') }}">一覧ページに戻る</a> 
@endsection