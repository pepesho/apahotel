@extends('layouts.app')
@section('content')
<h1>会員登録</h1>
@include('commons.flash')
<div class="edit_create_form_wrapper">
    <form action="{{route('members.store')}}" method="post" class="form">
        @csrf
        <input type="hidden" name="name" value="{{ $member->name }}" class="form_input">
        <input type="hidden" name="postal" value="{{ $member->postal }}" class="form_input">
        <input type="hidden" name="address" value="{{ $member->address }}" class="form_input">
        <input type="hidden" name="tel" value="{{ $member->tel }}" class="form_input">
        <input type="hidden" name="email" value="{{ $member->email }}" class="form_input">
        <input type="hidden" name="birthday" value="{{ $member->birthday }}" class="form_input">

        <dl>
            <dt>名前</dt>
            <dd>{{ $member->name }}</dd>
            <dt>郵便番号</dt>
            <dd>{{ $member->postal }}</dd>
            <dt>住所</dt>
            <dd>{{ $member->address }}</dd>
            <dt>電話番号</dt>
            <dd>{{ $member->tel }}</dd>
            <dt>メールアドレス</dt>
            <dd>{{ $member->email }}</dd>
            <dt>生年月日</dt>
            <dd>{{ $member->birthday }}</dd>
        </dl>

        <button type="submit" class="btn btn-primary">会員を登録する</button>
    </form>
</div>
<a href="{{route('members.index')}}">一覧ページに戻る</a>
@endsection