@extends('layouts.app')

@section('content')
<h1>書籍詳細</h1>
<div class="edit_delete_wrapper">
    <a href="{{ route('catalogs.edit',$book->id) }}" class="btn btn-primary create_edit_button">変更する</a>
    <form action="{{ route('catalogs.destroy', $book->id) }}" method="POST">
    @csrf
    @method('delete')
    <button type="submit" onclick="deleteBook()" class="btn btn-primary">削除する</button>
    </form>
    <script type="text/javascript">
    function deleteBook(){
        event.preventDefault();
        if(window.confirm('本当に削除しますか？')){
            document.getElementById('delete-form').submit();
        }
    }
    </script>
</div>
<p><a href="{{$book->book_img}}"><img src="{{ $book->book_img }}" alt="本の画像" width="30%" height="30%"></a></p>
<table class="show_table">
    <tr>
        <th>カタログID</th>
        <td id="table1">{{ $book->id }}</td>
    </tr>
    <tr>
        <th id="table1">ISBN番号</th>
        <td>{{ $book->ISBN_id }}</td>
    </tr>
    <tr>
        <th id="table1">タイトル</th>
        <td>{{ $book->title }}</a></td>
    </tr>
    <tr>
        <th id="table1">ジャンルID</th>
        <td>{{$book->genre_id}}</td>
    </tr>
    <tr>
        <th id="table1">著者名</th>
        <td>{{$book->author}}</td>
    </tr>
    <tr>
        <th id="table1">出版社</th>
        <td>{{$book->publisher}}</td>
    </tr>
    <tr>
        <th id="table1">出版日</th>
        <td>{{$book->publisher_date}}</td>
    </tr>
</table>
<a href="{{ route('catalogs.index') }}">一覧ページに戻る</a> 
@endsection