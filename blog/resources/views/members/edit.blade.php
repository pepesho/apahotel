@extends('layouts.app')

@section('content')

<h1>会員情報の変更</h1>
@include('commons.flash')
<form action="{{ route('members.update', $member->id) }}" method="POST">
@csrf
@method('put')
<dl>
<dt>名前</dt>
<dd><input type="text" name="name" value="{{ $member->name }}"></dd>
<dt>郵便番号</dt>
<dd><input type="text" name="postal" value="{{$member->postal}}"></dd>
<dt>住所</dt>
<dd><input type="text" name="address" value="{{$member->address}}"></dd>
<dt>電話番号</dt>
<dd><input type="tel" name="tel" value="{{$member->tel}}"></dd>
<dt> メールアドレス</dt>
<dd><input type="text" name="email" value="{{ $member->email }}"></dd>
<dt>生年月日</dt>
<dd><input type="date" name="birthday" value="{{$member->birthday}}"></dd> -->
</dl>

 <button type="submit">変更する</button>
</form>
<a href="{{route('members.index')}}">一覧ページに戻る</a>
@endsection