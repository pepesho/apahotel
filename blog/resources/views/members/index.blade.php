@extends('layouts.app')

@section('content')

<p><a href="{{ route('members.create')}}">新規登録</a></p>

<form action="{{ route('members.index')}}" method="post">
    @csrf
    @method('get')

    タイトル<input type="search">
    
    <button type="submit">検索</button>    
</form>

@foreach ($members as $member)

<p>{{ $member->id }} <a href="{{ route('members.show', $member->id )}}">{{ $member->name }}</a>貸出状況</p>
    
@endforeach
@endsection