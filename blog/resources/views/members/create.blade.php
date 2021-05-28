@extends('layouts.app')
@section('content')
<h1>会員登録</h1>
@include('commons.flash')
<div class="edit_create_form_wrapper">
    <form action="{{route('member.confirm')}}" method="get" class="form">
        @csrf
        <dl>
            <dt>名前</dt>
            <dd><input type="text" name="name" value="" class="form_input"></dd>
            <dt>郵便番号</dt>
            <dd><input type="text" name="postal" value="" class="form_input"></dd>
            <dt>住所</dt>
            <dd><input type="text" name="address" value="" class="form_input"></dd>
            <dt>電話番号</dt>
            <dd><input type="tel" name="tel" value="" class="form_input"></dd>
            <dt>メールアドレス</dt>
            <dd><input type="email" name="email" value="" class="form_input"></dd>
            <dt>生年月日</dt>
            <dd><input type="date" name="birthday" value="" class="form_input"></dd>
        </dl>

        <button type="submit" class="btn btn-primary">新規登録</button>
    </form>
</div>
<a href="{{route('members.index')}}">一覧ページに戻る</a>
@endsection