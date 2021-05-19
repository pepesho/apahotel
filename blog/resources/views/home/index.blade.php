@extends('layouts.app')

@section('content')
<div class="menu_wrapper">
    <a href="{{ route('users.index') }}" class="menu_button">職員一覧</a>
    <a href="#" class="menu_button">会員一覧</a>
    <a href="#" class="menu_button">書籍一覧</a>
    <a href="#" class="menu_button">貸出・返却</a>
    <a href="#" class="menu_button">延滞者リスト</a>
</div>

@endsection
