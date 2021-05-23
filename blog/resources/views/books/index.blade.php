@extends('layouts.app')

@section('content')
<div class="main_form">
    <p class="new_button"><a href="{{route('catalogs.create')}}" class="text">新規登録</a></p>

    <div class="serch_form">
        <form action="{{ route('catalogs.index')}}" method="post" id="form1">
        @csrf
        @method('get')

        <input type="search" name="id" value="" placeholder="ISBN_IDで検索" id="sbox">
            <input type="search" name="title" value="" placeholder="タイトルで検索" id="sbox">

        <select name="genre_id" id="sbox">
             <option value='' disabled selected style='display:none;'>ジャンル検索</option>
             <option value=""></option>
        @foreach($genres as $genre)
             <option value="{{$genre->id}}"{{request('genre_id')==$genre->id?'selected':''}}>
                 {{$genre->id}} {{$genre->genre}}
              </option>
        @endforeach
        </select>
        <input type="search" name="author" value="" placeholder="著者名で検索" id="sbox">
        <input type="submit" value="検索" id="sbtn">
        </form>
    </div>
    <table>
        <tr>
            <th>カタログID</th>
            <th id="table1">ISBN番号</th>
            <th id="table1">タイトル</th>
            <th id="table1">ジャンルID</th>
            <th id="table1">著者名</th>
            <th id="table1">在庫の追加</th>
        </tr>
    @foreach ($books as $book)
        <tr>
            <td id="table1">{{ $book->id }}</td>
            <td>{{ $book->ISBN_id }}</td>
            <td><a href="{{ route('catalogs.show', $book->id )}}">{{ $book->title }}</a></td>
            <td>{{$book->genre_id}}</td><td>{{$book->author}}</td>
            <td><a href="{{route('ledgers.create',$book->ISBN_id)}}">追加</a></td>
        </tr>
@endforeach
    </table>
    {{ $books->appends(Request::all())->links() }}
</div>
@endsection