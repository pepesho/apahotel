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
        <dd>
        <select name="genre_id" id="sbox">
             <option value='' disabled selected style='display:none;'>ジャンル選択</option>
             <option value=""></option>
        @foreach($genres as $genre)
             <option value="{{$genre->id}}"{{request('genre_id')==$genre->id?'selected':''}}>
                 {{$genre->id}} {{$genre->genre}}
              </option>
        @endforeach
        </select>
        </dd>
        <dt>出版社</dt>
        <dd><input type="text" name="publisher"></dd>
        <dt>出版日</dt>
        <dd><input type="date" name="publisher_date"></dd>
    </dl>
    <button type="submit">登録する</button>
</form>
<a href="{{ route('catalogs.index') }}">一覧ページに戻る</a>
@endsection