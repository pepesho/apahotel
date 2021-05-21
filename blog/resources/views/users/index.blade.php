@extends('layouts.app')

@section('content')

<form action="{{ route('users.index')}}" method="post">
    @csrf
    @method('get')

    <select name="sort">
        <option value="" selected></option>
        <option value="id_asc">ID昇順</option> 
        <option value="id_desc">ID降順</option>
        <option value="name_asc">名前昇順</option> 
        <option value="name_desc">名前降順</option>  
    </select>
    <button type="submit">検索</button>    
</form>

@foreach ($users as $user)

<p>{{ $user->id }} <a href="{{ route('users.show', $user->id )}}">{{ $user->name }}</a></p>
    
@endforeach
<a href="/">ホーム画面に移動</a>
@endsection