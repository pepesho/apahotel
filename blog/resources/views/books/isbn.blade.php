@extends('layouts.app')

@section('content')
    <form action="{{ route(s) }}" method="post">
        <p><label>ISBN番号を入力</label></p>
        <form action="" method="post">
            <input type="text" name="ISBN_id">
            <button type="submit">検索</button>
        </form>
    </form>
@endsection