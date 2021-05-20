@extends('layouts.app')

@section('content')

<p><a href="{{route('catalogs.create')}}">新規登録</a></p>

<form action="{{ route('catalogs.index')}}" method="post">
    @csrf
    @method('get')

    <select name="sort">
        <option value="" selected></option>
        <option value="id_asc">ID昇順</option> 
        <option value="id_desc">ID降順</option>
        <option value="name_asc">名前昇順</option> 
        <option value="name_desc">名前降順</option>  
    </select>
    <button type="submit">検索</button>    
</form>

@foreach ($books as $book)
<p>
    {{ $book->ISBN_id }}&nbsp;<a href="{{ route('catalogs.show', $book->id )}}">{{ $book->title }}</a>&nbsp;{{$book->genre_id}}&nbsp;{{$book->author}}&nbsp;{{$book->publisher}}&nbsp;{{$book->publisher_date}}&nbsp;<a href="{{route('ledgers.edit',$book->id)}}">追加</a>
</p>  
@endforeach

@endsection