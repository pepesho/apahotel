@extends('layouts.app')

@section('content')
<h1>書籍新規登録</h1>
@include('commons/flash')
<div class="edit_create_form_wrapper">
    <form action="{{ route('catalogs.store') }}" method="post">
        @csrf
        <dl>
            <dt>ISBN番号</dt>
             <dd>{{ $isbn }}</dd>
            <input type="hidden" name="ISBN_id" class="form_input" value="{{ $isbn }}">
            <dt> タイトル</dt>
            <dd><input type="text" name="title" class="form_input"></dd>
            <dt>著者</dt>
            <dd><input type="text" name="author" class="form_input"></dd>
            <dt>ジャンル</dt>
            <dd>
            <select name="genre_id" id="sbox" class="form_input">
                <option value="" disabled selected style='display:none;'>ジャンル選択</option>
            @foreach($genres as $genre)
                <option value="{{$genre->id}}"{{request('genre_id')==$genre->id?'selected':''}}>
                    {{$genre->id}} {{$genre->genre}}
                </option>
            @endforeach
            </select>
            </dd>
            <dt>出版社</dt>
            <dd><input type="text" name="publisher" class="form_input"></dd>
            <dt>出版日</dt>
            <dd><input type="date" name="publisher_date" class="form_input"></dd>
        </dl>
        <button type="submit" class="btn btn-primary">登録する</button>
    </form>
</div>
<a href="{{ route('catalogs.index') }}">一覧ページに戻る</a>
@endsection