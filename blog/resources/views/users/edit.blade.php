@extends('layouts.app')

@section('content')

<h1>職員情報の変更</h1>
@include('commons.flash')
<form action="{{ route('users.update', $user->id) }}" method="POST">
@csrf
@method('put')
<dl>
<dt>名前</dt>
<dd><input type="text" name="name" value="{{ $user->name }}" class="form_input"></dd>
<dt> メールアドレス</dt>
<dd><input type="text" name="email" value="{{ $user->email }}" class="form_input"></dd>
</dl>
 <button type="submit" class="btn btn-primary">変更する</button>
</form>
<a href="{{ route('users.index') }}">一覧ページに戻る</a> 
@endsection