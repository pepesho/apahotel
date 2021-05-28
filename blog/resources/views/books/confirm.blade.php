@extends('layouts.app')
@section('content')
<h1>書籍在庫追加確認</h1>
@include('commons.flash')
<div class="edit_create_form_wrapper">
    <form action="{{route('catalogs.check')}}" method="post" class="form">
        @csrf
        <input type="hidden" name="ISBN_id" value="{{ $catalog->ISBN_id }}" class="form_input">
        <input type="hidden" name="title" value="{{ $catalog->title }}" class="form_input">
        <input type="hidden" name="genre_id" value="{{ $catalog->genre_id }}" class="form_input">
        <input type="hidden" name="author" value="{{ $catalog->author }}" class="form_input">
        <input type="hidden" name="publisher" value="{{ $catalog->publisher }}" class="form_input">
        <input type="hidden" name="publisher_date" value="{{ $catalog->publisher_date }}" class="form_input">
        <input type="hidden" name="publisher_date" value="{{ $catalog->publisher_date }}" class="form_input">

        <dl>
            <dt>ISBN番号</dt>
            <dd>{{ $catalog->ISBN_id }}</dd>
            <dt>タイトル</dt>
            <dd>{{ $catalog->title }}</dd>
            <dt>ジャンルID</dt>
            <dd>{{ $catalog->genre_id }}</dd>
            <dt>著者名</dt>
            <dd>{{ $catalog->author }}</dd>
            <dt>出版社</dt>
            <dd>{{ $catalog->publisher }}</dd>
            <dt>出版日</dt>
            <dd>{{ $catalog->publisher_date }}</dd>
        </dl>

        <button type="submit" class="btn btn-primary">登録する</button>
    </form>
</div>
<a href="{{route('catalogs.index')}}">一覧ページに戻る</a>
@endsection