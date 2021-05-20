@extends('layouts.app')
@section('content')
<h1>会員登録</h1>
@include('commons.flash')
<form action="{{route('members.store')}}" method="post">
@csrf
<p>名前: <input type="text" name="name" value="{{old('name', $member->name)}}"></p>
<p>郵便番号: <input type="text" name="postal" value="{{old('postal', $member->postal)}}"></p>
<p>住所: <input type="text" name="address" value="{{old('address', $member->address)}}"></p>
<p>電話番号: <input type="tel" name="tel" value="{{old('tel', $member->tel)}}"></p>
<p>メールアドレス: <input type="email" name="email" value="{{old('email', $member->email)}}"></p>
<p>生年月日: <input type="date" name="birthday" value="{{old('birthday', $member->birthday)}}"></p>

<button type="submit">新規登録</button>
</form>
<a href="{{route('members.index')}}">一覧ページに戻る</a>
@endsection