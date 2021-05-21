@extends('layouts.app')
@section('content')
<h1>会員登録</h1>
@include('commons.flash')
<form action="{{route('members.store')}}" method="post">
@csrf
<p>名前: <input type="text" name="name" value=""></p>
<p>郵便番号: <input type="text" name="postal" value=""></p>
<p>住所: <input type="text" name="address" value=""></p>
<p>電話番号: <input type="tel" name="tel" value=""></p>
<p>メールアドレス: <input type="email" name="email" value=""></p>
<p>生年月日: <input type="date" name="birthday" value="2000-01-01"></p>

<button type="submit">新規登録</button>
</form>
<a href="{{route('members.index')}}">一覧ページに戻る</a>
@endsection