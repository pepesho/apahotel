@extends('layouts.app')

@section('content')
    <h1>ISBN番号で登録</h1>
    @include('commons/flash')
    <form action="{{ route('catalogs.check')}}" method="post">
        @csrf
        <p><input type="number" name="isbn_id" placeholder="ISBN_id(ハイフンなし)" required></p>
        <select name="genre_id" >
            <option value="" disabled selected style='display:none;'>ジャンル</option>
        @foreach($genres as $genre)
            <option value="{{$genre->id}}"{{request('genre_id')==$genre->id?'selected':''}}>
                {{$genre->id}} {{$genre->genre}}
            </option>
        @endforeach
        </select>
        <p><button type="submit">登録</button></p>
    </form>
    <a href="{{ route('catalogs.index') }}">書籍一覧へ</a>
@endsection