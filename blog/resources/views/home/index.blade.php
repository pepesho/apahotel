@extends('layouts.app')

@section('content')
<div class="menu_wrapper container">
    <div class="button"><a href="{{ route('users.index') }}" class="menu_button">職員一覧</a>
    <a href="{{ route('members.index') }}" class="menu_button">会員一覧</a></div>
    <div class="button"><a href="{{ route('catalogs.index') }}" class="menu_button">登録書籍</a>
    <a href="{{ route('ledgers.index') }}" class="menu_button">館内書籍一覧</a></div>
    <div class="button"><a href="{{ route('borrows.index') }}" class="menu_button">貸出・返却</a>
    <a href="#" class="menu_button">延滞者リスト</a></div>
</div>

@endsection
