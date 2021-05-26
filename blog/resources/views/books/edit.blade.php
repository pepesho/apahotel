@extends('layouts.app')

@section('content')

<h1>書籍情報の変更</h1>
@include('commons.flash')
<div class="edit_create_form_wrapper">
    <form action="{{ route('catalogs.update', $book->id) }}" method="POST">
    @csrf
    @method('put')
    <dl>
    <dt>ISBN番号</dt>
    <dd><input type="text" name="ISBN_id" value="{{ $book->ISBN_id }}" class="form_input"></dd>
    <dt> タイトル</dt>
    <dd><input type="text" name="title" value="{{ $book->title }}" class="form_input"></dd>
    <dt>著者</dt>
    <dd><input type="text" name="author" value="{{ $book->author }}" class="form_input"></dd>
    <dt>ジャンル</dt>
    <dd>
    <select name="genre_id" value="{{$book->genre_id}}" id="sbox" class="form_input">
                <option value="" disabled selected style='display:none;'>ジャンル選択</option>
            @foreach($genres as $genre)
                <option value="{{$genre->id}}"{{request('genre_id')==$genre->id?'selected':''}}>
                    {{$genre->id}} {{$genre->genre}}
                </option>
            @endforeach
            </select>
    </dd>
    <dt>出版社</dt>
    <dd><input type="text" name="publisher" value="{{ $book->publisher }}" class="form_input"></dd>
    <dt>出版日</dt>
    <dd><input type="date" name="publisher_date" value="{{ $book->publisher_date }}" class="form_input"></dd>
    </dl>

    <button type="submit" class="btn btn-primary">変更する</button>
    </form>
</div>
<a href="{{ route('catalogs.index') }}">一覧ページに戻る</a>
@endsection