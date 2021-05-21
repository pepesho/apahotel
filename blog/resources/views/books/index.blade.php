@extends('layouts.app')

@section('content')

<p><a href="{{route('catalogs.create')}}">新規登録</a></p>

<form action="{{ route('catalogs.index')}}" method="post">
    @csrf
    @method('get')

<dl>
<dt>ID検索</dt>
<dd>
    <input type="search" name="id" value="" placeholder="IDで検索">
    <input type="submit" value="検索">  
</dd>
<dt>タイトル検索</dt>
<dd>
    <input type="search" name="title" value="" placeholder="タイトルで検索">
    <input type="submit" value="検索">
</dd>
<dt>著者名検索</dt>
<dd>
    <input type="search" name="author" value="" placeholder="著者名で検索">
    <input type="submit" value="検索">
</dd>
<dt>ジャンル検索</dt>
<dd>
    <select name="genre_id">
        <option value=""></option>
        @foreach($genres as $genre)
        <option value="{{$genre->id}}"{{request('genre_id')==$genre->id?'selected':''}}>
             {{$genre->id}} {{$genre->genre}}
        </option>
        @endforeach
    </select>
    <input type="submit" value="検索">
</dd>

</form>

@foreach ($books as $book)
<p>
    {{ $book->ISBN_id }}&nbsp;<a href="{{ route('catalogs.show', $book->id )}}">{{ $book->title }}</a>
    &nbsp;{{$book->genre_id}}&nbsp;{{$book->author}}&nbsp;{{$book->publisher}}&nbsp;{{$book->publisher_date}}&nbsp;
    <a href="{{route('ledgers.create',$book->ISBN_id)}}">追加</a>
</p>  
@endforeach

@endsection