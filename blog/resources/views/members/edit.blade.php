@extends('layouts.app')

@section('content')

<h1>会員情報の変更</h1>
@include('commons.flash')
<div class="edit_create_form_wrapper">
    <form action="{{ route('members.update', $member->id) }}" method="POST" class="form">
        @csrf
        @method('put')
        <dl>
        <dt>名前</dt>
        <dd><input type="text" name="name" value="{{ $member->name }}" class="form_input"></dd>
        <dt>郵便番号</dt>
        <dd><input type="text" name="postal" value="{{$member->postal}}" class="form_input"></dd>
        <dt>住所</dt>
        <dd><input type="text" name="address" value="{{$member->address}}" class="form_input"></dd>
        <dt>電話番号</dt>
        <dd><input type="tel" name="tel" value="{{$member->tel}}" class="form_input"></dd>
        <dt> メールアドレス</dt>
        <dd><input type="text" name="email" value="{{ $member->email }}" class="form_input"></dd>
        <dt>生年月日</dt>
        <dd><input type="date" name="birthday" value="{{$member->birthday}}" class="form_input"></dd>
        </dl>

        <button type="submit" class="btn btn-primary">変更する</button>
    </form>
</div>
<a href="{{route('members.index')}}">一覧ページに戻る</a>
@endsection