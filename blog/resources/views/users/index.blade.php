@extends('layouts.app')

@section('content')

<form action="{{ route('users.index')}}" method="post">
    @csrf
    @method('get')

    <input type="search" name="id" value="" placeholder="IDで検索">
    <input type="submit" value="検索">  
</form>

@foreach ($users as $user)

<p>{{ $user->id }} <a href="{{ route('users.show', $user->id )}}">{{ $user->name }}</a></p>
    
@endforeach
<a href="/">ホーム画面に移動</a>
@endsection