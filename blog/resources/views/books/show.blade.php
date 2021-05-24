@extends('layouts.app')

@section('content')

    <h1>書籍詳細</h1>
    <a href="{{ route('catalogs.edit',$book->id) }}">変更する</a>
    <form action="{{ route('catalogs.destroy', $book->id) }}" method="POST">
    @csrf
    @method('delete')
    <button type="submit">削除する</button>
    </form>
<table>
    <tr>
        <th>カタログID</th>
        <th id="table1">ISBN番号</th>
        <th id="table1">タイトル</th>
        <th id="table1">ジャンルID</th>
        <th id="table1">著者名</th>
        <th id="table1">出版社</th>
        <th id="table1">出版日</th>
    </tr>
    <tr>
        <td id="table1">{{ $book->id }}</td>
        <td>{{ $book->ISBN_id }}</td>
        <td>{{ $book->title }}</a></td>
        <td>{{$book->genre_id}}</td>
        <td>{{$book->author}}</td>
        <td>{{$book->publisher}}</td>
        <td>{{$book->publisher_date}}</td>
    </tr>
</table>
<a href="{{ route('catalogs.index') }}">一覧ページに戻る</a> 
@endsection